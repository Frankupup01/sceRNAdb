<?php
include "./templates/base.php";
?>
<?php
include "./templates/header.php";
?>

<style>
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    #mainContain,
    .container {
        flex: 1 0 auto;
    }

    footer, .footer {
        margin-top: auto;
    }

    /* === Section 分割线及标题 (通用) === */
    .section-title {
        padding: 20px 80px 0; /* 增加上边距，保持协调 */
        font-size: 22px;
        font-weight: bold;
        color: #0362a4;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-divider {
        border: none;
        border-top: 2px solid #ccc;
        margin: 15px 80px;
    }

    /* === Quick Search 样式 === */
    .quick-search {
        width: 100%;
        padding: 20px 80px 40px; /* 增加底部间距以区分下一个模块 */
        text-align: center;
        position: relative;
    }
    .quick-search .search-wrapper {
        position: relative;
        display: inline-block;
        width: 60%;
    }
    .quick-search input {
        width: 100%;
        padding: 10px 50px 10px 15px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }
    .quick-search button {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        padding: 6px 15px;
        font-size: 14px;
        background: #fff;
        color: #000;
        border: 1px solid #ccc;
        border-radius: 6px;
        cursor: pointer;
        display: none;
    }
    .quick-search button:hover {
        background: #f5f5f5;
    }
    .quick-suggestions {
        margin-top: 10px;
        font-size: 14px;
        color: #555;
    }
    .quick-suggestions span {
        color: #0362a4;
        cursor: pointer;
        margin-right: 10px;
    }

    /* === 主搜索卡片区域 === */
    .search-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        padding: 20px 80px 60px;
    }

    .search-thumb {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        background: #f0f0f0;
    }
    .search-thumb img {
        width: 50%;
        height: 200px;
        object-fit: cover;
        transition: filter 0.3s;
    }
    .search-thumb h2 {
        flex: 1;
        margin: 0;
        padding: 0 15px;
        font-size: 25px;
        color: #0362a4;
        font-weight: bold;
    }
    .search-thumb:hover img {
        filter: brightness(0.7);
    }
</style>

<div class="container" id="mainContain">

    <div class="section-title">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-lightning-charge" viewBox="0 0 16 16">
            <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z"/>
        </svg>
        Quick Search
    </div>
    <hr class="section-divider">

    <div class="quick-search">
        <div class="search-wrapper">
            <input type="text" id="quickSearchInput" placeholder="Quick search...">
            <button id="quickSearchBtn">Search</button>
        </div>
        <div class="quick-suggestions">
            e.g.
            <span data-value="Breast cancer">Breast cancer</span>
            <span data-value="Kidney">Kidney</span>
            <span data-value="E-MTAB-3321">E-MTAB-3321</span>
            <span data-value="SRR3650299">SRR3650299</span>
        </div>
    </div>


    <div class="section-title">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>
        Detail Search
    </div>
    <hr class="section-divider">

    <div class="search-grid">
        <div class="search-thumb" data-target="region">
            <img src="./public/image/search/region.png" alt="Genomic Region">
            <h2>Genomic Region</h2>
        </div>

        <div class="search-thumb" data-target="study">
            <img src="./public/image/search/study.png" alt="Study">
            <h2>Study</h2>
        </div>

        <div class="search-thumb" data-target="tissue">
            <img src="./public/image/search/tissue.png" alt="Tissue">
            <h2>Tissue / Cell Type</h2>
        </div>

        <div class="search-thumb" data-target="sample">
            <img src="./public/image/search/sample.png" alt="Sample">
            <h2>Single Sample</h2>
        </div>
    </div>
</div>

<script>
    // === 点击卡片新开网页的逻辑 ===
    document.querySelectorAll('.search-thumb').forEach(thumb => {
        thumb.addEventListener('click', () => {
            const targetId = thumb.dataset.target;
            let targetUrl = '';

            switch (targetId) {
                case 'region':
                    targetUrl = './templates/iframe/iframe_region.php';
                    break;
                case 'study':
                    targetUrl = './templates/iframe/iframe_studyid.php';
                    break;
                case 'tissue':
                    targetUrl = './templates/iframe/iframe_cell.php';
                    break;
                case 'sample':
                    targetUrl = './templates/iframe/iframe_sample.php';
                    break;
            }

            if (targetUrl) {
                // 打开新标签页
                window.open(targetUrl, '_blank');
            }
        });
    });

    // === Quick Search 逻辑 ===
    const input = document.getElementById('quickSearchInput');
    const btn = document.getElementById('quickSearchBtn');

    function doQuickSearch() {
        let keyword = input.value.trim();
        if (keyword) {
            window.location.href = "quick_search.php?keyword=" + encodeURIComponent(keyword);
        }
    }

    input.addEventListener('input', () => {
        btn.style.display = input.value.trim() ? 'inline-block' : 'none';
    });

    document.querySelectorAll('.quick-suggestions span').forEach(span => {
        span.addEventListener('click', () => {
            input.value = span.dataset.value; // 填充输入框
            doQuickSearch(); // 关键修改：直接调用搜索并跳转
        });
    });

    btn.addEventListener('click', doQuickSearch);

    input.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            doQuickSearch();
        }
    });
</script>

<?php
include "./templates/footer.php";
?>
</body>
</html>