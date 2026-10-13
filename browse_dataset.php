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
        <div class="col-lg-3 bd-sidebar" style="margin-top: 10px;padding-left: 85px;">
            <nav class="bd-links" style="background-color: white">
                <table class='fenye table-bordered' id="Species_" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;margin-top: 79px;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style=" margin: 0; color: white; text-align: center;font-size: 23px;">Species</h4>
                                <a href="./browse_dataset.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none"><path fill="#eab308" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z" opacity=".16"/><path stroke="#eab308" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2zM15 10l-4 4m0-4l4 4"/></g></svg>
                                </a>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody style="background-color: white">
                    </tbody>
                </table>

                <table class='fenye table-bordered' id="Tissue_Type_" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style=" margin: 0; color: white; text-align: center;font-size: 23px; ">Tissue/Cell line</h4>
                                <a href="./browse_dataset.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none"><path fill="#eab308" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z" opacity=".16"/><path stroke="#eab308" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.92 5a2 2 0 0 0-1.519.698l-4.285 5a2 2 0 0 0 0 2.604l4.285 5A2 2 0 0 0 7.92 19H19a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2zM15 10l-4 4m0-4l4 4"/></g></svg>
                                </a>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody style="background-color: white">
                    </tbody>
                </table>

                <table class='fenye table-bordered' id="Platform_" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center;font-size: 23px; ">Technology</h4>
                                <a href="./browse_dataset.php">
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

        <div class="col-lg-9 bd-content" id="bd-content" style="padding-right: 100px;">
            <hr>
            <table id="experiments" class="table table-hover table-bordered" style="vertical-align: middle;width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                <thead style="vertical-align: middle;font-size: 20px">
                <tr>
                    <th>Dataset ID</th>
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
        <div id="species-dropdown"></div>
        <br><br>
        <div id="technology-dropdown"></div>
        <br><br>
        <div id="tissue-dropdown"></div>
    </div>
</div>

<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let select_specie = params.get("selectedOption_Species");
    let select_experiment = params.get("selectedOption_Experiment");
    let select_tissue = params.get("selectedOption_Tissue");
    console.log(select_specie, select_experiment, select_tissue);
</script>

<script>
    // 智能转换工具 (处理 Species, Tissue 等)
    function capitalizeText(str) {
        if (!str) return 'N/A';
        return String(str)
            .toLowerCase()
            .replace(/\b\w/g, function(char) { return char.toUpperCase(); })
            .replace(/Rna\b/g, 'RNA')
            .replace(/Dna\b/g, 'DNA')
            .replace(/Seq\b/g, 'Seq');
    }

    // 🔴 核心技术名词修正拦截器
    function formatTechText(str) {
        if (!str) return 'N/A';
        // 不分大小写精确抓取 SUPeR-Seq 并规范化
        return String(str).replace(/SUPeR-Seq/ig, 'SUPeR-seq');
    }

    var filter_species, filter_tissue, filter_technology;

    $(document).ready(function() {
        $.ajax({
            url: './api/filter_return_dataset.php',
            method: 'POST',
            data: { select_specie: select_specie, select_experiment: select_experiment, select_tissue: select_tissue },
            success: function(response) {
                const filter_data = JSON.parse(response);
                filter_species = filter_data.Species;
                filter_tissue = filter_data.Tissue;

                // ========================================================
                // 🔴 关键修复：合并因大小写不同而产生重复的技术项
                // ========================================================
                let raw_tech = filter_data.Technology;
                let merged_tech = {};
                for (let key in raw_tech) {
                    let cleanKey = formatTechText(key); // 将 SUPeR-Seq 统一成 SUPeR-seq
                    // 如果该规范名称已存在，则将数量相加；否则新建该键
                    merged_tech[cleanKey] = (merged_tech[cleanKey] || 0) + raw_tech[key];
                }
                filter_technology = merged_tech; // 替换为合并后的纯净数据
                // ========================================================

                function sortByValueDescending(data) {
                    const entries = Object.entries(data);
                    entries.sort((a, b) => b[1] - a[1]);
                    return Object.fromEntries(entries);
                }

                const customOrder = ["Homo sapiens", "Mus musculus", "Gallus gallus", "Danio rerio", "Drosophila melanogaster", "Caenorhabditis elegans"];
                function sortByCustomOrder(data, order) {
                    const entries = Object.entries(data);
                    entries.sort((a, b) => order.indexOf(a[0]) - order.indexOf(b[0]));
                    return Object.fromEntries(entries);
                }

                initDataTable(
                    formatSpeciesData(sortByCustomOrder(filter_species, customOrder)),
                    formatTechnologyData(sortByValueDescending(filter_technology)),
                    formatTissueData(sortByValueDescending(filter_tissue))
                );
            }
        });

        function initDataTable(Species, Technology, Tissue) {
            $('#Species_').DataTable({ "processing": true, "paging": true, "pageLength": 7, "info": false, "searching": false, "lengthChange": false, "ordering": false, data: Species });
            $('#Platform_').DataTable({ "processing": true, "paging": true, "pageLength": 5, "info": false, "searching": false, "lengthChange": false, "ordering": false, data: Technology });
            $('#Tissue_Type_').DataTable({ "processing": true, "paging": true, "pageLength": 5, "info": false, "searching": false, "lengthChange": false, "order": [[ 0, "desc" ]], "ordering": false, data: Tissue });
        }
    });
</script>

<script>
    function formatSpeciesData(data) {
        var res = [];
        Object.keys(data).forEach(function(k) {
            var display = capitalizeText(k);
            var html = `<a title='${display}' type='button' class='list-group-item' id='${k}' data-name='${k}' data-type='Species'>` +
                `<span class='badge badge-default' style='background-color: #003266'>${data[k]}</span> ${display}</a>`;
            res.push([html]);
        });
        return res;
    }

    function formatTissueData(data) {
        var res = [];
        Object.keys(data).forEach(function(k) {
            var display = capitalizeText(k);
            var html = `<a title='${display}' type='button' class='list-group-item' id='${k}' data-name='${k}' data-type='Tissue_Type'>` +
                `<span class='badge badge-default' style='background-color: #003266'>${data[k]}</span> ${display}</a>`;
            res.push([html]);
        });
        return res;
    }

    function formatTechnologyData(data) {
        var res = [];
        Object.keys(data).forEach(function(k) {
            // 由于上面已经经过了合并与清洗，这里的 k 已经是唯一的干净名称了
            var display = k;
            var html = `<a title='${display}' type='button' class='list-group-item' id='${k}' data-name='${k}' data-type='Experiment_Type'>` +
                `<span class='badge badge-default' style='background-color: #003266'>${data[k]}</span> ${display}</a>`;
            res.push([html]);
        });
        return res;
    }
</script>

<script>
    function generateSpeciesDropdown(containerId, speciesObj) {
        var dropdownContainer = document.getElementById(containerId);
        var selectElement = document.createElement('select');
        selectElement.name = 'species_filter';

        for (var key in speciesObj) {
            if (speciesObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = capitalizeText(key) + ' (' + speciesObj[key] + ')';
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
                // 数据源已经清洗，直接展示
                optionElement.textContent = key + ' (' + techObj[key] + ')';
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
                optionElement.textContent = capitalizeText(key) + ' (' + tissueObj[key] + ')';
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
            url: './api/table_filter_dataset.php', // 确保调用的是 dataset 的后端
            data:{
                select_specie: select_specie,
                select_experiment: select_experiment,
                select_tissue: select_tissue
                // 移除了这里多余的 cell, disease 等未定义参数
            },
        },
        dataType: 'json',

        "order": [[ 5, "asc" ]], // 保持你原来的 Sort_Index 排序

        dom: "<'top'lBf>rt<'bottom'ip>",
        buttons: [
            {
                extend: 'csv',
                text: 'Download'
            }
        ],
        lengthMenu: [[10, 20, 30, 40, 50, 100], [10, 20, 30, 40, 50, 100]],
        pageLength: 20,
        columns: [
            { data: 'Accessions',
                render: function ( data, type, row ) {
                    if (type === 'display') {
                        return '<a href="detail_study.php?sid=' + data + '">' + data + '</a>';
                    }
                    return data;
                }
            },
            // 🔴 核心保护：只在 'display' (展示) 时转换大小写，底层排序(sort)依然用原始数据
            { data: 'Species',
                render: function(data, type, row) {
                    return type === 'display' ? capitalizeText(data) : data;
                }
            },
            { data: 'Tissue',
                render: function(data, type, row) {
                    return type === 'display' ? capitalizeText(data) : data;
                }
            },
            { data: 'Technology',
                render: function(data, type, row) {
                    return type === 'display' ? formatTechText(data) : data;
                }
            },
            { data: 'Platform',
                render: function(data, type, row) {
                    return type === 'display' ? formatTechText(data) : data;
                }
            },
            { data: 'Sort_Index', visible: false } // 第6列隐藏，专门用于排序
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
    // 防误触保护点击逻辑
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);

        function handleFilterClick(event, selector, paramKey) {
            var btn = event.target.closest(selector);
            if (!btn) return;
            var id = btn.id;
            var selectedOption = urlParams.get(paramKey);
            var newUrl = currentPage;
            var escapedId = id.replace(/ /g, "%20").replace(/&/g, "%26").replace(/\+/g, "%2B").replace(/,/g, "%2C");
            var encodedId = encodeURIComponent(id);

            if (id === selectedOption) {
                newUrl = newUrl.replace(new RegExp('([?&])' + paramKey + '=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + paramKey + '=' + encodedId;
            }
            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target.closest('a[data-type="Species"]')) {
                handleFilterClick(event, 'a[data-type="Species"]', 'selectedOption_Species');
            } else if (event.target.closest('a[data-type="Experiment_Type"]')) {
                handleFilterClick(event, 'a[data-type="Experiment_Type"]', 'selectedOption_Experiment');
            } else if (event.target.closest('a[data-type="Tissue_Type"]')) {
                handleFilterClick(event, 'a[data-type="Tissue_Type"]', 'selectedOption_Tissue');
            }
        });
    });
</script>

<?php
include "./templates/footer.php";
?>
</body>
</html>