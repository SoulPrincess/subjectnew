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
                <a lay-href="">设置</a><span lay-separator="">/</span>
                <a><cite>友情链接设置</cite></a><span lay-separator="">/</span>
                <a><cite>友情链接列表</cite></a>
            </div>
        </div><div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input type="text" placeholder="名称/地址" name="link_content"  autocomplete="off" class="layui-input" id="link_content">
                            </div>
                        </div>
                        <div class="layui-inline">
                            <button class="layui-btn layuiadmin-btn-list" lay-submit="" lay-filter="LAY-app-contlist-search" id="user-btn">
                                <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="layui-card-body">
                    <table class="layui-hide" id="link_info" lay-filter='link_info'></table>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script>
        layui.use('table', function(){
            var table = layui.table;

            table.render({
                elem: '#link_info'
                ,url:"<?php echo U('link/linkinfo');?>"
                ,cellMinWidth: 80
                , toolbar: '#toolbarDemo'
                ,cols: [[
                    {type:'checkbox'}
                    ,{field:'id', title: 'ID', align:'center', sort: true}
                    ,{field:'link_name', title: '链接名称',align:"center"}
                    ,{field:'link_url', title: '链接地址', align:'center'}
                    ,{field:'user_name', title: '发布人',align:'center'}
                    ,{field:'release_date', title: '发布时间', align:'center'}
                    ,{field:'sort', title: '排序', align:'center', sort: true}
                    ,{field:'experience', title: '操作', align: 'center',toolbar:'#barDemo',width:170}
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
            $("#user-btn").click(function () {
                table.reload('link_info', {
                    where: {
                        link_content: $('#link_content').val(),
                    },
                    page: {
                        curr: 1
                    }
                });
            })
            //头工具栏事件
            table.on('toolbar(link_info)', function (obj) {console.log(obj);
                var checkStatus = table.checkStatus(obj.config.id);
                if (obj.event == 'link_add') {
                    layer.open({
                        type: 1
                        ,title: false //不显示标题栏
                        ,closeBtn: true
                        , area:' 50%'
                        ,content: $('#Friend')
                        ,btnAlign: 'l'
                        ,skin:'my-skin'
                    });
                }
                if (obj.event == 'batchdel') {
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
                                "<?php echo U('link/linkdel');?>",
                                { arr: arr },
                                function (data, status) {
                                    if (data.status==1) {
                                        layer.msg(data.info,{time:1500},function(){
                                            //更新数据
                                            table.reload('link_info', {
                                                where: {
                                                    link_content: $('#link_content').val(),
                                                },
                                                page: {
                                                    curr: 1
                                                }
                                            });
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
            table.on('tool(link_info)', function (obj) {
                var data = obj.data;
                var layEvent = obj.event;
                var tr = obj.tr;
                var arr=new Array(data.id);
                if (layEvent == 'edit') {
                    layer.open({
                        type: 2,
                        title: '编辑文章',
                        content:"<?php echo U('link/linkupdate');?>?id="+ data.id,
                        area: ['80%', '95%'],
                        end: function () {
                            //更新数据
                            table.reload('link_info', {
                                where: {
                                    link_content: $('#link_content').val(),
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
                            "<?php echo U('link/linkdel');?>",
                            { arr: arr },
                            function (data, status) {
                                if (data.status==1) {
                                    layer.msg(data.info,{time:1500},function(){
                                        //更新数据
                                        table.reload('link_info', {
                                            where: {
                                                link_content: $('#link_content').val(),
                                            },
                                            page: {
                                                curr: 1
                                            }
                                        });
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
                        "<?php echo U('link/linkstatus');?>",
                        {
                            id: data.id,
                            off: data.lock
                        },
                        function (data, status) {
                            if (data.status==1) {
                                layer.msg(data.info,{time:1500},function(){
                                    //更新数据
                                   table.reload('link_info', {
                                        where: {
                                            link_content: $('#link_content').val(),
                                        },
                                        page: {
                                            curr: 1
                                        }
                                    });
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

    <div class="layui-fluid" id="Friend" style="display: none">
        <div class="layui-card">
            <div class="layui-tab-content">
                <div class="layui-card-body" pad15="">
                    <div class="layui-form" lay-filter="link_save">
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">网站名称</label>
                                <div class="layui-input-inline ">
                                    <input type="text" name="link_name" placeholder="请输入" lay-verify="required" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">网站地址</label>
                                <div class="layui-input-inline ">
                                    <input type="text" name="link_url" placeholder="http://" lay-verify="required|weburl" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">同级排序</label>
                                <div class="layui-input-inline raning">
                                    <input type="text" name="Sort" value="0" autocomplete="off" lay-verify="number" class="layui-input small">
                                </div>
                                <div class="layui-form-mid layui-word-aux">数字越大排序越靠前</div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">创建人</label>
                                <div class="layui-input-inline ">
                                    <input type="text" name="User" placeholder="" autocomplete="off" class="layui-input" value="<?php echo session('userInfo.admin_username');?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item Ontheborder">
                            <div class="layui-input-inline ">
                                <button class="layui-btn"  lay-filter="link_save" lay-submit="link_save"> 保存</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        layui.use(['form','table'], function(){
            var form = layui.form
                ,layer = layui.layer
                ,table = layui.table;

            form.render();
            //自定义验证规则
            form.verify({
                weburl:
                [/(^#)|(^http(s*):\/\/[^\s]+\.[^\s]+)/,'请输入正确格式的网址']
            });
            //监听提交
            form.on('submit(link_save)', function(data){
                var url =  "<?php echo U('link/linkadd');?>";
                //表单序列化
                var param = data.field;
                //提交
                $.post(url,param, function(res) {
                    if(res.status == 1) {
                        layer.msg(res.info, {time: 1500},function(){
                            window.parent.location.reload();//刷新父页面
                            layer.closeAll();
                        });
                    } else {
                        layer.msg(res.info, {time:1500});
                    }
                });
                //阻止表单跳转
                return false;
            });
        });

    </script>
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <button <?php echo authcheck('linkdel');?> class="layui-btn layuiadmin-btn-list" lay-event="batchdel" data-type="batchdel">删除</button>
            <button <?php echo authcheck('linkadd');?> data-method="notice" id="link_add" lay-event="link_add" class="layui-btn">+添加友情链接</button>
        </div>
    </script>
    <script type="text/html" id="barDemo">
        {{#  if(d.lock == 0){ }}
        <a <?php echo authcheck('linkupdate');?> class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a <?php echo authcheck('linkstatus');?> class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">禁用</a>
        <a <?php echo authcheck('linkdel');?> class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } else { }}
        <a <?php echo authcheck('linkupdate');?> class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a <?php echo authcheck('linkstatus');?> class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">显示</a>
        <a <?php echo authcheck('linkdel');?> class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } }}
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