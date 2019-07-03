<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>谷程后台</title>
    <link rel="stylesheet" type="text/css" href="/Public/admin/layui/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/tai.css">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/popup.css">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/class.css">

    <script type="text/javascript" src="/Public/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/admin/js/echarts.min.js"></script>
    <script type="text/javascript" src="/Public/admin/layui/laydate/laydate.js"></script>
    <script type="text/javascript" src="/Public/admin/layui/layui/layui.js" ></script>



</head>
<body class="layui-layout-body">
<div id="LAY_app" class="layadmin-tabspage-none">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">谷程后台</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    <?php echo session('admin_username');?>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo U('user/information');?>">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="<?php echo U('index/logout');?>">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu" lay-shrink="all">
                <li class="layui-nav-item" data-jump="" data-name="">
                    <a href="javascript:;" lay-direction="2" lay-tips="主页">
                        <i class="layui-icon layui-icon-home"></i>
                        <cite>主页</cite>
                    </a>
                </li>
                <li class="layui-nav-item" data-jump="" data-name="app">
                    <a href="javascript:;" lay-direction="2" lay-tips="应用"> <i class="layui-icon layui-icon-app"></i> <cite>应用</cite> <span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd data-jump="" data-name="content"><a href="javascript:;">内容系统<span class="layui-nav-more"></span></a>
                            <dl class="layui-nav-child">
                                <dd data-jump="" data-name="list"><a href="<?php echo U('content/articlelist');?>" lay-href="app/content/list">文章列表</a>
                                </dd>
                                <dd data-jump="" data-name="tags"><a href="<?php echo U('content/articlemanagement');?>" lay-href="app/content/tags">分类管理</a>
                                </dd>
                            </dl>
                        </dd>
                        <dd data-jump="" data-name="forum"><a href="javascript:;">产品系统<span class="layui-nav-more"></span></a>
                            <dl class="layui-nav-child">
                                <dd data-jump="" data-name="list"><a href="<?php echo U('product/product-list');?>" lay-href="app/forum/list">产品列表</a></dd>
                                <dd data-jump="" data-name="replys"><a href="<?php echo U('product/product-management');?>" lay-href="app/forum/replys">分类管理</a>
                                </dd>
                            </dl>
                        </dd>
                        <dd data-jump="" data-name="forum"><a href="javascript:;">图片系统<span class="layui-nav-more"></span></a>
                            <dl class="layui-nav-child">
                                <dd data-jump="" data-name="list"><a href="pic_list.html" lay-href="app/forum/list">图片列表</a></dd>
                                <dd data-jump="" data-name="replys"><a href="pro_class.html" lay-href="app/forum/replys">分类管理</a>
                                </dd>
                            </dl>
                        </dd>
                        <dd data-jump="" data-name="message"><a href="javascript:;" lay-href="app/message/">广告系统</a></dd>
                        <dd data-jump="" data-name="message"><a href="javascript:;" lay-href="app/message/">营销系统</a></dd>
                        <dd data-jump="app/workorder/list" data-name="workorder">
                            <a href="javascript:;" lay-href="app/workorder/list">留言系统</a>
                        </dd>
                    </dl>
                </li>
                <li class="layui-nav-item" data-jump="" data-name="user">
                    <a href="javascript:;" lay-direction="2" lay-tips="用户"> <i class="layui-icon layui-icon-user"></i> <cite>用户</cite> <span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd data-jump="user/administrators/list" data-name="administrators-list">
                            <a href="<?php echo U('user/useradmin');?>" lay-href="user/administrators/list">后台管理员</a>
                        </dd>
                        <!--<dd data-jump="user/administrators/role" data-name="administrators-rule">-->
                            <!--<a href="<?php echo U('user/role');?>" lay-href="user/administrators/role">角色管理</a>-->
                        <!--</dd>-->
                        <dd data-jump="" data-name="content"><a href="javascript:;">权限管理<span class="layui-nav-more"></span></a>
                            <dl class="layui-nav-child">
                                <dd data-jump="" data-name="list"><a href="<?php echo U('auth/listadmins');?>" lay-href="app/content/list">角色管理</a>
                                </dd>
                                <dd data-jump="" data-name="tags"><a href="<?php echo U('auth/listrule');?>" lay-href="app/content/tags">权限列表</a>
                                </dd>
                            </dl>
                        </dd>
                    </dl>
                </li>
                <li class="layui-nav-item" data-jump="" data-name="set">
                    <a href="javascript:;" lay-direction="2" lay-tips="设置">
                        <i class="layui-icon layui-icon-set"></i> <cite>设置</cite> <span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd class="layui-nav-itemed" data-jump="" data-name="system">
                            <a href="javascript:;">栏目设置<span class="layui-nav-more"></span></a>
                            <dl class="layui-nav-child">
                                <dd data-jump="" data-name="website"><a href="javascript:;" lay-href="set/system/website">网站设置</a></dd>
                                <dd data-jump="" data-name="email"><a href="javascript:;" lay-href="set/system/email">邮件服务</a>
                                </dd>
                            </dl>
                        </dd>
                        <dd class="layui-nav-itemed" data-jump="" data-name="system">
                            <a href="javascript:;">系统设置<span
                                    class="layui-nav-more"></span></a>
                            <dl class="layui-nav-child">
                                <dd data-jump="" data-name="website"><a href="javascript:;"
                                                                        lay-href="set/system/website">网站设置</a></dd>
                                <dd data-jump="" data-name="email"><a href="javascript:;" lay-href="set/system/email">邮件服务</a>
                                </dd>
                            </dl>
                        </dd>
                        <dd class="layui-nav-itemed" data-jump="" data-name="system">
                            <a href="javascript:;">友情链接设置<span
                                    class="layui-nav-more"></span></a>
                            <dl class="layui-nav-child">
                                <dd data-jump="" data-name="website"><a href="javascript:;"
                                                                        lay-href="set/system/website">网站设置</a></dd>
                                <dd data-jump="" data-name="email"><a href="javascript:;" lay-href="set/system/email">邮件服务</a>
                                </dd>
                            </dl>
                        </dd>
                        <dd class="layui-nav-itemed" data-jump="" data-name="user">
                            <a href="javascript:;">底部信息设置<span
                                    class="layui-nav-more"></span></a>
                            <dl class="layui-nav-child">
                                <dd data-jump="" data-name="info">
                                    <a href="javascript:;" lay-href="set/user/info">基本资料</a>
                                </dd>
                                <dd data-jump="" data-name="password">
                                    <a href="javascript:;" lay-href="set/user/password">修改密码</a>
                                </dd>
                            </dl>
                        </dd>
                        <dd class="layui-nav-itemed" data-jump="" data-name="user">
                            <a href="javascript:;">我的设置<span
                                    class="layui-nav-more"></span></a>
                            <dl class="layui-nav-child">
                                <dd data-jump="" data-name="info">
                                    <a href="set_myBasic.html" lay-href="set/user/info">基本资料</a>
                                </dd>
                                <dd data-jump="" data-name="password">
                                    <a href="set_myPass.html" lay-href="set/user/password">修改密码</a>
                                </dd>
                            </dl>
                        </dd>
                    </dl>
                </li>
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
            <a><cite>产品系统</cite></a><span lay-separator="">/</span>
            <a><cite>分类管理</cite></a>
        </div>
    </div><div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="layadmin-userfront-formlist">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">ID</label>
                        <div class="layui-input-block">
                            <input type="text" name="id" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">用户名</label>
                        <div class="layui-input-block">
                            <input type="text" name="username" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">邮箱</label>
                        <div class="layui-input-block">
                            <input type="text" name="email" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">性别</label>
                        <div class="layui-input-block">
                            <select name="sex">
                                <option value="0">不限</option>
                                <option value="1">男</option>
                                <option value="2">女</option>
                            </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择" value="不限" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="0" class="layui-this">不限</dd><dd lay-value="1" class="">男</dd><dd lay-value="2" class="">女</dd></dl></div>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn layuiadmin-btn-useradmin" lay-submit="" lay-filter="LAY-user-front-search">
                            <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="layui-card-body">
                <div style="padding-bottom: 10px;">
                    <button class="layui-btn layuiadmin-btn-useradmin" data-type="batchdel">删除</button>
                    <button data-method="notice" id="layerDemo" class="layui-btn">添加</button>
                </div>


                <table class="layui-hide" id="test"></table>








            </div>
        </div>
    </div>




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
                ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
                ,cols: [[
                    {field:'id', title: 'ID', sort: true}
                    ,{field:'username', title: '用户名'} //width 支持：数字、百分比和不填写。你还可以通过 minWidth 参数局部定义当前单元格的最小宽度，layui 2.2.1 新增
                    ,{field:'sex', title: '性别', sort: true}
                    ,{field:'city', title: '城市'}
                    ,{field:'sign', title: '签名'}
                    ,{field:'classify', title: '职业', align: 'center'} //单元格内容水平居中
                    ,{field:'experience', title: '积分', sort: true, align: 'right'} //单元格内容水平居中
                    ,{field:'score', title: '评分', sort: true, align: 'right'}
                    ,{field:'wealth', title: '财富', sort: true, align: 'right'}
                ]]
            });
        });
    </script>
    <style id="LAY_layadmin_theme">.layui-side-menu,.layadmin-pagetabs .layui-tab-title li:after,.layadmin-pagetabs .layui-tab-title li.layui-this:after,.layui-layer-admin .layui-layer-title,.layadmin-side-shrink .layui-side-menu .layui-nav>.layui-nav-item>.layui-nav-child{background-color:#20222A !important;}.layui-nav-tree .layui-this,.layui-nav-tree .layui-this>a,.layui-nav-tree .layui-nav-child dd.layui-this,.layui-nav-tree .layui-nav-child dd.layui-this a{background-color:#009688 !important;}.layui-layout-admin .layui-logo{background-color:#20222A !important;}</style>
    <script>
        layui.use('layer', function(){ //独立版的layer无需执行这一句
            var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句

            //触发事件

            $('#layerDemo').on('click', function(){
                layer.open({
                    type: 1
                    ,title: false //不显示标题栏
                    ,closeBtn: false
                    ,area: ['90%','80%']
                    ,content: $('#ddddd')
                    ,btn: ['立即提交', '取消']
                    ,btnAlign: 'l'
                    ,skin:'my-skin'
                });
            });
        });
    </script>
    <div class="layui-fluid" id="ddddd" style="display: none">
        <div class="layui-card">
            <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">分类名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" placeholder="搜索" autocomplete="off" class="layui-input">
                        </div>

                    </div>

                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">同级排序</label>
                        <div class="layui-input-inline raning">
                            <input type="text" name="title" value="0" autocomplete="off" class="layui-input small">
                        </div>
                        <div class="layui-form-mid layui-word-aux">排序越小越靠前</div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">导航栏显示</label>
                    <div class="layui-input-block">
                        <input type="radio" name="sex" value="不显示" title="不显示">
                        <div class="layui-unselect layui-form-radio ">
                            <i class="layui-anim layui-icon"></i>
                            <div>不显示</div>
                        </div>
                        <input type="radio" name="sex" value="头部主导航显示" title="头部主导航显示"><div class="layui-unselect layui-form-radio revel"><i class="layui-anim layui-icon"></i><div>头部主导航显示</div></div>
                        <input type="radio" name="sex" value="尾部导航条" title="尾部导航条"><div class="layui-unselect layui-form-radio revel"><i class="layui-anim layui-icon"></i><div>尾部导航条</div></div>
                        <input type="radio" name="sex" value="都显示" title="都显示"><div class="layui-unselect layui-form-radio revel"><i class="layui-anim layui-icon"></i><div>都显示</div></div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">新窗口打开</label>
                        <div class="layui-input-inline revel">
                            <input type="radio" name="sex" value="是" title="是"><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>是</div></div>
                            <input type="radio" name="sex" value="否" title="否"><div class="layui-unselect layui-form-radio revel"><i class="layui-anim layui-icon"></i><div>否</div></div>
                        </div>
                        <div class="layui-form-mid layui-word-aux">设置分类链接是否在新窗口打开</div>
                    </div>
                </div>
            </div>
            <!--<div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">-->
            <!---->
            <!--</div>-->
            <blockquote class="layui-elem-quote layui-text">
                搜索引擎优化设置(seo)
            </blockquote>

            <div class="layui-card-body" pad15="">
                <div class="layui-form" lay-filter="">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">分类title</label>
                            <div class="layui-input-inline ccc">
                                <input type="text" name="title" placeholder="请输入" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">为空则使用SEO参数设置中设置的title构成的方式</div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">关键词</label>
                        <div class="layui-input-inline ccc">
                            <input type="text" name="text" placeholder="请输入"  readonly="" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">多个关键词请用|或，隔开</div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">简短描述</label>
                        <div class="layui-input-block">
                            <textarea placeholder="请输入内容" class="layui-textarea textA"></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <blockquote class="layui-elem-quote layui-text">
                其它设置（根据模板配置说明设置）
            </blockquote>
            <div class="layui-card-body" pad15="">

                <div class="layui-form" lay-filter="">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">分类标识</label>
                            <div class="layui-input-inline raning">
                                <input type="text" name="title" value="0" autocomplete="off" class="layui-input small">
                            </div>
                            <div class="layui-form-mid layui-word-aux">作用于该栏目在前台对应位置的显示</div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">修饰名称</label>
                            <div class="layui-input-inline">
                                <input type="text" name="title" id="test1"  placeholder="请输入……" class="layui-input">
                            </div>

                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">分类图片</label>
                        <div class="layui-input-inline layui-btn-container" style="width: auto;">
                            <button type="button" class="layui-btn layui-btn-primary" id="LAY_avatarUpload">
                                <i class="layui-icon"></i>上传图片
                            </button>
                            <input class="layui-upload-file" type="file" accept="undefined" name="file">

                        </div>
                    </div>

                </div>

            </div>
            <blockquote class="layui-elem-quote layui-text">
                权限设置
            </blockquote>
            <div class="layui-card-body" pad15="">

                <div class="layui-form" lay-filter="">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">访问权限</label>
                            <div class="layui-input-inline">
                                <select name="label">
                                    <option value="">请选择标签</option>
                                    <option value="0">不限</option>
                                    <option value="1">普通会员</option>
                                    <option value="2">代理商</option>
                                    <option value="2">管理员</option>
                                </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择标签" value="" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择标签</dd><dd lay-value="0" class="">美食</dd><dd lay-value="1" class="">新闻</dd><dd lay-value="2" class="">八卦</dd><dd lay-value="3" class="">体育</dd><dd lay-value="4" class="">音乐</dd></dl></div>
                            </div>
                        </div>

                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">前台显示</label>
                            <div class="layui-input-inline revel">
                                <input type="radio" name="sex" value="是" title="是"><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>是</div></div>
                                <input type="radio" name="sex" value="否" title="否"><div class="layui-unselect layui-form-radio revel"><i class="layui-anim layui-icon"></i><div>否</div></div>
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
    </script>
    <script>

        laydate.render({
            elem: '#test1'
            ,type: 'datetime'
        });
        laydate.render({
            elem: '#test2'
            ,type: 'datetime'
        });
    </script>

    <!-- 辅助元素，一般用于移动设备下遮罩 -->
    <div class="layadmin-body-shade" layadmin-event="shade"></div>
    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
</div>
<script>
    layui.use('element', function(){
        var element = layui.element;

    });
    // layui.use('table', function(){
    //     var table = layui.table;
    //
    //     table.render({
    //         elem: '#test'
    //         ,url:'/demo/table/user/'
    //         ,cols: [[
    //             {field:'sign', title: '关键词', minWidth: 150}
    //             ,{field:'sign', title: '搜素次数', minWidth: 150, sort: true}
    //             ,{field:'sign', title: '用户数', minWidth: 150, sort: true}
    //

    //         ,page: true
    //     });
    // });
    // layui.use('carousel',function () {
    //     var carousel = layui.carousel;
    //     var ins = carousel.render({
    //         elem: '#test2'
    //         ,width:"100%"
    //         ,arrow:'none'
    //         ,full:false
    //         ,autoplay:false
    //         // ,interval:2000
    //         ,index:1
    //         ,indicator:'inside'
    //     });
    //     ins.reload({arrow:'hover'});
    // });
    // layui.use('carousel',function () {
    //     var carousel = layui.carousel;
    //     var ins = carousel.render({
    //         elem: '#test3'
    //         ,width:"100%"
    //         ,arrow:'always'
    //         ,full:false
    //         ,autoplay:false
    //         // ,interval:2000
    //         ,index:0
    //         ,indicator:'inside'
    //     });
    //
    //     ins.reload({arrow:'hover'});
    // })
    // layui.use('carousel',function () {
    //     var carousel = layui.carousel;
    //     var ins = carousel.render({
    //         elem: '#myline'
    //         ,width:"100%"
    //         ,arrow:'always'
    //         ,full:false
    //         ,autoplay:false
    //         // ,interval:2000
    //         ,index:0
    //         ,indicator:'inside'
    //     });
    //
    //     ins.reload({arrow:'hover'});
    // })
</script>

</body>
</html>