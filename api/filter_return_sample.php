<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

$select_dataset = $_POST['select_dataset'];
$select_specie = $_POST['select_specie'];
$select_tissue = $_POST['select_tissue'];
$select_cell = $_POST['select_cell'];
$select_disease = $_POST['select_disease'];
$select_treatment = $_POST['select_treatment'];
$select_experiment = $_POST['select_experiment'];



$map = [];

if (!empty($select_dataset)) {
    $map[] = ['DatasetID', '=', $select_dataset];
}

// 判断并添加物种的查询条件
if (!empty($select_specie)) {
    $map[] = ['Species', '=', $select_specie];
}

// 判断并添加实验和组织的查询条件
if (!empty($select_experiment)) {
    $map[] = ['Technology', '=', $select_experiment];
}

if (!empty($select_tissue)) {
    $map[] = ['Tissue', '=', $select_tissue];
}

if (!empty($select_cell)) {
    $map[] = ['CellType', '=', $select_cell];
}

if (!empty($select_disease)) {
    $map[] = ['Disease', '=', $select_disease];
}

if (!empty($select_treatment)) {
    $map[] = ['Treatment', '=', $select_treatment];
}




$all_result = Db::table('OverallSample')->where($map)->
field('DatasetID,  Species,  Tissue, CellType, Disease, Technology')->select();


//实现filter的参数传递
//第一步，获取符合该条件下的所有条目，也就是$result去除order、limit后的所有select
//统计$all_result中，每个column包含的item和number

// 假设 $all_result 是从数据库获取的结果对象

// 初始化一个空数组来存储每列中的选项和数量
$columnOptionsCount = [];

// 遍历 $result 对象
foreach ($all_result as $row) {
    foreach ($row as $key => $value) {
        // 检查该列的选项是否已经存在，如果不存在则初始化为0
        if (!isset($columnOptionsCount[$key][$value])) {
            $columnOptionsCount[$key][$value] = 0;
        }

        // 增加该选项的计数
        $columnOptionsCount[$key][$value]++;
    }
}

// 将 $columnOptionsCount 转换为 JSON 格式
$columnOptionsCountJSON = json_encode($columnOptionsCount,JSON_UNESCAPED_UNICODE);

// 将 JSON 数据发送到前端
echo $columnOptionsCountJSON;
