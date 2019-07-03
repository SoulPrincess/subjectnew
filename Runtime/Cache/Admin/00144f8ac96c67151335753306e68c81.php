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
                                <dd data-jump="" data-name="list"><a href="<?php echo U('content/article-list');?>" lay-href="app/content/list">文章列表</a>
                                </dd>
                                <dd data-jump="" data-name="tags"><a href="<?php echo U('content/article-management');?>" lay-href="app/content/tags">分类管理</a>
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
        <div class="layadmin-tabsbody-item layui-show">
            <div class="layui-card layadmin-header">
                <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
                    <a lay-href="">主页</a><span lay-separator="">/</span>
                    <a><cite>内容系统</cite></a><span lay-separator="">/</span>
                    <a><cite>分类管理</cite></a>
                </div>
            </div><div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-header layuiadmin-card-header-auto">
                    <button class="layui-btn layuiadmin-btn-tags" id="btn-add">添加一级分类</button>
                    <div class="layui-btn-group">
                        <button class="layui-btn" id="btn-expand">全部展开</button>
                        <button class="layui-btn" id="btn-fold">全部折叠</button>
                        <button class="layui-btn" id="btn-refresh">刷新表格</button>
                    </div>
                    <span class="layui-bg-gray">排序越小越靠前</span>
                </div>
                <div class="layui-card-body">
                    <table class="layui-hide" id="consult_type" lay-filter="consult_type"></table>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- 辅助元素，一般用于移动设备下遮罩 -->
    <div class="layadmin-body-shade" layadmin-event="shade"></div>
    <script>
        layui.config({
            base: '/public/admin/module/'
        }).extend({
            treetable: 'treetable-lay/treetable'
        }).use(['layer', 'table', 'treetable'], function () {
            var $ = layui.jquery;
            var table = layui.table;
            var layer = layui.layer;
            var treetable = layui.treetable;

            //渲染表格
            var renderTable = function () {
                layer.load(2);
                $.get("<?php echo U('content/article-management');?>", function (res) {
                    console.log(res.data);
                    treetable.render({
                        treeColIndex: 1,
                        treeSpid: 0,
                        treeIdName: 'Id',
                        treePidName: 'Pid',
                        treeDefaultClose: false,
                        treeLinkage: false,
                        elem: '#consult_type',
                        data: res.data,
                        page: false,
                        cols: [[
                            { type: 'numbers' },
                            { field: 'C_Id', title: '分类Id', align: 'center' },
                            { field: 'Name', title: '分类名', edit: 'text', align: 'left' },
                            { field: 'Sort', title: '排序', edit: 'text', align: 'center' },
                            { field: 'Sign', title: '标识', edit: 'text', align: 'center' },
                            { field: 'Describe', title: '描述', edit: 'text', align: 'center' },
                            { templet: '#barDemo', title: '操作', align: 'right' }
                        ]],
                        done: function () {
                            layer.closeAll('loading');
                        }
                    });
                }, 'json');
            };

            renderTable();

            $('#btn-expand').click(function () {
                treetable.expandAll('#consult_type');
            });

            $('#btn-fold').click(function () {
                treetable.foldAll('#consult_type');
            });

            $('#btn-refresh').click(function () {
                renderTable();
            });
            $('#btn-add').click(function () {
                //向服务端发送添加指令
                layui.$.post(
                    '/Consult/AddLg',
                    {},
                    function (data, status) {
                        console.log(data.IsSuccess);
                        if (data.IsSuccess) {
                            layer.msg('添加成功!');
                            renderTable();
                        }
                        else {
                            layer.msg('添加失败:' + data.ErrorInfo);
                        }
                    }
                )
            })
            //监听工具条
            table.on('tool(consult_type)', function (obj) {
                var data = obj.data;
                var value = obj.value //得到修改后的值
                    , field = obj.field; //得到字段
                var layEvent = obj.event;

                if (layEvent === 'del') {
                    layer.confirm('你确定删除数据吗？如果存在下级节点并且分类关联数据则一并删除，此操作不能撤销！', function (index) {
                        //向服务端发送删除指令
                        layui.$.post(
                            '/Consult/DeleteType',
                            {
                                p_id: data.C_Id,
                                f_id: data.P_Id
                            },
                            function (data, status) {
                                if (data.IsSuccess) {
                                    layer.msg('删除成功!');
                                    obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                    renderTable();
                                    layer.close(index);
                                }
                                else {
                                    layer.msg('删除失败:' + data.ErrorInfo);
                                }
                            }
                        )
                    });
                }
                else if (layEvent === 'save') {
                    layui.$.post(
                        '/Consult/UpdateType',
                        {
                            p_id: data.C_Id,
                            f_id: data.P_Id,
                            Name: data.Name,
                            Sort: data.Sort,
                            Sign: data.Sign,
                            Describe: data.Describe
                        },
                        function (data, status) {
                            if (data.IsSuccess) {
                                layer.msg('修改成功!');
                                renderTable();
                                layer.close(index);
                            }
                            else {
                                layer.msg('修改失败:' + data.ErrorInfo);
                            }
                        }
                    )
                }
                else if (layEvent === 'add') {
                    layui.$.post(
                        '/Consult/AddSm',
                        {
                            id: data.C_Id
                        },
                        function (data, status) {
                            if (data.IsSuccess) {
                                layer.msg('添加成功!');
                                obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                renderTable();
                            }
                            else {
                                layer.msg('添加失败:' + data.ErrorInfo);
                            }
                        }
                    )
                }
                else if (layEvent === 'stop'){
                    layui.$.post(
                        '/Consult/OffType',
                        {
                            p_id: data.C_Id,
                            f_id: data.P_Id,
                            off: data.Display
                        },
                        function (data, status) {
                            if (data.IsSuccess) {
                                layer.msg('成功!');
                                obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                renderTable();
                            }
                            else {
                                layer.msg('失败:' + data.ErrorInfo);
                            }
                        }
                    )
                }
            });
        });


    </script>
    <script type="text/html" id="barDemo">
        {{#  if(d.Pid == 0){ }}
        <a class="layui-btn layui-btn-xs" lay-event="add">添加子类</a>
        <a class="layui-btn layui-btn-xs" lay-event="save">保存</a>
        {{#  if(d.Display == 0){ }}
        <a class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">禁用</a>
        {{#  } else { }}
        <a class="layui-btn  layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">显示</a>
        {{#  } }}
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } else { }}
        <a class="layui-btn layui-btn-xs" lay-event="save">保存</a>
        {{#  if(d.Display == 0){ }}
        <a class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">禁用</a>
        {{#  } else { }}
        <a class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">显示</a>
        {{#  } }}
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } }}
    </script>
    <style id="LAY_layadmin_theme">
        .layui-side-menu, .layadmin-pagetabs .layui-tab-title li:after, .layadmin-pagetabs .layui-tab-title li.layui-this:after, .layui-layer-admin .layui-layer-title, .layadmin-side-shrink .layui-side-menu .layui-nav > .layui-nav-item > .layui-nav-child {
            background-color: #20222A !important;
        }

        .layui-nav-tree .layui-this, .layui-nav-tree .layui-this > a, .layui-nav-tree .layui-nav-child dd.layui-this, .layui-nav-tree .layui-nav-child dd.layui-this a {
            background-color: #009688 !important;
        }

        .layui-layout-admin .layui-logo {
            background-color: #20222A !important;
        }
    </style><div class="layui-layer-move"></div>


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