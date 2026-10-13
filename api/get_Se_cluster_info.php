<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";



$sid = $_POST['sid'];



$result = Db::table('cluster_se')->where([
    ['Dataset','=',$sid],
    //['Dataset','=','GSE83139'],
])->field('Cluster, Cell, SeRNA')->select();

foreach ($result as $item) {
    $clusters[] = $item['Cluster'];
    $cells[] = $item['Cell'];
    $SeRNAs[] = $item['SeRNA'];
}

$res_list = json_encode(['clusters' => $clusters, 'cells' => $cells, 'SeRNAs' => $SeRNAs]);

//echo $result;
echo $res_list;
