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


    <!-- 主体内容 -->
    <div class="layui-body" id="LAY_app_body">
        <div class="layadmin-tabsbody-item layui-show"><div class="layui-card layadmin-header">
            <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
                <a lay-href="">应用</a><span lay-separator="">/</span>
                <a><cite>营销系统</cite></a><span lay-separator="">/</span>
                <a><cite>访问统计</cite></a>
            </div>
        </div>
            <div class="layui-fluid">
                <div class="layui-card">

                    <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">

                        <div class="layui-form-item">

                            <div class="layui-inline">
                                <button class="layui-btn">统计概况</button>
                            </div>
                            <div class="layui-inline">
                                <button class="layui-btn layui-btn-primary op">搜索引擎</button>
                            </div>
                            <div class="layui-inline">
                                <button class="layui-btn layui-btn-primary op">受访分析</button>
                            </div>
                            <div class="layui-inline">
                                <button class="layui-btn layui-btn-primary op">来路分析</button>
                            </div>
                            <div class="layui-inline">
                                <button class="layui-btn layui-btn-primary op">访问分析</button>
                            </div>
                            <div class="layui-inline">
                                <button class="layui-btn layui-btn-primary op"  id="total_site">统计设置</button>
                            </div>
                        </div>
                    </div>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show">
                            <blockquote class="layui-elem-quote layui-text">
                                访问量概况
                            </blockquote>
                            <table class="layui-hide" id="tally_total" lay-filter="tally_total"></table>
                        </div>
                        <div class="layui-tab-item">
                            <blockquote class="layui-elem-quote layui-text">
                                <button class="layui-btn-search analysisButtonColor" id="searchview">关键词</button>
                                <button class="layui-btn-search" id="searchdns">搜索引擎</button>
                            </blockquote>
                            <table class="layui-hide" id="search"></table>
                        </div>
                        <div class="layui-tab-item ">
                            <blockquote class="layui-elem-quote layui-text">
                                <button class="layui-btn-search analysisButtonColor" id="pageview" >受访页面</button>
                                <button class="layui-btn-search" id="pagedns">受访域名</button>
                            </blockquote>
                            <table class="layui-hide" id="page"></table>
                        </div>
                        <div class="layui-tab-item">
                            <blockquote class="layui-elem-quote layui-text">
                                <button class="layui-btn-search analysisButtonColor" id="referrerview">来路页面</button>
                                <button class="layui-btn-search" id="referrerdns">来路域名</button>
                            </blockquote>
                            <table class="layui-hide" id="referrer"></table>
                        </div>
                        <div class="layui-tab-item ">
                            <blockquote class="layui-elem-quote layui-text">
                                访问分析
                            </blockquote>
                            <table class="layui-hide" id="call"></table>
                        </div>
                        <div class="layui-tab-item layui-form" lay-filter="total_save">
                            <blockquote class="layui-elem-quote layui-text">
                                功能设置
                            </blockquote>
                            <div class="layui-card-body" pad15="">
                                <div class="layui-form" lay-filter="">
                                    <div class="layui-form-item">
                                        <label class="layui-form-labelSet">访问统计功能</label>
                                        <div class="layui-input-block">
                                            <input type="radio" name="switch" value="on" title="开启"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>开启</div></div>
                                            <input type="radio" name="switch" value="off" title="关闭"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>关闭</div></div>
                                            <div class=" layui-form-radio layui-word-aux cur"><div>关闭后不再记录来访信息</div></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <blockquote class="layui-elem-quote layui-text">
                                清空方式（统计数据会占用数据库大小）
                            </blockquote>
                            <div class="layui-card-body" pad15="">
                                <div class="layui-form">
                                    <div class="layui-form-item">
                                        <div class="layui-inlineSet">
                                            <label class="layui-form-labelSet">统计概况</label>
                                            <div class="layui-input-inline">
                                                <select name="total_time">
                                                    <option value="">请选择标签</option>
                                                    <option value="0">从不清空</option>
                                                    <option value="1">仅保留当天</option>
                                                    <option value="3">保留近七天</option>
                                                    <option value="4">保留近一年</option>
                                                </select>
                                                <div class="layui-unselect layui-form-select">
                                                    <div class="layui-select-title">
                                                        <input class="layui-input layui-unselect" placeholder="请选择标签" readonly="" type="text" value="">
                                                        <i class="layui-edge"></i>
                                                    </div>
                                                    <dl class="layui-anim layui-anim-upbit">
                                                        <dd class="layui-select-tips" lay-value="">请选择标签</dd>
                                                        <dd class="" lay-value="0">从不清空</dd>
                                                        <dd class="" lay-value="1">仅保留当天</dd>
                                                        <dd class="" lay-value="3">保留近七天</dd>
                                                        <dd class="" lay-value="4">保留近一年</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <blockquote class="layui-elem-quote layui-text">
                                一键清空
                            </blockquote>
                            <div class="layui-card-body" pad15="">
                                <div class="layui-form">
                                    <div class="layui-form-item">
                                        <div class="layui-inlineSet empty">
                                            <label class="layui-form-labelSet">清空统计数据</label>
                                            <a <?php echo authcheck('totaldel');?> href="javascript:void(0);" id="delete_data">清空所有数据</a>
                                            <div class="layui-form-mid layui-word-aux">清空今日以前的所有数据</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <blockquote class="layui-elem-quote layui-text">
                                安全设置
                            </blockquote>
                            <div class="layui-card-body" pad15="">
                                <div class="layui-form">
                                    <div class="layui-form-item">
                                        <div class="layui-inlineSet">
                                            <label class="layui-form-labelSet">每日访问最大值</label>
                                            <div class="layui-input-inline">
                                                <input type="text" name="total_maxpv" placeholder="请输入" autocomplete="off" class="layui-input">
                                            </div>
                                            <div class="layui-form-mid layui-word-aux">PV为防止恶意攻击，超出后不再记录来访信息</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="layui-form-item Ontheborder">

                                <div class="layui-input-inline ">
                                    <button class="layui-btn" lay-filter="total_save" lay-submit="total_save"> 保存</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- 辅助元素，一般用于移动设备下遮罩 -->
        <div class="layadmin-body-shade" layadmin-event="shade"></div>

    </div>

    <script>

        //统计概况
        layui.use('table', function(){
            var table = layui.table;
          table.render({
                elem: '#tally_total'
                ,url:"<?php echo U('marketing/marketinfo');?>"
                ,cellMinWidth: 80
                ,cols: [[
                    {field:'date', title: '', align: 'center'}
                    ,{field:'pv', title: 'PV' , align: 'center'}
                    ,{field:'uv', title: '独立访客' , align: 'center'}
                    ,{field:'ip', title: 'IP' , align: 'center'}
                    ,{field:'avg', title: '人均浏览数' , align: 'center'}
                ]]
            });
        });

        layui.use('table', function(){
            var table = layui.table;
            table.render({
                elem: '#search'
                ,url:"<?php echo U('marketing/switchinfo');?>"
                ,cellMinWidth: 80
                ,cols: [[
                    {title: '',type:'numbers'}
                    ,{field:'referer', title: '数据名'}
                    ,{field:'pv', title: 'PV'}
                    ,{field:'uv', title: '独立访客'}
                    ,{field:'ip', title: 'IP'}
                    ,{field:'avg', title: '人均浏览数'}
                ]]
                ,page: {
                    layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
                    ,limit:5 //一页显示多少条
                    ,limits:[5,10,15,20,25]//每页条数的选择项
                    ,groups: 5 //只显示 5 个连续页码
                    ,first: "首页" //不显示首页
                    ,last: "尾页" //不显示尾页
                }

            });
            $("#searchview").click(function () {
                table.reload('search', {
                    where: {
                        type:0
                    },
                    page: {
                        curr: 1
                    }
                });
            });

            $("#searchdns").click(function () {
                table.reload('search', {
                    where: {
                        type:1
                    },
                    page: {
                        curr: 1
                    }
                });
            })
        });
        layui.use('table', function(){
            var table = layui.table;
            table.render({
                elem: '#page'
                ,url:"<?php echo U('marketing/pageinfo');?>"
                ,cellMinWidth: 80
                ,defaultToolbar:false
                ,cols: [[
                    {title: '',type:'numbers'}
                    ,{field:'referer', title: '数据名'}
                    ,{field:'pv', title: 'PV'}
                    ,{field:'uv', title: '独立访客'}
                    ,{field:'ip', title: 'IP'}
                    ,{field:'avg', title: '人均浏览数'}
                ]]
                ,page: {
                    layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
                    ,limit:5 //一页显示多少条
                    ,limits:[5,10,15,20,25]//每页条数的选择项
                    ,groups: 5 //只显示 5 个连续页码
                    ,first: "首页" //不显示首页
                    ,last: "尾页" //不显示尾页
                }
            });
            $("#pageview").click(function () {
                table.reload('page', {
                    where: {
                        type:0
                    },
                    page: {
                        curr: 1
                    }
                });
            });

            $("#pagedns").click(function () {
                table.reload('page', {
                    where: {
                        type:1
                    },
                    page: {
                        curr: 1
                    }
                });
            })

        });
        layui.use('table', function(){
            var table = layui.table;
            table.render({
                elem: '#referrer'
                ,url:"<?php echo U('marketing/referrerinfo');?>"
                ,cellMinWidth: 80
                ,cols: [[
                    {title: '',type:'numbers'}
                    ,{field:'referer', title: '数据名'}
                    ,{field:'pv', title: 'PV' , align: 'center'}
                    ,{field:'uv', title: '独立访客' , align: 'center'}
                    ,{field:'ip', title: 'IP' , align: 'center'}
                    ,{field:'avg', title: '人均浏览数' , align: 'center'}
                ]]
                ,page: {
                    layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
                    ,limit:5 //一页显示多少条
                    ,limits:[5,10,15,20,25]//每页条数的选择项
                    ,groups: 5 //只显示 5 个连续页码
                    ,first: "首页" //不显示首页
                    ,last: "尾页" //不显示尾页
                }
            });
            $("#referrerview").click(function () {
                table.reload('referrer', {
                    where: {
                        type:0
                    },
                    page: {
                        curr: 1
                    }
                });
            });

            $("#referrerdns").click(function () {
                table.reload('referrer', {
                    where: {
                        type:1
                    },
                    page: {
                        curr: 1
                    }
                });
            })
        });
        layui.use('table', function(){
            var table = layui.table;

            table.render({
                elem: '#call'
                ,url:"<?php echo U('marketing/callinfo');?>"
                ,cellMinWidth: 80
                ,cols: [[
                    {title: '序号',type:'numbers'}
                    ,{field:'time', title: '时间'}
                    ,{field:'ip', title: 'IP' , align: 'center'}
                    ,{field:'browser', title: '浏览器' , align: 'center'}
                    ,{field:'referer', title: '来路' , align: 'center'}
                    ,{field:'uri', title: '受访' , align: 'center'}
                ]]
                ,page: {
                    layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
                    ,limit:5 //一页显示多少条
                    ,limits:[5,10,15,20,25]//每页条数的选择项
                    ,groups: 5 //只显示 5 个连续页码
                    ,first: "首页" //不显示首页
                    ,last: "尾页" //不显示尾页
                }
            });
        });
    </script>

    <script>
        layui.use(['layer','form'],function () {
            var layer = layui.layer, form = layui.form;
            $('#total_site').on('click', function () {
                $.ajax({
                    url: "<?php echo U('marketing/totalsite');?>",
                    type: 'get',
                    success: function (data) {
                        var info = data.info;
                        if(data.status==1){
                            form.val('total_save', {
                                'switch': info.switch,
                                'total_time': info.total_time,
                                'total_maxpv': info.total_maxpv,
                            });
                            form.render();
                        }
                    }
                },'json');
            });
            $('#delete_data').on('click',function(){
                layer.confirm('真的删除今天之前的数据吗？此操作不能撤销！', function (index) {
                    $.ajax({
                        url: "<?php echo U('marketing/totaldel');?>",
                        type: 'post',
                        success: function (data) {
                            var info = data.info;
                            if(data.status==1){
                                form.val('total_save', {
                                    'switch': info.switch,
                                    'total_time': info.total_time,
                                    'total_maxpv': info.total_maxpv,
                                });
                                form.render();
                            }
                        }
                    }, 'json');
                });
            });
        });
        layui.use('form', function(){
            var form = layui.form;
            form.on('submit(total_save)', function (data) {
                //表单数据formData
                var formData = data.field;
                $.ajax({
                    url: "<?php echo U('marketing/totalsite');?>",
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
                },'json')
            });
        });
    </script>
    <script>

        $('.layui-inline').click(function () {
            var _index = $(this).index();
            $('.layui-tab-item').eq(_index).addClass('layui-show').siblings().removeClass('layui-show');
        });
        $('.layui-form button').click(function () {
            $(this).removeClass('layui-btn-primary');
            $('.op').addClass("layui-btn-primary");
        });
        $('.layui-btn-primary').click(function () {
            $('.layui-inline>button').addClass('layui-btn-primary');
            $(this).removeClass('layui-btn-primary')
        });
        $('.layui-btn-search').click(function () {
            $(this).addClass('analysisButtonColor').siblings().removeClass('analysisButtonColor');
        })
    </script>



    <style id="LAY_layadmin_theme">.layui-side-menu,.layadmin-pagetabs .layui-tab-title li:after,.layadmin-pagetabs .layui-tab-title li.layui-this:after,.layui-layer-admin .layui-layer-title,.layadmin-side-shrink .layui-side-menu .layui-nav>.layui-nav-item>.layui-nav-child{background-color:#20222A !important;}.layui-nav-tree .layui-this,.layui-nav-tree .layui-this>a,.layui-nav-tree .layui-nav-child dd.layui-this,.layui-nav-tree .layui-nav-child dd.layui-this a{background-color:#009688 !important;}.layui-layout-admin .layui-logo{background-color:#20222A !important;}</style><div class="layui-layer-move"></div>


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