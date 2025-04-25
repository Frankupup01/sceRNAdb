
<?php
include "./templates/base.php";
?>

<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>

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
        width: 45%; /* 每个box占45%的宽度，留空间给间距 */
        margin: 10px 2.5%; /* 上下间距10px，左右间距2.5% */
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;


        height: 180px;
        background: linear-gradient(45deg, #1e3c72, #f8cdda);
        /*background: linear-gradient(45deg, #f8cdda, #1e3c72);*/
        /*background: linear-gradient(45deg, #ff5f6d, #ffc3a0);*/
        border-radius: 7px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 24px;
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

    .d-flex {
        display: flex;
        flex-wrap: wrap; /* 允许换行 */
    }

    .justify-content-start {
        justify-content: flex-start;
    }

</style>

<div class="col-lg-12" style="width: 80%; margin: 0 auto;">

    <div class="container-fluid" >
        <div class="row">

    <!--Data Download Resources-->
    <div class="card" id="c-download" style="margin-bottom: 15px;margin-top: 30px;padding-right: 0; padding-left: 0;">
        <div class="card-header" style="width: 100%;  height: 80px; color: #0362a4;font-size: larger; font-weight: bolder;display: flex; align-items: center;">

            <img src="./public/image/NextGenSequ0001.svg" alt="SVG Image" style="width: 80px; height: 80px;margin-right: 10px;">
            <span style="font-size: 28px;">Data </span><span style="font-size: 28px;color: #ffc107">R</span><span style="font-size: 28px;">esources</span>

            <!--<svg width="40" height="40" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M557.523 500.875l12.665-29.713 56.666 24.153-12.665 29.713z" fill="#0362a4"></path><path d="M628.1 496.8l-53.7-22.9c-6.1-2.6-8.9-9.7-6.3-15.7l105.6-247.8c2.6-6.1 9.7-8.9 15.7-6.3l65.3 27.8c6.1 2.6 8.9 9.7 6.3 15.7L660.4 483.8c-5.3 12.4-19.8 18.3-32.3 13z" fill="#0362a4"></path><path d="M712.2 691.8H472.1c-5.5 0-10-4.5-10-10v-16.4c0-5.5 4.5-10 10-10h240.1c5.5 0 10 4.5 10 10v16.4c0 5.6-4.5 10-10 10z m-240.1-28.3c-1.1 0-2 0.9-2 2v16.4c0 1.1 0.9 2 2 2h240.1c1.1 0 2-0.9 2-2v-16.4c0-1.1-0.9-2-2-2H472.1z" fill="#CE0202"></path><path d="M563.872 418.964l3.161-7.349 101.322 43.58-3.161 7.349z" fill="#FFFFFF"></path><path d="M563.307 469.962l3.137-7.359 64.025 27.29-3.136 7.36z" fill="#999999"></path><path d="M683.8 937.4H358.2c-9.9 0-18-8.1-18-18v-4l42.2-28.3c2.9-2.9 6.8-4.6 10.9-4.6h84.4V782h-9.1c-63.7-0.1-123.7-25.1-169-70.5s-70.3-105.4-70.3-169.1 25-123.9 70.4-169.2 105.5-70.4 169.2-70.4h132.5l44.9-108c8.4-19.9 31.3-29.2 51.1-20.8l48.4 20.4c19.8 8.4 29.2 31.3 20.8 51.1l-98.5 235.4c-6.1 14.4-20.2 23.7-35.5 23.9L618 539.4l-78.5-33.1 14.8-35.2c-9.7-11.1-12.4-26.9-6.6-40.8l11-26.2h-80.5c-36.8 0-71.5 14.4-97.7 40.7-26.2 26.2-40.7 60.9-40.7 97.7v0.3c0 36.8 14.4 71.5 40.7 97.7 26.2 26.2 60.9 40.7 97.7 40.7h241.7c27.3 0 50.4 22.8 50.4 49.8v1.8c0 27.3-22.2 49.5-49.5 49.5H564.2v100.5h84.4c4.1 0 8 1.6 10.9 4.6l42.3 28.3v4c0 9.7-8.1 17.7-18 17.7zM357 922.2c0.4 0.2 0.8 0.2 1.2 0.2h325.6c0.4 0 0.8-0.1 1.2-0.2l-35.4-23.8-0.7-0.8c0-0.1-0.1-0.1-0.2-0.1h-99.4V767H721c19 0 34.5-15.5 34.5-34.5v-1.8c0-18.9-16.2-34.8-35.4-34.8H478.4c-40.8 0-79.3-16-108.3-45s-45-67.5-45-108.3v-0.3c0-40.8 16-79.3 45-108.3s67.5-45 108.3-45h103.1l-19.8 47c-4.1 9.6-1.4 20.7 6.5 27.6l4.1 3.6-13.1 31.1 50.9 21.4 13-30.9 5.7 0.8c10.8 1.5 21.3-4.4 25.5-14.4l98.5-235.4c2.5-5.9 2.5-12.4 0.1-18.4s-7-10.6-12.9-13.1l-48.4-20.4c-5.9-2.5-12.4-2.5-18.4-0.1s-10.6 7-13.1 12.9L611.4 318H469.1c-59.7 0-116.1 23.4-158.6 66s-66 98.9-66 158.6 23.4 116 65.9 158.5 98.8 66 158.5 66.1h24v130.5h-99.4c-0.1 0-0.2 0-0.3 0.1l-0.7 0.8-35.5 23.6z" fill="#999999"></path><path d="M756.4 211.6l-73.1-31 20.3-48 8.7 3.7 14.8-35c3.1-7.4 11.6-10.8 19-7.7l29 12.3c3.6 1.5 6.3 4.3 7.8 7.9s1.4 7.5-0.1 11.1l-14.8 35 8.7 3.7-20.3 48z m-62.6-35.2l58.4 24.7 14.1-33.3-8.7-3.7 18-42.4c0.7-1.6 0.7-3.4 0-5s-1.9-2.9-3.5-3.5l-29-12.3c-3.3-1.4-7.1 0.1-8.5 3.5l-17.9 42.4-8.7-3.7-14.2 33.3z" fill="#999999"></path><path d="M712.951 145.293l3.121-7.366 6.814 2.886-3.12 7.367zM732.23 153.49l3.12-7.366 28.085 11.898-3.12 7.366z" fill="#999999"></path><path d="M477.7 672.1H714v8.4H477.7z" fill="#0362a4"></path></g></svg>
        -->
        </div>
        <div class="card-body">
            <div class="container" id="downloadContainer" style="padding-bottom: 10px">
                <div class="row" style="width: 100%">
                    <div class="col-lg-12 d-flex flex-wrap justify-content-start">
                        <div class="box">
                            <p>Experimental metadata</p>
                        </div>
                        <div class="box">
                            <p>Dataset list</p>
                        </div>
                        <div class="box">
                            <p>eRNA list</p>
                        </div>
                        <div class="box">
                            <p>Super eRNA list</p>
                        </div>
                    </div>
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
