<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

$select_specie = $_POST['select_specie'];
//$select_specie = 'Gallus gallus';
//$select_specie = 'Homo Sapiens';

// 物种名称转换数组
//$specie_aliases = [
//    'Homo Sapiens' => 'Human',
//    'Mus Musclus' => 'Mouse'
//];

// 将前端传入的物种名称转换为数据表中的对应名称
$specie_map = [
    'Homo sapiens' => ['Homo sapiens','Mus musculus/Homo sapiens'], // 包含 Human/Mouse 的结果
    'Mus musculus' => ['Mus musculus', 'Mus musculus/Homo sapiens'], // 包含 Human/Mouse 的结果
    // 其他物种可以根据需要添加
];

//  判断物种是否需要转换
if (array_key_exists($select_specie, $specie_map)) {
    // 如果需要转换，取映射的值
    $species_to_query = $specie_map[$select_specie];
} else {
    // 如果不需要转换，直接使用原物种名称
    $species_to_query = [$select_specie];
}



$map = [];

// 根据物种映射，构造查询条件
//$species_to_query = $specie_map[$select_specie];
$map[] = ['Species', 'IN', $species_to_query];




$result = Db::table('OverallSample')->where($map)->field('Technology')->select();

// 从查询结果中提取 project_id 值
$tech_ids = [];
foreach ($result as $row) {
    $tech_ids[] = $row['Technology'];  // 假设您的字段名是 project_id
}

// 去重处理
$unique_tech_ids = array_unique($tech_ids);

// 格式化为数组形式
$response = array_values($unique_tech_ids);  // 保证返回的数组索引从 0 开始

// 返回 JSON 格式
echo json_encode($response);



/*
$data = array();
foreach ($result as $row) {
    // 根据查询的字段将结果添加到 $data 数组中
    $data[] = array_values($row); // 使用 array_values 将结果转换为值的数组
}

$response = array(
    "aaData" => $result
);

echo json_encode($response, JSON_UNESCAPED_UNICODE);
*/
