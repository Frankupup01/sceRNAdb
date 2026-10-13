
<?php
include "./templates/base.php";
?>

<script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/echarts/map/js/world.js"></script>

<style>
    /* 页面整体最小高度 100% */
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    /* 主内容区域，占据剩余空间 */
    #mainContain,
    .container {
        flex: 1 0 auto;
    }

    /* footer 永远贴底 */
    footer, .footer {
        margin-top: auto;
    }
</style>
<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>


<div class="container" style="padding-left:100px;padding-right: 100px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 style="font-size: 180%;margin-top: 3%"><img src="./public/image/phone_ringing.png" height="30px" style="height:30px;margin-top:-4px"/>Please contact us!</h1>
            <hr/>
        </div>
    </div>
    <div class="row" style="height:600px">
        <div class="col-lg-12">
            <p><strong>Associate Professor:</strong> Zhiyun Guo, Ph.D.</p>
            <p><strong>Affiliation:</strong>School of Life Sciences and Engineering,Southwest Jiaotong University, Chengdu 610000, China</p>
            <!-- <p><strong>Phone:</strong> 13438192585</p> -->
            <p><strong>Email: </strong> zhiyunguo@swjtu.edu.cn</p>
            <hr/>
        </div>
        <div class="col-lg-9">
            <!-- <img src="bootstrap-3.4.1-dist/img/校园地图.png" style="height:400px;width:600px;"/> -->
            <iframe width="100%" height="450" align="center" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="./templates/map.php"></iframe>
        </div>
    </div>
    <hr>
    <div id="worldMap" style="width:800px; height:500px; margin:0 auto;"></div>
</div>

<script>
    // 初始化图表
    var chart = echarts.init(document.getElementById('worldMap'));

    // 国家经纬度映射（可扩展城市）
    var geoCoordMap = {
        "China": [104.195397, 35.86166],
        "United States": [-95.712891, 37.09024],
        "Unknown": [0,0]
    };

    fetch('./templates/track.php')  // 请求 Track.php，记录访问
        .then(()=> {
            // 2️ 获取数据库统计数据并绘制地图
            return fetch('./TRACK/get_user_tracking.php');
        })
        .then(res => res.json())
        .then(data => {
            // 生成散点数据
            let scatterData = data.map(item => {
                let coord = geoCoordMap[item.name] || [0,0];
                return { name: item.name, value: coord.concat(item.value) };
            });

            let mapData = data.map(item => ({ name: item.name, value: item.value }));

            let option = {
                title: { text: 'Users Access Distribution Map', left: 'center' },
                tooltip: { trigger: 'item', formatter: '{b}: {c} visitors' },
                visualMap: {
                    min: 0,
                    max: Math.max(...mapData.map(d => d.value)),
                    left: 'left',
                    top: 'bottom',
                    text: ['High','Low'],
                    calculable: true
                },
                geo: {
                    map: 'world',
                    roam: true,
                    zoom: 0.9,
                    label: { show: false },
                    itemStyle: { areaColor: '#e0e0e0', borderColor: '#111' }
                },
                series: [{
                    name: 'Visitors',
                    type: 'scatter',
                    coordinateSystem: 'geo',
                    data: scatterData,
                    symbolSize: val => 5 + val[2],
                    itemStyle: { color: 'red' }
                }]
            };

            chart.setOption(option);
        });
</script>

<!--include footer-->
<?php
include "./templates/footer.php";
?>



</body>
</html>
