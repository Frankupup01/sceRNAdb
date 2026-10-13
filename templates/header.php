<nav class="navbar navbar-expand-md" style="background-color: #2e303f;">
    <div class="container" style="padding-left: 65px; padding-right: 85px;">
        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center ms-4" href="./index.php">
            <img src="./bootstrap5/images/logo.png" alt="sceRNAdb" style="height: 40px; object-fit: contain;">
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
            <ul class="navbar-nav mb-2 mb-md-0 d-flex align-items-center">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="./index.php">HOME</a>
                </li>
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle" href="./browse_dataset.php" data-bs-toggle="dropdown">BROWSE</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./browse_dataset.php">Browse by Dataset</a></li>
                        <li><a class="dropdown-item" href="./browse_sample.php">Browse by Sample</a></li>
                    </ul>
                </li>
                <li class="nav-item mx-2"><a class="nav-link" href="./search_iframe.php">SEARCH</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="http://lcbb.swjtu.edu.cn/jbrowse2/">VISUALIZATION</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="./download.php">DOWNLOAD</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="./manual.php">MANUAL</a></li>
            </ul>
        </div>
    </div>
</nav>