<?php
include "./templates/base.php";
?>

    <body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>

<div class="row">
    <div class="col-lg-6">
        <div id="main2" style="width: 800px;height:800px;"></div>
    </div>
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
                'Drosophila melanogaster': '#FFA726', // 新增：果蝇
                'Gallus gallus': '#BA68C8' // 新增：鸡
            },
            2: { // 组织层级
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
            },
            3: { // 方法层级
                'SMARTer': '#AB47BC',
                'Smart-seq2': '#EC407A',
                'RamDA-seq': '#7E57C2',
                'SMART-seq-Total': '#42A5F5',
                'Tang': '#26A69A',
                'SUPeR-Seq': '#FFA726',
                'MATQ-seq': '#EF5350',
                'ReapTEC': '#66BB6A',
                'Smart-seq': '#FF5722', // 新增
                'Smart-seq3': '#9C27B0', // 新增
                'scGRO-seq': '#3F51B5' // 新增
            },
            4: ['#78909C', '#90A4AE', '#B0BEC5', '#CFD8DC', '#E0E0E0', '#EEEEEE'] // ID层级 - 扩展了颜色数量
        };

        if (depth <= 3 && colorSchemes[depth] && colorSchemes[depth][name]) {
            return colorSchemes[depth][name];
        } else if (depth === 4) {
            // 对ID使用哈希分配颜色
            const index = Math.abs(name.split('').reduce((a,b)=>{a=((a<<5)-a)+b.charCodeAt(0);return a&a},0)) % colorSchemes[4].length;
            return colorSchemes[4][index];
        }
        return '#CCCCCC';
    }

    // 数据路径，每条路径对应一条叶子节点
    var paths = [
        // human
        ["Homo sapiens", "Embryo", "Smart-seq2", "E-MTAB-3929"],
        ["Homo sapiens", "MLS 1765-92(Liposarcoma)", "Smart-seq2", "E-MTAB-6142"],
        ["Homo sapiens", "PBMC", "Smart-seq2", "E-MTAB-6386"],
        ["Homo sapiens", "H9(Human embryonic stem cell)", "Smart-seq2", "E-MTAB-6819"],
        ["Homo sapiens", "Heart", "Smart-seq2", "E-MTAB-7052"],
        ["Homo sapiens", "Heart", "Smart-seq2", "E-MTAB-7167"],
        ["Homo sapiens", "CD8+ T", "Smart-seq2", "E-MTAB-7606"],
        ["Homo sapiens", "Ovary", "Smart-seq2", "E-MTAB-8403"],
        ["Homo sapiens", "Lymph Node", "Smart-seq2", "GSE100618"],
        ["Homo sapiens", "Liver", "Smart-seq", "GSE103866"],
        ["Homo sapiens", "Heart", "SMARTer", "GSE105211"],
        ["Homo sapiens", "Spleen", "Smart-seq2", "GSE106540"],
        ["Homo sapiens", "MCF7", "SMARTer", "GSE107864-MCF7"],
        ["Homo sapiens", "T-47D(Breast ductal carcinoma)", "SMARTer", "GSE107864-T-47D"],
        ["Homo sapiens", "Bone marrow", "SMARTer", "GSE110499"],
        ["Homo sapiens", "Retinal", "SMARTer", "GSE112507"],
        ["Homo sapiens", "Bone marrow", "Smart-seq2", "GSE115210"],
        ["Homo sapiens", "Breast", "Smart-seq2", "GSE118389"],
        ["Homo sapiens", "Bone marrow", "SMARTer", "GSE118900"],
        ["Homo sapiens", "Lung", "Smart-seq2", "GSE123837"],
        ["Homo sapiens", "Breast", "Smart-seq2", "GSE123837"],
        ["Homo sapiens", "Lymph Node", "Smart-seq2", "GSE123837"],
        ["Homo sapiens", "Brain", "RamDA-seq", "GSE125288"],
        ["Homo sapiens", "Dermal Fibroblast", "SMART-seq-Total", "GSE151334-Fibroblast"],
        ["Homo sapiens", "HEK293T (Human embryonic kidney)", "SMART-seq-Total", "GSE151334-HEK293T"],
        ["Homo sapiens", "MCF7", "SMART-seq-Total", "GSE151334-MCF7"],
        ["Homo sapiens", "Embryo", "Tang", "GSE36552"],
        ["Homo sapiens", "Embryo", "Tang", "GSE44183"],
        ["Homo sapiens", "GM12878(B-lymphoblastoid)", "SMARTer", "GSE44618"],
        ["Homo sapiens", "HEK293T (Human embryonic kidney)", "Smart-seq2", "GSE49321"],
        ["Homo sapiens", "HCT116(Colorectal carcinoma)", "SMARTer", "GSE51254"],
        ["Homo sapiens", "Skeletal Muscle", "SMARTer", "GSE52529"],
        ["Homo sapiens", "Embryo", "SMARTer", "GSE64016"],
        ["Homo sapiens", "CRL2097(Prostate carcinoma)", "SMARTer", "GSE66053"],
        ["Homo sapiens", "Brain", "SMARTer", "GSE67835"],
        ["Homo sapiens", "Lung", "SMARTer", "GSE69405"],
        ["Homo sapiens", "Embryo", "SUPeR-Seq", "GSE71318"],
        ["Homo sapiens", "Pancreas", "Smart-seq2", "GSE73727"],
        ["Homo sapiens", "Brain", "SMARTer", "GSE75140"],
        ["Homo sapiens", "Breast", "SMARTer", "GSE75367"],
        ["Homo sapiens", "Heart", "Smart-seq2", "GSE75659"],
        ["Homo sapiens", "Breast", "SMARTer", "GSE75688"],
        ["Homo sapiens", "Lung", "SMARTer", "GSE75688"],
        ["Homo sapiens", "Embryo", "SMARTer", "GSE75748"],
        ["Homo sapiens", "HEK293T (Human embryonic kidney)", "MATQ-seq", "GSE78968"],
        ["Homo sapiens", "Pancreas", "Smart-seq2", "GSE81547"],
        ["Homo sapiens", "Pancreas", "SMARTer", "GSE83139"],
        ["Homo sapiens", "Brain", "Smart-seq2", "GSE84465"],
        ["Homo sapiens", "Brain", "SMARTer", "GSE86982"],
        ["Homo sapiens", "Testis", "SMARTer", "GSE92276"],
        ["Homo sapiens", "Embryo", "Smart-seq2", "GSE93593"],
        ["Homo sapiens", "Liver", "SMARTer", "GSE96981"],
        ["Homo sapiens", "CD4+ T", "ReapTEC", "JGAD000822"],
        ["Homo sapiens", "Peripheral blood", "Smart-seq2", "PRJNA472098"],

        //mouse
        ["Mus musculus", "Embryo", "SMARTer", "E-MTAB-3321"],
        ["Mus musculus", "Embryo", "Smart-seq2", "E-MTAB-4079"],
        ["Mus musculus", "Lymph Node", "SMARTer", "E-MTAB-7178"],
        ["Mus musculus", "Embryo", "Smart-seq2", "GSE100597"],
        ["Mus musculus", "Brain", "Smart-seq2", "GSE101487"],
        ["Mus musculus", "Spleen", "SMARTer", "GSE106663"],
        ["Mus musculus", "Brain", "Smart-seq2", "GSE107632"],
        ["Mus musculus", "Brain", "Smart-seq3", "GSE108020"],
        ["Mus musculus", "Lung", "SMARTer", "GSE109444"],
        ["Mus musculus", "Brain", "SMARTer", "GSE109556"],
        ["Mus musculus", "Liver", "Smart-seq2", "GSE109774"],
        ["Mus musculus", "Lung", "Smart-seq2", "GSE109774"],
        ["Mus musculus", "Mammary", "Smart-seq2", "GSE109774"],
        ["Mus musculus", "Bone marrow", "Smart-seq2", "GSE109774"],
        ["Mus musculus", "Pancreas", "Smart-seq2", "GSE109774"],
        ["Mus musculus", "Spleen", "Smart-seq2", "GSE109774"],
        ["Mus musculus", "Thymus", "Smart-seq2", "GSE109774"],
        ["Mus musculus", "Heart", "Smart-seq2", "GSE109774"],
        ["Mus musculus", "Kidney", "Smart-seq2", "GSE109774"],
        ["Mus musculus", "Brain", "Smart-seq2", "GSE109774"],
        ["Mus musculus", "Brain", "SMARTer", "GSE109796"],
        ["Mus musculus", "Brain", "SMARTer", "GSE112177"],
        ["Mus musculus", "Brain", "SMARTer", "GSE115070"],
        ["Mus musculus", "Brain", "Smart-seq2", "GSE115622"],
        ["Mus musculus", "Brain", "Smart-seq2", "GSE116138"],
        ["Mus musculus", "Brain", "SMARTer", "GSE118953"],
        ["Mus musculus", "Brain", "SMARTer", "GSE121653"],
        ["Mus musculus", "Lung", "Smart-seq2", "GSE125691"],
        ["Mus musculus", "Brain", "Smart-seq2", "GSE127893"],
        ["Mus musculus", "Embryo", "Tang", "GSE22182"],
        ["Mus musculus", "Embryonic stem cells", "scGRO-seq", "GSE242176"],
        ["Mus musculus", "Embryo", "Tang", "GSE44183"],
        ["Mus musculus", "Embryo", "SMARTer", "GSE45719"],
        ["Mus musculus", "Embryonic fibroblast", "Smart-seq2", "GSE49321"],
        ["Mus musculus", "Lung", "SMARTer", "GSE52583"],
        ["Mus musculus", "Embryo", "SUPeR-Seq", "GSE53386"],
        ["Mus musculus", "Embryo", "SMARTer", "GSE57249"],
        ["Mus musculus", "Kidney", "SMARTer", "GSE59130"],
        ["Mus musculus", "Thymus", "SMARTer", "GSE60297"],
        ["Mus musculus", "Kidney", "SMARTer", "GSE66202"],
        ["Mus musculus", "Brain", "SMARTer", "GSE71485"],
        ["Mus musculus", "Brain", "SMARTer", "GSE71585"],
        ["Mus musculus", "Thymus", "Smart-seq2", "GSE74596"],
        ["Mus musculus", "CD4+ T", "SMARTer", "GSE74833"],
        ["Mus musculus", "Brain", "SMARTer", "GSE76005"],
        ["Mus musculus", "Dorsal root ganglion", "Smart-seq2", "GSE76483"],
        ["Mus musculus", "Lymph Node", "SMARTer", "GSE77740"],
        ["Mus musculus", "Pancreas", "SMARTer", "GSE77980"],
        ["Mus musculus", "Pancreas", "SMARTer", "GSE78510"],
        ["Mus musculus", "Germinal center B cell", "SMARTer", "GSE79096"],
        ["Mus musculus", "Brain", "Smart-seq2", "GSE79306"],
        ["Mus musculus", "Pancreas", "Smart-seq2", "GSE80032"],
        ["Mus musculus", "Retinal", "Smart-seq2", "GSE80232"],
        ["Mus musculus", "Lymph Node", "SMARTer", "GSE81530"],
        ["Mus musculus", "Brain", "SMARTer", "GSE82187"],
        ["Mus musculus", "Brain", "Smart-seq2", "GSE87069"],
        ["Mus musculus", "Pancreas", "Smart-seq2", "GSE87375"],
        ["Mus musculus", "Liver", "SMARTer", "GSE87795"],
        ["Mus musculus", "Liver", "Smart-seq2", "GSE90047"],
        ["Mus musculus", "Brain", "Tang", "GSE90809"],
        ["Mus musculus", "Brain", "Smart-seq", "GSE92707"],
        ["Mus musculus", "Heart", "Smart-seq2", "GSE95140"],
        ["Mus musculus", "Brain", "Smart-seq2", "GSE98816"],
        ["Mus musculus", "Testis", "SMARTer", "PRJNA524391"],
        //fly
        ["Drosophila melanogaster", "Brain", "Smart-seq2", "GSE100058"],
        ["Drosophila melanogaster", "Brain", "Smart-seq2", "GSE107451"],
        //fish
        ["Danio rerio", "Kidney marrow", "Smart-seq2", "GSE100911"],
        ["Danio rerio", "Brain", "Smart-seq2", "GSE105115"],
        //chiken
        ["Gallus gallus", "Embryo", "SMARTer", "GSE108221"],
        ["Gallus gallus", "Embryo", "SMARTer", "GSE89910"],
        //worm
        ["Caenorhabditis elegans", "Embryo", "SMARTer", "GSE77944"],
    ];

    // 自动生成嵌套结构
    function addPath(root, path) {
        let node = root;
        for (let i = 0; i < path.length; i++) {
            let name = path[i];
            if (!node.children) node.children = [];

            // 找已有节点
            let child = node.children.find(n => n.name === name);
            if (!child) {
                child = {
                    name: name,
                    depth: i + 1,
                    itemStyle: {
                        color: getColorByDepth(i + 1, name)
                    }
                };
                // 最后一级是叶子节点
                if (i === path.length - 1) {
                    child.value = 1;
                }
                node.children.push(child);
            }
            node = child;
        }
    }

    // 构建最终数据
    var data = [];
    paths.forEach(p => addPath({children: data}, p));

    // 重新计算value，确保父节点value等于子节点value之和
    function calculateValues(nodes) {
        if (!nodes || nodes.length === 0) return 0;

        nodes.forEach(node => {
            if (node.children && node.children.length > 0) {
                node.value = calculateValues(node.children);
            }
        });

        return nodes.reduce((sum, node) => sum + (node.value || 0), 0);
    }

    // 计算所有节点的value
    calculateValues(data);

    // 改进的提示框格式
    function formatTooltip(info) {
        let parts = [];
        let node = info;
        while (node) {
            if (node.name) parts.unshift(node.name);
            node = node.treePathInfo && node.treePathInfo.length > 1 ?
                node.treePathInfo[node.treePathInfo.length - 2] : null;
        }
        return `${parts.join(' → ')}<br/>count: ${info.value || 0}`;
    }

    var option = {
        title: {
            text: 'The total number of cells detected in the collected scRNA-seq datasets.',
            left: 'center',
            textStyle: { fontSize: 14 }
        },
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
                minAngle: 10, // 新增：只有扇形角度大于10度才显示标签
                formatter: function (info) {
                    // 智能标签显示逻辑
                    const angle = (info.endAngle - info.startAngle) * 180 / Math.PI;

                    // 根据扇形大小决定显示内容
                    if (info.depth === 1) {
                        return info.name; // 第一层始终显示
                    } else if (info.depth === 2) {
                        if (angle > 15) return info.name;
                        if (angle > 8) return info.name.substring(0, 8) + '...';
                        return '';
                    } else if (info.depth === 3) {
                        if (angle > 20) return info.name;
                        if (angle > 10) return info.name.substring(0, 6) + '...';
                        return '';
                    }
                    return '';
                },
                fontSize: function (info) {
                    // 根据扇形大小调整字体大小
                    const angle = (info.endAngle - info.startAngle) * 180 / Math.PI;
                    if (angle > 30) return 12;
                    if (angle > 15) return 10;
                    if (angle > 8) return 8;
                    return 0; // 不显示
                },
                color: '#333',
                textBorderColor: '#fff',
                textBorderWidth: 2,
                backgroundColor: 'rgba(255,255,255,0.8)',
                padding: [2, 4],
                borderRadius: 3
            },
            levels: [
                {},  // depth=0 根
                {
                    r0: '10%',
                    r: '25%',
                    label: {
                        rotate: 'tangential',
                        fontSize: 14,
                        fontWeight: 'bold',
                        minAngle: 5 // 第一层要求更低的角度阈值
                    },
                    itemStyle: {
                        borderWidth: 2,
                        borderColor: '#fff'
                    }
                },
                {
                    r0: '25%',
                    r: '45%',
                    label: {
                        rotate: 'tangential',
                        fontSize: 11,
                        minAngle: 8
                    },
                    itemStyle: {
                        borderWidth: 1,
                        borderColor: '#fff'
                    }
                },
                {
                    r0: '45%',
                    r: '65%',
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
                },
                {
                    r0: '65%',
                    r: '80%',
                    label: {
                        show: false // 最外层不显示标签
                    }
                }
            ]
        }]
    };

    myChart.setOption(option);

    // 添加窗口 resize 事件
    window.addEventListener('resize', function() {
        myChart.resize();
    });

    // 添加点击事件
    myChart.on('click', function (params) {
        console.log('点击了:', params.name, '路径:', params.treePathInfo);
        // 这里可以添加跳转到详细页面的逻辑
        if (params.depth === 4) { // 点击的是最外层ID
            // window.location.href = `detail.php?id=${params.name}`;
        }
    });
</script>

<!--include footer-->
<?php
include "./templates/footer.php";
?>