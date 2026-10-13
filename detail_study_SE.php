<?php
include "./templates/base.php";
?>

<style>
    .datatable-wrapper {
        overflow-x: auto;  /* 水平滚动 */
        -webkit-overflow-scrolling: touch; /* 在触摸设备上提供平滑滚动 */
    }

    #dataset_sample{
        width: 800px;
    }

    /* 让所有单元格的内容居中 */
    #dataset_Serna td, #dataset_Serna th {
        text-align: center;
    }

    #marker_features.table {
        table-layout: fixed; /* 固定列宽 */
        width: 100%;
        max-width: 100%; /* 限制表格最大宽度 */
    }

    #marker_features. td, th {
        word-wrap: break-word;
        overflow: hidden;
        text-overflow: ellipsis; /* 超出部分显示省略号 */
    }
</style>

<style>
    #downloadContainer.container {
        display: flex;
        flex-wrap: wrap;
        gap: 60px;
        justify-content: center;
        align-items: center;
        max-width: 1000px;
    }
    .box {
        width: 240px;
        height: 120px;
        background: linear-gradient(45deg, #1e3c72, #f8cdda);
        border-radius: 7px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        transition: transform 0.2s ease-in-out;
    }
    .box:hover {
        transform: scale(1.1);
    }
    .box:active {
        transform: scale(0.95);
    }
    .box p {
        margin: 0;
    }
</style>

<style>
    /* 动态按钮结构 */
    .animated-button {
        position: relative;
        overflow: hidden; /* 让波纹动画不会超出按钮 */
        font-size: 28px;
        padding: 10px 30px;
        font-weight: bold;
        border-radius: 25px;
        border: none;
        cursor: pointer;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
    }

    /* 波纹点击动画核心 */
    .ripple {
        position: absolute;
        background: rgba(255, 255, 255, 0.6);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple-effect 0.5s linear;
        width: 100px;
        height: 100px;
        pointer-events: none;
    }

    @keyframes ripple-effect {
        to {
            transform: scale(3);
            opacity: 0;
        }
    }

    /* 渐变按钮样式：红→橙 */
    .gradient-red-button {
        background: linear-gradient(135deg, #ff5f6d, #ffc371);
    }

    .gradient-red-button:hover {
        background: linear-gradient(-135deg, #ff5f6d, #ffc371);
    }

    /* 渐变按钮样式：蓝→青 */
    .gradient-blue-button {
        background: linear-gradient(135deg, #36d1dc, #5b86e5);
    }

    .gradient-blue-button:hover {
        background: linear-gradient(-135deg, #36d1dc, #5b86e5);
    }

    /* 提示文本 */
    .rna-label {
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .red-label {
        color: red;
    }

    .blue-label {
        color: #0b63d4;
    }
</style>

<body id="body">
<?php
include "./templates/header.php";
?>

<div class="container" style="width: 100%; padding-left: 95px;padding-right: 100px;">
    <div class="col-lg-12" style="width: 100%; margin: 0 auto;">

        <div class="container-fluid" >
            <div class="row">

                <div class="card" id="c0" style="margin-top:10px; margin-bottom: 10px; padding-right: 0; padding-left: 0;">
                    <div class="card-header" id="card-h0" style="width: 100%; height: 80px; color: #0362a4; font-size: larger; font-weight: bolder; display: flex; align-items: center;">
                        <img src="./public/image/folder-svgrepo-com.svg" alt="SVG Image" style="width: 80px; height: 80px; margin-right: 10px;">
                        <span style="font-size: 28px;">Summary</span>
                    </div>
                    <div class="card-body" id="content"></div>
                </div>

                <div class="card" id="c1" style="margin-bottom:10px; padding-right: 0; padding-left: 0;">
                    <div class="card-header" style="width: 100%; height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">
                        <img src="./public/image/96WellPlate0001.svg" alt="SVG Image" style="width: 80px; height: 80px;margin-right: 10px;">
                        <span style="font-size: 28px;">Sample</span>
                    </div>
                    <div class="card-body">
                        <div class="datatable-wrapper">
                            <table id="dataset_sample" class="table table-hover table-bordered" style="vertical-align: middle;">
                                <thead style="vertical-align: middle;">
                                <tr>
                                    <th>Dataset ID</th>
                                    <th>Sample ID</th>
                                    <th>View</th>
                                    <th>Sample Name</th>
                                    <th>Source</th>
                                    <th>Species</th>
                                    <th>Tissue</th>
                                    <th>Technology</th>
                                    <th>Platforms</th>
                                    <th>Cell type</th>
                                    <th>Disease</th>
                                    <th>Organ parts</th>
                                    <th>Development stage</th>
                                    <th>Sex</th>
                                    <th>Treatment</th>
                                    <th>Phenotype</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="rna-switch-container" style="text-align: center; margin: 30px 0;"></div>

                <div class="card" id="c2" style="margin-bottom:10px;padding-right: 0; padding-left: 0;">
                    <div class="card-header" style="width: 100%; height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">
                        <img src="./public/image/Translation0001.svg" alt="SVG Image" style="width: 80px; height: 80px;margin-right: 10px;">
                        <span style="font-size: 28px;">Super-enhancer RNA</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="datatable-wrapper">
                                    <table id="dataset_Serna" class="table table-hover table-bordered" style="width: 100%;vertical-align: middle;max-width: 100%; overflow-x: auto; table-layout: auto;">
                                        <thead style="vertical-align: middle;">
                                        <tr>
                                            <th>SeRNA ID</th>
                                            <th>SeRNA expression</th>
                                            <th>Chrom</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Genome Browser</th>
                                            <th>Annotation</th>
                                            <th>Candidate Target genes</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="plotModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document" style="max-width: 90%; margin-top: 5vh;">
                        <div class="modal-content" style="border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">

                            <div class="modal-header" style="position: relative; background-color: #f8f9fa; border-bottom: 2px solid #0362a4; display: flex; align-items: center;">
                                <h5 class="modal-title" id="plotModalLabel" style="color: #0362a4; font-weight: bold; font-size: 20px; margin: 0; z-index: 5;"></h5>

                                <div id="modal-switch-buttons" style="display: none; position: absolute; left: 50%; transform: translateX(-50%); z-index: 5;">
                                    <button class="btn btn-primary active" id="btn-modal-umap" style="margin-right: 10px;"> UMAP (Expression)</button>
                                    <button class="btn btn-outline-primary" id="btn-modal-violin"> Violin Plot</button>
                                </div>

                                <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); z-index: 1050; border: none; background: transparent; font-size: 32px; cursor: pointer; color: #0362a4;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body" style="padding: 0; background-color: white;">
                                <iframe id="modal-iframe" src="" width="100%" height="650px" frameborder="0" style="display: block;"></iframe>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="card" id="c5" style="margin-bottom: 10px;padding-right: 0; padding-left: 0;">
                    <div class="card-header" style="width: 100%; height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">
                        <img src="./public/image/SuperResolutionFluorescenceMicroscopy0001.svg" alt="SVG Image" style="width: 70px; height: 70px; margin-right: 10px;">
                        <span style="font-size: 28px;">Statistic</span>
                    </div>
                    <div class="card-body">

                        <h4 style="color: #df4759">QC info</h4>

                        <div class="row" style="display: flex; justify-content: center; align-items: center;" >
                            <img id="QC_Image" src="" alt="Dynamic Image" style="width: 100%; max-height:400px; width: auto;">
                        </div>

                        <br>
                        <ul class="q-mb-md">
                            <li style="font-weight: bolder">Violin plots of cell quality control (QC) metrics:</li>
                            <li style="font-weight: bolder">The number of expressed genes and the total expression levels (TPM) per cell.</li>
                        </ul>
                        <hr>

                        <div class="row" style="display: flex; justify-content: center; align-items: center;">
                            <h4 style="color: #0dcaf0">Cluster info</h4>
                            <div class="col-lg-6">
                                <div id="cell_num_cluster" style="width: 100%; height: 400px"></div>
                            </div>
                            <div class="col-lg-6">
                                <div id="SeRNA_num_cluster" style="width: 100%;height: 400px"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card" id="c6" style="margin-bottom: 10px;padding-right: 0; padding-left: 0;">
                    <div class="card-header" style="width: 100%;  height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">
                        <img src="./public/image/GeneMutation0001.svg" alt="SVG Image" style="width: 80px; height: 80px;margin-right: 10px;">
                        <span style="font-size: 28px;">Marker features</span>
                    </div>
                    <div class="card-body">

                        <h5> Cluster specific markers</h5>

                        <div class="btn-group mt-3" role="group" aria-label="Image Buttons" style="margin-bottom: 15px">
                            <button type="button" class="btn btn-primary" id="btnA">Top10 Genes</button>
                            <button type="button" class="btn btn-primary" id="btnB">Top10 SeRNAs</button>

                            <button type="button" class="btn btn-primary" id="btnC">All Genes</button>
                            <button type="button" class="btn btn-primary" id="btnD">All SeRNAs</button>
                        </div>
                        <br>
                        <a>This heatmap visualizes the expression levels of cluster-specific markers (genes/eRNAs). The x-axis represents the markers, the y-axis represents the cell clusters, and color intensity indicates expression abundance.</a>
                        <br>
                        <a id="a-marker" style="font-weight: bolder; margin-bottom: 5px"> Heatmap of the expression of the top 10 marker genes (bottom) for each cluster (left).</a>

                        <div style="display: flex; justify-content: flex-end; width: 100%; gap: 10px; margin-bottom: 15px;">

                            <button id="toggleZoomBtn" class="btn btn-sm" style="background-color: #FFFFFF; color: #243675; border: 1px solid #ccc; border-radius: 5px; cursor: pointer; display: flex; align-items: center; transition: all 0.2s;">
                                <svg width="16" height="16" fill="currentColor" class="bi bi-zoom-in" viewBox="0 0 16 16" style="margin-right: 5px;">
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                    <path d="M10.344 11.758a.5.5 0 0 0 .707 0l3.905-3.905a.5.5 0 0 0-.708-.708L10.344 11.05a.5.5 0 0 0 0 .707z"/>
                                    <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                <span id="zoomBtnText">Enable Zoom</span>
                            </button>

                            <button id="downloadBtn" class="btn btn-sm" style="background-color: #FFFFFF; color: #243675; border: 1px solid #ccc; border-radius: 5px; cursor: pointer; display: flex; align-items: center;">
                                <svg width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16" style="margin-right: 5px;">
                                    <path d="M8 0a.5.5 0 0 1 .5.5v8.793l2.354-2.354a.5.5 0 1 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 8.293V.5A.5.5 0 0 1 8 0z"/>
                                    <path d="M0 13a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-1z"/>
                                </svg>
                                Download Figure
                            </button>
                        </div>

                        <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
                            <div id="heatmap-zoom-container" style="position: relative; overflow: hidden; display: inline-block; border: 1px solid #eee; border-radius: 4px;">
                                <img id="SeRNA_Image" src="" alt="Dynamic Image" style="max-height: 400px; max-width: 100%; width: auto; transition: transform 0.1s ease-out; transform-origin: center center;">
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-lg-12">
                                <table id="marker_features" class="table table-hover table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                                    <thead style="vertical-align: middle;">
                                    <tr>
                                        <th id="dynamic-name-header">Gene Name</th>
                                        <th>Adjusted P-value</th>
                                        <th>P-value</th>
                                        <th>Log2 Fold Change</th>
                                        <th>Cluster</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card" id="c7" style="margin-bottom: 15px;padding-right: 0; padding-left: 0;">
                    <div class="card-header" style="width: 100%;  height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">
                        <img src="./public/image/NextGenSequ0001.svg" alt="SVG Image" style="width: 80px; height: 80px;margin-right: 10px;">
                        <span style="font-size: 28px;">Data </span><span style="font-size: 28px;color: #ffc107">R</span><span style="font-size: 28px;">esources</span>
                    </div>
                    <div class="card-body">
                        <div class="container" id="downloadContainer" style="padding-bottom: 10px">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let sid = params.get("sid"); //sid：这个页面的Study属性；
    let sample_id = params.get("sample_id"); // 新增：获取点击传递过来的 Sample ID
    console.log("SID:", sid, "Sample ID:", sample_id);

    // 动态生成图片URL
    let QC_imageURL = `./public/figures/violin_QC_${sid}.png`;
    console.log(QC_imageURL);
    let SeRNA_imageURL = `./public/figures/heatmap_top_gene_${sid}.png`;
</script>

<script>
    // 定义全局变量
    let globalTissue, globalSpecies, globalTechnology, globalAccessions;
</script>

<script>
    $(document).ready(function () {
        // 发送 AJAX 请求
        $.ajax({
            url: './api/dataset_summary.php', //
            type: 'POST',
            data: {sid: sid},
            dataType: 'json',
            success: function (response) {
                // 调用函数生成内容
                renderContent(response);
            },
            error: function () {
                $('#content').html('<p style="color:red;">Failed to load data.</p>');
            }
        });

        function renderContent(dataArray) {
            const container = $('#content');
            container.empty(); // 清空内容容器

            dataArray.forEach((item) => {
                const { Tissue, Species, PMID, Platform, Technology,Contributors, SubmissionDate,UpdateDate, DatasetSummary, OverallDesign, Accessions } = item;

                // 1. 处理 Accessions 超链接
                let accessionHTML = 'N/A';
                if (sid) {
                    if (sid.startsWith("GSE") || sid.startsWith("PRJNA")) {
                        accessionHTML = `<a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=${encodeURIComponent(sid)}" target="_blank">${sid}</a>`;
                    } else if (sid.startsWith("E-")) {
                        accessionHTML = `<a href="https://www.ebi.ac.uk/arrayexpress/experiments/${encodeURIComponent(sid)}/" target="_blank">${sid}</a>`;
                    } else {
                        accessionHTML = sid;
                    }
                }

                // 2. 处理 PMID 超链接逻辑 (剔除 NA 和 N/A)
                let pmidHTML = 'N/A';
                if (PMID && String(PMID).trim() !== '' && String(PMID).toUpperCase() !== 'NA' && String(PMID).toUpperCase() !== 'N/A') {
                    pmidHTML = `<a href="https://pubmed.ncbi.nlm.nih.gov/${encodeURIComponent(PMID)}/" target="_blank">${PMID}</a>`;
                }

                // 将需要的数据赋值给全局变量
                globalTissue = Tissue;
                globalSpecies = Species;
                globalTechnology = Technology;
                globalAccessions = Accessions;

                // 定义统一的排版样式，让左右间距完美贴合
                const labelStyle = "flex: 0 0 450px; font-weight: bold;";
                const valueStyle = "flex: 1; word-wrap: break-word;";

                // 3. 动态生成 Sample ID 行
                let sampleIdRowHTML = "";
                if (sample_id) {
                    sampleIdRowHTML = `
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Sample ID:</div>
                            <div style="${valueStyle}">${sample_id}</div>
                        </div>`;
                }

                // 4. 渲染核心字段
                container.append(`
                    <div class="row" style="margin-left: 20px; margin-right: 20px;">

                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Accessions:</div>
                            <div style="${valueStyle}">${accessionHTML}</div>
                        </div>

                        ${sampleIdRowHTML}

                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Tissue:</div>
                            <div style="${valueStyle}">${Tissue || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Species:</div>
                            <div style="${valueStyle}">${Species || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">PMID:</div>
                            <div style="${valueStyle}">${pmidHTML}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Platform:</div>
                            <div style="${valueStyle}">${Platform || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Technology:</div>
                            <div style="${valueStyle}">${Technology || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Contributors:</div>
                            <div style="${valueStyle}">${Contributors || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Submission Date:</div>
                            <div style="${valueStyle}">${SubmissionDate || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 20px;">
                            <div style="${labelStyle}">Update Date:</div>
                            <div style="${valueStyle}">${UpdateDate || 'N/A'}</div>
                        </div>

                        <hr style="border-top: 1px dashed #ccc; margin-bottom: 20px;">

                        <div style="margin-bottom: 15px;">
                            <div style="font-weight: bold; margin-bottom: 5px;">Dataset Summary:</div>
                            <p style="text-align: justify;">${DatasetSummary || 'N/A'}</p>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <div style="font-weight: bold; margin-bottom: 5px;">Overall Design:</div>
                            <p style="text-align: justify;">${OverallDesign || 'N/A'}</p>
                        </div>
                    </div>
                `);
            });
        }
    });
</script>

<script>
    //主表格初始化，返回所有符合筛选条件后的数据
    $('#dataset_sample').DataTable( {
        "lengthChange": true,
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 5,
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        ajax: {
            url: './api/dataset_sample.php',
            data:{
                sid: sid
            },
        },
        dataType:'json',
        stripeClasses: [],
        "order": [[ 0, "desc" ]],
        dom: '<"row align-items-center mb-2"<"col-md-6 d-flex align-items-center gap-3"lB><"col-md-6"f>>' +
            '<"row"<"col-sm-12"tr>>'  +
            '<"row pt-2"<"col-md-5"i><"col-md-7"p>>',
        buttons: [
            {
                extend: 'csv',
                text: 'Download'
            }
        ],
        // 1. 新增：让所有列的数据在单元格中居中对齐
        columnDefs: [
            { targets: '_all', className: 'text-center' }
        ],
        columns: [
            { data: 'DatasetID' },
            { data: 'SampleID' },
            {
                data: null,
                title: 'Plot',
                orderable: false,
                render: function (data, type, row) {
                    return `<button class="btn btn-sm btn-outline-primary btn-sample-umap" data-sample="${row.SampleID}">
                UMAP
            </button>`;
                }
            },
            { data: 'SampleName' },
            { data: 'Source', orderable: false,},
            { data: 'Species',orderable: false, },
            { data: 'Tissue',orderable: false, },
            { data: 'Technology',orderable: false, },
            { data: 'Platforms' ,orderable: false,},
            { data: 'CellType', title: 'Cell Type' ,orderable: false,},
            { data: 'Disease' ,orderable: false,},
            { data: 'Organ_parts', title: 'Anatomical Entity',orderable: false, },
            { data: 'Development_stage', title: 'Development Stage' ,orderable: false,},
            { data: 'sex', title: 'Sex',orderable: false, },
            { data: 'Treatment',orderable: false, },
            { data: 'Phenotype',orderable: false, }
        ]
    });
    // 监听 dataset_sample 表格的点击
    $('#dataset_sample tbody').on('click', '.btn-sample-umap', function() {
        let sampleId = $(this).data('sample'); // 获取点击的 SampleID

        if (sid && sampleId) {
            $('#plotModalLabel').text('Sample Location: ' + sampleId);
            $('#modal-switch-buttons').hide(); // 样本图不需要切换按钮

            // 调用 Dash 后端
            $('#modal-iframe').attr('src', `/dash-umap-left/?select_value=${sid}&sample=${encodeURIComponent(sampleId)}`);

            $('#plotModal').modal('show');
        }
    });
</script>

<script>
    $(document).ready(function() {
        //主表格初始化，返回所有符合筛选条件后的数据
        var table = $('#dataset_Serna').DataTable( {
            "lengthChange": true,
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'post',
            ajax: {
                url: './api/dataset_Serna.php',
                data:{
                    sid: sid
                },
            },
            dataType:'json',
            stripeClasses: [],
            "order": [[ 2, "asc" ]],
            dom: '<"row align-items-center mb-2"<"col-md-6 d-flex align-items-center gap-3"lB><"col-md-6"f>>' +
                '<"row"<"col-sm-12"tr>>'  +
                '<"row pt-2"<"col-md-5"i><"col-md-7"p>>',
            buttons: [
                {
                    extend: 'csv',
                    text: 'Download'
                }
            ],
            columns: [
                { data: 'ID'},
                {
                    data: null,
                    title: 'SeRNA expression',
                    orderable: false,
                    render: function (data, type, row) {
                        // 1. 提取基因组物理坐标
                        let featureCoord = (row.chrom && row.start && row.end) ? row.chrom + ':' + row.start + '-' + row.end : "";

                        // 2. 提取各种可能存有特征属性的字段
                        let featurePos = row.pos || "";
                        let featureChrom = row.chrom || "";
                        let featureID = row.ID || "";

                        // 3. 提取靶基因名称并清洗
                        let featureGene = "";
                        if (row.Genes) {
                            featureGene = row.Genes.split(',')[0].split('(')[0].trim();
                        }

                        // 【核心保护】：霰弹枪策略组合保持不变，确保后端 Python 依然是指哪打哪，匹配率100%
                        let exactFeature = [featureGene, featureCoord, featurePos, featureChrom, featureID].filter(Boolean).join("||");

                        // 【核心修改】：精细化弹窗标题展示控制
                        // 完美格式：如果存在靶基因，显示 "SE_ID (GeneName)"；如果不存在，显示 "SE_ID"
                        let displayName = featureID;

                        return `<button class="btn btn-sm btn-outline-primary btn-erna-view" data-erna="${exactFeature}" data-display="${displayName}">
        View Plots
    </button>`;
                    }
                },
                { data: 'chrom' },
                { data: 'start',},
                { data: 'end' },
                // 新增列显示 logo 并跳转链接
                {
                    data: null,
                    title: 'Genome Browser',
                    orderable: false,
                    render: function (data, type, row) {
                        // 处理 chrom 确保带有 'chr' 前缀
                        let chromVal = row.chrom ? String(row.chrom) : '';
                        if (chromVal && !chromVal.toLowerCase().startsWith('chr')) {
                            chromVal = 'chr' + chromVal;
                        }

                        let pos = chromVal && row.start && row.end
                            ? chromVal + ':' + (row.start - 500) + '-' + (row.end + 500)
                            : 'N/A';
                        let dataset = row.ID;
                        let actualDataset = 'prefix_' + dataset + '_suffix';

                        let logoUrl = './public/image/favicon.ico';

                        // 定义物种配置表
                        const organismConfig = {
                            "Homo sapiens": {
                                assembly: "GRCh38",
                                tracks: [
                                    "GRCh38-ReferenceSequenceTrack",
                                    "sorted_" + sid + "_SeRNA.bed",
                                    "gencode.v46.annotation",
                                    "dbSnp153Common-hg38"
                                ]
                            },
                            "Mus musculus": {
                                assembly: "GRCm39",
                                tracks: [
                                    "GRCm39-ReferenceSequenceTrack",
                                    "sorted_" + sid + "_SeRNA.bed",
                                    "Mus_musculus.GRCm39.112",
                                    "dbSnp153Common-mm39"
                                ]
                            },
                            "Gallus gallus": {
                                assembly: "GRCg6a",
                                tracks: [
                                    "GRCg6a-ReferenceSequenceTrack",
                                    "sorted_" + sid + "_SeRNA.bed",
                                    "Gallus_gallus.GRCg6a.112",
                                    "dbSnp153Common-galGal6"
                                ]
                            },
                            "Danio rerio": {
                                assembly: "GRCz11",
                                tracks: [
                                    "GRCz11-ReferenceSequenceTrack",
                                    "sorted_" + sid + "_SeRNA.bed",
                                    "Danio_rerio.GRCz11.112"
                                ]
                            },
                            "Caenorhabditis elegans": {
                                assembly: "WBcel235",
                                tracks: [
                                    "WBcel235-ReferenceSequenceTrack",
                                    "sorted_" + sid + "_SeRNA.bed",
                                    "Caenorhabditis_elegans.WBcel235.112",
                                ]
                            },
                            "Drosophila melanogaster": {
                                assembly: "BDGP6",
                                tracks: [
                                    "BDGP6-ReferenceSequenceTrack",
                                    "sorted_" + sid + "_SeRNA.bed",
                                    "Drosophila_melanogaster.BDGP6.54.115",
                                ]
                            }
                        };

                        let organism = globalSpecies || "Homo sapiens";
                        let config = organismConfig[organism];

                        if (!config) {
                            return '<span style="color:red">No config for ' + organism + '</span>';
                        }

                        let targetUrl =
                            'http://lcbb.swjtu.edu.cn/jbrowse2?config=config.json&assembly=' + config.assembly +
                            '&loc=' + encodeURIComponent(pos) +
                            '&tracks=' + config.tracks.map(t => encodeURIComponent(t)).join(',') +
                            '&trackOverrides=' + encodeURIComponent(JSON.stringify({
                                [config.assembly + "-ReferenceSequenceTrack"]: {
                                    height: 100,
                                    showForwardStrand: true,
                                    showReverseStrand: true,
                                    showTranslations: false
                                }
                            })) +
                            '&bpPerPx=250' +
                            '&dataset=' + encodeURIComponent(actualDataset);

                        // 加入 _blank 打开新标签页
                        return '<a href="' + targetUrl + '" target="_blank" rel="noopener noreferrer">' +
                            '<img src="' + logoUrl + '" alt="Logo" style="width: 30px; height: 30px;"/>' +
                            '</a>';
                    }
                },
                {
                    data: 'annotation',
                    title: 'Annotation',
                    render: function (data, type, row) {
                        if (!data) return '';

                        const noPageSpecies = ['Gallus gallus', 'Caenorhabditis elegans'];

                        if (noPageSpecies.includes(globalSpecies)) {
                            return `<a href="javascript:void(0);"
                        onclick="alert('Sorry, there is no annotation page for ${globalSpecies} in the database. Please select another species.')"
                        class="btn btn-sm btn-outline-secondary" style="cursor:pointer;">
                    Detail
                 </a>`;
                        }

                        // 处理 chrom 确保带有 'chr' 前缀
                        let chromVal = row.chrom ? String(row.chrom) : '';
                        if (chromVal && !chromVal.toLowerCase().startsWith('chr')) {
                            chromVal = 'chr' + chromVal;
                        }

                        // 拼接出正确的坐标字符串
                        let correctPos = chromVal && row.start && row.end
                            ? chromVal + ':' + row.start + '-' + row.end
                            : 'N/A';

                        let href;
                        switch (globalSpecies) {
                            case 'Homo sapiens':
                                href = 'detail_erna.php';
                                break;
                            case 'Mus musculus':
                                href = 'detail_erna_mus.php';
                                break;
                            case 'Danio rerio':
                                href = 'detail_erna_fish.php';
                                break;
                            case 'Drosophila melanogaster':
                                href = 'detail_erna_fly.php';
                                break;
                            default:
                                href = 'detail_organism.php';
                        }

                        href += '?pos=' + encodeURIComponent(correctPos) +
                            '&spe=' + encodeURIComponent(globalSpecies) +
                            '&tech=' + encodeURIComponent(globalTechnology) +
                            '&tissue=' + encodeURIComponent(globalTissue) +
                            '&dataset=' + encodeURIComponent(sid);

                        // 样式修改一致为白底蓝字 Detail 按钮
                        return `<a href="${href}" class="btn btn-sm btn-outline-primary">Detail</a>`;
                    }
                },
                {
                    data: 'Num',
                    title: 'Candidate Target genes',
                    orderable: false,
                    render: function(data, type, row) {
                        return '<button class="btn btn-sm btn-outline-primary btn-show-genes" data-num="' + data + '">View</button>';
                    }
                },
            ],
            columnDefs: [
                { targets: [4, 6], orderable: false },  // 禁用排序
            ]
        } );

        // 绑定点击事件 (展开 Genes 子行并动态添加多物种基因数据库链接 - SeRNA 版本)
        $('#dataset_Serna tbody').on('click', '.btn-show-genes', function() {
            var tr = $(this).closest('tr'); // 获取按钮所在的行
            // 比如：var table_serna = $('#dataset_Serna').DataTable({...});
            // 下面这行可能需要改成 var row = table_serna.row(tr); 视你的变量名而定
            var row = table.row(tr);
            var data = row.data(); // 获取该行的数据

            // 处理基因字符串，添加对应物种权威数据库的链接
            var genesHtml = 'No genes available';
            if (data['Genes']) {
                var genesArray = data['Genes'].split(',');
                var linkedGenes = genesArray.map(function(item) {
                    var cleanItem = item.trim();
                    if (!cleanItem) return '';

                    var geneName = cleanItem;
                    var distancePart = '';
                    var bracketIndex = cleanItem.indexOf('(');

                    // 如果包含括号，则把基因名和距离部分拆开
                    if (bracketIndex !== -1) {
                        geneName = cleanItem.substring(0, bracketIndex).trim();
                        distancePart = cleanItem.substring(bracketIndex); // 包含左括号及其后面的部分
                    }

                    // ==========================================
                    //  核心升级：多物种智能基因数据库路由分流
                    // ==========================================
                    var targetUrl = '';
                    var currentSpecies = typeof globalSpecies !== 'undefined' ? globalSpecies : 'Homo sapiens';

                    if (currentSpecies === 'Caenorhabditis elegans') {
                        // 线虫跳转到 WormBase
                        targetUrl = 'https://wormbase.org/species/c_elegans/gene/' + encodeURIComponent(geneName);
                    } else if (currentSpecies === 'Mus musculus') {
                        // 小鼠跳转到 MGI
                        targetUrl = 'https://www.informatics.jax.org/marker/summary?nomen=' + encodeURIComponent(geneName);
                    } else if (currentSpecies === 'Drosophila melanogaster') {
                        // 果蝇：调用 FlyBase 官方指定的 Symbol 直接跳转路由
                        targetUrl = 'https://flybase.org/search/symbol/' + encodeURIComponent(geneName);
                    } else if (currentSpecies === 'Homo sapiens') {
                        // 人类跳转到 GeneCards
                        targetUrl = 'https://www.genecards.org/cgi-bin/carddisp.pl?gene=' + encodeURIComponent(geneName);
                    } else {
                        // 其他物种降级到 NCBI Gene
                        targetUrl = 'https://www.ncbi.nlm.nih.gov/gene/?term=' + encodeURIComponent(geneName);
                    }

                    // 只将基因名包裹在 <a> 标签里，括号及距离部分作为纯文本跟在后面
                    var linkHtml = '<a href="' + targetUrl + '" target="_blank" rel="noopener noreferrer" style="color: #0d6efd; text-decoration: underline;">' + geneName + '</a>';

                    return linkHtml + distancePart;
                });
                genesHtml = linkedGenes.filter(Boolean).join(', ');
            }

            // 创建新行，显示带链接的 Genes
            var newRow = $('<tr class="genes-row"><td colspan="7" style="font-weight: bolder">Target Gene(distance to TSS):  ' + genesHtml + '</td></tr>');

            // 检查新行是否已经存在，如果存在则删除（实现折叠效果），否则添加
            if (tr.next('.genes-row').length) {
                tr.next('.genes-row').remove();
            } else {
                tr.after(newRow);
            }
        });

        let currentErna = ""; //

        // 1. 监听 dataset_Serna 表格的点击
        $('#dataset_Serna tbody').on('click', '.btn-erna-view', function() {
            currentErna = $(this).data('erna');
            let displayName = $(this).data('display');

            if (sid && currentErna) {
                $('#plotModalLabel').text('Feature Expression: ' + displayName);
                $('#modal-switch-buttons').show();

                $('#btn-modal-umap').removeClass('btn-outline-primary').addClass('btn-primary');
                $('#btn-modal-violin').removeClass('btn-primary').addClass('btn-outline-primary');

                $('#modal-iframe').attr('src', `/dash-umap-right-se/?select_value=${sid}&feature=${encodeURIComponent(currentErna)}`);

                $('#plotModal').modal('show');
            }
        });

        // 2. 弹窗内部：点击 "UMAP" 按钮
        $('#btn-modal-umap').click(function() {
            $(this).removeClass('btn-outline-primary').addClass('btn-primary');
            $('#btn-modal-violin').removeClass('btn-primary').addClass('btn-outline-primary');

            $('#modal-iframe').attr('src', `/dash-umap-right-se/?select_value=${sid}&feature=${encodeURIComponent(currentErna)}`);
        });

        // 3. 弹窗内部：点击 "Violin Plot" 按钮
        $('#btn-modal-violin').click(function() {
            $(this).removeClass('btn-outline-primary').addClass('btn-primary');
            $('#btn-modal-umap').removeClass('btn-primary').addClass('btn-outline-primary');

            $('#modal-iframe').attr('src', `/dash-violin-se/?select_value=${sid}&feature=${encodeURIComponent(currentErna)}`);
        });

        // 4. 关闭弹窗时销毁 iframe
        $('#plotModal').on('hidden.bs.modal', function () {
            $('#modal-iframe').attr('src', '');
        });

    });

</script>

<script>
    document.getElementById("QC_Image").src = QC_imageURL;
</script>

<script type="text/javascript">
    var colors = ['#7EB5D6', '#99CEDF', '#B5E7E8', '#FFE6E8', '#FFCACA'];

    var ClusterCell_Chart = echarts.init(document.getElementById('cell_num_cluster'));
    var ClusterSeRNA_Chart = echarts.init(document.getElementById('SeRNA_num_cluster'));

    $.post('./api/get_Se_cluster_info.php', {sid:sid}).done(function (data){
        var responseData = JSON.parse(data);

        var colorMapping = function (params) {
            var dataIndex = params.dataIndex;
            return colors[dataIndex % colors.length];
        };

        ClusterCell_Chart.setOption({
            title: {
                text: 'Cell Distribution per Cluster',
                left: 'center'
            },
            tooltip: {
                trigger: 'axis',
            },
            grid: {
                left: '15%'
            },
            yAxis: {
                type: 'category',
                data: responseData.clusters,
                name: 'Cluster',
                nameLocation: 'end'
            },
            xAxis: {
                type: 'value',
                name: 'Cell Count',
                nameLocation: 'middle',
                nameGap: 30
            },
            series: [{
                name: 'Cell number',
                data: responseData.cells,
                type: 'bar',
                itemStyle: {
                    color: colorMapping
                }
            }]
        });

        ClusterSeRNA_Chart.setOption({
            title: {
                text: 'SeRNA Abundance per Cluster',
                left: 'center'
            },
            tooltip: {
                trigger: 'axis',
            },
            xAxis: {
                type: 'category',
                data: responseData.clusters,
                name: 'Cluster',
                nameLocation: 'middle',
                nameGap: 30
            },
            yAxis: {
                type: 'value',
                name: 'SeRNA Count',
                nameLocation: 'end'
            },
            series: [{
                name: 'SeRNA number',
                data: responseData.SeRNAs,
                type: 'bar',
                itemStyle: {
                    color: colorMapping
                }
            }]
        });
    });
</script>

<script>
    document.getElementById("SeRNA_Image").src = SeRNA_imageURL;
</script>

<script>
    $(document).ready(function () {

        let currentRoute = '';

        const table = $('#marker_features').DataTable({
            "processing": true,
            "serverSide": true,
            "serverMethod": 'post',
            "lengthChange": true,
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10,
            "autoWidth": true,
            ajax: {
                url: './api/get_marker_genes.php',
                data: function (d) {
                    d.sid = sid;
                }
            },
            dataType: 'json',
            dom: '<"row align-items-center mb-2"<"col-md-6 d-flex align-items-center gap-3"lB><"col-md-6"f>>' +
                '<"row"<"col-sm-12 table-responsive"tr>>'  +
                '<"row pt-2"<"col-md-5"i><"col-md-7"p>>',
            buttons: [
                {
                    extend: 'csv',
                    text: 'Download'
                }
            ],
            columns: [
                {
                    data: 'names',
                    render: function (data, type, row) {
                        let href;

                        if (globalSpecies === 'Homo sapiens') {
                            href = 'detail_erna.php';
                        } else if (globalSpecies === 'Mus musculus') {
                            href = 'detail_erna_mus.php';
                        } else {
                            href = 'detail_organism.php';
                        }

                        if (/^chr[0-9XYM]+:\d+-\d+$/.test(data)) {
                            href += '?pos=' + encodeURIComponent(row['pos']) +
                                '&spe=' + encodeURIComponent(globalSpecies) +
                                '&tech=' + encodeURIComponent(globalTechnology) +
                                '&tissue=' + encodeURIComponent(globalTissue) +
                                '&dataset=' + encodeURIComponent(sid);
                        } else if (/^EH\d{2}E\d+$/.test(data)) {
                            href += '?pos=' + encodeURIComponent(row['pos']) +
                                '&spe=' + encodeURIComponent(globalSpecies) +
                                '&tech=' + encodeURIComponent(globalTechnology) +
                                '&tissue=' + encodeURIComponent(globalTissue) +
                                '&dataset=' + encodeURIComponent(sid);
                        } else {
                            href = 'https://www.ncbi.nlm.nih.gov/gene/?term=' + encodeURIComponent(data);
                        }

                        return `<a href="${href}" target="_blank">${data}</a>`;
                    }
                },
                { data: 'p_val_adj' },
                { data: 'p-value'},
                { data: 'LogFoldChanges' },
                { data: 'Cluster' }
            ],
            columnDefs: [
                { targets: [2], orderable: false },
            ]
        });

        // 定义按钮配置
        const buttonConfigs = {
            btnA: {
                imgSrc: `./public/figures/heatmap_top_gene_${sid}.png`,
                description: 'Heatmap of the expression of the top 10 marker genes (bottom) for each cluster (left).',
                url: './api/get_marker_genes.php',
                headerText: 'Gene Name', // 表头名称
                renderFunction: function (data, type, row) {
                    return `<a href="https://www.ncbi.nlm.nih.gov/gene/?term=${encodeURIComponent(data)}" target="_blank">${data}</a>`;
                },
            },
            btnB: {
                imgSrc: `./public/figures/heatmap_top10_SeRNA_${sid}.png`,
                description: 'Heatmap of the expression of the top 10 SeRNAs (bottom) for each cluster (left).',
                url: './api/get_marker_Sfeatures.php',
                headerText: 'SeRNA Name', // 表头名称
                renderFunction: function (data, type, row) {
                    return `<a href="detail_erna.php?pos=${encodeURIComponent(data)}&spe=${globalSpecies}&tech=${globalTechnology}&tissue=${globalTissue}&dataset=${encodeURIComponent(row.dataset)}" target="_blank">${data}</a>`;
                }
            },
            btnC: {
                imgSrc: `./public/figures/heatmap_gene_${sid}.png`,
                description: 'Heatmap of the expression of the marker genes (bottom) for each cluster (left).',
                url: './api/get_marker_genes.php',
                headerText: 'Gene Name', // 表头名称
                renderFunction: function (data, type, row) {
                    return `<a href="https://www.ncbi.nlm.nih.gov/gene/?term=${encodeURIComponent(data)}" target="_blank">${data}</a>`;
                }
            },
            btnD: {
                imgSrc: `./public/figures/heatmap_SeRNA_${sid}.png`,
                description: 'Heatmap of the expression of the marker SeRNAs (bottom) for each cluster (left).',
                url: './api/get_marker_Sfeatures.php',
                headerText: 'SeRNA Name', // 表头名称
                renderFunction: function (data, type, row) {
                    return `<a href="detail_erna.php?pos=${encodeURIComponent(data)}&spe=${globalSpecies}&tech=${globalTechnology}&tissue=${globalTissue}&dataset=${encodeURIComponent(row.dataset)}" target="_blank">${data}</a>`;
                }
            }
        };

        $('button').click(function () {
            const buttonId = this.id;
            const config = buttonConfigs[buttonId];

            $('button').removeClass('active');
            $(this).addClass('active');

            if (config) {
                $("#SeRNA_Image").attr("src", config.imgSrc);
                $("#a-marker").text(config.description);

                // 动态修改表头名称
                $(table.column(0).header()).text(config.headerText);

                table.column(0).data().render = config.renderFunction;

                table.ajax.url(config.url).load(function () {
                    table.columns.adjust().draw();
                });
            }

        });

        $('#btnA').click();
    });
</script>

<script>
    const files = [
        { file: "metadata.csv", label: "metadata.csv", path: "metadata" },
        { file: "SeRNA.bed", label: "SeRNA.bed", path: "Serna_bed" },
        { file: "Serna_exp_matrix.csv", label: "Serna_exp_matrix.csv", path: "Serna_exp" },
        { file: "SeRNA_cluster_exp.csv", label: "SeRNA_cluster_exp.csv", path: "cluster" },
        { file: "gene_DE.csv", label: "gene_DE.csv", path: "DEG" },
        { file: "SeRNA_DE.csv", label: "SeRNA_DE.csv", path: "DESerna" }
    ];

    function renderDownloadBoxes() {
        const container = document.getElementById("downloadContainer");
        const currentParams = new URLSearchParams(window.location.search);
        const sid = currentParams.get("sid");

        if (!sid) {
            container.innerHTML = `<p style="color: red;"> No SID parameter found. Cannot load download files.</p>`;
            return;
        }

        files.forEach(file => {
            const box = document.createElement("div");
            box.className = "box";
            box.onclick = function() {
                downloadFile(sid, file);
            };

            const p = document.createElement("p");
            p.textContent = sid + "_" + file.label;
            box.appendChild(p);

            container.appendChild(box);
        });
    }

    function downloadFile(sid, file) {
        const link = document.createElement('a');
        link.href = `./download/files/${file.path}/${sid}_${file.file}`;
        link.download = sid + "_" + file.file;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    renderDownloadBoxes();
</script>

<script>
    document.getElementById('downloadBtn').addEventListener('click', function() {
        const imageSrc = document.getElementById('SeRNA_Image').src;
        const a = document.createElement('a');
        a.href = imageSrc;
        a.download = 'SeRNA_Figure.jpg';
        a.click();
    });
</script>

<script>
    $(document).ready(function () {
        const container = document.getElementById("rna-switch-container")
        const path = window.location.pathname
        const currentParams = new URLSearchParams(window.location.search)
        const sid = currentParams.get("sid")

        if (!sid) {
            container.innerHTML = `<p style="color: red;"> No SID parameter found. Cannot load enhancer data.</p>`
            return
        }

        const toSuperURL = `detail_study_SE.php?sid=${encodeURIComponent(sid)}`
        const toTypicalURL = `detail_study.php?sid=${encodeURIComponent(sid)}`

        if (path.includes("detail_study.php") && !path.includes("detail_study_SE.php")) {
            container.innerHTML = `
      <p class="rna-label blue-label"> You are currently viewing <strong>Typical Enhancer RNA</strong></p>
      <button class="animated-button gradient-red-button" onclick="goWithRipple(event, '${toSuperURL}')">
        Switch to Super-Enhancer RNA
      </button>
    `
        } else if (path.includes("detail_study_SE.php")) {
            container.innerHTML = `
      <p class="rna-label red-label"> You are currently viewing <strong>Super-Enhancer RNA</strong></p>
      <button class="animated-button gradient-blue-button" onclick="goWithRipple(event, '${toTypicalURL}')">
        Switch to Typical Enhancer RNA
      </button>
    `
        }

        window.goWithRipple = function (event, target) {
            const button = event.currentTarget
            const ripple = document.createElement("span")
            ripple.classList.add("ripple")
            const rect = button.getBoundingClientRect()
            ripple.style.left = `${event.clientX - rect.left}px`
            ripple.style.top = `${event.clientY - rect.top}px`
            button.appendChild(ripple)

            setTimeout(() => {
                ripple.remove()
                window.location.href = target
            }, 300)
        }
    })
</script>

<script>
    // 热点图放大镜【按需开启】功能
    const zoomContainer = document.getElementById('heatmap-zoom-container');
    const zoomImage = document.getElementById('SeRNA_Image');
    const toggleZoomBtn = document.getElementById('toggleZoomBtn');
    const zoomBtnText = document.getElementById('zoomBtnText');

    let isZoomActive = false; // 记录放大镜状态的变量
    const zoomLevel = 2.5; // 放大倍数

    if (zoomContainer && zoomImage && toggleZoomBtn) {
        // 1. 监听开关按钮点击
        toggleZoomBtn.addEventListener('click', function() {
            isZoomActive = !isZoomActive;

            if (isZoomActive) {
                toggleZoomBtn.style.backgroundColor = '#243675';
                toggleZoomBtn.style.color = '#FFFFFF';
                zoomBtnText.innerText = "Disable Zoom";
                zoomContainer.style.cursor = 'crosshair';
            } else {
                toggleZoomBtn.style.backgroundColor = '#FFFFFF';
                toggleZoomBtn.style.color = '#243675';
                zoomBtnText.innerText = "Enable Zoom";
                zoomContainer.style.cursor = 'default';
                zoomImage.style.transformOrigin = 'center center';
                zoomImage.style.transform = 'scale(1)';
            }
        });

        // 2. 监听鼠标移动
        zoomContainer.addEventListener('mousemove', function(e) {
            if (!isZoomActive) return;

            const rect = zoomContainer.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const xPercent = (x / rect.width) * 100;
            const yPercent = (y / rect.height) * 100;

            zoomImage.style.transformOrigin = `${xPercent}% ${yPercent}%`;
            zoomImage.style.transform = `scale(${zoomLevel})`;
        });

        // 3. 监听鼠标移出
        zoomContainer.addEventListener('mouseleave', function() {
            zoomImage.style.transformOrigin = 'center center';
            zoomImage.style.transform = 'scale(1)';
        });
    }
</script>

<?php
include "./templates/footer.php";
?>
</body>
</html>
