<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

$select_specie = $_POST['select_specie'];
$select_experiment = $_POST['select_experiment'];
$select_tissue = $_POST['select_tissue']; // 新增：接收前端传来的 Tissue 参数

$specie_map = [
    'Homo Sapiens' => 'Homo sapiens',
    'Mus Musculus' => 'Mus musculus',
    'HUMAN' => 'Homo sapiens',
    'MOUSE' => 'Mus musculus'
];

// 如果前端传入的物种在映射中有对应关系，则使用映射后的值
if (array_key_exists($select_specie, $specie_map)) {
    $select_specie = $specie_map[$select_specie];
}

// （可选）如果前端传来 'NA'，而你数据库里实际存的是空字符串 ''，请取消下面这行注释：
// if ($select_tissue === 'NA') { $select_tissue = ''; }

// 构造查询条件
$map = [];
$map[] = ['Species', '=', $select_specie];
$map[] = ['Technology', '=', $select_experiment];
$map[] = ['Tissue', '=', $select_tissue]; // 新增：加入 Tissue 筛选约束

// 请确认数据库里对应的列名是 'Tissue'，如果不是请修改上面的字段名
$result = Db::table('OverallSample')->where($map)
    ->field('CellType')->select();

// 从查询结果中提取 CellType 值
$cell_types = [];
foreach ($result as $row) {
    $cell_types[] = $row['CellType'];
}

// 去重处理
$unique_cell_types = array_unique($cell_types);

// 格式化为数组形式，保证返回的数组索引从 0 开始
$response = array_values($unique_cell_types);

// 返回 JSON 格式
echo json_encode($response);

?>