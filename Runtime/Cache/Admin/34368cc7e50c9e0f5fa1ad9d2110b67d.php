<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>用户-权限管理-角色管理</title>
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
            <a lay-href="">主页</a><span lay-separator="">/</span>
            <a><cite>用户</cite></a><span lay-separator="">/</span>
            <a><cite>权限管理</cite></a>
            <a><cite>角色管理</cite></a>
        </div>
    </div><div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="layadmin-useradminrole-formlist">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        角色筛选
                    </div>
                    <div class="layui-inline">
                        <select name="rolename" lay-filter="LAY-user-adminrole-type" id="rolename">
                            <option value="">选择角色</option>
                                <?php if(is_array($roles)): $d_key = 0; $__LIST__ = $roles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($d_key % 2 );++$d_key;?><option value="<?php echo ($data['id']); ?>"><?php echo ($data['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn layuiadmin-btn-admin" id="user-btn" lay-submit="" lay-filter="LAY-user-back-search">
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
    layui.use('table', function(){
        var table = layui.table,form   = layui.form;

        table.render({
            elem: '#test'
            ,url:"<?php echo U('auth/listadmins');?>"
            , toolbar: '#toolbarDemo'
            ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
            ,cols: [[
                {type:'checkbox'}
                ,{field:'id', title: 'ID' , align: 'center', sort: true,width:50}
                ,{field:'title', align: 'center', title: '角色名'} //width 支持：数字、百分比和不填写。你还可以通过 minWidth 参数局部定义当前单元格的最小宽度，layui 2.2.1 新增
                ,{field:'rules', title: '拥有权限'}
                ,{field:'status', title:'状态',templet: '#status_switch'}
                ,{field:'experience', title: '操作', align: 'center',toolbar:'#toolbar'} //单元格内容水平居中
            ]]
            ,page: {
                layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
                ,limit:5 //一页显示多少条
                ,limits:[5,10,15,20,25]//每页条数的选择项
                ,groups: 5 //只显示 5 个连续页码
                ,first: "首页" //不显示首页
                ,last: "尾页" //不显示尾页
            }
            ,parseData: function(res){ //res 即为原始返回的数据
                return {
                    "code": res.status, //解析接口状态
                    "msg": res.message, //解析提示文本
                    "count": res.total, //解析数据长度
                    "data": res.data //解析数据列表
                };
            }
        });

        $("#user-btn").click(function () {
            table.reload('test', {
                where: {
                    rolename: $('#rolename').val(),
                },
                page: {
                    curr: 1
                }
            });
        })

        //状态设置
        form.on('switch(status_switch)', function(data) {
            var url = "<?php echo U('auth/statusgroup');?>";
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
        //头工具栏事件
        table.on('toolbar(test)', function (obj) {
            var checkStatus = table.checkStatus(obj.config.id);
            if (obj.event == 'admins_add') {
                layer.open({
                    type: 1
                    ,title:'添加角色'
                    ,content: $('#ddddd')
                    ,area: ['400px','30%']
                    ,btnAlign: 'l'
                    ,skin:'my-skin'
                });
            }
            if (obj.event == 'admins_del') {
                var arr = [];
                var data = checkStatus.data;
                for (var i = 0; i < data.length; i++) {    //循环筛选出id
                    arr.push(data[i].id);
                    layer.alert(data[i].id)
                }
                if (arr.length != 0) {
                    layer.confirm('真的删除吗，此操作不能撤销！', function (index) {
                        //向服务端发送删除指令
                        layer.load();
                        layui.$.post(
                            "<?php echo U('auth/groupdel');?>",
                            { arr: arr },
                            function (data) {
                                if (data.status==1) {
                                    layer.msg(data.info,{time:1500},function(){
                                        //更新数据
                                        table.reload('test', {
                                            where: {
                                                rolename: $('#rolename').val(),
                                            },
                                            page: {
                                                curr: 1
                                            }
                                        });
                                        layer.closeAll();
                                    });
                                }
                                else {
                                    layer.msg(data.info,{time:1500},function(){
                                        layer.closeAll();
                                    });
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
        table.on('tool(test)', function (obj) {
            var data = obj.data;
            var layEvent = obj.event;
            var tr = obj.tr;
            var arr=new Array(data.id);
            if (layEvent == 'edit') {
                layer.open({
                    fixed: true,//固定
                    resize:false,//是否允许拉伸,
                    type: 2,
                    area: ['400px','30%'],
                    title: '编辑角色',
                    content:"<?php echo U('auth/modifygroup');?>"+'?id=' + data.id,
                    end: function () {
                        //更新数据
                        table.reload('test', {
                            where: {
                                rolename: $('#rolename').val(),
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
                    layer.load();
                    //向服务端发送删除指令
                    layui.$.post("<?php echo U('auth/groupdel');?>",{ arr: arr},function (data) {
                        if (data.status==1) {
                            layer.msg(data.info,{time:1500},function(){
                                obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                layer.closeAll();
                            });
                        }
                        else {
                            layer.msg(data.info,{time:1500},function(){
                                layer.closeAll();
                            });
                        }
                    })
                });
            }
            if (layEvent === 'auth') {
                layer.ready(function(){
                    var index =  layer.open({
                        type: 2,
                        shadeClose:true,//是否点击遮罩关闭
                        title: '分配权限',
                        area: ['70%', '70%'],
                        anim: 0,//动画
                        resize:false,//是否允许拉伸
                        skin:1, //加上边框
                        maxmin:true,//最大化
                        content:"<?php echo U('rolegroup');?>?id="+data.id,
                        end: function(index, layero){
                            table.reload('test');
                        }
                    });
                    layer.full(index);
                });

            }
        });

    });
</script>
    <script type="text/html" id="status_switch">
        <input <?php echo authcheck('statusgroup');?> type="checkbox" name="status" value="{{d.id}}" lay-skin="switch" lay-text="启用|停用" lay-filter="status_switch"  {{ d.status == 1 ? 'checked' : '' }}>
    </script>
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <button <?php echo authcheck('groupdel');?> class="layui-btn layuiadmin-btn-list" lay-event="admins_del" data-type="admins_del">删除</button>
            <button <?php echo authcheck('addadmins');?> data-method="notice" id="admins_add" lay-event="admins_add" class="layui-btn" >添加</button>
        </div>
    </script>
    <script type="text/html" id="toolbar">
        <a <?php echo authcheck('rolegroup');?> class="layui-btn layui-btn-xs" lay-event="auth" >分配权限</a>
        <a <?php echo authcheck('modifygroup');?> class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a <?php echo authcheck('groupdel');?> class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>

    <div class="layui-fluid" id="ddddd" style="display: none">
        <div class="layui-card">
            <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                <div class="layui-form-item">
                    <label class="layui-form-label">角色名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="role" lay-verify="required" placeholder="请输入角色名"  class="layui-input" autocomplete="off">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block">
                        <input type="radio" name="status" value="1" title="正常" checked><div class="layui-unselect layui-form-radio " ><i class="layui-anim layui-icon"></i><div>正常</div></div>
                        <input type="radio" name="status" value="0" title="禁用"><div class="layui-unselect layui-form-radio" ><i class="layui-anim layui-icon"></i><div>禁用</div></div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="LAY-user-admin-submit">立即添加</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        layui.use(['layer','form','table'], function(){ //独立版的layer无需执行这一句
            var $ = layui.jquery
                , layer = layui.layer
                ,form = layui.form
                ,table = layui.table;

            form.render();
            //提交
            form.on('submit(LAY-user-admin-submit)', function(obj){
                if (!obj.field.status){
                    layer.msg("请选择状态!");
                    return false;
                }
                layer.load();
                $.ajax({
                    url:"<?php echo U('auth/addadmins');?>",
                    method:'post',
                    data:obj.field,
                    dataType:'JSON',
                    success:function(res){
                        if(res.status=='0'){
                            layer.closeAll();
                            layer.msg(res.info,{time:1500});
                        }else{
                            layer.msg(res.info,{time:1500},function(){
                                window.parent.location.reload();//刷新父页面
                                layer.closeAll();
                            })
                        }
                    },
                    error:function (data) {
                    }
                }) ;
                return false;
            });

        });
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