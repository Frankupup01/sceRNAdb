

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

                <!--SPECIES-->
                <!--设置id，table-->
                <table class='fenye table-bordered' id="Species_" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <!--<h4 style="margin: 0; color: white; text-align: center;">Species</h4>-->
                                <!--flex-grow: 1;-->

                                <!--函数：selectMenu; 点击显示所有选项栏-->
                                <!--<a href="javascript:void(0);" onclick="window.location.reload();"-->
                                <!--<a href="./browse_dataset.php"
                                   style="background-color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none; color: #286ea7;
                        border: 1px solid #286ea7; position: absolute; right: 10px; font-size: 12px; ">
                                    Reset
                                </a>-->
                                <h4 style=" margin: 0; color: white; text-align: center;">Species</h4>
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

                <!--包装返回-->

                <!--DATA_TYPE-->
                <table class='fenye table-bordered' id="Tissue_Type_" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style=" margin: 0; color: white; text-align: center; ">Tissue/Cell line</h4>
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



                <!--PLATFORM-->
                <table class='fenye table-bordered' id="Platform_" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                    <thead style="background-color: #286ea7">
                    <tr>
                        <th>
                            <div class='list-group-item' style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0; color: white; text-align: center; ">Technology</h4>
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





                <!--TEST-->


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
                    <th>Species</th>
                    <th>Study</th>
                    <th>Dataset ID</th>
                    <th>Tissue / Cell line</th>
                    <th>Technology</th>
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






<!--1. 获取url参数(全局变量)-->
<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let select_specie = params.get("selectedOption_Species"); // 页面的?属性；
    let select_experiment = params.get("selectedOption_Experiment"); // 页面的?属性；
    let select_tissue = params.get("selectedOption_Tissue"); // 页面的?属性；
    console.log(select_specie);
    console.log(select_experiment);
    console.log(select_tissue);

</script>


<!--2. 调用后端filter_return_dataset.php，接受筛选栏数据，初始化筛选栏表格-->
<script>

    var filter_species; // 全局作用域
    var filter_tissue; // 全局作用域
    var filter_technology; // 全局作用域

    //接受后端返回的json，经过函数处理后，被不同筛选栏的表格调用
        $(document).ready(function() {
        var data_Species_;

        $.ajax({
        url: './api/filter_return_dataset.php',  // 后端 PHP 文件路径
        method: 'POST',
        data: { select_specie: select_specie,
                select_experiment: select_experiment,
                select_tissue:select_tissue},
        success: function(response) {
        // 成功接收后端返回的数据
        //console.log('Response from PHP:', response);

        // JSON 数据解析
        const filter_data = JSON.parse(response);
        filter_species = filter_data.Species;
        filter_tissue = filter_data.Tissue;
        filter_technology = filter_data.Technology;

            // 定义排序函数
            function sortByValueDescending(data) {
                const entries = Object.entries(data);
                entries.sort((a, b) => b[1] - a[1]);
                return Object.fromEntries(entries);
            }

            // 自定义排序顺序
            const customOrder = ["Homo sapiens", "Mus musculus", "Gallus gallus", "Danio rerio", "Drosophila melanogaster", "Caenorhabditis elegans"];

            // 自定义排序函数
            function sortByCustomOrder(data, order) {
                const entries = Object.entries(data);
                entries.sort((a, b) => order.indexOf(a[0]) - order.indexOf(b[0]));
                return Object.fromEntries(entries);
            }

            // 按自定义顺序排序
            const sortedSpecies = sortByCustomOrder(filter_species, customOrder);

            // 按数量降序排序
            //const sortedSpecies = sortByValueDescending(filter_species);
            const sortedTechnology = sortByValueDescending(filter_technology);
            const sortedTissue = sortByValueDescending(filter_tissue);


            // 在控制台打印变量内容
        console.log('Species:', sortedSpecies);
        console.log('Tissue:', sortedTissue);
        console.log('Technology:', sortedTechnology);


        //格式化处理 filter 数据，调用的format系列函数，在下方定义
        data_Species_ = formatSpeciesData(sortedSpecies);
        data_Experiment_Type_ = formatTechnologyData(sortedTechnology);
        data_Tissue_Type_ = formatTissueData(sortedTissue);

            // 在调用formatSpeciesData之后，继续处理 data_Species_ 或者执行其他操作
            //console.log(data_Species_);

            // 在数据准备就绪后，初始化表格(顺序很重要！！！)
            initDataTable(data_Species_,data_Experiment_Type_,data_Tissue_Type_);

    },
        error: function(xhr, status, error) {
        // 错误处理
        console.error('Error:', error);
    }
    });

            function initDataTable(Species,Technology,Tissue) {
                // 使用 data 初始化 dataTable
                //console.log('Initializing DataTable with data:', data);
                // 在这里初始化您的dataTable，确保在data准备就绪的情况下进行
                $('#Species_').DataTable( {
                    "processing": true,
                    "paging": true,
                    "pageLength": 7,
                    "info": false, //底部文字
                    "searching": false,
                    "lengthChange": false, //禁止show框
                    //order:[], 这个选项是按照返回的json次序展示行，但是允许点击重新排序
                    "ordering": false, //禁止点击排序
                    data:Species
                } );

                if (select_specie) {
                    var activeButton_specie = document.getElementById(select_specie);
                    if (activeButton_specie) {
                        activeButton_specie.style.backgroundColor = "#b09b9b"; // 设置激活状态的样式 #5e72e4 #2e303f #dec2c2
                        activeButton_specie.style.color = "#FFFFFF"
                    } else {
                        console.log('没有找到 ID 为 XXX 的按钮。');
                    }
                }

                $('#Platform_').DataTable( {
                    "processing": true,
                    "paging": true,
                    "pageLength": 5,
                    "info": false,
                    //"pagingType": 'simple_numbers',
                    "searching": false,
                    "lengthChange": false,
                    //"lengthMenu": [ [3, 5, 10, -1], [3, 5, 10, "All"] ],
                    //"order": [[ 1, "desc" ]],
                    "ordering": false,
                    data:Technology
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

                $('#Tissue_Type_').DataTable( {
                    "processing": true,
                    "paging": true,
                    "pageLength": 15,
                    "info": false,
                    "searching": false,
                    "lengthChange": false,
                    //"lengthMenu": [ [3, 5, 10, -1], [3, 5, 10, "All"] ],
                    "order": [[ 0, "desc" ]],
                    "ordering": false,
                    data:Tissue
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
            case 'Homo sapiens/Mus musculus':
                speciesName = 'Homo / Mus';
                speciesID = 'Homo sapiens/Mus musculus';
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

</script>


<!--为select下拉框进行HTML封装，在filter_table初始化的时候，如果后续需要调用即可-->
<script>

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

</script>




<!--4. 结果数据JSON的获取，通过table_filter2.php后端-->
<script>
    //主表格初始化，返回所有符合筛选条件后的数据
    $('#experiments').DataTable( {
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        ajax: {
            url: './api/table_filter_dataset.php',
            data:{
                select_specie:select_specie,
                select_experiment:select_experiment,
                select_tissue:select_tissue,
            },
        },
        dataType:'json',
        stripeClasses: [],
        "order": [[ 5, "asc" ]],
        lengthMenu: [[10, 20, 30, 40, 50, 100], [10, 20, 30, 40, 50, 100]],
        pageLength: 20, // 设置默认显示50行
        dom: "<'top'lBf>rt<'bottom'ip>", //"<'top'Bf>rt<'bottom'ilp>"
        buttons: [
            {
                extend: 'csv',
                text: 'Download'
            }
        ],
        columns: [
            { data: 'Species' },
            { data: 'Reference' },
            { data: 'Accessions',
                render: function ( data, type, row ) {
                    //return '<a href='+ data  + 'detail_study.php?sid=>' + data + '</a>'
                    return '<a href="detail_study.php?sid=' + data + '">' + data + '</a>';
                }
                //render: function (data, type, row, meta) {
                //    return '<a href="#" class="show-child" data-accession="' + data + '">' + data + '</a>';
                //}
            },
            { data: 'Tissue' },
            { data: 'Technology' },
            { data: 'Sort_Index', visible: false }
        ],
        "columnDefs": [
            {
                "targets": [0,2,3,4],  // 对所有列应用样式
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).css('text-align', 'center');  // 将单元格内容居中
                }
            },
        ]
    } );



    // 点击 Accessions 链接展开子行，显示两个跳转链接
    /*
    $('#experiments tbody').on('click', 'a.show-child', function (e) {
        e.preventDefault();
        var table = $('#experiments').DataTable();
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var accession = $(this).data('accession');

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // 创建两个跳转链接
            var link1 = `<a href="detail_study.php?sid=${accession}" target="_blank">View Typical Enhancer RNA</a>`;
            var link2 = `<a href="detail_study.php?sid=${accession}" target="_blank">View Super Enhancer RNA</a>`;

            // 子行的 HTML 内容
            var childContent = `
            <table class="table table-bordered" style="margin-left:40px; width:90%;">
                <tr>
                    <td style="width:50%; text-align:center;">${link1}</td>
                    <td style="width:50%; text-align:center;">${link2}</td>
                </tr>
            </table>`;
            row.child(childContent).show();
            tr.addClass('shown');
        }
    });
     */
</script>

</script>



<!--5. 页面完成加载后，为Species筛选栏的button赋予路由跳转的功能，激活时搜索条件，取消激活时条件去除-->
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

<!--6. 页面完成加载后，为Experiment筛选栏的button赋予路由跳转的功能，激活时搜索条件，取消激活时条件去除-->
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



<?php
include "./templates/footer.php";
?>



</body>
</html>





