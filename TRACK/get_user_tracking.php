<?php
// TRACK/get_user_tracking.php
session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

// 查询所有国家访问记录
$rows = Db::table('user_tracking')->field('country')->select();

// PHP 聚合
$countryCount = [];
foreach ($rows as $row) {
    $c = $row['country'] ?: 'Unknown';
    $countryCount[$c] = ($countryCount[$c] ?? 0) + 1;
}

// 转换为 ECharts JSON
$result = [];
foreach ($countryCount as $c => $count) {
    $result[] = ['name' => $c, 'value' => $count];
}

header('Content-Type: application/json');
echo json_encode($result);
?>