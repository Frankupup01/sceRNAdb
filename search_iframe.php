
<?php
include "./templates/base.php";
?>


<style>
    .card {
        margin-bottom: 20px;      /* 卡片下方的空隙 */
    }
</style>

<style>
    .custom-title {
        font-size: 20px;
        font-weight: bold;
        color: #3c53ad;
        font-family: 'Arial', sans-serif;
        /*text-align: center;
        text-transform: uppercase;
        letter-spacing: 2px;
        background-color: #f0f0f0;
        padding: 10px;
        border-radius: 8px;  圆角边框 */
    }
</style>

<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>



<!-- id=search_region -->

<script type="text/javascript">
    function reinitIfra(){
        var iframe = document.getElementById("search_region");
        try{
            var bHeight = iframe.contentWindow.document.body.scrollHeight;
            var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
            var height = Math.max(bHeight, dHeight);
            height = Math.min(height, 800); // 设置最大高度限制
            iframe.height = height;
// console.log(height);
        }catch (ex){}
    }
    window.setInterval("reinitIfra()", 200);
</script>




<!-- id=search_study -->
<!--
<script type="text/javascript">
    function reinitIfram(){
        var iframe = document.getElementById("search_study");
        try{
            var bHeight = iframe.contentWindow.document.body.scrollHeight;
            var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
            var height = Math.max(bHeight, dHeight);
            iframe.height = height;
// console.log(height);
        }catch (ex){}
    }
    window.setInterval("reinitIfram()", 500);
</script>
-->


<!-- 4 点击触发下拉栏 -->
<script>
    /*
    $(document).ready(function(){
        $('.card-header').click(function(){
            var $collapse = $(this).next('.collapse');
            $collapse.collapse('toggle');
        });
    });*/

    $(document).ready(function(){
        $('.card-header').click(function(){
            // 关闭所有已展开的卡片
            $('.collapse.show').not($(this).next('.collapse')).collapse('hide');

            // 切换当前点击的卡片
            var $collapse = $(this).next('.collapse');
            $collapse.collapse('toggle');
        });
    });
</script>




<div class="container" id="body">
    <div id="accordion" style="margin-top: 10px;">

        <!-- Genomic Region search开始 id:te-->
        <div class="card mt-0">
            <div class="card-header bg-gradient-freestyle" style="line-height:0.1;">
                <a class="card-link font-weight-bold h5" data-toggle="collapse" href="#collapseGenomicRegion">
                    Search by <span style="color: #63938c;"> Genomic Region</span>
                </a>
            </div>
            <!--class = collapse show是设置默认为展开-->
            <div id="collapseGenomicRegion" class="collapse show" data-parent="#accordion">
                <div class="card-body">
                    <iframe src="./templates/iframe/iframe_region.php" frameborder="no" height="250px" width='100%' id="search_region"></iframe>
                </div>
            </div>
        </div>
        <!-- Genomic Region search结束 -->






        <!-- Study search开始 no id -->
        <div class="card mt-0">
            <div class="card-header bg-gradient-freestyle" style="line-height:0.1;">
                <a class="card-link font-weight-bold h5" data-toggle="collapse" href="#collapseStudy">
                    Search by <span style="color: #63938c;">Study</span>
                </a>
            </div>
            <div id="collapseStudy" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <iframe src="./templates/iframe/iframe_studyid.php" frameborder="no" height="290px" width='100%' ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Study search结束-->


        <!-- Tissue search开始 no id -->
        <!--
        <div class="card mt-0">
            <div class="card-header bg-gradient-freestyle" style="line-height:0.1;">
                <a class="card-link font-weight-bold h5" data-toggle="collapse" href="#collapseStudy">
                    Search by <span style="color: #63938c;">Tissue</span>
                </a>
            </div>
            <div id="collapseStudy" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <iframe src="./templates/iframe/iframe_t.php" frameborder="no" height="290px" width='100%' ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <!-- Tissue search结束-->

        <div class="card mt-0">
            <div class="card-header bg-gradient-freestyle" style="line-height:0.1;" >
                <a class="card-link font-weight-bold h5" data-toggle="collapse" href="#collapseCellTissue">
                    <!--style="font-size: 18px;"-->
                    <i class="ni ni-zoom-split-in text-white-50"></i> <span class="glyphicon glyphicon-arrow-down"></span>Search by <span style="color: #63938c;">Tissue/ Cell type</span>
                </a>
            </div>
            <div id="collapseCellTissue" class="collapse" data-parent="#accordion" >
                <div class="row" style="padding: 25px;">
                <div class="card-body col-lg-6">
                    <h1 style="font-size: 14px;" class="custom-title">Search by Tissue Type</h1>
                    <iframe src="templates/iframe/iframe_tissue.php" frameborder="no" height="300px" width='100%' id="test"></iframe>
                </div>
                <div class="card-body col-lg-6">
                    <h1 style="font-size: 14px;" class="custom-title">Search by Cell Type</h1>
                    <iframe src="templates/iframe/iframe_cell.php" frameborder="no" height="300px" width='100%' id="tes"></iframe>
                </div>
                </div>
            </div>
        </div>


        <div class="card mt-0">
            <div class="card-header bg-gradient-freestyle" style="line-height:0.1;">
                <a class="card-link font-weight-bold h5" data-toggle="collapse" href="#collapseStudy">
                    Search by <span style="color: #63938c;">Single Sample</span>
                </a>
            </div>
            <div id="collapseStudy" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <iframe src="./templates/iframe/iframe_sample.php" frameborder="no" height="450px" width='100%' ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>






<!--include footer-->
<?php
include "./templates/footer.php";
?>






</body>
</html>
