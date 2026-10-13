<?php


session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__) . "{$DS}app{$DS}Db.class.php";
require dirname(__DIR__) . "{$DS}app{$DS}Func.php";

$select_pos = $_POST['select_pos'];
//$select_pos = 'chr10:65501113-75501632';

//表单输入
$draw = $_POST['draw']; //绘制计数器。这个是用来确保Ajax从服务器返回的是相对应的（Ajax是异步的，因此返回的顺序是不确定的）
$row = $_POST['start']; //分页第一条数据的起始位置，比如0代表第一条数据
$rowperpage = $_POST['length']; // Rows display per page| 表格在当前绘制显示多少条数据。服务器返回的记录将等于该数目，除非服务器返回的记录数较少。
$columnIndex = $_POST['order'][0]['column']; // Column index | 那些列需要应用排序。这是对columns 数组的索引引用，并且也会提交到服务端
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name | columns 绑定的数据源，由 columns.dataOption 定义
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc | 对应列的排序方向。 desc 降序， asc升序。
$searchValue = $_POST['search']['value']; // Search value | 全局的搜索值。值会应用到每一列

$searchQuery = '%' . $searchValue . '%';

// 正则提取位置
if (preg_match('/^([a-zA-Z0-9]+):(\d+)-(\d+)$/', $select_pos, $matches)) {
    // $matches[1] => 染色体名称 (例如 chr1)
    // $matches[2] => 起始位置 (例如 1438079)
    // $matches[3] => 结束位置 (例如 1443214)

    $chromosome = $matches[1];
    $start_position = (int)$matches[2]; // 转换为整数
    $end_position = (int)$matches[3];   // 转换为整数

    // 查询条件
    $map = [];
    $map[] = ['chrom', '=', $chromosome];
    $map[] = ['start', '>', $start_position];
    $map[] = ['end', '<', $end_position];

    // 记录总数
    $totalRecords = Db::table('mm39_miRNA')->where($map)->count();

    // 带搜索条件的记录数
    $totalRecordwithFilter = Db::table('mm39_miRNA')->where($map)
        ->where(function ($query) use ($searchQuery) {
            $query->whereOr([
                ['chrom', 'like', $searchQuery],
                ['start', 'like', $searchQuery],
                ['end', 'like', $searchQuery],
                ['strand', 'like', $searchQuery],
                ['mirBase', 'like', $searchQuery],
                ['Name', 'like', $searchQuery],
                ['Derives_from', 'like', $searchQuery],
            ]);
        })
        ->count();

    // 查询数据
    $result = Db::table('mm39_miRNA')->where($map)
        ->where(function ($query) use ($searchQuery) {
            $query->whereOr([
                ['chrom', 'like', $searchQuery],
                ['start', 'like', $searchQuery],
                ['end', 'like', $searchQuery],
                ['strand', 'like', $searchQuery],
                ['mirBase', 'like', $searchQuery],
                ['Name', 'like', $searchQuery],
                ['Derives_from', 'like', $searchQuery],
            ]);
        })
        ->field('chrom, start, end, strand, mirBase, Name, Derives_from')
        ->order($columnName . ' ' . $columnSortOrder)
        ->limit($row, $rowperpage)
        ->select();

    // 返回结果
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $result
    );

    echo json_encode($response, JSON_UNESCAPED_UNICODE);

} else {
    echo "Invalid format for position.";
}
