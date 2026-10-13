<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

$select_specie = $_POST['select_specie'];
$select_experiment = $_POST['select_experiment'];
$select_tissue = $_POST['select_tissue'];
$select_cell = $_POST['select_cell'];

$specie_map = [
    'Homo Sapiens' => 'Homo sapiens',
    'Mus Musculus' => 'Mus musculus',
    'HUMAN' => 'Homo sapiens',
    'MOUSE' => 'Mus musculus'
];

if (array_key_exists($select_specie, $specie_map)) {
    $select_specie = $specie_map[$select_specie];
}

$map = [];
$map[] = ['Species', '=', $select_specie];
$map[] = ['Technology', '=', $select_experiment];

// 核心修复：当接收到 'NA' (即前端的 Others) 时，
// 让 SQL 同时匹配空字符串 ''、大写 'NA' 和小写 'na'
if ($select_tissue === 'NA') {
    $map[] = ['Tissue', 'in', ['', 'NA', 'na']];
} else {
    $map[] = ['Tissue', '=', $select_tissue];
}

if ($select_cell === 'NA') {
    $map[] = ['CellType', 'in', ['', 'NA', 'na']];
} else {
    $map[] = ['CellType', '=', $select_cell];
}

$result = Db::table('OverallSample')->where($map)
    ->field('SampleID')->select();

// 从查询结果中提取 SampleID
$sample_ids = [];
foreach ($result as $row) {
    if (!empty($row['SampleID'])) {
        $sample_ids[] = $row['SampleID'];
    }
}

// 去重处理
$unique_sample_ids = array_unique($sample_ids);

// 格式化数组并返回
$response = array_values($unique_sample_ids);

echo json_encode($response);
?>