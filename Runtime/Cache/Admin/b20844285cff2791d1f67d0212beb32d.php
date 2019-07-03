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
    <div class="layadmin-tabsbody-item layui-show"><div class="layui-card layadmin-header" style="display: block">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a lay-href="">应用</a><span lay-separator="">/</span>
            <a><cite>产品系统</cite></a><span lay-separator="">/</span>
            <a><cite>产品列表</cite></a>
        </div>
    </div><div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">产品ID</label>
                        <div class="layui-input-inline">
                            <input type="text" name="id" id="product_id" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">产品名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="author" id="product_name" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <!--<div class="layui-inline">-->
                        <!--<label class="layui-form-label">产品说明</label>-->
                        <!--<div class="layui-input-inline">-->
                            <!--<input type="text" name="title" id="product_title" placeholder="请输入" autocomplete="off" class="layui-input">-->
                        <!--</div>-->
                    <!--</div>-->
                    <div class="layui-inline">
                        <label class="layui-form-label">产品标签</label>
                        <div class="layui-input-inline">
                            <select name="product_type" id="product_type" lay-filter='product_type'>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn layuiadmin-btn-list" id="consult_btn" lay-submit="" lay-filter="LAY-app-contlist-search">
                            <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="layui-card-body">

                <table class="layui-hide" id="product_list" lay-filter="product_list"></table>


            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        layui.use('form', function(){
            var form =layui.form;
            function showCategory(data, count) {
                $(data).each(function (i, n) {
                    var t = "";
                    for (var j = 0; j < count; ++j) {
                        t += "&nbsp;&nbsp;&nbsp;";
                    }
                    if (n.children.length > 0) {
                        $("#product_type").append("<option value='" + n.id + "' >" + t + n.typename + "</option>");
                        showCategory(n.children, count + 1)
                    } else {
                        $("#product_type").append("<option value='" + n.id + "'>" + t + n.typename + "</option>");
                    }
                });
                form.render('select');
            }
            $("#product_type").append("<option value=''>请选择分类</option>");
            $(function () {
                get_product_lg();
            });
            function get_product_lg() {
                $.getJSON(
                    "<?php echo U('product/productlg');?>",
                    function (data) {
                        showCategory(data,0);
                        form.render('select');
                    });
            } });
        function hoverOpenImg() {
            var img_show = null; // tips提示
            $('td img').hover(function () {
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
        layui.use('table', function(){
            var table = layui.table;

            table.render({
                elem: '#product_list'
                ,url:"<?php echo U('product/productlist');?>"
                ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
                , toolbar: '#toolbarDemo'
                ,cols: [[
                    {type:'checkbox'}
                    ,{field:'id', title: '产品ID', sort: true}
                    ,{field:'typename', title: '产品标签', templet: '#table_sm'}
                    ,{field:'productname', title: '产品标题'}
                    , { field: 'coverimg', title: '产品图片', align: 'center', templet: '#CoverImg' }
                    ,{field:'productdate', title: '上传时间', sort: true }
                    ,{field:'status', title: '发布状态', align: 'center',templet:function(d){
                            return d.status==0?"否":"是";
                        }} //单元格内容水平居中
                    ,{field:'experience', title: '操作', sort: true, align: 'right',toolbar: '#barDemo'} //单元格内容水平居中
                ]]
                ,page: {
                    layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
                    ,limit:5 //一页显示多少条
                    ,limits:[5,10,15,20,25]//每页条数的选择项
                    ,groups: 5 //只显示 5 个连续页码
                    ,first: "首页" //不显示首页
                    ,last: "尾页" //不显示尾页
                }
                , done: function (res, curr, count) {
                    hoverOpenImg();//显示大图
                    $('table tr').on('click', function () {
                        $('table tr').css('background', '');
                        $(this).css('background', '<%=PropKit.use("config.properties").get("table_color")%>');
                    });
                }
            });
            $("#consult_btn").click(function () {
                table.reload('product_list', {
                    where: {
                        product_id: $('#product_id').val(),
                        product_name: $('#product_name').val(),
                        product_title: $('#product_title').val(),
                        product_type: $('#product_type').val(),
                    },
                    page: {
                        curr: 1
                    }
                });
            })

            //头工具栏事件
            table.on('toolbar(product_list)', function (obj) {
                var checkStatus = table.checkStatus(obj.config.id);
                if (obj.event == 'product_add') {
                    layer.open({
                        type: 2,
                        title: '添加产品',
                        content: "<?php echo U('product/productadd');?>",
                        area: ['80%', '95%'],
                        end: function () {
                            //更新数据
                            table.reload('product_list', {
                                where: {
                                    product_id: $('#product_id').val(),
                                    product_name: $('#product_name').val(),
                                    product_title: $('#product_title').val(),
                                    product_type: $('#product_type').val(),
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
                        arr.push(data[i].id);
                        layer.alert(data[i].id)
                    }
                    if (arr.length != 0) {
                        layer.confirm('真的删除吗，请谨慎处理此操作不能撤销！', function (index) {
                            //向服务端发送删除指令
                            layui.$.post(
                                "<?php echo U('product/productdel');?>",
                                { arr: arr },
                                function (data, status) {
                                    if (data.status==1) {
                                        layer.msg(data.info);
                                        //更新数据
                                        table.reload('product_list', {
                                            where: {
                                                product_id: $('#product_id').val(),
                                                product_name: $('#product_name').val(),
                                                product_title: $('#product_title').val(),
                                                product_type: $('#product_type').val(),
                                            },
                                            page: {
                                                curr: 1
                                            }
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
            table.on('tool(product_list)', function (obj) {
                var data = obj.data;
                var layEvent = obj.event;
                var tr = obj.tr;
                var arr=new Array(data.id);
                if (layEvent == 'edit') {
                    layer.open({
                        type: 2,
                        title: '编辑产品',
                        content:"<?php echo U('product/productupdate');?>?id="+ data.id,
                        area: ['80%', '95%'],
                        end: function () {
                            //更新数据
                            table.reload('product_list', {
                                where: {
                                    product_id: $('#product_id').val(),
                                    product_name: $('#product_name').val(),
                                    product_title: $('#product_title').val(),
                                    product_type: $('#product_type').val(),
                                },
                                page: {
                                    curr: 1
                                }
                            });
                        }
                    })
                }
                if (layEvent == 'del') {
                    layer.confirm('真的删除吗？请谨慎处理此操作不能撤销！', function (index) {
                        //向服务端发送删除指令
                        layui.$.post(
                            "<?php echo U('product/productdel');?>",
                            { arr: arr },
                            function (data) {
                                if (data.status) {
                                    layer.msg(data.info);
                                    obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                    layer.close(index);
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
                        "<?php echo U('product/productstatus');?>",
                        {
                            id: data.id,
                            off: data.lock
                        },
                        function (data, status) {
                            if (data.status==1) {
                                layer.msg(data.info,{time:1500},function(){
                                    //更新数据
                                    table.reload('product_list', {
                                        where: {
                                            product_id: $('#product_id').val(),
                                            product_name: $('#product_name').val(),
                                            product_title: $('#product_title').val(),
                                            product_type: $('#product_type').val(),
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

    <script type="text/html" id="CoverImg">
        <div><img src="{{ d.coverimg === null?"":d.coverimg }}"></div>
    </script>
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <button <?php echo authcheck('productdel');?> class="layui-btn layuiadmin-btn-list" lay-event="batchdel" data-type="batchdel">删除</button>
            <button <?php echo authcheck('productadd');?> data-method="notice" id="product_add" lay-event="product_add" class="layui-btn">添加</button>
        </div>
    </script>
    <script type="text/html" id="table_sm">
        <div>
            <span lay-data="{{d.type_id}}">{{d.typename}}</span>
        </div>
    </script>
    <script type="text/html" id="barDemo">
        {{#  if(d.lock == 0){ }}
        <a  <?php echo authcheck('productupdate');?> class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a <?php echo authcheck('productstatus');?> class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">禁用</a>
        <a <?php echo authcheck('productdel');?> class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } else { }}
        <a <?php echo authcheck('productupdate');?> class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a <?php echo authcheck('productstatus');?> class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">显示</a>
        <a <?php echo authcheck('productdel');?> class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
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