<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";



//$select_specie = $_POST['select_specie'];
//$select_experiment = $_POST['select_experiment'];
//$select_tissue = $_POST['select_tissue'];
//$select_cell = $_POST['select_cell'];

$select_sample = $_POST['select_sample'];
//$select_sample = 'SRR1066622';

$map = [];
$map[] = ['SampleID', '=', $select_sample];

$result = Db::table('OverallSample')->where($map)->
field('DatasetID')->
select();


// 从查询结果中提取 project_id 值
$project_ids = [];
foreach ($result as $row) {
    $project_ids[] = $row['DatasetID'];  // 假设您的字段名是 project_id
}

// 去重处理
$unique_project_ids = array_unique($project_ids);

// 格式化为数组形式
$response = array_values($unique_project_ids);  // 保证返回的数组索引从 0 开始


$sid = $response[0];

//echo $response[0];

// 1️⃣ 读取 JSON 文件内容
$jsonFile = "../json/sample_erna/{$sid}_SeRNA_expression.json";
$jsonData = file_get_contents($jsonFile);

// 2️⃣ 将 JSON 数据解码为 PHP 数组
$data = json_decode($jsonData, true); // 将 JSON 解码为 PHP 数组

// 3️⃣ 选择要提取的 cell
$targetCell = $select_sample; // 你要提取的 cell 名称

// 4️⃣ 检查 cell 是否存在，并提取 expressed_erna 的基因名
$geneList = [];
foreach ($data as $cellData) {
    if ($cellData['cell'] === $targetCell && isset($cellData['expressed_erna'])) {
        $geneList = array_keys($cellData['expressed_erna']); // 提取 expressed_erna 的键名
        break; // 找到后立即停止遍历
    }
}

// 5️⃣ 输出结果
//print_r($geneList);


//表单输入
$draw = $_POST['draw']; //绘制计数器。这个是用来确保Ajax从服务器返回的是相对应的（Ajax是异步的，因此返回的顺序是不确定的）
$row = $_POST['start']; //分页第一条数据的起始位置，比如0代表第一条数据
$rowperpage = $_POST['length']; // Rows display per page| 表格在当前绘制显示多少条数据。服务器返回的记录将等于该数目，除非服务器返回的记录数较少。
$columnIndex = $_POST['order'][0]['column']; // Column index | 那些列需要应用排序。这是对columns 数组的索引引用，并且也会提交到服务端
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name | columns 绑定的数据源，由 columns.dataOption 定义
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc | 对应列的排序方向。 desc 降序， asc升序。
$searchValue = $_POST['search']['value']; // Search value | 全局的搜索值。值会应用到每一列


$searchQuery = '%'.$searchValue.'%';




$map2 = [];
$map2[] = ['dataset', '=', $sid];
$map2[] = ['annotation', 'in', $geneList];


//$totalRecords 总条目的数量计数
$totalRecords = Db::table('SernaList')->where($map2)->count();


//$totalRecordwithFilter 符合筛选条件的条目的数量统计
$totalRecordwithFilter = Db::table('SernaList')->where($map2)->


//调用闭包函数query并且允许使用外部变量searchQuery
where(function ($query) use ($searchQuery) {
    $query->whereOr([
        ["pos", "like", $searchQuery],
    ]);
})->
field('ID, pos, chrom, start, end, dataset')->count();



$result2 = Db::table('SernaList')->where($map2)->order( $columnName.' '.$columnSortOrder)->
limit($row,$rowperpage)->select();

//$data
$data = array();

$response2 = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $result2
);

echo json_encode($response2, JSON_UNESCAPED_UNICODE);




























