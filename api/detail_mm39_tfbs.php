<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

$select_pos = $_POST['select_pos'];
$select_tissue = $_POST['select_tissue'] ?? '';  // 新增 tissue 参数

$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length'];
$columnIndex = $_POST['order'][0]['column'];
$columnName = $_POST['columns'][$columnIndex]['data'];
$columnSortOrder = $_POST['order'][0]['dir'];
$searchValue = $_POST['search']['value'];
$searchQuery = '%'.$searchValue.'%';

// 使用正则表达式解析位置
if (preg_match('/^([a-zA-Z0-9]+):(\d+)-(\d+)$/', $select_pos, $matches)) {

    $chromosome = $matches[1];
    $start_position = (int)$matches[2];
    $end_position = (int)$matches[3];

    // 基本查询条件
    $map = [
        ['chrom', '=', $chromosome],
        ['start', '>', $start_position],
        ['end', '<', $end_position],
    ];

    // tissue 条件
    if (!empty($select_tissue)) {
        $map[] = ['tissue', 'like', '%' . strtolower($select_tissue) . '%', 'OR', 'LOWER'];
    }

    // 总记录数
    $totalRecords = Db::table('mm39_tfbs')->where($map)->count();

    // 搜索过滤后的记录数
    $totalRecordwithFilter = Db::table('mm39_tfbs')->where($map)
        ->where(function ($query) use ($searchQuery) {
            $query->whereOr([
                ['chrom', 'like', $searchQuery],
                ['start', 'like', $searchQuery],
                ['end', 'like', $searchQuery],
                ['target', 'like', $searchQuery],
                ['tissue', 'like', $searchQuery],
                ['eid', 'like', $searchQuery],
                ['software', 'like', $searchQuery]
            ]);
        })->count();

    // 获取分页数据
    $result = Db::table('mm39_tfbs')->where($map)
        ->where(function ($query) use ($searchQuery) {
            $query->whereOr([
                ['chrom', 'like', $searchQuery],
                ['start', 'like', $searchQuery],
                ['end', 'like', $searchQuery],
                ['target', 'like', $searchQuery],
                ['tissue', 'like', $searchQuery],
                ['eid', 'like', $searchQuery],
                ['software', 'like', $searchQuery]
            ]);
        })
        ->field('chrom, start, end, target, tissue, eid, software')
        ->order($columnName . ' ' . $columnSortOrder)
        ->limit($row, $rowperpage)
        ->select();

    // 返回 DataTable 所需 JSON
    $response = [
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $result
    ];

    echo json_encode($response, JSON_UNESCAPED_UNICODE);

} else {
    echo "Invalid format for position.";
}
