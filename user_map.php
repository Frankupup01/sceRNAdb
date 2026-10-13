<div id="worldMap" style="width:800px; height:500px; margin:0 auto;"></div>

<script src="./bootstrap5/map/echarts.min.js"></script>
<script src="./bootstrap5/map/world.js"></script>

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
            //  获取数据库统计数据并绘制地图
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