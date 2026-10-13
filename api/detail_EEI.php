<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__) . "{$DS}app{$DS}Db.class.php";
require dirname(__DIR__) . "{$DS}app{$DS}Func.php";


function applyRegionFilter($query, $chromosome, $start_position, $end_position)
{
    // enhancer1 overlap
    $query->where(function($q) use ($chromosome, $start_position, $end_position) {
        $q->where([
            ['enhancer1_chrom', '=', $chromosome],
            ['enhancer1_start', '<', $end_position],
            ['enhancer1_end',   '>', $start_position]
        ]);
    }, 'OR');

    // enhancer2 overlap
    $query->where(function($q) use ($chromosome, $start_position, $end_position) {
        $q->where([
            ['enhancer2_chrom', '=', $chromosome],
            ['enhancer2_start', '<', $end_position],
            ['enhancer2_end',   '>', $start_position]
        ]);
    }, 'OR');

    return $query;
}


function applySearchFilter($query, $searchQuery)
{
    if ($searchQuery === '%%') return $query;

    $query->whereOr([ ['enhancer1_region', 'like', $searchQuery] ]);
    $query->whereOr([ ['enhancer1_chrom',  'like', $searchQuery] ]);
    $query->whereOr([ ['enhancer2_region', 'like', $searchQuery] ]);
    $query->whereOr([ ['enhancer2_chrom',  'like', $searchQuery] ]);
    $query->whereOr([ ['cell_line',        'like', $searchQuery] ]);
    $query->whereOr([ ['source',           'like', $searchQuery] ]);

    return $query;
}


// -------------------- 基础参数安全处理 --------------------
$draw        = intval($_POST['draw'] ?? 0);
$row         = intval($_POST['start'] ?? 0);
$rowperpage  = intval($_POST['length'] ?? 10);

$columnIndex = intval($_POST['order'][0]['column'] ?? 0);
$columnName  = $_POST['columns'][$columnIndex]['data'] ?? 'enhancer1_start';
$columnSortOrder = ($_POST['order'][0]['dir'] ?? 'asc') === 'desc' ? 'desc' : 'asc';

$searchValue = $_POST['search']['value'] ?? '';
$searchQuery = '%' . $searchValue . '%';


// -------------------- POS 参数校验 --------------------
$select_pos = $_POST['select_pos'] ?? '';

if (!preg_match('/^([a-zA-Z0-9]+):(\d+)-(\d+)$/', $select_pos, $matches)) {
    echo json_encode(["error" => "Invalid format for position"]);
    exit;
}

$chromosome = $matches[1];
$start_position = (int)$matches[2];
$end_position   = (int)$matches[3];


// -------------------- 重置 Query --------------------
function newQuery($table) {
    Db::$where = '';
    Db::$order = '';
    Db::$limit = '';
    Db::$field = '*';
    Db::$executeData = null;
    return Db::table($table);
}





// -------------------- 计数：全部记录数 --------------------
$totalRecords = applyRegionFilter(
    newQuery('human_EEI'),
    $chromosome, $start_position, $end_position
)->count();


// -------------------- 计数：过滤后记录数 --------------------
$totalRecordwithFilter = applySearchFilter(
    applyRegionFilter(
        newQuery('human_EEI'),
        $chromosome, $start_position, $end_position
    ),
    $searchQuery
)->count();


// -------------------- 获取结果 --------------------
$result = applySearchFilter(
    applyRegionFilter(
        newQuery('human_EEI'),
        $chromosome, $start_position, $end_position
    ),
    $searchQuery
)
    ->field('
    enhancer1_region, enhancer1_chrom, enhancer1_start, enhancer1_end, enhancer1_length,
    enhancer2_region, enhancer2_chrom, enhancer2_start, enhancer2_end, enhancer2_length,
    cell_line, source
')
    ->order($columnName . ' ' . $columnSortOrder)
    ->limit($row, $rowperpage)
    ->select();


// -------------------- 输出 --------------------
$response = [
    "draw" => $draw,
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $result
];

echo json_encode($response, JSON_UNESCAPED_UNICODE);