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
        <div class="layadmin-tabsbody-item layui-show">
            <div class="layui-card layadmin-header">
                <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
                    <a lay-href="">应用</a><span lay-separator="">/</span>
                    <a><cite>内容系统</cite></a><span lay-separator="">/</span>
                    <a><cite>文章列表</cite></a>
                </div>
            </div><div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">文章ID</label>
                            <div class="layui-input-inline">
                                <input type="text" id="consult_id" name="id" placeholder="请输入" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">作者</label>
                            <div class="layui-input-inline">
                                <input type="text" id="consult_author" name="author" placeholder="请输入" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">标题</label>
                            <div class="layui-input-inline">
                                <input type="text" id="consult_title" name="title" placeholder="请输入" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">文章标签</label>
                            <div class="layui-input-inline" id="change_type">
                                <select id="consult_lg" name="consult_lg" lay-filter="consult_lg"></select>
                            </div>
                            <div class="layui-input-inline">
                                <select id="consult_sm" name="consult_sm" lay-filter="consult_sm"></select>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <button id="consult_btn" class="layui-btn layuiadmin-btn-list" lay-submit="" lay-filter="LAY-app-contlist-search">
                                <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="layui-card-body">
                    <table class="layui-hide" id="consult_list" lay-filter="consult_list"></table>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- 辅助元素，一般用于移动设备下遮罩 -->
    <div class="layadmin-body-shade" layadmin-event="shade"></div>

    <script>
        //将时间戳转换为日期时间
        function fmtDate(obj) {
            var dateVal = obj + "";
            if (obj != null) {
                var date = new Date(parseInt(dateVal.replace("/Date(", "").replace(")/", ""), 10));
                var month = date.getMonth() + 1 < 10 ? "0" + (date.getMonth() + 1) : date.getMonth() + 1;
                var currentDate = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
                var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
                var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
                var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
                return date.getFullYear() + "-" + month + "-" + currentDate + " " + hours + ":" + minutes + ":" + seconds;
            }
        }
    </script>

    <script type="text/javascript">
        var form_temp = "", form_table = "";
        layui.use('form', function () {
            form_temp = layui.form;
            form_temp.on('select(consult_lg)', function (data) {
                get_consult_sm();
            });
        });
        $(function () {
            get_consult_lg();
        });
        function get_consult_lg() {
            $.getJSON(
                "/Consult/GetLgData",
                function (data) {
                    $("<option></option>").val("0").text("请选择标签").appendTo($("#consult_lg"));
                    for (var i = 0; i < data.length; i++) {
                        $("<option></option>").val(data[i].Id).text(data[i].LgName).appendTo($("#consult_lg"));
                    }
                    get_consult_sm();
                });
        }
        function get_consult_sm() {
            $("#consult_sm").empty();
            $.getJSON(
                "/Consult/GetSmData",
                { lg_Id: $("#consult_lg").val() },
                function (data) {
                    $("<option></option>").val("0").text("请选择标签").appendTo($("#consult_sm"));
                    for (var i = 0; i < data.length; i++) {
                        $("<option></option>").val(data[i].Id).text(data[i].SmName).appendTo($("#consult_sm"));
                    }
                    form_temp.render();
                });
        }
        //显示大图片
        function show_img(t) {
            var t = $(t).find("img");
            //页面层
            layer.open({
                type: 1,
                skin: 'layui-layer-rim', //加上边框
                area: ['80%', '80%'], //宽高 t.width() t.height()
                shadeClose: true, //开启遮罩关闭
                end: function (index, layero) {
                    return false;
                },
                content: '<div style="text-align:center"><img src="' + $(t).attr('src') + '" /></div>'
            });
        }
        function hoverOpenImg() {
            var img_show = null; // tips提示
            $('td img').hover(function () {
                //alert($(this).attr('src'));
                var img = "<img class='img_msg' src='" + $(this).attr('src') + "' style='width:220px;' />";
                img_show = layer.tips(img, this, {
                    tips: [2, 'rgba(41,41,41,.5)']
                    , area: ['250px']
                });
            }, function () {
                layer.close(img_show);
            });
            $('td img').attr('style', 'max-width:70px');
        }
    </script>

    <script>

        layui.use('table', function () {
            form_table = layui.table;

            form_table.render({
                elem: '#consult_list'
                , url: "<?php echo U('user/useradmininfo');?>"
                , method: 'post'
                , toolbar: '#toolbarDemo'
                , cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
                , cols: [[
                    { type: 'checkbox' }
                    , { field: 'Id', title: '文章ID', sort: true }
                    , { field: 'Sm_Name', title: '文章标签', align: 'center', templet: '#table_sm' } //width 支持：数字、百分比和不填写。你还可以通过 minWidth 参数局部定义当前单元格的最小宽度，layui 2.2.1 新增
                    , { field: 'Title', title: '文章标题', align: 'center' }
                    , { field: 'CoverImg', title: '文章图片', align: 'center', templet: '#CoverImg' }
                    , { field: 'User_Name', title: '作者', align: 'center' }
                    , { field: 'ReleaseDate', title: '上传时间', templet: '#ReleaseDate', align: 'center' }
                    , { field: 'UpdateDate', title: '最后修改时间', templet: '#UpdateDate', align: 'center' }
                    , { field: 'R_Str', title: '是否推荐', align: 'center' } //单元格内容水平居中
                    , { field: 'Describe', title: '文章内容' } //单元格内容水平居中
                    , { field: 'Right', fixed: 'right', title: '操作', align: 'right', toolbar: '#barDemo', align: 'center' } //单元格内容水平居中
                ]]
                , page: true
                , done: function (res, curr, count) {
                    hoverOpenImg();//显示大图
                    $('table tr').on('click', function () {
                        $('table tr').css('background', '');
                        $(this).css('background', '<%=PropKit.use("config.properties").get("table_color")%>');
                    });
                }
            });
            $("#consult_btn").click(function () {
                form_table.reload('consult_list', {
                    where: {
                        consult_id: $('#consult_id').val(),
                        consult_author: $('#consult_author').val(),
                        consult_title: $('#consult_title').val(),
                        consult_sm: $('#consult_sm').val(),
                    },
                    page: {
                        curr: 1
                    }
                });
            })
            //头工具栏事件
            form_table.on('toolbar(consult_list)', function (obj) {
                var checkStatus = form_table.checkStatus(obj.config.id);
                if (obj.event == 'consult_add') {
                    layer.open({
                        type: 2,
                        title: '添加文章',
                        content: "<?php echo U('content/articleadd');?>",
                        area: ['80%', '80%'],
                        end: function () {
                            //更新数据
                            form_table.reload('consult_list', {
                                where: {
                                    consult_id: $('#consult_id').val(),
                                    consult_author: $('#consult_author').val(),
                                    consult_title: $('#consult_title').val(),
                                    consult_sm: $('#consult_sm').val(),
                                },
                                page: {
                                    curr: 1
                                }
                            });
                        }
                    })
                }
                if (obj.event == 'batchdel') {
                    var arr = [];
                    var data = checkStatus.data;
                    for (var i = 0; i < data.length; i++) {    //循环筛选出id
                        arr.push(data[i].Id);
                        layer.alert(data[i].Id)
                    }
                    if (arr.length != 0) {
                        layer.confirm('真的删除吗，此操作不能撤销！', function (index) {
                            //向服务端发送删除指令
                            layui.$.post(
                                '/Consult/BatchDeletConsult',
                                { arr: arr },
                                function (data, status) {
                                    if (data.IsSuccess) {
                                        layer.msg('删除成功!');
                                        //更新数据
                                        form_table.reload('consult_list', {
                                            where: {
                                                consult_id: $('#consult_id').val(),
                                                consult_author: $('#consult_author').val(),
                                                consult_title: $('#consult_title').val(),
                                                consult_sm: $('#consult_sm').val(),
                                            },
                                            page: {
                                                curr: 1
                                            }
                                        });
                                    }
                                    else {
                                        layer.msg('删除失败:' + data.ErrorInfo);
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
            form_table.on('tool(consult_list)', function (obj) {
                var data = obj.data;
                var layEvent = obj.event;
                var tr = obj.tr;
                if (layEvent == 'edit') {
                    layer.open({
                        type: 2,
                        title: '编辑文章',
                        content: '/Consult/UpdateConsult?id=' + data.Id,
                        area: ['80%', '80%'],
                        end: function () {
                            //更新数据
                            form_table.reload('consult_list', {
                                where: {
                                    consult_id: $('#consult_id').val(),
                                    consult_author: $('#consult_author').val(),
                                    consult_title: $('#consult_title').val(),
                                    consult_sm: $('#consult_sm').val(),
                                },
                                page: {
                                    curr: 1
                                }
                            });
                        }
                    })
                }
                if (layEvent == 'del') {
                    layer.confirm('真的删除吗，此操作不能撤销！', function (index) {
                        //向服务端发送删除指令
                        layui.$.post(
                            '/Consult/DeleteConsult',
                            { id: data.Id },
                            function (data, status) {
                                if (data.IsSuccess) {
                                    layer.msg('删除成功!');
                                    obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                    layer.close(index);
                                }
                                else {
                                    layer.msg('删除失败:' + data.ErrorInfo);
                                }
                            }
                        )
                    });
                }
                if (layEvent === 'stop') {
                    layui.$.post(
                        '/Consult/OffConsult',
                        {
                            id: data.Id,
                            off: data.Lock
                        },
                        function (data, status) {
                            if (data.IsSuccess) {
                                layer.msg('成功!');
                                //更新数据
                                form_table.reload('consult_list', {
                                    where: {
                                        consult_id: $('#consult_id').val(),
                                        consult_author: $('#consult_author').val(),
                                        consult_title: $('#consult_title').val(),
                                        consult_sm: $('#consult_sm').val(),
                                    },
                                    page: {
                                        curr: 1
                                    }
                                });
                                layer.close(index);
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
    <script type="text/html" id="CoverImg">
        <div><img src="{{ d.CoverImg === null?"":d.CoverImg }}"></div>
    </script>
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <button class="layui-btn layuiadmin-btn-list" lay-event="batchdel" data-type="batchdel">删除</button>
            <button data-method="notice" id="consult_add" lay-event="consult_add" class="layui-btn">添加</button>
        </div>
    </script>
    <script type="text/html" id="table_sm">
        <div>
            <span lay-data="{{d.Sm_Id}}">{{d.Sm_Name}}</span>
        </div>
    </script>
    <script type="text/html" id="barDemo">
        {{#  if(d.Lock == 0){ }}
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">禁用</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } else { }}
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">显示</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } }}
    </script>
    <script type="text/html" id="ReleaseDate">
        {{fmtDate(d.ReleaseDate) === undefined?"-":fmtDate(d.ReleaseDate)}}
    </script>
    <script type="text/html" id="UpdateDate">
        {{fmtDate(d.UpdateDate) === undefined?"-":fmtDate(d.UpdateDate)}}
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