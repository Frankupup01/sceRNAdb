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
            width: 80%;               /* 统一占据屏幕 80% */
            max-width: 1400px;        /* 防止在超宽带鱼屏上被拉得太散 */
            margin: 0 auto;           /* 完美居中 */
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
            Detail Search / Genomic Region
        </div>
    </div>
</div>

<div id="main-wrapper">
    <div class="unified-container" style="margin-top: 40px;">
        <div class="row">

            <div class="col-lg-6">
                <form onsubmit="return false;">
                    <div class="form-group">
                        <label for="Region" class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step1</span>: Input genome region</label>
                        <input type="text" class="form-control" name="Region" id="Region" placeholder="eg:chr1:1438079-1641840">

                        <label for="Spe" class="font-weight-bold mt-3" style="font-size: 14px;"><span style="color: red;">Step2</span>: Choose a species</label>
                        <select class="selectpicker form-control" id="Spe" title="Select a species" data-live-search="true">
                            <option value="Homo sapiens">Homo sapiens</option>
                            <option value="Mus musculus">Mus musculus</option>
                            <option value="Gallus gallus">Gallus gallus</option>
                            <option value="Danio rerio">Danio rerio</option>
                            <option value="Caenorhabditis elegans">Caenorhabditis elegans</option>
                            <option value="Drosophila">Drosophila</option>
                        </select>

                        <div class="center-block mt-3" id="t1">
                            <label class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step3</span>: Sequencing Technology</label>
                            <select class="selectpicker form-control" id="Tech" title="Select a Sequencing type" data-live-search="true"></select>
                        </div>

                        <div class="center-block mt-3" id="t2">
                            <label class="font-weight-bold text-justify" style="font-size: 14px;"><span style="color: red;">Step4</span>: Tissue type</label>
                            <select class="selectpicker form-control" id="Tissue" title="Select Tissue Type" data-live-search="true"></select>
                        </div>

                        <div class="center-block mt-3" id="t3">
                            <label class="font-weight-bold text-justify" style="font-size: 14px;"><span style="color: red;">Step5</span>: Cell type</label>
                            <select class="selectpicker form-control" id="Cell" title="Select Cell Type" data-live-search="true"></select>
                        </div>

                        <div class="mt-4">
                            <div style="margin-bottom: 8px;">
                                <a id='op2' class="btn btn-default" onclick="Turn()" style="text-transform: none;"><b>Search typical eRNAs</b></a>
                                <a id='op3' class="btn btn-default" onclick="Turn2()" style="text-transform: none;"><b>Search super eRNAs</b></a>
                            </div>
                            <div>
                                <a onclick="populateExamples()" class="btn btn-default" style="text-transform: none;"><b>Example</b></a>
                                <button class="btn btn-default" id="reset" style="text-transform: none;"><b>Reset</b></button>
                            </div>
                        </div>

                        <div class="mt-3" style="color:darkgray; font-size: 13px;">
                            <p class="mb-1"><strong>Note:</strong></p>
                            <p class="mb-1">1. Please input the chromosome region in Step 1 first.</p>
                            <p class="mb-1">2. Dropdown options must be selected in order.</p>
                            <p class="mb-1">3. <strong>Interactive Sunburst Chart:</strong></p>
                            <ul style="padding-left: 20px; margin-bottom: 0;">
                                <li class="mb-1"><strong>Hover:</strong> Move mouse over a slice to view its full path.</li>
                                <li class="mb-1"><strong>Click a slice:</strong> Auto-fill options and drill down to the next level.</li>
                                <li class="mb-1"><strong>Click the center:</strong> Go back to the previous level or reset.</li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6">
                <div class="custom-border text-justify font-weight-400 px-4 py-2">
                    <h5 class="text-danger font-weight-bold">Function introduction:</h5>
                    <p class="text-dark font-weight-400">In the dataset-based advanced query, users determine the scope of the eRNA query by determining the sample and genome location for the results of interest.</p>
                    <h5 class="text-danger font-weight-bold">Parameter explanation:</h5>
                    <p class="text-dark font-weight-400">1) Genomic region: Chromosome, at the start of the chromosome and at the end of the chromosome.</p>
                    <p class="text-dark font-weight-400">2) Species: Select Homo sapiens or Mus musculus and others.</p>
                    <p class="text-dark font-weight-400">3) Sequencing Technology: Select the Single-cell transcriptome library preparation strategy of interest.</p>
                    <p class="text-dark font-weight-400">4) Tissue Type: Select the tissue of interest.</p>
                    <p class="text-dark font-weight-400">5) Cell Type: Select the cell of interest.</p>
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
                3: { // 组织层级 - 新增了很多组织类型
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
                    'Kidney marrow': '#009688',
                    'Spleen': '#FF9800', // 新增
                    'CD4+ T': '#7E57C2', // 新增
                    // 新增的其他组织类型
                    'Embryonic stem cell': '#E91E63',
                    'Dorsal root ganglion': '#9C27B0',
                    'Germinal center B cell': '#3F51B5'
                },
                4: { // 细胞类型层级 - 使用更丰富的颜色
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
                    'Olfactory projection neuron innervating DA1, VA1d, or DC3 glomerulus': '#8BC34A',
                    'Olfactory projection neuron innvervating DC2 glomerulus': '#7CB342',
                    'Olfactory projection neuron innervating VM2 glomerulus': '#689F38',
                    'Oligodendrocytes': '#42A5F5',
                    'Oligodendrocyte Precursor Cell': '#42A5F5',
                    'Astrocytes': '#4ECDC4',
                    'Neurons': '#FF6B6B',
                    'Endothelial': '#EF5350',
                    'Hybrid': '#AB47BC',
                    'Fetal_quiescent': '#EC407A',
                    'Fetal_replicating': '#E91E63',
                    'Dopamine neuron': '#FF5722',
                    'Glutamatergic progenitors': '#FF9800',
                    'Cortical cells': '#FFB74D',
                    'GABAergic': '#FFD54F',
                    'Glutamatergic 2': '#FFF176',
                    'Glutamatergic 1': '#E6EE9C',
                    'Cajal Retzius': '#C0CA33',
                    'CGE-derived': '#AFB42B',
                    'VZ-derived': '#9E9D24',
                    'Neural progenitor cell': '#827717',
                    'Hypothalamic neuronal cell': '#5D4037',
                    'Dorsal root ganglion neuron': '#6D4C41',

                    // 胚胎发育相关
                    'Human preimplantation blastomere': '#FF7043',
                    'Human preimplantation blastomere (Oocyte)': '#FF8A65',
                    'Human preimplantation blastomere (zygote)': '#FFAB91',
                    'Human preimplantation blastomere (2-cell)': '#FFCCBC',
                    'Oocyte': '#D7CCC8',
                    'Pronucleus': '#BCAAA4',
                    'Zygote': '#A1887F',
                    '2-cell blastomere': '#8D6E63',
                    '4-cell blastomere': '#795548',
                    '8-cell blastomere': '#6D4C41',
                    'Morula': '#5D4037',
                    'Blastocyst': '#4E342E',
                    'MII oocyte': '#3E2723',

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
                    'Mesenchyme': '#EC407A',

                    // 癌症细胞
                    'MCF7': '#FFCA28',
                    'HCT116(Colorectal carcinoma)': '#F48FB1',
                    'Primary breast cancer': '#E57373',
                    'Metastatic breast cancer': '#EF5350',
                    'Neoplastic': '#E91E63',

                    // 其他特殊细胞类型
                    'Primary cell': '#90A4AE',
                    'HEK293T': '#4FC3F7',
                    'GM12878': '#7986CB',
                    'C2C12': '#9575CD',
                    'Mouse embryonic fibroblast': '#BA68C8',
                    'Human Skeletal Muscle Myoblasts (HSMM)': '#A1887F',
                    'Primary foreskin fibroblast cells': '#90A4AE',
                    'Spermatogonial Stem Cells': '#FFF176',
                    'Cardiomyocytes': '#EF5350',
                    'Testicular cells': '#FFD54F',
                    'Hepatoblast/hepatocyte': '#81C784',
                    'Cholangiocyte': '#4DB6AC',
                    'Medullary thymic epithelial cell': '#4DD0E1',

                    // 小鼠大脑详细分类
                    'Vip Mybpc1': '#FF6B6B',
                    'Vip Cxcl14_Car4': '#4ECDC4',
                    'L4 Sparcl1': '#45B7D1',
                    'Vip Chat': '#96CEB4',
                    'L2/3 Otof': '#FFA726',
                    'L2 Ngb': '#BA68C8',
                    'Pvalb Gpx3': '#26A69A',
                    'Ndnf Cxcl14': '#26C6DA',
                    'Vip Gpc3': '#EF5350',
                    'Vip Sncg': '#EC407A',
                    'L5a Batf3': '#AB47BC',
                    'Endo Myl9': '#7E57C2',
                    'Ndnf Car4': '#42A5F5',
                    'L4 Scnn1a': '#66BB6A',
                    'Astro Gja1': '#9CCC65',
                    'Sst Myh8': '#8BC34A',
                    'Sst Chodl': '#7CB342',
                    'Sst Th': '#689F38',
                    'Sst Tacstd2': '#558B2F',
                    'Sncg': '#33691E',
                    'Sst Cdk6': '#64DD17',
                    'L5a Syt17': '#00C853',
                    'Pvalb Wt1': '#00E676',
                    'L6a Mgp': '#76FF03',
                    'Endo Tbc1d4': '#B2FF59',
                    'L6b Trh': '#CCFF90',
                    'L6b Mup5': '#F4FF81',
                    'L4 Arf5': '#FFFF8D',
                    'L5 Hsd11b1': '#FFE57F',
                    'Pvalb Tacr3': '#FFD740',
                    'L5a Fam5c': '#FFC400',
                    'Sst Cbln4': '#FFAB00',
                    'Micro Ctss': '#FF9100',
                    'Igtp': '#FF6D00',
                    'Pvalb Cpne5': '#FF5722',
                    'Pvalb Rspo2': '#E65100',
                    'OPC/Oligo': '#BF360C',
                    'Cd34': '#3E2723',
                    'Oligo Opalin': '#212121',
                    'Pvalb Tpbg': '#263238',
                    'L6a Plcxd3': '#37474F',
                    'L6 Syt17': '#455A64',
                    'L6 Car12': '#546E7A',
                    'OPC Pdgfra': '#607D8B',
                    'Pvalb Obox3': '#78909C',
                    'L5b Samd3': '#90A4AE',
                    'L5 Ucma': '#B0BEC5',
                    'L5 Chrna6': '#CFD8DC',
                    'L5b Cdh13': '#ECEFF1',
                    'L6a Syt17': '#FF6B6B',
                    'L6a Car12': '#4ECDC4',

                    // 线虫胚胎细胞
                    'P0': '#FF6B6B',
                    'Tossed': '#4ECDC4',
                    'AB': '#45B7D1',
                    'P1': '#96CEB4',
                    'EMS': '#FFA726',
                    'ABa': '#BA68C8',
                    'ABp': '#26A69A',
                    'P2': '#26C6DA',
                    'ABpl': '#EF5350',
                    'ABal': '#EC407A',
                    'ABar': '#AB47BC',
                    'ABpr': '#7E57C2',
                    'MS': '#42A5F5',
                    'C': '#66BB6A',
                    'E': '#9CCC65',
                    'P3': '#8BC34A',
                    'ABplx': '#7CB342',
                    'ABprx': '#689F38',
                    'ABarx': '#558B2F',
                    'ABalx': '#33691E',
                    'MSx1': '#64DD17',
                    'MSx2': '#00C853',
                    'Cx2': '#00E676',
                    'Ea': '#76FF03',
                    'Ep': '#B2FF59',
                    'Cx1': '#CCFF90',
                    'P4': '#F4FF81',
                    'D': '#FFFF8D',

                    // 原鸡细胞
                    'Cranial Neural Crest Cells': '#FF6B6B',
                    'Chicken primitive streak cell': '#4ECDC4',
                    'Chicken surrounding region cell': '#45B7D1',
                    'Chicken epiblast cell': '#96CEB4'
                }
            };

            if (depth <= 4 && colorSchemes[depth] && colorSchemes[depth][name]) {
                return colorSchemes[depth][name];
            }

            // 对于未定义的细胞类型，使用哈希分配颜色
            const fallbackColors = [
                '#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFA726', '#BA68C8',
                '#26A69A', '#26C6DA', '#EF5350', '#EC407A', '#AB47BC', '#7E57C2',
                '#42A5F5', '#66BB6A', '#9CCC65', '#8BC34A', '#7CB342', '#689F38',
                '#558B2F', '#33691E', '#64DD17', '#00C853', '#00E676', '#76FF03'
            ];

            const index = Math.abs(name.split('').reduce((a,b)=>{a=((a<<5)-a)+b.charCodeAt(0);return a&a},0)) % fallbackColors.length;
            return fallbackColors[index];
        }

        // 数据路径，每条路径对应一条叶子节点
        var paths = [
            // human
            ["Homo sapiens", "Smart-seq2", "Embryo", "NA"],
            ["Homo sapiens", "Smart-seq2", "MLS 1765-92(Liposarcoma)", "NA"],
            ["Homo sapiens", "Smart-seq2", "PBMC", "Memory B cell"],
            ["Homo sapiens", "Smart-seq2", "PBMC", "Naive B cell"],
            ["Homo sapiens", "Smart-seq2", "PBMC", "Plasmablast"],
            ["Homo sapiens", "Smart-seq2", "PBMC", "Transitional stage B cell"],
            ["Homo sapiens", "Smart-seq2", "H9(Human embryonic stem cell)", "Embryonic stem cell"],
            ["Homo sapiens", "Smart-seq2", "Heart", "Fibroblast of dermis"],
            ["Homo sapiens", "Smart-seq2", "CD8+ T", "CD8-positive, alpha-beta T cell"],
            ["Homo sapiens", "Smart-seq2", "Ovary", "NA"],
            ["Homo sapiens", "Smart-seq2", "Lymph Node", "Cord blood CD34+ haemopoietic stem and progenitor cells"],
            ["Homo sapiens", "Smart-seq", "Liver", "HuH-1"],
            ["Homo sapiens", "Smart-seq", "Liver", "HuH-7"],
            ["Homo sapiens", "SMARTer", "Heart", "Foreskin Human Fibroblasts"],
            ["Homo sapiens", "Smart-seq2", "Spleen", "PBMC"],
            ["Homo sapiens", "SMARTer", "MCF7", "MCF7"],
            ["Homo sapiens", "SMARTer", "T-47D(Breast ductal carcinoma)", "NA"],
            ["Homo sapiens", "SMARTer", "Bone marrow", "Multiple myeloma"],
            ["Homo sapiens", "SMARTer", "Retinal", "NA"],
            ["Homo sapiens", "Smart-seq2", "Bone marrow", "Hematopoietic cell line"],
            ["Homo sapiens", "Smart-seq2", "Breast", "NA"],
            ["Homo sapiens", "SMARTer", "Bone marrow", "Plasma cells"],
            ["Homo sapiens", "Smart-seq2", "Lung", "NA"],
            ["Homo sapiens", "Smart-seq2", "Lymph Node", "NA"],
            ["Homo sapiens", "RamDA-seq", "Brain", "Neural stem cell derived from human induced pluripotent stem"],
            ["Homo sapiens", "SMART-seq-Total", "Dermal Fibroblast", "Primary cell"],
            ["Homo sapiens", "SMART-seq-Total", "HEK293T (Human embryonic kidney)", "HEK293T"],
            ["Homo sapiens", "SMART-seq-Total", "MCF7", "MCF7"],
            ["Homo sapiens", "Tang", "Embryo", "Human preimplantation blastomere"],
            ["Homo sapiens", "Tang", "Embryo", "Human embryonic stem cell"],
            ["Homo sapiens", "Tang", "Embryo", "Human preimplantation blastomere (Oocyte)"],
            ["Homo sapiens", "Tang", "Embryo", "Human preimplantation blastomere (zygote)"],
            ["Homo sapiens", "Tang", "Embryo", "Human preimplantation blastomere (2-cell)"],
            ["Homo sapiens", "Tang", "Embryo", "Oocyte"],
            ["Homo sapiens", "Tang", "Embryo", "Pronucleus"],
            ["Homo sapiens", "Tang", "Embryo", "Zygote"],
            ["Homo sapiens", "Tang", "Embryo", "2-cell blastomere"],
            ["Homo sapiens", "Tang", "Embryo", "4-cell blastomere"],
            ["Homo sapiens", "Tang", "Embryo", "8-cell blastomere"],
            ["Homo sapiens", "Tang", "Embryo", "Morula"],
            ["Homo sapiens", "SMARTer", "GM12878(B-lymphoblastoid)", "GM12878"],
            ["Homo sapiens", "Smart-seq2", "HEK293T (Human embryonic kidney)", "HEK293T"],
            ["Homo sapiens", "SMARTer", "HCT116(Colorectal carcinoma)", "HCT116(Colorectal carcinoma)"],
            ["Homo sapiens", "SMARTer", "Skeletal Muscle", "Human Skeletal Muscle Myoblasts (HSMM)"],
            ["Homo sapiens", "SMARTer", "Embryo", "Human embryonic stem cells"],
            ["Homo sapiens", "SMARTer", "CRL2097(Prostate carcinoma)", "Primary foreskin fibroblast cells"],
            ["Homo sapiens", "SMARTer", "Brain", "Oligodendrocytes"],
            ["Homo sapiens", "SMARTer", "Brain", "Hybrid"],
            ["Homo sapiens", "SMARTer", "Brain", "Astrocytes"],
            ["Homo sapiens", "SMARTer", "Brain", "Oligodendrocyte Precursor Cell"],
            ["Homo sapiens", "SMARTer", "Brain", "Microglia"],
            ["Homo sapiens", "SMARTer", "Brain", "Neurons"],
            ["Homo sapiens", "SMARTer", "Brain", "Endothelial"],
            ["Homo sapiens", "SMARTer", "Brain", "Fetal_quiescent"],
            ["Homo sapiens", "SMARTer", "Brain", "Fetal_replicating"],
            ["Homo sapiens", "SMARTer", "Lung", "NA"],
            ["Homo sapiens", "SUPeR-Seq", "Embryo", "MII oocyte"],
            ["Homo sapiens", "SUPeR-Seq", "Embryo", "Zygote"],
            ["Homo sapiens", "SUPeR-Seq", "Embryo", "2 cell"],
            ["Homo sapiens", "SUPeR-Seq", "Embryo", "4 cell"],
            ["Homo sapiens", "SUPeR-Seq", "Embryo", "8 cell"],
            ["Homo sapiens", "SUPeR-Seq", "Embryo", "Morula"],
            ["Homo sapiens", "SUPeR-Seq", "Embryo", "Early blastocsyt"],
            ["Homo sapiens", "SUPeR-Seq", "Embryo", "Middle blastocyst"],
            ["Homo sapiens", "SUPeR-Seq", "Embryo", "Late blastoycst"],
            ["Homo sapiens", "SUPeR-Seq", "Embryo", "Late blastocyst"],
            ["Homo sapiens", "SUPeR-Seq", "Embryo", "ICM"],
            ["Homo sapiens", "SUPeR-Seq", "Embryo", "TE"],
            ["Homo sapiens", "SUPeR-Seq", "Embryo", "NA"],
            ["Homo sapiens", "Smart-seq2", "Pancreas", "NA"],
            ["Homo sapiens", "Smart-seq2", "Pancreas", "Alpha"],
            ["Homo sapiens", "Smart-seq2", "Pancreas", "Delta"],
            ["Homo sapiens", "Smart-seq2", "Pancreas", "Pp"],
            ["Homo sapiens", "Smart-seq2", "Pancreas", "Duct"],
            ["Homo sapiens", "Smart-seq2", "Pancreas", "Acinar"],
            ["Homo sapiens", "Smart-seq2", "Pancreas", "Beta"],
            ["Homo sapiens", "Smart-seq2", "Pancreas", "Islet"],
            ["Homo sapiens", "SMARTer", "Breast", "NA"],
            ["Homo sapiens", "Smart-seq2", "Heart", "In vivo single Tcell"],
            ["Homo sapiens", "Smart-seq2", "Heart", "NA"],
            ["Homo sapiens", "Smart-seq2", "Heart", "Ex vivo single Tcell"],
            ["Homo sapiens", "Smart-seq2", "Heart", "Peripheral blood mononuclear cells"],
            ["Homo sapiens", "SMARTer", "Breast", "Primary breast cancer"],
            ["Homo sapiens", "SMARTer", "Breast", "Metastatic breast cancer"],
            ["Homo sapiens", "SMARTer", "Lung", "Metastatic breast cancer"],
            ["Homo sapiens", "SMARTer", "Lung", "Primary breast cancer"],
            ["Homo sapiens", "SMARTer", "Embryo", "Embryonic stem cell"],
            ["Homo sapiens", "MATQ-seq", "HEK293T (Human embryonic kidney)", "HEK293T"],
            ["Homo sapiens", "Smart-seq2", "Pancreas", "Ductal"],
            ["Homo sapiens", "Smart-seq2", "Pancreas", "Mesenchymal"],
            ["Homo sapiens", "SMARTer", "Pancreas", "Dropped"],
            ["Homo sapiens", "SMARTer", "Pancreas", "Alpha"],
            ["Homo sapiens", "SMARTer", "Pancreas", "Duct"],
            ["Homo sapiens", "SMARTer", "Pancreas", "Delta"],
            ["Homo sapiens", "SMARTer", "Pancreas", "Beta"],
            ["Homo sapiens", "SMARTer", "Pancreas", "Pp"],
            ["Homo sapiens", "SMARTer", "Pancreas", "Acinar"],
            ["Homo sapiens", "SMARTer", "Pancreas", "Mesenchyme"],
            ["Homo sapiens", "Smart-seq2", "Brain", "Neoplastic"],
            ["Homo sapiens", "Smart-seq2", "Brain", "Oligodendrocyte"],
            ["Homo sapiens", "Smart-seq2", "Brain", "Oligodendrocyte Precursor Cell"],
            ["Homo sapiens", "Smart-seq2", "Brain", "Immune cell"],
            ["Homo sapiens", "Smart-seq2", "Brain", "Neuron"],
            ["Homo sapiens", "Smart-seq2", "Brain", "Vascular"],
            ["Homo sapiens", "Smart-seq2", "Brain", "Astocyte"],
            ["Homo sapiens", "SMARTer", "Brain", "NA"],
            ["Homo sapiens", "SMARTer", "Testis", "Spermatogonial Stem Cells"],
            ["Homo sapiens", "Smart-seq2", "Embryo", "Embryonic stem cell"],
            ["Homo sapiens", "SMARTer", "Liver", "Single cell transcriptome from adult liver"],
            ["Homo sapiens", "SMARTer", "Liver", "Single cell transcriptome from fetal liver"],
            ["Homo sapiens", "SMARTer", "Liver", "Single cell transcriptome from late time point liver buds"],
            ["Homo sapiens", "SMARTer", "Liver", "Single cell transcriptome from transplanted liver bud"],
            ["Homo sapiens", "ReapTEC", "CD4+ T", "CD4+ T"],
            ["Homo sapiens", "Smart-seq2", "Peripheral blood", "B cell"],

            //mouse
            ["Mus musculus", "Smart-seq2", "Liver", "Hepatoblast/hepatocyte"],
            ["Mus musculus", "Smart-seq2", "Liver", "Cholangiocyte"],
            ["Mus musculus", "Tang", "Brain", "NA"],
            ["Mus musculus", "Smart-seq", "Brain", "Hypothalamic neuronal cell"],
            ["Mus musculus", "Smart-seq2", "Heart", "Cardiomyocytes"],
            ["Mus musculus", "SMARTer", "Testis", "Testicular cells"],
            ["Mus musculus", "SMARTer", "Pancreas", "NA"],
            ["Mus musculus", "SMARTer", "Germinal center B cell", "NA"],
            ["Mus musculus", "Smart-seq2", "Pancreas", "Acinar"],
            ["Mus musculus", "Smart-seq2", "Retinal", "NA"],
            ["Mus musculus", "SMARTer", "Brain", "Neuron"],
            ["Mus musculus", "SMARTer", "Brain", "Astro"],
            ["Mus musculus", "SMARTer", "Brain", "Oligo"],
            ["Mus musculus", "SMARTer", "Brain", "Vascular"],
            ["Mus musculus", "SMARTer", "Brain", "Microglia"],
            ["Mus musculus", "SMARTer", "Brain", "OPC"],
            ["Mus musculus", "SMARTer", "Brain", "Ependy-Sec"],
            ["Mus musculus", "SMARTer", "Brain", "Macrophage"],
            ["Mus musculus", "SMARTer", "Brain", "Ependy-C"],
            ["Mus musculus", "SMARTer", "Brain", "NSC"],
            ["Mus musculus", "SMARTer", "Liver", "NA"],
            ["Mus musculus", "SMARTer", "Lung", "Mesenchymal cells"],
            ["Mus musculus", "SMARTer", "Brain", "Glutamatergic progenitors"],
            ["Mus musculus", "Smart-seq2", "Liver", "NA"],
            ["Mus musculus", "Smart-seq2", "Lung", "NA"],
            ["Mus musculus", "Smart-seq2", "Mammary", "NA"],
            ["Mus musculus", "Smart-seq2", "Bone marrow", "NA"],
            ["Mus musculus", "Smart-seq2", "Pancreas", "NA"],
            ["Mus musculus", "Smart-seq2", "Spleen", "NA"],
            ["Mus musculus", "Smart-seq2", "Thymus", "NA"],
            ["Mus musculus", "Smart-seq2", "Heart", "NA"],
            ["Mus musculus", "Smart-seq2", "Kidney", "NA"],
            ["Mus musculus", "SMARTer", "Brain", "NA"],
            ["Mus musculus", "SMARTer", "Brain", "Dopamine neuron"],
            ["Mus musculus", "Smart-seq2", "Brain", "Old_NSC"],
            ["Mus musculus", "Smart-seq2", "Brain", "Old_astrocyte"],
            ["Mus musculus", "Smart-seq2", "Brain", "Neuron"],
            ["Mus musculus", "SMARTer", "Brain", "Cortical cells"],
            ["Mus musculus", "SMARTer", "Brain", "OLM"],
            ["Mus musculus", "SMARTer", "Brain", "MGE-derived 2"],
            ["Mus musculus", "SMARTer", "Brain", "MGE-derived 1"],
            ["Mus musculus", "SMARTer", "Brain", "GABAergic"],
            ["Mus musculus", "SMARTer", "Brain", "Undefined"],
            ["Mus musculus", "SMARTer", "Brain", "VZ-derived"],
            ["Mus musculus", "SMARTer", "Brain", "Glutamatergic 2"],
            ["Mus musculus", "SMARTer", "Brain", "Cajal Retzius"],
            ["Mus musculus", "SMARTer", "Brain", "Glutamatergic 1"],
            ["Mus musculus", "SMARTer", "Brain", "CGE-derived"],
            ["Mus musculus", "Smart-seq2", "Lung", "Lung1 Lyve1+"],
            ["Mus musculus", "Smart-seq2", "Lung", "Lung2 Lyve1+"],
            ["Mus musculus", "Smart-seq2", "Lung", "Lung3 Lyve1+"],
            ["Mus musculus", "Smart-seq2", "Lung", "Lung1 Lyve1-"],
            ["Mus musculus", "Smart-seq2", "Lung", "Lung2 Lyve1-"],
            ["Mus musculus", "Smart-seq2", "Lung", "Lung1 AM"],
            ["Mus musculus", "Smart-seq2", "Lung", "Lung2 AM"],
            ["Mus musculus", "Smart-seq2", "Lung", "Lung3 AM"],
            ["Mus musculus", "Smart-seq2", "Lung", "Lung1 mono"],
            ["Mus musculus", "Smart-seq2", "Lung", "Lung2 mono"],
            ["Mus musculus", "Smart-seq2", "Lung", "Interstitial Macrophages"],
            ["Mus musculus", "Smart-seq2", "Lung", "Lung3 mono"],
            ["Mus musculus", "Tang", "Embryo", "Wild type mouse oocyte #1"],
            ["Mus musculus", "Tang", "Embryo", "Wild type mouse oocyte #2"],
            ["Mus musculus", "Tang", "Embryo", "Mouse Dicer knockout oocyte #3"],
            ["Mus musculus", "Tang", "Embryo", "Mouse Dicer knockout oocyte #4"],
            ["Mus musculus", "Tang", "Embryo", "Mouse blastomere in 2-cell embyro #1"],
            ["Mus musculus", "Tang", "Embryo", "Mouse blastomere in 2-cell embyro #2"],
            ["Mus musculus", "Tang", "Embryo", "Mouse blastomere in 2-cell embyro #3"],
            ["Mus musculus", "Tang", "Embryo", "Mouse blastomere in 2-cell embyro #4"],
            ["Mus musculus", "Tang", "Embryo", "Mouse blastomere in 4-cell embyro #1"],
            ["Mus musculus", "Tang", "Embryo", "Mouse blastomere in 4-cell embyro #2"],
            ["Mus musculus", "Tang", "Embryo", "Mouse blastomere in 4-cell embyro #3"],
            ["Mus musculus", "Tang", "Embryo", "Mouse blastomere in 8-cell embyro #1"],
            ["Mus musculus", "Tang", "Embryo", "Mouse blastomere in 8-cell embyro #2"],
            ["Mus musculus", "Tang", "Embryo", "Mouse blastomere in 8-cell embyro #3"],
            ["Mus musculus", "scGRO-seq", "Embryonic stem cells", "V6.5"],
            ["Mus musculus", "Tang", "Embryo", "Oocyte"],
            ["Mus musculus", "Tang", "Embryo", "Pronucleus"],
            ["Mus musculus", "Tang", "Embryo", "2-cell blastomere"],
            ["Mus musculus", "Tang", "Embryo", "4-cell blastomere"],
            ["Mus musculus", "Tang", "Embryo", "8-cell blastomere"],
            ["Mus musculus", "Tang", "Embryo", "Morula"],
            ["Mus musculus", "SMARTer", "Embryo", "NA"],
            ["Mus musculus", "Smart-seq2", "Embryonic fibroblast", "C2C12"],
            ["Mus musculus", "Smart-seq2", "Embryonic fibroblast", "Mouse embryonic fibroblast"],
            ["Mus musculus", "SMARTer", "Lung", "NA"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "2-cell embryo"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "4-cell embryo"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "8-cell embryo"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "Blastocyst"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "Morula"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "Zygote"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "Mouse oocyte"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "Mouse zygote"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "Mouse 2-cell"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "Mouse 4-cell"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "Mouse 8-cell"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "Mouse morula"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "Mouse blastocyst"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "Mouse ES cell"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "ES cell"],
            ["Mus musculus", "SUPeR-Seq", "Embryo", "Oocyte"],
            ["Mus musculus", "SMARTer", "Kidney", "NA"],
            ["Mus musculus", "SMARTer", "Thymus", "Medullary thymic epithelial cell"],
            ["Mus musculus", "SMARTer", "Brain", "Vip Mybpc1"],
            ["Mus musculus", "SMARTer", "Brain", "Vip Cxcl14_Car4"],
            ["Mus musculus", "SMARTer", "Brain", "L4 Sparcl1"],
            ["Mus musculus", "SMARTer", "Brain", "Vip Chat"],
            ["Mus musculus", "SMARTer", "Brain", "L2/3 Otof"],
            ["Mus musculus", "SMARTer", "Brain", "L2 Ngb"],
            ["Mus musculus", "SMARTer", "Brain", "Pvalb Gpx3"],
            ["Mus musculus", "SMARTer", "Brain", "Ndnf Cxcl14"],
            ["Mus musculus", "SMARTer", "Brain", "Vip Gpc3"],
            ["Mus musculus", "SMARTer", "Brain", "Vip Sncg"],
            ["Mus musculus", "SMARTer", "Brain", "L5a Batf3"],
            ["Mus musculus", "SMARTer", "Brain", "Endo Myl9"],
            ["Mus musculus", "SMARTer", "Brain", "Ndnf Car4"],
            ["Mus musculus", "SMARTer", "Brain", "L4 Scnn1a"],
            ["Mus musculus", "SMARTer", "Brain", "Astro Gja1"],
            ["Mus musculus", "SMARTer", "Brain", "Sst Myh8"],
            ["Mus musculus", "SMARTer", "Brain", "Sst Chodl"],
            ["Mus musculus", "SMARTer", "Brain", "Sst Th"],
            ["Mus musculus", "SMARTer", "Brain", "Sst Tacstd2"],
            ["Mus musculus", "SMARTer", "Brain", "Sncg"],
            ["Mus musculus", "SMARTer", "Brain", "Sst Cdk6"],
            ["Mus musculus", "SMARTer", "Brain", "L5a Syt17"],
            ["Mus musculus", "SMARTer", "Brain", "Pvalb Wt1"],
            ["Mus musculus", "SMARTer", "Brain", "L6a Mgp"],
            ["Mus musculus", "SMARTer", "Brain", "Endo Tbc1d4"],
            ["Mus musculus", "SMARTer", "Brain", "L6b Trh"],
            ["Mus musculus", "SMARTer", "Brain", "L6b Mup5"],
            ["Mus musculus", "SMARTer", "Brain", "L4 Arf5"],
            ["Mus musculus", "SMARTer", "Brain", "L5 Hsd11b1"],
            ["Mus musculus", "SMARTer", "Brain", "Pvalb Tacr3"],
            ["Mus musculus", "SMARTer", "Brain", "L5a Fam5c"],
            ["Mus musculus", "SMARTer", "Brain", "Sst Cbln4"],
            ["Mus musculus", "SMARTer", "Brain", "Micro Ctss"],
            ["Mus musculus", "SMARTer", "Brain", "Igtp"],
            ["Mus musculus", "SMARTer", "Brain", "Pvalb Cpne5"],
            ["Mus musculus", "SMARTer", "Brain", "Pvalb Rspo2"],
            ["Mus musculus", "SMARTer", "Brain", "OPC/Oligo"],
            ["Mus musculus", "SMARTer", "Brain", "Cd34"],
            ["Mus musculus", "SMARTer", "Brain", "Oligo Opalin"],
            ["Mus musculus", "SMARTer", "Brain", "Pvalb Tpbg"],
            ["Mus musculus", "SMARTer", "Brain", "L6a Plcxd3"],
            ["Mus musculus", "SMARTer", "Brain", "L6 Syt17"],
            ["Mus musculus", "SMARTer", "Brain", "L6 Car12"],
            ["Mus musculus", "SMARTer", "Brain", "OPC Pdgfra"],
            ["Mus musculus", "SMARTer", "Brain", "Pvalb Obox3"],
            ["Mus musculus", "SMARTer", "Brain", "L5b Samd3"],
            ["Mus musculus", "SMARTer", "Brain", "L5 Ucma"],
            ["Mus musculus", "SMARTer", "Brain", "L5 Chrna6"],
            ["Mus musculus", "SMARTer", "Brain", "L5b Cdh13"],
            ["Mus musculus", "SMARTer", "Brain", "L6a Syt17"],
            ["Mus musculus", "SMARTer", "Brain", "L6a Car12"],
            ["Mus musculus", "SMARTer", "CD4+ T", "CD4 T cells"],
            ["Mus musculus", "SMARTer", "Brain", "Neural progenitor cell"],
            ["Mus musculus", "Smart-seq2", "Dorsal root ganglion", "Dorsal root ganglion neuron"],
            ["Mus musculus", "SMARTer", "Lymph Node", "NA"],
            ["Mus musculus", "Smart-seq2", "Brain", "VPM-only"],
            ["Mus musculus", "Smart-seq2", "Brain", "VPM/POm"],
            ["Mus musculus", "Smart-seq3", "Brain", "Th-eGFP+ sorted dopaminergic neuron"],
            ["Mus musculus", "SMARTer", "Spleen", "Naive CD4+ T cell"],
            ["Mus musculus", "SMARTer", "Spleen", "Resting B cell"],
            ["Mus musculus", "Smart-seq2", "Brain", "NA"],
            ["Mus musculus", "Smart-seq2", "Embryo", "NA"],
            ["Mus musculus", "SMARTer", "Embryo", "Blastoderm cell"],
            ["Mus musculus", "SMARTer", "Lymph Node", "Gamma-delta T cell"],
            //fly
            ["Drosophila melanogaster", "Smart-seq2", "Brain", "NA"],
            ["Drosophila melanogaster", "Smart-seq2", "Brain", "Neuron"],
            ["Drosophila melanogaster", "Smart-seq2", "Brain", "Olfactory projection neuron"],
            ["Drosophila melanogaster", "Smart-seq2", "Brain", "Olfactory projection neuron innervating DA1, VA1d, or DC3 glomerulus"],
            ["Drosophila melanogaster", "Smart-seq2", "Brain", "Astrocyte"],
            ["Drosophila melanogaster", "Smart-seq2", "Brain", "Olfactory projection neuron innvervating DC2 glomerulus"],
            ["Drosophila melanogaster", "Smart-seq2", "Brain", "Olfactory projection neuron innervating VM2 glomerulus"],
            //fish
            ["Danio rerio", "Smart-seq2", "Brain", "10 days post fertilization habenula"],
            ["Danio rerio", "Smart-seq2", "Kidney marrow", "NA"],
            //chiken
            ["Gallus gallus", "SMARTer", "Embryo", "Chicken primitive streak cell"],
            ["Gallus gallus", "SMARTer", "Embryo", "Chicken surrounding region cell"],
            ["Gallus gallus", "SMARTer", "Embryo", "Chicken epiblast cell"],
            ["Gallus gallus", "SMARTer", "Embryo", "Cranial Neural Crest Cells"],
            //worm
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "P0"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "Tossed"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "AB"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "P1"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "EMS"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABa"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABp"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "P2"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABpl"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABal"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABar"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABpr"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "MS"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "C"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "E"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "P3"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABplx"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABprx"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABarx"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABalx"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "MSx1"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "MSx2"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "Cx2"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "Ea"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "Ep"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "Cx1"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "P4"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "D"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "P0"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "Tossed"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "AB"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "P1"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "EMS"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABa"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABp"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "P2"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABpl"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABal"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABar"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABpr"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "MS"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "C"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "E"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "P3"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABplx"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABprx"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABarx"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABalx"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "MSx1"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "MSx2"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "Cx2"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "Ea"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "Ep"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "Cx1"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "P4"],
            ["Caenorhabditis elegans", "SMARTer", "Embryo", "D"],
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
                    if (i === path.length - 1) child.value = 1;
                    node.children.push(child);
                }
                node = child;
            }
        }

        // 使用统一 root 对象
        let root = { children: [] };
        paths.forEach(p => addPath(root, p));
        let data = root.children;

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
            title: {
                text: 'Species / Technology / Cell Type Distribution',
                left: 'center',
                top: '0%',
                textStyle: {
                    color: '#0362a4',
                    fontSize: 16,
                    fontWeight: 'bold',
                    width: 320,        // 标题自适应换行，防止窄屏幕显示不全
                    overflow: 'break'
                }
            },
            tooltip: { trigger: 'item', formatter: formatTooltip },
            series: [{
                type: 'sunburst',
                data: data,
                radius: [0, '95%'],
                sort: null,

                // ==========================================
                // 2. 【悬停状态】鼠标移上去时：给整条链路的标签上色
                // ==========================================
                emphasis: {
                    focus: 'ancestor',   // 聚焦：当前节点 + 它的所有父辈/祖父辈
                    itemStyle: { shadowBlur: 10, shadowColor: 'rgba(0, 0, 0, 0.5)' },
                    label: {
                        show: true,
                        formatter: '{b}',
                        // 悬停时，赋予真实的颜色，让隐身的标签显形
                        color: '#000',
                        textBorderColor: '#fff',
                        textBorderWidth: 3,
                        backgroundColor: 'rgba(255, 255, 255, 0.95)',
                        padding: [4, 8],
                        borderRadius: 4,
                        fontSize: 14,
                        fontWeight: 'bold'
                    }
                },

                nodeClick: 'rootToNode',

                // ==========================================
                // 1. 【默认状态】开启标签，但设为 100% 全透明！
                // ==========================================
                label: {
                    show: true,                       // 必须保持开启，以便祖先节点能被顺利唤醒
                    formatter: '{b}',
                    color: 'transparent',             // 字体全透明
                    textBorderColor: 'transparent',   // 文字描边全透明
                    backgroundColor: 'transparent',   // 背景框全透明
                    rotate: 'radial'                  // 默认径向角度备用
                },

                // ==========================================
                // 3. 【层级控制】让第一层文字保持绝对水平
                // ==========================================
                levels: [
                    {}, // 最中心的空白圆点
                    {
                        r0: '10%', r: '25%',
                        label: { rotate: 0 } // 只针对第一层物种，强制标签水平展示 (0度)
                    },
                    { r0: '25%', r: '45%' }, // 第二层
                    { r0: '45%', r: '65%' }, // 第三层
                    { r0: '65%', r: '85%' }  // 第四层
                ]
            }]
        };

        myChart.setOption(option);
        window.addEventListener('resize', () => myChart.resize());

        // ---------- 双向联动逻辑 ----------
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
            const targetNode = findNodeByPath(data, nodePath); // 确保 data 是您的旭日图数据源变量名
            if (!targetNode) return;

            isSimulatingClick = true;
            myChart.dispatchAction({
                type: 'sunburstRootToNode',
                targetNodeId: targetNode.id || targetNode.name
            });
            myChart.dispatchAction({ type: 'highlight', name: targetNode.name });

            setTimeout(() => { isSimulatingClick = false; }, 300);
        }

        function jumpToSelectedNode() {
            const species = $("#Spe").val();
            const tech = $("#Tech").val();
            const tissue = $("#Tissue").val();
            const cell = $("#Cell").val();

            let targetPath = [];
            if (species) targetPath.push(species);
            if (tech) targetPath.push(tech);
            if (tissue) targetPath.push(tissue);
            if (cell) targetPath.push(cell);

            if (targetPath.length > 0) simulateNodeClick(targetPath);
        }

        // ---------- 下拉框 → 图形 ----------
        // 修改点：必须等下一级的选项加载完毕后，再跳转图形
        $("#Spe").on("change", function () {
            const species = $(this).val();
            $("#Tech").html('').selectpicker('refresh');
            $("#Tissue").html('').selectpicker('refresh');
            $("#Cell").html('').selectpicker('refresh');

            if (species) {
                autoselect_tech(species).then(() => jumpToSelectedNode());
            } else {
                jumpToSelectedNode();
            }
        });

        $("#Tech").on("change", function () {
            const species = $("#Spe").val();
            const tech = $(this).val();
            $("#Tissue").html('').selectpicker('refresh');
            $("#Cell").html('').selectpicker('refresh');

            if (species && tech) {
                autoselect_study(species, tech).then(() => jumpToSelectedNode());
            } else {
                jumpToSelectedNode();
            }
        });

        $("#Tissue").on("change", function () {
            const species = $("#Spe").val();
            const tech = $("#Tech").val();
            const tissue = $(this).val();
            $("#Cell").html('').selectpicker('refresh');

            if (species && tech && tissue) {
                autoselect_cell(species, tech, tissue).then(() => jumpToSelectedNode());
            } else {
                jumpToSelectedNode();
            }
        });

        $("#Cell").on("change", function () {
            jumpToSelectedNode();
        });

        // ---------- 图形 → 下拉框 & 中心圈清空 ----------
        myChart.on('click', async function (params) {
            if (isSimulatingClick) return;

            const names = params.treePathInfo.map(item => item.name).filter(Boolean);
            const [species, tech, tissue, cell] = names;
            const depth = params.treePathInfo.length - 1;

            console.log("Clicked depth:", depth, "names:", names);

            // === 点击中心圈（返回上一级）逻辑 ===
            if (depth === 0) {
                // 获取当前各个下拉框的值
                const currentCell = $("#Cell").val();
                const currentTissue = $("#Tissue").val();
                const currentTech = $("#Tech").val();
                const currentSpe = $("#Spe").val();

                if (currentCell) {
                    // 退回到 Tissue 层：仅清空 Cell 的选中值，保留选项列表
                    $("#Cell").val('').selectpicker('refresh');
                } else if (currentTissue) {
                    // 退回到 Tech 层：清空 Tissue 选中值，彻底掏空 Cell 列表
                    $("#Tissue").val('').selectpicker('refresh');
                    $("#Cell").html('').selectpicker('refresh');
                } else if (currentTech) {
                    // 退回到 Species 层：清空 Tech 选中值，彻底掏空 Tissue 和 Cell 列表
                    $("#Tech").val('').selectpicker('refresh');
                    $("#Tissue").html('').selectpicker('refresh');
                    $("#Cell").html('').selectpicker('refresh');
                } else if (currentSpe) {
                    // 退回到原点：清空所有
                    $("#Spe").val('').selectpicker('refresh');
                    $("#Tech").html('').selectpicker('refresh');
                    $("#Tissue").html('').selectpicker('refresh');
                    $("#Cell").html('').selectpicker('refresh');
                }

                return; // 退出，不再执行下面的下钻逻辑
            }

            // === 下钻逻辑（结合 async/await 保证 100% 渲染成功） ===
            try {
                if (species) {
                    $("#Spe").val(species).selectpicker('refresh');
                    if (tech) {
                        await autoselect_tech(species); // 严格等待 Tech 加载
                        $("#Tech").val(tech).selectpicker('refresh');
                        if (tissue) {
                            await autoselect_study(species, tech); // 严格等待 Tissue 加载
                            $("#Tissue").val(tissue).selectpicker('refresh');
                            if (cell) {
                                await autoselect_cell(species, tech, tissue); // 严格等待 Cell 加载
                                $("#Cell").val(cell).selectpicker('refresh');
                            }
                        }
                    }
                }
            } catch (error) {
                console.error("加载下拉框数据失败", error);
            }

            // === 点击最外层（Cell 叶子节点）直接带着 Region 跳转页面 ===
            if (params.depth === 4 && species && tech && tissue && cell) {
                // 获取 Region 框里的坐标
                const regionStr = $("#Region").val()?.trim() || '';
                let chr = '', start = '', end = '';
                if (regionStr !== '') {
                    const parts = regionStr.split(/[:-]/);
                    if (parts.length === 3) {
                        chr = parts[0]; start = parts[1]; end = parts[2];
                    }
                }

                const query = `Species=${encodeURIComponent(species)}&Tech=${encodeURIComponent(tech)}&Tissue=${encodeURIComponent(tissue)}&Cell=${encodeURIComponent(cell)}&Chr=${encodeURIComponent(chr)}&Start=${encodeURIComponent(start)}&End=${encodeURIComponent(end)}`;
                window.open(`../../region_result.php?${query}`, '_blank');
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

            // 统一 AJAX 请求函数
            function fetchOptions(url, query, targetId) {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: query,
                cache: false,
                success: function (res) {
                    console.log(`Response from ${url}:`, res);
                    const data = res || [];
                    const options = data.map(item => {
                        const display = item; // 保留原样显示
                        const value = item.toLowerCase(); // 值存为小写，便于后续不区分大小写匹配
                        return `<option value="${value}">${display}</option>`;
                    }).join('');

                    const $target = $(`#${targetId}`);
                    $target.html(options);
                    $target.selectpicker('refresh');
                    $target.selectpicker('render');
                },
                error: function () {
                    alert('Sorry, no dataset Results.');
                }
            });
        }

            // Tech 级联
            function autoselect_tech(species) {
            if (!species) {
            alert('Sorry. No result for your input.');
            return;
        }
            fetchOptions('../../api/auto_select_tech.php', { select_specie: species }, 'Tech');
        }

            // Study 级联（Tissue）
            function autoselect_study(species, techtype) {
            if (!species || !techtype) return;
            fetchOptions('../../api/auto_select_tissue.php', {
            select_specie: species,
            select_experiment: techtype
        }, 'Tissue');
        }

            // Cell 级联
            function autoselect_cell(species, techtype, tissuetype) {
            if (!species || !techtype || !tissuetype) return;
            fetchOptions('../../api/auto_select_region.php', {
            select_specie: species,
            select_experiment: techtype,
            select_tissue: tissuetype
        }, 'Cell');
        }

            // 页面跳转（原封不动地传递大小写）
            function Turn() {
                const species = $("#Spe").val() || '';
                const techtype = $("#Tech").val() || '';
                const tissue = $("#Tissue").val() || '';
                const cell = $("#Cell").val() || '';

                const regionStr = $("#Region").val()?.trim() || '';
                let chr = '', start = '', end = '';

                if (regionStr === '') {
                    alert("Please input genome region! (e.g., chr1:1000000-20000000)");
                    return;
                }

                const parts = regionStr.split(/[:-]/);
                if (parts.length === 3) {
                    chr = parts[0];
                    start = parts[1];
                    end = parts[2];
                } else {
                    alert("Invalid region format! Please use format like 'chr1:1000000-20000000'");
                    return;
                }

                // 把参数原封不动地传给后端
                parent.location.href = `../../region_result.php?Species=${encodeURIComponent(species)}&Tech=${encodeURIComponent(techtype)}&Tissue=${encodeURIComponent(tissue)}&Cell=${encodeURIComponent(cell)}&Chr=${encodeURIComponent(chr)}&Start=${encodeURIComponent(start)}&End=${encodeURIComponent(end)}`;
            }

            function Turn2() {
                const species = $("#Spe").val() || '';
                const techtype = $("#Tech").val() || '';
                const tissue = $("#Tissue").val() || '';
                const cell = $("#Cell").val() || '';

                const regionStr = $("#Region").val()?.trim() || '';
                let chr = '', start = '', end = '';

                if (regionStr === '') {
                    alert("Please input genome region! (e.g., chr1:1000000-20000000)");
                    return;
                }

                const parts = regionStr.split(/[:-]/);
                if (parts.length === 3) {
                    chr = parts[0];
                    start = parts[1];
                    end = parts[2];
                } else {
                    alert("Invalid region format! Please use format like 'chr1:1000000-20000000'");
                    return;
                }

                parent.location.href = `../../region_SE_result.php?Species=${encodeURIComponent(species)}&Tech=${encodeURIComponent(techtype)}&Tissue=${encodeURIComponent(tissue)}&Cell=${encodeURIComponent(cell)}&Chr=${encodeURIComponent(chr)}&Start=${encodeURIComponent(start)}&End=${encodeURIComponent(end)}`;
            }
    </script>


    <script>
        $.ajaxSetup({
            cache: false // close AJAX cache
        });

        $(function () {
            // 【修复1】不要用 div 的 click 事件，改用下拉框的 change 事件
            // 当 Species 改变时，加载 Tech
            $('#Spe').on('change', function () {
                // 清空下级所有的选项并刷新 UI，防止脏数据
                $('#Tech').html('').selectpicker('refresh');
                $('#Tissue').html('').selectpicker('refresh');
                $('#Cell').html('').selectpicker('refresh');
                autoselect_tech($(this).val());
            });

            // 当 Tech 改变时，加载 Tissue
            $('#Tech').on('change', function () {
                $('#Tissue').html('').selectpicker('refresh');
                $('#Cell').html('').selectpicker('refresh');
                autoselect_study($('#Spe').val(), $(this).val());
            });

            // 当 Tissue 改变时，加载 Cell
            $('#Tissue').on('change', function () {
                $('#Cell').html('').selectpicker('refresh');
                autoselect_cell($('#Spe').val(), $('#Tech').val(), $(this).val());
            });

            // 【修复2】删除了 $('#t4').on('click') 因为我们已经不需要 Sample 级联了
        });

        function populateExamples() {
            console.log("populateExamples() called");

            // Step0: 填 Region
            $('#Region').val("chr1:1000000-20000000");

            // Step1: Species
            var species = 'Homo sapiens';
            $('#Spe').selectpicker('val', species);

            // Step2: Tech
            autoselect_tech(species).then(() => {
                var tech = 'Smart-seq2';
                $('#Tech').selectpicker('val', tech);

                // Step3: Tissue
                return autoselect_study(species, tech);
            }).then(() => {
                var tissue = 'Brain';
                $('#Tissue').selectpicker('val', tissue);

                // Step4: Cell
                var tech = $('#Tech').val();
                return autoselect_cell(species, tech, tissue);
            }).then(() => {
                var cell = 'Neuron';
                $('#Cell').selectpicker('val', cell);

                // Step5: 更新旭日图 / 跳转
                if (typeof jumpToSelectedNode === "function") {
                    jumpToSelectedNode();
                }
            });
        }

        // autoselect_tech/study/cell 返回 Promise
        function autoselect_tech(Species) {
            return new Promise((resolve, reject) => {
                if (!Species) return reject();
                $.ajax({
                    url: '../../api/auto_select_tech.php',
                    type: 'post',
                    dataType: 'json',
                    data: { 'select_specie': Species },
                    success: function(res) {
                        var options = res.map(v => '<option value="'+v+'">'+v+'</option>');
                        $('#Tech').html(options.join('')).selectpicker('refresh');
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
                    url: '../../api/auto_select_tissue.php',
                    type: 'post',
                    dataType: 'json',
                    data: { 'select_specie': Species, 'select_experiment': Techtype },
                    success: function(res) {
                        var options = res.map(v => '<option value="'+v+'">'+v+'</option>');
                        $('#Tissue').html(options.join('')).selectpicker('refresh');
                        resolve();
                    },
                    error: reject
                });
            });
        }

        function autoselect_cell(Species, Techtype, Tissuetype) {
            return new Promise((resolve, reject) => {
                if (!Species || !Techtype || !Tissuetype) return reject();
                $.ajax({
                    url: '../../api/auto_select_region.php',
                    type: 'post',
                    dataType: 'json',
                    data: { 'select_specie': Species, 'select_experiment': Techtype, 'select_tissue': Tissuetype },
                    success: function(res) {
                        var options = res.map(v => '<option value="'+v+'">'+v+'</option>');
                        $('#Cell').html(options.join('')).selectpicker('refresh');
                        resolve();
                    },
                    error: reject
                });
            });
        }
    </script>






	</body>
</html>