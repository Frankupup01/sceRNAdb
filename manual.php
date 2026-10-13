<?php
include "./templates/base.php";
?>

<body id="body">
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

    /* 🔴 核心修复 2：精细控制右侧内容区的各级标题及正文大小，建立完美层级 */
    .bd-content h2 {
        font-size: 23px;
        font-weight: bold;
        margin-top: 30px;
        margin-bottom: 15px;
        border-bottom: 1px solid #eee; /* 可选：加一条浅色下划线让标题更清晰 */
        padding-bottom: 5px;
    }

    .bd-content h3 {
        font-size: 18px;
        font-weight: bold;
        margin-top: 25px;
        margin-bottom: 12px;
    }

    .bd-content h4 {
        font-size: 16px;
        font-weight: bold;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .bd-content p {
        font-size: 15px;
    }

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
        background: #fff;main
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


<div class="container" style="width: 80%; padding-left: 85px;padding-right: 90px;">


    <br>
    <div class="row flex-xl-nowrap">
        <div class="col-lg-4 bd-sidebar">
            <nav class="bd-links" style="background-color: #FFFFFF;">
                <div class="row" style="background-color: #FFFFFF; margin-top: -15px; margin-bottom: 20px" >
                    <div class="col-lg-12">
                        <table class="mt-4 w-100">
                            <thead>
                            <tr>
                                <th>
                                    <div class="alert alert-secondary d-flex justify-content-center align-items-center m-0" role="alert" style="background-color: #286ea7; min-height: 60px; padding: 10px;">
                                        <span class="font-weight-bold text-center" style="color: #ffc107; font-size: clamp(18px, 2vw, 24px); white-space: nowrap;">Help Navigation</span>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#1-what-information-is-avaiable-in-ernascatlas">1 What information is avaiable in sceRNAdb?
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#4-how-to-use-the-ernascatlas">2 How to use the sceRNAdb?
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#41-browse">2.1 Browse
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#42-search">2.2 Search
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#421-search-gr">2.2.1 Search eRNA by Genomic Region
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#422-search-study">2.2.2 Search by Study
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#423-search-tc">2.2.3 Search sample by Tissue/Cell type
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#424-search-ss">2.2.4 Search by Single Sample
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#43-dataset">2.3 Dataset detail
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#431-dataset-summary">2.3.1 dataset summary
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#432-dataset-sample">2.3.2 sample information
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#433-dataset-erna">2.3.3 eRNA list
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#434-dataset-umap">2.3.4 UMAP for cell cluster and eRNA expression
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#435-dataset-violin">2.3.5 Violin plot for eRNA expression
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#436-dataset-statistic">2.3.6 Statistic information
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#437-dataset-marker">2.3.7 Marker features information
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#438-dataset-resource">2.3.8 Data resources
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#44-erna-detail">2.4 eRNA detail
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#45-visualization">2.5 Visualization
                                    </a></td></tr>
                            <tr><td><a class="btn border px-3 py-1 text-start w-100" href="#46-download">2.6 Download
                                    </a></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-lg-8 bd-content">

            <h2 id="1-what-information-is-avaiable-in-ernascatlas">1. What information is available in sceRNAdb?</h2>
            <p style="text-align: justify;">As the first comprehensive repository dedicated to single-cell profiling of eRNAs, sceRNAdb offers an unprecedented wealth of data by leveraging full-length scRNA-seq datasets. Within its current version, the database meticulously catalogs expression profiles for 753,438 typical enhancer RNAs (teRNAs) and 113,516 super enhancer RNAs (seRNAs). These regulatory elements span 29 distinct tissue and cell line types across six species: Homo sapiens, Mus musculus, Danio rerio, Drosophila melanogaster, Gallus gallus, and Caenorhabditis elegans. This invaluable resource is characterized by its deep functional annotations, integrating a massive compendium of 105,152,293 annotation records. Specifically, it encompasses 46,917,052 common SNPs, 351,728 risk SNPs, and diverse multi-omics quantitative trait loci (11,995,221 eQTLs, 57,039 caQTLs, and 165,857 haQTLs). Furthermore, the database houses 2,055,816 RNA-protein interaction sites (covering 189 RBPs), 928,410 RNA methylation sites (including m5C and m6A), 7,332,721 transcription factor binding sites (TFBS), 6,014,112 transposable elements, and 29,334,337 CRISPR target sites. Equipped with interactive visualization modules, sceRNAdb stands as an indispensable and robust platform for delving deep into the expression, regulation, and functional intricacies of non-coding RNAs at single-cell resolution.</p>

            <h2 id="4-how-to-use-the-ernascatlas">2. How to use the sceRNAdb?</h2>

            <h3 id="41-browse">2.1 Browse</h3>
            <p>Here are the results of the Browse by dataset.</p>
            <p><b>URL:<a href="https://lcbb.swjtu.edu.cn/eRNAdb/browse_dataset.php">https://lcbb.swjtu.edu.cn/eRNAdb/browse_dataset.php</a></b></p>
            <p><img alt="browse" src="./public/image/helppic/dataset.png"/></p>
            <p>Here are the results of the Browse by sample.</p>
            <p><b>URL:<a href="https://lcbb.swjtu.edu.cn/eRNAdb/browse_sample.php">https://lcbb.swjtu.edu.cn/eRNAdb/browse_sample.php</a></b></p>
            <p><img alt="regions" src="./public/image/helppic/sample.png" /></p>


            <h3 id="42-search">2.2 Search</h3>
            <p><b>URL:<a href="https://lcbb.swjtu.edu.cn/eRNAdb/search_iframe.php">https://lcbb.swjtu.edu.cn/eRNAdb/search_iframe.php</a></b></p>
            <h4 id="421-search-gr">2.2.1 Search eRNA by Genomic Region</h4>
            <p><img alt="regions" src="./public/image/helppic/gr.png" /></p>
            <h4 id="422-search-study">2.2.2 Search Study</h4>
            <p><img alt="regions-r1" src="./public/image/helppic/study.png" /></p>
            <h4 id="423-search-tc">2.2.3 Search sample by Tissue / Cell type</h4>
            <p><img alt="regions-r2" src="./public/image/helppic/tc.png" /></p>
            <h4 id="424-search-ss">2.2.4 Search by Single Sample</h4>
            <p><img alt="regions-r3" src="./public/image/helppic/search_sample.png" /></p>


            <h3 id="43-dataset">2.3 Dataset detail</h3>
            <p><b>URL:<a href="https://lcbb.swjtu.edu.cn/eRNAdb/detail_study.php?sid=GSE118900">https://lcbb.swjtu.edu.cn/eRNAdb/detail_study.php</a></b></p>

            <h4 id="431-dataset-summary">2.3.1 dataset summary</h4>
            <p>This module is dataset summary information. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/summary.png" /></p>

            <h4 id="432-dataset-sample">2.3.2 dataset sample</h4>
            <p>This module is dataset sample information. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/sample_data.png" /></p>

            <h4 id="433-dataset-erna">2.3.3 dataset eRNA list</h4>
            <p>This module is dataset eRNA information. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/eRNA.png" /></p>

            <h4 id="434-dataset-umap">2.3.4 UMAP</h4>
            <p>This module is plot to view eRNA expression. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/umap.png" /></p>

            <h4 id="435-dataset-violin">2.3.5 Violin plot</h4>
            <p>This module is plot to view eRNA expression. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/violin.png" /></p>

            <h4 id="436-dataset-statistic">2.3.6 dataset statistic</h4>
            <p>This module is dataset statistic information. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/cluster.png" /></p>

            <h4 id="437-dataset-marker">2.3.7 marker features</h4>
            <p>This module is dataset marker features(gene/eRNA) information. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/top.png" /></p>

            <h4 id="438-dataset-resource">2.3.8 download file</h4>
            <p>This module is dataset download file. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/dr.png" /></p>


            <h4 id="44-erna-detail">2.4 eRNA Detail</h4>
            <p>This module is eRNA annotaion result. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/eRNA_detail.png" /></p>


            <h4 id="45-visualization">2.5 Visualization</h4>
            <p>This module is JBrowse2 Genome track to view element. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/vis.png" /></p>


            <h4 id="46-download">2.6 Download</h4>
            <p>This module is download the file contain in database. </p>
            <p><img alt="regions-r5" src="./public/image/helppic/download.png" /></p>


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

<?php
include "./templates/footer.php";
?>

</body>
</html>