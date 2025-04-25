<?php
include "./base_iframe_test.php";
?>

<style>
.custom-border {
    border: 3px dashed #0295ff; /* 虚线边框，颜色蓝色，宽度3px */
    /*border-radius: 10px;     /* 可选：为边框添加圆角 */
    padding: 20px;           /* 内部间距，确保内容不会紧贴边框 */
    margin: 10px 0;          /* 外部间距，确保与其他元素有一定距离 */
}
</style>


	<body style="overflow-x: hidden;overflow-y: hidden;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
        <form>
		    <div class="form-group">

                <label for="end" class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step1</span>: Input genome region</label>
                <input type="text" class="form-control" name="Region" id="Region" placeholder="eg:chr1:1438079-1641840">


                <label for="specie_lncs" class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step2</span>: Choose a species</label>
				<select class="selectpicker form-control" id="Spe"
				    title="Select a species(e.g.'Homo Sapiens')" data-container="body"
				    data-live-search="true" data-hide-disabled="true" data-actions-box="true"
				    data-virtual-scroll="false">
				    <option value="Homo sapiens">Homo sapiens</option>
				    <option value="Mus musculus">Mus musculus</option>
                    <option value="Gallus gallus">Gallus gallus</option>
                    <option value="Danio rerio">Danio rerio</option>
                    <option value="Caenorhabditis elegans">Caenorhabditis elegans</option>
                    <option value="Drosophila">Drosophila</option>
				</select>

                <!-- Tech List -->
                <div class="center-block" id="t1">
                    <label for="specie_lncs" class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step3</span>: Please to choose Sequencing Technology</label>
                    <select class="selectpicker form-control" id="Tech"
                            title="Select a Sequencing type(e.g.'Smart-seq2')" data-container="body"
                            data-live-search="true" data-hide-disabled="true" data-actions-box="true"
                            data-virtual-scroll="false">
                    </select>
                </div>

                <div class="center-block" id="t2">
                    <!-- Tissue List-->
                    <label  class="font-weight-bold text-justify" style="font-size: 14px;"><span style="color: red;">Step4</span>: Tissue type</label>
                    <select class="selectpicker form-control" id="Tissue"
                            title="Select Tissue Type" data-container="body"
                            data-live-search="true" data-hide-disabled="true" data-actions-box="true"
                            data-virtual-scroll="false">
                    </select>
                </div>

                <div class="center-block" id="t3">
                    <!-- Cell List-->
                    <label  class="font-weight-bold text-justify" style="font-size: 14px;"><span style="color: red;">Step5</span>: Cell type</label>
                    <select class="selectpicker form-control" id="Cell"
                            title="Select Cell Type" data-container="body"
                            data-live-search="true" data-hide-disabled="true" data-actions-box="true"
                            data-virtual-scroll="false">
                    </select>
                </div>



<!--
                <div class="mt-2">
                    <a id='op2' class="btn btn-default" onclick="Turn()"  type="submit"><b>Search Typical eRNAs</b></a>
                    <a id='op3' class="btn btn-default" onclick="Turn2()"  type="submit"><b>Search Super eRNAs</b></a>
                    <a onclick="populateExamples()" class="btn btn-default"><b>Example</b></a>
                    <button class="btn btn-default"  id="reset"><b>Reset</b></button>
                </div>
-->
                <div class="mt-2">
                    <div style="margin-bottom: 8px;">
                        <a id='op2' class="btn btn-default" onclick="Turn()" type="submit"><b>Search Typical eRNAs</b></a>
                        <a id='op3' class="btn btn-default" onclick="Turn2()" type="submit"><b>Search Super eRNAs</b></a>
                    </div>
                    <div>
                        <a onclick="populateExamples()" class="btn btn-default"><b>Example</b></a>
                        <button class="btn btn-default" id="reset"><b>Reset</b></button>
                    </div>
                </div>

				<div style="color:darkgray;">
				    <p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>Note:</strong></p>
				    <p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>1.Step 1 inputting the chromosome region the user wants to search for.</strong></p>
				    <p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>2.All options must be selected in order.</strong></p>
				</div>
		    </div>
		</form>
            </div>

            <div class="col-lg-6">
                <div class="custom-border text-justify font-weight-400 px-4 py-2">
                    <h5 class="text-danger font-weight-bold"><i class="ni ni-tag text-warning"></i> Function introduction:</h5>
                    <p class="text-dark font-weight-400">
                        In the dataset-based advanced query, users determine the scope of the eRNA query by determining the sample and genome location for the results of interest.
                    </p>
                    <h5 class="text-danger font-weight-bold"><i class="ni ni-tag text-warning"></i> Parameter explanation:</h5>
                    <p class="text-dark font-weight-400">1) Genomic region: Chromosome,at the start of the chromosome and at the end of the chromosome.</p>
                    <p class="text-dark font-weight-400">2) Species: Select Homo sapiens or Mus musculus.</p>
                    <p class="text-dark font-weight-400">3) Sequencing Technonlogy: Select the Single-cell transcriptome library preparation strategy of interest.</p>
                    <p class="text-dark font-weight-400">4) Tissue Type: Select the tissue of interest.</p>
                    <p class="text-dark font-weight-400">5) Cell Type: Select the cell of interest.</p>

                </div>
            </div>

        </div>
    </div>
		<div style="color:darkgray;">
		<!-- <p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>Note:</strong></p> -->
		<!-- <p class="h5 text-justify font-weight-400 dashed border-primary"><strong><i class="ni ni-tag text-warning"></i>Select a chromosome number and input appropriate start and end sites.</strong></p> -->
		</div>
								<script>
									$(function(){
										var url =window.location.href;
										$("#reset").click(function(){
											window.location.href=url;
										});
									});
								</script>

    <script>

        // Tech的级联列表
        function autoselect_tech(Species) {
            if (Species == "") {
                alert('Sorry. No result for your input.');
            }
            else {
                var query = {
                    'select_specie': Species,
                };
                $.ajax({
                    url: '../../api/auto_select_tech.php',
                    cache: false,
                    type: 'post',
                    dataType: 'json',
                    data: query,
                    async: true,
                    success: function (res) {
                        console.log(res);
                        var data = res;
                        var options = [], _options;
                        // var d0 = 0;
                        for (var i = 0; i < data.length; i++) {
                            var option = '<option value="' + data[i] + '">' + data[i] + '</option>';
                            options.push(option);
                        }
                        var _options = options.join('');
                        $('#Tech')[0].innerHTML = _options;
                        $('#Tech').selectpicker('refresh');
                        $('#Tech').selectpicker('render');
                    },
                    error: function () {
                        alert('Sorry, no dataset Results.');
                    }
                })
            }
        }


        // Study的级联列表
        function autoselect_study(Species,Techtype) {
            if (Species == "" || Techtype == "") {
                // alert('Sorry. No result for your input.');
            }
            else {
                var query = {
                    'select_specie': Species,
                    'select_experiment': Techtype,
                };
                $.ajax({
                    url: '../../api/auto_select_tissue.php',
                    cache: false,
                    type: 'post',
                    dataType: 'json',
                    data: query,
                    async: true,
                    success: function (res) {
                        console.log(res);
                        var data = res;
                        var options = [], _options;
                        // var d0 = 0;
                        for (var i = 0; i < data.length; i++) {
                            var option = '<option value="' + data[i] + '">' + data[i] + '</option>';
                            options.push(option);
                        }
                        var _options = options.join('');
                        $('#Tissue')[0].innerHTML = _options;
                        $('#Tissue').selectpicker('refresh');
                        $('#Tissue').selectpicker('render');
                    },
                    error: function () {
                        alert('Sorry, no dataset Results.');
                    }
                })
            }
        }

        // Study的级联列表
        function autoselect_cell(Species,Techtype,Tissuetype) {
            if (Species == "" || Techtype == "" || Tissuetype == "") {
                // alert('Sorry. No result for your input.');
            }
            else {
                var query = {
                    'select_specie': Species,
                    'select_experiment': Techtype,
                    'select_tissue' : Tissuetype,
                };
                $.ajax({
                    url: '../../api/auto_select_region.php',
                    cache: false,
                    type: 'post',
                    dataType: 'json',
                    data: query,
                    async: true,
                    success: function (res) {
                        console.log(res);
                        var data = res;
                        var options = [], _options;
                        // var d0 = 0;
                        for (var i = 0; i < data.length; i++) {
                            var option = '<option value="' + data[i] + '">' + data[i] + '</option>';
                            options.push(option);
                        }
                        var _options = options.join('');
                        $('#Cell')[0].innerHTML = _options;
                        $('#Cell').selectpicker('refresh');
                        $('#Cell').selectpicker('render');
                    },
                    error: function () {
                        alert('Sorry, no dataset Results.');
                    }
                })
            }
        }

        function Turn() {

            var species = $("#Spe").val();
            var techtype = $("#Tech").val();
            var tissue = $("#Tissue").val();
            var cell = $("#Cell").val();

            var region = $('#Region').val(); // 获取Region的值
            var parts = region.split(':'); // 分割字符串，得到["chr1", "1438079-1641840"]
            var Chr = parts[0]; // 染色体编号
            var range = parts[1].split('-'); // 分割字符串，得到["1438079", "1641840"]
            var Start = range[0]; // 起始位置
            var End = range[1]; // 结束位置

            parent.location.href = '../../region_result.php?Chr=' + Chr + '&Start=' + Start + '&End=' + End  + '&Species=' + species + '&Tech=' + encodeURIComponent(techtype) + '&Tissue=' + encodeURIComponent(tissue) + '&Cell=' + encodeURIComponent(cell);
        }

        function Turn2() {

            var species = $("#Spe").val();
            var techtype = $("#Tech").val();
            var tissue = $("#Tissue").val();
            var cell = $("#Cell").val();

            var region = $('#Region').val(); // 获取Region的值
            var parts = region.split(':'); // 分割字符串，得到["chr1", "1438079-1641840"]
            var Chr = parts[0]; // 染色体编号
            var range = parts[1].split('-'); // 分割字符串，得到["1438079", "1641840"]
            var Start = range[0]; // 起始位置
            var End = range[1]; // 结束位置

            parent.location.href = '../../region_SE_result.php?Chr=' + Chr + '&Start=' + Start + '&End=' + End  + '&Species=' + species + '&Tech=' + encodeURIComponent(techtype) + '&Tissue=' + encodeURIComponent(tissue) + '&Cell=' + encodeURIComponent(cell);
        }

    </script>


    <script>
        $.ajaxSetup({
            cache: false //close AJAX cache
        });
        $(function () {
            $('#t1').on('click', function () {
                autoselect_tech($('#Spe').val());
            });
            $('#t2').on('click', function () {
                autoselect_study($('#Spe').val(),$('#Tech').val());
            });
            $('#t3').on('click', function () {
                autoselect_cell($('#Spe').val(),$('#Tech').val(),$('#Tissue').val());
            });
        })

        function populateExamples() {
            console.log("populateExamples() called"); // 检查函数是否被调用

            $('#Region').val("chr1:1000000-20000000")

            // 将 Step 1 填充为示例物种
            console.log("Step 1");
            var speciesSelect = document.getElementById('Spe');
            console.log("Species select element:", speciesSelect); // 检查是否正确获取了下拉列表元素
            var examplespeciesOption = document.createElement('option');
            examplespeciesOption.text = 'Homo sapiens';
            examplespeciesOption.value = 'Homo sapiens';
            speciesSelect.appendChild(examplespeciesOption);
            console.log("Disease select innerHTML after adding option:", speciesSelect.innerHTML); // 检查是否正确添加了选项
            speciesSelect.value = 'Homo sapiens';
            console.log("Disease select value:", speciesSelect.value); // 检查是否正确设置了选中的值



            // 将 Step 2 填充为示例健康/疾病
            console.log("Step 2");
            var techSelect = document.getElementById('Tech');
            console.log("Disease select element:", techSelect); // 检查是否正确获取了下拉列表元素
            var exampletechOption = document.createElement('option');
            exampletechOption.text = 'Smart-seq2';
            exampletechOption.value = 'Smart-seq2';
            techSelect.appendChild(exampletechOption);
            console.log("Disease select innerHTML after adding option:", techSelect.innerHTML); // 检查是否正确添加了选项
            techSelect.value = 'Smart-seq2';
            console.log("Disease select value:", techSelect.value); // 检查是否正确设置了选中的值

            // 将 Step 3 填充为示例健康/疾病
            console.log("Step 3");
            var tissueSelect = document.getElementById('Tissue');
            console.log("Disease select element:", tissueSelect); // 检查是否正确获取了下拉列表元素
            var exampletissueOption = document.createElement('option');
            exampletissueOption.text = 'HEK293T';
            exampletissueOption.value = 'HEK293T';
            tissueSelect.appendChild(exampletissueOption);
            console.log("Disease select innerHTML after adding option:", tissueSelect.innerHTML); // 检查是否正确添加了选项
            tissueSelect.value = 'HEK293T';
            console.log("Disease select value:", tissueSelect.value); // 检查是否正确设置了选中的值

            // 将 Step 3 填充为示例健康/疾病
            console.log("Step 3");
            var cellSelect = document.getElementById('Cell');
            console.log("Disease select element:", cellSelect); // 检查是否正确获取了下拉列表元素
            var examplecellOption = document.createElement('option');
            examplecellOption.text = 'HEK293T';
            examplecellOption.value = 'HEK293T';
            cellSelect.appendChild(examplecellOption);
            console.log("Disease select innerHTML after adding option:", cellSelect.innerHTML); // 检查是否正确添加了选项
            cellSelect.value = 'HEK293T';
            console.log("Disease select value:", cellSelect.value); // 检查是否正确设置了选中的值


            // 刷新下拉列表
            $('.selectpicker').selectpicker('refresh');
        }

    </script>







	</body>
</html>
