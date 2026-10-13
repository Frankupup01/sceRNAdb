<?php
include "./templates/base.php";
?>

<style>
    /* 导航标签容器样式 */
    .nav-tabs {
        display: flex;                /* 水平布局 */
        list-style: none;             /* 去掉默认列表样式 */
        padding: 0;                   /* 去掉内边距 */
        margin: 0;                    /* 去掉外边距 */
        border-bottom: 2px solid #ffffff;  /* 下方边框 #ddd;*/
    }

    /* 单个导航项样式 */
    .nav-tabs .nav-item {
        margin-right: 10px;           /* 间距 */
    }

    /* 链接基础样式 */
    .nav-tabs .nav-item a {
        display: inline-block;        /* 行内块 */
        padding: 10px 20px;           /* 内边距 */
        margin-bottom: 5px;
        text-decoration: none;        /* 去掉下划线 */
        color: #333;                  /* 默认文字颜色 */
        border: 1px solid transparent; /* 初始无边框 */
        border-color: #dec2c2;
        border-radius: 0 0 0 0 ;   /* 上圆角 5px 5px 5px 5px;*/
        background-color: #ffffff;    /* 默认背景色 #f8f9fa*/
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* 添加阴影 */
        transition: all 0.3s ease;    /* 平滑过渡效果 */
    }

    /* 激活状态 */
    .nav-tabs .nav-item.active a {
        background-color: #286ea7;    /* 激活背景色 #286ea7 #629ad5*/
        color: white;                 /* 激活文字颜色 */
        border-color: #007bff #007bff #fff; /* 激活边框 */
        font-weight: bold;            /* 字体加粗 */
    }

    /* 悬停状态 */
    .nav-tabs .nav-item a:hover {
        background-color: #e9ecef;    /* 悬停背景色 */
        color: #007bff;               /* 悬停文字颜色 */
        border-color: #007bff;        /* 悬停边框 */
    }

    /* 标签的内容样式 */
    .tab-content {
        padding: 20px;
        border: 1px solid #ddd;       /* 内容边框 */
        border-top: none;             /* 去掉顶部边框 */
        border-radius: 0 0 5px 5px;   /* 下圆角 0 0 5px 5px;  */
        background-color: #fff;       /* 内容背景色 */
    }
    /* 页面整体最小高度 100% */
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    /* 主内容区域，占据剩余空间 */
    #mainContain,
    .container {
        flex: 1 0 auto;
    }

    /* footer 永远贴底 */
    footer, .footer {
        margin-top: auto;
    }
</style>

<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>

<div class="row">
    <div class="col-lg-12" style="width: 80%; margin: 0 auto;">


<div class="row">
    <div class="col-lg-12" style="width: 100%; margin: 0 auto;">
        <table id="summary" class="display" style="width:100%">
            <thead>
            <tr>
                <th style="font-size: larger">Summary</th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</div>




<div class="panel-heading " style="background: #286ea7;margin-top: 10px;margin-bottom: 10px;height: 30px;">
    <div class="panel-tittle">
        <h2 style="text-align: center;font-size: 20px;margin-top: 5px;color: white;font-size: 23px;"><span class="glyphicon glyphicon-book"></span>Annotation&nbsp;information</h2>
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12" style="width: 100%; margin: 0 auto;" >
                <!-- 导航标签 -->
                <ul class="nav nav-tabs" role="tablist" id="myTabs">

                    <li role="presentation" class="nav-item active" id="tab_commonsnp">
                        <a href="#CommonSNP" aria-controls="CommonSNP" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">SNP</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_tfbs">
                        <a href="#tfbs" aria-controls="tfbs" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">TFBS</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_crispr">
                        <a href="#cispr" aria-controls="cispr" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">Repeat</abbr>
                        </a>
                    </li>

                </ul>




                <!-- 提示信息（如果没有数据时显示） -->
                <div class="alert alert-danger" id="no-data-message" style="display: none;">
                    No data available for the selected position.
                </div>
                <!--  SNP Tab 内容 -->
                <div class="tab-pane" id="CommonSNP">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>SNP sites on <font color="red" id="note2">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-CommonSNP" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">ID</th>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Start</th>
                            <th style="text-align:center">End</th>
                            <th style="text-align:center">Reference Allele</th>
                            <th style="text-align:center">Alternative Allele</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>



                <!-- TFBS Tab 内容 -->
                <div class="tab-pane" id="tfbs">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>SNP sites on <font color="red" id="note2">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-tfbs" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Start</th>
                            <th style="text-align:center">End</th>
                            <th style="text-align:center">TF Name</th>
                            <th style="text-align:center">Source</th>
                            <th style="text-align:center">Eid</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>

                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>SNP sites on <font color="red" id="note2">enh1</font></strong>
                    </p>
                    -->

                <!-- Repeat Tab 内容 -->
                <div class="tab-pane" id="cispr">
                    <table id="table-crispr" class="table table-striped table-bordered" style="width: 100%;">
                        <thead>
                        <tr>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Start</th>
                            <th style="text-align:center">End</th>
                            <th style="text-align:center">Strand</th>
                            <th style="text-align:center">Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Data loaded by DataTables -->
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
        </div>
    </div>

    </div>
</div>
</div>










<script>

    let params = new URLSearchParams(document.location.search.substring(1));
    let select_pos = params.get("pos");
    let select_specie = params.get("spe");
    let select_experiment = params.get("tech");
    let select_tissue = params.get("tissue");
    //let select_cell = params.get("cell");
    let select_dataset = params.get("dataset");

    // 提取起始位置和结束位置，计算长度
    let length = 0;
    if (select_pos) {
        let match = select_pos.match(/:(\d+)-(\d+)/); // 正则提取数字
        if (match) {
            let start = parseInt(match[1], 10); // 起始位置
            let end = parseInt(match[2], 10);   // 结束位置
            length = end - start;              // 计算长度
        }
    }

    let targetUrl = 'https://lcbb.swjtu.edu.cn/jbrowse2?config=config.json&assembly=GRCh38&loc=' + encodeURIComponent(select_pos) +
        '&tracks=' + encodeURIComponent('sorted_' + select_dataset + '_eRNA.bed') +
        ',' + encodeURIComponent('gencode.v46.chr_patch_hapl_scaff.annotation.gff3') +
        ',' + encodeURIComponent('dbSnp153Common') +
        '&dataset=' + encodeURIComponent(select_dataset);

    let datasetUrl = 'detail_study.php?sid=' + encodeURIComponent(select_dataset)

    var data = [
        ["Position", `<a href="${targetUrl}" target="_blank">${select_pos}</a>`],
        ["Species", select_specie],
        ["Experiment", select_experiment],
        ["Tissue", select_tissue],
        //["Cell", select_cell],
        ["Dataset", `<a href="${datasetUrl}" target="_blank">${select_dataset}</a>`],
        ["Length(bp)", length]
    ];

    // Initialize DataTable with transposed data
    $(document).ready(function() {
        $('#summary').DataTable({
            data:data,
            paging: false,       // 禁用分页
            searching: false,    // 禁用搜索框
            info: false,         // 禁用底部信息显示
            ordering: false,     // 禁用列排序
            dom: 't'             // 仅显示表格主体

        });
    });
</script>





<script type="text/javascript" charset="UTF-8">
    $(document).ready(function () {
        var commonsnpTable, tfbsTable, cisprTable;

        // 切换到 SNP 标签时初始化表格
        $('#tab_commonsnp').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类

            // 如果表格还没有初始化，才进行初始化
            if (!commonsnpTable) {
                commonsnpTable = $('#table-CommonSNP').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',

                    ajax: {
                        url: './api/detail_fish11_snp.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    //stripeClasses: [], // 禁用奇偶行样式
                    columns: [
                        { data: 'snp' },
                        { data: 'chrom' },
                        { data: 'start' },
                        { data: 'end' },
                        { data: 'ref' },
                        { data: 'alt' }
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                commonsnpTable.ajax.reload();  // 如果已经初始化，则重新加载数据
            }


            $('#CommonSNP').show();
            $('#tfbs').hide();
            $('#cispr').hide();
        });

        // 切换到 TFBS标签时初始化表格
        $('#tab_tfbs').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类
            // 如果表格还没有初始化，才进行初始化
            if (!tfbsTable) {
                tfbsTable = $('#table-tfbs').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_fish11_tfbs.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                        error: function(xhr, status, error) {
                            console.error("Error loading data:", error);
                            alert("Failed to load data. Please try again.");
                        }
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download',
                        }
                    ],
                    columns: [
                        { data: 'chrom' },
                        { data: 'start' },
                        { data: 'end' },
                        { data: 'target' },
                        { data: 'source' },
                        { data: 'eid' },
                    ],
                    drawCallback:function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();} else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                tfbsTable.ajax.reload();
            }

            $('#CommonSNP').hide();
            $('#tfbs').show();
            $('#cispr').hide();
        });

        // 切换到 Repeat 标签时初始化表格
        $('#tab_crispr').click(function () {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类

            // 如果表格还没有初始化，才进行初始化
            if (!cisprTable) {
                cisprTable = $('#table-crispr').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_fish11_repeat.php',
                        type: 'post',
                        dataType: 'json',
                        async: true,
                        data: function (d) {
                            d.select_pos = select_pos;
                        },
                        error: function (xhr, status, error) {
                            console.error("Error loading data:", error);
                            alert("Failed to load Repeat data. Please try again.");
                        }
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>", //
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download',
                        }
                    ],
                    columns: [
                        { data: 'chrom' },
                        { data: 'start' },
                        { data: 'end' },
                        { data: 'strand' },
                        { data: 'type' }
                    ],
                    drawCallback: function (settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();
                        } else {
                            $('#no-data-message').hide();
                        }
                    }
                });
            } else {
                cisprTable.ajax.reload(); // 如果已初始化则刷新数据
            }

            // 显示当前选项卡，隐藏其他
            $('#CommonSNP').hide();
            $('#tfbs').hide();
            $('#cispr').show();
        });


    // 默认点击 SNP 标签，显示 SNP 表格
    $('#tab_commonsnp').click();

    });
</script>



<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>

