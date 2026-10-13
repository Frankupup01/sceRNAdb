<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

//表单输入
$draw = $_POST['draw']; //绘制计数器。这个是用来确保Ajax从服务器返回的是相对应的（Ajax是异步的，因此返回的顺序是不确定的）
$row = $_POST['start']; //分页第一条数据的起始位置，比如0代表第一条数据
$rowperpage = $_POST['length']; // Rows display per page| 表格在当前绘制显示多少条数据。服务器返回的记录将等于该数目，除非服务器返回的记录数较少。
$columnIndex = $_POST['order'][0]['column']; // Column index | 那些列需要应用排序。这是对columns 数组的索引引用，并且也会提交到服务端
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name | columns 绑定的数据源，由 columns.dataOption 定义
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc | 对应列的排序方向。 desc 降序， asc升序。
$searchValue = $_POST['search']['value']; // Search value | 全局的搜索值。值会应用到每一列

$searchQuery = '%'.$searchValue.'%';


$sid = $_POST['sid'];

$map = [];
$map[] = ['dataset', '=', $sid];

$totalRecords = Db::table('ernaList')->where($map)->count();


$totalRecordwithFilter = Db::table('ernaList')->where($map)->
where(function ($query) use ($searchQuery) {
    $query->whereOr([
        ["ID", "like", $searchQuery],
        ["chrom", "like", $searchQuery],
    ]);
})->count();



$result = Db::table('ernaList')->where($map)->

//调用闭包函数query并且允许使用外部变量searchQuery
where(function ($query) use ($searchQuery) {
    $query->whereOr([
        ["ID", "like", $searchQuery],
        ["chrom", "like", $searchQuery],
    ]);
})->
//field('ID,chrom,start,end,annotation,dataset')->
order($columnName . ' ' . $columnSortOrder)->
limit($row, $rowperpage)->select();



// Step 2: 查询 TargetGene 表
$targetGeneMap = [
    //['Name', 'in', $annotations],
    ['Dataset', '=', $sid],
];

$targetGenes = Db::table('TargetGene')
    ->where($targetGeneMap)
    ->select();


// Step 1: 创建一个以`Name`为键的目标基因字典
$targetGeneDict = [];
foreach ($targetGenes as $gene) {
    $key = $gene['Name'] . '_' . $gene['Dataset'];
    $targetGeneDict[$key] = $gene['Num']; // 假设你要的是Num字段
}

// Step 2: 合并数据
foreach ($result as &$item) {
    // 拼接用于匹配的 key
    $key = $item['annotation'] . '_' . $item['dataset'];

    // 检查 targetGeneDict 中是否有匹配的 Num
    $item['Num'] = isset($targetGeneDict[$key]) ? $targetGeneDict[$key] : 0;

    // 添加其他需要的列（例如 Genes 和 result）
    $item['result'] = 1;  // 固定列，值为 1

    // 如果有匹配的 TargetGene，获取 Genes 列的值
    $matchingTargetGene = array_filter($targetGenes, function($target) use ($item) {
        return $target['Dataset'] == $item['dataset'] && $target['Name'] == $item['annotation'];
    });

    if (!empty($matchingTargetGene)) {
        $genes = array_values($matchingTargetGene)[0]['Genes'];
        $item['Genes'] = $genes;
    } else {
        $item['Genes'] = null;  // 如果没有匹配到数据
    }
}

/*
foreach ($result as &$item) {
    // 假设你已经根据 'annotation' 和 'dataset' 匹配了 TargetGene 数据
    $matchingTargetGene = array_filter($targetGenes, function($target) use ($item) {
        return $target['Dataset'] == $item['dataset'] && $target['Name'] == $item['annotation'];
    });

    // 如果找到了匹配的 TargetGene 数据
    if (!empty($matchingTargetGene)) {
        // 获取 Genes 列的内容
        $genes = array_values($matchingTargetGene)[0]['Genes'];
        // 添加 Genes 列到当前项
        $item['Genes'] = $genes;
    } else {
        // 如果没有匹配的 TargetGene 数据，可以选择设置为空或其他默认值
        $item['Genes'] = null;
    }

    // 添加其他需要的列（如 Num）
    $key = $item['ID'] . '_' . $item['annotation'];  // 或者使用其他字段来匹配
    $item['Num'] = isset($targetGeneDict[$key]) ? $targetGeneDict[$key] : 0;

    // 添加常量列 'result'，值为 1
    //$item['result'] = 1;
}*/


//$data
$data = array();

$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $result
);


echo json_encode($response, JSON_UNESCAPED_UNICODE);
