<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>标题</title>
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
    
    <!-- 页面标签 -->
    <script type="text/html" template="" lay-done="layui.element.render('nav', 'layadmin-pagetabs-nav')">
        {{# if(layui.setter.pageTabs){ }}
        <div class="layadmin-pagetabs" id="LAY_app_tabs">
            <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-down">
                <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
                    <li class="layui-nav-item" lay-unselect>
                        <a href="javascript:;"></a>
                        <dl class="layui-nav-child layui-anim-fadein">
                            <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                            <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                            <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
            <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
                <ul class="layui-tab-title" id="LAY_app_tabsheader">
                    <li lay-id="/"><i class="layui-icon layui-icon-home"></i></li>
                </ul>
            </div>
        </div>
        {{# } }}
    </script>

<div id="defined_type"> </div>
    <!-- 主体内容 -->
    <div class="layui-body" id="LAY_app_body">
        <div class="layadmin-tabsbody-item layui-show"><div class="layui-card layadmin-header">
            <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
                <a lay-href="">应用</a><span lay-separator="">/</span>
                <a><cite>营销系统</cite></a><span lay-separator="">/</span>
                <a><cite>客服列表</cite></a>
            </div>
        </div><div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <button class="layui-btn">客服列表</button>
                            <button class="layui-btn layui-btn-primary">在线客服</button>
                        </div>
                    </div>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <blockquote class="layui-elem-quote layui-text">
                            添加的QQ需要到<a href="https://shang.qq.com/" target="_blank">shang.qq.com</a>登录后在【商家沟通组建—设置】开启QQ的在线状态，否则将显示“未启用”
                        </blockquote>
                        <table class="layui-hide" id="service_info" lay-filter="service_info"></table>
                    </div>
                    <div class="layui-tab-item layui-form" lay-filter="service_type">
                        <blockquote class="layui-elem-quote layui-text">
                            功能设置
                        </blockquote>
                        <div class="layui-card-body" pad15="">
                            <div class="layui-form" >
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">在线交流方式</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="type" value="fixedleft" <?php echo ($service['type']=='fixedleft'?'checked':''); ?> title="固定于页面左边"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>固定于页面左边</div></div>
                                        <input type="radio" name="type" value="fixedright" title="固定于页面右边" <?php echo ($service['type']=='fixedright'?'checked':''); ?>><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>固定于页面右边</div></div>
                                        <input type="radio" name="type" value="scrollleft" title="居左随屏幕滚动" <?php echo ($service['type']=='scrollleft'?'checked':''); ?>><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>居左随屏幕滚动</div></div>
                                        <input type="radio" name="type" value="scrollright" title="居右随屏幕滚动" <?php echo ($service['type']=='scrollright'?'checked':''); ?>><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>居右随屏幕滚动</div></div>
                                        <input type="radio" name="type" value="colse" title="关闭" <?php echo ($service['type']=='colse'?'checked':''); ?>><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>关闭</div></div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <blockquote class="layui-elem-quote layui-text">
                            样式设置
                        </blockquote>
                        <div class="layui-card-body" pad15="">
                            <div class="layui-form" lay-filter="service_type">
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet">漂浮风格</label>
                                        <div class="layui-input-inline">
                                            <select name="float">
                                                <option value="" >请选择标签</option>
                                                <option value="0" <?php echo ($service['float']=='0'?'selected':''); ?>>风格1</option>
                                                <option value="1" <?php echo ($service['float']=='1'?'selected':''); ?>>风格2</option>
                                                <option value="2" <?php echo ($service['float']=='2'?'selected':''); ?>>风格3</option>
                                            </select>
                                            <div class="layui-unselect layui-form-select">
                                                <div class="layui-select-title">
                                                    <input type="text" placeholder="请选择标签" value="" readonly="" class="layui-input layui-unselect">
                                                    <i class="layui-edge"></i>
                                                </div>
                                                <dl class="layui-anim layui-anim-upbit">
                                                    <dd lay-value="" class="layui-select-tips">请选择标签</dd>
                                                    <dd lay-value="0" class="">风格1</dd>
                                                    <dd lay-value="1" class="">风格2</dd>
                                                    <dd lay-value="2" class="">风格3</dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <div class="layui-input-inline">
                                            <select name="color">
                                                <option value="">请选择标签</option>
                                                <option value="0" <?php echo ($service['color']=='0'?'selected':''); ?>>浅蓝</option>
                                                <option value="1" <?php echo ($service['color']=='1'?'selected':''); ?>>紫红</option>
                                                <option value="2" <?php echo ($service['color']=='2'?'selected':''); ?>>绿色</option>
                                                <option value="3" <?php echo ($service['color']=='3'?'selected':''); ?>>灰色</option>
                                            </select>
                                            <div class="layui-unselect layui-form-select">
                                                <div class="layui-select-title">
                                                    <input type="text" placeholder="请选择标签" value="" readonly="" class="layui-input layui-unselect">
                                                    <i class="layui-edge"></i>
                                                </div>
                                                <dl class="layui-anim layui-anim-upbit">
                                                    <dd lay-value="" class="layui-select-tips">请选择标签</dd>
                                                    <dd lay-value="0" class="">浅蓝</dd>
                                                    <dd lay-value="1" class="">紫红</dd></dl>
                                                <dd lay-value="2" class="">绿色</dd>
                                                <dd lay-value="3" class="">灰色</dd></dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet">QQ图标</label>
                                        <div class="layui-input-inlineImg">
                                            <img src="<?php echo ($service['qq']); ?>" alt="" name="qq">
                                        </div>
                                        <div class="layui-form-midText" id="change">更改图标</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet">MSN图标</label>
                                        <div class="layui-input-inlineImg">
                                            <img src="<?php echo ($service['msn']); ?>" alt="" name="msn">
                                        </div>
                                        <div class="layui-form-midText" id="changeMsn">更改图标</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet">淘宝旺旺</label>
                                        <div class="layui-input-inlineImg">
                                            <img src="<?php echo ($service['taobao']); ?>" alt="" name="taobao">
                                        </div>
                                        <div class="layui-form-midText" id="changeTao">更改图标</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet">SKYPE图标</label>
                                        <div class="layui-input-inlineImg">
                                            <img src="<?php echo ($service['skype']); ?>" alt="" name="skype">
                                        </div>
                                        <div class="layui-form-midText " id="changeSkype">更改图标</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet">阿里旺旺图标</label>
                                        <div class="layui-input-inlineImg">
                                            <img src="<?php echo ($service['alibaba']); ?>" alt="" name="alibaba">
                                        </div>
                                        <div class="layui-form-midText " id="changeAli">更改图标</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <blockquote class="layui-elem-quote layui-text">
                            其他设置
                        </blockquote>
                        <div class="layui-card-body" pad15="">

                            <div class="layui-form" lay-filter="service_type">
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">关闭客服名称</label>
                                    <div class="layui-input-block">
                                        <input type="checkbox" <?php echo ($service['servicename_status']=='on'?'checked':''); ?>  name="servicename_status" title="关闭" lay-filter="status_switch">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="layui-row layui-col-space10 word">
                            <div class="layui-col-md2 layui-text-l">
                                网站底部优化字
                            </div>
                            <div class="layui-col-md10">
                                <textarea id="foot_optimize" style="display: none;" name="optimize" class="layui-hide"><?php echo ($service['optimize']); ?></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item Ontheborder">

                            <div class="layui-input-inline ">
                                <button class="layui-btn" lay-filter="service_type" lay-submit="service_type"> 保存</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <script>
        layui.use('layedit', function(){
            var layedit = layui.layedit;
            layedit.build('demo'); //建立编辑器
        });
        $('.layui-inline>button').click(function () {
            $(this).removeClass('layui-btn-primary').siblings().addClass('layui-btn-primary');
            var _index = $(this).index();
            $('.layui-tab-item').eq(_index).addClass('layui-show').siblings().removeClass('layui-show');
        })

        layui.use('table', function(){
            var table = layui.table;
            var renderTable = function () {
                table.render({
                    elem: '#service_info'
                    , url: "<?php echo U('marketing/customer');?>"
                    , cellMinWidth: 80
                    , toolbar: '#toolbarDemo'
                    , cols: [[
                        {type: 'checkbox'}
                        , {field: 'sort', title: '排序', sort: true, edit: 'text'} //width 支持：数字、百分比和不填写。你还可以通过 minWidth 参数局部定义当前单元格的最小宽度，layui 2.2.1 新增
                        , {field: 'name', title: '客服名称', edit: 'text'}
                        , {field: 'qq', title: 'QQ', align: 'center', edit: 'text'}
                        , {field: 'msn', title: 'MSN', align: 'center', edit: 'text'}
                        , {field: 'taow', title: '淘宝旺旺', align: 'center', edit: 'text'}
                        , {field: 'aliw', title: '阿里旺旺', align: 'center', edit: 'text'}
                        , {field: 'skype', title: 'SKYPE', align: 'center', edit: 'text'}
                        , {field: 'city', title: '操作', align: 'center', toolbar: '#barDemo', width: 170}
                    ]]
                    , page: {
                        layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
                        , limit: 5 //一页显示多少条
                        , limits: [5, 10, 15, 20, 25]//每页条数的选择项
                        , groups: 5 //只显示 5 个连续页码
                        , first: "首页" //不显示首页
                        , last: "尾页" //不显示尾页
                    }
                });
            };
            renderTable();
            //头工具栏事件
            table.on('toolbar(service_info)', function (obj) {
                var checkStatus = table.checkStatus(obj.config.id);
                if (obj.event == 'service_add') {
                    layer.open({
                        type: 2,
                        title: '添加客服',
                        content: "<?php echo U('marketing/serviceadd');?>",
                        area: ['80%', '95%'],
                        end: function () {
                            //更新数据
                            table.reload('service_info', {
                                where: {
                                },
                                page: {
                                    curr: 1
                                }
                            });
                        }
                    })
                }
                if (obj.event == 'service_del') {
                    var arr = [];
                    var data = checkStatus.data;
                    for (var i = 0; i < data.length; i++) {    //循环筛选出id
                        arr.push(data[i].id);
                        layer.alert(data[i].id)
                    }
                    if (arr.length != 0) {
                        layer.confirm('真的删除吗，此操作不能撤销！', function (index) {
                            //向服务端发送删除指令
                            layui.$.post(
                                "<?php echo U('marketing/servicedel');?>",
                                { arr: arr },
                                function (data, status) {
                                    if (data.status==1) {
                                        layer.msg(data.info,{titme:1000},function(){
                                            renderTable();
                                            layer.closeAll();
                                        });
                                    }
                                    else {
                                        layer.msg(data.info);
                                    }
                                }
                            )
                        });
                    }
                    else {
                        layer.msg("请先选中!")
                    }
                }
            });
            //监听工具条
            table.on('tool(service_info)', function (obj) {
                var data = obj.data;
                var layEvent = obj.event;
                var tr = obj.tr;
                var arr=new Array(data.id);
                if (layEvent == 'save') {
                        layui.$.post(
                            "<?php echo U('marketing/serviceupdate');?>",
                            {
                                id: data.id,
                                qq: data.qq,
                                name: data.name,
                                sort: data.sort,
                                msn: data.msn,
                                taow: data.taow,
                                skype: data.skype,
                                aliw: data.aliw
                            },
                            function (data) {
                                if (data.status==1) {
                                    layer.msg(data.info,{titme:1000},function(){
                                        renderTable();
                                        layer.closeAll();
                                    });
                                }
                                else {
                                    layer.msg(data.info);
                                }
                            }
                        )
                    }
                if (layEvent == 'del') {
                    layer.confirm('真的删除吗，此操作不能撤销！', function (index) {
                        //向服务端发送删除指令
                        layui.$.post(
                            "<?php echo U('marketing/servicedel');?>",
                            { arr: arr },
                            function (data) {
                                if (data.status) {
                                    layer.msg(data.info,{time:1500},function(){
                                        renderTable();
                                        obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                        layer.closeAll();
                                    });
                                }
                                else {
                                    layer.msg(data.info);
                                }
                            }
                        )
                    });
                }
                if (layEvent === 'stop') {
                    layui.$.post(
                        "<?php echo U('marketing/servicestatus');?>",
                        {
                            id: data.id,
                            off: data.lock
                        },
                        function (data) {
                            if (data.status==1) {
                                layer.msg(data.info,{time:1500},function(){
                                    //更新数据
                                    renderTable();
                                    layer.closeAll();
                                });

                            }
                            else {
                                layer.msg(data.info);
                            }
                        }
                    )
                }
            });


        });

    </script>

    <script>
        layui.use('layer',function () {
            var layer = layui.layer;

            $('#change').on('click',function () {
                layer.open({
                    type: 1
                    ,title: false //不显示标题栏
                    ,closeBtn: false
                    ,area:"50%"
                    ,content: $('#online_box_qq')
                    ,btn: ['立即更改', '取消']
                    ,btnAlign: 'l'
                    ,skin:'my-skin'
                    ,yes:function(index){
                       var qq= $('#online_box_qq input:radio[name="qq"]:checked').val();
                        $("#change").prev().children('img').attr("src",qq);
                        layer.close(index);
                    }
                })
            });
            $('#changeMsn').on('click',function () {
                layer.open({
                    type: 1
                    ,title: false //不显示标题栏
                    ,closeBtn: false
                    ,area:"50%"
                    ,content: $('#online_box_msn')
                    ,btn: ['立即更改', '取消']
                    ,btnAlign: 'l'
                    ,skin:'my-skin'
                    ,yes:function(index){
                        var msn= $('#online_box_msn input:radio[name="msn"]:checked').val();
                        $("#changeMsn").prev().children('img').attr("src",msn);
                        layer.close(index);
                    }
                })
            })
            $('#changeTao').on('click',function () {
                layer.open({
                    type: 1
                    ,title: false //不显示标题栏
                    ,closeBtn: false
                    ,area:"50%"
                    ,content: $('#online_box_taobao')
                    ,btn: ['立即更改', '取消']
                    ,btnAlign: 'l'
                    ,skin:'my-skin'
                    ,yes:function(index){
                        var taobao= $('#online_box_taobao input:radio[name="taobao"]:checked').val();
                        $("#changeTao").prev().children('img').attr("src",taobao);
                        layer.close(index);
                    }
                })
            })
            $('#changeSkype').on('click',function () {
                layer.open({
                    type: 1
                    ,title: false //不显示标题栏
                    ,closeBtn: false
                    ,area:"50%"
                    ,content: $('#online_box_skype')
                    ,btn: ['立即更改', '取消']
                    ,btnAlign: 'l'
                    ,skin:'my-skin'
                    ,yes:function(index){
                        var skype= $('#online_box_skype input:radio[name="skype"]:checked').val();
                        $("#changeSkype").prev().children('img').attr("src",skype);
                        layer.close(index);
                    }
                })
            })
            $('#changeAli').on('click',function () {
                layer.open({
                    type: 1
                    ,title: false //不显示标题栏
                    ,closeBtn: false
                    ,area:"50%"
                    ,content: $('#online_box_alibaba')
                    ,btn: ['立即更改', '取消']
                    ,btnAlign: 'l'
                    ,skin:'my-skin'
                    ,yes:function(index){
                        var alibaba= $('#online_box_alibaba input:radio[name="alibaba"]:checked').val();
                        $("#changeAli").prev().children('img').attr("src",alibaba);
                        layer.close(index);
                    }
                })
            })

        });
    </script>
    <div class="layui-card layui-form"  id="online_box_qq" style="display: none">
        <div class="layui-tab-content">
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_4.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_4.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_45.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_45.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_5.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_5.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_8.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_8.jpg" alt=""></div>
                </div>
            </div>
            <!--</div>-->
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_9.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_9.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_10.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_10.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_44.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_44.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_46.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_46.jpg" alt=""></div>
                </div>
                <!--</div>-->
            </div>
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_1.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_1.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_6.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_6.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_7.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_7.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_47.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_47.jpg" alt=""></div>
                </div>
                <!--</div>-->
            </div>
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_41.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_41.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_42.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_42.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_2.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_2.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_3.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_3.jpg" alt=""></div>
                </div>
                <!--</div>-->
            </div>
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_11.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_11.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_12.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_12.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_43.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_43.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="qq" value="/Public/admin/img/qq/qq_13.jpg"><div class="pop-up"><img src="/Public/admin/img/qq/qq_13.jpg" alt=""></div>
                </div>
            </div>
            <!--</div>-->

        </div>
    </div>
    <div class="layui-card layui-form" id="online_box_msn" style="display: none">
        <div class="layui-tab-content">
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="msn" value="/Public/admin/img/MsN/msn_1.gif"><div class="pop-up"><img src="/Public/admin/img/MsN/msn_1.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="msn" value="/Public/admin/img/MsN/msn_2.gif"><div class="pop-up"><img src="/Public/admin/img/MsN/msn_2.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="msn" value="/Public/admin/img/MsN/msn_3.gif"><div class="pop-up"><img src="/Public/admin/img/MsN/msn_3.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="msn" value="/Public/admin/img/MsN/msn_4.gif"><div class="pop-up"><img src="/Public/admin/img/MsN/msn_4.gif" alt=""></div>
                </div>
            </div>
            <!--</div>-->
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="msn" value="/Public/admin/img/MsN/msn_5.gif"><div class="pop-up"><img src="/Public/admin/img/MsN/msn_5.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="msn" value="/Public/admin/img/MsN/msn_6.gif"><div class="pop-up"><img src="/Public/admin/img/MsN/msn_6.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="msn" value="/Public/admin/img/MsN/msn_7.gif"><div class="pop-up"><img src="/Public/admin/img/MsN/msn_7.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="msn" value="/Public/admin/img/MsN/msn_8.gif"><div class="pop-up"><img src="/Public/admin/img/MsN/msn_8.gif" alt=""></div>
                </div>
                <!--</div>-->
            </div>
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="msn" value="/Public/admin/img/MsN/msn_9.gif"><div class="pop-up"><img src="/Public/admin/img/MsN/msn_9.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="msn" value="/Public/admin/img/MsN/msn_10.gif"><div class="pop-up"><img src="/Public/admin/img/MsN/msn_10.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="msn" value="/Public/admin/img/MsN/msn_11.gif"><div class="pop-up"><img src="/Public/admin/img/MsN/msn_11.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="msn" value="/Public/admin/img/MsN/msn_12.gif"><div class="pop-up"><img src="/Public/admin/img/MsN/msn_12.gif" alt=""></div>
                </div>
                <!--</div>-->
            </div>
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="msn" value="/Public/admin/img/MsN/msn_13.gif"><div class="pop-up"><img src="/Public/admin/img/MsN/msn_13.gif" alt=""></div>
                </div>
            </div>

        </div>

    </div>
    <div class="layui-card layui-form" id="online_box_taobao" style="display: none">
        <div class="layui-tab-content">
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="taobao" value="/Public/admin/img/taobao/taobao_1.jpg"><div class="pop-up"><img src="/Public/admin/img/taobao/taobao_1.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="taobao" value="/Public/admin/img/taobao/taobao_1.jpg"><div class="pop-up"><img src="/Public/admin/img/taobao/taobao_1.jpg" alt=""></div>
                </div>

            </div>


        </div>

    </div>
    <div class="layui-card layui-form" id="online_box_skype" style="display: none">
        <div class="layui-tab-content">
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="skype" value="/Public/admin/img/skupe/skype_1.gif"><div class="pop-up"><img src="/Public/admin/img/skupe/skype_1.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="skype" value="/Public/admin/img/skupe/skype_2.gif"><div class="pop-up"><img src="/Public/admin/img/skupe/skype_2.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="skype" value="/Public/admin/img/skupe/skype_3.gif"><div class="pop-up"><img src="/Public/admin/img/skupe/skype_3.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="skype" value="/Public/admin/img/skupe/skype_4.gif"><div class="pop-up"><img src="/Public/admin/img/skupe/skype_4.gif" alt=""></div>
                </div>
            </div>
            <!--</div>-->
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="skype" value="/Public/admin/img/skupe/skype_5.gif"><div class="pop-up"><img src="/Public/admin/img/skupe/skype_5.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="skype" value="/Public/admin/img/skupe/skype_6.gif"><div class="pop-up"><img src="/Public/admin/img/skupe/skype_6.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="skype" value="/Public/admin/img/skupe/skype_7.gif"><div class="pop-up"><img src="/Public/admin/img/skupe/skype_7.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="skype" value="/Public/admin/img/skupe/skype_8.gif"><div class="pop-up"><img src="/Public/admin/img/skupe/skype_8.gif" alt=""></div>
                </div>
                <!--</div>-->
            </div>
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="skype" value="/Public/admin/img/skupe/skype_9.gif"><div class="pop-up"><img src="/Public/admin/img/skupe/skype_9.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="skype" value="/Public/admin/img/skupe/skype_10.gif"><div class="pop-up"><img src="/Public/admin/img/skupe/skype_10.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="skype" value="/Public/admin/img/skupe/skype_11.gif"><div class="pop-up"><img src="/Public/admin/img/skupe/skype_11.gif" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="skype" value="/Public/admin/img/skupe/skype_12.gif"><div class="pop-up"><img src="/Public/admin/img/skupe/skype_12.gif" alt=""></div>
                </div>
                <!--</div>-->
            </div>
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="skype" value="/Public/admin/img/skupe/skype_13.gif"><div class="pop-up"><img src="/Public/admin/img/skupe/skype_13.gif" alt=""></div>
                </div>
            </div>

        </div>

    </div>
    <div class="layui-card layui-form" id="online_box_alibaba" style="display: none">
        <div class="layui-tab-content">
            <div class="layui-form-item layui-form-itemleft">
                <!--<div class="layui-input-blockPop">-->
                <div class="layui-input-inlinePop">
                    <input type="radio" name="alibaba" value="/Public/admin/img/ali/alibaba_10.jpg"><div class="pop-up"><img src="/Public/admin/img/ali/alibaba_10.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="alibaba" value="/Public/admin/img/ali/alibaba_11.jpg"><div class="pop-up"><img src="/Public/admin/img/ali/alibaba_11.jpg" alt=""></div>
                </div>
                <div class="layui-input-inlinePop">
                    <input type="radio" name="alibaba" value="/Public/admin/img/ali/alibaba_12.jpg"><div class="pop-up"><img src="/Public/admin/img/ali/alibaba_12.jpg" alt=""></div>
                </div>

            </div>


        </div>

    </div>
    <script type="text/html" id="barDemo">
        {{#  if(d.lock == 0){ }}
        <a class="layui-btn layui-btn-xs" lay-event="save">保存</a>
        <a class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">禁用</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } else { }}
        <a class="layui-btn layui-btn-xs" lay-event="save">保存</a>
        <a class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">显示</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } }}
    </script>
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <button class="layui-btn layuiadmin-btn-list" lay-event="service_del" data-type="service_del">删除</button>
            <button data-method="notice" id="service_add" lay-event="service_add" class="layui-btn">添加</button>
        </div>
    </script>

    <script>
        layui.use(['form','layedit'], function () {
            var form = layui.form
                ,layer = layui.layer
                ,layedit = layui.layedit;
            var layedit_from = layedit.build('foot_optimize'
                ,{tool: ['html','code','face', 'link', 'unlink', '|', 'left', 'center', 'right']}
                ); //建立编辑器
            form.on('submit(service_type)', function (data) {
                //表单数据formData
                var formData = data.field;
                $(".layui-input-inlineImg").children('img').each(function(){
                    formData[$(this).attr("name")]=$(this).attr("src");
                });
                formData.optimize = layedit.getContent(layedit_from);
                $.ajax({
                    url: "<?php echo U('marketing/servictype');?>",
                    data: formData,
                    type: 'post',
                    success: function (data) {
                        if (data.status==1) {
                            layer.msg(data.info,{time:1500},function () {
                                window.parent.location.reload();//刷新父页面
                                layer.closeAll();
                            });
                        }
                        else {
                            layer.msg(data.info)
                        }
                    }
                },'json');
                //阻止表单跳转
                return false;
            });
        });
    </script>
    <!--<?php echo ($service['typejs']); ?>;-->

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