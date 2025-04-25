<?php
include "./templates/base.php";
?>


<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>


<style>
    .dashed {
        border-style: dashed;
    }



    /* 左侧滚动栏 */
    @media (min-width: 1200px) {
        .flex-xl-nowrap {
            flex-wrap: nowrap !important;
        }
    }

    @media (min-width: 768px) {
        .bd-sidebar {
            position: sticky;
            top: 4rem;
            z-index: 3;
            max-height: calc(100vh - 4rem);
        }

        .bd-sidebar {
            order: 0;
        }

        .bd-content {
            order: 1;
        }

        .bd-links {
            max-height: calc(100vh - 4rem);
            overflow-y: auto;
            overflow-x: hidden;
        }

        .bd-links>div {
            margin-right: -5px;
        }
    }

    /*背景图*/
    body {
        position: relative;
    }

    .background_body {
        position: fixed;
        z-index: -1;
        height: 100%;
        width: 100%;
        background-size: cover;
        background-position: center;
        opacity: 0.1;
    }

    /*DataTable*/
    div.dataTables_wrapper div.dataTables_processing {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 200px;
        margin-left: -100px;
        margin-top: -26px;
        text-align: center;
        padding: 1em 0;
        background: #5e72e4;
        z-index: 1;
        border: 1px dotted;
        color: white;
        font-weight: bold;
        opacity: 0.8;
    }

    h2>a,
    b>a,
    .dashed,
    .navbar-brand,
    .navbar-nav .nav-link,
    .alert,

</style>
<style>

    img {
        width: 100%;
    }

    img[data-action="zoom"] {
        cursor: pointer;
        cursor: -webkit-zoom-in;
        cursor: -moz-zoom-in;
    }
    .zoom-img,
    .zoom-img-wrap {
        position: relative;
        z-index: 666;
        -webkit-transition: all 300ms;
        -o-transition: all 300ms;
        transition: all 300ms;
    }
    img.zoom-img {
        cursor: pointer;
        cursor: -webkit-zoom-out;
        cursor: -moz-zoom-out;
    }
    .zoom-overlay {
        z-index: 420;
        background: #fff;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
        filter: "alpha(opacity=0)";
        opacity: 0;
        -webkit-transition:      opacity 300ms;
        -o-transition:      opacity 300ms;
        transition:      opacity 300ms;
    }
    .zoom-overlay-open .zoom-overlay {
        filter: "alpha(opacity=100)";
        opacity: 1;
    }
    .zoom-overlay-open,
    .zoom-overlay-transitioning {
        cursor: default;
    }
    .nam{
        text-align: center;color: #0c2e8a;
        padding-bottom: 7px;

        padding-top: 7px;
    }


</style>


<div class="min-vh-100" style="width: 80%;margin-left: 78px;margin-top: 20px;">


    <br>
    <div class="row flex-xl-nowrap">
        <div class="col-lg-4 bd-sidebar">
            <nav class="bd-links" style="background-color: #FFFFFF;">
                <div class="row" style="background-color: #FFFFFF; margin-top: -15px; margin-bottom: 20px" >
                    <div class="col-lg-12">
                        <table class="mt-4 w-100">
                            <!--  -->
                            <thead>
                            <tr>
                                <th>
                                    <div class="alert alert-secondary" role="alert" style="background-color: #286ea7;height: 60px;">
                                        <p class="font-weight-bold text-center" >
                                            <span style="color: #ffc107;font-size: 25px;">Help Navigation</span></p>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <!--  -->
                            <tbody>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#1-what-information-is-avaiable-in-ernascatlas">1. eRNA scAtlas Workflow
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#2-what-data-are-included-in-ernascatlas">2. What data are included in eRNA scAtlas?
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#3-database-content-and-construction">3. Database Content and Construction
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#4-how-to-use-the-ernascatlas">4. How to use the eRNA scAtlas?
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#41-browse">4.1 Browse
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#42-search">4.2 Search
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#421-search-gr">4.2.1 Search eRNA by Genomic Region
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#422-search-study">4.2.2 Search by Study
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#423-search-tc">4.2.3 Search sample by Tissue/Cell type
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#424-search-ss">4.2.4 Search by Single Sample
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#43-dataset">4.3 Dataset detail
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#431-dataset-summary">4.3.1 dataset summary
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#432-dataset-sample">4.3.2 sample information
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#433-dataset-erna">4.3.3 eRNA list
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#434-dataset-umap">4.3.4 UMAP for cell cluster and eRNA expression
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#435-dataset-violin">4.3.5 Violin plot for eRNA expression
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#436-dataset-statistic">4.3.6 Statistic information
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#437-dataset-marker">4.3.7 Marker features information
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#438-dataset-resource">4.3.8 Data resources
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#44-enra-detail">4.4 eRNA detail
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#45-visualization">4.5 Visualization
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#46-download">4.6 Download
                                    </a></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-lg-8 bd-content">
            <b id="1-what-information-is-avaiable-in-ernascatlas" style="font-size: 20px;">1. What information is avaiable in eRNA scAtlas?</b>
            <p>eRNA scAtlasstands as a comprehensive repository, offering a wealth of data on single-cell eRNA. Within its confines reside XXXXX eRNA scAtlas, meticulously curated from both diseased and healthy specimens spanning human and mouse species. This invaluable resource is characterized by its extensive genomic annotation, encompassing 116,941 enhancers, 336,763 super enhancers, and 2,001,501 genes, which notably include 77,345 oncogenes. Furthermore, it houses 211,948 SNPs, 114,992,54 CTCF binding sites, 151,325,67 chromatin accessibility regions, 341,316 eQTLs, 2,705 miRNAs, and 114,992,52 transcription factors (TFs). Not to be overlooked are the 9,559,550 structural variants (SVs), 3,630,814 repeat sequences, and 242,063 methylation sites (m1A, m6A, m5C) that enrich its contents. Additionally, motifs from 2,800 samples are woven into the fabric of this database, rendering it an indispensable platform for delving deep into the intricacies of single-cell eRNA biology.</p>
            <br>

            <b id="4-how-to-use-the-ernascatlas" style="font-size: 20px;">2. How to use the eRNA scAtlas?</b>
            <br>

            <h3 id="41-browse">2.1 Browse</h3>
            <p>Here are the results of the Browse by dataset.</p>
            <p><b>URL:<a href="https://lcbb.swjtu.edu.cn/eRNAdb/browse_dataset.php">https://lcbb.swjtu.edu.cn/eRNAdb/browse_dataset.php</a></b></p>
            <p><img alt="browse" src="./public/image/helppic/browse_dataset.png"/></p>
            <p>Here are the results of the Browse by sample.</p>
            <p><b>URL:<a href="https://lcbb.swjtu.edu.cn/eRNAdb/browse_sample.php">https://lcbb.swjtu.edu.cn/eRNAdb/browse_sample.php</a></b></p>
            <p><img alt="regions" src="./public/image/helppic/browse_sample.png" /></p>


            <br>
            <h3 id="42-search">4.2 Search</h3>
            <p><b>URL:<a href="https://lcbb.swjtu.edu.cn/eRNAdb/search_iframe.php">https://lcbb.swjtu.edu.cn/eRNAdb/search_iframe.php</a></b></p>
            <h4 id="421-search-gr">4.2.1 Search eRNA by Genomic Region</h4>
            <p><img alt="regions" src="./public/image/helppic/search_gr.png" /></p>
            <h4 id="422-search-study">4.2.2 Search Study</h4>
            <p><img alt="regions-r1" src="./public/image/helppic/search_study.png" /></p>
            <h4 id="423-search-tc">4.2.3 Search sample by Tissue / Cell type</h4>
            <p><img alt="regions-r2" src="./public/image/helppic/search_tc.png" /></p>
            <h4 id="424-search-ss">4.2.4 Search by Single Sample</h4>
            <p><img alt="regions-r3" src="./public/image/helppic/search_ss.png" /></p>
            <br>


            <h3 id="43-dataset">4.3 Dataset detail</h3>
            <p><b>URL:<a href="https://lcbb.swjtu.edu.cn/eRNAdb/detail_study.php?sid=GSE75140">https://lcbb.swjtu.edu.cn/eRNAdb/detail_study.php</a></b></p>
            <br>
            <h4 id="431-dataset-summary">4.3.1 dataset summary</h4>
            <p>This module is dataset summary information. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/dataset-summary.png" /></p>
            <br>

            <h4 id="432-dataset-sample">4.3.2 dataset sample</h4>
            <p>This module is dataset sample information. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/dataset-sample.png" /></p>
            <br>
            <h4 id="433-dataset-erna">4.3.3 dataset eRNA list</h4>
            <p>This module is dataset eRNA information. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/dataset-erna.png" /></p>
            <br>
            <h4 id="434-dataset-umap">4.3.4 UMAP</h4>
            <p>This module is plot to view eRNA expression. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/dataset-umap.png" /></p>
            <br>
            <h4 id="435-dataset-violin">4.3.5 Violin plot</h4>
            <p>This module is plot to view eRNA expression. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/dataset-violin.png" /></p>
            <br>
            <h4 id="436-dataset-statistic">4.3.6 dataset statistic</h4>
            <p>This module is dataset statistic information. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/dataset-statistic.png" /></p>
            <br>
            <h4 id="437-dataset-marker">4.3.7 marker features</h4>
            <p>This module is dataset marker features(gene/eRNA) information. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/dataset-marker.png" /></p>
            <br>
            <h4 id="438-dataset-resource">4.3.8 download file</h4>
            <p>This module is dataset download file. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/dataset-download.png" /></p>
            <br>

            <h4 id="44-erna-detail">4.4 eRNA Detail</h4>
            <p>This module is eRNA annotaion result. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/erna_detail.png" /></p>
            <br>

            <h4 id="45-visualization">4.4 Visualization</h4>
            <p>This module is JBrowse2 Genome track to view element. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/visuliaztion.png" /></p>
            <br>

            <h4 id="46-download">4.5 Download</h4>
            <p>This module is download the file contain in database. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/dowanload.png" /></p>
            <br>




        </div>
    </div>
</div>


<script>
    $(document).ready(() => {
        var sp1 = location.toString().split('/');
        sp1.reverse();
        var sp2 = sp1.length === 5 ? sp1[0] : (sp1[1] + ".php");
        if (sp2 === '')
            sp2 = 'index.php';
        $('a[href*="/' + sp2 + '"]').parents('li').addClass('active');

        setTimeout(function() {
            $("*[height-to]").each(function(t, e) {
                var height_to = $(e).attr("height-to");
                if (height_to) {
                    $(e).css("height", $("#" + height_to).css("height"));
                    $(e).css("overflow-y", "auto");
                    $(e).css("overflow-x", "hidden");
                }
            })
        }, 500);

    });
    // 这段 JavaScript 代码的主要作用是为当前页面的导航菜单项添加 "active" 类，并处理一些带有 height-to 属性的元素，以确保它们的高度与指定的目标元素相匹配，并可以滚动显示超出高度的内容。这通常用于页面导航和显示效果的改进。
</script>





<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>
