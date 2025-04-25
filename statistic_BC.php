<?php
include "./templates/base.php";
?>

<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>


<div class="row">
    <div class="col-lg-6">
        <div id="main" style="width: 800px;height:800px;"></div>
    </div>

    <div class="col-lg-6">
        <div id="main2" style="width: 800px;height:800px;"></div>
    </div>
</div>





<!--
<script>
    var myChart = echarts.init(document.getElementById('main'));

    myChart.showLoading();

    $.get('./json/dataset.json').done(function(data) {
        myChart.hideLoading();
        myChart.setOption ({
            title: {
                text: 'The total number of cells detected in the collected scRNA-seq datasets.',
                //subtext: 'Source: https://worldcoffeeresearch.org/work/sensory-lexicon/',
                textStyle: {
                    fontSize: 14,
                    align: 'center'
                },
                subtextStyle: {
                    align: 'center'
                },
                //sublink: 'https://worldcoffeeresearch.org/work/sensory-lexicon/'
            },
            series: {
                type: 'sunburst',

                data: data,
                radius: [0, '95%'],
                sort: undefined,

                emphasis: {
                    focus: 'ancestor'
                },

                levels: [
                    {},
                    {
                        r0: '15%',
                        r: '35%',
                        itemStyle: {
                            borderWidth: 2
                        },
                        label: {
                            rotate: 'tangential'
                        }
                    },
                    {
                        r0: '35%',
                        r: '70%',
                        label: {
                            align: 'right'
                        }
                    },
                    {
                        r0: '70%',
                        r: '72%',
                        label: {
                            position: 'outside',
                            padding: 3,
                            silent: false
                        },
                        itemStyle: {
                            borderWidth: 3
                        }
                    }
                ]
            }
        });
    });



</script>
-->






<script type="text/javascript">

    var myChart = echarts.init(document.getElementById('main'));

    var data = [{
        "name": "Metastasis",
        itemStyle: {
            color: '#da1d23'
        },
        "children": [
            {
                "name": "Luminal B",
                itemStyle: {
                    color: '#3aa255'
                },
                "children": [
                    {
                        "name": "BC03LN",
                        "value": 56
                    }
                ]
            },
            {
                "name": "TNBC",
                itemStyle: {
                    color: '#0aa3b5'
                },
                "children": [
                    {
                        "name": "BC07LN",
                        "value": 54
                    },
                    {
                        "name": "HCI001",
                        "value": 183
                    },
                    {
                        "name": "HCI002",
                        "value": 183
                    },
                    {
                        "name": "HCI010",
                        "value": 384
                    }
                ]
            }
        ]
    },
        {
            "name": "Primary",
            itemStyle: {
                color: '#187a2f'
            },
            "children": [
                {
                    "name": "HER2",
                    itemStyle: {
                        color: '#ebb40f'
                    },
                    "children": [
                        {
                            "name": "BC04",
                            "value": 60
                        },
                        {
                            "name": "BC05",
                            "value": 78
                        },
                        {
                            "name": "BC06",
                            "value": 26
                        }
                    ]
                },
                {
                    "name": "Luminal A",
                    itemStyle: {
                        color: '#da1d23'
                    },
                    "children": [
                        {
                            "name": "BC01",
                            "value": 28
                        },
                        {
                            "name": "BC02",
                            "value": 57
                        }
                    ]
                },
                {
                    "name": "Luminal B",
                    itemStyle: {
                        color: '#3aa255'
                    },
                    "children": [
                        {
                            "name": "BC03",
                            "value": 38
                        }
                    ]
                },
                {
                    "name": "TNBC",
                    itemStyle: {
                        color: '#0aa3b5'
                    },
                    "children": [
                        {
                            "name": "BC07",
                            "value": 52
                        },
                        {
                            "name": "BC08",
                            "value": 24
                        },
                        {
                            "name": "BC09",
                            "value": 30
                        },
                        {
                            "name": "BC09_Re",
                            "value": 31
                        },
                        {
                            "name": "BC10",
                            "value": 17
                        },
                        {
                            "name": "BC11",
                            "value": 12
                        },
                        {
                            "name": "HCI001",
                            "value": 192
                        },
                        {
                            "name": "HCI002",
                            "value": 393
                        },
                        {
                            "name": "HCI010",
                            "value": 372
                        },
                        {
                            "name": "PT039",
                            "value": 333
                        },
                        {
                            "name": "PT058",
                            "value": 96
                        },
                        {
                            "name": "PT081",
                            "value": 288
                        },
                        {
                            "name": "PT084",
                            "value": 286
                        },
                        {
                            "name": "PT089",
                            "value": 333
                        },
                        {
                            "name": "PT126",
                            "value": 198
                        }
                    ]
                }
            ]
        }];

    option = {
        title: {
            text: 'The total number of cells detected in the collected scRNA-seq datasets.',
            //subtext: 'Source: https://worldcoffeeresearch.org/work/sensory-lexicon/',
            textStyle: {
                fontSize: 14,
                align: 'center'
            },
            subtextStyle: {
                align: 'center'
            },
            //sublink: 'https://worldcoffeeresearch.org/work/sensory-lexicon/'
        },
        series: {
            type: 'sunburst',

            data: data,
            radius: [0, '95%'],
            sort: undefined,

            emphasis: {
                focus: 'ancestor'
            },

            levels: [
                {},
                {
                    r0: '15%',
                    r: '35%',
                    itemStyle: {
                        borderWidth: 2
                    },
                    label: {
                        rotate: 'tangential'
                    }
                },
                {
                    r0: '35%',
                    r: '70%',
                    label: {
                        align: 'right'
                    }
                },
                {
                    r0: '70%',
                    r: '72%',
                    label: {
                        position: 'outside',
                        padding: 3,
                        silent: false
                    },
                    itemStyle: {
                        borderWidth: 3
                    }
                }
            ]
        }
    };

    option && myChart.setOption(option);





</script>







<script type="text/javascript">

    var myChart = echarts.init(document.getElementById('main2'));

    var data = [{
        "name": "human",
        itemStyle: {
            color: '#5470c6'
        },
        "children": [
            {
                "name": "2-cell",
                "children": [
                    {
                        "name": "GSE36552",
                        "value": 6
                    },
                    {
                        "name": "GSE44183",
                        "value": 3
                    },
                    {
                        "name": "GSE71318",
                        "value": 4
                    }
                ]
            },
            {
                "name": "4-cell",
                "children": [
                    {
                        "name": "GSE36552",
                        "value": 12
                    },
                    {
                        "name": "GSE44183",
                        "value": 3
                    },
                    {
                        "name": "GSE71318",
                        "value": 4
                    }
                ]
            },
            {
                "name": "8-cell",
                "children": [
                    {
                        "name": "EMTAB3929",
                        "value": 81
                    },
                    {
                        "name": "GSE36552",
                        "value": 20
                    },
                    {
                        "name": "GSE44183",
                        "value": 12
                    },
                    {
                        "name": "GSE71318",
                        "value": 5
                    }
                ]
            },
            {
                "name": "Blastocyst",
                itemStyle: {
                    color: '#187a2f'
                },
                "children": [
                    {
                        "name": "EMTAB3929",
                        "value": 415
                    },
                    {
                        "name": "GSE36552",
                        "value": 30
                    },
                    {
                        "name": "GSE71318",
                        "value": 12
                    }
                ]
            },
            {
                "name": "Late blastocyst",
                itemStyle: {
                    color: '#187a2f'
                },
                "children": [
                    {
                        "name": "EMTAB3929",
                        "value": 466
                    }
                ]
            },
            {
                "name": "Morula",
                itemStyle: {
                    color: '#0aa3b5'
                },
                "children": [
                    {
                        "name": "EMTAB3929",
                        "value": 190
                    },
                    {
                        "name": "GSE36552",
                        "value": 16
                    },
                    {
                        "name": "GSE44183",
                        "value": 3
                    },
                    {
                        "name": "GSE71318",
                        "value": 4
                    }
                ]
            },
            {
                "name": "early blastocsyt",
                itemStyle: {
                    color: '#187a2f'
                },
                "children": [
                    {
                        "name": "EMTAB3929",
                        "value": 377
                    },
                    {
                        "name": "GSE71318",
                        "value": 3
                    }
                ]
            },
            {
                "name": "hESC",
                itemStyle: {
                    color: '#0aa3b5'
                },
                "children": [
                    {
                        "name": "GSE36552",
                        "value": 34
                    },
                    {
                        "name": "GSE71318",
                        "value": 7
                    }
                ]
            },
            {
                "name": "oocyte",
                "children": [
                    {
                        "name": "GSE36552",
                        "value": 3
                    },
                    {
                        "name": "GSE44183",
                        "value": 3
                    },
                    {
                        "name": "GSE71318",
                        "value": 4
                    }
                ]
            },
            {
                "name": "zygote",
                "children": [
                    {
                        "name": "GSE36552",
                        "value": 3
                    },
                    {
                        "name": "GSE44183",
                        "value": 5
                    },
                    {
                        "name": "GSE71318",
                        "value": 5
                    }
                ]
            }
        ]
    },
        {
            "name": "mouse",
            itemStyle: {
                color: '#da1d23'
            },
            "children": [
                {
                    "name": "16-cell",
                    "children": [
                        {
                            "name": "E-MTAB-3321",
                            "value": 6
                        },
                        {
                            "name": "GSE45719",
                            "value": 58
                        }
                    ]
                },
                {
                    "name": "2-cell",
                    "children": [
                        {
                            "name": "E-MTAB-3321",
                            "value": 16
                        },
                        {
                            "name": "GSE22182",
                            "value": 8
                        },
                        {
                            "name": "GSE44183",
                            "value": 3
                        },
                        {
                            "name": "GSE45719",
                            "value": 28
                        },
                        {
                            "name": "GSE53386",
                            "value": 17
                        },
                        {
                            "name": "GSE57249",
                            "value": 20
                        }
                    ]
                },
                {
                    "name": "32-cell",
                    "children": [
                        {
                            "name": "E-MTAB-3321",
                            "value": 6
                        }
                    ]
                },
                {
                    "name": "4-cell",
                    "children": [
                        {
                            "name": "E-MTAB-3321",
                            "value": 64
                        },
                        {
                            "name": "GSE22182",
                            "value": 6
                        },
                        {
                            "name": "GSE44183",
                            "value": 3
                        },
                        {
                            "name": "GSE45719",
                            "value": 14
                        },
                        {
                            "name": "GSE53386",
                            "value": 7
                        },
                        {
                            "name": "GSE57249",
                            "value": 20
                        }
                    ]
                },
                {
                    "name": "8-cell",
                    "children": [
                        {
                            "name": "E-MTAB-3321",
                            "value": 32
                        },
                        {
                            "name": "GSE22182",
                            "value": 6
                        },
                        {
                            "name": "GSE44183",
                            "value": 3
                        },
                        {
                            "name": "GSE45719",
                            "value": 47
                        },
                        {
                            "name": "GSE53386",
                            "value": 7
                        }
                    ]
                },
                {
                    "name": "E7.0",
                    "children": [
                        {
                            "name": "E-MTAB-4079",
                            "value": 138
                        }
                    ]
                },
                {
                    "name": "E7.5",
                    "children": [
                        {
                            "name": "E-MTAB-4079",
                            "value": 259
                        }
                    ]
                },
                {
                    "name": "Early blastocyst",
                    itemStyle: {
                        color: '#ebb40f'
                    },
                    "children": [
                        {
                            "name": "GSE45719",
                            "value": 43
                        }
                    ]
                },
                {
                    "name": "Late 2-cell",
                    "children": [
                        {
                            "name": "GSE45719",
                            "value": 10
                        }
                    ]
                },
                {
                    "name": "Late blastocyst cell",
                    itemStyle: {
                        color: '#ebb40f'
                    },
                    "children": [
                        {
                            "name": "GSE45719",
                            "value": 30
                        }
                    ]
                },
                {
                    "name": "Late?streak stage",
                    itemStyle: {
                        color: '#be8663'
                    },
                    "children": [
                        {
                            "name": "E-MTAB-4079",
                            "value": 307
                        }
                    ]
                },
                {
                    "name": "blastocyst",
                    itemStyle: {
                        color: '#ebb40f'
                    },
                    "children": [
                        {
                            "name": "GSE45719",
                            "value": 60
                        },
                        {
                            "name": "GSE53386",
                            "value": 13
                        }
                    ]
                },
                {
                    "name": "early blastocsyt",
                    itemStyle: {
                        color: '#ebb40f'
                    },
                    "children": [
                        {
                            "name": "GSE100597",
                            "value": 267
                        }
                    ]
                },
                {
                    "name": "early blastocyst",
                    itemStyle: {
                        color: '#ebb40f'
                    },
                    "children": [
                        {
                            "name": "GSE100597",
                            "value": 99
                        }
                    ]
                },
                {
                    "name": "fibroblast",
                    itemStyle: {
                        color: '#b9a449'
                    },
                    "children": [
                        {
                            "name": "GSE45719",
                            "value": 10
                        }
                    ]
                },
                {
                    "name": "inner cell mass",
                    itemStyle: {
                        color: '#da0d68'
                    },
                    "children": [
                        {
                            "name": "GSE57249",
                            "value": 4
                        }
                    ]
                },
                {
                    "name": "late blastocyst",
                    itemStyle: {
                        color: '#ebb40f'
                    },
                    "children": [
                        {
                            "name": "GSE100597",
                            "value": 105
                        }
                    ]
                },
                {
                    "name": "morula",
                    itemStyle: {
                        color: '#da0d68'
                    },
                    "children": [
                        {
                            "name": "GSE44183",
                            "value": 3
                        },
                        {
                            "name": "GSE53386",
                            "value": 7
                        }
                    ]
                },
                {
                    "name": "oocyte",
                    "children": [
                        {
                            "name": "GSE22182",
                            "value": 2
                        },
                        {
                            "name": "GSE44183",
                            "value": 2
                        },
                        {
                            "name": "GSE53386",
                            "value": 9
                        }
                    ]
                },
                {
                    "name": "pre?streak stage",
                    itemStyle: {
                        color: '#b09733'
                    },
                    "children": [
                        {
                            "name": "E-MTAB-4079",
                            "value": 501
                        },
                        {
                            "name": "GSE100597",
                            "value": 250
                        }
                    ]
                },
                {
                    "name": "pronucleus",
                    "children": [
                        {
                            "name": "GSE44183",
                            "value": 3
                        }
                    ]
                },
                {
                    "name": "trophectoderm",
                    "children": [
                        {
                            "name": "GSE57249",
                            "value": 3
                        }
                    ]
                },
                {
                    "name": "zygote",
                    "children": [
                        {
                            "name": "GSE45719",
                            "value": 4
                        },
                        {
                            "name": "GSE53386",
                            "value": 9
                        },
                        {
                            "name": "GSE57249",
                            "value": 9
                        }
                    ]
                }
            ]
        }];

    option = {
        title: {
            text: 'The total number of cells detected in the collected scRNA-seq datasets.',
            //subtext: 'Source: https://worldcoffeeresearch.org/work/sensory-lexicon/',
            textStyle: {
                fontSize: 14,
                align: 'center'
            },
            subtextStyle: {
                align: 'center'
            },
            //sublink: 'https://worldcoffeeresearch.org/work/sensory-lexicon/'
        },
        series: {
            type: 'sunburst',

            data: data,
            radius: [0, '95%'],
            sort: undefined,

            emphasis: {
                focus: 'ancestor'
            },

            levels: [
                {},
                {
                    r0: '15%',
                    r: '35%',
                    itemStyle: {
                        borderWidth: 2
                    },
                    label: {
                        rotate: 'tangential'
                    }
                },
                {
                    r0: '35%',
                    r: '70%',
                    label: {
                        align: 'right'
                    }
                },
                {
                    r0: '70%',
                    r: '72%',
                    label: {
                        position: 'outside',
                        padding: 3,
                        silent: false
                    },
                    itemStyle: {
                        borderWidth: 3
                    }
                }
            ]
        }
    };

    option && myChart.setOption(option);





</script>




<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>
