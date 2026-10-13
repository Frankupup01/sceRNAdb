<?php
include "./templates/base.php";
?>

<style>
    #experiments_wrapper {
        background-color: transparent !important;
    }

    /* Define the classes to be used in the table */
    .stripe-1 {
        background-color: #ffffff !important;
    }

    .stripe-2 {
        background-color: #ffffff !important;
    }
</style>

<body id="body">
<?php
include "./templates/header.php";
?>

<div class="container" id="body">
    <div class="row">
        <div class="col-lg-12">
            <br>
        </div>
    </div>

    <div class="row flex-xl-nowrap">
        <div class="col-lg-3 bd-sidebar" style="margin-top: 10px;padding-left: 85px; ">
            <nav class="bd-links" style="background-color: white">

                <table class='fenye table-bordered filter-block' id="Dataset_Type_" style="display: none; width: 100%; max-width: 100%; overflow-x: auto; table-layout: auto; margin-top: 79px;">
                    <thead style="background-color: #286ea7;">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center;font-size: 23px; ">Dataset</h4>
                                <a href="./browse_sample.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none"><path fill="#eab308" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z" opacity=".16"/><path stroke="#eab308" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2zM15 10l-4 4m0-4l4 4"/></g></svg>
                                </a>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <table class='fenye table-bordered filter-block'  id="Species_" style="display: none;width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center;font-size: 23px; ">Species</h4>
                                <a href="./browse_sample.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none"><path fill="#eab308" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z" opacity=".16"/><path stroke="#eab308" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2zM15 10l-4 4m0-4l4 4"/></g></svg>
                                </a>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody style="background-color: white">
                    </tbody>
                </table>

                <table class='fenye table-bordered filter-block' id="Tissue_Type_" style="display: none;width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center;font-size: 23px; ">Tissue/Cell line</h4>
                                <a href="./browse_sample.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none"><path fill="#eab308" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z" opacity=".16"/><path stroke="#eab308" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2zM15 10l-4 4m0-4l4 4"/></g></svg>
                                </a>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody style="background-color: white">
                    </tbody>
                </table>

                <table class='fenye table-bordered filter-block' id="Cell_Type_" style="display: none;width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center;font-size: 23px; ">Cell Type</h4>
                                <a href="./browse_sample.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none"><path fill="#eab308" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z" opacity=".16"/><path stroke="#eab308" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2zM15 10l-4 4m0-4l4 4"/></g></svg>
                                </a>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody style="background-color: white">
                    </tbody>
                </table>

                <table class='fenye table-bordered filter-block' id="Disease_Type_" style="display: none;width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center;font-size: 23px; ">Disease</h4>
                                <a href="./browse_sample.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none"><path fill="#eab308" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z" opacity=".16"/><path stroke="#eab308" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2zM15 10l-4 4m0-4l4 4"/></g></svg>
                                </a>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <table class='fenye table-bordered filter-block' id="Platform_" style="display: none;width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center;font-size: 23px; ">Technology</h4>
                                <a href="./browse_sample.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none"><path fill="#eab308" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z" opacity=".16"/><path stroke="#eab308" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2zM15 10l-4 4m0-4l4 4"/></g></svg>
                                </a>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <ul class="pagination" id="Platform__ul"></ul>
            </nav>
        </div>

        <div class="col-lg-9 bd-content" id="bd-content;" style="padding-right: 100px;">
            <hr>
            <table id="experiments" class="table table-hover table-bordered " style="vertical-align: middle;width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                <thead style="vertical-align: middle;font-size: 18px;">
                <tr>
                    <th>Dataset ID</th>
                    <th>Sample ID</th>
                    <th>Species</th>
                    <th>Tissue</th>
                    <th>Technology</th>
                    <th>Platform</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="row">
        <br><br>
        <div id="dataset-dropdown"></div>
        <br><br>
        <div id="species-dropdown"></div>
        <br><br>
        <div id="tissue-dropdown"></div>
        <br><br>
        <div id="cell-dropdown"></div>
        <br><br>
        <div id="disease-dropdown"></div>
        <br><br>
        <div id="treatment-dropdown"></div>
        <br><br>
        <div id="technology-dropdown"></div>
    </div>
</div>

<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let select_dataset = params.get("selectedOption_Dataset");
    let select_specie = params.get("selectedOption_Species");
    let select_tissue = params.get("selectedOption_Tissue");
    let select_cell = params.get("selectedOption_Cell");
    let select_disease = params.get("selectedOption_Disease");
    let select_treatment = params.get("selectedOption_Treatment");
    let select_experiment = params.get("selectedOption_Experiment");
</script>

<script>
    // ==========================================
    // ✨ 核心黑科技 1：全局智能首字母大写转换器
    // ==========================================
    function capitalizeText(str) {
        if (!str) return 'N/A';
        return String(str)
            .toLowerCase()
            .replace(/\b\w/g, function(char) { return char.toUpperCase(); })
            .replace(/Rna\b/g, 'RNA')  // 保护专有名词
            .replace(/Dna\b/g, 'DNA')
            .replace(/Seq\b/g, 'Seq');
    }

    // ==========================================
    // ✨ 核心黑科技 2：专有技术名词矫正器
    // ==========================================
    function formatTechText(str) {
        if (!str) return 'N/A';
        // 专门狙击 SUPeR-Seq，将其精确替换为 SUPeR-seq
        return String(str).replace(/SUPeR-Seq/ig, 'SUPeR-seq');
    }

    var filter_dataset;
    var filter_species;
    var filter_tissue;
    var filter_cell;
    var filter_disease;
    var filter_treatment;
    var filter_technology;

    $(document).ready(function() {
        var data_Species_;

        $.ajax({
            url: './api/filter_return_sample.php',
            method: 'POST',
            data: {
                select_dataset:select_dataset,
                select_specie: select_specie,
                select_tissue:select_tissue,
                select_cell:select_cell,
                select_disease:select_disease,
                select_treatment:select_treatment,
                select_experiment: select_experiment
            },
            success: function(response) {
                const filter_data = JSON.parse(response);

                delete filter_data.CellType['NA'];
                delete filter_data.Disease['NA'];

                filter_dataset = filter_data.DatasetID;
                filter_technology = filter_data.Technology;
                filter_species = filter_data.Species;
                filter_tissue = filter_data.Tissue;
                filter_cell = filter_data.CellType;
                filter_disease = filter_data.Disease;

                $('.filter-block').show();

                function sortByValueDescending(data) {
                    const entries = Object.entries(data);
                    entries.sort((a, b) => b[1] - a[1]);
                    return Object.fromEntries(entries);
                }

                const customOrder = ["Homo sapiens", "Mus musculus", "Drosophila melanogaster", "Danio rerio", "Gallus gallus", "Caenorhabditis elegans"];

                function sortByCustomOrder(data, order) {
                    const entries = Object.entries(data);
                    entries.sort((a, b) => order.indexOf(a[0]) - order.indexOf(b[0]));
                    return Object.fromEntries(entries);
                }

                const sortedSpecies = sortByCustomOrder(filter_species, customOrder);
                const sortedTechnology = sortByValueDescending(filter_technology);
                const sortedTissue = sortByValueDescending(filter_tissue);
                const sortedCell = sortByValueDescending(filter_cell);
                const sortedDisease = sortByValueDescending(filter_disease);
                const sortedDataset = sortByValueDescending(filter_dataset);

                data_Dataset_Type_ = formatDatasetData(sortedDataset);
                data_Species_ = formatSpeciesData(sortedSpecies);
                data_Tissue_Type_ = formatTissueData(sortedTissue);
                data_Cell_Type_ = formatCellData(sortedCell);
                data_Disease_Type_ = formatDiseaseData(sortedDisease);
                data_Experiment_Type_ = formatTechnologyData(sortedTechnology);

                initDataTable(data_Dataset_Type_,data_Species_,data_Tissue_Type_,data_Cell_Type_,data_Disease_Type_,data_Experiment_Type_);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });

        function initDataTable(dataset,species,tissue,cell,disease,experiment) {

            $('#Dataset_Type_').DataTable( {
                "processing": true,
                "paging": true,
                "pageLength": 6,
                "info": false,
                "searching": false,
                "lengthChange": false,
                "ordering": false,
                data:dataset
            } );

            if (select_dataset) {
                var activeButton_dataset = document.getElementById(select_dataset);
                if (activeButton_dataset) {
                    activeButton_dataset.style.backgroundColor = "#b09b9b";
                    activeButton_dataset.style.color = "#FFFFFF"
                }
            }

            $('#Species_').DataTable( {
                "processing": true,
                "paging": true,
                "pageLength": 7,
                "info": false,
                "searching": false,
                "lengthChange": false,
                "ordering": false,
                data:species
            } );

            if (select_specie) {
                var activeButton_specie = document.getElementById(select_specie);
                if (activeButton_specie) {
                    activeButton_specie.style.backgroundColor = "#b09b9b";
                    activeButton_specie.style.color = "#FFFFFF"
                }
            }

            $('#Cell_Type_').DataTable( {
                "processing": true,
                "paging": true,
                "pageLength": 6,
                "info": false,
                "searching": false,
                "lengthChange": false,
                "ordering": false,
                data:cell
            } );

            if (select_cell) {
                var activeButton_cell = document.getElementById(select_cell);
                if (activeButton_cell) {
                    activeButton_cell.style.backgroundColor = "#b09b9b";
                    activeButton_cell.style.color = "#FFFFFF"
                }
            }

            $('#Tissue_Type_').DataTable( {
                "processing": true,
                "paging": true,
                "pageLength": 6,
                "info": false,
                "searching": false,
                "lengthChange": false,
                "ordering": false,
                data:tissue
            } );

            if (select_tissue) {
                var activeButton_tissue = document.getElementById(select_tissue);
                if (activeButton_tissue) {
                    activeButton_tissue.style.backgroundColor = "#b09b9b";
                    activeButton_tissue.style.color = "#FFFFFF"
                }
            }

            $('#Disease_Type_').DataTable( {
                "processing": true,
                "paging": true,
                "pageLength": 6,
                "info": false,
                "searching": false,
                "lengthChange": false,
                "ordering": false,
                data:disease
            } );

            if (select_disease) {
                var activeButton_disease = document.getElementById(select_disease);
                if (activeButton_disease) {
                    activeButton_disease.style.backgroundColor = "#b09b9b";
                    activeButton_disease.style.color = "#FFFFFF"
                }
            }

            $('#Platform_').DataTable( {
                "processing": true,
                "paging": true,
                "pageLength": 10,
                "info": false,
                "searching": false,
                "lengthChange": false,
                "ordering": false,
                data:experiment
            } );

            if (select_experiment) {
                var activeButton_experimnet = document.getElementById(select_experiment);
                if (activeButton_experimnet) {
                    activeButton_experimnet.style.backgroundColor = "#b09b9b";
                    activeButton_experimnet.style.color = "#FFFFFF"
                }
            }
        }
    });
</script>

<script>
    function formatSpeciesData(speciesData) {
        var data_Species_ = [];
        Object.keys(speciesData).forEach(function(species) {
            var speciesCount = speciesData[species];
            var speciesName = species;
            var speciesID = species;

            if (species === 'Homo sapiens/Mus musculus') {
                speciesName = 'Homo / Mus';
            }

            // 🔴 开启大写格式化
            var displayTitle = capitalizeText(speciesName);
            var speciesHTML = "<a title='" + displayTitle + "' type='button' class='list-group-item' id='" + speciesID + "' data-name='" + speciesName + "' data-type='Species'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + speciesCount + "</span> " + displayTitle + "</a>";

            data_Species_.push([speciesHTML]);
        });
        return data_Species_;
    }

    function formatTissueData(tissueData) {
        var data_Tissue_ = [];
        Object.keys(tissueData).forEach(function(tissue) {
            var tissueCount = tissueData[tissue];
            var tissueID = tissue;
            // 🔴 开启大写格式化
            var displayTitle = capitalizeText(tissue);
            var tissueHTML = "<a title='" + displayTitle + "' type='button' class='list-group-item' id='" + tissueID + "' data-name='" + tissue + "' data-type='Tissue_Type'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + tissueCount + "</span> " + displayTitle + "</a>";
            data_Tissue_.push([tissueHTML]);
        });
        return data_Tissue_;
    }

    function formatCellData(cellData) {
        var data_Cell_ = [];
        Object.keys(cellData).forEach(function(cell) {
            var cellCount = cellData[cell];
            var cellID = cell;
            // 🔴 开启大写格式化
            var displayTitle = capitalizeText(cell);
            var cellHTML = "<a title='" + displayTitle + "' type='button' class='list-group-item' id='" + cellID + "' data-name='" + cell + "' data-type='Cell_Type'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + cellCount + "</span> " + displayTitle + "</a>";
            data_Cell_.push([cellHTML]);
        });
        return data_Cell_;
    }

    function formatTechnologyData(technologyData) {
        var data_Technology_ = [];
        Object.keys(technologyData).forEach(function(technology) {
            var technologyCount = technologyData[technology];
            var technologyID = technology;
            // 🔵 保护原样，但调用专门的技术修复拦截器以修正 SUPeR-Seq
            var displayTitle = formatTechText(technology);
            var technologyHTML = "<a title='" + displayTitle + "' type='button' class='list-group-item' id='" + technologyID + "' data-name='" + technology + "' data-type='Experiment_Type'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + technologyCount + "</span> " + displayTitle + "</a>";
            data_Technology_.push([technologyHTML]);
        });
        return data_Technology_;
    }

    function formatDatasetData(datasetData) {
        var data_Dataset_ = [];
        Object.keys(datasetData).forEach(function(dataset) {
            var datasetCount = datasetData[dataset];
            var datasetID = dataset;
            // 🔵 保护原样：Dataset ID 不需要首字母大写（如 GSE69405）
            var displayTitle = dataset;
            var datasetHTML = "<a title='" + displayTitle + "' type='button' class='list-group-item' id='" + datasetID + "' data-name='" + dataset + "' data-type='Dataset_Type'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + datasetCount + "</span> " + displayTitle + "</a>";
            data_Dataset_.push([datasetHTML]);
        });
        return data_Dataset_;
    }

    function formatDiseaseData(diseaseData) {
        var data_Disease_ = [];
        Object.keys(diseaseData).forEach(function(disease) {
            var diseaseCount = diseaseData[disease];
            var diseaseID = disease;
            // 🔴 开启大写格式化
            var displayTitle = capitalizeText(disease);
            var diseaseHTML = "<a title='" + displayTitle + "' type='button' class='list-group-item' id='" + diseaseID + "' data-name='" + disease + "' data-type='Disease_Type'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + diseaseCount + "</span> " + displayTitle + "</a>";
            data_Disease_.push([diseaseHTML]);
        });
        return data_Disease_;
    }

    function formatTreatmentData(treatmentData) {
        var data_Treatment_ = [];
        Object.keys(treatmentData).forEach(function(treatment) {
            var treatmentCount = treatmentData[treatment];
            var treatmentID = treatment;
            // 🔴 开启大写格式化
            var displayTitle = capitalizeText(treatment);
            var treatmentHTML = "<a title='" + displayTitle + "' type='button' class='list-group-item' id='" + treatmentID + "' data-name='" + treatment + "' data-type='Treatment_Type'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + treatmentCount + "</span> " + displayTitle + "</a>";
            data_Treatment_.push([treatmentHTML]);
        });
        return data_Treatment_;
    }
</script>

<script>
    function generateDatasetDropdown(containerId, datasetObj) {
        var dropdownContainer = document.getElementById(containerId);
        var selectElement = document.createElement('select');
        selectElement.name = 'dataset_filter';
        for (var key in datasetObj) {
            if (datasetObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = key + ' (' + datasetObj[key] + ')'; // 不转换
                selectElement.appendChild(optionElement);
            }
        }
        dropdownContainer.appendChild(selectElement);
    }

    function generateSpeciesDropdown(containerId, speciesObj) {
        var dropdownContainer = document.getElementById(containerId);
        var selectElement = document.createElement('select');
        selectElement.name = 'species_filter';
        for (var key in speciesObj) {
            if (speciesObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = capitalizeText(key) + ' (' + speciesObj[key] + ')'; // 转换大写
                selectElement.appendChild(optionElement);
            }
        }
        dropdownContainer.appendChild(selectElement);
    }

    function generateTissueDropdown(containerId, tissueObj) {
        var dropdownContainer = document.getElementById(containerId);
        var selectElement = document.createElement('select');
        selectElement.name = 'tissue_filter';
        for (var key in tissueObj) {
            if (tissueObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = capitalizeText(key) + ' (' + tissueObj[key] + ')'; // 转换大写
                selectElement.appendChild(optionElement);
            }
        }
        dropdownContainer.appendChild(selectElement);
    }

    function generateCellDropdown(containerId, cellObj) {
        var dropdownContainer = document.getElementById(containerId);
        var selectElement = document.createElement('select');
        selectElement.name = 'cell_filter';
        for (var key in cellObj) {
            if (cellObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = capitalizeText(key) + ' (' + cellObj[key] + ')'; // 转换大写
                selectElement.appendChild(optionElement);
            }
        }
        dropdownContainer.appendChild(selectElement);
    }

    function generateDiseaseDropdown(containerId, diseaseObj) {
        var dropdownContainer = document.getElementById(containerId);
        var selectElement = document.createElement('select');
        selectElement.name = 'disease_filter';
        for (var key in diseaseObj) {
            if (diseaseObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = capitalizeText(key) + ' (' + diseaseObj[key] + ')'; // 转换大写
                selectElement.appendChild(optionElement);
            }
        }
        dropdownContainer.appendChild(selectElement);
    }

    function generateTreatmentDropdown(containerId, treatmentObj) {
        var dropdownContainer = document.getElementById(containerId);
        var selectElement = document.createElement('select');
        selectElement.name = 'treatment_filter';
        for (var key in treatmentObj) {
            if (treatmentObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = capitalizeText(key) + ' (' + treatmentObj[key] + ')'; // 转换大写
                selectElement.appendChild(optionElement);
            }
        }
        dropdownContainer.appendChild(selectElement);
    }

    function generateTechnologyDropdown(containerId, techObj) {
        var dropdownContainer = document.getElementById(containerId);
        var selectElement = document.createElement('select');
        selectElement.name = 'technology_filter';
        for (var key in techObj) {
            if (techObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                // 🔵 保护原样，仅对SUPeR-Seq做修正
                optionElement.textContent = formatTechText(key) + ' (' + techObj[key] + ')';
                selectElement.appendChild(optionElement);
            }
        }
        dropdownContainer.appendChild(selectElement);
    }
</script>

<script>
    $('#experiments').DataTable( {
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        ajax: {
            url: './api/table_filter_sample.php',
            data:{
                select_dataset:select_dataset,
                select_specie:select_specie,
                select_tissue:select_tissue,
                select_cell:select_cell,
                select_disease:select_disease,
                select_treatment:select_treatment,
                select_experiment:select_experiment,
            },
        },
        dataType:'json',
        "order": [[ 4, "desc" ]],
        dom: "<'top'lBf>rt<'bottom'ip>",
        buttons: [
            {
                extend: 'csv',
                text: 'Download'
            }
        ],
        lengthMenu: [[10, 25,35, 50, 100], [10, 25,35, 50, 100]],
        pageLength: 50,
        columns: [
            { data: 'DatasetID',
                render: function ( data, type, row ) {
                    return '<a href="detail_study.php?sid=' + data + '">' + data + '</a>';
                }
            },
            { data: 'SampleID',
                render: function ( data, type, row ) {
                    return '<a href="detail_study.php?sid=' + row['DatasetID'] + '">' + data + '</a>';
                }
            },
            // 🔴 右侧表格渲染首字母大写转换
            { data: 'Species', render: function(data) { return capitalizeText(data); } },
            { data: 'Tissue', render: function(data) { return capitalizeText(data); } },
            // 🔵 保护原样，并且挂载专用技术名词修正器
            { data: 'Technology', render: function(data) { return formatTechText(data); } },
            // 假设 Platform 里也可能涉及类似名词，也加上
            { data: 'Platforms', render: function(data) { return formatTechText(data); } }
        ],
        "columnDefs": [
            {
                "targets": "_all",
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).css('text-align', 'center');
                }
            }
        ]
    } );
</script>

<script>
    // 🔴 通用优化：使用 closest('a') 解决点击徽章 span 标签的 BUG
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Dataset');

        function handleButtonClick(event) {
            var btn = event.target.closest('a[data-type="Dataset_Type"]');
            if (!btn) return;
            var id = btn.id;
            var newUrl = currentPage;
            var escapedId = id.replace(/ /g, "%20");

            if (id === selectedOption) {
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Dataset=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Dataset=' + id;
            }
            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.closest('a[data-type="Dataset_Type"]')) {
                handleButtonClick(event);
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Species');

        function handleButtonClick(event) {
            var btn = event.target.closest('a[data-type="Species"]');
            if (!btn) return;
            var id = btn.id;
            var newUrl = currentPage;
            var escapedId = id.replace(/ /g, "%20");

            if (id === selectedOption) {
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Species=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Species=' + id;
            }
            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.closest('a[data-type="Species"]')) {
                handleButtonClick(event);
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Tissue');

        function handleButtonClick(event) {
            var btn = event.target.closest('a[data-type="Tissue_Type"]');
            if (!btn) return;
            var id = btn.id;
            var newUrl = currentPage;
            var escapedId = id.replace(/ /g, "%20").replace(/&/g, "%26").replace(/\+/g, "%2B").replace(/,/g, "%2C");
            var encodedId = encodeURIComponent(id);

            if (id === selectedOption) {
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Tissue=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Tissue=' + encodedId;
            }
            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.closest('a[data-type="Tissue_Type"]')) {
                handleButtonClick(event);
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Cell');

        function handleButtonClick(event) {
            var btn = event.target.closest('a[data-type="Cell_Type"]');
            if (!btn) return;
            var id = btn.id;
            var newUrl = currentPage;
            var escapedId = id.replace(/ /g, "%20").replace(/&/g, "%26").replace(/\+/g, "%2B").replace(/,/g, "%2C");
            var encodedId = encodeURIComponent(id);

            if (id === selectedOption) {
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Cell=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Cell=' + encodedId;
            }
            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.closest('a[data-type="Cell_Type"]')) {
                handleButtonClick(event);
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Disease');

        function handleButtonClick(event) {
            var btn = event.target.closest('a[data-type="Disease_Type"]');
            if (!btn) return;
            var id = btn.id;
            var newUrl = currentPage;
            var escapedId = id.replace(/ /g, "%20").replace(/&/g, "%26").replace(/\+/g, "%2B").replace(/,/g, "%2C");
            var encodedId = encodeURIComponent(id);

            if (id === selectedOption) {
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Disease=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Disease=' + encodedId;
            }
            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.closest('a[data-type="Disease_Type"]')) {
                handleButtonClick(event);
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Treatment');

        function handleButtonClick(event) {
            var btn = event.target.closest('a[data-type="Treatment_Type"]');
            if (!btn) return;
            var id = btn.id;
            var newUrl = currentPage;
            var escapedId = id.replace(/ /g, "%20").replace(/&/g, "%26").replace(/\+/g, "%2B").replace(/,/g, "%2C");
            var encodedId = encodeURIComponent(id);

            if (id === selectedOption) {
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Treatment=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Treatment=' + encodedId;
            }
            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.closest('a[data-type="Treatment_Type"]')) {
                handleButtonClick(event);
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Experiment');

        function handleButtonClick(event) {
            var btn = event.target.closest('a[data-type="Experiment_Type"]');
            if (!btn) return;
            var id = btn.id;
            var newUrl = currentPage;
            var escapedId = id.replace(/ /g, "%20").replace(/&/g, "%26").replace(/\+/, "%2B");
            var encodedId = encodeURIComponent(id);

            if (id === selectedOption) {
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Experiment=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Experiment=' + encodedId;
            }
            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.closest('a[data-type="Experiment_Type"]')) {
                handleButtonClick(event);
            }
        });
    });
</script>

<?php
include "./templates/footer.php";
?>
</body>
</html>