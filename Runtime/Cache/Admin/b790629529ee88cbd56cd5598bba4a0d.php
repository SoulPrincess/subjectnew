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
        <div class="layadmin-tabsbody-item layui-show">
            <div class="layui-card layadmin-header">
                <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
                    <a lay-href="">设置</a><span lay-separator="">/</span>
                    <a><cite>栏目设置</cite></a><span lay-separator="">/</span>
                    <a><cite>栏目管理</cite></a>
                </div>
            </div>
            <div class="layui-fluid">
                <div class="layui-card">
                    <div class="layui-tab-content">
                        <div class="layui-tab-item advk layui-show">
                            <div class="layui-card-header layuiadmin-card-header-auto">
                                <button <?php echo authcheck('proadd');?> class="layui-btn layuiadmin-btn-tags" id="btn-add">添加一级栏目</button>
                                <div class="layui-btn-group">
                                    <button class="layui-btn" id="btn-expand">全部展开</button>
                                    <button class="layui-btn" id="btn-fold">全部折叠</button>
                                    <button class="layui-btn" id="btn-refresh">刷新表格</button>
                                </div>
                            </div>
                            <table class="layui-hide" id="pro_list" lay-filter="pro_list"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 辅助元素，一般用于移动设备下遮罩 -->
        <div class="layadmin-body-shade" layadmin-event="shade"></div>

    </div>
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
                treetable.render({
                    treeColIndex: 1,
                    treeSpid:0,
                    url:"<?php echo U('programa/programainfo');?>",
                    treeIdName: 'id',
                    treePidName: 'pid',
                    treeDefaultClose: false,
                    treeLinkage: true,
                    elem: '#pro_list',
                    page: false,
                    cols: [[
                        { type: 'numbers' },
                        { field: 'c_id', title: '分类Id', align: 'center' },
                        { field: 'name', title: '栏目名称', edit: 'text', align: 'left' },
                        { field: 'url', title: '栏目url', edit: 'text', align: 'center' },
                        { field: 'sort', title: '排序', edit: 'text', align: 'center',sort: true,},
                        { field: 'sign', title: '标识', edit: 'text', align: 'center' },
                        { field: 'describe', title: '描述', edit: 'text', align: 'center' },
                        { templet: '#barDemo', title: '操作', align: 'right' ,width:250}
                    ]],
                    done: function () {
                        layer.closeAll('loading');
                    }
                });
            };

            renderTable();

            $('#btn-expand').click(function () {
                treetable.expandAll('#pro_list');
            });

            $('#btn-fold').click(function () {
                treetable.foldAll('#pro_list');
            });

            $('#btn-refresh').click(function () {
                renderTable();
            });
            $('#btn-add').click(function () {
                //向服务端发送添加指令
                layer.open({
                    title:'新增一级权限',//标题
                    type: 2,//类型
                    shadeClose:true,//是否点击遮罩关闭
                    fixed: true,//固定
                    resize:false,//是否允许拉伸
                    anim: 0,//动画
                    area: ['80%', '80%'],
                    skin: 1, //加上边框
                    content: ['proadd.html', 'no'],
                    end: function(index, layero){
                        renderTable();
                    }
                });
            })
            //监听工具条
            table.on('tool(pro_list)', function (obj) {
                var data = obj.data;
                var value = obj.value //得到修改后的值
                    , field = obj.field; //得到字段
                var layEvent = obj.event;

                if (layEvent === 'del') {
                    layer.confirm('你确定删除数据吗？此操作不能撤销！', function (index) {
                        //向服务端发送删除指令
                        layui.$.post(
                            "<?php echo U('programa/prodel');?>",
                            {
                                p_id: data.c_id,
                                f_id: data.pid
                            },
                            function (data) {
                                if (data.status) {
                                    layer.msg(data.info);
                                    obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                    renderTable();
                                    layer.close(index);
                                }
                                else {
                                    layer.msg(data.info);
                                }
                            }
                        )
                    });
                }
                else if (layEvent === 'save') {
                    layui.$.post(
                        "<?php echo U('programa/proupdate');?>",
                        {
                            p_id: data.c_id,
                            f_id: data.pid,
                            Name: data.name,
                            Sort: data.sort,
                            Sign: data.sign,
                            Url: data.url,
                            Describe: data.describe
                        },
                        function (data) {
                            if (data.status==1) {
                                layer.msg(data.info);
                                renderTable();
                                layer.close(index);
                            }
                            else {
                                layer.msg(data.info);
                            }
                        }
                    )
                }
                else if (layEvent === 'add') {
                    var id = data.id;
                    layer.ready(function(){
                        layer.open({
                            title:'添加子栏目',//标题
                            type: 2,//类型
                            area: ['80%', '80%'],
                            shadeClose:true,//是否点击遮罩关闭
                            fixed: true,//固定
                            resize:false,//是否允许拉伸
                            anim: 0,//动画
                            skin: 1, //加上边框
                            content: ['proadd.html', 'no'],
                            end: function(index, layero){
                                renderTable();
                            },
                            success: function (layero, index) {
                                //传参给新增窗口
                                var iframe = window['layui-layer-iframe' + index];
                                iframe.pid(id)
                            }
                        });
                    });
                }
                else if (layEvent === 'stop'){
                    layui.$.post(
                        "<?php echo U('programa/prostatus');?>",
                        {
                            p_id: data.c_id,
                            f_id: data.pid,
                            off: data.display
                        },
                        function (data) {
                            if (data.status==1) {
                                layer.msg(data.info);
                                obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                renderTable();
                            }
                            else {
                                layer.msg(data.info);
                            }
                        }
                    )
                }else if (layEvent === 'move'){
                    var p_value = "";
                        layer.open({
                            title:'移至',//标题
                            type: 1,//类型
                            area: ['20%', '30%'],
                            btn:['确定','取消'],
                            closeBtn:2,
                            anim: 0,//动画
                            skin: 1, //加上边框
                            content:"<div class='layui-form' style='width:50%;margin:0 auto'><select lay-filter='programa_tag' id='programa_tag' name='programa_tag'></select></div>",
                            success: function (layero, index) {
                                layui.use('form', function () {
                                    var form = layui.form;
                                    form.on('select(programa_tag)', function (data) {
                                        p_value = data.value;
                                    });
                                });
                            },
                            yes: function (index, layero) {
                                if (p_value != "") {
                                    layui.$.post(
                                        "<?php echo U('programa/promove');?>",
                                        {
                                            p_id: data.c_id,
                                            f_id: p_value
                                        },
                                        function (data, status) {
                                            if (data.status==1) {
                                                layer.msg(data.info,{time:1500},function(){
                                                    layer.close(index);
                                                    renderTable();
                                                });
                                            }
                                            else {
                                                layer.msg(data.info,{time:1500});
                                            }
                                        }
                                    )
                                } else {
                                    layer.msg("请先选择栏目");
                                }
                            },
                        });
                        get_programa(data.pid);
                }
            });
        });
        function get_programa(p_id) {
            layui.use('form', function () {
                var form_temp = layui.form;
                $("#programa_tag").empty();
                $.getJSON(
                    "<?php echo U('programa/promove');?>",
                    function (data) {
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].id === p_id) {
                                $("<option selected></option>").val(data[i].id).text(data[i].name).appendTo($("#programa_tag"));
                            } else {
                                $("<option></option>").val(data[i].id).text(data[i].name).appendTo($("#programa_tag"));
                            }
                            form_temp.render();
                        }
                    });
            });
        }


    </script>
    <script type="text/html" id="barDemo">
        {{#  if(d.pid == 0){ }}
        <a <?php echo authcheck('proadd');?> class="layui-btn layui-btn-xs" lay-event="add">添加子栏目</a>
        <a <?php echo authcheck('proupdate');?> class="layui-btn layui-btn-xs" lay-event="save">保存</a>
        {{#  if(d.lock == 0){ }}
        <a <?php echo authcheck('prostatus');?> class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">禁用</a>
        {{#  } else { }}
        <a <?php echo authcheck('prostatus');?> class="layui-btn  layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">显示</a>
        {{#  } }}
        <a <?php echo authcheck('prodel');?> class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } else { }}
        <a <?php echo authcheck('promove');?> class="layui-btn layui-btn-xs" lay-event="move">移至</a>
        <a <?php echo authcheck('proupdate');?> class="layui-btn layui-btn-xs" lay-event="save">保存</a>
        {{#  if(d.lock == 0){ }}
        <a <?php echo authcheck('prostatus');?> class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">禁用</a>
        {{#  } else { }}
        <a <?php echo authcheck('prostatus');?> class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">显示</a>
        {{#  } }}
        <a <?php echo authcheck('prodel');?> class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
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