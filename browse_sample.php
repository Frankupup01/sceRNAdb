<?php
include "./templates/base.php";
?>


<body id="body">
<!--include header-->
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
        <!--get筛选开始-->
        <div class="col-lg-3 bd-sidebar" style="margin-top: 10px">
            <nav class="bd-links" style="background-color: white">
                <!--navajowhite-->

                <!--Dataset-->
                <table class='fenye table-bordered' id="Dataset_Type_" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center; ">Dataset</h4>
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


                <!--SPECIES-->
                <!--设置id，table-->
                <table class='fenye table-bordered'  id="Species_" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center; ">Species</h4>
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

                <!--包装返回-->



                <!--Tissue_TYPE-->
                <table class='fenye table-bordered' id="Tissue_Type_" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center; ">Tissue/Cell line</h4>
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


                <!--Cell_TYPE-->
                <table class='fenye table-bordered' id="Cell_Type_" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center; ">Cell Type</h4>
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

                <!--Disease-->
                <table class='fenye table-bordered' id="Disease_Type_" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center; ">Disease</h4>
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

                <!--Treatment-->
                <!--
                <table class='fenye table-bordered' id="Treatment_Type_" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item'>
                                <h4>Treatment</h4>

                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>-->

                <!--PLATFORM-->
                <table class='fenye table-bordered' id="Platform_" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center; ">Technology</h4>
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





        </div>
        <div class="col-lg-9 bd-content" id="bd-content">
            <!--这里将左侧选择过的筛选选项，列在表格上端-->
            <!--<div class='user_select'>SELECT</div>
            <div onclick='select_data(this)' data-name='inDrop' data-type='Platform' class="label label-primary">
                <div>X</div> inDrop</div>-->
            <hr>
            <!--表格开始-->
            <!--改------------------------------>
            <table id="experiments" class="table table-hover table-bordered" style="vertical-align: middle;width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                <thead style="vertical-align: middle;">
                <tr>
                    <th>Dataset ID</th>
                    <th>Sample ID</th>
                    <th>Species</th>
                    <th>Tissue</th>
                    <th>Disease</th>
                    <th>Cell type</th>
                    <!--<th>Treatment</th>-->
                    <th>Technology</th>
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


<!--1. 获取url参数(全局变量)-->
<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let select_dataset = params.get("selectedOption_Dataset"); // 页面的?属性；
    let select_specie = params.get("selectedOption_Species"); // 页面的?属性；
    let select_tissue = params.get("selectedOption_Tissue"); // 页面的?属性；
    let select_cell = params.get("selectedOption_Cell"); // 页面的?属性；
    let select_disease = params.get("selectedOption_Disease"); // 页面的?属性；
    let select_treatment = params.get("selectedOption_Treatment"); // 页面的?属性；
    let select_experiment = params.get("selectedOption_Experiment"); // 页面的?属性；

    console.log(select_specie);
    console.log(select_experiment);
    console.log(select_tissue);
    console.log(select_cell);
    console.log(select_dataset);

</script>


<!--2. 调用后端filter_return_sample.php，接受筛选栏数据，初始化筛选栏表格-->
<script>

    var filter_dataset; // 全局作用域
    var filter_species; // 全局作用域
    var filter_tissue; // 全局作用域
    var filter_cell; // 全局作用域
    var filter_disease; // 全局作用域
    var filter_treatment; // 全局作用域
    var filter_technology; // 全局作用域


    //接受后端返回的json，经过函数处理后，被不同筛选栏的表格调用
    $(document).ready(function() {
        var data_Species_;

        $.ajax({
            url: './api/filter_return_sample.php',  // 后端 PHP 文件路径
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
                // 成功接收后端返回的数据
                //console.log('Response from PHP:', response);

                // JSON 数据解析
                const filter_data = JSON.parse(response);

                // 过滤掉 'NA' key 的项
                delete filter_data.CellType['NA'];
                delete filter_data.Disease['NA'];
                //delete filter_data.Treatment['NA'];


                filter_dataset = filter_data.DatasetID;
                filter_technology = filter_data.Technology;
                filter_species = filter_data.Species;
                filter_tissue = filter_data.Tissue;
                filter_cell = filter_data.CellType;
                filter_disease = filter_data.Disease;
                //filter_treatment = filter_data.Treatment;




                // 定义排序函数
                function sortByValueDescending(data) {
                    const entries = Object.entries(data);
                    entries.sort((a, b) => b[1] - a[1]);
                    return Object.fromEntries(entries);
                }

                // 自定义排序顺序
                const customOrder = ["Homo sapiens", "Mus musculus", "Drosophila melanogaster", "Danio rerio", "Gallus gallus", "Caenorhabditis elegans"];

                // 自定义排序函数
                function sortByCustomOrder(data, order) {
                    const entries = Object.entries(data);
                    entries.sort((a, b) => order.indexOf(a[0]) - order.indexOf(b[0]));
                    return Object.fromEntries(entries);
                }

                const sortedSpecies = sortByCustomOrder(filter_species, customOrder);

                // 按数量降序排序
                //const sortedSpecies = sortByValueDescending(filter_species);
                const sortedTechnology = sortByValueDescending(filter_technology);
                const sortedTissue = sortByValueDescending(filter_tissue);
                const sortedCell = sortByValueDescending(filter_cell);
                const sortedDisease = sortByValueDescending(filter_disease);
                //const sortedTreatment = sortByValueDescending(filter_treatment);
                const sortedDataset = sortByValueDescending(filter_dataset);


                // 在控制台打印变量内容
                console.log('Dataset:', filter_dataset);
                console.log('Species:', filter_species);
                console.log('Tissue:', filter_tissue);
                console.log('Cell type:', filter_cell);
                console.log('Disease:', filter_disease);
                //console.log('Treatment:', filter_treatment);
                console.log('Technology:', filter_technology);


                //格式化处理 filter 数据，调用的format系列函数，在下方定义
                data_Dataset_Type_ = formatDatasetData(sortedDataset);
                data_Species_ = formatSpeciesData(sortedSpecies);
                data_Tissue_Type_ = formatTissueData(sortedTissue);
                data_Cell_Type_ = formatCellData(sortedCell);
                data_Disease_Type_ = formatDiseaseData(sortedDisease);
                //data_Treatment_Type_ = formatTreatmentData(sortedTreatment);
                data_Experiment_Type_ = formatTechnologyData(sortedTechnology);


                // 在调用formatSpeciesData之后，继续处理 data_Species_ 或者执行其他操作
                //console.log(data_Species_);

                // 在数据准备就绪后，初始化表格(顺序很重要！！！)
                initDataTable(data_Dataset_Type_,data_Species_,data_Tissue_Type_,data_Cell_Type_,data_Disease_Type_,data_Experiment_Type_);

            },
            error: function(xhr, status, error) {
                // 错误处理
                console.error('Error:', error);
            }
        });

        function initDataTable(dataset,species,tissue,cell,disease,experiment) {
            // 使用 data 初始化 dataTable
            //console.log('Initializing DataTable with data:', data);
            // 在这里初始化您的dataTable，确保在data准备就绪的情况下进行

            $('#Dataset_Type_').DataTable( {
                "processing": true,
                "paging": true,
                "pageLength": 6,
                "info": false,
                "searching": false,
                "lengthChange": false,
                //"lengthMenu": [ [3, 5, 10, -1], [3, 5, 10, "All"] ],
                //order:[],
                "ordering": false,
                data:dataset
            } );

            if (select_dataset) {
                var activeButton_dataset = document.getElementById(select_dataset);
                if (activeButton_dataset) {
                    activeButton_dataset.style.backgroundColor = "#b09b9b"; // 设置激活状态的样式
                    activeButton_dataset.style.color = "#FFFFFF"
                } else {
                    console.log('没有找到 ID 为  XXX  的按钮。');
                }
            }


            $('#Species_').DataTable( {
                "processing": true,
                "paging": true,
                "pageLength": 7,
                "info": false, //底部文字
                "searching": false,
                "lengthChange": false, //禁止show框
                //order:[], 这个选项是按照返回的json次序展示行，但是允许点击重新排序
                "ordering": false, //禁止点击排序
                data:species
            } );

            if (select_specie) {
                var activeButton_specie = document.getElementById(select_specie);
                if (activeButton_specie) {
                    activeButton_specie.style.backgroundColor = "#b09b9b"; // 设置激活状态的样式 #5e72e4 #2e303f
                    activeButton_specie.style.color = "#FFFFFF"
                } else {
                    console.log('没有找到 ID 为 XXX 的按钮。');
                }
            }

            $('#Cell_Type_').DataTable( {
                "processing": true,
                "paging": true,
                "pageLength": 6,
                "info": false,
                "searching": false,
                "lengthChange": false,
                //"lengthMenu": [ [3, 5, 10, -1], [3, 5, 10, "All"] ],
                //order:[],
                "ordering": false,
                data:cell
            } );

            if (select_cell) {
                var activeButton_cell = document.getElementById(select_cell);
                if (activeButton_cell) {
                    activeButton_cell.style.backgroundColor = "#b09b9b"; // 设置激活状态的样式
                    activeButton_cell.style.color = "#FFFFFF"
                } else {
                    console.log('没有找到 ID 为  XXX  的按钮。');
                }
            }

            $('#Tissue_Type_').DataTable( {
                "processing": true,
                "paging": true,
                "pageLength": 6,
                "info": false,
                "searching": false,
                "lengthChange": false,
                //"lengthMenu": [ [3, 5, 10, -1], [3, 5, 10, "All"] ],
                //order:[],
                "ordering": false,
                data:tissue
            } );

            if (select_tissue) {
                var activeButton_tissue = document.getElementById(select_tissue);
                if (activeButton_tissue) {
                    activeButton_tissue.style.backgroundColor = "#b09b9b"; // 设置激活状态的样式
                    activeButton_tissue.style.color = "#FFFFFF"
                } else {
                    console.log('没有找到 ID 为  XXX  的按钮。');
                }
            }

            $('#Disease_Type_').DataTable( {
                "processing": true,
                "paging": true,
                "pageLength": 6,
                "info": false,
                "searching": false,
                "lengthChange": false,
                //"lengthMenu": [ [3, 5, 10, -1], [3, 5, 10, "All"] ],
                //order:[],
                "ordering": false,
                data:disease
            } );

            if (select_disease) {
                var activeButton_disease = document.getElementById(select_disease);
                if (activeButton_disease) {
                    activeButton_disease.style.backgroundColor = "#b09b9b"; // 设置激活状态的样式
                    activeButton_disease.style.color = "#FFFFFF"
                } else {
                    console.log('没有找到 ID 为  XXX  的按钮。');
                }
            }

            /*
            $('#Treatment_Type_').DataTable( {
                "processing": true,
                "paging": true,
                "pageLength": 6,
                "info": false,
                "searching": false,
                "lengthChange": false,
                //"lengthMenu": [ [3, 5, 10, -1], [3, 5, 10, "All"] ],
                //order:[],
                "ordering": false,
                data:treatment
            } );

            if (select_treatment) {
                var activeButton_treatment = document.getElementById(select_treatment);
                if (activeButton_treatment) {
                    activeButton_treatment.style.backgroundColor = "#b09b9b"; // 设置激活状态的样式
                    activeButton_treatment.style.color = "#FFFFFF"
                } else {
                    console.log('没有找到 ID 为  XXX  的按钮。');
                }
            }
            */

            $('#Platform_').DataTable( {
                "processing": true,
                "paging": true,
                "pageLength": 10,
                "info": false,
                //"pagingType": 'simple_numbers',
                "searching": false,
                "lengthChange": false,
                //"lengthMenu": [ [3, 5, 10, -1], [3, 5, 10, "All"] ],
                //order:[],
                "ordering": false,
                data:experiment
            } );

            if (select_experiment) {
                var activeButton_experimnet = document.getElementById(select_experiment);
                if (activeButton_experimnet) {
                    activeButton_experimnet.style.backgroundColor = "#b09b9b"; // 设置激活状态的样式
                    activeButton_experimnet.style.color = "#FFFFFF"
                } else {
                    console.log('没有找到 ID 为  XXX  的按钮。');
                }
            }

        }

    });
</script>



<!--3. 分辨定义species\technology\tissue，对后端返回值操作，组装值变为HTML代码，赋值给变量，从而被DataTable调用的函数-->
<script>
    //Species函数，在2.中被调用
    //speciesName & speciesID
    function formatSpeciesData(speciesData) {
        var data_Species_ = [];

        // 处理每个物种的数据
        Object.keys(speciesData).forEach(function(species) {
            var speciesCount = speciesData[species]; // 物种数量

            // 根据物种生成 HTML 结构
            var speciesName = "";
            var speciesID = "";
            switch (species) {
                case 'Mus musculus':
                    speciesName = 'Mus musculus';
                    speciesID = 'Mus musculus';
                    break;
                case 'Homo sapiens':
                    speciesName = 'Homo sapiens';
                    speciesID = 'Homo sapiens';
                    break;
                default:
                    speciesName = species;
                    speciesID = species;
            }

            var speciesHTML = "<a title='" + speciesName + "' type='button' class='list-group-item' id='" + speciesID + "' data-name='" + speciesName + "' data-type='Species'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + speciesCount + "</span> " + speciesName + "</a>";

            // 将 HTML 结构添加到数组中
            data_Species_.push([speciesHTML]);
        });

        return data_Species_;
    }

    //Tissue函数，在2.中被调用
    //TissueName & TissueID
    function formatTissueData(tissueData) {
        var data_Tissue_ = [];

        // 处理每个组织的数据
        Object.keys(tissueData).forEach(function(tissue) {
            var tissueCount = tissueData[tissue]; // 组织数量

            // 根据组织生成 HTML 结构
            var tissueName = tissue
            var tissueID = tissue

            var tissueHTML = "<a title='" + tissueName + "' type='button' class='list-group-item' id='" + tissueID + "' data-name='" + tissueName + "' data-type='Tissue_Type'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + tissueCount + "</span> " + tissueName + "</a>";

            // 将 HTML 结构添加到数组中
            data_Tissue_.push([tissueHTML]);
        });

        return data_Tissue_;
    }

    //Cell函数，在2.中被调用
    //CellName & CellID
    function formatCellData(cellData) {
        var data_Cell_ = [];

        // 处理每个组织的数据
        Object.keys(cellData).forEach(function(cell) {
            var cellCount = cellData[cell]; // 组织数量

            // 根据组织生成 HTML 结构
            var cellName = cell
            var cellID = cell

            var cellHTML = "<a title='" + cellName + "' type='button' class='list-group-item' id='" + cellID + "' data-name='" + cellName + "' data-type='Cell_Type'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + cellCount + "</span> " + cellName + "</a>";

            // 将 HTML 结构添加到数组中
            data_Cell_.push([cellHTML]);
        });

        return data_Cell_;
    }

    //Tech函数，在2.中被调用
    //technologyName & technologyID
    function formatTechnologyData(technologyData) {
        var data_Technology_ = [];

        // 处理每种技术的数据
        Object.keys(technologyData).forEach(function(technology) {
            var technologyCount = technologyData[technology]; // 技术数量

            // 根据技术生成 HTML 结构
            var technologyName = technology
            var technologyID = technology

            var technologyHTML = "<a title='" + technologyName + "' type='button' class='list-group-item' id='" + technologyID + "' data-name='" + technologyName + "' data-type='Experiment_Type'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + technologyCount + "</span> " + technologyName + "</a>";

            // 将 HTML 结构添加到数组中
            data_Technology_.push([technologyHTML]);
        });

        return data_Technology_;
    }

    //Dataset函数，在2.中被调用
    //DatasetName & DatasetID
    function formatDatasetData(datasetData) {
        var data_Dataset_ = [];

        // 处理每个组织的数据
        Object.keys(datasetData).forEach(function(dataset) {
            var datasetCount = datasetData[dataset]; // 组织数量

            // 根据组织生成 HTML 结构
            var datasetName = dataset
            var datasetID = dataset

            var datasetHTML = "<a title='" + datasetName + "' type='button' class='list-group-item' id='" + datasetID + "' data-name='" + datasetName + "' data-type='Dataset_Type'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + datasetCount + "</span> " + datasetName + "</a>";

            // 将 HTML 结构添加到数组中
            data_Dataset_.push([datasetHTML]);
        });

        return data_Dataset_;
    }

    //Disease函数，在2.中被调用
    //DiseaseName & DiseaseID
    function formatDiseaseData(diseaseData) {
        var data_Disease_ = [];

        // 处理每个组织的数据
        Object.keys(diseaseData).forEach(function(disease) {
            var diseaseCount = diseaseData[disease]; // 组织数量

            // 根据组织生成 HTML 结构
            var diseaseName = disease
            var diseaseID = disease

            var diseaseHTML = "<a title='" + diseaseName + "' type='button' class='list-group-item' id='" + diseaseID + "' data-name='" + diseaseName + "' data-type='Disease_Type'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + diseaseCount + "</span> " + diseaseName + "</a>";

            // 将 HTML 结构添加到数组中
            data_Disease_.push([diseaseHTML]);
        });

        return data_Disease_;
    }

    //Treatment函数，在2.中被调用
    //TreatmentName & TreatmentID
    function formatTreatmentData(treatmentData) {
        var data_Treatment_ = [];

        // 处理每个组织的数据
        Object.keys(treatmentData).forEach(function(treatment) {
            var treatmentCount = treatmentData[treatment]; // 组织数量

            // 根据组织生成 HTML 结构
            var treatmentName = treatment
            var treatmentID = treatment

            var treatmentHTML = "<a title='" + treatmentName + "' type='button' class='list-group-item' id='" + treatmentID + "' data-name='" + treatmentName + "' data-type='Treatment_Type'>" +
                "<span class='badge badge-default' style='background-color: #003266'>" + treatmentCount + "</span> " + treatmentName + "</a>";

            // 将 HTML 结构添加到数组中
            data_Treatment_.push([treatmentHTML]);
        });

        return data_Treatment_;
    }

</script>



<!--为select下拉框进行HTML封装，在filter_table初始化的时候，如果后续需要调用即可-->
<script>

    function generateDatasetDropdown(containerId, datasetObj) {
        // 获取要插入下拉框的DOM元素
        var dropdownContainer = document.getElementById(containerId);

        // 创建 <select> 元素
        var selectElement = document.createElement('select');
        selectElement.name = 'dataset_filter';

        // 遍历对象的键值对并创建 <option> 元素
        for (var key in datasetObj) {
            if (datasetObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = key + ' (' + datasetObj[key] + ')';
                selectElement.appendChild(optionElement);
            }
        }
        // 将 <select> 元素添加到容器中
        dropdownContainer.appendChild(selectElement);

    }

    function generateSpeciesDropdown(containerId, speciesObj) {
        // 获取要插入下拉框的DOM元素
        var dropdownContainer = document.getElementById(containerId);

        // 创建 <select> 元素
        var selectElement = document.createElement('select');
        selectElement.name = 'species_filter';

        // 遍历对象的键值对并创建 <option> 元素
        for (var key in speciesObj) {
            if (speciesObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = key + ' (' + speciesObj[key] + ')';
                selectElement.appendChild(optionElement);
            }
        }
        // 将 <select> 元素添加到容器中
        dropdownContainer.appendChild(selectElement);

    }


    function generateTissueDropdown(containerId, tissueObj) {
        // 获取要插入下拉框的DOM元素
        var dropdownContainer = document.getElementById(containerId);

        // 创建 <select> 元素
        var selectElement = document.createElement('select');
        selectElement.name = 'tissue_filter';

        // 遍历对象的键值对并创建 <option> 元素
        for (var key in tissueObj) {
            if (tissueObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = key + ' (' + tissueObj[key] + ')';
                selectElement.appendChild(optionElement);
            }
        }
        // 将 <select> 元素添加到容器中
        dropdownContainer.appendChild(selectElement);

    }

    function generateCellDropdown(containerId, cellObj) {
        // 获取要插入下拉框的DOM元素
        var dropdownContainer = document.getElementById(containerId);

        // 创建 <select> 元素
        var selectElement = document.createElement('select');
        selectElement.name = 'cell_filter';

        // 遍历对象的键值对并创建 <option> 元素
        for (var key in cellObj) {
            if (cellObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = key + ' (' + cellObj[key] + ')';
                selectElement.appendChild(optionElement);
            }
        }
        // 将 <select> 元素添加到容器中
        dropdownContainer.appendChild(selectElement);

    }

    function generateDiseaseDropdown(containerId, diseaseObj) {
        // 获取要插入下拉框的DOM元素
        var dropdownContainer = document.getElementById(containerId);

        // 创建 <select> 元素
        var selectElement = document.createElement('select');
        selectElement.name = 'disease_filter';

        // 遍历对象的键值对并创建 <option> 元素
        for (var key in diseaseObj) {
            if (diseaseObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = key + ' (' + diseaseObj[key] + ')';
                selectElement.appendChild(optionElement);
            }
        }
        // 将 <select> 元素添加到容器中
        dropdownContainer.appendChild(selectElement);

    }

    function generateTreatmentDropdown(containerId, treatmentObj) {
        // 获取要插入下拉框的DOM元素
        var dropdownContainer = document.getElementById(containerId);

        // 创建 <select> 元素
        var selectElement = document.createElement('select');
        selectElement.name = 'treatment_filter';

        // 遍历对象的键值对并创建 <option> 元素
        for (var key in treatmentObj) {
            if (treatmentObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = key + ' (' + treatmentObj[key] + ')';
                selectElement.appendChild(optionElement);
            }
        }
        // 将 <select> 元素添加到容器中
        dropdownContainer.appendChild(selectElement);

    }

    function generateTechnologyDropdown(containerId, techObj) {
        // 获取要插入下拉框的DOM元素
        var dropdownContainer = document.getElementById(containerId);

        // 创建 <select> 元素
        var selectElement = document.createElement('select');
        selectElement.name = 'technology_filter';

        // 遍历对象的键值对并创建 <option> 元素
        for (var key in techObj) {
            if (techObj.hasOwnProperty(key)) {
                var optionElement = document.createElement('option');
                optionElement.value = key;
                optionElement.textContent = key + ' (' + techObj[key] + ')';
                selectElement.appendChild(optionElement);
            }
        }
        // 将 <select> 元素添加到容器中
        dropdownContainer.appendChild(selectElement);

    }

</script>


<!--4. 结果数据JSON的获取，通过table_filter2.php后端-->
<script>
    //主表格初始化，返回所有符合筛选条件后的数据
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
        //order: [],
        "order": [[ 4, "desc" ]],
        dom: "<'top'lBf>rt<'bottom'ip>",
        buttons: [
            {
                extend: 'csv',
                text: 'Download'
            }
        ],
        lengthMenu: [[10, 25,35, 50, 100], [10, 25,35, 50, 100]],
        pageLength: 50, // 设置默认显示50行
        columns: [
            { data: 'DatasetID',
                render: function ( data, type, row ) {
                    //return '<a href=' + data + '"detail_study.php?sid=">' + data + '</a>'
                    return '<a href="detail_study.php?sid=' + data + '">' + data + '</a>';
                }
            },
            { data: 'SampleID',
                render: function ( data, type, row ) {
                    //return '<a href=' + row['Study'] + '"detail_study.php?sid=">' + data + '</a>'
                    return '<a href="detail_study.php?sid=' + row['Study'] + '">' + data + '</a>';
                }
            },
            { data: 'Species' },
            { data: 'Tissue' },
            { data: 'Disease' },
            { data: 'CellType' },
            //{ data: 'Treatment' },
            { data: 'Technology' }
        ],
        "columnDefs": [
            {
                "targets": "_all",  // 对所有列应用样式
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).css('text-align', 'center');  // 将单元格内容居中
                }
            }
        ]
    } );
</script>



<!--5. 页面完成加载后，为Dataset筛选栏的button赋予路由跳转的功能，激活时搜索条件，取消激活时条件去除-->
<script>

    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Dataset');

        /*      废弃；功能移植到表格初始化部分完成
                if (selectedOption) {
                    var activeButton = document.getElementById(selectedOption);
                    if (activeButton) {
                        activeButton.style.backgroundColor = "#FE2E2E"; // 设置激活状态的样式
                    }
                }
        */
        function handleButtonClick(event) {
            var id = event.target.id;
            var newUrl = currentPage;

            //escapedID为取消激活时路由参数
            var escapedId = id.replace(/ /g, "%20");

            if (id === selectedOption) {
                //newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Species=' + id + '(&?)'), '$1').replace(/&$/, '');
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Dataset=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Dataset=' + id;
            }

            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.getAttribute("data-type") === "Dataset_Type") {
                handleButtonClick(event);
            }
        });
    });
</script>

<!--6. 页面完成加载后，为Species筛选栏的button赋予路由跳转的功能，激活时搜索条件，取消激活时条件去除-->
<script>

    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Species');

        /*      废弃；功能移植到表格初始化部分完成
                if (selectedOption) {
                    var activeButton = document.getElementById(selectedOption);
                    if (activeButton) {
                        activeButton.style.backgroundColor = "#FE2E2E"; // 设置激活状态的样式
                    }
                }
        */
        function handleButtonClick(event) {
            var id = event.target.id;
            var newUrl = currentPage;

            //escapedID为取消激活时路由参数
            var escapedId = id.replace(/ /g, "%20");

            if (id === selectedOption) {
                //newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Species=' + id + '(&?)'), '$1').replace(/&$/, '');
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Species=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Species=' + id;
            }

            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.getAttribute("data-type") === "Species") {
                handleButtonClick(event);
            }
        });
    });
</script>


<!--7. 页面完成加载后，为Tissue筛选栏的button赋予路由跳转的功能，激活时搜索条件，取消激活时条件去除-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Tissue');

        /*
        if (selectedOption) {
            var activeButton = document.getElementById(selectedOption);
            if (activeButton) {
                activeButton.style.backgroundColor = "#FE2E2E"; // 设置激活状态的样式
            }
        }
*/
        function handleButtonClick(event) {
            var id = event.target.id;
            var newUrl = currentPage;

            // ' '-->%20、&-->%26、'+'-->%2B、','-->%2C
            //（特殊：浏览器会自动解析%20的路由为空格，所以只需要处理取消按钮激活）
            //g 代表所有符合条件的符号
            var escapedId = id.replace(/ /g, "%20").replace(/&/g, "%26").replace(/\+/g, "%2B").replace(/,/g, "%2C");
            var encodedId = encodeURIComponent(id);

            if (id === selectedOption) {
                // 取消激活时移除选中参数
                //newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Tissue=' + id + '(&?)'), '$1').replace(/&$/, '');
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Tissue=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Tissue=' + encodedId;
            }

            window.location.href = newUrl;
        }


        document.addEventListener("click", function(event) {
            if (event.target && event.target.getAttribute("data-type") === "Tissue_Type") {
                handleButtonClick(event);
            }
        });

    });
</script>

<!--8. 页面完成加载后，为Cell筛选栏的button赋予路由跳转的功能，激活时搜索条件，取消激活时条件去除-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Cell');

        /*
        if (selectedOption) {
            var activeButton = document.getElementById(selectedOption);
            if (activeButton) {
                activeButton.style.backgroundColor = "#FE2E2E"; // 设置激活状态的样式
            }
        }
*/
        function handleButtonClick(event) {
            var id = event.target.id;
            var newUrl = currentPage;

            // ' '-->%20、&-->%26、'+'-->%2B、','-->%2C
            //（特殊：浏览器会自动解析%20的路由为空格，所以只需要处理取消按钮激活）
            //g 代表所有符合条件的符号
            var escapedId = id.replace(/ /g, "%20").replace(/&/g, "%26").replace(/\+/g, "%2B").replace(/,/g, "%2C");
            var encodedId = encodeURIComponent(id);

            if (id === selectedOption) {
                // 取消激活时移除选中参数
                //newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Tissue=' + id + '(&?)'), '$1').replace(/&$/, '');
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Cell=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Cell=' + encodedId;
            }

            window.location.href = newUrl;
        }


        document.addEventListener("click", function(event) {
            if (event.target && event.target.getAttribute("data-type") === "Cell_Type") {
                handleButtonClick(event);
            }
        });

    });
</script>

<!--9. 页面完成加载后，为Disease筛选栏的button赋予路由跳转的功能，激活时搜索条件，取消激活时条件去除-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Disease');

        function handleButtonClick(event) {
            var id = event.target.id;
            var newUrl = currentPage;

            // ' '-->%20、&-->%26、'+'-->%2B、','-->%2C
            //（特殊：浏览器会自动解析%20的路由为空格，所以只需要处理取消按钮激活）
            //g 代表所有符合条件的符号
            var escapedId = id.replace(/ /g, "%20").replace(/&/g, "%26").replace(/\+/g, "%2B").replace(/,/g, "%2C");
            var encodedId = encodeURIComponent(id);

            if (id === selectedOption) {
                // 取消激活时移除选中参数
                //newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Tissue=' + id + '(&?)'), '$1').replace(/&$/, '');
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Disease=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Disease=' + encodedId;
            }

            window.location.href = newUrl;
        }


        document.addEventListener("click", function(event) {
            if (event.target && event.target.getAttribute("data-type") === "Disease_Type") {
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
            var id = event.target.id;
            var newUrl = currentPage;

            // ' '-->%20、&-->%26、'+'-->%2B、','-->%2C
            //（特殊：浏览器会自动解析%20的路由为空格，所以只需要处理取消按钮激活）
            //g 代表所有符合条件的符号
            var escapedId = id.replace(/ /g, "%20").replace(/&/g, "%26").replace(/\+/g, "%2B").replace(/,/g, "%2C");
            var encodedId = encodeURIComponent(id);

            if (id === selectedOption) {
                // 取消激活时移除选中参数
                //newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Tissue=' + id + '(&?)'), '$1').replace(/&$/, '');
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Treatment=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Treatment=' + encodedId;
            }

            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.getAttribute("data-type") === "Treatment_Type") {
                handleButtonClick(event);
            }
        });

    });
</script>

<!--9. 页面完成加载后，为Experiment筛选栏的button赋予路由跳转的功能，激活时搜索条件，取消激活时条件去除-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Experiment');

        /*
                if (selectedOption) {
                    var activeButton = document.getElementById(selectedOption);
                    if (activeButton) {
                        activeButton.style.backgroundColor = "#FE2E2E"; // 设置激活状态的样式
                    }
                }
        */
        function handleButtonClick(event) {
            var id = event.target.id;
            var newUrl = currentPage;

            var escapedId = id.replace(/ /g, "%20").replace(/&/g, "%26").replace(/\+/, "%2B");
            //encodeID为激活时路由参数
            var encodedId = encodeURIComponent(id);

            if (id === selectedOption) {
                //newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Experiment=' + id + '(&?)'), '$1').replace(/&$/, '');
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Experiment=' + escapedId + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Experiment=' + encodedId;
            }

            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.getAttribute("data-type") === "Experiment_Type") {
                handleButtonClick(event);
            }
        });
    });
</script>

<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>