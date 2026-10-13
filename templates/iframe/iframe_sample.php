<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Sample Search - sceRNAdb</title>

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
            Detail Search / Single Sample
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
                            <label for="Spe" class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step1</span>: Choose a species</label>
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
                                <label for="Tissue" class="font-weight-bold text-justify" style="font-size: 14px;"><span style="color: red;">Step3</span>: Tissue type</label>
                                <select class="selectpicker form-control" id="Tissue" title="Select Tissue Type" data-live-search="true"></select>
                            </div>

                            <div class="center-block mt-3" id="t3">
                                <label for="Cell" class="font-weight-bold text-justify" style="font-size: 14px;"><span style="color: red;">Step4</span>: Cell type</label>
                                <select class="selectpicker form-control" id="Cell" title="Select Cell Type" data-live-search="true"></select>
                            </div>

                            <div class="center-block mt-3" id="t4">
                                <label for="Sample" class="font-weight-bold text-justify" style="font-size: 14px;"><span style="color: red;">Step5</span>: Sample</label>
                                <select class="selectpicker form-control" id="Sample" title="Select Single Sample" data-live-search="true"></select>
                            </div>
                        </div>

                        <div class="mt-4" style="text-align: right;">
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
                            <p class="mb-1"><strong><i class="ni ni-tag text-warning"></i> Note:</strong></p>
                            <p class="mb-1">1. All options must be selected in order.</p>
                            <p class="mb-1">2. The module will return eRNAs results that match the criteria.</p>
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
                        In the sample-based advanced query, users determine the scope of the expression eRNA query by determining the single sample for the results of interest.
                    </p>
                    <h5 class="text-danger font-weight-bold mt-3"><i class="ni ni-tag text-warning"></i> Parameter explanation:</h5>
                    <p class="text-dark font-weight-400 mb-1">1) Species: Select Homo sapiens or Mus musculus and others.</p>
                    <p class="text-dark font-weight-400 mb-1">2) Sequencing Technonlogy: Select the Single-cell transcriptome library preparation strategy of interest.</p>
                    <p class="text-dark font-weight-400 mb-1">3) Tissue Type: Select the tissue of interest.</p>
                    <p class="text-dark font-weight-400 mb-1">4) Cell Type: Select the cell of interest.</p>
                    <p class="text-dark font-weight-400 mb-0">5) Sample Type: Select the single sample of interest.</p>
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
            1: {
                'Homo sapiens': '#FF6B6B', 'Caenorhabditis elegans': '#4ECDC4', 'Danio rerio': '#45B7D1',
                'Mus musculus': '#96CEB4', 'Drosophila melanogaster': '#FFA726', 'Gallus gallus': '#BA68C8'
            },
            2: {
                'SMARTer': '#AB47BC', 'Smart-seq2': '#EC407A', 'RamDA-seq': '#7E57C2', 'SMART-seq-Total': '#42A5F5',
                'Tang': '#26A69A', 'SUPeR-Seq': '#FFA726', 'MATQ-seq': '#EF5350', 'ReapTEC': '#66BB6A',
                'Smart-seq': '#FF5722', 'Smart-seq3': '#9C27B0', 'scGRO-seq': '#3F51B5'
            },
            3: {
                'Blood': '#FFA726', 'Brain': '#66BB6A', 'Cell': '#42A5F5', 'Embryo': '#FF7043',
                'MLS 1765-92(Liposarcoma)': '#8D6E63', 'PBMC': '#EC407A', 'H9(Human embryonic stem cell)': '#AB47BC',
                'Heart': '#EF5350', 'CD8+ T': '#7E57C2', 'Ovary': '#F06292', 'Lymph Node': '#26A69A',
                'Liver': '#26C6DA', 'MCF7': '#FFCA28', 'T-47D(Breast ductal carcinoma)': '#FFEE58',
                'Bone marrow': '#D4E157', 'Retinal': '#9CCC65', 'Breast': '#FFB74D', 'Lung': '#4DB6AC',
                'Dermal Fibroblast': '#BA68C8', 'HEK293T (Human embryonic kidney)': '#4FC3F7',
                'GM12878(B-lymphoblastoid)': '#7986CB', 'HCT116(Colorectal carcinoma)': '#F48FB1',
                'Skeletal Muscle': '#A1887F', 'CRL2097(Prostate carcinoma)': '#90A4AE', 'Pancreas': '#AED581',
                'Testis': '#FFF176', 'Peripheral blood': '#E57373', 'Mammary': '#FF9800', 'Thymus': '#8BC34A',
                'Kidney': '#00BCD4', 'Dorsal root ganglion': '#9C27B0', 'Germinal center B cell': '#3F51B5',
                'Embryonic stem cells': '#E91E63', 'Embryonic fibroblast': '#607D8B', 'Kidney marrow': '#009688',
                'Spleen': '#FF9800', 'CD4+ T': '#7E57C2', 'Embryonic stem cell': '#E91E63', 'Others': '#CCCCCC'
            },
            4: {
                'Others': '#CCCCCC', 'Neuron': '#FF6B6B', 'Astrocyte': '#4ECDC4', 'Oligodendrocyte': '#45B7D1',
                'Stem cell': '#96CEB4', 'Embryonic stem cell': '#FFA726', 'Fibroblast': '#BA68C8',
                'Memory B cell': '#FFA726', 'Naive B cell': '#FFB74D', 'Plasmablast': '#FFD54F',
                'Transitional stage B cell': '#FFF176', 'CD8-positive, alpha-beta T cell': '#AED581',
                'CD4 T cells': '#81C784', 'CD4+ T': '#81C784', 'Gamma-delta T cell': '#4DB6AC',
                'Naive CD4+ T cell': '#4DD0E1', 'Resting B cell': '#4FC3F7', 'Plasma cells': '#7986CB',
                'Hematopoietic cell line': '#9575CD', 'Multiple myeloma': '#BA68C8', 'Immune cell': '#F06292',
                'Microglia': '#EC407A', 'Macrophage': '#E57373', 'Neural stem cell derived from human induced pluripotent stem': '#66BB6A',
                'Olfactory projection neuron': '#9CCC65', 'Oligodendrocytes': '#42A5F5', 'Oligodendrocyte Precursor Cell': '#42A5F5',
                'Astrocytes': '#4ECDC4', 'Neurons': '#FF6B6B', 'Endothelial': '#EF5350', 'Hybrid': '#AB47BC',
                'Fetal_quiescent': '#EC407A', 'Fetal_replicating': '#E91E63', 'Dopamine neuron': '#FF5722',
                'Glutamatergic progenitors': '#FF9800', 'Cortical cells': '#FFB74D', 'GABAergic': '#FFD54F',
                'Glutamatergic 2': '#FFF176', 'Glutamatergic 1': '#E6EE9C', 'Cajal Retzius': '#C0CA33',
                'CGE-derived': '#AFB42B', 'VZ-derived': '#9E9D24', 'Neural progenitor cell': '#827717',
                'Hypothalamic neuronal cell': '#5D4037', 'Dorsal root ganglion neuron': '#6D4C41',
                'Human preimplantation blastomere': '#FF7043', 'Oocyte': '#D7CCC8', 'Pronucleus': '#BCAAA4',
                'Zygote': '#A1887F', '2-cell blastomere': '#8D6E63', '4-cell blastomere': '#795548',
                '8-cell blastomere': '#6D4C41', 'Morula': '#5D4037', 'Blastocyst': '#4E342E', 'MII oocyte': '#3E2723',
                'Alpha': '#FF6B6B', 'Beta': '#4ECDC4', 'Delta': '#45B7D1', 'Pp': '#96CEB4', 'Duct': '#FFA726',
                'Acinar': '#BA68C8', 'Islet': '#26A69A', 'Ductal': '#26C6DA', 'Mesenchymal': '#EF5350',
                'MCF7': '#FFCA28', 'HCT116(Colorectal carcinoma)': '#F48FB1', 'Primary breast cancer': '#E57373',
                'Metastatic breast cancer': '#EF5350', 'Neoplastic': '#E91E63', 'Primary cell': '#90A4AE',
                'HEK293T': '#4FC3F7', 'GM12878': '#7986CB', 'C2C12': '#9575CD', 'Mouse embryonic fibroblast': '#BA68C8',
                'Human Skeletal Muscle Myoblasts (HSMM)': '#A1887F', 'Primary foreskin fibroblast cells': '#90A4AE',
                'Spermatogonial Stem Cells': '#FFF176', 'Cardiomyocytes': '#EF5350', 'Testicular cells': '#FFD54F',
                'Hepatoblast/hepatocyte': '#81C784', 'Cholangiocyte': '#4DB6AC', 'Medullary thymic epithelial cell': '#4DD0E1',
                'Vip Mybpc1': '#FF6B6B', 'Vip Cxcl14_Car4': '#4ECDC4', 'L4 Sparcl1': '#45B7D1', 'Vip Chat': '#96CEB4',
                'L2/3 Otof': '#FFA726', 'L2 Ngb': '#BA68C8', 'Pvalb Gpx3': '#26A69A', 'Ndnf Cxcl14': '#26C6DA',
                'Vip Gpc3': '#EF5350', 'Vip Sncg': '#EC407A', 'L5a Batf3': '#AB47BC', 'Endo Myl9': '#7E57C2',
                'Ndnf Car4': '#42A5F5', 'L4 Scnn1a': '#66BB6A', 'Astro Gja1': '#9CCC65', 'Sst Myh8': '#8BC34A',
                'Sst Chodl': '#7CB342', 'Sst Th': '#689F38', 'Sst Tacstd2': '#558B2F', 'Sncg': '#33691E',
                'Sst Cdk6': '#64DD17', 'L5a Syt17': '#00C853', 'Pvalb Wt1': '#00E676', 'L6a Mgp': '#76FF03',
                'Endo Tbc1d4': '#B2FF59', 'L6b Trh': '#CCFF90', 'L6b Mup5': '#F4FF81', 'L4 Arf5': '#FFFF8D',
                'L5 Hsd11b1': '#FFE57F', 'Pvalb Tacr3': '#FFD740', 'L5a Fam5c': '#FFC400', 'Sst Cbln4': '#FFAB00',
                'Micro Ctss': '#FF9100', 'Igtp': '#FF6D00', 'Pvalb Cpne5': '#FF5722', 'Pvalb Rspo2': '#E65100',
                'OPC/Oligo': '#BF360C', 'Cd34': '#3E2723', 'Oligo Opalin': '#212121', 'Pvalb Tpbg': '#263238',
                'L6a Plcxd3': '#37474F', 'L6 Syt17': '#455A64', 'L6 Car12': '#546E7A', 'OPC Pdgfra': '#607D8B',
                'Pvalb Obox3': '#78909C', 'L5b Samd3': '#90A4AE', 'L5 Ucma': '#B0BEC5', 'L5 Chrna6': '#CFD8DC',
                'L5b Cdh13': '#ECEFF1', 'L6a Syt17': '#FF6B6B', 'L6a Car12': '#4ECDC4', 'P0': '#FF6B6B',
                'Tossed': '#4ECDC4', 'AB': '#45B7D1', 'P1': '#96CEB4', 'EMS': '#FFA726', 'ABa': '#BA68C8',
                'ABp': '#26A69A', 'P2': '#26C6DA', 'ABpl': '#EF5350', 'ABal': '#EC407A', 'ABar': '#AB47BC',
                'ABpr': '#7E57C2', 'MS': '#42A5F5', 'C': '#66BB6A', 'E': '#9CCC65', 'P3': '#8BC34A',
                'ABplx': '#7CB342', 'ABprx': '#689F38', 'ABarx': '#558B2F', 'ABalx': '#33691E', 'MSx1': '#64DD17',
                'MSx2': '#00C853', 'Cx2': '#00E676', 'Ea': '#76FF03', 'Ep': '#B2FF59', 'Cx1': '#CCFF90',
                'P4': '#F4FF81', 'D': '#FFFF8D', 'Cranial Neural Crest Cells': '#FF6B6B', 'Chicken primitive streak cell': '#4ECDC4',
                'Chicken surrounding region cell': '#45B7D1', 'Chicken epiblast cell': '#96CEB4'
            }
        };

        if (depth <= 4 && colorSchemes[depth] && colorSchemes[depth][name]) {
            return colorSchemes[depth][name];
        }

        const fallbackColors = [
            '#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFA726', '#BA68C8',
            '#26A69A', '#26C6DA', '#EF5350', '#EC407A', '#AB47BC', '#7E57C2',
            '#42A5F5', '#66BB6A', '#9CCC65', '#8BC34A', '#7CB342', '#689F38',
            '#558B2F', '#33691E', '#64DD17', '#00C853', '#00E676', '#76FF03'
        ];

        const index = Math.abs(name.split('').reduce((a,b)=>{a=((a<<5)-a)+b.charCodeAt(0);return a&a},0)) % fallbackColors.length;
        return fallbackColors[index];
    }

    var paths = [
        ["Homo sapiens", "Smart-seq2", "Embryo", "Others"],
        ["Homo sapiens", "Smart-seq2", "MLS 1765-92(Liposarcoma)", "Others"],
        ["Homo sapiens", "Smart-seq2", "PBMC", "Memory B cell"],
        ["Homo sapiens", "Smart-seq2", "PBMC", "Naive B cell"],
        ["Homo sapiens", "Smart-seq2", "PBMC", "Plasmablast"],
        ["Homo sapiens", "Smart-seq2", "PBMC", "Transitional stage B cell"],
        ["Homo sapiens", "Smart-seq2", "H9(Human embryonic stem cell)", "Embryonic stem cell"],
        ["Homo sapiens", "Smart-seq2", "Heart", "Fibroblast of dermis"],
        ["Homo sapiens", "Smart-seq2", "CD8+ T", "CD8-positive, alpha-beta T cell"],
        ["Homo sapiens", "Smart-seq2", "Ovary", "Others"],
        ["Homo sapiens", "Smart-seq2", "Lymph Node", "Cord blood CD34+ haemopoietic stem and progenitor cells"],
        ["Homo sapiens", "Smart-seq", "Liver", "HuH-1"],
        ["Homo sapiens", "Smart-seq", "Liver", "HuH-7"],
        ["Homo sapiens", "SMARTer", "Heart", "Foreskin Human Fibroblasts"],
        ["Homo sapiens", "Smart-seq2", "Spleen", "PBMC"],
        ["Homo sapiens", "SMARTer", "MCF7", "MCF7"],
        ["Homo sapiens", "SMARTer", "T-47D(Breast ductal carcinoma)", "Others"],
        ["Homo sapiens", "SMARTer", "Bone marrow", "Multiple myeloma"],
        ["Homo sapiens", "SMARTer", "Retinal", "Others"],
        ["Homo sapiens", "Smart-seq2", "Bone marrow", "Hematopoietic cell line"],
        ["Homo sapiens", "Smart-seq2", "Breast", "Others"],
        ["Homo sapiens", "SMARTer", "Bone marrow", "Plasma cells"],
        ["Homo sapiens", "Smart-seq2", "Lung", "Others"],
        ["Homo sapiens", "Smart-seq2", "Lymph Node", "Others"],
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
        ["Homo sapiens", "SMARTer", "Lung", "Others"],
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
        ["Homo sapiens", "SUPeR-Seq", "Embryo", "Others"],
        ["Homo sapiens", "Smart-seq2", "Pancreas", "Others"],
        ["Homo sapiens", "Smart-seq2", "Pancreas", "Alpha"],
        ["Homo sapiens", "Smart-seq2", "Pancreas", "Delta"],
        ["Homo sapiens", "Smart-seq2", "Pancreas", "Pp"],
        ["Homo sapiens", "Smart-seq2", "Pancreas", "Duct"],
        ["Homo sapiens", "Smart-seq2", "Pancreas", "Acinar"],
        ["Homo sapiens", "Smart-seq2", "Pancreas", "Beta"],
        ["Homo sapiens", "Smart-seq2", "Pancreas", "Islet"],
        ["Homo sapiens", "SMARTer", "Breast", "Others"],
        ["Homo sapiens", "Smart-seq2", "Heart", "In vivo single Tcell"],
        ["Homo sapiens", "Smart-seq2", "Heart", "Others"],
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
        ["Homo sapiens", "SMARTer", "Brain", "Others"],
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
        ["Mus musculus", "Tang", "Brain", "Others"],
        ["Mus musculus", "Smart-seq", "Brain", "Hypothalamic neuronal cell"],
        ["Mus musculus", "Smart-seq2", "Heart", "Cardiomyocytes"],
        ["Mus musculus", "SMARTer", "Testis", "Testicular cells"],
        ["Mus musculus", "SMARTer", "Pancreas", "Others"],
        ["Mus musculus", "SMARTer", "Germinal center B cell", "Others"],
        ["Mus musculus", "Smart-seq2", "Pancreas", "Acinar"],
        ["Mus musculus", "Smart-seq2", "Retinal", "Others"],
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
        ["Mus musculus", "SMARTer", "Liver", "Others"],
        ["Mus musculus", "SMARTer", "Lung", "Mesenchymal cells"],
        ["Mus musculus", "SMARTer", "Brain", "Glutamatergic progenitors"],
        ["Mus musculus", "Smart-seq2", "Liver", "Others"],
        ["Mus musculus", "Smart-seq2", "Lung", "Others"],
        ["Mus musculus", "Smart-seq2", "Mammary", "Others"],
        ["Mus musculus", "Smart-seq2", "Bone marrow", "Others"],
        ["Mus musculus", "Smart-seq2", "Pancreas", "Others"],
        ["Mus musculus", "Smart-seq2", "Spleen", "Others"],
        ["Mus musculus", "Smart-seq2", "Thymus", "Others"],
        ["Mus musculus", "Smart-seq2", "Heart", "Others"],
        ["Mus musculus", "Smart-seq2", "Kidney", "Others"],
        ["Mus musculus", "SMARTer", "Brain", "Others"],
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
        ["Mus musculus", "SMARTer", "Embryo", "Others"],
        ["Mus musculus", "Smart-seq2", "Embryonic fibroblast", "C2C12"],
        ["Mus musculus", "Smart-seq2", "Embryonic fibroblast", "Mouse embryonic fibroblast"],
        ["Mus musculus", "SMARTer", "Lung", "Others"],
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
        ["Mus musculus", "SMARTer", "Kidney", "Others"],
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
        ["Mus musculus", "SMARTer", "Lymph Node", "Others"],
        ["Mus musculus", "Smart-seq2", "Brain", "VPM-only"],
        ["Mus musculus", "Smart-seq2", "Brain", "VPM/POm"],
        ["Mus musculus", "Smart-seq3", "Brain", "Th-eGFP+ sorted dopaminergic neuron"],
        ["Mus musculus", "SMARTer", "Spleen", "Naive CD4+ T cell"],
        ["Mus musculus", "SMARTer", "Spleen", "Resting B cell"],
        ["Mus musculus", "Smart-seq2", "Brain", "Others"],
        ["Mus musculus", "Smart-seq2", "Embryo", "Others"],
        ["Mus musculus", "SMARTer", "Embryo", "Blastoderm cell"],
        ["Mus musculus", "SMARTer", "Lymph Node", "Gamma-delta T cell"],

        //fly
        ["Drosophila melanogaster", "Smart-seq2", "Brain", "Astrocyte"],
        ["Drosophila melanogaster", "Smart-seq2", "Brain", "Others"],
        ["Drosophila melanogaster", "Smart-seq2", "Brain", "Neuron"],
        ["Drosophila melanogaster", "Smart-seq2", "Brain", "Olfactory projection neuron"],
        ["Drosophila melanogaster", "Smart-seq2", "Brain", "Olfactory projection neuron innervating DA1, VA1d, or DC3 glomerulus"],
        ["Drosophila melanogaster", "Smart-seq2", "Brain", "Olfactory projection neuron innervating VM2 glomerulus"],
        ["Drosophila melanogaster", "Smart-seq2", "Brain", "Olfactory projection neuron innvervating DC2 glomerulus"],
        //fish
        ["Danio rerio", "Smart-seq2", "Brain", "10 days post fertilization habenula"],
        ["Danio rerio", "Smart-seq2", "Kidney marrow", "Others"],
        //chiken
        ["Gallus gallus", "Smart-seq2", "Embryo", "Chicken epiblast cell"],
        ["Gallus gallus", "Smart-seq2", "Embryo", "Chicken primitive streak cell"],
        ["Gallus gallus", "Smart-seq2", "Embryo", "Chicken surrounding region cell"],
        ["Gallus gallus", "Smart-seq2", "Embryo", "Cranial Neural Crest Cells"],
        //worm
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "AB"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABa"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABal"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABalx"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABar"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABarx"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABp"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABpl"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABplx"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABpr"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "ABprx"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "C"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "Cx1"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "Cx2"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "D"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "E"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "EMS"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "Ea"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "Ep"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "MS"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "MSx1"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "MSx2"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "P0"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "P1"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "P2"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "P3"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "P4"],
        ["Caenorhabditis elegans", "SMARTer", "Embryo", "Tossed"]
    ];

    function addPath(root, path) {
        let node = root;
        let currentPathId = '';
        for (let i = 0; i < path.length; i++) {
            let name = path[i];
            currentPathId += (i === 0 ? name : '||' + name); // 拼接完整路径作为唯一 ID

            if (!node.children) node.children = [];
            let child = node.children.find(n => n.name.toLowerCase() === name.toLowerCase());

            if (!child) {
                child = {
                    id: currentPathId, // 绑定唯一 ID
                    name: name,
                    nameLower: name.toLowerCase(),
                    depth: i + 1,
                    itemStyle: { color: getColorByDepth(i + 1, name) }
                };
                if (i === path.length - 1) child.value = 1;
                node.children.push(child);
            }
            node = child;
        }
    }

    // 初始渲染时加载所有数据
    let initialRoot = { children: [] };
    paths.forEach(p => addPath(initialRoot, p));
    let initialData = initialRoot.children;

    function calculateValues(nodes) {
        if (!nodes || nodes.length === 0) return 0;
        nodes.forEach(node => {
            if (node.children && node.children.length > 0) {
                node.value = calculateValues(node.children);
            }
        });
        return nodes.reduce((sum, node) => sum + (node.value || 0), 0);
    }
    calculateValues(initialData);

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
            text: 'Species / Technology / Tissue type / Cell type / Sample Distribution',
            left: 'center', top: '0%',
            textStyle: { color: '#0362a4', fontSize: 16, fontWeight: 'bold', width: 320, overflow: 'break' }
        },
        tooltip: { trigger: 'item', formatter: formatTooltip, textStyle: { fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif' } },
        series: [{
            type: 'sunburst',
            data: initialData, // 我们始终保留全量数据，不再替换它！
            radius: [0, '95%'],
            sort: null,
            emphasis: { focus: 'ancestor', itemStyle: { shadowBlur: 10, shadowColor: 'rgba(0,0,0,0.5)' }, label: { show: true, formatter: '{b}', color: '#000', textBorderColor: '#fff', textBorderWidth: 3, backgroundColor: 'rgba(255, 255, 255, 0.95)', padding: [4, 8], borderRadius: 4, fontSize: 14, fontWeight: 'bold' } },
            nodeClick: 'rootToNode',
            label: { show: true, formatter: '{b}', color: 'transparent', textBorderColor: 'transparent', backgroundColor: 'transparent', rotate: 'radial' },
            levels: [ {}, { r0: '10%', r: '25%', label: { rotate: 0 } }, { r0: '25%', r: '45%' }, { r0: '45%', r: '65%' }, { r0: '65%', r: '85%' }, { r0: '85%', r: '95%' } ]
        }]
    };
    myChart.setOption(option);

    // ==============================================================
    // API 调用区
    // ==============================================================
    function processAjaxOptions(res) {
        return res.map(t => {
            let display = (t === 'NA' || t === 'na' || t === null || t === '') ? 'Others' : t;
            let val = (t === null || t === '') ? 'NA' : t;
            return `<option value="${val}">${display}</option>`;
        }).join('');
    }

    function autoselect_tech(Species) {
        return new Promise((resolve, reject) => {
            if (!Species) return reject();
            $.ajax({ url: '../../api/auto_select_tech.php', type: 'post', dataType: 'json', data: { 'select_specie': Species }, success: function (res) { $('#Tech').html(processAjaxOptions(res)).selectpicker('refresh'); resolve(); }, error: reject });
        });
    }

    function autoselect_tissue(Species, Techtype) {
        return new Promise((resolve, reject) => {
            if (!Species || !Techtype) return reject();
            $.ajax({ url: '../../api/auto_select_tissue.php', type: 'post', dataType: 'json', data: { 'select_specie': Species, 'select_experiment': Techtype }, success: function (res) { $('#Tissue').html(processAjaxOptions(res)).selectpicker('refresh'); resolve(); }, error: reject });
        });
    }

    function autoselect_cell(Species, Techtype, Tissuetype) {
        return new Promise((resolve, reject) => {
            if (!Species || !Techtype || !Tissuetype) return reject();
            $.ajax({ url: '../../api/auto_select_cell1.php', type: 'post', dataType: 'json', data: { 'select_specie': Species, 'select_experiment': Techtype, 'select_tissue': Tissuetype }, success: function (res) { $('#Cell').html(processAjaxOptions(res)).selectpicker('refresh'); resolve(); }, error: reject });
        });
    }

    function autoselect_sample(Species, Techtype, Tissuetype, Celltype) {
        return new Promise((resolve, reject) => {
            if (!Species || !Techtype || !Tissuetype || !Celltype) return reject();
            $.ajax({ url: '../../api/auto_select_sample.php', type: 'post', dataType: 'json', data: { 'select_specie': Species, 'select_experiment': Techtype, 'select_tissue': Tissuetype, 'select_cell': Celltype }, success: function (res) { $('#Sample').html(processAjaxOptions(res)).selectpicker('refresh'); resolve(); }, error: reject });
        });
    }

    // ==============================================================
    // 【修改点2】：新增全局焦点追踪器与动态视口联动函数
    // 抛弃以前的数据截断，现在采用 ECharts 原生视口切换来保持层级关系
    // ==============================================================
    let currentChartRootId = ''; // 用于记录图表当前的中心点

    function syncChartWithDropdowns() {
        const species = $("#Spe").val();
        const tech = $("#Tech").val();
        const tissue = $("#Tissue").val();
        const cell = $("#Cell").val();
        const sample = $("#Sample").val();

        let targetPath = [];
        if (species) targetPath.push(species === 'NA' ? 'Others' : species);
        if (tech) targetPath.push(tech === 'NA' ? 'Others' : tech);
        if (tissue) targetPath.push(tissue === 'NA' ? 'Others' : tissue);
        if (cell) targetPath.push(cell === 'NA' ? 'Others' : cell);
        if (sample) targetPath.push(sample === 'NA' ? 'Others' : sample);

        if (targetPath.length > 0) {
            let targetId = targetPath.join('||');
            currentChartRootId = targetId;
            // 指挥图表：原生放大到对应的路径
            myChart.dispatchAction({ type: 'sunburstRootToNode', targetNodeId: targetId });
        } else {
            currentChartRootId = '';
            // 指挥图表：回退到最顶层
            myChart.dispatchAction({ type: 'sunburstRootToNode' });
        }
    }

    $(function () {
        $("#reset").click(function () { window.location.reload(); });

        $("#Spe").on("change", function () {
            $('#Tech').html('').selectpicker('refresh');
            $('#Tissue').html('').selectpicker('refresh');
            $('#Cell').html('').selectpicker('refresh');
            $('#Sample').html('').selectpicker('refresh');
            const species = $(this).val();
            if (species) {
                autoselect_tech(species).then(() => syncChartWithDropdowns());
            } else syncChartWithDropdowns();
        });

        $("#Tech").on("change", function () {
            $('#Tissue').html('').selectpicker('refresh');
            $('#Cell').html('').selectpicker('refresh');
            $('#Sample').html('').selectpicker('refresh');
            const species = $("#Spe").val();
            const tech = $(this).val();
            if (species && tech) {
                autoselect_tissue(species, tech).then(() => syncChartWithDropdowns());
            } else syncChartWithDropdowns();
        });

        $("#Tissue").on("change", function () {
            $('#Cell').html('').selectpicker('refresh');
            $('#Sample').html('').selectpicker('refresh');
            const species = $("#Spe").val();
            const tech = $("#Tech").val();
            const tissue = $(this).val();
            if (species && tech && tissue) {
                autoselect_cell(species, tech, tissue).then(() => syncChartWithDropdowns());
            } else syncChartWithDropdowns();
        });

        $("#Cell").on("change", function () {
            $('#Sample').html('').selectpicker('refresh');
            const species = $("#Spe").val();
            const tech = $("#Tech").val();
            const tissue = $("#Tissue").val();
            const cell = $(this).val();
            if (species && tech && tissue && cell) {
                autoselect_sample(species, tech, tissue, cell).then(() => syncChartWithDropdowns());
            } else syncChartWithDropdowns();
        });

        $("#Sample").on("change", function () {
            syncChartWithDropdowns();
        });

        // ==============================================================
        // 【修改点3】：智能识别点击中心（返回上级）与 点击扇区（下钻）
        // ==============================================================
        myChart.on('click', async function (params) {
            let rawNames = params.treePathInfo.map(item => item.name).filter(Boolean);
            let clickedNodeId = rawNames.join('||');

            // 判断用户意图：如果点击的目标就是当前中心点，代表“返回上一级”
            if (clickedNodeId === currentChartRootId) {
                rawNames.pop(); // 弹出最后一级，模拟返回父级
                currentChartRootId = rawNames.join('||');
            } else {
                currentChartRootId = clickedNodeId; // 用户正常下钻
            }

            const mappedNames = rawNames.map(n => n === 'Others' ? 'NA' : n);
            const [species, tech, tissue, cell, sample] = mappedNames;

            try {
                if (!species) {
                    // 退到了最外层的空白，彻底清空所有
                    $("#Spe").val('').selectpicker('refresh');
                    $("#Tech").html('').selectpicker('refresh');
                    $("#Tissue").html('').selectpicker('refresh');
                    $("#Cell").html('').selectpicker('refresh');
                    $("#Sample").html('').selectpicker('refresh');
                    return;
                }

                // 1. 恢复 Species，并拉取对应的 Tech 选项
                $("#Spe").val(species).selectpicker('refresh');
                await autoselect_tech(species);

                if (!tech) {
                    // 停留在 Species 层：Tech 只留选项不选中，清空更深层
                    $("#Tech").val('').selectpicker('refresh');
                    $("#Tissue").html('').selectpicker('refresh');
                    $("#Cell").html('').selectpicker('refresh');
                    $("#Sample").html('').selectpicker('refresh');
                    return;
                }

                // 2. 恢复 Tech，并拉取对应的 Tissue 选项
                $("#Tech").val(tech).selectpicker('refresh');
                await autoselect_tissue(species, tech);

                if (!tissue) {
                    // 停留在 Tech 层：Tissue 只留选项不选中，清空更深层
                    $("#Tissue").val('').selectpicker('refresh');
                    $("#Cell").html('').selectpicker('refresh');
                    $("#Sample").html('').selectpicker('refresh');
                    return;
                }

                // 3. 恢复 Tissue，并拉取对应的 Cell 选项
                $("#Tissue").val(tissue).selectpicker('refresh');
                await autoselect_cell(species, tech, tissue);

                if (!cell) {
                    // 停留在 Tissue 层：Cell 只留选项不选中，清空更深层
                    $("#Cell").val('').selectpicker('refresh');
                    $("#Sample").html('').selectpicker('refresh');
                    return;
                }

                // 4. 恢复 Cell，并拉取对应的 Sample 选项
                $("#Cell").val(cell).selectpicker('refresh');
                await autoselect_sample(species, tech, tissue, cell);

                if (!sample) {
                    // 停留在 Cell 层：Sample 只留选项不选中
                    $("#Sample").val('').selectpicker('refresh');
                    return;
                }

                // 5. 恢复 Sample
                $("#Sample").val(sample).selectpicker('refresh');

            } catch (error) {
                console.error("图表联动下拉框时发生错误", error);
            }
        });
    });

    function populateExamples() {
        var species = 'Mus musculus';
        $('#Spe').selectpicker('val', species);
        autoselect_tech(species).then(() => {
            var tech = 'Smart-seq2';
            $('#Tech').selectpicker('val', tech);
            return autoselect_tissue(species, tech);
        }).then(() => {
            var tissue = 'Brain';
            $('#Tissue').selectpicker('val', tissue);
            return autoselect_cell(species, tech, tissue); // 修复了这里的拼写错漏
        }).then(() => {
            var cell = 'VPM-only';
            $('#Cell').selectpicker('val', cell);
            return autoselect_sample(species, 'Smart-seq2', 'Brain', cell);
        }).then(() => {
            var sample = 'SRR6340206';
            $('#Sample').selectpicker('val', sample);
            syncChartWithDropdowns(); // 最后推送到图表实现视角转移
        });
    }

    function Turn() {
        var species = $("#Spe").val();
        var techtype = $("#Tech").val();
        var tissue = $("#Tissue").val();
        var cell = $("#Cell").val();
        var sample = $("#Sample").val();
        if(!sample) { alert("Please complete all selections to search!"); return; }
        parent.location.href = '../../sample_result.php?Species=' + encodeURIComponent(species) + '&Tech=' + encodeURIComponent(techtype) + '&Tissue=' + encodeURIComponent(tissue) + '&Cell=' + encodeURIComponent(cell) + '&Sample=' + encodeURIComponent(sample);
    }

    function Turn2() {
        var species = $("#Spe").val();
        var techtype = $("#Tech").val();
        var tissue = $("#Tissue").val();
        var cell = $("#Cell").val();
        var sample = $("#Sample").val();
        if(!sample) { alert("Please complete all selections to search!"); return; }
        parent.location.href = '../../sample_SE_result.php?Species=' + encodeURIComponent(species) + '&Tech=' + encodeURIComponent(techtype) + '&Tissue=' + encodeURIComponent(tissue) + '&Cell=' + encodeURIComponent(cell) + '&Sample=' + encodeURIComponent(sample);
    }
</script>

</body>
</html>