<?php
include "./base_iframe_test.php";
?>

<script src="../../echarts-5.5.0/dist/echarts.js"></script>
<style>
    .custom-border {
        border: 3px dashed #0295ff; /* 虚线边框，颜色蓝色，宽度3px */
        /*border-radius: 10px;     /* 可选：为边框添加圆角 */
        padding: 20px;           /* 内部间距，确保内容不会紧贴边框 */
        margin: 10px 0;          /* 外部间距，确保与其他元素有一定距离 */
    }
    .chart-container {
        position: relative;       /* 作为定位参考 */
        width: 80%;               /* 宽度占网页 80% */
        max-width: 800px;        /* 最大宽度限制 */
        min-width: 500px;         /* 最小宽度 */
        margin: 0 auto;           /* 水平居中 */
        height: 60vh;             /* 高度随视口高度变化 */
        min-height: 410px;        /* 最小高度 */
        max-height: 800px;        /* 最大高度 */
        top: -30px;              /* 向上偏移 */
    }

    #main2 {
        width: 100%;
        height: 100%;
        position: absolute;       /* 固定在容器内 */
        top: 0;
        left: 0;
    }
</style>

<body style="overflow-x: hidden;overflow-y: hidden;">
<!-- 第一个表单 -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <form >
                <div class="form-group">
                    <div class="center-block">
                        <label for="specie_lncs" class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step1</span>: Please to choose a species</label>
                        <select class="selectpicker form-control" id="Spe"
                                title="Select a species(e.g.'Homo Sapiens')" data-container="body"
                                data-live-search="true" data-hide-disabled="true" data-actions-box="true"
                                data-virtual-scroll="false">
                            <option value="Homo sapiens">Homo sapiens</option>
                            <option value="Mus musculus">Mus musculus</option>
                            <option value="Gallus gallus">Gallus gallus</option>
                            <option value="Danio rerio">Danio rerio</option>
                            <option value="Caenorhabditis elegans">Caenorhabditis elegans</option>
                            <option value="Drosophila melanogaster">Drosophila melanogaster</option>
                        </select>

                        <!-- Tech List -->
                        <div class="center-block" id="t1">
                            <label for="specie_lncs" class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step2</span>: Please to choose Sequencing Technology</label>
                            <select class="selectpicker form-control" id="Tech"
                                    title="Select a Sequencing type(e.g.'Smart-seq2')" data-container="body"
                                    data-live-search="true" data-hide-disabled="true" data-actions-box="true"
                                    data-virtual-scroll="false">
                            </select>
                        </div>

                        <div class="center-block" id="t2">
                            <!-- Tissue List-->
                            <label  class="font-weight-bold text-justify" style="font-size: 14px;"><span style="color: red;">Step3</span>: Tissue type</label>
                            <select class="selectpicker form-control" id="Tissue"
                                    title="Select Tissue Type" data-container="body"
                                    data-live-search="true" data-hide-disabled="true" data-actions-box="true"
                                    data-virtual-scroll="false">
                            </select>
                        </div>
                        <!-- 结束 -->
                    </div>


                    <div class="mt-2">
                        <a onclick="populateExamples()" class="btn btn-default"><b>Example</b></a>
                        <a class="btn btn-default" type="submit"  onclick="study_url()"><b>Search</b></a>
                        <button class="btn btn-default"  id="reset" ><b>Reset</b></button>
                    </div>
                    <div style="color:darkgray;">
                        <p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>Note:</strong></p>
                        <p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>1.All options must be selected in order.</strong></p>
                        <p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>2.2.The module will return sample results that match the criteria.</strong></p>
                    </div>
                </div>
            </form>









            <div class="chart-container">
                <div id="main2"></div>
            </div>

<script type="text/javascript">
    var myChart = echarts.init(document.getElementById('main2'));

    // 分层级的颜色方案
    function getColorByDepth(depth, name) {
        const colorSchemes = {
            1: { // 物种层级
                'Homo sapiens': '#FF6B6B',
                'Caenorhabditis elegans': '#4ECDC4',
                'Danio rerio': '#45B7D1',
                'Mus musculus': '#96CEB4',
                'Drosophila melanogaster': '#FFA726',
                'Gallus gallus': '#BA68C8'
            },
            2: { // 方法层级
                'SMARTer': '#AB47BC',
                'Smart-seq2': '#EC407A',
                'RamDA-seq': '#7E57C2',
                'SMART-seq-Total': '#42A5F5',
                'Tang': '#26A69A',
                'SUPeR-Seq': '#FFA726',
                'MATQ-seq': '#EF5350',
                'ReapTEC': '#66BB6A',
                'Smart-seq': '#FF5722',
                'Smart-seq3': '#9C27B0',
                'scGRO-seq': '#3F51B5'
            },
            3: { // 组织层级
                'Blood': '#FFA726',
                'Brain': '#66BB6A',
                'Cell': '#42A5F5',
                'Embryo': '#FF7043',
                'MLS 1765-92(Liposarcoma)': '#8D6E63',
                'PBMC': '#EC407A',
                'H9(Human embryonic stem cell)': '#AB47BC',
                'Heart': '#EF5350',
                'CD8+ T': '#7E57C2',
                'Ovary': '#F06292',
                'Lymph Node': '#26A69A',
                'Liver': '#26C6DA',
                'MCF7': '#FFCA28',
                'T-47D(Breast ductal carcinoma)': '#FFEE58',
                'Bone marrow': '#D4E157',
                'Retinal': '#9CCC65',
                'Breast': '#FFB74D',
                'Lung': '#4DB6AC',
                'Dermal Fibroblast': '#BA68C8',
                'HEK293T (Human embryonic kidney)': '#4FC3F7',
                'GM12878(B-lymphoblastoid)': '#7986CB',
                'HCT116(Colorectal carcinoma)': '#F48FB1',
                'Skeletal Muscle': '#A1887F',
                'CRL2097(Prostate carcinoma)': '#90A4AE',
                'Pancreas': '#AED581',
                'Testis': '#FFF176',
                'Peripheral blood': '#E57373',
                'Mammary': '#FF9800',
                'Thymus': '#8BC34A',
                'Kidney': '#00BCD4',
                'Dorsal root ganglion': '#9C27B0',
                'Germinal center B cell': '#3F51B5',
                'Embryonic stem cells': '#E91E63',
                'Embryonic fibroblast': '#607D8B',
                'Kidney marrow': '#009688'
            }
        };

        if (colorSchemes[depth] && colorSchemes[depth][name]) {
            return colorSchemes[depth][name];
        }
        return '#CCCCCC';
    }

    // 数据路径
    var paths = [
        //
        ["Homo sapiens", "Smart-seq2", "Embryo"],
        ["Homo sapiens", "Smart-seq2", "MLS 1765-92(Liposarcoma)"],
        ["Homo sapiens", "Smart-seq2", "PBMC"],
        ["Homo sapiens", "Smart-seq2", "H9(Human embryonic stem cell)"],
        ["Homo sapiens", "Smart-seq2", "Heart"],
        ["Homo sapiens", "Smart-seq2", "Heart"],
        ["Homo sapiens", "Smart-seq2", "CD8+ T"],
        ["Homo sapiens", "Smart-seq2", "Ovary"],
        ["Homo sapiens", "Smart-seq2", "Lymph Node"],
        ["Homo sapiens", "Smart-seq", "Liver"],
        ["Homo sapiens", "SMARTer", "Heart"],
        ["Homo sapiens", "Smart-seq2", "Spleen"],
        ["Homo sapiens", "SMARTer", "MCF7"],
        ["Homo sapiens", "SMARTer", "T-47D(Breast ductal carcinoma)"],
        ["Homo sapiens", "SMARTer", "Bone marrow"],
        ["Homo sapiens", "SMARTer", "Retinal"],
        ["Homo sapiens", "Smart-seq2", "Bone marrow"],
        ["Homo sapiens", "Smart-seq2", "Breast"],
        ["Homo sapiens", "SMARTer", "Bone marrow"],
        ["Homo sapiens", "Smart-seq2", "Lung"],
        ["Homo sapiens", "Smart-seq2", "Breast"],
        ["Homo sapiens", "Smart-seq2", "Lymph Node"],
        ["Homo sapiens", "RamDA-seq", "Brain"],
        ["Homo sapiens", "SMART-seq-Total", "Dermal Fibroblast"],
        ["Homo sapiens", "SMART-seq-Total", "HEK293T (Human embryonic kidney)"],
        ["Homo sapiens", "SMART-seq-Total", "MCF7"],
        ["Homo sapiens", "Tang", "Embryo"],
        ["Homo sapiens", "Tang", "Embryo"],
        ["Homo sapiens", "SMARTer", "GM12878(B-lymphoblastoid)"],
        ["Homo sapiens", "Smart-seq2", "HEK293T (Human embryonic kidney)"],
        ["Homo sapiens", "SMARTer", "HCT116(Colorectal carcinoma)"],
        ["Homo sapiens", "SMARTer", "Skeletal Muscle"],
        ["Homo sapiens", "SMARTer", "Embryo"],
        ["Homo sapiens", "SMARTer", "CRL2097(Prostate carcinoma)"],
        ["Homo sapiens", "SMARTer", "Brain"],
        ["Homo sapiens", "SMARTer", "Lung"],
        ["Homo sapiens", "SUPeR-Seq", "Embryo"],
        ["Homo sapiens", "Smart-seq2", "Pancreas"],
        ["Homo sapiens", "SMARTer", "Brain"],
        ["Homo sapiens", "SMARTer", "Breast"],
        ["Homo sapiens", "Smart-seq2", "Heart"],
        ["Homo sapiens", "SMARTer", "Breast"],
        ["Homo sapiens", "SMARTer", "Lung"],
        ["Homo sapiens", "SMARTer", "Embryo"],
        ["Homo sapiens", "MATQ-seq", "HEK293T (Human embryonic kidney)"],
        ["Homo sapiens", "Smart-seq2", "Pancreas"],
        ["Homo sapiens", "SMARTer", "Pancreas"],
        ["Homo sapiens", "Smart-seq2", "Brain"],
        ["Homo sapiens", "SMARTer", "Brain"],
        ["Homo sapiens", "SMARTer", "Testis"],
        ["Homo sapiens", "Smart-seq2", "Embryo"],
        ["Homo sapiens", "SMARTer", "Liver"],
        ["Homo sapiens", "ReapTEC", "CD4+ T"],
        ["Homo sapiens", "Smart-seq2", "Peripheral blood"],

        //mouse
        ["Mus musculus", "SMARTer", "Embryo"],
        ["Mus musculus", "Smart-seq2", "Embryo"],
        ["Mus musculus", "SMARTer", "Lymph Node"],
        ["Mus musculus", "Smart-seq2", "Embryo"],
        ["Mus musculus", "Smart-seq2", "Brain"],
        ["Mus musculus", "SMARTer", "Spleen"],
        ["Mus musculus", "Smart-seq2", "Brain"],
        ["Mus musculus", "Smart-seq3", "Brain"],
        ["Mus musculus", "SMARTer", "Lung"],
        ["Mus musculus", "SMARTer", "Brain"],
        ["Mus musculus", "Smart-seq2", "Liver"],
        ["Mus musculus", "Smart-seq2", "Lung"],
        ["Mus musculus", "Smart-seq2", "Mammary"],
        ["Mus musculus", "Smart-seq2", "Bone marrow"],
        ["Mus musculus", "Smart-seq2", "Pancreas"],
        ["Mus musculus", "Smart-seq2", "Spleen"],
        ["Mus musculus", "Smart-seq2", "Thymus"],
        ["Mus musculus", "Smart-seq2", "Heart"],
        ["Mus musculus", "Smart-seq2", "Kidney"],
        ["Mus musculus", "Smart-seq2", "Brain"],
        ["Mus musculus", "SMARTer", "Brain"],
        ["Mus musculus", "SMARTer", "Brain"],
        ["Mus musculus", "SMARTer", "Brain"],
        ["Mus musculus", "Smart-seq2", "Brain"],
        ["Mus musculus", "Smart-seq2", "Brain"],
        ["Mus musculus", "SMARTer", "Brain"],
        ["Mus musculus", "SMARTer", "Brain"],
        ["Mus musculus", "Smart-seq2", "Lung"],
        ["Mus musculus", "Smart-seq2", "Brain"],
        ["Mus musculus", "Tang", "Embryo"],
        ["Mus musculus", "scGRO-seq", "Embryonic stem cells"],
        ["Mus musculus", "Tang", "Embryo"],
        ["Mus musculus", "SMARTer", "Embryo"],
        ["Mus musculus", "Smart-seq2", "Embryonic fibroblast"],
        ["Mus musculus", "SMARTer", "Lung"],
        ["Mus musculus", "SUPeR-Seq", "Embryo"],
        ["Mus musculus", "SMARTer", "Embryo"],
        ["Mus musculus", "SMARTer", "Kidney"],
        ["Mus musculus", "SMARTer", "Thymus"],
        ["Mus musculus", "SMARTer", "Kidney"],
        ["Mus musculus", "SMARTer", "Brain"],
        ["Mus musculus", "SMARTer", "Brain"],
        ["Mus musculus", "Smart-seq2", "Thymus"],
        ["Mus musculus", "SMARTer", "CD4+ T"],
        ["Mus musculus", "SMARTer", "Brain"],
        ["Mus musculus", "Smart-seq2", "Dorsal root ganglion"],
        ["Mus musculus", "SMARTer", "Lymph Node"],
        ["Mus musculus", "SMARTer", "Pancreas"],
        ["Mus musculus", "SMARTer", "Pancreas"],
        ["Mus musculus", "SMARTer", "Germinal center B cell"],
        ["Mus musculus", "Smart-seq2", "Brain"],
        ["Mus musculus", "Smart-seq2", "Pancreas"],
        ["Mus musculus", "Smart-seq2", "Retinal"],
        ["Mus musculus", "SMARTer", "Lymph Node"],
        ["Mus musculus", "SMARTer", "Brain"],
        ["Mus musculus", "Smart-seq2", "Brain"],
        ["Mus musculus", "Smart-seq2", "Pancreas"],
        ["Mus musculus", "SMARTer", "Liver"],
        ["Mus musculus", "Smart-seq2", "Liver"],
        ["Mus musculus", "Tang", "Brain"],
        ["Mus musculus", "Smart-seq", "Brain"],
        ["Mus musculus", "Smart-seq2", "Heart"],
        ["Mus musculus", "Smart-seq2", "Brain"],
        ["Mus musculus", "SMARTer", "Testis"],
        //fly
        ["Drosophila melanogaster", "Smart-seq2", "Brain"],
        ["Drosophila melanogaster", "Smart-seq2", "Brain"],
        //fish
        ["Danio rerio", "Smart-seq2", "Kidney marrow"],
        ["Danio rerio", "Smart-seq2", "Brain"],
        //chicken
        ["Gallus gallus", "SMARTer", "Embryo"],
        ["Gallus gallus", "SMARTer", "Embryo"],
        //worm
        ["Caenorhabditis elegans", "SMARTer", "Embryo"],
    ];

    // 自动生成嵌套结构
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
                if (i === path.length - 1) {
                    child.value = 1;
                }
                node.children.push(child);
            }
            node = child;
        }
    }

    var data = [];
    paths.forEach(p => addPath({ children: data }, p));

    function calculateValues(nodes) {
        if (!nodes || nodes.length === 0) return 0;
        nodes.forEach(node => {
            if (node.children && node.children.length > 0) {
                node.value = calculateValues(node.children);
            }
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
        tooltip: {
            trigger: 'item',
            formatter: formatTooltip
        },
        series: [{
            type: 'sunburst',
            data: data,
            radius: [0, '95%'],
            sort: null,
            emphasis: {
                focus: 'ancestor',
                itemStyle: {
                    shadowBlur: 10,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            },
            nodeClick: 'rootToNode',
            label: {
                show: true,
                rotate: 'radial',
                minAngle: 10,
                formatter: function (info) {
                    const angle = (info.endAngle - info.startAngle) * 180 / Math.PI;
                    if (info.depth === 1) return info.name;
                    if (info.depth === 2) {
                        if (angle > 15) return info.name;
                        if (angle > 8) return info.name.substring(0, 8) + '...';
                        return '';
                    }
                    if (info.depth === 3) {
                        if (angle > 20) return info.name;
                        if (angle > 10) return info.name.substring(0, 6) + '...';
                        return '';
                    }
                    return '';
                },
                fontSize: function (info) {
                    const angle = (info.endAngle - info.startAngle) * 180 / Math.PI;
                    if (angle > 30) return 12;
                    if (angle > 15) return 10;
                    if (angle > 8) return 8;
                    return 0;
                },
                color: '#333',
                textBorderColor: '#fff',
                textBorderWidth: 2,
                backgroundColor: 'rgba(255,255,255,0.8)',
                padding: [2, 4],
                borderRadius: 3
            },
            levels: [
                {},
                {
                    r0: '10%',
                    r: '30%',
                    label: { rotate: 'tangential', fontSize: 14, fontWeight: 'bold', minAngle: 5 },
                    itemStyle: { borderWidth: 2, borderColor: '#fff' }
                },
                {
                    r0: '30%',
                    r: '55%',
                    label: { rotate: 'tangential', fontSize: 11, minAngle: 8 },
                    itemStyle: { borderWidth: 1, borderColor: '#fff' }
                },
                {
                    r0: '55%',
                    r: '80%',
                    label: {
                        show: true,
                        fontSize: 9,
                        minAngle: 12,
                        formatter: function (info) {
                            const angle = (info.endAngle - info.startAngle) * 180 / Math.PI;
                            if (angle > 25) return info.name;
                            if (angle > 15) return info.name.substring(0, 10) + '...';
                            if (angle > 8) return info.name.substring(0, 6) + '...';
                            return '';
                        }
                    }
                }
            ]
        }]
    };
    myChart.setOption(option);
    window.addEventListener('resize', () => myChart.resize());

    // ---------- 双向联动逻辑 ----------
    // ---------- 双向联动逻辑 ----------
    let isSimulatingClick = false;
    let currentDepth = 0;  // 用于记录当前旭日图层级

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
        myChart.dispatchAction({
            type: 'sunburstRootToNode',
            targetNodeId: targetNode.id || targetNode.name
        });
        currentDepth = nodePath.length;
        setTimeout(() => { isSimulatingClick = false; }, 300);
    }

    function jumpToSelectedNode() {
        const species = $("#Spe").val();
        const tech = $("#Tech").val();
        const tissue = $("#Tissue").val();

        let targetPath = [];
        if (species) targetPath.push(species);
        if (tech) targetPath.push(tech);
        if (tissue) targetPath.push(tissue);

        if (targetPath.length > 0) simulateNodeClick(targetPath);
    }

    // ----------------- 下拉框 → 图形 -----------------
    $("#Spe").on("change", function() {
        const species = $(this).val();
        if (species) {
            autoselect_tech(species, () => {
                $("#Tech").val('').selectpicker('refresh');
                $("#Tissue").val('').selectpicker('refresh');
                jumpToSelectedNode();
            });
        } else {
            $("#Tech").val('').selectpicker('refresh');
            $("#Tissue").val('').selectpicker('refresh');
            jumpToSelectedNode();
        }
    });

    $("#Tech").on("change", function() {
        const species = $("#Spe").val();
        const tech = $(this).val();
        if (species && tech) {
            autoselect_Tissue(species, tech, () => {
                $("#Tissue").val('').selectpicker('refresh');
                jumpToSelectedNode();
            });
        } else {
            $("#Tissue").val('').selectpicker('refresh');
            jumpToSelectedNode();
        }
    });

    $("#Tissue").on("change", function() {
        jumpToSelectedNode();
    });

    // ----------------- 图形 → 下拉框 -----------------
    myChart.on('click', function (params) {
        if (isSimulatingClick) return;

        const pathNames = params.treePathInfo.map(n => n.name).filter(Boolean);
        const depth = params.treePathInfo.length - 1;
        currentDepth = depth;

        // === 点击中心圈：返回上一级 ===
        if (depth === 0) {
            if ($("#Tissue").val()) {
                $("#Tissue").val('').selectpicker('refresh');
            } else if ($("#Tech").val()) {
                $("#Tech").val('').selectpicker('refresh');
                $("#Tissue").val('').selectpicker('refresh');
            } else if ($("#Spe").val()) {
                $("#Spe").val('').selectpicker('refresh');
                $("#Tech").val('').selectpicker('refresh');
                $("#Tissue").val('').selectpicker('refresh');
            }
            return;
        }

        const [spe, tech, tissue] = pathNames;
        if (spe) {
            $("#Spe").val(spe).selectpicker('refresh');
            autoselect_tech(spe, () => {
                if (tech) {
                    $("#Tech").val(tech).selectpicker('refresh');
                    autoselect_Tissue(spe, tech, () => {
                        if (tissue) {
                            $("#Tissue").val(tissue).selectpicker('refresh');
                        }
                    });
                }
            });
        }
    });
</script>


<script>
    $(function(){
        var url =window.location.href;
        $("#reset").click(function(){
            window.location.href=url;
        });
    });
</script>

<script>

    // Tech的级联列表
    function autoselect_tech(Species, callback) {
        if (!Species) return;
        $.ajax({
            url: '../../api/auto_select_tech.php',
            type: 'post',
            dataType: 'json',
            data: { 'select_specie': Species },
            success: function (res) {
                const techSelect = document.getElementById('Tech');
                techSelect.innerHTML = res.map(item => `<option value="${item}">${item}</option>`).join('');
                $('#Tech').selectpicker('refresh');
                if (callback) callback(); //  用于继续下一级加载
            },
            error: function () {
                alert('No dataset results for this species.');
            }
        });
    }



    // Study的级联列表
    function autoselect_Tissue(Species, Techtype, callback) {
        if (!Species || !Techtype) return;
        $.ajax({
            url: '../../api/auto_select_tissue.php',
            type: 'post',
            dataType: 'json',
            data: { 'select_specie': Species, 'select_experiment': Techtype },
            success: function (res) {
                const tissueSelect = document.getElementById('Tissue');
                tissueSelect.innerHTML = res.map(item => `<option value="${item}">${item}</option>`).join('');
                $('#Tissue').selectpicker('refresh');
                if (callback) callback();
            },
            error: function () {
                alert('No tissue data found.');
            }
        });
    }


    function study_url() {
        // 获取选择的值，这里假设你有一个id为Species的select元素
        var species = $("#Spe").val();
        var techtype = $("#Tech").val();
        var tissue = $("#Tissue").val();

        // 构造URL
        var url = '../../tissue_result.php?species=' + encodeURIComponent(species) + '&techtype=' + encodeURIComponent(techtype) + '&tissue=' + encodeURIComponent(tissue);
        //var url = '../../detail_sample.php?sid=' + encodeURIComponent(sid);
        // 跳转到新页面
        parent.location.href = url;
    }
</script>

<script>
    $.ajaxSetup({
        cache: false //close AJAX cache
    });
    $(function () {
        $('#t1').on('click', function () {
            autoselect_tech($('#Spe').val());
        });
        $('#t2').on('click', function () {
            autoselect_study($('#Spe').val(),$('#Tech').val());
        });
    })

    function populateExamples() {
        console.log("populateExamples() called"); // 检查函数是否被调用

        // 将 Step 1 填充为示例物种
        console.log("Step 1");
        var speciesSelect = document.getElementById('Spe');
        console.log("Species select element:", speciesSelect); // 检查是否正确获取了下拉列表元素
        var examplespeciesOption = document.createElement('option');
        examplespeciesOption.text = 'Homo sapiens';
        examplespeciesOption.value = 'Homo sapiens';
        speciesSelect.appendChild(examplespeciesOption);
        console.log("Disease select innerHTML after adding option:", speciesSelect.innerHTML); // 检查是否正确添加了选项
        speciesSelect.value = 'Homo sapiens';
        console.log("Disease select value:", speciesSelect.value); // 检查是否正确设置了选中的值




        // 将 Step 2 填充为示例健康/疾病
        console.log("Step 2");
        var techSelect = document.getElementById('Tech');
        console.log("Disease select element:", techSelect); // 检查是否正确获取了下拉列表元素
        var exampletechOption = document.createElement('option');
        exampletechOption.text = 'Smart-seq2';
        exampletechOption.value = 'Smart-seq2';
        techSelect.appendChild(exampletechOption);
        console.log("Disease select innerHTML after adding option:", techSelect.innerHTML); // 检查是否正确添加了选项
        techSelect.value = 'Smart-seq2';
        console.log("Disease select value:", techSelect.value); // 检查是否正确设置了选中的值

        // 将 Step 3 填充为示例健康/疾病
        console.log("Step 3");
        var tissueSelect = document.getElementById('Tissue');
        console.log("Disease select element:", tissueSelect); // 检查是否正确获取了下拉列表元素
        var exampletissueOption = document.createElement('option');
        exampletissueOption.text = 'Pancreas';
        exampletissueOption.value = 'Pancreas';
        tissueSelect.appendChild(exampletissueOption);
        console.log("Disease select innerHTML after adding option:", tissueSelect.innerHTML); // 检查是否正确添加了选项
        tissueSelect.value = 'Pancreas';
        console.log("Disease select value:", tissueSelect.value); // 检查是否正确设置了选中的值


        // 刷新下拉列表
        $('.selectpicker').selectpicker('refresh');
    }


</script>



</body>


</html>
