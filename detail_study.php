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
    /* 按钮的基础样式 */
    .btn-primary {
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        background: linear-gradient(45deg, #00B4D8, #48C9B0); /* 从深蓝到浅绿色的渐变 */
        /*background: linear-gradient(45deg, #ff7e5f, #feb47b); /* 渐变背景 */
        color: white;
        border-radius: 0;
    }

    /* 悬停效果 */
    .btn-primary:hover {
        background: linear-gradient(45deg, #ff512f, #dd2476); /* 鼠标悬停时交换渐变方向 */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* 增加阴影 */
        transform: translateY(-2px); /* 轻微向上移动 */
    }

    /* 按下按钮时的效果 */
    /*btn-primary:active*/
    #btnA.active, #btnB.active,#btnC.active,#btnD.active
    {
        background: linear-gradient(45deg, #ff512f, #dd2476); /* 按钮点击时的颜色 */
        /*transform: translateY(2px); /* 向下移动效果 */
    }

    /* 为按钮组添加间距 */
    .btn-group {
        display: flex;
        justify-content: center;
        gap: 15px; /* 按钮之间的间距 */
    }

    /* 响应式调整，确保按钮在小屏幕上也能居中显示 */
    @media (max-width: 768px) {
        .btn-group {
            flex-direction: column;
            align-items: center;
        }
    }
</style>


<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>

<div class="row">
    <div class="col-lg-12" style="width: 80%; margin: 0 auto;">

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
                    <div class="datatable-wrapper">
                    <table id="dataset_sample" class="table table-hover table-bordered" style="vertical-align: middle;">
                        <thead style="vertical-align: middle;">
                        <tr>
                            <th>Dataset ID</th>
                            <th>Sample ID</th>
                            <th>Sample Name</th>
                            <th>Source</th>
                            <th>Species</th>
                            <th>Tissue</th>
                            <th>Organ_parts</th>
                            <th>Development_stage</th>
                            <th>Disease</th>
                            <th>Sex</th>
                            <th>Technology</th>
                            <th>Platforms</th>
                            <th>Cell type</th>
                            <th>Treatment</th>
                            <th>Phenotype</th>
                        </tr>
                        </thead>
                    </table>
                    </div>
                    </div>
                    <!--</div>-->
                </div>

                <img
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
                </script>

                <!--eRNA List-->
                <div class="card" id="c2" style="margin-bottom:10px;padding-right: 0; padding-left: 0;">
                    <div class="card-header" style="width: 100%; height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">

                        <img src="./public/image/Translation0001.svg" alt="SVG Image" style="width: 80px; height: 80px;margin-right: 10px;">
                        <span style="font-size: 28px;">Enhancer RNA</span>

                        <!--<svg width="40" height="40" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M557.523 500.875l12.665-29.713 56.666 24.153-12.665 29.713z" fill="#0362a4"></path><path d="M628.1 496.8l-53.7-22.9c-6.1-2.6-8.9-9.7-6.3-15.7l105.6-247.8c2.6-6.1 9.7-8.9 15.7-6.3l65.3 27.8c6.1 2.6 8.9 9.7 6.3 15.7L660.4 483.8c-5.3 12.4-19.8 18.3-32.3 13z" fill="#0362a4"></path><path d="M712.2 691.8H472.1c-5.5 0-10-4.5-10-10v-16.4c0-5.5 4.5-10 10-10h240.1c5.5 0 10 4.5 10 10v16.4c0 5.6-4.5 10-10 10z m-240.1-28.3c-1.1 0-2 0.9-2 2v16.4c0 1.1 0.9 2 2 2h240.1c1.1 0 2-0.9 2-2v-16.4c0-1.1-0.9-2-2-2H472.1z" fill="#CE0202"></path><path d="M563.872 418.964l3.161-7.349 101.322 43.58-3.161 7.349z" fill="#FFFFFF"></path><path d="M563.307 469.962l3.137-7.359 64.025 27.29-3.136 7.36z" fill="#999999"></path><path d="M683.8 937.4H358.2c-9.9 0-18-8.1-18-18v-4l42.2-28.3c2.9-2.9 6.8-4.6 10.9-4.6h84.4V782h-9.1c-63.7-0.1-123.7-25.1-169-70.5s-70.3-105.4-70.3-169.1 25-123.9 70.4-169.2 105.5-70.4 169.2-70.4h132.5l44.9-108c8.4-19.9 31.3-29.2 51.1-20.8l48.4 20.4c19.8 8.4 29.2 31.3 20.8 51.1l-98.5 235.4c-6.1 14.4-20.2 23.7-35.5 23.9L618 539.4l-78.5-33.1 14.8-35.2c-9.7-11.1-12.4-26.9-6.6-40.8l11-26.2h-80.5c-36.8 0-71.5 14.4-97.7 40.7-26.2 26.2-40.7 60.9-40.7 97.7v0.3c0 36.8 14.4 71.5 40.7 97.7 26.2 26.2 60.9 40.7 97.7 40.7h241.7c27.3 0 50.4 22.8 50.4 49.8v1.8c0 27.3-22.2 49.5-49.5 49.5H564.2v100.5h84.4c4.1 0 8 1.6 10.9 4.6l42.3 28.3v4c0 9.7-8.1 17.7-18 17.7zM357 922.2c0.4 0.2 0.8 0.2 1.2 0.2h325.6c0.4 0 0.8-0.1 1.2-0.2l-35.4-23.8-0.7-0.8c0-0.1-0.1-0.1-0.2-0.1h-99.4V767H721c19 0 34.5-15.5 34.5-34.5v-1.8c0-18.9-16.2-34.8-35.4-34.8H478.4c-40.8 0-79.3-16-108.3-45s-45-67.5-45-108.3v-0.3c0-40.8 16-79.3 45-108.3s67.5-45 108.3-45h103.1l-19.8 47c-4.1 9.6-1.4 20.7 6.5 27.6l4.1 3.6-13.1 31.1 50.9 21.4 13-30.9 5.7 0.8c10.8 1.5 21.3-4.4 25.5-14.4l98.5-235.4c2.5-5.9 2.5-12.4 0.1-18.4s-7-10.6-12.9-13.1l-48.4-20.4c-5.9-2.5-12.4-2.5-18.4-0.1s-10.6 7-13.1 12.9L611.4 318H469.1c-59.7 0-116.1 23.4-158.6 66s-66 98.9-66 158.6 23.4 116 65.9 158.5 98.8 66 158.5 66.1h24v130.5h-99.4c-0.1 0-0.2 0-0.3 0.1l-0.7 0.8-35.5 23.6z" fill="#999999"></path><path d="M756.4 211.6l-73.1-31 20.3-48 8.7 3.7 14.8-35c3.1-7.4 11.6-10.8 19-7.7l29 12.3c3.6 1.5 6.3 4.3 7.8 7.9s1.4 7.5-0.1 11.1l-14.8 35 8.7 3.7-20.3 48z m-62.6-35.2l58.4 24.7 14.1-33.3-8.7-3.7 18-42.4c0.7-1.6 0.7-3.4 0-5s-1.9-2.9-3.5-3.5l-29-12.3c-3.3-1.4-7.1 0.1-8.5 3.5l-17.9 42.4-8.7-3.7-14.2 33.3z" fill="#999999"></path><path d="M712.951 145.293l3.121-7.366 6.814 2.886-3.12 7.367zM732.23 153.49l3.12-7.366 28.085 11.898-3.12 7.366z" fill="#999999"></path><path d="M477.7 672.1H714v8.4H477.7z" fill="#0362a4"></path></g></svg>
                    -->
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">

                    <!--<div class="table-responsive">-->
                    <div class="datatable-wrapper">
                        <table id="dataset_erna" class="table table-hover table-bordered" style="width: 100%;vertical-align: middle;max-width: 100%; overflow-x: auto; table-layout: auto;">
                            <thead style="vertical-align: middle;">
                            <tr>
                                <th>eRNA ID</th>
                                <th>Chrom</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>View</th>
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
                <div class="card" id="c3" style="margin-bottom:10px; padding-right: 0; padding-left: 0;">
                    <div class="card-header" style="width: 100%;  height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">

                        <img src="./public/image/ImmuneCells0001.svg" alt="SVG Image" style="width: 80px; height: 80px;margin-right: 10px;">
                        <span style="font-size: 28px;">UMAP</span>

                        <!--<svg width="40" height="40" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M557.523 500.875l12.665-29.713 56.666 24.153-12.665 29.713z" fill="#0362a4"></path><path d="M628.1 496.8l-53.7-22.9c-6.1-2.6-8.9-9.7-6.3-15.7l105.6-247.8c2.6-6.1 9.7-8.9 15.7-6.3l65.3 27.8c6.1 2.6 8.9 9.7 6.3 15.7L660.4 483.8c-5.3 12.4-19.8 18.3-32.3 13z" fill="#0362a4"></path><path d="M712.2 691.8H472.1c-5.5 0-10-4.5-10-10v-16.4c0-5.5 4.5-10 10-10h240.1c5.5 0 10 4.5 10 10v16.4c0 5.6-4.5 10-10 10z m-240.1-28.3c-1.1 0-2 0.9-2 2v16.4c0 1.1 0.9 2 2 2h240.1c1.1 0 2-0.9 2-2v-16.4c0-1.1-0.9-2-2-2H472.1z" fill="#CE0202"></path><path d="M563.872 418.964l3.161-7.349 101.322 43.58-3.161 7.349z" fill="#FFFFFF"></path><path d="M563.307 469.962l3.137-7.359 64.025 27.29-3.136 7.36z" fill="#999999"></path><path d="M683.8 937.4H358.2c-9.9 0-18-8.1-18-18v-4l42.2-28.3c2.9-2.9 6.8-4.6 10.9-4.6h84.4V782h-9.1c-63.7-0.1-123.7-25.1-169-70.5s-70.3-105.4-70.3-169.1 25-123.9 70.4-169.2 105.5-70.4 169.2-70.4h132.5l44.9-108c8.4-19.9 31.3-29.2 51.1-20.8l48.4 20.4c19.8 8.4 29.2 31.3 20.8 51.1l-98.5 235.4c-6.1 14.4-20.2 23.7-35.5 23.9L618 539.4l-78.5-33.1 14.8-35.2c-9.7-11.1-12.4-26.9-6.6-40.8l11-26.2h-80.5c-36.8 0-71.5 14.4-97.7 40.7-26.2 26.2-40.7 60.9-40.7 97.7v0.3c0 36.8 14.4 71.5 40.7 97.7 26.2 26.2 60.9 40.7 97.7 40.7h241.7c27.3 0 50.4 22.8 50.4 49.8v1.8c0 27.3-22.2 49.5-49.5 49.5H564.2v100.5h84.4c4.1 0 8 1.6 10.9 4.6l42.3 28.3v4c0 9.7-8.1 17.7-18 17.7zM357 922.2c0.4 0.2 0.8 0.2 1.2 0.2h325.6c0.4 0 0.8-0.1 1.2-0.2l-35.4-23.8-0.7-0.8c0-0.1-0.1-0.1-0.2-0.1h-99.4V767H721c19 0 34.5-15.5 34.5-34.5v-1.8c0-18.9-16.2-34.8-35.4-34.8H478.4c-40.8 0-79.3-16-108.3-45s-45-67.5-45-108.3v-0.3c0-40.8 16-79.3 45-108.3s67.5-45 108.3-45h103.1l-19.8 47c-4.1 9.6-1.4 20.7 6.5 27.6l4.1 3.6-13.1 31.1 50.9 21.4 13-30.9 5.7 0.8c10.8 1.5 21.3-4.4 25.5-14.4l98.5-235.4c2.5-5.9 2.5-12.4 0.1-18.4s-7-10.6-12.9-13.1l-48.4-20.4c-5.9-2.5-12.4-2.5-18.4-0.1s-10.6 7-13.1 12.9L611.4 318H469.1c-59.7 0-116.1 23.4-158.6 66s-66 98.9-66 158.6 23.4 116 65.9 158.5 98.8 66 158.5 66.1h24v130.5h-99.4c-0.1 0-0.2 0-0.3 0.1l-0.7 0.8-35.5 23.6z" fill="#999999"></path><path d="M756.4 211.6l-73.1-31 20.3-48 8.7 3.7 14.8-35c3.1-7.4 11.6-10.8 19-7.7l29 12.3c3.6 1.5 6.3 4.3 7.8 7.9s1.4 7.5-0.1 11.1l-14.8 35 8.7 3.7-20.3 48z m-62.6-35.2l58.4 24.7 14.1-33.3-8.7-3.7 18-42.4c0.7-1.6 0.7-3.4 0-5s-1.9-2.9-3.5-3.5l-29-12.3c-3.3-1.4-7.1 0.1-8.5 3.5l-17.9 42.4-8.7-3.7-14.2 33.3z" fill="#999999"></path><path d="M712.951 145.293l3.121-7.366 6.814 2.886-3.12 7.367zM732.23 153.49l3.12-7.366 28.085 11.898-3.12 7.366z" fill="#999999"></path><path d="M477.7 672.1H714v8.4H477.7z" fill="#0362a4"></path></g></svg>
                    -->
                    </div>
                    <div class="card-body">
                    <!--<h1>Embedding Scatter Dash in PHP</h1>-->
                        <div style="text-align: center;">
                <!--<iframe src="http://localhost:8051?select_value=GSE44618" width="100%" height="600px"></iframe>-->
                <!-- iframe with dynamic src -->
                            <iframe id="dash-umap" height="600px" width="100%"></iframe>
                        </div>
                    </div>
                </div>

                <!--Violin-->
                <div class="card" id="c4" style="margin-bottom:10px;padding-right: 0; padding-left: 0;">
                        <div class="card-header" style="width: 100%;  height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">

                            <img src="./public/image/PlasmaBCell0001.svg" alt="SVG Image" style="width: 80px; height: 80px;margin-right: 10px;">
                            <span style="font-size: 28px;">Violin plot</span>

                            <!--<svg width="40" height="40" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M557.523 500.875l12.665-29.713 56.666 24.153-12.665 29.713z" fill="#0362a4"></path><path d="M628.1 496.8l-53.7-22.9c-6.1-2.6-8.9-9.7-6.3-15.7l105.6-247.8c2.6-6.1 9.7-8.9 15.7-6.3l65.3 27.8c6.1 2.6 8.9 9.7 6.3 15.7L660.4 483.8c-5.3 12.4-19.8 18.3-32.3 13z" fill="#0362a4"></path><path d="M712.2 691.8H472.1c-5.5 0-10-4.5-10-10v-16.4c0-5.5 4.5-10 10-10h240.1c5.5 0 10 4.5 10 10v16.4c0 5.6-4.5 10-10 10z m-240.1-28.3c-1.1 0-2 0.9-2 2v16.4c0 1.1 0.9 2 2 2h240.1c1.1 0 2-0.9 2-2v-16.4c0-1.1-0.9-2-2-2H472.1z" fill="#CE0202"></path><path d="M563.872 418.964l3.161-7.349 101.322 43.58-3.161 7.349z" fill="#FFFFFF"></path><path d="M563.307 469.962l3.137-7.359 64.025 27.29-3.136 7.36z" fill="#999999"></path><path d="M683.8 937.4H358.2c-9.9 0-18-8.1-18-18v-4l42.2-28.3c2.9-2.9 6.8-4.6 10.9-4.6h84.4V782h-9.1c-63.7-0.1-123.7-25.1-169-70.5s-70.3-105.4-70.3-169.1 25-123.9 70.4-169.2 105.5-70.4 169.2-70.4h132.5l44.9-108c8.4-19.9 31.3-29.2 51.1-20.8l48.4 20.4c19.8 8.4 29.2 31.3 20.8 51.1l-98.5 235.4c-6.1 14.4-20.2 23.7-35.5 23.9L618 539.4l-78.5-33.1 14.8-35.2c-9.7-11.1-12.4-26.9-6.6-40.8l11-26.2h-80.5c-36.8 0-71.5 14.4-97.7 40.7-26.2 26.2-40.7 60.9-40.7 97.7v0.3c0 36.8 14.4 71.5 40.7 97.7 26.2 26.2 60.9 40.7 97.7 40.7h241.7c27.3 0 50.4 22.8 50.4 49.8v1.8c0 27.3-22.2 49.5-49.5 49.5H564.2v100.5h84.4c4.1 0 8 1.6 10.9 4.6l42.3 28.3v4c0 9.7-8.1 17.7-18 17.7zM357 922.2c0.4 0.2 0.8 0.2 1.2 0.2h325.6c0.4 0 0.8-0.1 1.2-0.2l-35.4-23.8-0.7-0.8c0-0.1-0.1-0.1-0.2-0.1h-99.4V767H721c19 0 34.5-15.5 34.5-34.5v-1.8c0-18.9-16.2-34.8-35.4-34.8H478.4c-40.8 0-79.3-16-108.3-45s-45-67.5-45-108.3v-0.3c0-40.8 16-79.3 45-108.3s67.5-45 108.3-45h103.1l-19.8 47c-4.1 9.6-1.4 20.7 6.5 27.6l4.1 3.6-13.1 31.1 50.9 21.4 13-30.9 5.7 0.8c10.8 1.5 21.3-4.4 25.5-14.4l98.5-235.4c2.5-5.9 2.5-12.4 0.1-18.4s-7-10.6-12.9-13.1l-48.4-20.4c-5.9-2.5-12.4-2.5-18.4-0.1s-10.6 7-13.1 12.9L611.4 318H469.1c-59.7 0-116.1 23.4-158.6 66s-66 98.9-66 158.6 23.4 116 65.9 158.5 98.8 66 158.5 66.1h24v130.5h-99.4c-0.1 0-0.2 0-0.3 0.1l-0.7 0.8-35.5 23.6z" fill="#999999"></path><path d="M756.4 211.6l-73.1-31 20.3-48 8.7 3.7 14.8-35c3.1-7.4 11.6-10.8 19-7.7l29 12.3c3.6 1.5 6.3 4.3 7.8 7.9s1.4 7.5-0.1 11.1l-14.8 35 8.7 3.7-20.3 48z m-62.6-35.2l58.4 24.7 14.1-33.3-8.7-3.7 18-42.4c0.7-1.6 0.7-3.4 0-5s-1.9-2.9-3.5-3.5l-29-12.3c-3.3-1.4-7.1 0.1-8.5 3.5l-17.9 42.4-8.7-3.7-14.2 33.3z" fill="#999999"></path><path d="M712.951 145.293l3.121-7.366 6.814 2.886-3.12 7.367zM732.23 153.49l3.12-7.366 28.085 11.898-3.12 7.366z" fill="#999999"></path><path d="M477.7 672.1H714v8.4H477.7z" fill="#0362a4"></path></g></svg>
                        -->
                        </div>
                        <div class="card-body">

                            <div style="text-align: center;">
                                <!--<iframe src="http://localhost:8052?select_value=GSE44618" width="100%" height="600px"></iframe>-->
                                <iframe id="dash-violin" height="600px" width="100%"></iframe>
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
                            <img id="QC_Image" src="" alt="Dynamic Image" style="width: 100%; max-height:400px; width: auto"">
                        </div>

                        <br>
                        <!--<a style="font-weight: bolder"> Violin plot of some of the computed quality measures:</a>
                        <a style="font-weight: bolder"> The total counts per cell.</a>-->
                        <ul class="q-mb-md">
                            <li style="font-weight: bolder">Violin plot of some of the computed quality measures:</li>
                            <li style="font-weight: bolder">The total counts per cell.</li></ul>
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

                        <h5> Cluster Markers</h5>
                        <a> The marker eRNAs/genes of each cluster were calculated by scanpy.tl.rank_genes_groups with the "wilcoxon" method. If the original annotation information of dataset is available, we use the original one, if not, we get the annotation information through scanpy.tl.leiden.</a>

                        <div class="btn-group mt-3" role="group" aria-label="Image Buttons" style="margin-bottom: 15px">
                            <button type="button" class="btn btn-primary" id="btnA">Top10 Genes</button>
                            <button type="button" class="btn btn-primary" id="btnB">Top10 eRNAs</button>

                            <button type="button" class="btn btn-primary" id="btnC">All Genes</button>
                            <button type="button" class="btn btn-primary" id="btnD">All eRNAs</button>

                        </div>
                        <a id="a-marker" style="font-weight: bolder; margin-bottom: 5px"> Heatmap of the expression of the top 10 marker genes (bottom) for each cluster (left).</a>

                        <div style="display: flex; justify-content: flex-end; width: 100%;">
                            <button id="downloadBtn" style="padding: 2px 16px;  background-color: #FFFFFF; color: #243675; border: none; border-radius: 5px; cursor: pointer; display: flex; align-items: center;">
                                <!-- SVG下载图标 -->
                                <svg width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16" style="margin-right: 8px;">
                                    <path d="M8 0a.5.5 0 0 1 .5.5v8.793l2.354-2.354a.5.5 0 1 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 8.293V.5A.5.5 0 0 1 8 0z"/>
                                    <path d="M0 13a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-1z"/>
                                </svg>
                                Download Figure
                            </button>
                        </div>
                        <!--插入图片-->
                        <div style="display: flex; justify-content: center; align-items: center;">
                            <img id="eRNA_Image" src="" alt="Dynamic Image" style="max-height: 400px; max-width: 100%; width: auto">
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
                                        <th>Name</th>
                                        <th>p_val_adj</th>
                                        <th>p-value</th>
                                        <th>LogFoldChanges</th>
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
                        <span style="font-size: 28px;">Data </span><span style="font-size: 28px;color: #ffc107">R</span><span style="font-size: 28px;">esources</span>

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
    console.log(sid);

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
            url: './api/dataset_summary.php', // 替换为你的 PHP 后端地址
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

                // 遍历数据数组
                //dataArray.forEach((item, index) => {
                dataArray.forEach((item) => {
                        const { Tissue, Species, PMID, Platform, Technology,Contributors, SubmissionDate,UpdateDate, DatasetSummary, OverallDesign, Accessions } = item;

                    // 将需要的数据赋值给全局变量
                    globalTissue = Tissue;
                    console.log("Tissue:", globalTissue);  // 检查输出
                    globalSpecies = Species;
                    globalTechnology = Technology;
                    globalAccessions = Accessions;

                        // 添加条目标题
                        //container.append(`<h3>Summary ${index + 1}</h3>`);
                        //container.append(`<h3>Summary</h3>`);

                        /*container.append(`
                            <div class="card" id="c8" style="margin-bottom: 20px; border: 1px solid #ddd; border-radius: 8px; padding-right: 0; padding-left: 0;">
                            <div class="card-header" id="card-h8" style="width: 100%; height: 80px; color: #0362a4; font-size: larger; font-weight: bolder; display: flex; align-items: center;">
                            <img src="./public/image/healthy%20neuron-01.svg" alt="SVG Image" style="width: 80px; height: 80px; margin-right: 10px;">
                            <span style="font-size: 28px;">Summary</span>
                        </div>`)*/



                        // 渲染前四个字段：Tissue, Species, PMID, Platform
                        container.append(`
                    <div class="row" style="margin-left: 20px;margin-right: 20px">
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Tissue:</div>
                            <div style="width: 50%;">${Tissue || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Species:</div>
                            <div style="width: 50%;">${Species || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">PMID:</div>
                            <div style="width: 50%;">
                                ${PMID ? `<a href="https://pubmed.ncbi.nlm.nih.gov/${encodeURIComponent(PMID)}/" target="_blank">${PMID}</a>` : 'N/A'}
                            </div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Platform:</div>
                            <div style="width: 50%;">${Platform || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Technology:</div>
                            <div style="width: 50%;">${Technology || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Contributors:</div>
                            <div style="width: 50%;">${Contributors || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Submission Date:</div>
                            <div style="width: 50%;">${SubmissionDate || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Update Date:</div>
                            <div style="width: 50%;">${UpdateDate || 'N/A'}</div>
                        </div>
                    </div>
                `);

                        // 渲染 Summary 和 Design 字段
                        container.append(`
                <div class="row" style="margin-left: 20px;margin-right: 20px">
                    <div style="margin-bottom: 10px;">
                        <div style="font-weight: bold;">Dataset Summary:</div>
                        <p>${DatasetSummary || 'N/A'}</p>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <div style="font-weight: bold;">Overall Design:</div>
                        <p>${OverallDesign || 'N/A'}</p>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <div style="font-weight: bold;">Accessions:</div>
                        <p>GEO Series Accessions:
                            ${Accessions ? `<a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=${encodeURIComponent(Accessions)}" target="_blank">${Accessions}</a>` : 'N/A'}
                        </p>
                    </div></div>
                `);

                    });
                }
            }
    );
</script>

<script>
    //主表格初始化，返回所有符合筛选条件后的数据
    $('#dataset_sample').DataTable( {
        //"scrollX": true, // 启用水平滚动
        //"scrollY": 200,
        "lengthChange": false, //禁止show框
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
        dom: "<'top'Bf>rt<'bottom'ip>", //"<'top'Bf>rt<'bottom'ilp>"
        buttons: [
            {
                extend: 'csv',
                text: 'Download'
            }
        ],
        columns: [
            { data: 'DatasetID' },
            { data: 'SampleID' },
            { data: 'SampleName',},
            { data: 'Source' },
            { data: 'Species' },
            { data: 'Tissue' },
            { data: 'Organ_parts' },
            { data: 'Development_stage' },
            { data: 'Disease' },
            { data: 'sex' },
            { data: 'Technology' },
            { data: 'Platforms' },
            { data: 'CellType' },
            { data: 'Treatment' },
            { data: 'Phenotype' }

        ]
    } );
</script>

<script>
    $(document).ready(function() {
    //主表格初始化，返回所有符合筛选条件后的数据
    var table = $('#dataset_erna').DataTable( {
        //"scrollX": true, // 启用水平滚动
        //"scrollY": 200,
        "lengthChange": false, //禁止show框
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
        "order": [[ 1, "asc" ]],
        dom: "<'top'Bf>rt<'bottom'ip>", //"<'top'Bf>rt<'bottom'ilp>"
        buttons: [
            {
                extend: 'csv',
                text: 'Download'
            }
        ],
        columns: [
            { data: 'ID'},
            { data: 'chrom' },
            { data: 'start',},
            { data: 'end' },
            // 新增列显示 logo 并跳转链接
            {
                data: null, // 此列不从数据中提取值
                render: function (data, type, row) {
                    // 获取与 ID 一样的参数值
                    let pos = row.chrom && row.start && row.end
                        ? row.chrom + ':' + (row.start - 500) + '-' + (row.end + 500)
                        : 'N/A';
                    let dataset = row.ID; // 假设 ID 即为 dataset
                    let actualDataset = 'prefix_' + dataset + '_suffix'; // 处理前后缀

                    let logoUrl = './public/image/favicon.ico'; // 这里替换成你自己的 logo 地址
                    let targetUrl = 'https://lcbb.swjtu.edu.cn/jbrowse2?config=config.json&assembly=GRCh38&loc=' + encodeURIComponent(pos) +
                        '&tracks=' + encodeURIComponent('sorted_' + sid + '_eRNA.bed') +
                        ',' + encodeURIComponent('gencode.v46.chr_patch_hapl_scaff.annotation.gff3') +
                        ',' + encodeURIComponent('dbSnp153Common') +
                        '&dataset=' + encodeURIComponent(actualDataset);

                    return '<a href="' + targetUrl + '">' +
                        '<img src="' + logoUrl + '" alt="Logo" style="width: 30px; height: 30px;"/>' + // 这里可以自定义 logo 大小
                        '</a>';
                }
            },
            { data: 'annotation',
                render: function ( data, type, row ) {
                    //console.log(row); // 输出 row 对象到控制台
                    let pos = row.chrom && row.start && row.end ? row.chrom + ':' + row.start + '-' + row.end : 'N/A';

                    let href;
                    console.log(globalSpecies);
                    // 判断 spe 的值，生成不同的页面路径
                    if (globalSpecies === 'Homo sapiens') {
                        href = 'detail_erna.php';
                    } else if (globalSpecies === 'Mus musculus') {
                        href = 'detail_erna_mus.php';
                    } else {
                        href = 'detail_organism.php';  // 默认链接
                    }

                    // 拼接完整的链接，保留所有参数
                    href += '?pos=' + encodeURIComponent(row['pos']) +
                        '&spe=' + encodeURIComponent(globalSpecies) +
                        '&tech=' + encodeURIComponent(globalTechnology) +
                        '&tissue=' + encodeURIComponent(globalTissue) +
                        //'&cell=' + cell +
                        '&dataset=' + encodeURIComponent(sid);

                    // 返回带链接的 HTML
                    return '<a href="' + href + '">' + data + '</a>';

                    /*
                    return '<a href="detail_erna.php?pos=' + encodeURIComponent(pos) +
                        '&spe=' + encodeURIComponent(globalSpecies) +
                        '&tech=' + encodeURIComponent(globalTechnology) +
                        '&tissue=' + encodeURIComponent(globalTissue) +
                        '&dataset=' + encodeURIComponent(sid) +
                        '">' + data + '</a>'
                    */

                }
            },
            {data: 'Num',
                render: function(data, type, row) {
                    // 在Num列显示按钮，按钮文本是Num的值
                    //return '<button class="btn-show-genes">' + data + '</button>';
                    return '<button class="btn-show-genes" data-num="' + data + '">' + data + '</button>';
                }},
        ],
        columnDefs: [
            { targets: [4, 6], orderable: false },  // 禁用第 1, 2, 3 列的排序
        ]
    } );

        // 绑定点击事件
        $('#dataset_erna tbody').on('click', '.btn-show-genes', function() {
            var tr = $(this).closest('tr'); // 获取按钮所在的行
            var row = table.row(tr); // 获取该行的DataTable对象
            var data = row.data(); // 获取该行的数据

            // 创建新行，显示Genes
            var newRow = $('<tr class="genes-row"><td colspan="7" style="font-weight: bolder">Target Gene(distance to TSS):  ' + (data['Genes'] || 'No genes available') + '</td></tr>');

            // 检查新行是否已经存在，如果存在则删除，否则添加
            if (tr.next('.genes-row').length) {
                tr.next('.genes-row').remove(); // 删除已有的行
            } else {
                tr.after(newRow); // 添加新行到当前行下方
            }
        });

    });
</script>

<script>
    // 获取当前页面 URL 中的 sid 参数
    if (sid) {
        // 动态设置第一个 iframe（dash-umap）的 src
        const iframeUmap = document.getElementById('dash-umap');
        //iframeUmap.src = `https://lcbb.swjtu.edu.cn/dash-umap/?select_value=${sid}`;
        iframeUmap.src = `http://localhost:8050?select_value=${sid}`;

        // 动态设置第二个 iframe（dash-violin）的 src
        const iframeViolin = document.getElementById('dash-violin');
        //iframeViolin.src = `https://lcbb.swjtu.edu.cn/dash-violin/?select_value=${sid}`;
        iframeViolin.src = `http://localhost:8051?select_value=${sid}`;
    } else {
        console.error("No sid parameter found in the URL.");
    }
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
                text: 'The number of Cell',
            },
            tooltip: {
                trigger: 'axis',
            },
            yAxis: {  // 将原先的 xAxis 改为 yAxis
                type: 'category',
                data: responseData.clusters,
            },
            xAxis: {  // 将原先的 yAxis 改为 xAxis
                type: 'value',
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

        ClustereRNA_Chart.setOption({
            title: {
                text: 'The number of eRNAs',
            },
            tooltip: {
                trigger: 'axis',
            },
            xAxis: {
                type: 'category',
                data: responseData.clusters,
            },
            yAxis: {
                type: 'value',
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
            "autoWidth": true, // 启用自动调整列宽
            ajax: {
                url: './api/get_marker_genes.php', // 默认数据源
                data: function (d) {
                    d.sid = sid;
                    //d.feature_type = currentFeatureType; // 动态传递 feature_type 参数
                }
            },
            dataType: 'json',
            dom: "<'top'Bf>rt<'bottom'ip>",
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
                //linkTemplate: 'https://www.genenames.org/tools/search/#!/?query=', // 基因链接模板
                renderFunction: function (data, type, row) {
                    return `<a href="https://www.ncbi.nlm.nih.gov/gene/?term=${encodeURIComponent(data)}" target="_blank">${data}</a>`;
                },
            },
            btnB: {
                imgSrc: `./public/figures/heatmap_top10_eRNA_${sid}.png`,
                description: 'Heatmap of the expression of the top 10 eRNAs (bottom) for each cluster (left).',
                url: './api/get_marker_features.php', // 数据源
                renderFunction: function (data, type, row) {
                    return `<a href="detail_erna.php?pos=${encodeURIComponent(data)}&spe=${species}&tech=${tech}&tissue=${tissue}&cell=${cell}&dataset=${encodeURIComponent(row.dataset)}" target="_blank">${data}</a>`;
                }
            },
            btnC: {
                imgSrc: `./public/figures/heatmap_gene_${sid}.png`,
                description: 'Heatmap of the expression of the marker genes (bottom) for each cluster (left).',
                url: './api/get_marker_genes.php', // 数据源
                //linkTemplate: 'https://www.genenames.org/tools/search/#!/?query=' // 基因链接模板
                renderFunction: function (data, type, row) {
                    return `<a href="https://www.ncbi.nlm.nih.gov/gene/?term=${encodeURIComponent(data)}" target="_blank">${data}</a>`;
                }
            },
            btnD: {
                imgSrc: `./public/figures/heatmap_eRNA_${sid}.png`,
                description: 'Heatmap of the expression of the marker eRNAs (bottom) for each cluster (left).',
                url: './api/get_marker_features.php', // 数据源
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
    // 假设 sid 是你从后端获取的值
    //const sid = "SID12345";  // 替换为实际的sid值

    const files = [
        { file: "metadata.csv", label: "metadata.csv" },
        { file: "eRNA.bed", label: "eRNA.bed" },
        { file: "eRNA_exp_matrix.csv", label: "eRNA_exp_matrix.csv" },
        { file: "eRNA_cluster_exp.csv", label: "eRNA_cluster_exp.csv" },
        { file: "gene_DE.csv", label: "gene_DE.csv" },
        { file: "eRNA_DE.csv", label: "eRNA_DE.csv" }
    ];

    function renderDownloadBoxes() {
        const container = document.getElementById("downloadContainer");

        files.forEach(file => {
            const box = document.createElement("div");
            box.className = "box";
            box.onclick = function() {
                downloadFile(sid, file.file);
            };

            const p = document.createElement("p");
            p.textContent = sid + "_" + file.label;  // 显示文件名和 sid 前缀
            box.appendChild(p);

            container.appendChild(box);
        });
    }

    // 下载文件的功能
    function downloadFile(sid, filename) {
        const link = document.createElement('a');
        link.href = `./download/files/${sid}_${filename}`;  // 使用 sid 前缀构建文件路径
        link.download = sid + "_" + filename;
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
        // 获取图片的src路径
        const imageSrc = document.getElementById('eRNA_Image').src;

        // 创建一个链接并设置为图片的src
        const a = document.createElement('a');
        a.href = imageSrc;
        a.download = 'eRNA_Figure.jpg';  // 设置下载的文件名
        a.click();  // 模拟点击下载
    });
</script>



<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>
