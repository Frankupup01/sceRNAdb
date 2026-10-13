<?php
session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

$keyword = $_POST['keyword'] ?? '';
$table = $_POST['table'] ?? 'OverallSummary';

// DataTables 参数
$draw = $_POST['draw'] ?? 1;
$row = $_POST['start'] ?? 0;
$rowperpage = $_POST['length'] ?? 10;
$columnIndex = $_POST['order'][0]['column'] ?? 0;
$columnName = $_POST['columns'][$columnIndex]['data'] ?? '';
$columnSortOrder = $_POST['order'][0]['dir'] ?? 'asc';

// 模糊匹配
$keywordQuery = "%$keyword%";

if ($table === 'OverallSummary') {
    $fields = 'Species, Accessions, Reference, Tissue, Platform, Contributors, Technology';
    $query = Db::table('OverallSummary');
    $query = $query->whereOr([
        ["Species", "like", $keywordQuery],
        ["Accessions", "like", $keywordQuery],
        ["Reference", "like", $keywordQuery],
        ["Tissue", "like", $keywordQuery],
        ["Platform", "like", $keywordQuery],
        ["Contributors", "like", $keywordQuery],
        ["Technology", "like", $keywordQuery],
    ]);
} else { // OverallSample
    $fields = 'Species, DatasetID, SampleID, Tissue, Disease, Technology';
    $query = Db::table('OverallSample');
    $query = $query->whereOr([
        ["Species", "like", $keywordQuery],
        ["DatasetID", "like", $keywordQuery],
        ["SampleID", "like", $keywordQuery],
        ["Tissue", "like", $keywordQuery],
        ["Disease", "like", $keywordQuery],
        ["Technology", "like", $keywordQuery],
    ]);
}

// 总数
$totalRecords = $query->count();
// 数据
$result = $query->field($fields)
    ->order($columnName.' '.$columnSortOrder)
    ->limit($row, $rowperpage)
    ->select();

$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecords,
    "aaData" => $result
);

echo json_encode($response, JSON_UNESCAPED_UNICODE);