<?php
session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

// 接收 POST 参数
$keyword = $_POST['keyword'] ?? '';

// DataTables 参数
$draw = $_POST['draw'] ?? 1;
$row = $_POST['start'] ?? 0;
$rowperpage = $_POST['length'] ?? 10;
$columnIndex = $_POST['order'][0]['column'] ?? 0;
$columnName = $_POST['columns'][$columnIndex]['data'] ?? 'Species';
$columnSortOrder = $_POST['order'][0]['dir'] ?? 'asc';
$searchValue = $_POST['search']['value'] ?? '';

$searchQuery = '%'.$searchValue.'%';
$keywordQuery = '%'.$keyword.'%';

// ---------- 总记录数 ----------
$totalRecords = Db::table('OverallSummary')->count();

// ---------- 符合条件的记录数 ----------
$totalRecordwithFilter = Db::table('OverallSummary')
    ->where(function ($query) use ($keywordQuery) {
        $query->whereOr([
            ["Species", "like", $keywordQuery],
            ["Reference", "like", $keywordQuery],   // Reference = Study
            ["Accessions", "like", $keywordQuery],   // DatasetID = Accessions
            ["Tissue", "like", $keywordQuery],
            ["Technology", "like", $keywordQuery],
        ]);
    })
    ->where(function ($query) use ($searchQuery) {
        $query->whereOr([
            ["Species", "like", $searchQuery],
            ["Reference", "like", $searchQuery],
            ["Accessions", "like", $searchQuery],
            ["Tissue", "like", $searchQuery],
            ["Technology", "like", $searchQuery],
        ]);
    })
    ->count();

// ---------- 查询结果 ----------
$result = Db::table('OverallSummary')
    ->where(function ($query) use ($keywordQuery) {
        $query->whereOr([
            ["Species", "like", $keywordQuery],
            ["Reference", "like", $keywordQuery],
            ["Accessions", "like", $keywordQuery],
            ["Tissue", "like", $keywordQuery],
            ["Technology", "like", $keywordQuery],
        ]);
    })
    ->where(function ($query) use ($searchQuery) {
        $query->whereOr([
            ["Species", "like", $searchQuery],
            ["Reference", "like", $searchQuery],
            ["Accessions", "like", $searchQuery],
            ["Tissue", "like", $searchQuery],
            ["Technology", "like", $searchQuery],
        ]);
    })
    ->field('Species, Reference, Accessions, Tissue, Technology')
    ->order($columnName . ' ' . $columnSortOrder)
    ->limit($row, $rowperpage)
    ->select();

// ---------- 返回 JSON ----------
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $result
);

echo json_encode($response, JSON_UNESCAPED_UNICODE);