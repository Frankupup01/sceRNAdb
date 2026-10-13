<?php
/*
 * 2024.3.18 Ma-tianyu
 * 封装SQL查询
 * Db类实现了SELECT、DELETE、INSERT、UPDATE
 * 返回的$result为数组对象
 */
class Db{
    public static $tablename;
    public static $where = '';
    public static $executeData;
    public static $pdo;
    public static $stmt;
    public static $order='';
    public static $limit='';
    public static $field='*';

    // 判断是否在where组内 ()
    private $isGrouping = false;
    private $whereAndOrNot = 'AND';

    public function __construct() {
       self::connect();
       self::setAttr();
    }

    /**
     * 数据库连接
     */
    public static function connect()
    {
        $DS = DIRECTORY_SEPARATOR;
        $config = require __DIR__."{$DS}..{$DS}config{$DS}database.php";
        //$config = require __DIR__."/../config/database.php";
        // $config = require __DIR__.$DS."..".$DS."config".$DS."database.php";

        //MySQL链接，已被注释，需要时替换SQLite配置
        /*
        $dbms = $config["dbms"];
        $host = $config["host"];
        $user = $config["user"];
        $pass = $config["pass"];
        $dbName = $config["dbName"];
        */

        //$dsn="$dbms:host=$host;dbname=$dbName;charset=utf8mb4";

        /*
        try {
            self::$pdo = new PDO($dsn, $user, $pass); //初始化一个PDO对象
        } catch (PDOException $e) {
            throw new Exception("数据库连接错误: " . $e->getMessage());
        }
        */

        //SQLite配置，需要时需注释掉替换为MYSQL
        $dbFile = $config["dbFile"]; // SQLite数据库文件路径
        $dsn = "sqlite:" . $dbFile;

        try {
            self::$pdo = new PDO($dsn); // 初始化一个PDO对象
        } catch (PDOException $e) {
            throw new Exception("数据库连接错误: " . $e->getMessage());
        }


    }

    /**
     * 设置错误模式异常
     */
    private static function setAttr()
    {
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * 选择数据库中的表，返回对象
     */
    public static function table(string $tablename)
    {
        self::$tablename=$tablename;
        return new self();
    }


    /**
     * 条件查询where的封装
     * 构建WHERE子句
     *
     *
     * @param array|Closure $condition
     * @param $andOrNot
     * @return $this
     */
    public function where(Array|Closure $condition,$andOrNot = 'AND')
    {
        // 初始化where子句字符串
        $where = '';

        //检查数组是否为空
        if(!empty($condition)){

            //数组不为空（条件是闭包函数）
            if($condition instanceof Closure){
                $this->isGrouping = true;
                $this->whereAndOrNot = $andOrNot;
                $condition($this);
                $this->isGrouping = false;
                return $this;
            }

            // 拼接where 用于存储where子句的数组
            $whereArray = [];
            // 用于存储预处理语句的绑定数据
            $executeData = [];

            // 遍历条件数组
            foreach ($condition as $key => $value) {

                // 处理'between'条件
                if(strtolower($value[1]) == 'between'){
                    //字段名称[0]；判断符号[1]；'?'预处理
                    $whereArray[] = "$value[0] $value[1] ? AND ?";
                    $executeData[] = $value[2][0] ;
                    $executeData[] = $value[2][1] ;
                }
                // 处理'in'条件
                else if(strtolower($value[1]) == 'in'){
                    // id in (?,?,?)
                    // [1,2,3]
                    $str = rtrim(str_repeat('?,',count($value[2])),',');
                    $whereArray[] = "$value[0] $value[1] ($str)";
                    foreach ($value[2] as $vv) {
                        $executeData[] = $vv;
                    }
                }
                // 处理其他类型的条件
                else{
                    $whereArray[] = "$value[0] $value[1] ?";
                    $executeData[] = $value[2] ;
                }
            }

            // 根据逻辑运算符拼接where子句
            // 'OR'
            if($andOrNot !== 'NOT' && $andOrNot !== 'OR NOT'){
                $where = implode(" $andOrNot ",$whereArray);
            }
            else{
                // 处理'NOT'逻辑
                if($andOrNot == 'OR NOT'){
                    //or not (条件1 OR 条件2 OR 条件3 。。。。)
                    $where = implode(" OR ",$whereArray);
                }
                else{
                    //not (条件1 AND 条件2 AND 条件3 。。。。)
                    $where = implode(" AND ",$whereArray);
                }
                // // 将整个条件组用括号括起来
                $where = 'NOT ('.$where.')';
        }

            // 如果当前正在分组，则将where子句用括号括起来
            if($this->isGrouping){
                $where = "( $where )";
            }

            // xxx AND xxx AND xxx

            // 将当前的执行数据添加到类属性中
            if(isset(self::$executeData)){
                self::$executeData = array_merge(self::$executeData,$executeData);
            }
            else{
                self::$executeData = $executeData;
            }
       
        }

        // 根据是否分组调用buildWhere方法
        if($this->isGrouping === true){
            $this->buildWhere($where,$this->whereAndOrNot);
        }
        else{
            $this->buildWhere($where,$andOrNot);
        }

        // 返回当前对象以支持链式调用
        return $this;
    }

    /**
     * OR连接
     * $condition: 可以是一个数组或者闭包（Closure）
     *
     * @param array|Closure $condition
     * @return $this
     */
    public function whereOr(Array|Closure $condition)
    {
        return $this->where($condition,'OR');
    }

    /**
     * NOT连接
     *
     * @param array|Closure $condition
     * @return $this
     */
    public function whereNot(Array|Closure $condition)
    {
        return $this->where($condition,'NOT');
    }

    /**
     * OR NOT连接
     *
     * @param array|Closure $condition
     * @return $this
     */
    public function whereOrNot(Array|Closure $condition)
    {
        return $this->where($condition,'OR NOT');
    }

    /**
     * 向 WHERE 子句中添加一个检查字段为空的条件
     *
     * @param string $name
     * @return $this
     */
    public function whereNull(string $name)
    {
        $where = "$name is null";
        $this->buildWhere($where);
        return $this;
    }

    /**
     * 向 WHERE 子句中添加一个检查字段非空的条件
     *
     * @param string $name
     * @return $this
     */
    public function whereNotNull(string $name)
    {
        $where = "$name is not null";
        $this->buildWhere($where);
        return $this;
    }


    /**
     * 动态构建SQL查询的 WHERE 子句
     * 允许逐步添加条件，而不是一次性构建整个查询字符串
     *
     * @param string $where
     * @param string $andOrNot
     * @return void
     */
    private function buildWhere(string $where,string $andOrNot = 'AND')
    {
        $oldWhere = self::$where;
        if($where !== ''){
          if(strpos($oldWhere,'WHERE') === false){
              if($oldWhere!==''){
                  $where = 'WHERE '.$oldWhere.' '.$andOrNot.' '.$where;
              }
              else{
                  $where = 'WHERE '.$where;
              }
          }
          else {
            $where = $oldWhere.' '.$andOrNot.' '.$where;
          }
          self::$where = $where;
        }
    }
    
    /**
     * 查询排序
     *
     * @param [string] 排序方式
     * @return object
     */
    public function order(string $orderby):object
    {
      self::$order = "order by ".$orderby;
      return $this;
    }
    
    /**
     * 查询条数限制
     *
     * @param int 查询数量或者起始偏移量
     * @param int|null 查询数量或null
     * @return object
     */
    public function limit(int $num1,int $num2=null):object
    {
      self::$limit = "limit ".(is_null($num2)?$num1:"$num1,$num2");
      return $this;
    }


    /**
     * 选中查询字段 field
     * field('id,username')
     *
     * @param string $fields
     * @return $this
     */
    public function field(string $fields)
    {
      self::$field = $fields;
      return $this;
    }


    /**
     * 获取拼接SQL查询语句
     *
     * @return mixed
     */
    public function getLastSql()
    {
      return self::$stmt->queryString;
    }
    
    /**
     * 查询数据条数
     *
     * @return int
     */
    public function count()
    {
        // SELECT count(*) as total FROM users
        $totalArray = $this->field('count(*) as total')->find();
        return $totalArray["total"];
    }

    /**
     * select 查询结果
     *
     * @return array
     */
    public function select()
    {
        try {
            // slelect id,username from users
            $sql = "SELECT ". self::$field ." FROM ". self::$tablename ." ".self::$where." ".self::$order." ".self::$limit;
            // echo $sql;
            self::$stmt = self::$pdo->prepare($sql);

            // var_dump(self::$executeData);
            //
            if(isset(self::$executeData)){
                self::$stmt->execute(self::$executeData);
            }
            else{
                self::$stmt->execute();
            }
            $result = self::$stmt->fetchAll(PDO::FETCH_ASSOC);
            self::$stmt->closeCursor();
            return $result;
        } catch (PDOException $e) {
            // self::$errmessage = [
            //     "message"=>$e->getMessage(),
            //     "line"=>$e->getLine(),
            //     "code"=>$e->getCode(),
            // ];
            // return false;
            throw new Exception("查询异常：".$e->getMessage());
        }
        
    }
    
    /**
     * 查询一条
     *
     * @return array|boolean
     */
    public function find()
    {
        $result = $this->limit(1)->select();
        return isset($result[0])?$result[0]:false;
    }


    /**
     * 删除数据
     *
     * @return mixed
     * @throws Exception
     */
    public function delete()
    {
        try {
            $sql = "DELETE FROM ". self::$tablename ." ".self::$where;
           
            self::$stmt = self::$pdo->prepare($sql);

            // var_dump(self::$executeData);
            //
            if(isset(self::$executeData)){
                self::$stmt->execute(self::$executeData);
            }
            else{
                self::$stmt->execute();
            }
            $result = self::$stmt->rowCount();
            self::$stmt->closeCursor();
            return $result;
        } catch (PDOException $e) {
            throw new Exception("删除异常：".$e->getMessage());
        }
        
    }


    /**
     * 插入数据
     *
     * @param array 要插入的数据数组 $datas []
     * @return int
     */
    public function insert(array $datas) : int
    {
        try {
            // $sql = "INSERT INTO user (username, password, phone) VALUES (?,?,?)";
            // $stmt = $conn->prepare($sql);
            if(empty($datas)){
                throw new Exception("插入异常：缺少要插入的数据");
            }
            $keys = array_keys($datas);
            $executeData = array_values($datas);
            $str = rtrim(str_repeat('?,',count($datas)),',');
            // // 执行插入语句
            // $stmt->execute(["test1","1234","13888888888"]);
            $sql = "INSERT INTO ". self::$tablename ." (".implode(',',$keys).") VALUES ($str) ";
           
            self::$stmt = self::$pdo->prepare($sql);

            self::$stmt->execute($executeData);
            $result = self::$stmt->rowCount();
            self::$stmt->closeCursor();
            return $result;
        } catch (PDOException $e) {
            throw new Exception("插入异常：".$e->getMessage());
        }
        
    }


    /**
     * 更新数据
     *
     * @param array 要更新的数据数组 $datas []
     * @return int
     */
    public function update(array $datas)
    {
        try {
        //    UPDATE user SET num = 1,username=2 WHERE id =2
            if(empty($datas)){
                throw new Exception("修改异常：缺少要修改的数据");
            }
            $insertArr = [];
            $executeData = [];
            foreach ($datas as $key => $value) {
                $insertArr[] = $key."=?";
                $executeData[] = $value;
            }
            $insertStr = implode(',',$insertArr);
            $sql = "UPDATE ". self::$tablename ." SET $insertStr ".self::$where;
           
            self::$stmt = self::$pdo->prepare($sql);
            if(isset(self::$executeData)){

                $executeData = array_merge($executeData,self::$executeData);
            }
            self::$stmt->execute($executeData);
            $result = self::$stmt->rowCount();
            
            return $result;
        } catch (PDOException $e) {
            throw new Exception("修改异常：".$e->getMessage());
        }
        
    }


    public function __destruct()
    {
        // self::$stmt->closeCursor();
        self::$pdo = null;
        self::$where = '';
        self::$executeData = null;
        self::$order='';
        self::$limit='';
        self::$field='*';
    }
}
























/*
$result = Db::table('publish')
    ->where([
        ["species","=",'Human'],
    ])
    //调用闭包函数query并且允许使用外部变量searchQuery
    ->where(function ($query){
        $query->where([
            ["species","like","%Hu"]
        ])->
        whereOr([
            ["project_id","like",""]
        ])->
        whereOr([
            ["technology","like",""]
        ]);
    })
    ->select();


var_dump($result);
*/


//测试


/*
$result = Db::table('publish')->where([
    ["species","=","Human"],
    ["tissue","=","Brain"],
])->select();

var_dump($result);
*/

// $result = Db::table('publish')->order('id ASC')->limit(3,4)->select();
// $result = Db::table('publish')->field('id, tissue, species')->order('id ASC')->limit(3,4)->select();


/*
$queryObject = Db::table('publish')->field('tissue, species')->order('id DESC');
$result = $queryObject->count();
$sql = $queryObject->getLastSql();
echo $sql;
*/


/*
 * where([
 *  ["",like,"%xxx%"],
 *  ["",between,["2024-3-26 13:00:00","2024-4-01 13:00:00"]],
 *  ['id','in',[1,2]]
 * ])->
 *  whereNull('creattime')->
 *  whereNotNull('id')->
 *  select();
 */


/*
 * whereOrNot([
 *  ['id','in',[1,2]],
 *  ['id','',''],
 * ])
 * ->whereOr([
 *  ["",between,["2024-3-26 13:00:00","2024-4-01 13:00:00"]]
 * ])
 * ->select();
 *
 */


/*
 *闭包函数
 * $result = DB::table('publish')->
 * where([
 *  [A = B],
 * ])
 * ->where(function($query){
 *  $query->where([
 *      [],
 *      [],
 * ]);
 * })
 * ->select();
 *
 * ///////////////////////
 *
 * $result = DB::table('publish')->
 * where([
 *  [A = B],
 * ])
 * ->whereOr(function($query){
 *  $query->where([
 *      [],
 *      [],
 * ]);
 * })
 * ->select();
 *
 */





