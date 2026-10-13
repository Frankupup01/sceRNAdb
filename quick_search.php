<?php
include "./templates/base.php";
?>

<style>
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }
    #mainContain {
        flex: 1 0 auto;
    }
    footer, .footer {
        margin-top: auto;
    }
    .hidden {
        display: none;
    }
    #marker_features a {
        text-decoration: none;
    }
</style>

<?php
include "./templates/header.php";
?>
<body id="body">

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 mx-auto">

            <!-- OverallSummary 表 -->
            <div class="card hidden" id="card_summary" style="margin-top: 20px;margin-bottom: 20px; text-align: center;">
                <div class="card-header" style="height: 50px; color: #0362a4;font-size: larger; font-weight: bolder">
                    Result of dataset
                </div>
                <div class="card-body">
                    <table id="marker_features" class="table table-hover table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th>Species</th>
                            <th>Accessions</th>
                            <th>Dataset Summary</th>
                            <th>Tissue</th>
                            <th>Platform</th>
                            <th>Contributors</th>
                            <th>Technology</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <!-- OverallSample 表 -->
            <div class="card hidden" id="card_sample" style="margin-top: 20px;margin-bottom: 20px; text-align: center;">
                <div class="card-header" style="height: 50px; color: #0362a4;font-size: larger; font-weight: bolder">
                    Result of sample
                </div>
                <div class="card-body">
                    <table id="tc_sample" class="table table-hover table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th>Species</th>
                            <th>Dataset ID</th>
                            <th>Sample ID</th>
                            <th>Tissue</th>
                            <th>Disease</th>
                            <th>Technology</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="noResultModal" tabindex="-1" aria-labelledby="noResultLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noResultLabel">Notice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="关闭"></button>
            </div>
            <div class="modal-body">
                Sorry, sceRNAdb did not retrieve the content you want to search,
                please check the case and enter again or select other content for input.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="okRedirectBtn">OK</button>
            </div>
        </div>
    </div>
</div>


<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let keyword = params.get("keyword") || "";

    // 用于检测两个表的返回结果
    let summaryHasData = false;
    let sampleHasData = false;
    let summaryLoaded = false;
    let sampleLoaded = false;

    // 页面加载完成时绑定按钮事件
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("okRedirectBtn").addEventListener("click", function () {
            window.location.href = "search_iframe.php";
        });
    });

    function checkNoResults() {
        // 确保两个表都加载完了才检查
        if (summaryLoaded && sampleLoaded) {
            if (!summaryHasData && !sampleHasData) {
                var noResultModal = new bootstrap.Modal(document.getElementById('noResultModal'));
                noResultModal.show();
            }
        }
    }

    // Summary 表
    let summaryTable = $('#marker_features').DataTable({
        processing: true,
        serverSide: true,
        serverMethod: 'post',
        ajax: {
            url: './api/search_quick.php',
            type: 'POST',
            data: function (d) {
                d.keyword = keyword;
                d.table = 'OverallSummary';
            },
            dataSrc: function (json) {
                summaryHasData = json.iTotalDisplayRecords > 0;
                summaryLoaded = true;
                if (summaryHasData) {
                    $('#card_summary').removeClass('hidden');
                } else {
                    $('#card_summary').addClass('hidden');
                }
                checkNoResults();
                return json.aaData;
            }
        },
        pageLength: 10,
        dom: "<'row'<'col-sm-12 text-end'f>>rt<'row'<'col-sm-12'p>>",
        columns: [
            { data: 'Species' },
            { data: 'Accessions',
                render: function ( data, type, row ) {
                    return '<a href="detail_study.php?sid=' + data + '" style="text-decoration:none;">' + data + '</a>';
                }
            },
            { data: 'Reference' },
            { data: 'Tissue' },
            { data: 'Platform' },
            { data: 'Contributors' },
            { data: 'Technology' }
        ]
    });

    // Sample 表
    let sampleTable = $('#tc_sample').DataTable({
        processing: true,
        serverSide: true,
        serverMethod: 'post',
        ajax: {
            url: './api/search_quick.php',
            type: 'POST',
            data: function (d) {
                d.keyword = keyword;
                d.table = 'OverallSample';
            },
            dataSrc: function (json) {
                sampleHasData = json.iTotalDisplayRecords > 0;
                sampleLoaded = true;
                if (sampleHasData) {
                    $('#card_sample').removeClass('hidden');
                } else {
                    $('#card_sample').addClass('hidden');
                }
                checkNoResults();
                return json.aaData;
            }
        },
        pageLength: 10,
        dom: "<'row'<'col-sm-12 text-end'f>>rt<'row'<'col-sm-12'p>>",
        columns: [
            { data: 'Species' },
            { data: 'DatasetID',
                render: function ( data, type, row ) {
                    return '<a href="detail_study.php?sid=' + data + '" style="text-decoration:none;">' + data + '</a>';
                }
            },
            { data: 'SampleID',
                render: function ( data, type, row ) {
                    return '<a href="detail_study.php?sid=' + row['DatasetID'] + '" style="text-decoration:none;">' + data + '</a>';
                }
            },
            { data: 'Tissue' },
            { data: 'Disease' },
            { data: 'Technology' }
        ]
    });
</script>

<?php
include "./templates/footer.php";
?>