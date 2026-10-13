<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>sceRNAdb</title>

    <link rel="icon" type="image/x-icon" href="../../public/LCBB.ico"/>

    <link rel="stylesheet" href="../../bootstrap5/bootstrap-3.4.1-dist/css/argon-design-system.css">
    <link rel="stylesheet" href="../../bootstrap5/bootstrap-3.4.1-dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../bootstrap5/bootstrap-3.4.1-dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../../bootstrap5/bootstrap-3.4.1-dist/css/style.css">
    <link rel="stylesheet" href="../../bootstrap5/bootstrap-3.4.1-dist/css/fill-left.css">
    <link rel="stylesheet" href="../../bootstrap5/bootstrap-3.4.1-dist/menu/dist/quantumalert.css">
    <link href="../../bootstrap5/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="../../public/css/header.css" rel="stylesheet">
    <link href="../../public/css/footer.css" rel="stylesheet">
    <link href="../../public/css/card.css" rel="stylesheet">
    <link href="../../public/css/search.css" rel="stylesheet">
    <link href="../../public/css/filter_table.css" rel="stylesheet">
    <link href="../../public/css/specfic_table.css" rel="stylesheet">

    <script src="../../bootstrap5/js/jquery-1.9.1.min.js"></script>
    <script src="../../bootstrap5/bootstrap-3.4.1-dist/js/popper.min.js"></script>
    <script src="../../bootstrap5/bootstrap-3.4.1-dist/js/bootstrap.js"></script>

    <script src="../../bootstrap5/bootstrap-3.4.1-dist/js/bootstrap-select.min.js"></script>
    <script src="../../bootstrap5/bootstrap-3.4.1-dist/js/bootstrap3-typeahead.min.js"></script>
    <script src="../../bootstrap5/js/pace.min.js"></script>
    <script src="../../bootstrap5/bootstrap-3.4.1-dist/menu/dist/quantumalert.js"></script>

    <script src="../../echarts-5.5.0/dist/echarts.js"></script>

    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        #main-wrapper {
            flex: 1 0 auto;
        }

        /* 保证页面宽度与头部一致的安全容器 */
        .unified-container {
            width: 80%;
            max-width: 1400px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        .top-return-bar {
            background-color: #2e303f;
            width: 100%;
            padding: 15px 0;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
        }
        .btn-back-search {
            color: #ffc107;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: color 0.2s;
        }
        .btn-back-search:hover {
            color: #ffffff;
            text-decoration: none;
        }
        .page-context-indicator {
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .section-title {
            color: #0362a4;
            font-weight: bold;
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid #0362a4;
            display: inline-block;
        }
        .vertical-divider {
            border-right: 2px dashed #e0e0e0;
        }
        @media (max-width: 991px) {
            .vertical-divider {
                border-right: none;
                border-bottom: 2px dashed #e0e0e0;
                padding-bottom: 30px;
                margin-bottom: 30px;
            }
        }

        .chart-container {
            position: relative;
            width: 100%;
            margin: 20px auto 0;
            height: 55vh;
            min-height: 400px;
        }
        .chart-wrapper {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
</head>

<body style="overflow-x: hidden; overflow-y: auto;">

<div class="top-return-bar">
    <div class="unified-container" style="display: flex; justify-content: space-between; align-items: center;">
        <a href="../../search_iframe.php" class="btn-back-search">
            <span style="font-size: 20px; margin-right: 8px;">&larr;</span> Back to Search
        </a>
        <div class="page-context-indicator">
            Detail Search / Tissue or Cell Type
        </div>
    </div>
</div>

<div id="main-wrapper">
    <div class="unified-container" style="margin-top: 40px; margin-bottom: 40px;">
        <div class="row">

            <div class="col-lg-6 vertical-divider">
                <div class="text-center">
                    <h3 class="section-title">Tissue Type Search</h3>
                </div>

                <form onsubmit="return false;">
                    <div class="form-group">
                        <div class="center-block">
                            <label class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step1</span>: Please to choose a species</label>
                            <select class="selectpicker form-control" id="Spe_tissue" title="Select a species(e.g.'Homo Sapiens')" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                <option value="Homo sapiens">Homo sapiens</option>
                                <option value="Mus musculus">Mus musculus</option>
                                <option value="Gallus gallus">Gallus gallus</option>
                                <option value="Danio rerio">Danio rerio</option>
                                <option value="Caenorhabditis elegans">Caenorhabditis elegans</option>
                                <option value="Drosophila melanogaster">Drosophila melanogaster</option>
                            </select>

                            <div class="center-block mt-3" id="t1_tissue">
                                <label class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step2</span>: Please to choose Sequencing Technology</label>
                                <select class="selectpicker form-control" id="Tech_tissue" title="Select a Sequencing type(e.g.'Smart-seq2')" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false"></select>
                            </div>

                            <div class="center-block mt-3" id="t2_tissue">
                                <label class="font-weight-bold text-justify" style="font-size: 14px;"><span style="color: red;">Step3</span>: Tissue type</label>
                                <select class="selectpicker form-control" id="Tissue_select" title="Select Tissue Type" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false"></select>
                            </div>
                        </div>

                        <div class="mt-3" style="text-align: right;">
                            <a onclick="populateExamples_tissue()" class="btn btn-default" style="text-transform: none;"><b>Example</b></a>
                            <a onclick="tissue_url()" class="btn btn-default" style="text-transform: none;"><b>Search</b></a>
                            <button class="btn btn-default" id="reset_tissue" style="text-transform: none;"><b>Reset</b></button>
                        </div>

                        <div class="mt-3" style="color:darkgray; font-size: 13px; text-align: left;">
                            <p class="mb-1"><strong><i class="ni ni-tag text-warning"></i> Note:</strong></p>
                            <p class="mb-1">1. All options must be selected in order.</p>
                            <p class="mb-1">2. The module will return sample results that match the criteria.</p>
                            <p class="mb-1">3. <strong>Interactive Sunburst Chart:</strong></p>
                            <ul style="padding-left: 20px; margin-bottom: 0;">
                                <li class="mb-1"><strong>Hover:</strong> Move mouse over a slice to view its full path.</li>
                                <li class="mb-1"><strong>Click a slice:</strong> Auto-fill options and drill down to the next level.</li>
                                <li class="mb-0"><strong>Click the center:</strong> Go back to the previous level or reset.</li>
                            </ul>
                        </div>
                    </div>
                </form>

                <div class="chart-container">
                    <div id="main_tissue" class="chart-wrapper"></div>
                </div>
            </div>

            <div class="col-lg-6" style="padding-left: 30px;">
                <div class="text-center">
                    <h3 class="section-title">Cell Type Search</h3>
                </div>

                <form onsubmit="return false;">
                    <div class="form-group">
                        <div class="center-block">
                            <label class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step1</span>: Please to choose a species</label>
                            <select class="selectpicker form-control" id="Spe_cell" title="Select a species(e.g.'Homo Sapiens')" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                <option value="Homo sapiens">Homo sapiens</option>
                                <option value="Mus musculus">Mus musculus</option>
                                <option value="Gallus gallus">Gallus gallus</option>
                                <option value="Danio rerio">Danio rerio</option>
                                <option value="Caenorhabditis elegans">Caenorhabditis elegans</option>
                                <option value="Drosophila melanogaster">Drosophila melanogaster</option>
                            </select>

                            <div class="center-block mt-3" id="t1_cell">
                                <label class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step2</span>: Please to choose Sequencing Technology</label>
                                <select class="selectpicker form-control" id="Tech_cell" title="Select a Sequencing type(e.g.'Smart-seq2')" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false"></select>
                            </div>

                            <div class="center-block mt-3" id="t2_cell">
                                <label class="font-weight-bold text-justify" style="font-size: 14px;"><span style="color: red;">Step3</span>: Cell type</label>
                                <select class="selectpicker form-control" id="Cell_select" title="Select Cell Type" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false"></select>
                            </div>
                        </div>

                        <div class="mt-3" style="text-align: right;">
                            <a onclick="populateExamples_cell()" class="btn btn-default" style="text-transform: none;"><b>Example</b></a>
                            <a onclick="cell_url()" class="btn btn-default" style="text-transform: none;"><b>Search</b></a>
                            <button class="btn btn-default" id="reset_cell" style="text-transform: none;"><b>Reset</b></button>
                        </div>

                        <div class="mt-3" style="color:darkgray; font-size: 13px; text-align: left;">
                            <p class="mb-1"><strong><i class="ni ni-tag text-warning"></i> Note:</strong></p>
                            <p class="mb-1">1. All options must be selected in order.</p>
                            <p class="mb-1">2. The module will return sample results that match the criteria.</p>
                            <p class="mb-1">3. <strong>Interactive Sunburst Chart:</strong></p>
                            <ul style="padding-left: 20px; margin-bottom: 0;">
                                <li class="mb-1"><strong>Hover:</strong> Move mouse over a slice to view its full path.</li>
                                <li class="mb-1"><strong>Click a slice:</strong> Auto-fill options and drill down to the next level.</li>
                                <li class="mb-0"><strong>Click the center:</strong> Go back to the previous level or reset.</li>
                            </ul>
                        </div>
                    </div>
                </form>

                <div class="chart-container">
                    <div id="main_cell" class="chart-wrapper"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<footer>
    Copyright © Guo Lab 2026. School of Life Sciences and Engineering, Southwest Jiaotong University, Chengdu, China
</footer>

<script type="text/javascript">
    window.allECharts = [];
    window.addEventListener('resize', () => {
        window.allECharts.forEach(chart => chart.resize());
    });
    $.ajaxSetup({ cache: false });

    function addPath(root, path, colorFunc) {
        let node = root;
        for (let i = 0; i < path.length; i++) {
            let name = path[i];
            if (!node.children) node.children = [];
            let child = node.children.find(n => n.name === name);
            if (!child) {
                child = { name: name, depth: i + 1, itemStyle: { color: colorFunc(i + 1, name) } };
                if (i === path.length - 1) child.value = 1;
                node.children.push(child);
            }
            node = child;
        }
    }
    function calculateValues(nodes) {
        if (!nodes || nodes.length === 0) return 0;
        nodes.forEach(node => {
            if (node.children && node.children.length > 0) node.value = calculateValues(node.children);
        });
        return nodes.reduce((sum, node) => sum + (node.value || 0), 0);
    }
    function formatTooltip(info) {
        let parts = [];
        let node = info;
        while (node) {
            if (node.name) parts.unshift(node.name);
            node = node.treePathInfo && node.treePathInfo.length > 1 ? node.treePathInfo[node.treePathInfo.length - 2] : null;
        }
        return `${parts.join(' → ')}<br/>count: ${info.value || 0}`;
    }

    /* ======================================================= */
    /* ================= TISSUE 区域逻辑 ======================= */
    /* ======================================================= */
    (function() {
        const speId = '#Spe_tissue';
        const techId = '#Tech_tissue';
        const targetId = '#Tissue_select';

        var myChart = echarts.init(document.getElementById('main_tissue'));
        window.allECharts.push(myChart);

        function getColorByDepth(depth, name) {
            const colorSchemes = {
                1: { 'Homo sapiens': '#FF6B6B', 'Caenorhabditis elegans': '#4ECDC4', 'Danio rerio': '#45B7D1', 'Mus musculus': '#96CEB4', 'Drosophila melanogaster': '#FFA726', 'Gallus gallus': '#BA68C8' },
                2: { 'SMARTer': '#AB47BC', 'Smart-seq2': '#EC407A', 'RamDA-seq': '#7E57C2', 'SMART-seq-Total': '#42A5F5', 'Tang': '#26A69A', 'SUPeR-Seq': '#FFA726', 'MATQ-seq': '#EF5350', 'ReapTEC': '#66BB6A', 'Smart-seq': '#FF5722', 'Smart-seq3': '#9C27B0', 'scGRO-seq': '#3F51B5' },
                3: { 'Blood': '#FFA726', 'Brain': '#66BB6A', 'Cell': '#42A5F5', 'Embryo': '#FF7043', 'MLS 1765-92(Liposarcoma)': '#8D6E63', 'PBMC': '#EC407A', 'H9(Human embryonic stem cell)': '#AB47BC', 'Heart': '#EF5350', 'CD8+ T': '#7E57C2', 'Ovary': '#F06292', 'Lymph Node': '#26A69A', 'Liver': '#26C6DA', 'MCF7': '#FFCA28', 'T-47D(Breast ductal carcinoma)': '#FFEE58', 'Bone marrow': '#D4E157', 'Retinal': '#9CCC65', 'Breast': '#FFB74D', 'Lung': '#4DB6AC', 'Dermal Fibroblast': '#BA68C8', 'HEK293T (Human embryonic kidney)': '#4FC3F7', 'GM12878(B-lymphoblastoid)': '#7986CB', 'HCT116(Colorectal carcinoma)': '#F48FB1', 'Skeletal Muscle': '#A1887F', 'CRL2097(Prostate carcinoma)': '#90A4AE', 'Pancreas': '#AED581', 'Testis': '#FFF176', 'Peripheral blood': '#E57373', 'Mammary': '#FF9800', 'Thymus': '#8BC34A', 'Kidney': '#00BCD4', 'Dorsal root ganglion': '#9C27B0', 'Germinal center B cell': '#3F51B5', 'Embryonic stem cells': '#E91E63', 'Embryonic fibroblast': '#607D8B', 'Kidney marrow': '#009688' }
            };
            return (colorSchemes[depth] && colorSchemes[depth][name]) ? colorSchemes[depth][name] : '#CCCCCC';
        }

        var paths = [
            ["Homo sapiens", "Smart-seq2", "Embryo"], ["Homo sapiens", "Smart-seq2", "MLS 1765-92(Liposarcoma)"], ["Homo sapiens", "Smart-seq2", "PBMC"], ["Homo sapiens", "Smart-seq2", "H9(Human embryonic stem cell)"], ["Homo sapiens", "Smart-seq2", "Heart"], ["Homo sapiens", "Smart-seq2", "Heart"], ["Homo sapiens", "Smart-seq2", "CD8+ T"], ["Homo sapiens", "Smart-seq2", "Ovary"], ["Homo sapiens", "Smart-seq2", "Lymph Node"], ["Homo sapiens", "Smart-seq", "Liver"], ["Homo sapiens", "SMARTer", "Heart"], ["Homo sapiens", "Smart-seq2", "Spleen"], ["Homo sapiens", "SMARTer", "MCF7"], ["Homo sapiens", "SMARTer", "T-47D(Breast ductal carcinoma)"], ["Homo sapiens", "SMARTer", "Bone marrow"], ["Homo sapiens", "SMARTer", "Retinal"], ["Homo sapiens", "Smart-seq2", "Bone marrow"], ["Homo sapiens", "Smart-seq2", "Breast"], ["Homo sapiens", "SMARTer", "Bone marrow"], ["Homo sapiens", "Smart-seq2", "Lung"], ["Homo sapiens", "Smart-seq2", "Breast"], ["Homo sapiens", "Smart-seq2", "Lymph Node"], ["Homo sapiens", "RamDA-seq", "Brain"], ["Homo sapiens", "SMART-seq-Total", "Dermal Fibroblast"], ["Homo sapiens", "SMART-seq-Total", "HEK293T (Human embryonic kidney)"], ["Homo sapiens", "SMART-seq-Total", "MCF7"], ["Homo sapiens", "Tang", "Embryo"], ["Homo sapiens", "Tang", "Embryo"], ["Homo sapiens", "SMARTer", "GM12878(B-lymphoblastoid)"], ["Homo sapiens", "Smart-seq2", "HEK293T (Human embryonic kidney)"], ["Homo sapiens", "SMARTer", "HCT116(Colorectal carcinoma)"], ["Homo sapiens", "SMARTer", "Skeletal Muscle"], ["Homo sapiens", "SMARTer", "Embryo"], ["Homo sapiens", "SMARTer", "CRL2097(Prostate carcinoma)"], ["Homo sapiens", "SMARTer", "Brain"], ["Homo sapiens", "SMARTer", "Lung"], ["Homo sapiens", "SUPeR-Seq", "Embryo"], ["Homo sapiens", "Smart-seq2", "Pancreas"], ["Homo sapiens", "SMARTer", "Brain"], ["Homo sapiens", "SMARTer", "Breast"], ["Homo sapiens", "Smart-seq2", "Heart"], ["Homo sapiens", "SMARTer", "Breast"], ["Homo sapiens", "SMARTer", "Lung"], ["Homo sapiens", "SMARTer", "Embryo"], ["Homo sapiens", "MATQ-seq", "HEK293T (Human embryonic kidney)"], ["Homo sapiens", "Smart-seq2", "Pancreas"], ["Homo sapiens", "SMARTer", "Pancreas"], ["Homo sapiens", "Smart-seq2", "Brain"], ["Homo sapiens", "SMARTer", "Brain"], ["Homo sapiens", "SMARTer", "Testis"], ["Homo sapiens", "Smart-seq2", "Embryo"], ["Homo sapiens", "SMARTer", "Liver"], ["Homo sapiens", "ReapTEC", "CD4+ T"], ["Homo sapiens", "Smart-seq2", "Peripheral blood"],
            ["Mus musculus", "SMARTer", "Embryo"], ["Mus musculus", "Smart-seq2", "Embryo"], ["Mus musculus", "SMARTer", "Lymph Node"], ["Mus musculus", "Smart-seq2", "Embryo"], ["Mus musculus", "Smart-seq2", "Brain"], ["Mus musculus", "SMARTer", "Spleen"], ["Mus musculus", "Smart-seq2", "Brain"], ["Mus musculus", "Smart-seq3", "Brain"], ["Mus musculus", "SMARTer", "Lung"], ["Mus musculus", "SMARTer", "Brain"], ["Mus musculus", "Smart-seq2", "Liver"], ["Mus musculus", "Smart-seq2", "Lung"], ["Mus musculus", "Smart-seq2", "Mammary"], ["Mus musculus", "Smart-seq2", "Bone marrow"], ["Mus musculus", "Smart-seq2", "Pancreas"], ["Mus musculus", "Smart-seq2", "Spleen"], ["Mus musculus", "Smart-seq2", "Thymus"], ["Mus musculus", "Smart-seq2", "Heart"], ["Mus musculus", "Smart-seq2", "Kidney"], ["Mus musculus", "Smart-seq2", "Brain"], ["Mus musculus", "SMARTer", "Brain"], ["Mus musculus", "SMARTer", "Brain"], ["Mus musculus", "SMARTer", "Brain"], ["Mus musculus", "Smart-seq2", "Brain"], ["Mus musculus", "Smart-seq2", "Brain"], ["Mus musculus", "SMARTer", "Brain"], ["Mus musculus", "SMARTer", "Brain"], ["Mus musculus", "Smart-seq2", "Lung"], ["Mus musculus", "Smart-seq2", "Brain"], ["Mus musculus", "Tang", "Embryo"], ["Mus musculus", "scGRO-seq", "Embryonic stem cells"], ["Mus musculus", "Tang", "Embryo"], ["Mus musculus", "SMARTer", "Embryo"], ["Mus musculus", "Smart-seq2", "Embryonic fibroblast"], ["Mus musculus", "SMARTer", "Lung"], ["Mus musculus", "SUPeR-Seq", "Embryo"], ["Mus musculus", "SMARTer", "Embryo"], ["Mus musculus", "SMARTer", "Kidney"], ["Mus musculus", "SMARTer", "Thymus"], ["Mus musculus", "SMARTer", "Kidney"], ["Mus musculus", "SMARTer", "Brain"], ["Mus musculus", "SMARTer", "Brain"], ["Mus musculus", "Smart-seq2", "Thymus"], ["Mus musculus", "SMARTer", "CD4+ T"], ["Mus musculus", "SMARTer", "Brain"], ["Mus musculus", "Smart-seq2", "Dorsal root ganglion"], ["Mus musculus", "SMARTer", "Lymph Node"], ["Mus musculus", "SMARTer", "Pancreas"], ["Mus musculus", "SMARTer", "Pancreas"], ["Mus musculus", "SMARTer", "Germinal center B cell"], ["Mus musculus", "Smart-seq2", "Brain"], ["Mus musculus", "Smart-seq2", "Pancreas"], ["Mus musculus", "Smart-seq2", "Retinal"], ["Mus musculus", "SMARTer", "Lymph Node"], ["Mus musculus", "SMARTer", "Brain"], ["Mus musculus", "Smart-seq2", "Brain"], ["Mus musculus", "Smart-seq2", "Pancreas"], ["Mus musculus", "SMARTer", "Liver"], ["Mus musculus", "Smart-seq2", "Liver"], ["Mus musculus", "Tang", "Brain"], ["Mus musculus", "Smart-seq", "Brain"], ["Mus musculus", "Smart-seq2", "Heart"], ["Mus musculus", "Smart-seq2", "Brain"], ["Mus musculus", "SMARTer", "Testis"],
            ["Drosophila melanogaster", "Smart-seq2", "Brain"], ["Drosophila melanogaster", "Smart-seq2", "Brain"],
            ["Danio rerio", "Smart-seq2", "Kidney marrow"], ["Danio rerio", "Smart-seq2", "Brain"],
            ["Gallus gallus", "SMARTer", "Embryo"], ["Gallus gallus", "SMARTer", "Embryo"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo"]
        ];

        var data = [];
        paths.forEach(p => addPath({ children: data }, p, getColorByDepth));
        calculateValues(data);

        // ==========================================
        // 【核心修改】：应用旭日图完美配置方案
        // ==========================================
        var option = {
            textStyle: {
                fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif'
            },
            title: {
                text: 'Species / Technology / Tissue Distribution',
                left: 'center',
                top: '0%',
                textStyle: {
                    color: '#0362a4',
                    fontSize: 16,
                    fontWeight: 'bold',
                    width: 320,
                    overflow: 'break'
                }
            },
            tooltip: {
                trigger: 'item',
                formatter: formatTooltip,
                textStyle: { fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif' }
            },
            series: [{
                type: 'sunburst',
                data: data,
                radius: [0, '85%'],
                center: ['50%', '55%'],
                sort: null,
                emphasis: {
                    focus: 'ancestor',
                    itemStyle: { shadowBlur: 10, shadowColor: 'rgba(0, 0, 0, 0.5)' },
                    label: {
                        show: true,
                        formatter: '{b}',
                        color: '#000',
                        textBorderColor: '#fff',
                        textBorderWidth: 3,
                        backgroundColor: 'rgba(255, 255, 255, 0.95)',
                        padding: [4, 8],
                        borderRadius: 4,
                        fontSize: 14,
                        fontWeight: 'bold',
                        fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif'
                    }
                },
                nodeClick: 'rootToNode',
                label: {
                    show: true,
                    formatter: '{b}',
                    color: 'transparent',
                    textBorderColor: 'transparent',
                    backgroundColor: 'transparent',
                    rotate: 'radial',
                    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif'
                },
                levels: [
                    {},
                    {
                        r0: '10%', r: '30%',
                        itemStyle: { borderWidth: 2, borderColor: '#fff' },
                        label: { rotate: 0 }
                    },
                    {
                        r0: '30%', r: '55%',
                        itemStyle: { borderWidth: 1, borderColor: '#fff' }
                    },
                    {
                        r0: '55%', r: '80%'
                    }
                ]
            }]
        };
        myChart.setOption(option);

        // 联动逻辑
        let isSimulatingClick = false;
        function findNodeByPath(nodes, path, depth = 0) {
            if (!nodes || depth >= path.length) return null;
            const targetName = path[depth];
            const node = nodes.find(n => n.name.toLowerCase() === targetName.toLowerCase());
            if (!node) return null;
            if (depth === path.length - 1) return node;
            return findNodeByPath(node.children, path, depth + 1);
        }

        function simulateNodeClick(nodePath) {
            if (!nodePath || nodePath.length === 0) return;
            const targetNode = findNodeByPath(data, nodePath);
            if (!targetNode) return;
            isSimulatingClick = true;
            myChart.dispatchAction({ type: 'sunburstRootToNode', targetNodeId: targetNode.id || targetNode.name });
            setTimeout(() => { isSimulatingClick = false; }, 300);
        }

        function jumpToSelectedNode() {
            const species = $(speId).val();
            const tech = $(techId).val();
            const tissue = $(targetId).val();
            let targetPath = [];
            if (species) targetPath.push(species);
            if (tech) targetPath.push(tech);
            if (tissue) targetPath.push(tissue);
            if (targetPath.length > 0) simulateNodeClick(targetPath);
        }

        function autoselect_tech_local(Species, callback) {
            if (!Species) return;
            $.ajax({
                url: '../../api/auto_select_tech.php', type: 'post', dataType: 'json', data: { 'select_specie': Species },
                success: function (res) {
                    $(techId)[0].innerHTML = res.map(item => `<option value="${item}">${item}</option>`).join('');
                    $(techId).selectpicker('refresh');
                    if (callback) callback();
                }
            });
        }

        function autoselect_tissue_local(Species, Techtype, callback) {
            if (!Species || !Techtype) return;
            $.ajax({
                url: '../../api/auto_select_tissue.php', type: 'post', dataType: 'json', data: { 'select_specie': Species, 'select_experiment': Techtype },
                success: function (res) {
                    $(targetId)[0].innerHTML = res.map(item => `<option value="${item}">${item}</option>`).join('');
                    $(targetId).selectpicker('refresh');
                    if (callback) callback();
                }
            });
        }

        window.populateExamples_tissue = function() {
            $(speId).append('<option value="Homo sapiens">Homo sapiens</option>').val('Homo sapiens');
            $(techId).append('<option value="Smart-seq2">Smart-seq2</option>').val('Smart-seq2');
            $(targetId).append('<option value="Pancreas">Pancreas</option>').val('Pancreas');
            $('.selectpicker').selectpicker('refresh');
        };

        window.tissue_url = function() {
            var url = '../../tissue_result.php?species=' + encodeURIComponent($(speId).val()) + '&techtype=' + encodeURIComponent($(techId).val()) + '&tissue=' + encodeURIComponent($(targetId).val());
            window.location.href = url;
        };

        $(function(){
            $("#reset_tissue").click(function(e){ e.preventDefault(); window.location.reload(); });
            $('#t1_tissue').on('click', function () { autoselect_tech_local($(speId).val()); });
            $('#t2_tissue').on('click', function () { autoselect_tissue_local($(speId).val(), $(techId).val()); });

            $(speId).on("change", function() {
                const species = $(this).val();
                if (species) {
                    autoselect_tech_local(species, () => { $(techId).val('').selectpicker('refresh'); $(targetId).val('').selectpicker('refresh'); jumpToSelectedNode(); });
                } else { $(techId).val('').selectpicker('refresh'); $(targetId).val('').selectpicker('refresh'); jumpToSelectedNode(); }
            });

            $(techId).on("change", function() {
                const species = $(speId).val();
                const tech = $(this).val();
                if (species && tech) {
                    autoselect_tissue_local(species, tech, () => { $(targetId).val('').selectpicker('refresh'); jumpToSelectedNode(); });
                } else { $(targetId).val('').selectpicker('refresh'); jumpToSelectedNode(); }
            });

            $(targetId).on("change", function() { jumpToSelectedNode(); });

            myChart.on('click', function (params) {
                if (isSimulatingClick) return;
                const pathNames = params.treePathInfo.map(n => n.name).filter(Boolean);
                const depth = params.treePathInfo.length - 1;

                if (depth === 0) {
                    if ($(targetId).val()) $(targetId).val('').selectpicker('refresh');
                    else if ($(techId).val()) { $(techId).val('').selectpicker('refresh'); $(targetId).val('').selectpicker('refresh'); }
                    else if ($(speId).val()) { $(speId).val('').selectpicker('refresh'); $(techId).val('').selectpicker('refresh'); $(targetId).val('').selectpicker('refresh'); }
                    return;
                }
                const [spe, tech, tissue] = pathNames;
                if (spe) {
                    $(speId).val(spe).selectpicker('refresh');
                    autoselect_tech_local(spe, () => {
                        if (tech) {
                            $(techId).val(tech).selectpicker('refresh');
                            autoselect_tissue_local(spe, tech, () => {
                                if (tissue) $(targetId).val(tissue).selectpicker('refresh');
                            });
                        }
                    });
                }
            });
        });
    })();

    /* ======================================================= */
    /* ================= CELL 区域逻辑 ========================= */
    /* ======================================================= */
    (function() {
        const speId = '#Spe_cell';
        const techId = '#Tech_cell';
        const targetId = '#Cell_select';

        var myChart = echarts.init(document.getElementById('main_cell'));
        window.allECharts.push(myChart);

        function getColorByDepth(depth, name) {
            const fallbackColors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFA726', '#BA68C8', '#26A69A', '#26C6DA', '#EF5350', '#EC407A', '#AB47BC', '#7E57C2', '#42A5F5', '#66BB6A', '#9CCC65', '#8BC34A', '#7CB342', '#689F38'];
            return fallbackColors[Math.abs(name.split('').reduce((a,b)=>{a=((a<<5)-a)+b.charCodeAt(0);return a&a},0)) % fallbackColors.length];
        }

        var paths = [
            ["Homo sapiens", "Smart-seq2", "NA"], ["Homo sapiens", "Smart-seq2", "Memory B cell"], ["Homo sapiens", "Smart-seq2", "Naive B cell"], ["Homo sapiens", "Smart-seq2", "Plasmablast"], ["Homo sapiens", "Smart-seq2", "Transitional stage B cell"], ["Homo sapiens", "Smart-seq2", "Embryonic stem cell"], ["Homo sapiens", "Smart-seq2", "Fibroblast of dermis"], ["Homo sapiens", "Smart-seq2", "CD8-positive, alpha-beta T cell"], ["Homo sapiens", "Smart-seq2", "Cord blood CD34+ haemopoietic stem and progenitor cells"], ["Homo sapiens", "Smart-seq", "HuH-1"], ["Homo sapiens", "Smart-seq", "HuH-7"], ["Homo sapiens", "SMARTer", "Foreskin Human Fibroblasts"], ["Homo sapiens", "Smart-seq2", "PBMC"], ["Homo sapiens", "SMARTer", "MCF7"], ["Homo sapiens", "SMARTer", "Multiple myeloma"], ["Homo sapiens", "SMARTer", "Hematopoietic cell line"], ["Homo sapiens", "Smart-seq2", "Plasma cells"], ["Homo sapiens", "RamDA-seq", "Neural stem cell derived from human induced pluripotent stem"], ["Homo sapiens", "SMART-seq-Total", "Primary cell"], ["Homo sapiens", "SMART-seq-Total", "HEK293T"], ["Homo sapiens", "SMART-seq-Total", "MCF7"], ["Homo sapiens", "Tang", "Human preimplantation blastomere"], ["Homo sapiens", "Tang", "Human embryonic stem cell"], ["Homo sapiens", "Tang", "Oocyte"], ["Homo sapiens", "Tang", "Pronucleus"], ["Homo sapiens", "Tang", "Zygote"], ["Homo sapiens", "Tang", "2-cell blastomere"], ["Homo sapiens", "Tang", "4-cell blastomere"], ["Homo sapiens", "Tang", "8-cell blastomere"], ["Homo sapiens", "Tang", "Morula"], ["Homo sapiens", "SMARTer", "GM12878"], ["Homo sapiens", "Smart-seq2", "HEK293T"], ["Homo sapiens", "SMARTer", "HCT116(Colorectal carcinoma)"], ["Homo sapiens", "SMARTer", "Human Skeletal Muscle Myoblasts (HSMM)"], ["Homo sapiens", "SMARTer", "Human embryonic stem cells"], ["Homo sapiens", "SMARTer", "Primary foreskin fibroblast cells"], ["Homo sapiens", "SMARTer", "Oligodendrocytes"], ["Homo sapiens", "SMARTer", "Astrocytes"], ["Homo sapiens", "SMARTer", "Oligodendrocyte Precursor Cell"], ["Homo sapiens", "SMARTer", "Microglia"], ["Homo sapiens", "SMARTer", "Neurons"], ["Homo sapiens", "SMARTer", "Endothelial"], ["Homo sapiens", "SUPeR-Seq", "MII oocyte"], ["Homo sapiens", "SUPeR-Seq", "Zygote"], ["Homo sapiens", "SUPeR-Seq", "Morula"], ["Homo sapiens", "Smart-seq2", "Alpha"], ["Homo sapiens", "Smart-seq2", "Delta"], ["Homo sapiens", "Smart-seq2", "Pp"], ["Homo sapiens", "Smart-seq2", "Duct"], ["Homo sapiens", "Smart-seq2", "Acinar"], ["Homo sapiens", "Smart-seq2", "Beta"], ["Homo sapiens", "Smart-seq2", "Islet"], ["Homo sapiens", "Smart-seq2", "In vivo single Tcell"], ["Homo sapiens", "Smart-seq2", "Ex vivo single Tcell"], ["Homo sapiens", "Smart-seq2", "Peripheral blood mononuclear cells"], ["Homo sapiens", "SMARTer", "Primary breast cancer"], ["Homo sapiens", "SMARTer", "Metastatic breast cancer"], ["Homo sapiens", "MATQ-seq", "HEK293T"], ["Homo sapiens", "Smart-seq2", "Ductal"], ["Homo sapiens", "Smart-seq2", "Mesenchymal"], ["Homo sapiens", "SMARTer", "Alpha"], ["Homo sapiens", "SMARTer", "Duct"], ["Homo sapiens", "SMARTer", "Delta"], ["Homo sapiens", "SMARTer", "Beta"], ["Homo sapiens", "SMARTer", "Pp"], ["Homo sapiens", "SMARTer", "Acinar"], ["Homo sapiens", "Smart-seq2", "Neoplastic"], ["Homo sapiens", "Smart-seq2", "Oligodendrocyte"], ["Homo sapiens", "Smart-seq2", "Oligodendrocyte Precursor Cell"], ["Homo sapiens", "Smart-seq2", "Immune cell"], ["Homo sapiens", "Smart-seq2", "Neuron"], ["Homo sapiens", "Smart-seq2", "Vascular"], ["Homo sapiens", "Smart-seq2", "Astocyte"], ["Homo sapiens", "SMARTer", "Spermatogonial Stem Cells"], ["Homo sapiens", "Smart-seq2", "Embryonic stem cell"], ["Homo sapiens", "SMARTer", "Single cell transcriptome from adult liver"], ["Homo sapiens", "SMARTer", "Single cell transcriptome from fetal liver"], ["Homo sapiens", "ReapTEC", "CD4+ T"], ["Homo sapiens", "Smart-seq2", "B cell"],
            ["Mus musculus", "Smart-seq2", "Hepatoblast/hepatocyte"], ["Mus musculus", "Smart-seq2", "Cholangiocyte"], ["Mus musculus", "Smart-seq", "Hypothalamic neuronal cell"], ["Mus musculus", "Smart-seq2", "Cardiomyocytes"], ["Mus musculus", "SMARTer", "Testicular cells"], ["Mus musculus", "Smart-seq2", "Acinar"], ["Mus musculus", "SMARTer", "Neuron"], ["Mus musculus", "SMARTer", "Astro"], ["Mus musculus", "SMARTer", "Oligo"], ["Mus musculus", "SMARTer", "Vascular"], ["Mus musculus", "SMARTer", "Microglia"], ["Mus musculus", "SMARTer", "OPC"], ["Mus musculus", "SMARTer", "Macrophage"], ["Mus musculus", "SMARTer", "NSC"], ["Mus musculus", "SMARTer", "Mesenchymal cells"], ["Mus musculus", "SMARTer", "Glutamatergic progenitors"], ["Mus musculus", "SMARTer", "Dopamine neuron"], ["Mus musculus", "Smart-seq2", "Old_NSC"], ["Mus musculus", "Smart-seq2", "Old_astrocyte"], ["Mus musculus", "SMARTer", "Cortical cells"], ["Mus musculus", "SMARTer", "GABAergic"], ["Mus musculus", "SMARTer", "Glutamatergic 2"], ["Mus musculus", "SMARTer", "Glutamatergic 1"], ["Mus musculus", "Tang", "Wild type mouse oocyte"], ["Mus musculus", "Tang", "Mouse Dicer knockout oocyte"], ["Mus musculus", "Tang", "Mouse blastomere"], ["Mus musculus", "scGRO-seq", "V6.5"], ["Mus musculus", "Tang", "Oocyte"], ["Mus musculus", "Tang", "Pronucleus"], ["Mus musculus", "Tang", "2-cell blastomere"], ["Mus musculus", "Tang", "4-cell blastomere"], ["Mus musculus", "Tang", "8-cell blastomere"], ["Mus musculus", "Tang", "Morula"], ["Mus musculus", "Smart-seq2", "C2C12"], ["Mus musculus", "Smart-seq2", "Mouse embryonic fibroblast"], ["Mus musculus", "SUPeR-Seq", "2-cell embryo"], ["Mus musculus", "SUPeR-Seq", "4-cell embryo"], ["Mus musculus", "SUPeR-Seq", "8-cell embryo"], ["Mus musculus", "SUPeR-Seq", "Blastocyst"], ["Mus musculus", "SUPeR-Seq", "Morula"], ["Mus musculus", "SUPeR-Seq", "Zygote"], ["Mus musculus", "SUPeR-Seq", "Mouse oocyte"], ["Mus musculus", "SUPeR-Seq", "Mouse zygote"], ["Mus musculus", "SUPeR-Seq", "Mouse ES cell"], ["Mus musculus", "SMARTer", "Medullary thymic epithelial cell"], ["Mus musculus", "SMARTer", "CD4 T cells"], ["Mus musculus", "SMARTer", "Neural progenitor cell"], ["Mus musculus", "Smart-seq2", "Dorsal root ganglion neuron"], ["Mus musculus", "Smart-seq3", "Th-eGFP+ sorted dopaminergic neuron"], ["Mus musculus", "SMARTer", "Naive CD4+ T cell"], ["Mus musculus", "SMARTer", "Resting B cell"], ["Mus musculus", "SMARTer", "Blastoderm cell"], ["Mus musculus", "SMARTer", "Gamma-delta T cell"],
            ["Drosophila melanogaster", "Smart-seq2", "Neuron"], ["Drosophila melanogaster", "Smart-seq2", "Olfactory projection neuron"], ["Drosophila melanogaster", "Smart-seq2", "Astrocyte"],
            ["Danio rerio", "Smart-seq2", "10 days post fertilization habenula"],
            ["Gallus gallus", "SMARTer", "Chicken primitive streak cell"], ["Gallus gallus", "SMARTer", "Chicken surrounding region cell"], ["Gallus gallus", "SMARTer", "Chicken epiblast cell"], ["Gallus gallus", "SMARTer", "Cranial Neural Crest Cells"],
            ["Caenorhabditis elegans", "SMARTer", "P0"], ["Caenorhabditis elegans", "SMARTer", "AB"], ["Caenorhabditis elegans", "SMARTer", "P1"], ["Caenorhabditis elegans", "SMARTer", "EMS"], ["Caenorhabditis elegans", "SMARTer", "ABa"], ["Caenorhabditis elegans", "SMARTer", "ABp"], ["Caenorhabditis elegans", "SMARTer", "P2"], ["Caenorhabditis elegans", "SMARTer", "MS"], ["Caenorhabditis elegans", "SMARTer", "C"], ["Caenorhabditis elegans", "SMARTer", "E"], ["Caenorhabditis elegans", "SMARTer", "D"]
        ];

        var data = [];
        paths.forEach(p => addPath({ children: data }, p, getColorByDepth));
        calculateValues(data);

        // ==========================================
        // 【核心修改】：应用旭日图完美配置方案
        // ==========================================
        var option = {
            textStyle: {
                fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif'
            },
            title: {
                text: 'Species / Technology / Cell Type Distribution',
                left: 'center',
                top: '0%',
                textStyle: {
                    color: '#0362a4',
                    fontSize: 16,
                    fontWeight: 'bold',
                    width: 320,
                    overflow: 'break'
                }
            },
            tooltip: {
                trigger: 'item',
                formatter: formatTooltip,
                textStyle: { fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif' }
            },
            series: [{
                type: 'sunburst',
                data: data,
                radius: [0, '85%'],
                center: ['50%', '55%'],
                sort: null,
                emphasis: {
                    focus: 'ancestor',
                    itemStyle: { shadowBlur: 10, shadowColor: 'rgba(0, 0, 0, 0.5)' },
                    label: {
                        show: true,
                        formatter: '{b}',
                        color: '#000',
                        textBorderColor: '#fff',
                        textBorderWidth: 3,
                        backgroundColor: 'rgba(255, 255, 255, 0.95)',
                        padding: [4, 8],
                        borderRadius: 4,
                        fontSize: 14,
                        fontWeight: 'bold',
                        fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif'
                    }
                },
                nodeClick: 'rootToNode',
                label: {
                    show: true,
                    formatter: '{b}',
                    color: 'transparent',
                    textBorderColor: 'transparent',
                    backgroundColor: 'transparent',
                    rotate: 'radial',
                    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif'
                },
                levels: [
                    {},
                    {
                        r0: '10%', r: '30%',
                        itemStyle: { borderWidth: 2, borderColor: '#fff' },
                        label: { rotate: 0 }
                    },
                    {
                        r0: '30%', r: '55%',
                        itemStyle: { borderWidth: 1, borderColor: '#fff' }
                    },
                    {
                        r0: '55%', r: '80%'
                    }
                ]
            }]
        };
        myChart.setOption(option);

        let isSimulatingClick = false;
        function findNodeByPath(nodes, path, depth = 0) {
            if (!nodes || depth >= path.length) return null;
            const targetName = path[depth];
            const node = nodes.find(n => n.name === targetName);
            if (!node) return null;
            if (depth === path.length - 1) return node;
            return findNodeByPath(node.children, path, depth + 1);
        }

        function simulateNodeClick(nodePath) {
            if (!nodePath || nodePath.length === 0) return;
            const targetNode = findNodeByPath(data, nodePath);
            if (!targetNode) return;
            isSimulatingClick = true;
            myChart.dispatchAction({ type: 'sunburstRootToNode', targetNodeId: targetNode.id || targetNode.name });
            myChart.dispatchAction({ type: 'highlight', name: targetNode.name });
            setTimeout(() => { isSimulatingClick = false; }, 300);
        }

        function jumpToSelectedNode() {
            const species = $(speId).val();
            const tech = $(techId).val();
            const study = $(targetId).val();
            let targetPath = [];
            if (species) targetPath.push(species);
            if (tech) targetPath.push(tech);
            if (study) targetPath.push(study);
            if (targetPath.length > 0) simulateNodeClick(targetPath);
        }

        function autoselect_tech_local(Species) {
            if (Species == "") { alert('Sorry. No result for your input.'); return; }
            $.ajax({
                url: '../../api/auto_select_tech.php', type: 'post', dataType: 'json', data: { 'select_specie': Species }, async: true,
                success: function (res) {
                    var options = res.map(item => `<option value="${item}">${item}</option>`);
                    $(techId)[0].innerHTML = options.join('');
                    $(techId).selectpicker('refresh');
                }
            });
        }

        function autoselect_cell_local(Species, Techtype) {
            if (Species == "" || Techtype == "") return;
            $.ajax({
                url: '../../api/auto_select_cell.php', type: 'post', dataType: 'json', data: { 'select_specie': Species, 'select_experiment': Techtype }, async: true,
                success: function (res) {
                    var options = res.map(item => `<option value="${item}">${item}</option>`);
                    $(targetId)[0].innerHTML = options.join('');
                    $(targetId).selectpicker('refresh');
                }
            });
        }

        window.populateExamples_cell = function() {
            $(speId).append('<option value="Homo sapiens">Homo sapiens</option>').val('Homo sapiens');
            $(techId).append('<option value="Smart-seq2">Smart-seq2</option>').val('Smart-seq2');
            $(targetId).append('<option value="Neuron">Neuron</option>').val('Neuron');
            $('.selectpicker').selectpicker('refresh');
        };

        window.cell_url = function() {
            var url = '../../cell_result.php?species=' + encodeURIComponent($(speId).val()) + '&techtype=' + encodeURIComponent($(techId).val()) + '&cell=' + encodeURIComponent($(targetId).val());
            window.location.href = url;
        };

        $(function(){
            $("#reset_cell").click(function(e){ e.preventDefault(); window.location.reload(); });
            $('#t1_cell').on('click', function () { autoselect_tech_local($(speId).val()); });
            $('#t2_cell').on('click', function () { autoselect_cell_local($(speId).val(), $(techId).val()); });

            $(speId).on("change", function() {
                const species = $(this).val();
                if (species) autoselect_tech_local(species);
                setTimeout(() => jumpToSelectedNode(), 200);
            });

            $(techId).on("change", function() {
                const species = $(speId).val();
                const tech = $(this).val();
                if (species && tech) autoselect_cell_local(species, tech);
                setTimeout(() => jumpToSelectedNode(), 200);
            });

            $(targetId).on("change", function() { jumpToSelectedNode(); });

            myChart.on('click', function (params) {
                if (isSimulatingClick) return;
                const names = params.treePathInfo.map(item => item.name).filter(Boolean);
                const [species, tech, study] = names;
                const depth = params.treePathInfo.length - 1;

                if (depth === 0) {
                    if ($(targetId).val()) $(targetId).val('').selectpicker('refresh');
                    else if ($(techId).val()) { $(techId).val('').selectpicker('refresh'); $(targetId).val('').selectpicker('refresh'); }
                    else if ($(speId).val()) { $(speId).val('').selectpicker('refresh'); $(techId).val('').selectpicker('refresh'); $(targetId).val('').selectpicker('refresh'); }
                    return;
                }

                if (species) $(speId).val(species).selectpicker('refresh');
                if (tech) {
                    autoselect_tech_local(species);
                    setTimeout(() => {
                        $(techId).val(tech).selectpicker('refresh');
                        if (study) {
                            autoselect_cell_local(species, tech);
                            setTimeout(() => { $(targetId).val(study).selectpicker('refresh'); }, 200);
                        }
                    }, 200);
                }
            });
        });
    })();
</script>

</body>
</html>