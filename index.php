<?php
include "./templates/base.php";
?>

<body id="body">
<?php
include "./templates/header.php";
?>

<style>
    /* 新增 CSS 样式 */
    .news-scroll-container {
        height: 150px;
        overflow-y: auto;
        overflow-x: hidden;
        position: relative;
        padding-right: 15px;
    }

    .news-list {
        margin: 0;
        padding: 0;
        list-style: none;
        transition: transform 0.5s ease-in-out;
    }

    .news-list li {
        padding: 5px 5px;
        line-height: 1.5;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.2s ease;
    }

    .news-list li:hover {
        white-space: normal;
        overflow: visible;
        background-color: #f0f8ff;
    }

    .news-list .separator {
        border-top: 1px solid #e0e0e0;
        height: 0;
        padding: 0;
        margin: 0;
    }

    .typing-animation {
        /* 屏蔽外部 base.php 中容易在不同系统产生宽度误差的 CSS 动画 */
        animation: none !important;
        width: auto !important;
        white-space: nowrap;
        border-right: 2px solid #333; /* 设置光标 */
        padding-right: 3px;
        display: inline-block;
    }

</style>

<div class="container" style="padding-left: 65px; padding-right: 85px;">
    <div class="row mb-4" style="padding-right: 20px">
        <div class="col-lg-6 pe-lg-3 mb-4">
            <div class="card h-100" id="card1">
                <div class="card-header" id="card-header1">
                    <span class="typing-animation">Welcome to sceRNAdb!</span>
                </div>
                <div class="card-body d-flex align-items-center" style="padding-top: 2rem; padding-bottom: 2rem;">
                    <div lang="en" style="text-indent: 2em; text-align: justify; text-justify: inter-word; hyphens: auto; -webkit-hyphens: auto;">
                        sceRNAdb is a database dedicated to systematic characterization of enhancer RNAs (eRNAs) at single-cell resolution. Built from full-length scRNA-seq datasets, it provides expression profiles for 866,954 eRNAs across 29 tissue/cell-line types and six species. The database integrates extensive functional annotations, including SNPs, QTLs, RNA methylation sites, RBP-binding sites, TFBSs, transposable elements, and CRISPR target sites, together with interactive visualization and download tools. sceRNAdb provides a comprehensive resource for exploring eRNA expression, regulation, and function in single cells.
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 ps-lg-3 mb-4" style="margin-top: 40px; text-align:center;">
            <h5 style="margin-bottom:10px;"> Keyword Cloud </h5>
            <canvas width="500" height="400" id="myCanvas" style="cursor: grab;"></canvas>
        </div>
    </div>

    <div id="tags" style="display:none;">
        <ul>
            <li><a href="#">Homo sapiens</a></li>
            <li><a href="#">Brain</a></li>
            <li><a href="#">Smart-seq2</a></li>
            <li><a href="#">Mus musculus</a></li>
            <li><a href="#">Embryo</a></li>
            <li><a href="#">SMARTer</a></li>
            <li><a href="#">Danio rerio</a></li>
            <li><a href="#">GSE109774</a></li>
            <li><a href="#">Tang</a></li>
            <li><a href="#">Bone marrow</a></li>
            <li><a href="#">Embryonic stem cell</a></li>
            <li><a href="#">E-MTAB-6819</a></li>
            <li><a href="#">Heart</a></li>
            <li><a href="#">Caenorhabditis elegans</a></li>
            <li><a href="#">Testis</a></li>
        </ul>
    </div>

    <div class="card mb-4 border border-dark" id="card5">
        <div class="card-header" id="card-header5">
            Explore sceRNAdb
        </div>
        <div class="card-body">
            <div class="row">
                <img src="./public/image/proccess.png" class="img-responsive" alt="Responsive image">
            </div>
        </div>
    </div>

    <div class="row mb-4" style="padding-left: 18px; padding-right: 19px;">
        <div class="col-lg-6 mb-4">
            <div class="card h-100" id="card2">
                <div class="card-header" id="card-header2">
                    News and Events
                </div>

                <div class="card-body news-scroll-container" id="news-container" style="height: 260px;">
                    <ul class="list-unstyled news-list" id="news-list">

                        <li><b>2026.04.05</b> Backend database architecture optimized to efficiently query massive datasets exceeding 1.2 billion rows.</li>
                        <li class="separator"></li>

                        <li><b>2026.02.11</b> sceRNAdb version 1.0 annotation platform has been officially completed.</li>
                        <li class="separator"></li>

                        <li><b>2025.12.18</b> Server infrastructure upgraded (32-core Intel Xeon, 125Gi RAM) for ultra-fast data retrieval.</li>
                        <li class="separator"></li>

                        <li><b>2025.11.27</b> The single-cell analysis function of the database has been added</li>
                        <li class="separator"></li>

                        <li><b>2025.07.12</b> The computing power of UMAP and VIOLIN has been optimized.</li>
                        <li class="separator"></li>

                        <li><b>2025.06.20</b> Global search and hot word cloud functions have been added.</li>
                        <li class="separator"></li>

                        <li><b>2025.04.17</b> The engine and style of the search page have been modified.</li>
                        <li class="separator"></li>

                        <li><b>2025.03.04</b> Complete the basic construction of the database and go online.</li>
                        <li class="separator"></li>

                        <li><b>2025.01.21</b> Update database download, statistics and submit pages.</li>
                        <li class="separator"></li>

                        <li><b>2024.09.08</b> Update the page of search section.</li>
                        <li class="separator"></li>

                        <li><b>2024.05.17</b> Improve and update enhancer browse functions.</li>
                        <li class="separator"></li>

                        <li><b>2024.03.23</b> Update the library construction process and introduction of the home page.</li>
                        <li class="separator"></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card h-100" id="card3" style="background-color: transparent; border-color: #444;">
                <div class="card-header" id="card-header3" style="border-bottom-color: #444;">
                    Visitor map
                </div>

                <div class="card-body d-flex flex-column justify-content-center align-items-center" style="min-height: 200px;">

                    <div style="
                        width: 305px;
                        height: 260px;
                        overflow: hidden;
                        position: relative;
                        border-radius: 8px;
                    ">
                        <iframe src="https://revolvermaps2.com/widget/96760219-5075-440b-b7a3-e939f508bf09"
                                width="320"
                                height="320"
                                style="
                                border: 0;
                                position: absolute;
                                top: 0;
                                left: -1px;
                                transform: scale(1.05);
                                transform-origin: top center;
                            "
                                loading="lazy"
                                allowtransparency="true">
                        </iframe>
                    </div>

                    <div id="welcome-location" style="margin-top: 20px; font-size: 12px; color: #0362a4; font-weight: bold; text-align: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16" style="vertical-align: text-bottom; margin-right: 5px;">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>
                        <span id="visitor-text">Welcome to sceRNAdb! Locating...</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    window.onload = function () {
        const colors = ["#2c7bb6","#fdae61","#1a9850","#d7191c","#abd9e9"];
        document.querySelectorAll('#tags a').forEach((a, i) => {
            a.style.color = colors[i % colors.length];
            a.addEventListener('click', function (e) {
                e.preventDefault();
                const keyword = encodeURIComponent(this.textContent.trim());
                window.location.href = "Cloud_search.php?keyword=" + keyword;
            });
        });

        const canvas = document.getElementById('myCanvas');
        canvas.addEventListener('mousedown', () => canvas.style.cursor = 'grabbing');
        canvas.addEventListener('mouseup', () => canvas.style.cursor = 'grab');
        canvas.addEventListener('mouseleave', () => canvas.style.cursor = 'grab');

        try {
            TagCanvas.Start('myCanvas', 'tags', {
                textColour: null,
                textHeight: 22,
                outlineColour: 'transparent',
                reverse: true,
                depth: 0.8,
                maxSpeed: 0.01,
                initial: [0.2, -0.2],
                decel: 0.95,
                shuffleTags: true,
                wheelZoom: false,
                dragControl: true,
                dragThreshold: 4
            });
        } catch (e) {
            console.log("Canvas error:", e);
        }
    };

    $(document).ready(function() {

        // ==========================================
        const $typingEl = $('.typing-animation');
        if ($typingEl.length > 0) {
            const fullText = "Welcome to sceRNAdb!";
            $typingEl.text(''); // 先清空占位字符
            let charIndex = 0;

            const typeTimer = setInterval(() => {
                $typingEl.text(fullText.substring(0, charIndex + 1));
                charIndex++;
                if (charIndex >= fullText.length) {
                    clearInterval(typeTimer);
                    // 打字完成后开启光标闪烁
                    setInterval(() => {
                        const currentBorder = $typingEl.css('border-right-color');
                        $typingEl.css('border-right-color', (currentBorder === 'rgba(0, 0, 0, 0)' || currentBorder === 'transparent') ? '#333' : 'transparent');
                    }, 500);
                }
            }, 80); // 打字速度，数字越小越快
        }
        // ==========================================

        const $list = $('#news-list');
        const $items = $list.find('li:not(.separator)');
        const $container = $('#news-container');

        function setHoverTitle() {
            $items.each(function() {
                const fullText = $(this).text().trim();
                $(this).attr('title', fullText);
            });
        }
        setHoverTitle();

        if ($items.length <= 3) {
            return;
        }

        const itemHeight = $items.first().outerHeight(true);
        const originalListHeight = itemHeight * $items.length;

        $list.prepend($list.html());
        $list.css('margin-top', -originalListHeight);

        const scrollInterval = 4000;
        const animationSpeed = 800;

        function autoScroll() {
            $list.animate({
                'margin-top': `+=${itemHeight}`
            }, animationSpeed, function() {
                if (parseInt($list.css('margin-top')) >= 0) {
                    $list.css('margin-top', -originalListHeight);
                }
            });
        }

        let scrollTimer = setInterval(autoScroll, scrollInterval);

        $container.hover(function() {
            clearInterval(scrollTimer);
        }, function() {
            scrollTimer = setInterval(autoScroll, scrollInterval);
        });
    });
</script>

<script>
    $(document).ready(function() {
        const visitorText = document.getElementById('visitor-text');

        async function fetchLocation() {
            const apis = [
                'https://ipapi.co/json/',
                'https://api.db-ip.com/v2/free/self',
                'https://ipwho.is/'
            ];

            for (let url of apis) {
                try {
                    const controller = new AbortController();
                    const timeoutId = setTimeout(() => controller.abort(), 3000);

                    const response = await fetch(url, { signal: controller.signal });
                    clearTimeout(timeoutId);

                    if (response.ok) {
                        const data = await response.json();

                        let city = data.city || data.city_name || "";
                        let country = data.country_name || data.countryName || data.country || "";

                        if (country) {
                            let locationStr = city ? `${city}, ${country}` : country;
                            visitorText.innerHTML = `Welcome, visitor from <span style="color: #df4759;">${locationStr}</span>.`;
                            return;
                        }
                    }
                } catch (error) {
                    console.log(`API [${url}] failed, trying next...`);
                }
            }

            visitorText.innerText = "Welcome to explore sceRNAdb.";
        }

        fetchLocation();
    });
</script>

<?php
include "./templates/footer.php";
?>

</body>
</html>