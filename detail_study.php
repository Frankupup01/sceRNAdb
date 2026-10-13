<?php
include "./templates/base.php";
?>


<style>
    .datatable-wrapper {
        overflow-x: auto;  /* 水平滚动 */
        -webkit-overflow-scrolling: touch; /* 在触摸设备上提供平滑滚动 */
    }

    #dataset_sample{
        width: 800px;
    }

    /* 让所有单元格的内容居中 */
    #dataset_erna td, #dataset_erna th {
        text-align: center;
    }


    #marker_features.table {
        table-layout: fixed; /* 固定列宽 */
        width: 100%;
        max-width: 100%; /* 限制表格最大宽度 */
    }

    #marker_features. td, th {
        word-wrap: break-word;
        overflow: hidden;
        text-overflow: ellipsis; /* 超出部分显示省略号 */
    }
</style>


<style>

    #downloadContainer.container {
        display: flex;
        flex-wrap: wrap;
        gap: 60px;
        justify-content: center;
        align-items: center;
        max-width: 1000px;
    }
    .box {
        width: 240px;
        height: 120px;
        background: linear-gradient(45deg, #1e3c72, #f8cdda);
        /*background: linear-gradient(45deg, #f8cdda, #1e3c72);*/
        /*background: linear-gradient(45deg, #ff5f6d, #ffc3a0);*/
        border-radius: 7px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        transition: transform 0.2s ease-in-out;
    }
    .box:hover {
        transform: scale(1.1);
    }
    .box:active {
        transform: scale(0.95);
    }
    .box p {
        margin: 0;
    }

</style>


<style>

        /* 动态按钮结构 */
    .animated-button {
        position: relative;
        overflow: hidden; /* 让波纹动画不会超出按钮 */
        font-size: 28px;
        padding: 10px 30px;
        font-weight: bold;
        border-radius: 25px;
        border: none;
        cursor: pointer;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
    }

    /* 波纹点击动画核心 */
    .ripple {
        position: absolute;
        background: rgba(255, 255, 255, 0.6);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple-effect 0.5s linear;
        width: 100px;
        height: 100px;
        pointer-events: none;
    }

    @keyframes ripple-effect {
        to {
            transform: scale(3);
            opacity: 0;
        }
    }

    /* 渐变按钮样式：红→橙 */
    .gradient-red-button {
        background: linear-gradient(135deg, #ff5f6d, #ffc371);
    }

    .gradient-red-button:hover {
        background: linear-gradient(-135deg, #ff5f6d, #ffc371);
    }

    /* 渐变按钮样式：蓝→青 */
    .gradient-blue-button {
        background: linear-gradient(135deg, #36d1dc, #5b86e5);
    }

    .gradient-blue-button:hover {
        background: linear-gradient(-135deg, #36d1dc, #5b86e5);
    }

    /* 提示文本 */
    .rna-label {
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .red-label {
        color: red;
    }

    .blue-label {
        color: #0b63d4;
    }

</style>


<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>

<div class="container" style="width: 100%; padding-left: 95px;padding-right: 100px;">
    <div class="col-lg-12" style="width: 100%; margin: 0 auto;">

        <div class="container-fluid" >
            <div class="row">

                <!--Summary-->
                <div class="card" id="c0" style="margin-top:10px; margin-bottom: 10px; padding-right: 0; padding-left: 0;">
                        <div class="card-header" id="card-h0" style="width: 100%; height: 80px; color: #0362a4; font-size: larger; font-weight: bolder; display: flex; align-items: center;">
                            <img src="./public/image/folder-svgrepo-com.svg" alt="SVG Image" style="width: 80px; height: 80px; margin-right: 10px;">
                            <span style="font-size: 28px;">Summary</span>
                        </div>
                    <div class="card-body" id="content"></div>
                </div>

                <!--Sample List-->
                <div class="card" id="c1" style="margin-bottom:10px; padding-right: 0; padding-left: 0;">
                    <div class="card-header" style="width: 100%; height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">

                        <img src="./public/image/96WellPlate0001.svg" alt="SVG Image" style="width: 80px; height: 80px;margin-right: 10px;">
                        <span style="font-size: 28px;">Sample</span>

                        <!--<svg width="40" height="40" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M557.523 500.875l12.665-29.713 56.666 24.153-12.665 29.713z" fill="#0362a4"></path><path d="M628.1 496.8l-53.7-22.9c-6.1-2.6-8.9-9.7-6.3-15.7l105.6-247.8c2.6-6.1 9.7-8.9 15.7-6.3l65.3 27.8c6.1 2.6 8.9 9.7 6.3 15.7L660.4 483.8c-5.3 12.4-19.8 18.3-32.3 13z" fill="#0362a4"></path><path d="M712.2 691.8H472.1c-5.5 0-10-4.5-10-10v-16.4c0-5.5 4.5-10 10-10h240.1c5.5 0 10 4.5 10 10v16.4c0 5.6-4.5 10-10 10z m-240.1-28.3c-1.1 0-2 0.9-2 2v16.4c0 1.1 0.9 2 2 2h240.1c1.1 0 2-0.9 2-2v-16.4c0-1.1-0.9-2-2-2H472.1z" fill="#CE0202"></path><path d="M563.872 418.964l3.161-7.349 101.322 43.58-3.161 7.349z" fill="#FFFFFF"></path><path d="M563.307 469.962l3.137-7.359 64.025 27.29-3.136 7.36z" fill="#999999"></path><path d="M683.8 937.4H358.2c-9.9 0-18-8.1-18-18v-4l42.2-28.3c2.9-2.9 6.8-4.6 10.9-4.6h84.4V782h-9.1c-63.7-0.1-123.7-25.1-169-70.5s-70.3-105.4-70.3-169.1 25-123.9 70.4-169.2 105.5-70.4 169.2-70.4h132.5l44.9-108c8.4-19.9 31.3-29.2 51.1-20.8l48.4 20.4c19.8 8.4 29.2 31.3 20.8 51.1l-98.5 235.4c-6.1 14.4-20.2 23.7-35.5 23.9L618 539.4l-78.5-33.1 14.8-35.2c-9.7-11.1-12.4-26.9-6.6-40.8l11-26.2h-80.5c-36.8 0-71.5 14.4-97.7 40.7-26.2 26.2-40.7 60.9-40.7 97.7v0.3c0 36.8 14.4 71.5 40.7 97.7 26.2 26.2 60.9 40.7 97.7 40.7h241.7c27.3 0 50.4 22.8 50.4 49.8v1.8c0 27.3-22.2 49.5-49.5 49.5H564.2v100.5h84.4c4.1 0 8 1.6 10.9 4.6l42.3 28.3v4c0 9.7-8.1 17.7-18 17.7zM357 922.2c0.4 0.2 0.8 0.2 1.2 0.2h325.6c0.4 0 0.8-0.1 1.2-0.2l-35.4-23.8-0.7-0.8c0-0.1-0.1-0.1-0.2-0.1h-99.4V767H721c19 0 34.5-15.5 34.5-34.5v-1.8c0-18.9-16.2-34.8-35.4-34.8H478.4c-40.8 0-79.3-16-108.3-45s-45-67.5-45-108.3v-0.3c0-40.8 16-79.3 45-108.3s67.5-45 108.3-45h103.1l-19.8 47c-4.1 9.6-1.4 20.7 6.5 27.6l4.1 3.6-13.1 31.1 50.9 21.4 13-30.9 5.7 0.8c10.8 1.5 21.3-4.4 25.5-14.4l98.5-235.4c2.5-5.9 2.5-12.4 0.1-18.4s-7-10.6-12.9-13.1l-48.4-20.4c-5.9-2.5-12.4-2.5-18.4-0.1s-10.6 7-13.1 12.9L611.4 318H469.1c-59.7 0-116.1 23.4-158.6 66s-66 98.9-66 158.6 23.4 116 65.9 158.5 98.8 66 158.5 66.1h24v130.5h-99.4c-0.1 0-0.2 0-0.3 0.1l-0.7 0.8-35.5 23.6z" fill="#999999"></path><path d="M756.4 211.6l-73.1-31 20.3-48 8.7 3.7 14.8-35c3.1-7.4 11.6-10.8 19-7.7l29 12.3c3.6 1.5 6.3 4.3 7.8 7.9s1.4 7.5-0.1 11.1l-14.8 35 8.7 3.7-20.3 48z m-62.6-35.2l58.4 24.7 14.1-33.3-8.7-3.7 18-42.4c0.7-1.6 0.7-3.4 0-5s-1.9-2.9-3.5-3.5l-29-12.3c-3.3-1.4-7.1 0.1-8.5 3.5l-17.9 42.4-8.7-3.7-14.2 33.3z" fill="#999999"></path><path d="M712.951 145.293l3.121-7.366 6.814 2.886-3.12 7.367zM732.23 153.49l3.12-7.366 28.085 11.898-3.12 7.366z" fill="#999999"></path><path d="M477.7 672.1H714v8.4H477.7z" fill="#0362a4"></path></g></svg>
                    -->
                    </div>
                    <div class="card-body">
                    <!--<div class="table-responsive">-->
                        <div class="card-body">
                            <table id="dataset_sample" class="table table-hover table-bordered w-100" style="vertical-align: middle;">
                                <thead style="vertical-align: middle;">
                                <tr>
                                    <th>Dataset ID</th>
                                    <th>Sample ID</th>
                                    <th>View</th>
                                    <th>Sample Name</th>
                                    <th>Source</th>
                                    <th>Species</th>
                                    <th>Tissue</th>
                                    <th>Technology</th>
                                    <th>Platforms</th>
                                    <th>Cell type</th>
                                    <th>Disease</th>
                                    <th>Organ parts</th>
                                    <th>Development stage</th>
                                    <th>Sex</th>
                                    <th>Treatment</th>
                                    <th>Phenotype</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!--</div>-->
                </div>
                <div id="rna-switch-container" style="text-align: center; margin: 30px 0;"></div>

                <!--<img
                        src="./public/image/ChangeButton/T-S.png"
                        alt="Clickable Image"
                        style="cursor: pointer;"
                        onclick="redirectToSEVersion()"
                />


                <script>
                    function redirectToSEVersion() {
                        // 获取当前 URL
                        const currentUrl = window.location.href;

                        // 替换 detail_study.php 为 detail_study_SE.php
                        const newUrl = currentUrl.replace("detail_study.php", "detail_study_SE.php");

                        // 跳转到新 URL
                        window.location.href = newUrl;
                    }
                </script> -->

                <!--eRNA List-->
                <div class="card" id="c2" style="margin-bottom:10px;padding-right: 0; padding-left: 0;">
                    <div class="card-header" style="width: 100%; height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">

                        <img src="./public/image/Translation0001.svg" alt="SVG Image" style="width: 80px; height: 80px;margin-right: 10px;">
                        <span style="font-size: 28px;">Typical Enhancer RNA</span>

                        <!--<svg width="40" height="40" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M557.523 500.875l12.665-29.713 56.666 24.153-12.665 29.713z" fill="#0362a4"></path><path d="M628.1 496.8l-53.7-22.9c-6.1-2.6-8.9-9.7-6.3-15.7l105.6-247.8c2.6-6.1 9.7-8.9 15.7-6.3l65.3 27.8c6.1 2.6 8.9 9.7 6.3 15.7L660.4 483.8c-5.3 12.4-19.8 18.3-32.3 13z" fill="#0362a4"></path><path d="M712.2 691.8H472.1c-5.5 0-10-4.5-10-10v-16.4c0-5.5 4.5-10 10-10h240.1c5.5 0 10 4.5 10 10v16.4c0 5.6-4.5 10-10 10z m-240.1-28.3c-1.1 0-2 0.9-2 2v16.4c0 1.1 0.9 2 2 2h240.1c1.1 0 2-0.9 2-2v-16.4c0-1.1-0.9-2-2-2H472.1z" fill="#CE0202"></path><path d="M563.872 418.964l3.161-7.349 101.322 43.58-3.161 7.349z" fill="#FFFFFF"></path><path d="M563.307 469.962l3.137-7.359 64.025 27.29-3.136 7.36z" fill="#999999"></path><path d="M683.8 937.4H358.2c-9.9 0-18-8.1-18-18v-4l42.2-28.3c2.9-2.9 6.8-4.6 10.9-4.6h84.4V782h-9.1c-63.7-0.1-123.7-25.1-169-70.5s-70.3-105.4-70.3-169.1 25-123.9 70.4-169.2 105.5-70.4 169.2-70.4h132.5l44.9-108c8.4-19.9 31.3-29.2 51.1-20.8l48.4 20.4c19.8 8.4 29.2 31.3 20.8 51.1l-98.5 235.4c-6.1 14.4-20.2 23.7-35.5 23.9L618 539.4l-78.5-33.1 14.8-35.2c-9.7-11.1-12.4-26.9-6.6-40.8l11-26.2h-80.5c-36.8 0-71.5 14.4-97.7 40.7-26.2 26.2-40.7 60.9-40.7 97.7v0.3c0 36.8 14.4 71.5 40.7 97.7 26.2 26.2 60.9 40.7 97.7 40.7h241.7c27.3 0 50.4 22.8 50.4 49.8v1.8c0 27.3-22.2 49.5-49.5 49.5H564.2v100.5h84.4c4.1 0 8 1.6 10.9 4.6l42.3 28.3v4c0 9.7-8.1 17.7-18 17.7zM357 922.2c0.4 0.2 0.8 0.2 1.2 0.2h325.6c0.4 0 0.8-0.1 1.2-0.2l-35.4-23.8-0.7-0.8c0-0.1-0.1-0.1-0.2-0.1h-99.4V767H721c19 0 34.5-15.5 34.5-34.5v-1.8c0-18.9-16.2-34.8-35.4-34.8H478.4c-40.8 0-79.3-16-108.3-45s-45-67.5-45-108.3v-0.3c0-40.8 16-79.3 45-108.3s67.5-45 108.3-45h103.1l-19.8 47c-4.1 9.6-1.4 20.7 6.5 27.6l4.1 3.6-13.1 31.1 50.9 21.4 13-30.9 5.7 0.8c10.8 1.5 21.3-4.4 25.5-14.4l98.5-235.4c2.5-5.9 2.5-12.4 0.1-18.4s-7-10.6-12.9-13.1l-48.4-20.4c-5.9-2.5-12.4-2.5-18.4-0.1s-10.6 7-13.1 12.9L611.4 318H469.1c-59.7 0-116.1 23.4-158.6 66s-66 98.9-66 158.6 23.4 116 65.9 158.5 98.8 66 158.5 66.1h24v130.5h-99.4c-0.1 0-0.2 0-0.3 0.1l-0.7 0.8-35.5 23.6z" fill="#999999"></path><path d="M756.4 211.6l-73.1-31 20.3-48 8.7 3.7 14.8-35c3.1-7.4 11.6-10.8 19-7.7l29 12.3c3.6 1.5 6.3 4.3 7.8 7.9s1.4 7.5-0.1 11.1l-14.8 35 8.7 3.7-20.3 48z m-62.6-35.2l58.4 24.7 14.1-33.3-8.7-3.7 18-42.4c0.7-1.6 0.7-3.4 0-5s-1.9-2.9-3.5-3.5l-29-12.3c-3.3-1.4-7.1 0.1-8.5 3.5l-17.9 42.4-8.7-3.7-14.2 33.3z" fill="#999999"></path><path d="M712.951 145.293l3.121-7.366 6.814 2.886-3.12 7.367zM732.23 153.49l3.12-7.366 28.085 11.898-3.12 7.366z" fill="#999999"></path><path d="M477.7 672.1H714v8.4H477.7z" fill="#0362a4"></path></g></svg>
                    -->
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">

                    <!--<div class="table-responsive">-->
                    <div class="card-body">
                        <table id="dataset_erna" class="table table-hover table-bordered" style="width: 100%;vertical-align: middle;max-width: 100%; overflow-x: auto; table-layout: auto;">
                            <thead style="vertical-align: middle;">
                            <tr>
                                <th>eRNA ID</th>
                                <th>eRNA expression</th>
                                <th>Chrom</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Genome Browser</th>
                                <th>Annotation</th>
                                <th>Candidate Target genes</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!--</div>-->
                        </div>
                    </div>
                    </div>
                </div>

                <!--UMAP-->
                <!--Violin-->
                <div class="modal fade" id="plotModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document" style="max-width: 90%; margin-top: 5vh;">
                        <div class="modal-content" style="border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">

                            <div class="modal-header" style="position: relative; background-color: #f8f9fa; border-bottom: 2px solid #0362a4; display: flex; align-items: center;">

                                <h5 class="modal-title" id="plotModalLabel" style="color: #0362a4; font-weight: bold; font-size: 20px; margin: 0; z-index: 5;"></h5>

                                <div id="modal-switch-buttons" style="display: none; position: absolute; left: 50%; transform: translateX(-50%); z-index: 5;">
                                    <button class="btn btn-primary active" id="btn-modal-umap" style="margin-right: 10px;"> UMAP (Expression)</button>
                                    <button class="btn btn-outline-primary" id="btn-modal-violin"> Violin Plot</button>
                                </div>

                                <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); z-index: 1050; border: none; background: transparent; font-size: 32px; cursor: pointer; color: #0362a4;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body" style="padding: 0; background-color: white;">
                                <iframe id="modal-iframe" src="" width="100%" height="650px" frameborder="0" style="display: block;"></iframe>
                            </div>

                        </div>
                    </div>
                </div>

                <!--QC-->
                <div class="card" id="c5" style="margin-bottom: 10px;padding-right: 0; padding-left: 0;">
                    <div class="card-header" style="width: 100%; height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">

                        <img src="./public/image/SuperResolutionFluorescenceMicroscopy0001.svg" alt="SVG Image" style="width: 70px; height: 70px; margin-right: 10px;">
                        <span style="font-size: 28px;">Statistic</span>

                        <!--<svg width="40" height="40" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M557.523 500.875l12.665-29.713 56.666 24.153-12.665 29.713z" fill="#0362a4"></path><path d="M628.1 496.8l-53.7-22.9c-6.1-2.6-8.9-9.7-6.3-15.7l105.6-247.8c2.6-6.1 9.7-8.9 15.7-6.3l65.3 27.8c6.1 2.6 8.9 9.7 6.3 15.7L660.4 483.8c-5.3 12.4-19.8 18.3-32.3 13z" fill="#0362a4"></path><path d="M712.2 691.8H472.1c-5.5 0-10-4.5-10-10v-16.4c0-5.5 4.5-10 10-10h240.1c5.5 0 10 4.5 10 10v16.4c0 5.6-4.5 10-10 10z m-240.1-28.3c-1.1 0-2 0.9-2 2v16.4c0 1.1 0.9 2 2 2h240.1c1.1 0 2-0.9 2-2v-16.4c0-1.1-0.9-2-2-2H472.1z" fill="#CE0202"></path><path d="M563.872 418.964l3.161-7.349 101.322 43.58-3.161 7.349z" fill="#FFFFFF"></path><path d="M563.307 469.962l3.137-7.359 64.025 27.29-3.136 7.36z" fill="#999999"></path><path d="M683.8 937.4H358.2c-9.9 0-18-8.1-18-18v-4l42.2-28.3c2.9-2.9 6.8-4.6 10.9-4.6h84.4V782h-9.1c-63.7-0.1-123.7-25.1-169-70.5s-70.3-105.4-70.3-169.1 25-123.9 70.4-169.2 105.5-70.4 169.2-70.4h132.5l44.9-108c8.4-19.9 31.3-29.2 51.1-20.8l48.4 20.4c19.8 8.4 29.2 31.3 20.8 51.1l-98.5 235.4c-6.1 14.4-20.2 23.7-35.5 23.9L618 539.4l-78.5-33.1 14.8-35.2c-9.7-11.1-12.4-26.9-6.6-40.8l11-26.2h-80.5c-36.8 0-71.5 14.4-97.7 40.7-26.2 26.2-40.7 60.9-40.7 97.7v0.3c0 36.8 14.4 71.5 40.7 97.7 26.2 26.2 60.9 40.7 97.7 40.7h241.7c27.3 0 50.4 22.8 50.4 49.8v1.8c0 27.3-22.2 49.5-49.5 49.5H564.2v100.5h84.4c4.1 0 8 1.6 10.9 4.6l42.3 28.3v4c0 9.7-8.1 17.7-18 17.7zM357 922.2c0.4 0.2 0.8 0.2 1.2 0.2h325.6c0.4 0 0.8-0.1 1.2-0.2l-35.4-23.8-0.7-0.8c0-0.1-0.1-0.1-0.2-0.1h-99.4V767H721c19 0 34.5-15.5 34.5-34.5v-1.8c0-18.9-16.2-34.8-35.4-34.8H478.4c-40.8 0-79.3-16-108.3-45s-45-67.5-45-108.3v-0.3c0-40.8 16-79.3 45-108.3s67.5-45 108.3-45h103.1l-19.8 47c-4.1 9.6-1.4 20.7 6.5 27.6l4.1 3.6-13.1 31.1 50.9 21.4 13-30.9 5.7 0.8c10.8 1.5 21.3-4.4 25.5-14.4l98.5-235.4c2.5-5.9 2.5-12.4 0.1-18.4s-7-10.6-12.9-13.1l-48.4-20.4c-5.9-2.5-12.4-2.5-18.4-0.1s-10.6 7-13.1 12.9L611.4 318H469.1c-59.7 0-116.1 23.4-158.6 66s-66 98.9-66 158.6 23.4 116 65.9 158.5 98.8 66 158.5 66.1h24v130.5h-99.4c-0.1 0-0.2 0-0.3 0.1l-0.7 0.8-35.5 23.6z" fill="#999999"></path><path d="M756.4 211.6l-73.1-31 20.3-48 8.7 3.7 14.8-35c3.1-7.4 11.6-10.8 19-7.7l29 12.3c3.6 1.5 6.3 4.3 7.8 7.9s1.4 7.5-0.1 11.1l-14.8 35 8.7 3.7-20.3 48z m-62.6-35.2l58.4 24.7 14.1-33.3-8.7-3.7 18-42.4c0.7-1.6 0.7-3.4 0-5s-1.9-2.9-3.5-3.5l-29-12.3c-3.3-1.4-7.1 0.1-8.5 3.5l-17.9 42.4-8.7-3.7-14.2 33.3z" fill="#999999"></path><path d="M712.951 145.293l3.121-7.366 6.814 2.886-3.12 7.367zM732.23 153.49l3.12-7.366 28.085 11.898-3.12 7.366z" fill="#999999"></path><path d="M477.7 672.1H714v8.4H477.7z" fill="#0362a4"></path></g></svg>
                    -->
                    </div>
                    <div class="card-body">

                        <h4 style="color: #df4759">QC info</h4>

                        <!--插入质控图片-->
                        <div class="row" style="display: flex; justify-content: center; align-items: center;" >
                            <img id="QC_Image" src="" alt="Dynamic Image" style="width: 100%; max-height:400px; width: auto">
                        </div>

                        <br>
                        <ul class="q-mb-md">
                            <li style="font-weight: bolder">Violin plots of cell quality control (QC) metrics:</li>
                            <li style="font-weight: bolder">The number of expressed genes and the total expression levels (TPM) per cell.</li>
                        </ul>

                        <hr>

                        <!--Statistic-->
                        <div class="row" style="display: flex; justify-content: center; align-items: center;">
                            <h4 style="color: #0dcaf0">Cluster info</h4>
                            <div class="col-lg-6">
                                <div id="cell_num_cluster" style="width: 100%; height: 400px"></div>
                            </div>
                            <div class="col-lg-6">
                                <div id="eRNA_num_cluster" style="width: 100%;height: 400px"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <!--</div>-->
                <!--Marker plot-->
                <div class="card" id="c6" style="margin-bottom: 10px;padding-right: 0; padding-left: 0;">
                    <div class="card-header" style="width: 100%;  height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">

                        <img src="./public/image/GeneMutation0001.svg" alt="SVG Image" style="width: 80px; height: 80px;margin-right: 10px;">
                        <span style="font-size: 28px;">Marker features</span>

                        <!--<svg width="40" height="40" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M557.523 500.875l12.665-29.713 56.666 24.153-12.665 29.713z" fill="#0362a4"></path><path d="M628.1 496.8l-53.7-22.9c-6.1-2.6-8.9-9.7-6.3-15.7l105.6-247.8c2.6-6.1 9.7-8.9 15.7-6.3l65.3 27.8c6.1 2.6 8.9 9.7 6.3 15.7L660.4 483.8c-5.3 12.4-19.8 18.3-32.3 13z" fill="#0362a4"></path><path d="M712.2 691.8H472.1c-5.5 0-10-4.5-10-10v-16.4c0-5.5 4.5-10 10-10h240.1c5.5 0 10 4.5 10 10v16.4c0 5.6-4.5 10-10 10z m-240.1-28.3c-1.1 0-2 0.9-2 2v16.4c0 1.1 0.9 2 2 2h240.1c1.1 0 2-0.9 2-2v-16.4c0-1.1-0.9-2-2-2H472.1z" fill="#CE0202"></path><path d="M563.872 418.964l3.161-7.349 101.322 43.58-3.161 7.349z" fill="#FFFFFF"></path><path d="M563.307 469.962l3.137-7.359 64.025 27.29-3.136 7.36z" fill="#999999"></path><path d="M683.8 937.4H358.2c-9.9 0-18-8.1-18-18v-4l42.2-28.3c2.9-2.9 6.8-4.6 10.9-4.6h84.4V782h-9.1c-63.7-0.1-123.7-25.1-169-70.5s-70.3-105.4-70.3-169.1 25-123.9 70.4-169.2 105.5-70.4 169.2-70.4h132.5l44.9-108c8.4-19.9 31.3-29.2 51.1-20.8l48.4 20.4c19.8 8.4 29.2 31.3 20.8 51.1l-98.5 235.4c-6.1 14.4-20.2 23.7-35.5 23.9L618 539.4l-78.5-33.1 14.8-35.2c-9.7-11.1-12.4-26.9-6.6-40.8l11-26.2h-80.5c-36.8 0-71.5 14.4-97.7 40.7-26.2 26.2-40.7 60.9-40.7 97.7v0.3c0 36.8 14.4 71.5 40.7 97.7 26.2 26.2 60.9 40.7 97.7 40.7h241.7c27.3 0 50.4 22.8 50.4 49.8v1.8c0 27.3-22.2 49.5-49.5 49.5H564.2v100.5h84.4c4.1 0 8 1.6 10.9 4.6l42.3 28.3v4c0 9.7-8.1 17.7-18 17.7zM357 922.2c0.4 0.2 0.8 0.2 1.2 0.2h325.6c0.4 0 0.8-0.1 1.2-0.2l-35.4-23.8-0.7-0.8c0-0.1-0.1-0.1-0.2-0.1h-99.4V767H721c19 0 34.5-15.5 34.5-34.5v-1.8c0-18.9-16.2-34.8-35.4-34.8H478.4c-40.8 0-79.3-16-108.3-45s-45-67.5-45-108.3v-0.3c0-40.8 16-79.3 45-108.3s67.5-45 108.3-45h103.1l-19.8 47c-4.1 9.6-1.4 20.7 6.5 27.6l4.1 3.6-13.1 31.1 50.9 21.4 13-30.9 5.7 0.8c10.8 1.5 21.3-4.4 25.5-14.4l98.5-235.4c2.5-5.9 2.5-12.4 0.1-18.4s-7-10.6-12.9-13.1l-48.4-20.4c-5.9-2.5-12.4-2.5-18.4-0.1s-10.6 7-13.1 12.9L611.4 318H469.1c-59.7 0-116.1 23.4-158.6 66s-66 98.9-66 158.6 23.4 116 65.9 158.5 98.8 66 158.5 66.1h24v130.5h-99.4c-0.1 0-0.2 0-0.3 0.1l-0.7 0.8-35.5 23.6z" fill="#999999"></path><path d="M756.4 211.6l-73.1-31 20.3-48 8.7 3.7 14.8-35c3.1-7.4 11.6-10.8 19-7.7l29 12.3c3.6 1.5 6.3 4.3 7.8 7.9s1.4 7.5-0.1 11.1l-14.8 35 8.7 3.7-20.3 48z m-62.6-35.2l58.4 24.7 14.1-33.3-8.7-3.7 18-42.4c0.7-1.6 0.7-3.4 0-5s-1.9-2.9-3.5-3.5l-29-12.3c-3.3-1.4-7.1 0.1-8.5 3.5l-17.9 42.4-8.7-3.7-14.2 33.3z" fill="#999999"></path><path d="M712.951 145.293l3.121-7.366 6.814 2.886-3.12 7.367zM732.23 153.49l3.12-7.366 28.085 11.898-3.12 7.366z" fill="#999999"></path><path d="M477.7 672.1H714v8.4H477.7z" fill="#0362a4"></path></g></svg>
                    -->
                    </div>
                    <div class="card-body">

                        <h5> Cluster specific markers</h5>

                        <div class="btn-group mt-3" role="group" aria-label="Image Buttons" style="margin-bottom: 15px">
                            <button type="button" class="btn btn-primary" id="btnA">Top10 Genes</button>
                            <button type="button" class="btn btn-primary" id="btnB">Top10 eRNAs</button>

                            <button type="button" class="btn btn-primary" id="btnC">All Genes</button>
                            <button type="button" class="btn btn-primary" id="btnD">All eRNAs</button>
                        </div>
                        <br>
                        <a>This heatmap visualizes the expression levels of cluster-specific markers (genes/eRNAs). The x-axis represents the markers, the y-axis represents the cell clusters, and color intensity indicates expression abundance.</a>
                        <br>
                        <a id="a-marker" style="font-weight: bolder; margin-bottom: 5px"> Heatmap of the expression of the top 10 marker genes (bottom) for each cluster (left).</a>

                        <!-- 按钮区域 (Download 和 新增的 Zoom 按钮) -->
                        <!-- 按钮区域 (Download 和 新增的 Zoom 按钮) -->
                        <div style="display: flex; justify-content: flex-end; width: 100%; gap: 10px; margin-bottom: 15px;">

                            <!-- 放大镜开关按钮 (样式已和 Download 统一) -->
                            <button id="toggleZoomBtn" class="btn btn-sm" style="background-color: #FFFFFF; color: #243675; border: 1px solid #ccc; border-radius: 5px; cursor: pointer; display: flex; align-items: center; transition: all 0.2s;">
                                <svg width="16" height="16" fill="currentColor" class="bi bi-zoom-in" viewBox="0 0 16 16" style="margin-right: 5px;">
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                    <path d="M10.344 11.758a.5.5 0 0 0 .707 0l3.905-3.905a.5.5 0 0 0-.708-.708L10.344 11.05a.5.5 0 0 0 0 .707z"/>
                                    <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                <span id="zoomBtnText">Enable Zoom</span>
                            </button>

                            <!-- 原本的 Download 按钮 -->
                            <button id="downloadBtn" class="btn btn-sm" style="background-color: #FFFFFF; color: #243675; border: 1px solid #ccc; border-radius: 5px; cursor: pointer; display: flex; align-items: center;">
                                <svg width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16" style="margin-right: 5px;">
                                    <path d="M8 0a.5.5 0 0 1 .5.5v8.793l2.354-2.354a.5.5 0 1 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 8.293V.5A.5.5 0 0 1 8 0z"/>
                                    <path d="M0 13a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-1z"/>
                                </svg>
                                Download Figure
                            </button>
                        </div>

                        <!-- 插入图片 -->
                        <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
                            <div id="heatmap-zoom-container" style="position: relative; overflow: hidden; display: inline-block; border: 1px solid #eee; border-radius: 4px;">
                                <img id="eRNA_Image" src="" alt="Dynamic Image" style="max-height: 400px; max-width: 100%; width: auto; transition: transform 0.1s ease-out; transform-origin: center center;">
                            </div>
                        </div>
                        <!-- 下载按钮和SVG图标 -->
                        <hr>
                        <!--Marker Table-->
                        <div class="row">
                            <div class="col-lg-12">
                                <table id="marker_features" class="table table-hover table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                                    <!--class="table table-hover table-striped table-bordered"-->
                                    <thead style="vertical-align: middle;">
                                    <tr>
                                        <th id="dynamic-name-header">Gene Name</th>
                                        <th>Adjusted P-value</th>
                                        <th>P-value</th>
                                        <th>Log2 Fold Change</th>
                                        <th>Cluster</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>


                <!--Data Download Resources-->
                <div class="card" id="c7" style="margin-bottom: 15px;padding-right: 0; padding-left: 0;">
                    <div class="card-header" style="width: 100%;  height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">

                        <img src="./public/image/NextGenSequ0001.svg" alt="SVG Image" style="width: 80px; height: 80px;margin-right: 10px;">
                        <span style="font-size: 28px;">Data&nbsp;</span><span style="font-size: 28px;color: #ffc107">R</span><span style="font-size: 28px;">esource</span>

                        <!--<svg width="40" height="40" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M557.523 500.875l12.665-29.713 56.666 24.153-12.665 29.713z" fill="#0362a4"></path><path d="M628.1 496.8l-53.7-22.9c-6.1-2.6-8.9-9.7-6.3-15.7l105.6-247.8c2.6-6.1 9.7-8.9 15.7-6.3l65.3 27.8c6.1 2.6 8.9 9.7 6.3 15.7L660.4 483.8c-5.3 12.4-19.8 18.3-32.3 13z" fill="#0362a4"></path><path d="M712.2 691.8H472.1c-5.5 0-10-4.5-10-10v-16.4c0-5.5 4.5-10 10-10h240.1c5.5 0 10 4.5 10 10v16.4c0 5.6-4.5 10-10 10z m-240.1-28.3c-1.1 0-2 0.9-2 2v16.4c0 1.1 0.9 2 2 2h240.1c1.1 0 2-0.9 2-2v-16.4c0-1.1-0.9-2-2-2H472.1z" fill="#CE0202"></path><path d="M563.872 418.964l3.161-7.349 101.322 43.58-3.161 7.349z" fill="#FFFFFF"></path><path d="M563.307 469.962l3.137-7.359 64.025 27.29-3.136 7.36z" fill="#999999"></path><path d="M683.8 937.4H358.2c-9.9 0-18-8.1-18-18v-4l42.2-28.3c2.9-2.9 6.8-4.6 10.9-4.6h84.4V782h-9.1c-63.7-0.1-123.7-25.1-169-70.5s-70.3-105.4-70.3-169.1 25-123.9 70.4-169.2 105.5-70.4 169.2-70.4h132.5l44.9-108c8.4-19.9 31.3-29.2 51.1-20.8l48.4 20.4c19.8 8.4 29.2 31.3 20.8 51.1l-98.5 235.4c-6.1 14.4-20.2 23.7-35.5 23.9L618 539.4l-78.5-33.1 14.8-35.2c-9.7-11.1-12.4-26.9-6.6-40.8l11-26.2h-80.5c-36.8 0-71.5 14.4-97.7 40.7-26.2 26.2-40.7 60.9-40.7 97.7v0.3c0 36.8 14.4 71.5 40.7 97.7 26.2 26.2 60.9 40.7 97.7 40.7h241.7c27.3 0 50.4 22.8 50.4 49.8v1.8c0 27.3-22.2 49.5-49.5 49.5H564.2v100.5h84.4c4.1 0 8 1.6 10.9 4.6l42.3 28.3v4c0 9.7-8.1 17.7-18 17.7zM357 922.2c0.4 0.2 0.8 0.2 1.2 0.2h325.6c0.4 0 0.8-0.1 1.2-0.2l-35.4-23.8-0.7-0.8c0-0.1-0.1-0.1-0.2-0.1h-99.4V767H721c19 0 34.5-15.5 34.5-34.5v-1.8c0-18.9-16.2-34.8-35.4-34.8H478.4c-40.8 0-79.3-16-108.3-45s-45-67.5-45-108.3v-0.3c0-40.8 16-79.3 45-108.3s67.5-45 108.3-45h103.1l-19.8 47c-4.1 9.6-1.4 20.7 6.5 27.6l4.1 3.6-13.1 31.1 50.9 21.4 13-30.9 5.7 0.8c10.8 1.5 21.3-4.4 25.5-14.4l98.5-235.4c2.5-5.9 2.5-12.4 0.1-18.4s-7-10.6-12.9-13.1l-48.4-20.4c-5.9-2.5-12.4-2.5-18.4-0.1s-10.6 7-13.1 12.9L611.4 318H469.1c-59.7 0-116.1 23.4-158.6 66s-66 98.9-66 158.6 23.4 116 65.9 158.5 98.8 66 158.5 66.1h24v130.5h-99.4c-0.1 0-0.2 0-0.3 0.1l-0.7 0.8-35.5 23.6z" fill="#999999"></path><path d="M756.4 211.6l-73.1-31 20.3-48 8.7 3.7 14.8-35c3.1-7.4 11.6-10.8 19-7.7l29 12.3c3.6 1.5 6.3 4.3 7.8 7.9s1.4 7.5-0.1 11.1l-14.8 35 8.7 3.7-20.3 48z m-62.6-35.2l58.4 24.7 14.1-33.3-8.7-3.7 18-42.4c0.7-1.6 0.7-3.4 0-5s-1.9-2.9-3.5-3.5l-29-12.3c-3.3-1.4-7.1 0.1-8.5 3.5l-17.9 42.4-8.7-3.7-14.2 33.3z" fill="#999999"></path><path d="M712.951 145.293l3.121-7.366 6.814 2.886-3.12 7.367zM732.23 153.49l3.12-7.366 28.085 11.898-3.12 7.366z" fill="#999999"></path><path d="M477.7 672.1H714v8.4H477.7z" fill="#0362a4"></path></g></svg>
                    -->
                    </div>
                    <div class="card-body">
                    <!--<div class="row">
                        <div class="col-lg-12" style="display: flex; align-items: center; margin-bottom: 10px">
                            <h2>&nbsp;Data</h2><h2 style="color:#ffc107">&nbsp;R</h2><h2>esources</h2>
                        </div>
                    </div>-->
                    <div class="container" id="downloadContainer" style="padding-bottom: 10px">
                        <!--
                        <div class="box" onclick="downloadFile('file1.txt')">
                            <p>metadata.csv</p>
                        </div>
                        <div class="box" onclick="downloadFile('file2.pdf')">
                            <p>eRNA.bed</p>
                        </div>
                        <div class="box" onclick="downloadFile('file3.jpg')">
                            <p>eRNA_exp_matrix.csv</p>
                        </div>
                        <div class="box" onclick="downloadFile('file4.zip')">
                            <p>eRNA_cluster_exp.csv</p>
                        </div>
                        <div class="box" onclick="downloadFile('file5.mp4')">
                            <p>gene_DE.csv</p>
                        </div>
                        <div class="box" onclick="downloadFile('file6.docx')">
                            <p>eRNA_DE.csv</p>
                        </div>
                        <div class="box" onclick="downloadFile('file7.mp4')">
                            <p>File 7</p>
                        </div>
                        <div class="box" onclick="downloadFile('file8.docx')">
                            <p>File 8</p>
                        </div>
                        -->
                    </div>
                    </div>
                </div>
            </div>

            </div>
        </div>


    </div>
</div>




<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let sid = params.get("sid"); //sid：这个页面的Study属性；
    let sample_id = params.get("sample_id"); // 新增：获取点击传递过来的 Sample ID
    console.log("SID:", sid, "Sample ID:", sample_id);

    // 动态生成图片URL
    let QC_imageURL = `./public/figures/violin_QC_${sid}.png`;
    console.log(QC_imageURL);
    let eRNA_imageURL = `./public/figures/heatmap_top_gene_${sid}.png`;

</script>

<script>
    // 定义全局变量
    let globalTissue, globalSpecies, globalTechnology, globalAccessions;
</script>

<script>
    $(document).ready(function () {
        // 发送 AJAX 请求
        $.ajax({
            url: './api/dataset_summary.php',
            type: 'POST',
            data: {sid: sid},
            dataType: 'json',
            success: function (response) {
                // 调用函数生成内容
                renderContent(response);
            },
            error: function () {
                $('#content').html('<p style="color:red;">Failed to load data.</p>');
            }
        });

        function renderContent(dataArray) {
            const container = $('#content');
            container.empty(); // 清空内容容器

            dataArray.forEach((item) => {
                const { Tissue, Species, PMID, Platform, Technology,Contributors, SubmissionDate,UpdateDate, DatasetSummary, OverallDesign, Accessions } = item;

                // 1. 处理 Accessions 超链接
                let accessionHTML = "N/A";
                if (sid) {
                    if (sid.startsWith("GSE")) {
                        accessionHTML = `<a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=${encodeURIComponent(sid)}" target="_blank">${sid}</a>`;
                    } else if (sid.startsWith("PRJNA")) {
                        accessionHTML = `<a href="https://www.ncbi.nlm.nih.gov/bioproject/${encodeURIComponent(sid)}" target="_blank">${sid}</a>`;
                    } else if (sid.startsWith("E-")) {
                        accessionHTML = `<a href="https://www.ebi.ac.uk/arrayexpress/experiments/${encodeURIComponent(sid)}/" target="_blank">${sid}</a>`;
                    } else {
                        accessionHTML = sid;
                    }
                }

                // 2. 处理 PMID 超链接逻辑 (剔除 NA 和 N/A)
                let pmidHTML = 'N/A';
                if (PMID && String(PMID).trim() !== '' && String(PMID).toUpperCase() !== 'NA' && String(PMID).toUpperCase() !== 'N/A') {
                    pmidHTML = `<a href="https://pubmed.ncbi.nlm.nih.gov/${encodeURIComponent(PMID)}/" target="_blank">${PMID}</a>`;
                }

                // 将需要的数据赋值给全局变量
                globalTissue = Tissue;
                globalSpecies = Species;
                globalTechnology = Technology;
                globalAccessions = Accessions;

                // 定义统一的排版样式，让左右间距完美贴合
                const labelStyle = "flex: 0 0 450px; font-weight: bold;"; // 标题固定 200px 宽
                const valueStyle = "flex: 1; word-wrap: break-word;";     // 内容占满剩余空间

                // 3. 动态生成 Sample ID 行
                let sampleIdRowHTML = "";
                if (sample_id) {
                    sampleIdRowHTML = `
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Sample ID:</div>
                            <div style="${valueStyle}">${sample_id}</div>
                        </div>`;
                }

                // 4. 渲染核心字段
                container.append(`
                    <div class="row" style="margin-left: 20px; margin-right: 20px;">

                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Accessions:</div>
                            <div style="${valueStyle}">${accessionHTML}</div>
                        </div>

                        ${sampleIdRowHTML}

                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Tissue:</div>
                            <div style="${valueStyle}">${Tissue || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Species:</div>
                            <div style="${valueStyle}">${Species || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">PMID:</div>
                            <div style="${valueStyle}">${pmidHTML}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Platform:</div>
                            <div style="${valueStyle}">${Platform || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Technology:</div>
                            <div style="${valueStyle}">${Technology || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Contributors:</div>
                            <div style="${valueStyle}">${Contributors || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="${labelStyle}">Submission Date:</div>
                            <div style="${valueStyle}">${SubmissionDate || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 20px;">
                            <div style="${labelStyle}">Update Date:</div>
                            <div style="${valueStyle}">${UpdateDate || 'N/A'}</div>
                        </div>

                        <hr style="border-top: 1px dashed #ccc; margin-bottom: 20px;">

                        <div style="margin-bottom: 15px;">
                            <div style="font-weight: bold; margin-bottom: 5px;">Dataset Summary:</div>
                            <p style="text-align: justify;">${DatasetSummary || 'N/A'}</p>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <div style="font-weight: bold; margin-bottom: 5px;">Overall Design:</div>
                            <p style="text-align: justify;">${OverallDesign || 'N/A'}</p>
                        </div>
                    </div>
                `);
            });
        }
    });
</script>

<script>
    //主表格初始化，返回所有符合筛选条件后的数据
    $('#dataset_sample').DataTable( {

        //"scrollX": true, // 启用水平滚动
        //"scrollY": 200,
        "lengthChange": true,
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 5,
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        ajax: {
            url: './api/dataset_sample.php',
            data:{
                sid: sid
            },
        },
        dataType:'json',
        stripeClasses: [],
        "order": [[ 0, "desc" ]],

        dom: '<"row align-items-center mb-2"<"col-md-6 d-flex align-items-center gap-3"lB><"col-md-6"f>>' +
            '<"row"<"col-sm-12 table-responsive"tr>>' +
            '<"row pt-2"<"col-md-5"i><"col-md-7"p>>',
        buttons: [
            {
                extend: 'csv',
                text: 'Download'
            }
        ],
        // 1. 新增：让所有列的数据在单元格中居中对齐
        columnDefs: [
            { targets: '_all', className: 'text-center' }
        ],
        columns: [
            { data: 'DatasetID' },
            { data: 'SampleID' },
            {
                data: null,
                title: 'Plot',
                orderable: false,
                render: function (data, type, row) {
                    // row.SampleID 是该行的样本名
                    return `<button class="btn btn-sm btn-outline-primary btn-sample-umap" data-sample="${row.SampleID}">
                UMAP
            </button>`;
                }
            },
            { data: 'SampleName' },
            { data: 'Source', orderable: false,},
            { data: 'Species',orderable: false, },
            { data: 'Tissue',orderable: false, },
            { data: 'Technology',orderable: false, },
            { data: 'Platforms' ,orderable: false,},
            { data: 'CellType', title: 'Cell Type' ,orderable: false,},
            { data: 'Disease' ,orderable: false,},

            // 2. 修改：
            { data: 'Organ_parts', title: 'Anatomical Entity',orderable: false, },

            { data: 'Development_stage', title: 'Development Stage' ,orderable: false,},
            { data: 'sex', title: 'Sex',orderable: false, },
            { data: 'Treatment',orderable: false, },
            { data: 'Phenotype',orderable: false, }
        ]
    } );

    // 监听 dataset_sample 表格的点击
    $('#dataset_sample tbody').on('click', '.btn-sample-umap', function() {
        let sampleId = $(this).data('sample'); // 获取点击的 SampleID

        if (sid && sampleId) {
            $('#plotModalLabel').text('Sample: ' + sampleId);
            $('#modal-switch-buttons').hide(); // 样本图不需要切换按钮，隐藏它

            // 调用 Dash 后端，注意这里传入了 &sample= 参数
            $('#modal-iframe').attr('src', `/dash-umap-left/?select_value=${sid}&sample=${encodeURIComponent(sampleId)}`);

            $('#plotModal').modal('show');
        }
    });
</script>

<script>
    $(document).ready(function() {
        //主表格初始化，返回所有符合筛选条件后的数据
        var table = $('#dataset_erna').DataTable( {
            //"scrollX": true, // 启用水平滚动
            //"scrollY": 200,
            "lengthChange": true, //禁止show框
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'post',
            ajax: {
                url: './api/dataset_erna.php',
                data:{
                    sid: sid
                },
            },
            dataType:'json',
            stripeClasses: [],
            "order": [[ 2, "asc" ]],
            dom: '<"row align-items-center mb-2"<"col-md-6 d-flex align-items-center gap-3"lB><"col-md-6"f>>' +
                '<"row"<"col-sm-12 table-responsive"tr>>' +
                '<"row pt-2"<"col-md-5"i><"col-md-7"p>>',
            buttons: [
                {
                    extend: 'csv',
                    text: 'Download'
                }
            ],
            columns: [
                { data: 'ID'},
                {
                    data: null,
                    title: 'eRNA expression / Gene',
                    orderable: false,
                    render: function (data, type, row) {
                        // 1. 尝试提取坐标
                        let featureCoord = (row.chrom && row.start && row.end) ? row.chrom + ':' + row.start + '-' + row.end : "";

                        // 2. 尝试提取其他可能存有基因名的字段
                        let featurePos = row.pos || "";
                        let featureChrom = row.chrom || "";
                        let featureID = row.ID || "";

                        // 3. 尝试从 Genes 字段中提取最干净的基因名
                        let featureGene = "";
                        if (row.Genes) {
                            featureGene = row.Genes.split(',')[0].split('(')[0].trim();
                        }

                        // 打包策略保持不变（用于发送给后端抓数据）
                        let exactFeature = [featureGene, featureCoord, featurePos, featureChrom, featureID].filter(Boolean).join("||");

                        // ==========================================
                        //  核心修复点：直接将标题指定为 eRNA ID
                        // ==========================================
                        let displayName = featureID;

                        // 显示为 "EH38E... (基因名)"，可以激活下面这行：
                        // let displayName = featureGene ? featureID + " (" + featureGene + ")" : featureID;

                        return `<button class="btn btn-sm btn-outline-primary btn-erna-view" data-erna="${exactFeature}" data-display="${displayName}">
            View Plots
        </button>`;
                    }
                },
                { data: 'chrom', },
                { data: 'start', orderable: false,},
                { data: 'end', orderable: false, },
                // 新增列显示 logo 并跳转链接
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        // ==========================================
                        // 核心修复：处理 chrom 确保带有 'chr' 前缀 (修复 JBrowse2 报错)
                        // ==========================================
                        let chromVal = row.chrom ? String(row.chrom) : '';
                        if (chromVal && !chromVal.toLowerCase().startsWith('chr')) {
                            chromVal = 'chr' + chromVal;
                        }

                        // 使用处理好的 chromVal 拼接 pos
                        let pos = chromVal && row.start && row.end
                            ? chromVal + ':' + (row.start - 500) + '-' + (row.end + 500)
                            : 'N/A';

                        let dataset = row.ID;
                        let actualDataset = 'prefix_' + dataset + '_suffix';

                        let logoUrl = './public/image/favicon.ico';

                        // 定义物种配置表
                        const organismConfig = {
                            "Homo sapiens": {
                                assembly: "GRCh38",
                                tracks: [
                                    "GRCh38-ReferenceSequenceTrack",
                                    "sorted_" + sid + "_eRNA.bed",
                                    "gencode.v46.annotation",
                                    "dbSnp153Common-hg38"
                                ]
                            },
                            "Mus musculus": {
                                assembly: "GRCm39",
                                tracks: [
                                    "GRCm39-ReferenceSequenceTrack",
                                    "sorted_" + sid + "_eRNA.bed",
                                    "Mus_musculus.GRCm39.112",
                                    "dbSnp153Common-mm39"
                                ]
                            },
                            "Gallus gallus": {
                                assembly: "GRCg6a",
                                tracks: [
                                    "GRCg6a-ReferenceSequenceTrack",
                                    "sorted_" + sid + "_eRNA.bed",
                                    "Gallus_gallus.GRCg6a.112",
                                    "dbSnp153Common-galGal6"
                                ]
                            },
                            "Danio rerio": {
                                assembly: "GRCz11",
                                tracks: [
                                    "GRCz11-ReferenceSequenceTrack",
                                    "sorted_" + sid + "_eRNA.bed",
                                    "Danio_rerio.GRCz11.112"
                                ]
                            },
                            "Caenorhabditis elegans": {
                                assembly: "WBcel235",
                                tracks: [
                                    "WBcel235-ReferenceSequenceTrack",
                                    "sorted_" + sid + "_eRNA.bed",
                                    "Caenorhabditis_elegans.WBcel235.112",
                                ]
                            },
                            "Drosophila melanogaster": {
                                assembly: "BDGP6",
                                tracks: [
                                    "BDGP6-ReferenceSequenceTrack",
                                    "sorted_" + sid + "_eRNA.bed",
                                    "Drosophila_melanogaster.BDGP6.54.115",
                                ]
                            }
                        };

                        //
                        let organism = globalSpecies || "Homo sapiens";
                        let config = organismConfig[organism];

                        if (!config) {
                            return '<span style="color:red">No config for ' + organism + '</span>';
                        }

                        let targetUrl =
                            'http://lcbb.swjtu.edu.cn/jbrowse2?config=config.json&assembly=' + config.assembly +
                            '&loc=' + encodeURIComponent(pos) +
                            '&tracks=' + config.tracks.map(t => encodeURIComponent(t)).join(',') +
                            '&trackOverrides=' + encodeURIComponent(JSON.stringify({
                                [config.assembly + "-ReferenceSequenceTrack"]: {
                                    height: 100,
                                    showForwardStrand: true,
                                    showReverseStrand: true,
                                    showTranslations: false
                                }
                            })) +
                            '&bpPerPx=250' +
                            '&dataset=' + encodeURIComponent(actualDataset);

                        // 在这里添加了 target="_blank" 和 rel="noopener noreferrer"
                        return '<a href="' + targetUrl + '" target="_blank" rel="noopener noreferrer">' +
                            '<img src="' + logoUrl + '" alt="Logo" style="width: 30px; height: 30px;"/>' +
                            '</a>';
                    }
                },
                {
                    data: 'annotation',
                    render: function (data, type, row) {
                        // 如果没有数据，直接返回空
                        if (!data) return '';

                        // 需要弹窗的物种列表
                        const noPageSpecies = ['Gallus gallus', 'Caenorhabditis elegans'];

                        if (noPageSpecies.includes(globalSpecies)) {
                            // 针对没有页面的物种，使用 btn-outline-secondary (白底灰字) 以示区分
                            return `<a href="javascript:void(0);"
                                onclick="alert('Sorry, there is no annotation page for ${globalSpecies} in the database. Please select another species.')"
                                class="btn btn-sm btn-outline-secondary" style="cursor:pointer;">
                                Detail
                             </a>`;
                        }

                        // 处理 chrom 确保带有 'chr' 前缀
                        let chromVal = row.chrom ? String(row.chrom) : '';
                        if (chromVal && !chromVal.toLowerCase().startsWith('chr')) {
                            chromVal = 'chr' + chromVal;
                        }

                        // 拼接出正确的坐标字符串
                        let correctPos = chromVal && row.start && row.end
                            ? chromVal + ':' + row.start + '-' + row.end
                            : 'N/A';

                        let href;
                        switch (globalSpecies) {
                            case 'Homo sapiens':
                                href = 'detail_erna.php';
                                break;
                            case 'Mus musculus':
                                href = 'detail_erna_mus.php';
                                break;
                            case 'Danio rerio':
                                href = 'detail_erna_fish.php';
                                break;
                            case 'Drosophila melanogaster':
                                href = 'detail_erna_fly.php';
                                break;
                            default:
                                href = 'detail_organism.php';
                        }

                        href += '?pos=' + encodeURIComponent(correctPos) +
                            '&spe=' + encodeURIComponent(globalSpecies) +
                            '&tech=' + encodeURIComponent(globalTechnology) +
                            '&tissue=' + encodeURIComponent(globalTissue) +
                            '&dataset=' + encodeURIComponent(sid);

                        // 修改点：将 btn-primary 替换为 btn-outline-primary 实现白底蓝字
                        return `<a href="${href}" class="btn btn-sm btn-outline-primary">Detail</a>`;
                    }
                },
                {
                    data: 'Num',
                    orderable: false,
                    render: function(data, type, row) {
                        return '<button class="btn btn-sm btn-outline-primary btn-show-genes" data-num="' + data + '">View</button>';
                    }
                },
            ],
            columnDefs: [
                { targets: [4, 6], orderable: false },  // 禁用第 1, 2, 3 列的排序
            ]
        } );

        // 绑定点击事件 (展开 Genes 子行并添加链接)
        // 绑定点击事件 (展开 Genes 子行并动态添加多物种基因数据库链接)
        $('#dataset_erna tbody').on('click', '.btn-show-genes', function() {
            var tr = $(this).closest('tr'); // 获取按钮所在的行
            var row = table.row(tr); // 获取该行的DataTable对象
            var data = row.data(); // 获取该行的数据

            // 处理基因字符串，添加对应物种权威数据库的链接
            var genesHtml = 'No genes available';
            if (data['Genes']) {
                // 假设基因是以逗号分隔的
                var genesArray = data['Genes'].split(',');
                var linkedGenes = genesArray.map(function(item) {
                    var cleanItem = item.trim();
                    if (!cleanItem) return '';

                    var geneName = cleanItem;
                    var distancePart = '';
                    var bracketIndex = cleanItem.indexOf('(');

                    // 如果包含括号，则把基因名和距离部分拆开
                    if (bracketIndex !== -1) {
                        geneName = cleanItem.substring(0, bracketIndex).trim();
                        distancePart = cleanItem.substring(bracketIndex); // 包含左括号及其后面的部分
                    }

                    // ==========================================
                    //  核心升级：多物种智能基因数据库路由分流
                    // ==========================================
                    var targetUrl = '';
                    var currentSpecies = typeof globalSpecies !== 'undefined' ? globalSpecies : 'Homo sapiens';

                    if (currentSpecies === 'Caenorhabditis elegans') {
                        // 1. 线虫跳转到 WormBase
                        targetUrl = 'https://wormbase.org/species/c_elegans/gene/' + encodeURIComponent(geneName);
                    } else if (currentSpecies === 'Mus musculus') {
                        // 2. 小鼠跳转到 MGI (Mouse Genome Informatics)
                        targetUrl = 'https://www.informatics.jax.org/marker/summary?nomen=' + encodeURIComponent(geneName);
                    } else if (currentSpecies === 'Drosophila melanogaster') {
                        // 果蝇：调用 FlyBase 官方指定的 Symbol 直接跳转路由
                        targetUrl = 'https://flybase.org/search/symbol/' + encodeURIComponent(geneName);
                    } else if (currentSpecies === 'Homo sapiens') {
                        // 4. 人类跳转到 GeneCards
                        targetUrl = 'https://www.genecards.org/cgi-bin/carddisp.pl?gene=' + encodeURIComponent(geneName);
                    } else {
                        // 5. 其他未知物种默认安全降级到全球通用的 NCBI Gene
                        targetUrl = 'https://www.ncbi.nlm.nih.gov/gene/?term=' + encodeURIComponent(geneName);
                    }

                    // 只将基因名包裹在 <a> 标签里，括号及距离部分作为纯文本跟在后面
                    var linkHtml = '<a href="' + targetUrl + '" target="_blank" rel="noopener noreferrer" style="color: #0d6efd; text-decoration: underline;">' + geneName + '</a>';

                    return linkHtml + distancePart;
                });
                genesHtml = linkedGenes.filter(Boolean).join(', ');
            }

            // 创建新行，显示带链接的 Genes
            var newRow = $('<tr class="genes-row"><td colspan="7" style="font-weight: bolder">Target Gene(distance to TSS):  ' + genesHtml + '</td></tr>');

            // 检查新行是否已经存在，如果存在则删除（实现折叠效果），否则添加
            if (tr.next('.genes-row').length) {
                tr.next('.genes-row').remove(); // 删除已有的行
            } else {
                tr.after(newRow); // 添加新行到当前行下方
            }
        });

        let currentErna = ""; // 记录当前点击的 eRNA 的组合字符串 "STK36||15:xxx-xxx"

// 1. 监听 dataset_erna 表格的点击 (View Plots 按钮)
        $('#dataset_erna tbody').on('click', '.btn-erna-view', function() {
            currentErna = $(this).data('erna'); // 获取拼好的 "STK36||15:xxx-xxx"
            let displayName = $(this).data('display'); // 获取弹窗标题专用名字

            if (sid && currentErna) {
                $('#plotModalLabel').text('Feature Expression: ' + displayName); // 标题显示正常名字
                $('#modal-switch-buttons').show(); // 显示弹窗顶部的切换按钮

                // 重置按钮状态：默认选中 UMAP
                $('#btn-modal-umap').removeClass('btn-outline-primary').addClass('btn-primary');
                $('#btn-modal-violin').removeClass('btn-primary').addClass('btn-outline-primary');

                // 默认加载 UMAP (Expression) 图表，注意这里传入了组合字符串
                $('#modal-iframe').attr('src', `/dash-umap-right/?select_value=${sid}&feature=${encodeURIComponent(currentErna)}`);

                $('#plotModal').modal('show');
            }
        });

// 2. 弹窗内部：点击 "UMAP" 按钮
        $('#btn-modal-umap').click(function() {
            $(this).removeClass('btn-outline-primary').addClass('btn-primary');
            $('#btn-modal-violin').removeClass('btn-primary').addClass('btn-outline-primary');

            $('#modal-iframe').attr('src', `/dash-umap-right/?select_value=${sid}&feature=${encodeURIComponent(currentErna)}`);
        });

// 3. 弹窗内部：点击 "Violin Plot" 按钮
        $('#btn-modal-violin').click(function() {
            $(this).removeClass('btn-outline-primary').addClass('btn-primary');
            $('#btn-modal-umap').removeClass('btn-primary').addClass('btn-outline-primary');

            $('#modal-iframe').attr('src', `/dash-violin/?select_value=${sid}&feature=${encodeURIComponent(currentErna)}`);
        });

// 4. 关闭弹窗时销毁 iframe
        $('#plotModal').on('hidden.bs.modal', function () {
            $('#modal-iframe').attr('src', '');
        });

    });

</script>
<script>
    $(document).ready(function() {

        // 1. 监听 UMAP 按钮的点击事件
        $('#dataset_erna tbody').on('click', '.btn-open-umap', function() {
            if (sid) {
                $('#plotModalLabel').text('UMAP Plot - ' + sid);
                // 动态赋予 src 开始加载
                $('#modal-iframe').attr('src', `/dash-umap/?select_value=${sid}`);
                // 弹出模态框
                $('#plotModal').modal('show');
            }
        });

        // 2. 监听 Violin 按钮的点击事件
        $('#dataset_erna tbody').on('click', '.btn-open-violin', function() {
            if (sid) {
                $('#plotModalLabel').text('Violin Plot - ' + sid);
                // 动态赋予 src 开始加载
                $('#modal-iframe').attr('src', `/dash-violin/?select_value=${sid}`);
                $('#plotModal').modal('show');
            }
        });

        // 3.  核心防卡死逻辑：当弹窗关闭时，销毁 iframe 释放内存
        $('#plotModal').on('hidden.bs.modal', function () {
            $('#modal-iframe').attr('src', ''); // 清空 src，停止后台运行
        });

    });
</script>

<script>
    document.getElementById("QC_Image").src = QC_imageURL;
</script>

<!--ECharts-->
<script type="text/javascript">

    //var colors = ['#FFAEBC', '#FFA78C', '#FF7A45', '#FF9770', '#FFC4A3'];
    var colors = ['#7EB5D6', '#99CEDF', '#B5E7E8', '#FFE6E8', '#FFCACA'];

    // 基于准备好的dom，初始化echarts实例
    var ClusterCell_Chart = echarts.init(document.getElementById('cell_num_cluster'));
    var ClustereRNA_Chart = echarts.init(document.getElementById('eRNA_num_cluster'));

    $.post('./api/get_cluster_info.php', {sid:sid}).done(function (data){

        // 解析返回的数据为 JSON 对象
        var responseData = JSON.parse(data);
        console.log(responseData.clusters);
        console.log(responseData.cells);

        // 构建颜色映射函数
        var colorMapping = function (params) {
            var dataIndex = params.dataIndex;
            return colors[dataIndex % colors.length];
        };

        // 指定图表的配置项和数据
        ClusterCell_Chart.setOption({
            title: {
                text: 'Cell Distribution per Cluster', // 标题稍微专业点
                left: 'center'
            },
            tooltip: {
                trigger: 'axis',
            },
            grid: {
                left: '15%' // 增加左边距，防止 Cluster 名字太长被遮挡
            },
            yAxis: {
                type: 'category',
                data: responseData.clusters,
                name: 'Cluster',       // Y轴标题
                nameLocation: 'end'
            },
            xAxis: {
                type: 'value',
                name: 'Cell Count',    // X轴标题
                nameLocation: 'middle',
                nameGap: 30            // 标题离轴线的距离
            },
            series: [{
                name: 'Cell number',
                data: responseData.cells,
                type: 'bar',
                itemStyle: {
                    color: colorMapping
                }
            }]
        });

        // 2. ClustereRNA_Chart (纵向柱状图)
        ClustereRNA_Chart.setOption({
            title: {
                text: 'eRNA Abundance per Cluster',
                left: 'center'
            },
            tooltip: {
                trigger: 'axis',
            },
            xAxis: {
                type: 'category',
                data: responseData.clusters,
                name: 'Cluster',       // X轴标题
                nameLocation: 'middle',
                nameGap: 30
            },
            yAxis: {
                type: 'value',
                name: 'eRNA Count',    // Y轴标题
                nameLocation: 'end'
            },
            series: [{
                name: 'eRNA number',
                data: responseData.eRNAs,
                type: 'bar',
                itemStyle: {
                    color: colorMapping
                }
            }]
        });
    });



</script>

<script>
    document.getElementById("eRNA_Image").src = eRNA_imageURL;

</script>

<script>

    $(document).ready(function () {

        let currentRoute = ''; // 用于存储当前的路由前缀

        //const sid = sid; // 替换为实际的 SID 参数
        const table = $('#marker_features').DataTable({
            "processing": true,
            "serverSide": true,
            "serverMethod": 'post',
            "lengthChange": true, //禁止show框
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10,
            "autoWidth": true, // 启用自动调整列宽
            ajax: {
                url: './api/get_marker_genes.php', // 默认数据源
                data: function (d) {
                    d.sid = sid;
                    //d.feature_type = currentFeatureType; // 动态传递 feature_type 参数
                }
            },
            dataType: 'json',
            dom: '<"row align-items-center mb-2"<"col-md-6 d-flex align-items-center gap-3"lB><"col-md-6"f>>' +
                '<"row"<"col-sm-12 table-responsive"tr>>' +
                '<"row pt-2"<"col-md-5"i><"col-md-7"p>>',
            buttons: [
                {
                    extend: 'csv',
                    text: 'Download'
                }
            ],
            columns: [
                {
                    data: 'names',
                    /*
                    render: function (data, type, row) {
                        // 默认的 render 函数，可以是任意一个初始函数
                        return `<a href="https://www.ncbi.nlm.nih.gov/gene/?term=${encodeURIComponent(data)}" target="_blank">${data}</a>`;
                    }
                    */
                    render: function (data, type, row) {
                        let href;
                        console.log(globalSpecies);

                        // 判断物种，选择不同的基础路径
                        if (globalSpecies === 'Homo sapiens') {
                            href = 'detail_erna.php';
                        } else if (globalSpecies === 'Mus musculus') {
                            href = 'detail_erna_mus.php';
                        } else {
                            href = 'detail_organism.php';  // 默认链接
                        }

                        // 判断 names 的格式，选择跳转目标
                        if (/^chr[0-9XYM]+:\d+-\d+$/.test(data)) {
                            // 增强子格式 1: "chrX:XXX-XXX"
                            href += '?pos=' + encodeURIComponent(row['pos']) +
                                '&spe=' + encodeURIComponent(globalSpecies) +
                                '&tech=' + encodeURIComponent(globalTechnology) +
                                '&tissue=' + encodeURIComponent(globalTissue) +
                                '&dataset=' + encodeURIComponent(sid);
                        } else if (/^EH\d{2}E\d+$/.test(data)) {
                            // 增强子格式 2: "EHXXEXXXXX..."
                            href += '?pos=' + encodeURIComponent(row['pos']) +
                                '&spe=' + encodeURIComponent(globalSpecies) +
                                '&tech=' + encodeURIComponent(globalTechnology) +
                                '&tissue=' + encodeURIComponent(globalTissue) +
                                '&dataset=' + encodeURIComponent(sid);
                        } else {
                            // 基因格式，默认跳转到 NCBI 基因页面
                            href = 'https://www.ncbi.nlm.nih.gov/gene/?term=' + encodeURIComponent(data);
                        }

                        // 返回带链接的 HTML
                        return `<a href="${href}" target="_blank">${data}</a>`;
                    }
                },
                { data: 'p_val_adj' },
                { data: 'p-value'},
                { data: 'LogFoldChanges' },
                { data: 'Cluster' }
            ],
            columnDefs: [
                { targets: [2], orderable: false },  // 禁用第 1, 2, 3 列的排序
            ]
        });

        // 定义按钮配置
        const buttonConfigs = {
            btnA: {
                imgSrc: `./public/figures/heatmap_top_gene_${sid}.png`,
                description: 'Heatmap of the expression of the top 10 marker genes (bottom) for each cluster (left).',
                url: './api/get_marker_genes.php', // 数据源
                headerText: 'Gene Name', // 【新增】定义表头名称
                //linkTemplate: 'https://www.genenames.org/tools/search/#!/?query=', // 基因链接模板
                renderFunction: function (data, type, row) {
                    return `<a href="https://www.ncbi.nlm.nih.gov/gene/?term=${encodeURIComponent(data)}" target="_blank">${data}</a>`;
                },
            },
            btnB: {
                imgSrc: `./public/figures/heatmap_top10_eRNA_${sid}.png`,
                description: 'Heatmap of the expression of the top 10 eRNAs (bottom) for each cluster (left).',
                url: './api/get_marker_features.php', // 数据源
                headerText: 'eRNA Name', // 【新增】定义表头名称
                renderFunction: function (data, type, row) {
                    return `<a href="detail_erna.php?pos=${encodeURIComponent(data)}&spe=${species}&tech=${tech}&tissue=${tissue}&cell=${cell}&dataset=${encodeURIComponent(row.dataset)}" target="_blank">${data}</a>`;
                }
            },
            btnC: {
                imgSrc: `./public/figures/heatmap_gene_${sid}.png`,
                description: 'Heatmap of the expression of the marker genes (bottom) for each cluster (left).',
                url: './api/get_marker_genes.php', // 数据源
                headerText: 'Gene Name', // 【新增】定义表头名称
                //linkTemplate: 'https://www.genenames.org/tools/search/#!/?query=' // 基因链接模板
                renderFunction: function (data, type, row) {
                    return `<a href="https://www.ncbi.nlm.nih.gov/gene/?term=${encodeURIComponent(data)}" target="_blank">${data}</a>`;
                }
            },
            btnD: {
                imgSrc: `./public/figures/heatmap_eRNA_${sid}.png`,
                description: 'Heatmap of the expression of the marker eRNAs (bottom) for each cluster (left).',
                url: './api/get_marker_features.php', // 数据源
                headerText: 'eRNA Name', // 【新增】定义表头名称
                renderFunction: function (data, type, row) {
                    return `<a href="detail_erna.php?pos=${encodeURIComponent(data)}&spe=${species}&tech=${tech}&tissue=${tissue}&cell=${cell}&dataset=${encodeURIComponent(row.dataset)}" target="_blank">${data}</a>`;
                }
            }
        };

        //let currentFeatureType = 'eRNA'; // 默认类型
        //let currentUrl = './api/get_marker_features.php'; // 默认数据源

        //let currentLinkTemplate = ''; // 用于存储当前的链接模板

        // 按钮点击事件

        $('button').click(function () {
            const buttonId = this.id;
            const config = buttonConfigs[buttonId];

            // 先移除所有按钮的 active 类
            $('button').removeClass('active');

            // 添加当前按钮的 active 类
            $(this).addClass('active');

            if (config) {
                // 切换图片
                $("#eRNA_Image").attr("src", config.imgSrc);
                $("#a-marker").text(config.description);

                // 【新增】动态修改第一列的表头名称
                $(table.column(0).header()).text(config.headerText);

                // 动态设置列的 render 函数
                table.column(0).data().render = config.renderFunction;



                // 切换表格数据源
                table.ajax.url(config.url).load(function () {
                    table.columns.adjust().draw(); // 刷新列宽
                });
            }

        });

        $('#btnA').click();
    });
</script>

<script>
    // 文件配置：指定文件名、显示名、对应的子路径
    const files = [
        { file: "metadata.csv", label: "metadata.csv", path: "metadata" },
        { file: "eRNA.bed", label: "eRNA.bed", path: "erna_bed" },
        { file: "erna_exp_matrix.csv", label: "erna_exp_matrix.csv", path: "erna_exp" },
        { file: "eRNA_cluster_exp.csv", label: "eRNA_cluster_exp.csv", path: "cluster" },
        { file: "gene_DE.csv", label: "gene_DE.csv", path: "DEG" },
        { file: "eRNA_DE.csv", label: "eRNA_DE.csv", path: "DEerna" }
    ];

    function renderDownloadBoxes() {
        const container = document.getElementById("downloadContainer");
        const currentParams = new URLSearchParams(window.location.search);
        const sid = currentParams.get("sid");

        if (!sid) {
            container.innerHTML = `<p style="color: red;"> No SID parameter found. Cannot load download files.</p>`;
            return;
        }

        files.forEach(file => {
            const box = document.createElement("div");
            box.className = "box";
            box.onclick = function() {
                downloadFile(sid, file);
            };

            const p = document.createElement("p");
            p.textContent = sid + "_" + file.label;  // 显示文件名和 sid 前缀
            box.appendChild(p);

            container.appendChild(box);
        });
    }

    // 下载文件的功能
    function downloadFile(sid, file) {
        const link = document.createElement('a');
        link.href = `./download/files/${file.path}/${sid}_${file.file}`;
        link.download = sid + "_" + file.file;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // 渲染所有文件的下载方块
    renderDownloadBoxes();
</script>


<!-- 图片下载功能 -->
<script>
    document.getElementById('downloadBtn').addEventListener('click', function() {
        const imageSrc = document.getElementById('eRNA_Image').src;
        const a = document.createElement('a');
        a.href = imageSrc;
        a.download = 'eRNA_Figure.jpg';
        a.click();
    });
</script>


<script>
    $(document).ready(function () {
        const container = document.getElementById("rna-switch-container")
        const path = window.location.pathname
        const currentParams = new URLSearchParams(window.location.search)
        const sid = currentParams.get("sid")

        console.log(" 当前 SID =", sid)

        //  如果没有 sid，就直接不渲染按钮，防止后续出错
        if (!sid) {
            container.innerHTML = `<p style="color: red;"> No SID parameter found. Cannot load enhancer data.</p>`
            return
        }

        //  明确拼接带参数的跳转链接
        const toSuperURL = `detail_study_SE.php?sid=${encodeURIComponent(sid)}`
        const toTypicalURL = `detail_study.php?sid=${encodeURIComponent(sid)}`

        if (path.includes("detail_study.php") && !path.includes("detail_study_SE.php")) {
            container.innerHTML = `
      <p class="rna-label blue-label"> You are currently viewing <strong>Typical Enhancer RNA</strong></p>
      <button class="animated-button gradient-red-button" onclick="goWithRipple(event, '${toSuperURL}')">
         Switch to Super-Enhancer RNA
      </button>
    `
        } else if (path.includes("detail_study_SE.php")) {
            container.innerHTML = `
      <p class="rna-label red-label"> You are currently viewing <strong>Super-Enhancer RNA</strong></p>
      <button class="animated-button gradient-blue-button" onclick="goWithRipple(event, '${toTypicalURL}')">
         Switch to Typical Enhancer RNA
      </button>
    `
        }

        window.goWithRipple = function (event, target) {
            const button = event.currentTarget
            const ripple = document.createElement("span")
            ripple.classList.add("ripple")
            const rect = button.getBoundingClientRect()
            ripple.style.left = `${event.clientX - rect.left}px`
            ripple.style.top = `${event.clientY - rect.top}px`
            button.appendChild(ripple)

            setTimeout(() => {
                ripple.remove()
                console.log(" 跳转到：", target)
                window.location.href = target
            }, 300)
        }
    })
</script>
<script>

    // 热点图放大镜【按需开启】功能
   
    const zoomContainer = document.getElementById('heatmap-zoom-container');
    const zoomImage = document.getElementById('eRNA_Image');
    const toggleZoomBtn = document.getElementById('toggleZoomBtn');
    const zoomBtnText = document.getElementById('zoomBtnText');

    let isZoomActive = false; // 记录放大镜状态的变量
    const zoomLevel = 2.5; // 放大倍数

    if (zoomContainer && zoomImage && toggleZoomBtn) {

        // 1. 监听开关按钮点击
        toggleZoomBtn.addEventListener('click', function() {
            isZoomActive = !isZoomActive; // 切换状态

            if (isZoomActive) {
                // 开启放大：颜色反转为深蓝底、白字，提示开启状态
                toggleZoomBtn.style.backgroundColor = '#243675';
                toggleZoomBtn.style.color = '#FFFFFF';
                zoomBtnText.innerText = "Disable Zoom";
                zoomContainer.style.cursor = 'crosshair';
            } else {
                // 关闭放大：恢复与 Download 完全一致的白底、深蓝字
                toggleZoomBtn.style.backgroundColor = '#FFFFFF';
                toggleZoomBtn.style.color = '#243675';
                zoomBtnText.innerText = "Enable Zoom";
                zoomContainer.style.cursor = 'default';
                zoomImage.style.transformOrigin = 'center center';
                zoomImage.style.transform = 'scale(1)';
            }
        });

        // 2. 监听鼠标移动（加入拦截逻辑）
        zoomContainer.addEventListener('mousemove', function(e) {
            if (!isZoomActive) return; // 如果开关没打开，直接退出

            const rect = zoomContainer.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const xPercent = (x / rect.width) * 100;
            const yPercent = (y / rect.height) * 100;

            zoomImage.style.transformOrigin = `${xPercent}% ${yPercent}%`;
            zoomImage.style.transform = `scale(${zoomLevel})`;
        });

        // 3. 监听鼠标移出
        zoomContainer.addEventListener('mouseleave', function() {
            zoomImage.style.transformOrigin = 'center center';
            zoomImage.style.transform = 'scale(1)';
        });
    }
</script>

<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>
