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
            3: { // 细胞类型层级 - 简化为主要分类
                // NA 和通用类型
                'NA': '#CCCCCC',
                'Neuron': '#FF6B6B',
                'Astrocyte': '#4ECDC4',
                'Oligodendrocyte': '#45B7D1',
                'Stem cell': '#96CEB4',
                'Embryonic stem cell': '#FFA726',
                'Fibroblast': '#BA68C8',

                // 免疫细胞
                'Memory B cell': '#FFA726',
                'Naive B cell': '#FFB74D',
                'Plasmablast': '#FFD54F',
                'Transitional stage B cell': '#FFF176',
                'CD8-positive, alpha-beta T cell': '#AED581',
                'CD4 T cells': '#81C784',
                'CD4+ T': '#81C784',
                'Gamma-delta T cell': '#4DB6AC',
                'Naive CD4+ T cell': '#4DD0E1',
                'Resting B cell': '#4FC3F7',
                'Plasma cells': '#7986CB',
                'Hematopoietic cell line': '#9575CD',
                'Multiple myeloma': '#BA68C8',
                'Immune cell': '#F06292',
                'Microglia': '#EC407A',
                'Macrophage': '#E57373',

                // 神经细胞类型
                'Neural stem cell derived from human induced pluripotent stem': '#66BB6A',
                'Olfactory projection neuron': '#9CCC65',
                'Oligodendrocyte Precursor Cell': '#42A5F5',
                'Astrocytes': '#4ECDC4',
                'Neurons': '#FF6B6B',
                'Endothelial': '#EF5350',
                'Dopamine neuron': '#FF5722',
                'Glutamatergic progenitors': '#FF9800',
                'Cortical cells': '#FFB74D',
                'GABAergic': '#FFD54F',
                'Neural progenitor cell': '#827717',
                'Hypothalamic neuronal cell': '#5D4037',
                'Dorsal root ganglion neuron': '#6D4C41',

                // 胚胎发育相关
                'Human preimplantation blastomere': '#FF7043',
                'Oocyte': '#D7CCC8',
                'Pronucleus': '#BCAAA4',
                'Zygote': '#A1887F',
                '2-cell blastomere': '#8D6E63',
                '4-cell blastomere': '#795548',
                '8-cell blastomere': '#6D4C41',
                'Morula': '#5D4037',
                'Blastocyst': '#4E342E',

                // 胰腺细胞
                'Alpha': '#FF6B6B',
                'Beta': '#4ECDC4',
                'Delta': '#45B7D1',
                'Pp': '#96CEB4',
                'Duct': '#FFA726',
                'Acinar': '#BA68C8',
                'Islet': '#26A69A',
                'Ductal': '#26C6DA',
                'Mesenchymal': '#EF5350',

                // 癌症细胞
                'MCF7': '#FFCA28',
                'Primary breast cancer': '#E57373',
                'Metastatic breast cancer': '#EF5350',
                'Neoplastic': '#E91E63',

                // 其他特殊细胞类型
                'Primary cell': '#90A4AE',
                'HEK293T': '#4FC3F7',
                'GM12878': '#7986CB',
                'C2C12': '#9575CD',
                'Mouse embryonic fibroblast': '#BA68C8',
                'Spermatogonial Stem Cells': '#FFF176',
                'Cardiomyocytes': '#EF5350',
                'Testicular cells': '#FFD54F',
                'Hepatoblast/hepatocyte': '#81C784',
                'Cholangiocyte': '#4DB6AC',
                'Medullary thymic epithelial cell': '#4DD0E1',

                // 线虫胚胎细胞
                'P0': '#FF6B6B',
                'AB': '#45B7D1',
                'P1': '#96CEB4',
                'EMS': '#FFA726',
                'ABa': '#BA68C8',
                'ABp': '#26A69A',
                'P2': '#26C6DA',
                'MS': '#42A5F5',
                'C': '#66BB6A',
                'E': '#9CCC65',
                'D': '#FFFF8D',

                // 原鸡细胞
                'Cranial Neural Crest Cells': '#FF6B6B',
                'Chicken primitive streak cell': '#4ECDC4',
                'Chicken epiblast cell': '#96CEB4'
            }
        };

        if (depth <= 3 && colorSchemes[depth] && colorSchemes[depth][name]) {
            return colorSchemes[depth][name];
        }

        // 对于未定义的细胞类型，使用哈希分配颜色
        const fallbackColors = [
            '#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFA726', '#BA68C8',
            '#26A69A', '#26C6DA', '#EF5350', '#EC407A', '#AB47BC', '#7E57C2',
            '#42A5F5', '#66BB6A', '#9CCC65', '#8BC34A', '#7CB342', '#689F38'
        ];

        const index = Math.abs(name.split('').reduce((a,b)=>{a=((a<<5)-a)+b.charCodeAt(0);return a&a},0)) % fallbackColors.length;
        return fallbackColors[index];
    }

    // 数据路径，现在只有三层：物种 -> 方法 -> 细胞类型
    var paths = [
        // human - 简化为物种 -> 方法 -> 细胞类型
        ["Homo sapiens", "Smart-seq2", "NA"],
        ["Homo sapiens", "Smart-seq2", "Memory B cell"],
        ["Homo sapiens", "Smart-seq2", "Naive B cell"],
        ["Homo sapiens", "Smart-seq2", "Plasmablast"],
        ["Homo sapiens", "Smart-seq2", "Transitional stage B cell"],
        ["Homo sapiens", "Smart-seq2", "Embryonic stem cell"],
        ["Homo sapiens", "Smart-seq2", "Fibroblast of dermis"],
        ["Homo sapiens", "Smart-seq2", "CD8-positive, alpha-beta T cell"],
        ["Homo sapiens", "Smart-seq2", "Cord blood CD34+ haemopoietic stem and progenitor cells"],
        ["Homo sapiens", "Smart-seq", "HuH-1"],
        ["Homo sapiens", "Smart-seq", "HuH-7"],
        ["Homo sapiens", "SMARTer", "Foreskin Human Fibroblasts"],
        ["Homo sapiens", "Smart-seq2", "PBMC"],
        ["Homo sapiens", "SMARTer", "MCF7"],
        ["Homo sapiens", "SMARTer", "Multiple myeloma"],
        ["Homo sapiens", "SMARTer", "Hematopoietic cell line"],
        ["Homo sapiens", "Smart-seq2", "Plasma cells"],
        ["Homo sapiens", "RamDA-seq", "Neural stem cell derived from human induced pluripotent stem"],
        ["Homo sapiens", "SMART-seq-Total", "Primary cell"],
        ["Homo sapiens", "SMART-seq-Total", "HEK293T"],
        ["Homo sapiens", "SMART-seq-Total", "MCF7"],
        ["Homo sapiens", "Tang", "Human preimplantation blastomere"],
        ["Homo sapiens", "Tang", "Human embryonic stem cell"],
        ["Homo sapiens", "Tang", "Oocyte"],
        ["Homo sapiens", "Tang", "Pronucleus"],
        ["Homo sapiens", "Tang", "Zygote"],
        ["Homo sapiens", "Tang", "2-cell blastomere"],
        ["Homo sapiens", "Tang", "4-cell blastomere"],
        ["Homo sapiens", "Tang", "8-cell blastomere"],
        ["Homo sapiens", "Tang", "Morula"],
        ["Homo sapiens", "SMARTer", "GM12878"],
        ["Homo sapiens", "Smart-seq2", "HEK293T"],
        ["Homo sapiens", "SMARTer", "HCT116(Colorectal carcinoma)"],
        ["Homo sapiens", "SMARTer", "Human Skeletal Muscle Myoblasts (HSMM)"],
        ["Homo sapiens", "SMARTer", "Human embryonic stem cells"],
        ["Homo sapiens", "SMARTer", "Primary foreskin fibroblast cells"],
        ["Homo sapiens", "SMARTer", "Oligodendrocytes"],
        ["Homo sapiens", "SMARTer", "Astrocytes"],
        ["Homo sapiens", "SMARTer", "Oligodendrocyte Precursor Cell"],
        ["Homo sapiens", "SMARTer", "Microglia"],
        ["Homo sapiens", "SMARTer", "Neurons"],
        ["Homo sapiens", "SMARTer", "Endothelial"],
        ["Homo sapiens", "SUPeR-Seq", "MII oocyte"],
        ["Homo sapiens", "SUPeR-Seq", "Zygote"],
        ["Homo sapiens", "SUPeR-Seq", "Morula"],
        ["Homo sapiens", "Smart-seq2", "Alpha"],
        ["Homo sapiens", "Smart-seq2", "Delta"],
        ["Homo sapiens", "Smart-seq2", "Pp"],
        ["Homo sapiens", "Smart-seq2", "Duct"],
        ["Homo sapiens", "Smart-seq2", "Acinar"],
        ["Homo sapiens", "Smart-seq2", "Beta"],
        ["Homo sapiens", "Smart-seq2", "Islet"],
        ["Homo sapiens", "Smart-seq2", "In vivo single Tcell"],
        ["Homo sapiens", "Smart-seq2", "Ex vivo single Tcell"],
        ["Homo sapiens", "Smart-seq2", "Peripheral blood mononuclear cells"],
        ["Homo sapiens", "SMARTer", "Primary breast cancer"],
        ["Homo sapiens", "SMARTer", "Metastatic breast cancer"],
        ["Homo sapiens", "MATQ-seq", "HEK293T"],
        ["Homo sapiens", "Smart-seq2", "Ductal"],
        ["Homo sapiens", "Smart-seq2", "Mesenchymal"],
        ["Homo sapiens", "SMARTer", "Alpha"],
        ["Homo sapiens", "SMARTer", "Duct"],
        ["Homo sapiens", "SMARTer", "Delta"],
        ["Homo sapiens", "SMARTer", "Beta"],
        ["Homo sapiens", "SMARTer", "Pp"],
        ["Homo sapiens", "SMARTer", "Acinar"],
        ["Homo sapiens", "Smart-seq2", "Neoplastic"],
        ["Homo sapiens", "Smart-seq2", "Oligodendrocyte"],
        ["Homo sapiens", "Smart-seq2", "Oligodendrocyte Precursor Cell"],
        ["Homo sapiens", "Smart-seq2", "Immune cell"],
        ["Homo sapiens", "Smart-seq2", "Neuron"],
        ["Homo sapiens", "Smart-seq2", "Vascular"],
        ["Homo sapiens", "Smart-seq2", "Astocyte"],
        ["Homo sapiens", "SMARTer", "Spermatogonial Stem Cells"],
        ["Homo sapiens", "Smart-seq2", "Embryonic stem cell"],
        ["Homo sapiens", "SMARTer", "Single cell transcriptome from adult liver"],
        ["Homo sapiens", "SMARTer", "Single cell transcriptome from fetal liver"],
        ["Homo sapiens", "ReapTEC", "CD4+ T"],
        ["Homo sapiens", "Smart-seq2", "B cell"],

        // mouse
        ["Mus musculus", "Smart-seq2", "Hepatoblast/hepatocyte"],
        ["Mus musculus", "Smart-seq2", "Cholangiocyte"],
        ["Mus musculus", "Smart-seq", "Hypothalamic neuronal cell"],
        ["Mus musculus", "Smart-seq2", "Cardiomyocytes"],
        ["Mus musculus", "SMARTer", "Testicular cells"],
        ["Mus musculus", "Smart-seq2", "Acinar"],
        ["Mus musculus", "SMARTer", "Neuron"],
        ["Mus musculus", "SMARTer", "Astro"],
        ["Mus musculus", "SMARTer", "Oligo"],
        ["Mus musculus", "SMARTer", "Vascular"],
        ["Mus musculus", "SMARTer", "Microglia"],
        ["Mus musculus", "SMARTer", "OPC"],
        ["Mus musculus", "SMARTer", "Macrophage"],
        ["Mus musculus", "SMARTer", "NSC"],
        ["Mus musculus", "SMARTer", "Mesenchymal cells"],
        ["Mus musculus", "SMARTer", "Glutamatergic progenitors"],
        ["Mus musculus", "SMARTer", "Dopamine neuron"],
        ["Mus musculus", "Smart-seq2", "Old_NSC"],
        ["Mus musculus", "Smart-seq2", "Old_astrocyte"],
        ["Mus musculus", "SMARTer", "Cortical cells"],
        ["Mus musculus", "SMARTer", "GABAergic"],
        ["Mus musculus", "SMARTer", "Glutamatergic 2"],
        ["Mus musculus", "SMARTer", "Glutamatergic 1"],
        ["Mus musculus", "Tang", "Wild type mouse oocyte"],
        ["Mus musculus", "Tang", "Mouse Dicer knockout oocyte"],
        ["Mus musculus", "Tang", "Mouse blastomere"],
        ["Mus musculus", "scGRO-seq", "V6.5"],
        ["Mus musculus", "Tang", "Oocyte"],
        ["Mus musculus", "Tang", "Pronucleus"],
        ["Mus musculus", "Tang", "2-cell blastomere"],
        ["Mus musculus", "Tang", "4-cell blastomere"],
        ["Mus musculus", "Tang", "8-cell blastomere"],
        ["Mus musculus", "Tang", "Morula"],
        ["Mus musculus", "Smart-seq2", "C2C12"],
        ["Mus musculus", "Smart-seq2", "Mouse embryonic fibroblast"],
        ["Mus musculus", "SUPeR-Seq", "2-cell embryo"],
        ["Mus musculus", "SUPeR-Seq", "4-cell embryo"],
        ["Mus musculus", "SUPeR-Seq", "8-cell embryo"],
        ["Mus musculus", "SUPeR-Seq", "Blastocyst"],
        ["Mus musculus", "SUPeR-Seq", "Morula"],
        ["Mus musculus", "SUPeR-Seq", "Zygote"],
        ["Mus musculus", "SUPeR-Seq", "Mouse oocyte"],
        ["Mus musculus", "SUPeR-Seq", "Mouse zygote"],
        ["Mus musculus", "SUPeR-Seq", "Mouse ES cell"],
        ["Mus musculus", "SMARTer", "Medullary thymic epithelial cell"],
        ["Mus musculus", "SMARTer", "CD4 T cells"],
        ["Mus musculus", "SMARTer", "Neural progenitor cell"],
        ["Mus musculus", "Smart-seq2", "Dorsal root ganglion neuron"],
        ["Mus musculus", "Smart-seq3", "Th-eGFP+ sorted dopaminergic neuron"],
        ["Mus musculus", "SMARTer", "Naive CD4+ T cell"],
        ["Mus musculus", "SMARTer", "Resting B cell"],
        ["Mus musculus", "SMARTer", "Blastoderm cell"],
        ["Mus musculus", "SMARTer", "Gamma-delta T cell"],

        // fly
        ["Drosophila melanogaster", "Smart-seq2", "Neuron"],
        ["Drosophila melanogaster", "Smart-seq2", "Olfactory projection neuron"],
        ["Drosophila melanogaster", "Smart-seq2", "Astrocyte"],

        // fish
        ["Danio rerio", "Smart-seq2", "10 days post fertilization habenula"],

        // chicken
        ["Gallus gallus", "SMARTer", "Chicken primitive streak cell"],
        ["Gallus gallus", "SMARTer", "Chicken surrounding region cell"],
        ["Gallus gallus", "SMARTer", "Chicken epiblast cell"],
        ["Gallus gallus", "SMARTer", "Cranial Neural Crest Cells"],

        // worm
        ["Caenorhabditis elegans", "SMARTer", "P0"],
        ["Caenorhabditis elegans", "SMARTer", "AB"],
        ["Caenorhabditis elegans", "SMARTer", "P1"],
        ["Caenorhabditis elegans", "SMARTer", "EMS"],
        ["Caenorhabditis elegans", "SMARTer", "ABa"],
        ["Caenorhabditis elegans", "SMARTer", "ABp"],
        ["Caenorhabditis elegans", "SMARTer", "P2"],
        ["Caenorhabditis elegans", "SMARTer", "MS"],
        ["Caenorhabditis elegans", "SMARTer", "C"],
        ["Caenorhabditis elegans", "SMARTer", "E"],
        ["Caenorhabditis elegans", "SMARTer", "D"]
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





