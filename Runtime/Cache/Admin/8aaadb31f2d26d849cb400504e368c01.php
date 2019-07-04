<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>谷程-主页</title>
    <link rel="stylesheet" type="text/css" href="/Public/admin/layui/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/tai.css">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/popup.css">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/class.css">

    <script type="text/javascript" src="/Public/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/admin/js/echarts.min.js"></script>
    <script type="text/javascript" src="/Public/admin/layui/laydate/laydate.js"></script>
    <script type="text/javascript" src="/Public/admin/layui/layui/layui.js" ></script>
</head>
<style>
    ul {
        list-style: disc;
        padding-left: 40px;
    }
    ul ul {
        list-style: circle;
    }
    ul ul ul {
        list-style: square;
    }
    li {
        display: list-item;
    }
</style>
<body class="layui-layout-body" layadmin-themealias="default">
<div class="layui-layout layui-layout-admin">
    <div class="layui-headerC">
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav navCo layui-layout-left">
            <li class="layui-nav-item"></li>
            <li class="layui-nav-item"></li>
            <li class="layui-nav-item"></li>
        </ul>
        <ul class="layui-nav navCo layui-layout-right">
            <li class="layui-nav-item"><a href="<?php echo U('message/messageinfo');?>">待回复(<cite id="mes" style="color:red">0</cite>)</a></li>
            <li class="layui-nav-item">

                <a href="javascript:;">
                    <?php if(session('userInfo.admin_pic') != '' ): ?><img src="<?php echo session('userInfo.admin_pic');?>" class="layui-nav-img">
                        <?php else: ?>
                        <img src="/Public/admin/timg.jpg" alt="头像" class="layui-nav-img"><?php endif; ?>
                    <?php echo session('userInfo.admin_username');?>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo U('user/information');?>">基本资料</a></dd>
                    <dd><a href="<?php echo U('user/userpwd');?>">修改密码</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="<?php echo U('login/logout');?>">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <div class="layui-logoC" lay-href=""><img src="/Public/admin/img/logo.png" alt="">  </div>
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu" lay-shrink="all">

            </ul>
            <span class="layui-nav-bar" style="top: 252px; height: 0px; opacity: 0;"></span>
        </div>

    </div>
    
    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div class="layadmin-tabsbody-item layui-show">
            <div class="layui-fluid">
                <div class="layui-row layui-col-space15">
                    <div class="layui-col-md8">
                        <div class="layui-row layui-col-space15">
                            <div class="layui-col-md12">
                                <div class="layui-card">
                                    <div class="layui-card-header">数据概览</div>
                                    <div class="layui-card-body">

                                        <div class="layui-carousel layadmin-carousel layadmin-dataview" id="myline" data-anim="fade" lay-filter="LAY-index-dataview" lay-anim="" lay-indicator="inside" lay-arrow="hover" style="width: 100%; height: 280px;">
                                            <div carousel-item="" id="LAY-index-dataview">
                                                <div class="layui-this" id="aaa" >

                                                </div>
                                                <div class="layui-this" id="ccc" >
                                                    
                                                </div>
                                                <div class="layui-this"  id="bbb">

                                                </div>
                                            </div>


                                            <div class="layui-carousel-ind">
                                                <ul>
                                                    <li class=""></li>
                                                    <li class="layui-this"></li>
                                                    <li class=""></li>
                                                </ul>
                                            </div>
                                            <button class="layui-icon layui-carousel-arrow" lay-type="sub"></button>
                                            <button class="layui-icon layui-carousel-arrow" lay-type="add"></button>
                                        </div>


                                    </div>
                                </div>
                                <div class="layui-card">
                                    <div class="layui-tab layui-tab-brief layadmin-latestData">
                                        <ul class="layui-tab-title">
                                            <li class="layui-this">今日热搜</li>
                                        </ul>
                                        <div class="layui-tab-content">
                                            <table class="layui-hide" id="hotsearch"></table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-col-md4">
                        <div class="layui-card">
                            <div class="layui-card-header">版本信息</div>
                            <div class="layui-card-body layui-text">
                                <table class="layui-table">
                                    <colgroup>
                                        <col width="100">
                                        <col>
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <td>当前版本</td>
                                        <td>
                                            <script type="text/html" template="">
                                                v{{ layui.admin.v }}
                                                <a href="http://fly.layui.com/docs/3/" target="_blank" style="padding-left: 15px;">更新日志</a>
                                            </script>
                                            v1.2.1 pro <!--<a href="http://fly.layui.com/docs/3/" target="_blank" style="padding-left: 15px;">更新日志</a>-->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>开发语言</td>
                                        <td>PHP</td>
                                    </tr>
                                    <tr>
                                        <td>主要特色</td>
                                        <td>单页面 / 响应式 / 清爽 / 极简</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--<div class="layui-card">
                            <div class="layui-card-header">实时监控</div>
                            <div class="layui-card-body layadmin-takerates">
                                <div class="layui-progress" lay-showpercent="yes">
                                    <h3>CPU使用率</h3>
                                    <div class="layui-progress-bar" lay-percent="<?php echo ($datacpu['cpu']); ?>%" style="width: 58%;"><span class="layui-progress-text"><?php echo ($datacpu['cpu']); ?>%</span></div>
                                </div>
                                <div class="layui-progress" lay-showpercent="yes">
                                    <h3>内存占用率</h3>
                                    <div class="layui-progress-bar layui-bg-red" lay-percent="<?php echo ($datacpu['memory']); ?>%" style="width: 90%;"><span class="layui-progress-text"><?php echo ($datacpu['memory']); ?>%</span></div>
                                </div>
                            </div>
                        </div>-->

                        <div class="layui-card">
                            <div class="layui-card-header">网站流量</div>
                            <div class="layui-card-body">
                                <div class="layui-carousel layadmin-carousel layadmin-news" id="mychart" data-autoplay="true" data-anim="fade" lay-filter="news" lay-anim="fade" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 280px;">


                                </div>
                            </div>
                        </div>

                        <div class="layui-card">
                            <div class="layui-card-header">
                                系统版权
                                <i class="layui-icon layui-icon-tips" lay-tips="要支持的噢" lay-offset="5"></i>
                            </div>
                            <div class="layui-card-body layui-text layadmin-text">
                                <p>谷程【GC】建站品牌在网站建站领域有着10年技术运营经验，于2015年正式成立谷程网络科技公司。我们凭借着高品质视觉体验及互联网设计开发,专业为客户提供高端品牌网站建设、营销型网站建设、手机网站设计、微信公众号定制开发、微信小程序开发、APP定制开发、品牌形象设计以及网络营销服务，我们坚守着用高品质视觉的设计方案与技术开发实力作基础，以企业及品牌的互联网商业目标为核心，为客户打造最具商业价值与用户体验的互联网+产品。</p>
                                <p>2019-05</p>
                                <p>Copyright  (c)  2019 上海谷程网络科技有限公司</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <script>
                //加载 controller 目录下的对应模块
                /*

                  小贴士：
                    这里 console 模块对应 的 console.js 并不会重复加载，
                    然而该页面的视图则是重新插入到容器，那如何保证能重新来控制视图？有两种方式：
                      1): 借助 layui.factory 方法获取 console 模块的工厂（回调函数）给 layui.use
                      2): 直接在 layui.use 方法的回调中书写业务代码，即:
                          layui.use('console', function(){
                            //同 console.js 中的 layui.define 回调中的代码
                          });

                  这里我们采用的是方式1。其它很多视图中采用的其实都是方式2，因为更简单些，也减少了一个请求数。

                */
                // layui.use('console', layui.factory('console'));
            </script>
        </div>
    </div>

    <script>
        layui.use('element', function(){
            var element = layui.element;

        });
        layui.use('table', function(){
            var table = layui.table;

            table.render({
                elem: '#hotsearch'
                ,url:"<?php echo U('index/hotsearch');?>"
                ,cols: [[
                    {field:'name', title: '关键词', minWidth: 150}
                    ,{field:'number', title: 'PV', minWidth: 150, sort: true}
                    ,{field:'usernumber', title: '独立访客', minWidth: 150, sort: true}
                ]]
                ,page: {
                    layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
                    ,limit:5 //一页显示多少条
                    ,limits:[5,10,15,20,25]//每页条数的选择项
                    ,groups: 5 //只显示 5 个连续页码
                    ,first: "首页" //不显示首页
                    ,last: "尾页" //不显示尾页
                }
                // ,page: true
            });
        });
        layui.use('carousel',function () {
            var carousel = layui.carousel;
            var ins = carousel.render({
                elem: '#test2'
                ,width:"100%"
                ,arrow:'none'
                ,full:false
                ,autoplay:false
                // ,interval:2000
                ,index:1
                ,indicator:'inside'
            });
            ins.reload({arrow:'hover'});
        });
        layui.use('carousel',function () {
            var carousel = layui.carousel;
            var ins = carousel.render({
                elem: '#test3'
                ,width:"100%"
                ,arrow:'always'
                ,full:false
                ,autoplay:false
                // ,interval:2000
                ,index:0
                ,indicator:'inside'
            });

            ins.reload({arrow:'hover'});
        })
        layui.use('carousel',function () {
            var carousel = layui.carousel;
            var ins = carousel.render({
                elem: '#myline'
                ,width:"100%"
                ,arrow:'always'
                ,full:false
                ,autoplay:false
                // ,interval:2000
                ,index:0
                ,indicator:'inside'
            });

            ins.reload({arrow:'hover'});
        })
    </script>

    <script type="text/javascript">
        var myChart;
        myChart = echarts.init(document.getElementById('aaa'));
        myChart.showLoading();
        myChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                left: '25%',
                textAlign: 'center',
                data: []
            },
            series: [
                {
                    name: '访问来源',
                    type: 'pie',
                    radius: '55%',
                    center: ['50%', '60%'],
                    data: [],
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        });
        // 异步加载后台数据，通过定时器在实现
        function bower() {

            $.ajax({
                url: "<?php echo U('index/bower');?>",
                type: 'POST',
                dataType: 'JSON',
                success:function(data){
                    if(data.status==1){
                        myChart.setOption({
                            legend: {
                                data: data.data.name
                            },
                            series: [{
                                data: data.data
                            }]
                        });
                        myChart.hideLoading();
                    }else{
                        clearInterval(time);
                        return;
                    }
                }
            })
        };
        bower();
        // var time = setInterval(bower,3000);

    </script>
    <script  type="text/javascript">
        var myChart1;
        myChart1= echarts.init(document.getElementById('bbb'));
        myChart1.showLoading();
        myChart1.setOption({
            legend: {
                data: ['本周每天访客量']
            },
            tooltip: {
                trigger: 'axis'
            },
            color:['#009688'],
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: []
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'访客量',
                    type:'line',
                    data:[]
                }
            ]
        });
        // 异步加载后台数据，通过定时器在实现
        function caller() {
            $.ajax({
                url: "<?php echo U('index/caller');?>",
                type: 'POST',
                dataType: 'JSON',
                success:function(data){
                    if(data.status==1){
                        myChart1.setOption({
                            xAxis: {
                                data: data.time_sc
                            },
                            series: [{
                                data: data.data
                            }]
                        });
                        myChart1.hideLoading();
                    }else{
                        clearInterval(time1);
                        return;
                    }
                }
            })
        };
    // caller();
    var time1 = setInterval(caller,3000);
</script>

    <script>
        var myChart2 = echarts.init(document.getElementById('ccc'));
        myChart2.showLoading();
        myChart2.setOption({
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    lineStyle: {
                        color: '#ddd'
                    }
                },
                backgroundColor: 'rgba(255,255,255,1)',
                padding: [5, 10],
                textStyle: {
                    color: '#red',
                },
                extraCssText: 'box-shadow: 0 0 5px rgba(41,60,85，0.3)'
            },
            legend: {
                left: '50%',
                textAlign: 'center',
                data: ['今日','上周同期']
            },
            grid: {
                left: '3%',
                right: '3%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: {
                type: 'category',
                data: [],
                boundaryGap: false,
                axisTick: {
                    show: false
                },
                axisLine: {
                    lineStyle: {
                        color: '#000'
                    }
                },
                axisLabel: {
                    margin: 10,
                    textStyle: {
                        fontSize: 14
                    }
                }
            },
            yAxis: {
                type: 'value',
                splitLine: {
                    lineStyle: {
                        color: ['#ccc']
                    }
                },
                axisTick: {
                    show: false
                },
                axisLine: {
                    lineStyle: {
                        color: '#000'
                    }
                },
                axisLabel: {
                    margin: 10,
                    textStyle: {
                        fontSize: 14
                    }
                }
            },
            series: [{
                name: '今日',
                type: 'line',
                smooth: true,
                showSymbol: false,
                symbol: 'circle',
                symbolSize: 6,
                data: [],
                areaStyle: {
                    normal: {
                        color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                            offset: 0,
                            color: 'rgba(0,150,136,0.5)'
                        }, {
                            offset: 1,
                            color: 'rgba(0,150,136,0.2)'
                        }], false)
                    }
                },
                itemStyle: {
                    normal: {
                        color: '#009688'
                    }
                },
                lineStyle: {
                    normal: {
                        width: 3
                    }
                }
            }, {
                name: '上周同期',
                type: 'line',
                smooth: true,
                showSymbol: false,
                symbol: 'circle',
                symbolSize: 6,
                data: [],
                areaStyle: {
                    normal: {
                        color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                            offset: 0,
                            color: 'rgba(15,154,195,1)'
                        }, {
                            offset: 1,
                            color: 'rgba(15,154,195,1)'
                        }], false)
                    }
                },
                itemStyle: {
                    normal: {
                        color: '#0F9AC3'
                    }
                },
                lineStyle: {
                    normal: {
                        width: 3
                    }
                }
            }]
        });
        function eachpv() {
            $.ajax({
                url: "<?php echo U('index/eachpv');?>",
                type: 'POST',
                dataType: 'JSON',
                success:function(data){
                    if(data.status==1){
                        myChart2.setOption({
                            xAxis: {
                                data: data.hours
                            },
                            series: [{
                                 data: data.data
                            }
                            ,{
                                 data: data.weekdata
                                }]
                        });
                        myChart2.hideLoading();
                    }else{
                        clearInterval(time1);
                        return;
                    }
                }
            })
        };
        // eachpv();
        var time1 = setInterval(eachpv,3000);
    </script>
    <script>
        var myChart3 = echarts.init(document.getElementById('mychart'));
        myChart3.showLoading();
        myChart3.setOption({
            color: ['rgba(176, 212, 251, 1)'],
            legend: {
                show: true,
                itemGap: 12,
                data: ['当天网站流量']
            },

            series: [{
                name: 'Line 1',
                type: 'pie',
                clockWise: true,
                radius: ['50%', '66%'],
                itemStyle: {
                    normal: {
                        label: {
                            show: false
                        },
                        labelLine: {
                            show: false
                        }
                    }
                },
                hoverAnimation: false,

            }]
        });
        function traffic() {
            $.ajax({
                url: "<?php echo U('index/traffic');?>",
                type: 'POST',
                dataType: 'JSON',
                success:function(data){
                    if(data.status==1){
                        myChart3.setOption({
                            title:{
                                text:data.data+'%',
                                x: 'center',
                                y: 'center',
                                textStyle: {
                                    fontWeight: 'normal',
                                    color: '#0580f2'
                                }
                            },
                            series: [{
                                data:[{
                                    value:data.data,
                                    name: '当天网站流量',
                                    itemStyle: {
                                        normal: {
                                            color: { // 完成的圆环的颜色
                                                colorStops: [{
                                                    offset: 0,
                                                    color: '#00cefc' // 0% 处的颜色
                                                }, {
                                                    offset: 1,
                                                    color: '#367bec' // 100% 处的颜色
                                                }]
                                            },
                                            label: {
                                                show: false
                                            },
                                            labelLine: {
                                                show: false
                                            }
                                        }
                                    }
                                },{value: 100-data.data,
                                    name: ''
                                 }]
                            }]
                        });
                        myChart3.hideLoading();
                    }else{
                        clearInterval(time1);
                        return;
                    }
                }
            })
        };
        traffic();
    </script>


    <div class="layui-footer">
        <!-- 底部固定区域 -->
        Copyright  (c)  2019 上海谷程网络科技有限公司
    </div>
</div>
</body>
</html>

<script>
    layui.use('element', function(){
        var $ = layui.jquery
            ,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块


    });

</script>
<script>
    $(function () {
        get_base();
    });
    function get_base() {
        $.ajax({
            url: "<?php echo U('public/base');?>",
            type: 'get',
            dataType: 'JSON',
            async : false,
            success:function(data){
                var ul=getHtml(data);
                $("#LAY-system-side-menu").append(ul);
                layui.use('element', function() {
                    var element = layui.element;
                    element.render("layadmin-system-side-menu");
                });
            }
        });
    }

    function getHtml(data) {
        var ulHtml = '';
        for (var i = 0; i < data.length; i++) {
            ulHtml += '<li class="layui-nav-item">';
            if (data[i].children !== undefined && data[i].children !== null && data[i].children.length > 0) {
                ulHtml += '<a href="javascript:;">' + data[i].name;
                ulHtml += '<span class="layui-nav-more"></span>';
                ulHtml += '</a>';
                ulHtml += '<dl class="layui-nav-child">';
                //二级菜单
                for (var j = 0; j < data[i].children.length; j++) {
                    //是否有孙子节点
                    if (data[i].children[j].children !== undefined && data[i].children[j].children !== null && data[i].children[j].children.length > 0) {
                        ulHtml += '<dd>';
                        ulHtml += '<a href="javascript:;">' + data[i].children[j].name;
                        ulHtml += '<span class="layui-nav-more"></span>';
                        ulHtml += '</a>';
                        //三级菜单
                        ulHtml += '<dl class="layui-nav-child">';
                        var grandsonNodes = data[i].children[j].children;
                        for (var k = 0; k < grandsonNodes.length; k++) {
                            ulHtml += '<dd>';
                            ulHtml += '<a href="/admin/'+ grandsonNodes[k].title +'">' + grandsonNodes[k].name + '</a>';
                            ulHtml += '</dd>';
                        }
                        ulHtml += '</dl>';
                        ulHtml += '</dd>';
                    }else{
                        ulHtml += '<dd>';
                        ulHtml += '<a href="/admin/'+data[i].children[j].title+'">' + data[i].children[j].name;
                        ulHtml += '</a>';
                        ulHtml += '</dd>';
                    }
                }
                ulHtml += '</dl>';
            } else {
                var dataUrl = (data[i].title !== undefined && data[i].title !== '') ? 'data-url="' + data[i].title + '"' : '';
                ulHtml += '<a href="/admin/' + data[i].title + '"' + dataUrl + '>';
                ulHtml += '<cite>' + data[i].name + '</cite>';
                ulHtml += '</a>';
            }
            ulHtml += '</li>';
        }
        return ulHtml;
    }


</script>
<script>
    //查看未回复留言
    function run() {
        $.ajax({
            url: "<?php echo U('Message/messagenoanswer');?>",
            type: 'post',
            dataType: 'JSON',
            async : false,
            success:function(data){
                if(data.status==1){
                    $('#mes').text(data.info)
                }else{
                    clearInterval(time);
                    return;
                }
            }
        })
    };
    // run();
     var time = setInterval(run,3000);
</script>