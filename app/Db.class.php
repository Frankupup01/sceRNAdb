<?php

class Db {
    public static $tablename;
    public static $where = '';
    public static $executeData;
    public static $pdo;
    public static $stmt;
    public static $order = '';
    public static $limit = '';
    public static $field = '*';

    // 判断是否在where组内 ()
    private $isGrouping = false;
    private $whereAndOrNot = 'AND';

    public function __construct() {
       self::connect();
       self::setAttr();
    }
    
    // 数据库连接方法
    public static function connect() {
        $DS = DIRECTORY_SEPARATOR;
        $config = require __DIR__."{$DS}..{$DS}config{$DS}database.php";

        // SQLite配置，需要时需注释掉替换为MYSQL
        $dbFile = $config["dbFile"]; // SQLite数据库文件路径
        $dsn = "sqlite:" . $dbFile;

        try {
            self::$pdo = new PDO($dsn); // 初始化一个PDO对象
        } catch (PDOException $e) {
            throw new Exception("数据库连接错误: " . $e->getMessage());
        }
    }

    private static function setAttr() {
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function table(string $tablename) {
        self::$tablename = $tablename;
        return new self();
    }
    
    public function where($condition, $andOrNot = 'AND') {
        if (!is_array($condition) && !is_callable($condition)) {
            throw new InvalidArgumentException('条件必须是数组或闭包函数');
        }

        $where = '';
        if (!empty($condition)) {
            if (is_callable($condition)) {
                $this->isGrouping = true;
                $this->whereAndOrNot = $andOrNot;
                $condition($this);
                $this->isGrouping = false;
                return $this;
            }
            
            $whereArray = [];
            $executeData = [];
            foreach ($condition as $key => $value) {
                if (strtolower($value[1]) == 'between') {
                    $whereArray[] = "$value[0] $value[1] ? AND ?";
                    $executeData[] = $value[2][0];
                    $executeData[] = $value[2][1];
                } else if (strtolower($value[1]) == 'in') {
                    $str = rtrim(str_repeat('?,', count($value[2])), ',');
                    $whereArray[] = "$value[0] $value[1] ($str)";
                    foreach ($value[2] as $vv) {
                        $executeData[] = $vv;
                    }
                } else {
                    $whereArray[] = "$value[0] $value[1] ?";
                    $executeData[] = $value[2];
                }
            }

            if ($andOrNot !== 'NOT' && $andOrNot !== 'OR NOT') {
                $where = implode(" $andOrNot ", $whereArray);
            } else {
                if ($andOrNot == 'OR NOT') {
                    $where = implode(" OR ", $whereArray);
                } else {
                    $where = implode(" AND ", $whereArray);
                }
                $where = 'NOT (' . $where . ')';
            }

            if ($this->isGrouping) {
                $where = "( $where )";
            }

            if (isset(self::$executeData)) {
                self::$executeData = array_merge(self::$executeData, $executeData);
            } else {
                self::$executeData = $executeData;
            }
        }

        if ($this->isGrouping === true) {
            $this->buildWhere($where, $this->whereAndOrNot);
        } else {
            $this->buildWhere($where, $andOrNot);
        }

        return $this;
    }

    public function whereOr($condition) {
        return $this->where($condition, 'OR');
    }

    public function whereNot($condition) {
        return $this->where($condition, 'NOT');
    }

    public function whereOrNot($condition) {
        return $this->where($condition, 'OR NOT');
    }

    public function whereNull(string $name) {
        $where = "$name is null";
        $this->buildWhere($where);
        return $this;
    }

    public function whereNotNull(string $name) {
        $where = "$name is not null";
        $this->buildWhere($where);
        return $this;
    }

    private function buildWhere(string $where, string $andOrNot = 'AND') {
        $oldWhere = self::$where;
        if ($where !== '') {
            if (strpos($oldWhere, 'WHERE') === false) {
                if ($oldWhere !== '') {
                    $where = 'WHERE ' . $oldWhere . ' ' . $andOrNot . ' ' . $where;
                } else {
                    $where = 'WHERE ' . $where;
                }
            } else {
                $where = $oldWhere . ' ' . $andOrNot . ' ' . $where;
            }
            self::$where = $where;
        }
    }

    public function order(string $orderby): object {
        self::$order = "order by " . $orderby;
        return $this;
    }

    public function limit(int $num1, int $num2 = null): object {
        self::$limit = "limit " . (is_null($num2) ? $num1 : "$num1,$num2");
        return $this;
    }

    public function field(string $fields) {
        self::$field = $fields;
        return $this;
    }

    public function getLastSql() {
        return self::$stmt->queryString;
    }

    public function count() {
        $totalArray = $this->field('count(*) as total')->find();
        return $totalArray["total"];
    }

    public function select() {
        try {
            $sql = "SELECT " . self::$field . " FROM " . self::$tablename . " " . self::$where . " " . self::$order . " " . self::$limit;
            self::$stmt = self::$pdo->prepare($sql);

            if (isset(self::$executeData)) {
                self::$stmt->execute(self::$executeData);
            } else {
                self::$stmt->execute();
            }
            $result = self::$stmt->fetchAll(PDO::FETCH_ASSOC);
            self::$stmt->closeCursor();
            return $result;
        } catch (PDOException $e) {
            throw new Exception("查询异常：" . $e->getMessage());
        }
    }

    public function find() {
        $result = $this->limit(1)->select();
        return isset($result[0]) ? $result[0] : false;
    }

    public function delete() {
        try {
            $sql = "DELETE FROM " . self::$tablename . " " . self::$where;
            self::$stmt = self::$pdo->prepare($sql);

            if (isset(self::$executeData)) {
                self::$stmt->execute(self::$executeData);
            } else {
                self::$stmt->execute();
            }
            $result = self::$stmt->rowCount();
            self::$stmt->closeCursor();
            return $result;
        } catch (PDOException $e) {
            throw new Exception("删除异常：" . $e->getMessage());
        }
    }

    public function insert(array $datas): int {
        try {
            if (empty($datas)) {
                throw new Exception("插入异常：缺少要插入的数据");
            }
            $keys = array_keys($datas);
            $executeData = array_values($datas);
            $str = rtrim(str_repeat('?,', count($datas)), ',');
            $sql = "INSERT INTO " . self::$tablename . " (" . implode(',', $keys) . ") VALUES ($str) ";
            self::$stmt = self::$pdo->prepare($sql);
            self::$stmt->execute($executeData);
            $result = self::$stmt->rowCount();
            self::$stmt->closeCursor();
            return $result;
        } catch (PDOException $e) {
            throw new Exception("插入异常：" . $e->getMessage());
        }
    }

    public function update(array $datas) {
        try {
            if (empty($datas)) {
                throw new Exception("修改异常：缺少要修改的数据");
            }
            $insertArr = [];
            $executeData = [];
            foreach ($datas as $key => $value) {
                $insertArr[] = $key . "=?";
                $executeData[] = $value;
            }
            $insertStr = implode(',', $insertArr);
            $sql = "UPDATE " . self::$tablename . " SET $insertStr " . self::$where;
            self::$stmt = self::$pdo->prepare($sql);
            if (isset(self::$executeData)) {
                $executeData = array_merge($executeData, self::$executeData);
            }
            self::$stmt->execute($executeData);
            $result = self::$stmt->rowCount();
            return $result;
        } catch (PDOException $e) {
            throw new Exception("修改异常：" . $e->getMessage());
        }
    }

    public function __destruct() {
        self::$pdo = null;
        self::$where = '';
        self::$executeData = null;
        self::$order = '';
        self::$limit = '';
        self::$field = '*';
    }
}
