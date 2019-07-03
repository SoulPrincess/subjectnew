<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>用户-权限管理-权限列表</title>
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
            <a><cite>用户</cite></a><span lay-separator="">/</span>
            <a><cite>权限管理</cite></a><span lay-separator="">/</span>
            <a><cite>权限列表</cite></a>
        </div>
    </div><div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="layadmin-useradminrole-formlist">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <div class="layui-input-inline">
                            <input type="text" placeholder="搜索内容" name="role_title"  autocomplete="off" class="layui-input" id="edt-search">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn layuiadmin-btn-admin" id="user-btn" lay-submit="" lay-filter="LAY-user-back-search" data-type="reload">
                            <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="layui-card-body">
                <table class="layui-hide" id="test" lay-filter="test"></table>

            </div>
        </div>
    </div>

    </div>
</div>

<script>
    layui.config({
        base: '/public/admin/module/'
    }).extend({
        treetable: 'treetable-lay/treetable'
    }).use(['table','treetable'], function(){
        var table = layui.table,
            form   = layui.form;
            treetable = layui.treetable;

// 渲染表格
        var renderTable = function () {
            treetable.render({
                elem: '#test'
                , url: "<?php echo U('auth/listrule');?>"
                , toolbar: '#toolbarDemo'
                , treeColIndex: 3//树形图标显示在第几列
                , treeSpid: 0//最上级的父级id
                , treeIdName: 'id'//id字段的名称
                , treePidName: 'pid'//pid字段的名称
                , treeDefaultClose: false//父级展开时是否自动展开所有子级是否默认折叠
                , treeLinkage: true//父级展开时是否自动展开所有子级
                , cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
                , cols: [[
                    {type: 'numbers'}
                    , {field: 'id', title: 'ID', align: 'center', sort: true, width: 50}
                    ,{field:'status', title:'状态',templet: '#status_switch'}
                    , {field: 'title', title: '权限名称'}
                    , {field: 'name', title: '权限规则'}
                    , {field: 'experience', title: '操作', align: 'center', toolbar: '#toolbar'} //单元格内容水平居中
                ]]
                , parseData: function (res) { //res 即为原始返回的数据
                    return {
                        "code": res.status, //解析接口状态
                        "msg": res.message, //解析提示文本
                        "count": res.total, //解析数据长度
                        "data": res.data //解析数据列表
                    };
                }
                , done: function () {
                    layer.closeAll('loading');
                }
            });
        }
        //刷新表格
        renderTable();
        $("#user-btn").click(function () {
            var keyword = $('#edt-search').val();
            var searchCount = 0;
            $('#test').next('.treeTable').find('.layui-table-body tbody tr td').each(function () {
                $(this).css('background-color', 'transparent');
                var text = $(this).text();
                if (keyword != '' && text.indexOf(keyword) >= 0) {
                    $(this).css('background-color', 'rgba(250,230,160,0.5)');
                    if (searchCount == 0) {
                        treetable.expandAll('#test');
                        $('html,body').stop(true);
                        $('html,body').animate({scrollTop: $(this).offset().top - 150}, 500);
                    }
                    searchCount++;
                }
            });
            if (keyword == '') {
                layer.msg("请输入搜索内容", {icon: 5});
            } else if (searchCount == 0) {
                layer.msg("没有匹配结果", {icon: 5});
            }
        })

        //状态设置
        form.on('switch(status_switch)', function(data) {
            var url = "<?php echo U('Auth/statusrule');?>";
            var id 	=	this.value;
            var change = data.elem.checked;//开关是否开启，true或者false

            if(change) {
                change = 1;
            } else {
                change = 0;
            }

            $.post(url, {id:id,status: change}, function(res) {
                if(res.status == 1) {
                    layer.msg(res.info, {time: 1500});
                } else {
                    layer.msg(res.info, {time: 1500});
                }
            });
        });
        //监听事件
        table.on('toolbar(test)', function(obj){
            switch(obj.event){
                case 'rule_add':
                    layer.open({
                        title:'新增顶级权限',//标题
                        type: 2,//类型
                        shadeClose:true,//是否点击遮罩关闭
                        fixed: true,//固定
                        resize:false,//是否允许拉伸
                        anim: 0,//动画
                        area:['70%','70%'],
                        skin: 1, //加上边框
                        content: 'addchild.html',
                        end: function(index, layero){
                            renderTable();
                        }
                    });
                    break;
                case 'rule_expand':
                    //展开
                    treetable.expandAll('#test');
                    break;
                case 'rule_fold':
                    //收起
                    treetable.foldAll('#test');
                    break;
            };
        });

        //监听事件
        table.on('tool(test)', function(obj){
            var data = obj.data;
            switch(obj.event){
                case 'del':
                    layer.confirm('您确定要删除此权限规则吗？', { icon: 3,skin: 1 }, function (index) {
                        $.post("<?php echo U('delrule');?>", {id:data.id}, function(res) {
                            if(res.status == 1) {
                                layer.msg(res.info, {time:1500},function(){
                                    window.parent.location.reload();//刷新父页面
                                    layer.closeAll();
                                });
                            } else {
                                layer.msg(res.info, {time: 1500});
                            }
                        });
                    });
                    break;
                case 'edit':
                    layer.ready(function(){
                        layer.open({
                            type: 2,
                            title: '编辑权限',
                            shadeClose:true,//是否点击遮罩关闭
                            resize:false,//是否允许拉伸
                            fixed: true,//固定
                            anim: 0,//动画
                            area:['70%','70%'],
                            skin: 1, //加上边框
                            content: ["<?php echo U('editrule');?>?id="+data.id, 'no'],
                            end: function(index, layero){
                                renderTable();
                            }
                        });
                    });
                    break;
                case 'addsub':
                    var id = data.id;
                    layer.ready(function(){
                        layer.open({
                            title:'添加子权限',//标题
                            type: 2,//类型
                            shadeClose:true,//是否点击遮罩关闭
                            fixed: true,//固定
                            resize:false,//是否允许拉伸
                            anim: 0,//动画
                            area:['70%','70%'],
                            skin: 1, //加上边框
                            content: ['addchild.html', 'no'],
                            end: function(index, layero){
                                renderTable();
                            },
                            success: function (layero, index) {
                                var iframe = window['layui-layer-iframe' + index];
                                  iframe.fujipid(id);
                            }
                        });
                    });
                    break;
            };
        });

    });
</script>
    <script type="text/html" id="status_switch">
        <input <?php echo authcheck('statusrule');?> type="checkbox" name="status" value="{{d.id}}" lay-skin="switch" lay-text="启用|停用" lay-filter="status_switch"  {{ d.status == 1 ? 'checked' : '' }}>
    </script>
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <button <?php echo authcheck('addrule');?> class="layui-btn  layuiadmin-btn-list"  lay-event="rule_add" ><i class="layui-icon"></i>新增顶级权限</button>
            <button  class="layui-btn layuiadmin-btn-list"  lay-event="rule_expand" >全部展开</button>
            <button  class="layui-btn layuiadmin-btn-list"  lay-event="rule_fold" >全部折叠</button>
        </div>
    </script>
    <script type="text/html" id="toolbar">
        <a <?php echo authcheck('addrule');?> class="layui-btn layui-btn-xs" lay-event="addsub">添加子权限</a>
        <a <?php echo authcheck('editrule');?> class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a <?php echo authcheck('delrule');?> class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
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