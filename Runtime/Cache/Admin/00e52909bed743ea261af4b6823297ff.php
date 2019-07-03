<?php if (!defined('THINK_PATH')) exit();?>
    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div class="layadmin-tabsbody-item layui-show">
            <div class="layui-fluid">
                <div class="layui-row layui-col-space15">
                    <div class="layui-col-md8">
                        <div class="layui-row layui-col-space15">
                            <div class="layui-col-md6">
                                <div class="layui-card">
                                    <div class="layui-card-header">快捷方式</div>
                                    <div class="layui-card-body">

                                        <div class="layui-carousel layadmin-carousel layadmin-shortcut" lay-anim="" id="test2" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 280px;">
                                            <div carousel-item="">
                                                <ul class="layui-row layui-col-space10">
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="home/homepage1">
                                                            <i class="layui-icon layui-icon-console"></i>
                                                            <cite>主页一</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="home/homepage2">
                                                            <i class="layui-icon layui-icon-chart"></i>
                                                            <cite>主页二</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="component/layer/list">
                                                            <i class="layui-icon layui-icon-template-1"></i>
                                                            <cite>弹层</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="/senior/im/">
                                                            <i class="layui-icon layui-icon-chat"></i>
                                                            <cite>聊天</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="component/progress/index">
                                                            <i class="layui-icon layui-icon-find-fill"></i>
                                                            <cite>进度条</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="app/workorder/list">
                                                            <i class="layui-icon layui-icon-survey"></i>
                                                            <cite>工单</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="user/user/list">
                                                            <i class="layui-icon layui-icon-user"></i>
                                                            <cite>用户</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="set/system/website">
                                                            <i class="layui-icon layui-icon-set"></i>
                                                            <cite>设置</cite>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="layui-row layui-col-space10 layui-this">
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="set/user/info">
                                                            <i class="layui-icon layui-icon-set"></i>
                                                            <cite>我的资料</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="set/user/info">
                                                            <i class="layui-icon layui-icon-set"></i>
                                                            <cite>我的资料</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="set/user/info">
                                                            <i class="layui-icon layui-icon-set"></i>
                                                            <cite>我的资料</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="set/user/info">
                                                            <i class="layui-icon layui-icon-set"></i>
                                                            <cite>我的资料</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="set/user/info">
                                                            <i class="layui-icon layui-icon-set"></i>
                                                            <cite>我的资料</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="set/user/info">
                                                            <i class="layui-icon layui-icon-set"></i>
                                                            <cite>我的资料</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="set/user/info">
                                                            <i class="layui-icon layui-icon-set"></i>
                                                            <cite>我的资料</cite>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs3">
                                                        <a lay-href="set/user/info">
                                                            <i class="layui-icon layui-icon-set"></i>
                                                            <cite>我的资料</cite>
                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>
                                            <div class="layui-carousel-ind">
                                                <ul>
                                                    <li class=""></li>
                                                    <li class=""></li>
                                                </ul>
                                            </div>
                                            <button class="layui-icon layui-carousel-arrow" lay-type="sub"></button>
                                            <button class="layui-icon layui-carousel-arrow" lay-type="add"></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-md6">
                                <div class="layui-card">
                                    <div class="layui-card-header">待办事项</div>
                                    <div class="layui-card-body">

                                        <div class="layui-carousel layadmin-carousel layadmin-backlog" lay-anim="" id="test3" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 280px;">
                                            <div carousel-item="">
                                                <ul class="layui-row layui-col-space10 layui-this">
                                                    <li class="layui-col-xs6">
                                                        <a lay-href="app/content/comment" class="layadmin-backlog-body">
                                                            <h3>待审评论</h3>
                                                            <p><cite>66</cite></p>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs6">
                                                        <a lay-href="app/forum/list" class="layadmin-backlog-body">
                                                            <h3>待审帖子</h3>
                                                            <p><cite>12</cite></p>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs6">
                                                        <a lay-href="template/goodslist" class="layadmin-backlog-body">
                                                            <h3>待审商品</h3>
                                                            <p><cite>99</cite></p>
                                                        </a>
                                                    </li>
                                                    <li class="layui-col-xs6">
                                                        <a href="javascript:;" onclick="layer.tips('不跳转', this, {tips: 3});" class="layadmin-backlog-body">
                                                            <h3>待发货</h3>
                                                            <p><cite>20</cite></p>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="layui-row layui-col-space10">
                                                    <li class="layui-col-xs6">
                                                        <a href="javascript:;" class="layadmin-backlog-body">
                                                            <h3>待审友情链接</h3>
                                                            <p><cite style="color: #FF5722;">5</cite></p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="layui-carousel-ind"><ul><li class="layui-this"></li><li></li></ul></div><button class="layui-icon layui-carousel-arrow" lay-type="sub"></button><button class="layui-icon layui-carousel-arrow" lay-type="add"></button></div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-md12">
                                <div class="layui-card">
                                    <div class="layui-card-header">数据概览</div>
                                    <div class="layui-card-body">

                                        <div class="layui-carousel layadmin-carousel layadmin-dataview" id="myline" data-anim="fade" lay-filter="LAY-index-dataview" lay-anim="" lay-indicator="inside" lay-arrow="hover" style="width: 100%; height: 280px;">
                                            <div carousel-item="" id="LAY-index-dataview">
                                                <div class="layui-this" id="aaa" >
                                                    <script>
                                                        var myChart = echarts.init(document.getElementById('aaa'))
                                                        option = {

                                                            tooltip : {
                                                                trigger: 'item',
                                                                formatter: "{a} <br/>{b} : {c} ({d}%)"
                                                            },
                                                            legend: {
                                                                left: '25%',
                                                                textAlign: 'center',
                                                                data: ['Chrome','Firefox','IE 8.0','Safari','其他浏览器']
                                                            },
                                                            series : [
                                                                {
                                                                    name: '访问来源',
                                                                    type: 'pie',
                                                                    radius : '55%',
                                                                    center: ['50%', '60%'],
                                                                    data:[
                                                                        {value:335, name:'Chrome'},
                                                                        {value:310, name:'Firefox'},
                                                                        {value:234, name:'IE 8.0'},
                                                                        {value:135, name:'Safari'},
                                                                        {value:1548, name:'其他浏览器'}
                                                                    ],
                                                                    itemStyle: {
                                                                        emphasis: {
                                                                            shadowBlur: 10,
                                                                            shadowOffsetX: 0,
                                                                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                                                                        }
                                                                    }
                                                                }
                                                            ]
                                                        };
                                                        myChart.setOption(option);
                                                    </script>
                                                </div>
                                                <div class="layui-this" id="ccc" >
                                                    <script>
                                                        $(".flash-container").resize(function () {
                                                            myChart.resize();
                                                        });
                                                        var myChart = echarts.init(document.getElementById('ccc'));
                                                        option = {
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
                                                                data: ['00:00','2:00','4:00','6:00','8:00','10:00','12:00','14:00','16:00','18:00','20:00',"22:00"],
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
                                                                data: ['1200', '1400', '1008', '1411', '1026', '1288', '1300', '800', '1100', '1000', '1118', '1322'],
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
                                                                data: ['1200', '1400', '808', '811', '626', '488', '1600', '1100', '500', '300', '1998', '822'],
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
                                                        };
                                                        myChart.setOption(option);
                                                    </script>


                                                </div>
                                                <div class="layui-this"  id="bbb">
                                                    <script>
                                                        var myChart = echarts.init(document.getElementById('bbb'));
                                                        option = {
                                                            legend: {
                                                                data: ['最近一周新增用户量']
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
                                                            // toolbox: {
                                                            //     feature: {
                                                            //         saveAsImage: {}
                                                            //     }
                                                            // },
                                                            xAxis: {
                                                                type: 'category',
                                                                boundaryGap: false,
                                                                data: ['周一','周二','周三','周四','周五','周六','周日']
                                                            },
                                                            yAxis: {
                                                                type: 'value'
                                                            },
                                                            series: [
                                                                {
                                                                    name:'新增用户',
                                                                    type:'line',
                                                                    data:[120, 132, 101, 134, 90, 230, 210]
                                                                }
                                                            ]
                                                        };

                                                        myChart.setOption(option);
                                                    </script>
                                                </div>
                                            </div>


                                            <div class="layui-carousel-ind"><ul><li class=""></li><li class="layui-this"></li><li class=""></li></ul></div><button class="layui-icon layui-carousel-arrow" lay-type="sub"></button><button class="layui-icon layui-carousel-arrow" lay-type="add"></button></div>


                                    </div>
                                </div>
                                <div class="layui-card">
                                    <div class="layui-tab layui-tab-brief layadmin-latestData">
                                        <ul class="layui-tab-title">
                                            <li class="layui-this">今日热搜</li>
                                        </ul>
                                        <div class="layui-tab-content">
                                            <table class="layui-hide" id="test"></table>
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
                                            </script> v1.2.1 pro <a href="http://fly.layui.com/docs/3/" target="_blank" style="padding-left: 15px;">更新日志</a>
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

                        <div class="layui-card">
                            <div class="layui-card-header">效果报告</div>
                            <div class="layui-card-body layadmin-takerates">
                                <div class="layui-progress" lay-showpercent="yes">
                                    <h3>转化率（日同比 28% <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
                                    <div class="layui-progress-bar" lay-percent="65%" style="width: 65%;"><span class="layui-progress-text">65%</span></div>
                                </div>
                                <div class="layui-progress" lay-showpercent="yes">
                                    <h3>签到率（日同比 11% <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
                                    <div class="layui-progress-bar" lay-percent="32%" style="width: 32%;"><span class="layui-progress-text">32%</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="layui-card">
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
                        </div>

                        <div class="layui-card">
                            <div class="layui-card-header">产品流量</div>
                            <div class="layui-card-body">
                                <div class="layui-carousel layadmin-carousel layadmin-news" id="mychart" data-autoplay="true" data-anim="fade" lay-filter="news" lay-anim="fade" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 280px;">
                                    <script>
                                        var myChart = echarts.init(document.getElementById('mychart'));

                                        option = {
                                            title: {
                                                text: '80%',
                                                x: 'center',
                                                y: 'center',
                                                textStyle: {
                                                    fontWeight: 'normal',
                                                    color: '#0580f2'
                                                }
                                            },
                                            color: ['rgba(176, 212, 251, 1)'],
                                            legend: {
                                                show: true,
                                                itemGap: 12,
                                                data: ['浏览量', '跳出率']
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
                                                data: [{
                                                    value: 80,
                                                    name: '浏览量',
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
                                                }, {
                                                    name: '跳出率',
                                                    value: 20
                                                }]
                                            }]
                                        }
                                        myChart.setOption(option);

                                    </script>

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
                                <p>2019/5</p>
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
                elem: '#test'
                ,url:'/demo/table/user/'
                ,cols: [[
                    {field:'sign', title: '关键词', minWidth: 150}
                    ,{field:'sign', title: '搜素次数', minWidth: 150, sort: true}
                    ,{field:'sign', title: '用户数', minWidth: 150, sort: true}

                ]]
                ,page: true
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