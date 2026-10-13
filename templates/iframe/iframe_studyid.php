<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Study Search - sceRNAdb</title>

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
        /* ======================================================== */
        /* 全局布局：保证 Footer 贴底 */
        /* ======================================================== */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        #main-wrapper {
            flex: 1 0 auto;
        }

        /* ======================================================== */
        /* 核心修复：建立统一宽度的安全容器，保证上下绝对对齐 */
        /* ======================================================== */
        .unified-container {
            width: 80%;
            max-width: 1400px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        /* ======================================================== */
        /* 顶部返回条样式 */
        /* ======================================================== */
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

        /* ======================================================== */
        /* 页面主体内容样式 */
        /* ======================================================== */
        .custom-border {
            border: 3px dashed #0295ff;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
        }
        .chart-container {
            position: relative;
            width: 100%;
            margin: 20px auto 40px;
            height: 55vh;
            min-height: 400px;
        }
        #main2 {
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
            Detail Search / Study
        </div>
    </div>
</div>

<div id="main-wrapper">
    <div class="unified-container" style="margin-top: 40px;">
        <div class="row">

            <div class="col-lg-6">
                <form onsubmit="return false;">
                    <div class="form-group">
                        <div class="center-block">
                            <label for="Spe" class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step1</span>: Please to choose a species</label>
                            <select class="selectpicker form-control" id="Spe" title="Select a species(e.g.'Homo Sapiens')" data-live-search="true">
                                <option value="Homo sapiens">Homo sapiens</option>
                                <option value="Mus musculus">Mus musculus</option>
                                <option value="Gallus gallus">Gallus gallus</option>
                                <option value="Danio rerio">Danio rerio</option>
                                <option value="Caenorhabditis elegans">Caenorhabditis elegans</option>
                                <option value="Drosophila melanogaster">Drosophila melanogaster</option>
                            </select>

                            <div class="center-block mt-3" id="t1">
                                <label for="Tech" class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step2</span>: Please to choose Sequencing Technology</label>
                                <select class="selectpicker form-control" id="Tech" title="Select a Sequencing type(e.g.'Smart-seq2')" data-live-search="true"></select>
                            </div>

                            <div class="center-block mt-3" id="t2">
                                <label for="Study" class="font-weight-bold text-justify" style="font-size: 14px;"><span style="color: red;">Step3</span>: Study ID</label>
                                <select class="selectpicker form-control" id="Study" title="Select Study ID" data-live-search="true"></select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a onclick="populateExamples()" class="btn btn-default" style="text-transform: none;"><b>Example</b></a>
                            <a class="btn btn-default" onclick="study_url()" style="text-transform: none;"><b>Search</b></a>
                            <button class="btn btn-default" id="reset" style="text-transform: none;"><b>Reset</b></button>
                        </div>

                        <div class="mt-3" style="color:darkgray; font-size: 13px;">
                            <p class="mb-1"><strong><i class="ni ni-tag text-warning"></i> Note:</strong></p>
                            <p class="mb-1">1. Species must be selected.</p>
                            <p class="mb-0">2. Step2 and Step3 are advanced search options for refining your search.</p>
                            <p class="mb-1">3. <strong>Interactive Sunburst Chart:</strong></p>
                            <ul style="padding-left: 20px; margin-bottom: 0;">
                                <li class="mb-1"><strong>Hover:</strong> Move mouse over a slice to view its full path.</li>
                                <li class="mb-1"><strong>Click a slice:</strong> Auto-fill options and drill down to the next level.</li>
                                <li class="mb-0"><strong>Click the center:</strong> Go back to the previous level or reset.</li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6">
                <div class="custom-border text-justify font-weight-400 px-4 py-2">
                    <h5 class="text-danger font-weight-bold"><i class="ni ni-tag text-warning"></i> Function introduction:</h5>
                    <p class="text-dark font-weight-400">
                        Based on the Species and Sequencing type, users can query for the results of interest dataset.
                    </p>
                    <h5 class="text-danger font-weight-bold mt-3"><i class="ni ni-tag text-warning"></i> Parameter explanation:</h5>
                    <p class="text-dark font-weight-400 mb-1">1) Species: Select Homo sapiens or Mus musculus and others.</p>
                    <p class="text-dark font-weight-400 mb-1">2) Experiment Type: Select the experiment type of interest.</p>
                    <p class="text-dark font-weight-400 mb-0">3) Dataset ID: Select the dataset of interest.</p>
                </div>

                <div class="chart-container">
                    <div id="main2"></div>
                </div>
            </div>

        </div>
    </div>
</div>
<footer>
    Copyright © Guo Lab 2026. School of Life Sciences and Engineering, Southwest Jiaotong University, Chengdu, China
</footer>

<script type="text/javascript">
    $.ajaxSetup({ cache: false });

    var myChart = echarts.init(document.getElementById('main2'));
    window.addEventListener('resize', () => myChart.resize());

    function getColorByDepth(depth, name) {
        const colorSchemes = {
            1: { 'Homo sapiens': '#FF6B6B', 'Caenorhabditis elegans': '#4ECDC4', 'Danio rerio': '#45B7D1', 'Mus musculus': '#96CEB4', 'Drosophila melanogaster': '#FFA726', 'Gallus gallus': '#BA68C8' },
            2: { 'SMARTer': '#AB47BC', 'Smart-seq2': '#EC407A', 'RamDA-seq': '#7E57C2', 'SMART-seq-Total': '#42A5F5', 'Tang': '#26A69A', 'SUPeR-Seq': '#FFA726', 'MATQ-seq': '#EF5350', 'ReapTEC': '#66BB6A', 'Smart-seq': '#FF5722', 'Smart-seq3': '#9C27B0', 'scGRO-seq': '#3F51B5' },
            3: ['#78909C', '#90A4AE', '#B0BEC5', '#CFD8DC', '#E0E0E0', '#EEEEEE']
        };

        if (depth <= 2 && colorSchemes[depth] && colorSchemes[depth][name]) {
            return colorSchemes[depth][name];
        } else if (depth === 3) {
            const index = Math.abs(name.split('').reduce((a,b)=>{a=((a<<5)-a)+b.charCodeAt(0);return a&a},0)) % colorSchemes[3].length;
            return colorSchemes[3][index];
        }
        return '#CCCCCC';
    }

    var paths = [
        ["Homo sapiens", "Smart-seq2", "E-MTAB-3929"], ["Homo sapiens", "Smart-seq2", "E-MTAB-6142"], ["Homo sapiens", "Smart-seq2", "E-MTAB-6386"], ["Homo sapiens", "Smart-seq2", "E-MTAB-6819"], ["Homo sapiens", "Smart-seq2", "E-MTAB-7052"], ["Homo sapiens", "Smart-seq2", "E-MTAB-7167"], ["Homo sapiens", "Smart-seq2", "E-MTAB-7606"], ["Homo sapiens", "Smart-seq2", "E-MTAB-8403"], ["Homo sapiens", "Smart-seq2", "GSE100618"], ["Homo sapiens", "Smart-seq", "GSE103866"], ["Homo sapiens", "SMARTer", "GSE105211"], ["Homo sapiens", "Smart-seq2", "GSE106540"], ["Homo sapiens", "SMARTer", "GSE107864-MCF7"], ["Homo sapiens", "SMARTer", "GSE107864-T-47D"], ["Homo sapiens", "SMARTer", "GSE110499"], ["Homo sapiens", "SMARTer", "GSE112507"], ["Homo sapiens", "Smart-seq2", "GSE115210"], ["Homo sapiens", "Smart-seq2", "GSE118389"], ["Homo sapiens", "SMARTer", "GSE118900"], ["Homo sapiens", "Smart-seq2", "GSE123837"], ["Homo sapiens", "RamDA-seq", "GSE125288"], ["Homo sapiens", "SMART-seq-Total", "GSE151334-Fibroblast"], ["Homo sapiens", "SMART-seq-Total", "GSE151334-HEK293T"], ["Homo sapiens", "SMART-seq-Total", "GSE151334-MCF7"], ["Homo sapiens", "Tang", "GSE36552"], ["Homo sapiens", "Tang", "GSE44183"], ["Homo sapiens", "SMARTer", "GSE44618"], ["Homo sapiens", "Smart-seq2", "GSE49321"], ["Homo sapiens", "SMARTer", "GSE51254"], ["Homo sapiens", "SMARTer", "GSE52529"], ["Homo sapiens", "SMARTer", "GSE64016"], ["Homo sapiens", "SMARTer", "GSE66053"], ["Homo sapiens", "SMARTer", "GSE67835"], ["Homo sapiens", "SMARTer", "GSE69405"], ["Homo sapiens", "SUPeR-Seq", "GSE71318"], ["Homo sapiens", "Smart-seq2", "GSE73727"], ["Homo sapiens", "SMARTer", "GSE75140"], ["Homo sapiens", "SMARTer", "GSE75367"], ["Homo sapiens", "Smart-seq2", "GSE75659"], ["Homo sapiens", "SMARTer", "GSE75688"], ["Homo sapiens", "SMARTer", "GSE75748"], ["Homo sapiens", "MATQ-seq", "GSE78968"], ["Homo sapiens", "Smart-seq2", "GSE81547"], ["Homo sapiens", "SMARTer", "GSE83139"], ["Homo sapiens", "Smart-seq2", "GSE84465"], ["Homo sapiens", "SMARTer", "GSE86982"], ["Homo sapiens", "SMARTer", "GSE92276"], ["Homo sapiens", "Smart-seq2", "GSE93593"], ["Homo sapiens", "SMARTer", "GSE96981"], ["Homo sapiens", "ReapTEC", "JGAD000822"], ["Homo sapiens", "Smart-seq2", "PRJNA472098"],
        ["Mus musculus", "SMARTer", "E-MTAB-3321"], ["Mus musculus", "Smart-seq2", "E-MTAB-4079"], ["Mus musculus", "SMARTer", "E-MTAB-7178"], ["Mus musculus", "Smart-seq2", "GSE100597"], ["Mus musculus", "Smart-seq2", "GSE101487"], ["Mus musculus", "SMARTer", "GSE106663"], ["Mus musculus", "Smart-seq2", "GSE107632"], ["Mus musculus", "Smart-seq3", "GSE108020"], ["Mus musculus", "SMARTer", "GSE109444"], ["Mus musculus", "SMARTer", "GSE109556"], ["Mus musculus", "Smart-seq2", "GSE109774"], ["Mus musculus", "SMARTer", "GSE109796"], ["Mus musculus", "SMARTer", "GSE112177"], ["Mus musculus", "SMARTer", "GSE115070"], ["Mus musculus", "Smart-seq2", "GSE115622"], ["Mus musculus", "Smart-seq2", "GSE116138"], ["Mus musculus", "SMARTer", "GSE118953"], ["Mus musculus", "SMARTer", "GSE121653"], ["Mus musculus", "Smart-seq2", "GSE125691"], ["Mus musculus", "Smart-seq2", "GSE127893"], ["Mus musculus", "Tang", "GSE22182"], ["Mus musculus", "scGRO-seq", "GSE242176"], ["Mus musculus", "Tang", "GSE44183"], ["Mus musculus", "SMARTer", "GSE45719"], ["Mus musculus", "Smart-seq2", "GSE49321"], ["Mus musculus", "SMARTer", "GSE52583"], ["Mus musculus", "SUPeR-Seq", "GSE53386"], ["Mus musculus", "SMARTer", "GSE57249"], ["Mus musculus", "SMARTer", "GSE59130"], ["Mus musculus", "SMARTer", "GSE60297"], ["Mus musculus", "SMARTer", "GSE66202"], ["Mus musculus", "SMARTer", "GSE71485"], ["Mus musculus", "SMARTer", "GSE71585"], ["Mus musculus", "Smart-seq2", "GSE74596"], ["Mus musculus", "SMARTer", "GSE74833"], ["Mus musculus", "SMARTer", "GSE76005"], ["Mus musculus", "Smart-seq2", "GSE76483"], ["Mus musculus", "SMARTer", "GSE77740"], ["Mus musculus", "SMARTer", "GSE77980"], ["Mus musculus", "SMARTer", "GSE78510"], ["Mus musculus", "SMARTer", "GSE79096"], ["Mus musculus", "Smart-seq2", "GSE79306"], ["Mus musculus", "Smart-seq2", "GSE80032"], ["Mus musculus", "Smart-seq2", "GSE80232"], ["Mus musculus", "SMARTer", "GSE81530"], ["Mus musculus", "SMARTer", "GSE82187"], ["Mus musculus", "Smart-seq2", "GSE87069"], ["Mus musculus", "Smart-seq2", "GSE87375"], ["Mus musculus", "SMARTer", "GSE87795"], ["Mus musculus", "Smart-seq2", "GSE90047"], ["Mus musculus", "Tang", "GSE90809"], ["Mus musculus", "Smart-seq", "GSE92707"], ["Mus musculus", "Smart-seq2", "GSE95140"], ["Mus musculus", "Smart-seq2", "GSE98816"], ["Mus musculus", "SMARTer", "PRJNA524391"],
        ["Drosophila melanogaster", "Smart-seq2", "GSE100058"], ["Drosophila melanogaster", "Smart-seq2", "GSE107451"],
        ["Danio rerio", "Smart-seq2", "GSE100911"], ["Danio rerio", "Smart-seq2", "GSE105115"],
        ["Gallus gallus", "SMARTer", "GSE108221"], ["Gallus gallus", "SMARTer", "GSE89910"],
        ["Caenorhabditis elegans", "SMARTer", "GSE77944"],
    ];

    function addPath(root, path) {
        let node = root;
        for (let i = 0; i < path.length; i++) {
            let name = path[i];
            if (!node.children) node.children = [];

            let child = node.children.find(n => n.name === name);
            if (!child) {
                child = {
                    name: name,
                    depth: i + 1,
                    itemStyle: { color: getColorByDepth(i + 1, name) }
                };
                if (i === path.length - 1) child.value = 1;
                node.children.push(child);
            }
            node = child;
        }
    }

    let root = { children: [] };
    paths.forEach(p => addPath(root, p));
    let data = root.children;

    function calculateValues(nodes) {
        if (!nodes || nodes.length === 0) return 0;
        nodes.forEach(node => {
            if (node.children && node.children.length > 0)
                node.value = calculateValues(node.children);
        });
        return nodes.reduce((sum, node) => sum + (node.value || 0), 0);
    }
    calculateValues(data);

    function formatTooltip(info) {
        let parts = [];
        let node = info;
        while (node) {
            if (node.name) parts.unshift(node.name);
            node = node.treePathInfo && node.treePathInfo.length > 1
                ? node.treePathInfo[node.treePathInfo.length - 2]
                : null;
        }
        return `${parts.join(' → ')}<br/>count: ${info.value || 0}`;
    }

    var option = {
        textStyle: { fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif' },
        title: {
            text: 'Species / Technology / Study Distribution',
            left: 'center', top: '0%',
            textStyle: { color: '#0362a4', fontSize: 16, fontWeight: 'bold', width: 320, overflow: 'break' }
        },
        tooltip: { trigger: 'item', formatter: formatTooltip, textStyle: { fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif' } },
        series: [{
            type: 'sunburst', data: data, radius: [0, '95%'], sort: null,
            emphasis: {
                focus: 'ancestor',
                itemStyle: { shadowBlur: 10, shadowColor: 'rgba(0,0,0,0.5)' },
                label: { show: true, formatter: '{b}', color: '#000', textBorderColor: '#fff', textBorderWidth: 3, backgroundColor: 'rgba(255, 255, 255, 0.95)', padding: [4, 8], borderRadius: 4, fontSize: 14, fontWeight: 'bold' }
            },
            nodeClick: 'rootToNode',
            label: { show: true, formatter: '{b}', color: 'transparent', textBorderColor: 'transparent', backgroundColor: 'transparent', rotate: 'radial' },
            levels: [
                {},
                { r0: '10%', r: '30%', itemStyle: { borderWidth: 2, borderColor: '#fff' }, label: { rotate: 0 } },
                { r0: '30%', r: '55%', itemStyle: { borderWidth: 1, borderColor: '#fff' } },
                { r0: '55%', r: '80%' }
            ]
        }]
    };
    myChart.setOption(option);

    // ---------- Promise 模式重构 AJAX 请求，解决时序冲突 ----------
    function autoselect_tech(Species) {
        return new Promise((resolve, reject) => {
            if (!Species) return reject();
            $.ajax({
                url: '../../api/auto_select_tech.php',
                type: 'post',
                dataType: 'json',
                data: { 'select_specie': Species },
                success: function (res) {
                    const options = res.map(t => `<option value="${t}">${t}</option>`).join('');
                    $('#Tech').html(options).selectpicker('refresh');
                    resolve();
                },
                error: reject
            });
        });
    }

    function autoselect_study(Species, Techtype) {
        return new Promise((resolve, reject) => {
            if (!Species || !Techtype) return reject();
            $.ajax({
                url: '../../api/auto_select_study.php',
                type: 'post',
                dataType: 'json',
                data: { 'select_specie': Species, 'select_experiment': Techtype },
                success: function (res) {
                    const options = res.map(t => `<option value="${t}">${t}</option>`).join('');
                    $('#Study').html(options).selectpicker('refresh');
                    resolve();
                },
                error: reject
            });
        });
    }

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
        const species = $("#Spe").val();
        const tech = $("#Tech").val();
        const study = $("#Study").val();
        let targetPath = [];
        if (species) targetPath.push(species);
        if (tech) targetPath.push(tech);
        if (study) targetPath.push(study);
        if (targetPath.length > 0) simulateNodeClick(targetPath);
    }

    // ---------- 核心修复：纯靠 select change 触发，避免 div click 冲突 ----------
    $(function () {
        $("#reset").click(function () { window.location.reload(); });

        $("#Spe").on("change", function () {
            // 清空子集并更新 UI
            $('#Tech').html('').selectpicker('refresh');
            $('#Study').html('').selectpicker('refresh');
            const species = $(this).val();
            if (species) {
                autoselect_tech(species).then(() => jumpToSelectedNode());
            } else {
                jumpToSelectedNode();
            }
        });

        $("#Tech").on("change", function () {
            // 清空子集并更新 UI
            $('#Study').html('').selectpicker('refresh');
            const species = $("#Spe").val();
            const tech = $(this).val();
            if (species && tech) {
                autoselect_study(species, tech).then(() => jumpToSelectedNode());
            } else {
                jumpToSelectedNode();
            }
        });

        $("#Study").on("change", function () {
            jumpToSelectedNode();
        });

        // ---------- 旭日图点击联动下拉框 ----------
        myChart.on('click', async function (params) {
            if (isSimulatingClick) return;
            const depth = params.treePathInfo.length - 1;
            const names = params.treePathInfo.map(item => item.name).filter(Boolean);
            const [species, tech, study] = names;

            if (depth === 0) {
                const currentStudy = $("#Study").val();
                const currentTech = $("#Tech").val();
                if (currentStudy) {
                    $("#Study").val('').selectpicker('refresh');
                } else if (currentTech) {
                    $("#Tech").val('').selectpicker('refresh');
                    $("#Study").html('').selectpicker('refresh');
                } else {
                    $("#Spe").val('').selectpicker('refresh');
                    $("#Tech").html('').selectpicker('refresh');
                    $("#Study").html('').selectpicker('refresh');
                }
                return;
            }

            try {
                if (species) {
                    $("#Spe").val(species).selectpicker('refresh');
                    if (tech) {
                        await autoselect_tech(species);
                        $("#Tech").val(tech).selectpicker('refresh');
                        if (study) {
                            await autoselect_study(species, tech);
                            $("#Study").val(study).selectpicker('refresh');
                        }
                    }
                }
            } catch (error) {
                console.error("加载下拉框数据失败", error);
            }
        });
    });

    // 填充示例函数也采用 Promise 流
    function populateExamples() {
        var species = 'Homo sapiens';
        $('#Spe').selectpicker('val', species);
        autoselect_tech(species).then(() => {
            var tech = 'SMARTer';
            $('#Tech').selectpicker('val', tech);
            return autoselect_study(species, tech);
        }).then(() => {
            var study = 'GSE75140';
            $('#Study').selectpicker('val', study);
            jumpToSelectedNode();
        });
    }

    function study_url() {
        var sid = $("#Study").val();
        if (!sid) {
            alert("Please select a Study ID first!");
            return;
        }
        var url = '../../detail_study.php?sid=' + encodeURIComponent(sid);
        parent.location.href = url;
    }
</script>

</body>
</html>
