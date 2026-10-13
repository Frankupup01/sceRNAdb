<?php
session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";


$select_specie = $_POST['select_specie'];
$select_experiment = $_POST['select_experiment'];
$select_tissue = $_POST['select_tissue'];
$select_cell = $_POST['select_cell'];
$select_chr = $_POST['select_chr'];
$select_start = $_POST['select_start'];
$select_end = $_POST['select_end'];


/*
$select_specie = 'Homo Sapiens';
$select_experiment = 'Smart-seq2';
$select_tissue = 'lymphoma cell';
$select_cell = 'DG-75 cell';
$select_chr = 'chr1';
$select_start = '1300000';
$select_end = '24000000';
*/

$specie_map = [
    'Homo Sapiens' => 'Homo sapiens',
    'Mus Musculus' => 'Mus musculus'
];

// 如果前端传入的物种在映射中有对应关系，则使用映射后的值
if (array_key_exists($select_specie, $specie_map)) {
    $select_specie = $specie_map[$select_specie];
}


// 根据物种映射，构造查询条件
//$species_to_query = $specie_map[$select_specie];
// 使用 LIKE 实现不区分大小写匹配
$map[] = ['Species', 'LIKE', $select_specie];
$map[] = ['Technology', 'LIKE', $select_experiment];
$map[] = ['Tissue', 'LIKE', $select_tissue];
$map[] = ['CellType', 'LIKE', $select_cell];

$result = Db::table('OverallSample')->where($map)
    ->field('DatasetID, SampleID')->select();


// 从查询结果中提取 project 值
$tech_ids = [];
foreach ($result as $row) {
    $tech_ids[] = $row['DatasetID'];  // 假设您的字段名是 project_id
}
// 去重处理
$unique_tech_ids = array_unique($tech_ids);
// 格式化为数组形式
$response = array_values($unique_tech_ids);  // 保证返回的数组索引从 0 开始
// 【防崩溃机制】：如果查不到对应的数据集，直接返回空表
if (empty($response)) {
    $draw = isset($_POST['draw']) ? intval($_POST['draw']) : 1;
    echo json_encode(["draw" => $draw, "recordsTotal" => 0, "recordsFiltered" => 0, "data" => []]);
    exit;
}
// 返回 JSON 格式
//echo json_encode($response);

// 从查询结果中提取 sample 值
$tech2_ids = [];
foreach ($result as $row) {
    $tech2_ids[] = $row['SampleID'];  // 假设您的字段名是 project_id
}
// 去重处理
$unique_tech2_ids = array_unique($tech2_ids);
// 格式化为数组形式
$response2 = array_values($unique_tech2_ids);  // 保证返回的数组索引从 0 开始
// 返回 JSON 格式
//echo json_encode($response2);





//表单输入
$draw = $_POST['draw']; //绘制计数器。这个是用来确保Ajax从服务器返回的是相对应的（Ajax是异步的，因此返回的顺序是不确定的）
$row = $_POST['start']; //分页第一条数据的起始位置，比如0代表第一条数据
$rowperpage = $_POST['length']; // Rows display per page| 表格在当前绘制显示多少条数据。服务器返回的记录将等于该数目，除非服务器返回的记录数较少。
$columnIndex = $_POST['order'][0]['column']; // Column index | 哪些列需要应用排序。这是对columns 数组的索引引用，并且也会提交到服务端
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name | columns 绑定的数据源，由 columns.dataOption 定义
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc | 对应列的排序方向。 desc 降序， asc升序。
$searchValue = $_POST['search']['value']; // Search value | 全局的搜索值。值会应用到每一列


$searchQuery = '%'.$searchValue.'%';




$map2[] = ['dataset', 'IN', $response];
//$map2[] = ['annotation', 'in', $geneList];
$map2[] = ['chrom', '=', $select_chr];
$map2[] = ['start', '>', $select_start];
$map2[] = ['end', '<', $select_end];


//$totalRecords：统计DataTable总条目的数量计数
$totalRecords = Db::table('ernaList')->where($map2)->count();



//$totalRecordwithFilter：统计DataTable符合筛选条件的条目的数量统计
$totalRecordwithFilter = Db::table('ernaList')->where($map2)->
//调用闭包函数query并且允许使用外部变量searchQuery
where(function ($query) use ($searchQuery) {
    $query->whereOr([
        ["pos", "like", $searchQuery],
    ]);
})->count();



$result2 = Db::table('ernaList')->where($map2)->
where(function ($query) use ($searchQuery) {
    $query->whereOr([
        ["pos", "like", $searchQuery],
    ]);
})->field('ID, pos, chrom, start, end, dataset')->
order( $columnName.' '.$columnSortOrder)->
limit($row,$rowperpage)->select();


//$data: 空数组用来分装dataTable参数
$data = array();

$response3 = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $result2
);

echo json($response3);
