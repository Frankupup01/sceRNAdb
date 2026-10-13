# sceRNAdb: A Single-Cell Enhancer RNA Database

![sceRNAdb](https://img.shields.io/badge/Database-sceRNAdb-blue) 
![Species](https://img.shields.io/badge/Species-6-brightgreen)
![License](https://img.shields.io/badge/License-MIT-green)

##  Introduction
**sceRNAdb** is a comprehensive, interactive database designed to archive, explore, and visualize enhancer RNA (eRNA) expression profiles at single-cell resolution across multiple species. It provides researchers with user-friendly web interfaces to search, browse, and analyze differential eRNA expression, integrated with high-performance genomic visualization using JBrowse2.

##  Key Features
* **Multi-Species Support:** Integrates single-cell eRNA expression profiles across 6 species.
* **Interactive Visualization:** Seamlessly integrated with JBrowse2 for spatial and genomic context visualization.
* **Comprehensive Search & Browse:** Flexible querying by gene, region, tissue, cell type, or study.
* **Differential Expression Analysis:** Built-in features to compare eRNA expression across different cell populations.

##  Repository Structure
This repository contains the source code for the web interface and backend API of sceRNAdb. The core components include:
* `app/` & `src/`: Backend PHP logic and API endpoints.
* `templates/`: HTML/PHP templates for the frontend UI.
* `*.php`: Main entry points for searching, browsing, and detailed result pages.

##  Installation & Setup Note
To keep this open-source repository lightweight and secure, large data files and third-party libraries have been excluded via `.gitignore`. 

If you wish to deploy this database locally or on your own server, please ensure you have a standard web server environment (e.g., Nginx/Apache + PHP) and manually set up the following directories:

1. **Database Files (`db/`)**
   * Create a `db/` directory in the root folder.
   * Place your SQLite database files or MySQL connection configurations here.

2. **Assets and Generated Data (`public/` & `json/`)**
   * Create `public/` to store image assets, reference genomes, and JBrowse2 track data.
   * Create `json/` to store any backend-generated JSON files for frontend rendering.

3. **Third-Party Libraries**
   * **Bootstrap 5:** Download the Bootstrap 5 framework and place it in a `bootstrap5/` directory.
   * **ECharts:** Download ECharts 5.5.0 and place it in an `echarts-5.5.0/` directory.
   * **PHP Dependencies:** If applicable, run `composer install` to generate the `vendor/` directory based on the `composer.json` file.

##  Contact & Citation
If you use sceRNAdb or its source code in your research, please cite our upcoming publication. 
For any questions, bug reports, or data submission requests, please contact the development team or open an issue in this repository.