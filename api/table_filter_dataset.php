<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

$select_specie = $_POST['select_specie'];
$select_experiment = $_POST['select_experiment'];
$select_tissue = $_POST['select_tissue'];

// 表单输入
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length'];
$columnIndex = $_POST['order'][0]['column'];
$columnName = $_POST['columns'][$columnIndex]['data'];
$columnSortOrder = $_POST['order'][0]['dir'];
$searchValue = $_POST['search']['value'];

$searchQuery = '%'.$searchValue.'%';

$map = [];

if (!empty($select_specie)) {
    if ($select_specie === 'NA') {
        $map[] = ['Species', 'in', ['', 'NA', 'na']];
    } else {
        $map[] = ['Species', '=', $select_specie];
    }
}
if (!empty($select_experiment)) {
    if ($select_experiment === 'NA') {
        $map[] = ['Technology', 'in', ['', 'NA', 'na']];
    } else {
        $map[] = ['Technology', '=', $select_experiment];
    }
}
if (!empty($select_tissue)) {
    if ($select_tissue === 'NA') {
        $map[] = ['Tissue', 'in', ['', 'NA', 'na']];
    } else {
        $map[] = ['Tissue', '=', $select_tissue];
    }
}

// -------------------------------------------------------------
// 核心逻辑 1：解决搜索问题 (从 OverallSample 中预查 Disease)
// -------------------------------------------------------------
$matched_dataset_ids = [];
if (!empty($searchValue)) {
    // 疾病字段在 OverallSample 中，且关联列叫 DatasetID
    $disease_matches = Db::table('OverallSample')
        ->where([['Disease', 'like', $searchQuery]])
        ->select();

    if ($disease_matches) {
        foreach ($disease_matches as $dm) {
            if (!empty($dm['DatasetID'])) {
                $matched_dataset_ids[] = $dm['DatasetID'];
            }
        }
        $matched_dataset_ids = array_unique($matched_dataset_ids);
    }
}

// -------------------------------------------------------------
// 核心逻辑 2：主体统计与查询 (只在 OverallSummary 中查，字段只有 Accessions)
// -------------------------------------------------------------
// 1. 总记录数
$totalRecords = Db::table('OverallSummary')->where($map)->count();

// 2. 过滤后的记录数
$totalRecordwithFilter = Db::table('OverallSummary')->where($map)
    ->where(function ($query) use ($searchQuery, $matched_dataset_ids) {
        $orConditions = [
            ["Species", "like", $searchQuery],
            ["Reference", "like", $searchQuery],
            ["Accessions", "like", $searchQuery],
            ["Tissue", "like", $searchQuery],
            ["Technology", "like", $searchQuery],
            ["Platform", "like", $searchQuery]
        ];
        // 如果在 Sample 表查到了匹配的疾病，用 Accessions 去接应它
        if (!empty($matched_dataset_ids)) {
            $orConditions[] = ["Accessions", "in", $matched_dataset_ids];
        }
        $query->whereOr($orConditions);
    })->count();

// 3. 提取主体数据
// 如果前端点击了 Disease 列头进行排序，我们退回默认的 Sort_Index 排序，防止数据库报错
$orderField = ($columnName === 'Disease') ? 'Sort_Index' : $columnName;

$result = Db::table('OverallSummary')->where($map)
    ->where(function ($query) use ($searchQuery, $matched_dataset_ids) {
        $orConditions = [
            ["Species", "like", $searchQuery],
            ["Reference", "like", $searchQuery],
            ["Accessions", "like", $searchQuery],
            ["Tissue", "like", $searchQuery],
            ["Technology", "like", $searchQuery],
            ["Platform", "like", $searchQuery]
        ];
        if (!empty($matched_dataset_ids)) {
            $orConditions[] = ["Accessions", "in", $matched_dataset_ids];
        }
        $query->whereOr($orConditions);
    })
    ->field('Species, Reference, Accessions, Tissue, Technology, Platform, Sort_Index')
    ->order($orderField . ' ' . $columnSortOrder)
    ->limit($row, $rowperpage)
    ->select();

// -------------------------------------------------------------
// 核心逻辑 3：将 Disease 数据拼接到结果中
// -------------------------------------------------------------
if ($result) {
    foreach ($result as $key => $val) {
        // OverallSummary 的主键叫 Accessions
        $accession_id = isset($val['Accessions']) ? $val['Accessions'] : '';

        if (!empty($accession_id)) {
            // 去 OverallSample 表中查询疾病，条件是 OverallSample.DatasetID = OverallSummary.Accessions
            $sample_data = Db::table('OverallSample')
                ->where([['DatasetID', '=', $accession_id]])
                ->select();

            $disease_arr = [];
            if ($sample_data) {
                foreach ($sample_data as $sd) {
                    if (!empty($sd['Disease']) && $sd['Disease'] !== 'NA' && $sd['Disease'] !== 'na') {
                        $disease_arr[] = trim($sd['Disease']);
                    }
                }
            }

            $disease_arr = array_unique($disease_arr);
            // 拼装成字符串，赋值给当前行
            $result[$key]['Disease'] = empty($disease_arr) ? 'NA' : implode(', ', $disease_arr);
        } else {
            $result[$key]['Disease'] = 'NA';
        }
    }
} else {
    $result = [];
}

// 4. 返回前端
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $result
);

echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>










