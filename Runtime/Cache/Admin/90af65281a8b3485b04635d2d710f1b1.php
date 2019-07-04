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
            <a lay-href="">主页</a><span lay-separator="">/</span>
            <a><cite>用户</cite></a><span lay-separator="">/</span>
            <a><cite>后台管理员</cite></a>
        </div>
    </div><div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="layadmin-useradmin-formlist">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">登录名</label>
                        <div class="layui-input-block">
                            <input type="text" name="loginname" placeholder="请输入" autocomplete="off" class="layui-input" id="user_loginname">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">手机</label>
                        <div class="layui-input-block">
                            <input type="text" name="telphone" placeholder="请输入" autocomplete="off" class="layui-input" id="user_telphone">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">邮箱</label>
                        <div class="layui-input-block">
                            <input type="text" name="email" placeholder="请输入" autocomplete="off" class="layui-input" id="user_email">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">角色</label>
                        <div class="layui-input-block">
                            <select name="role" id="user_role">
                                <option placeholder="请选择角色"></option>
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["id"]); ?>'><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn layuiadmin-btn-admin" id="user-btn" lay-submit="" lay-filter="LAY-user-back-search">
                            <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="layui-card-body" >

                <table class="layui-hide" id="test" lay-filter="test"></table>

            </div>
        </div>
    </div>

    </div>
</div>
<script>

    layui.use('table', function(){
        var table = layui.table,form = layui.form;
        table.render({
            elem: '#test'
            ,url:"<?php echo U('user/useradmininfo');?>"
            ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
            , toolbar: '#toolbarDemo'
            ,loading:true//加载等待
            ,cols: [[
                {type:'checkbox'}
                ,{field:'id', title: 'ID', sort: true,width:50}
                ,{field:'loginname', title: '登录名'} //width 支持：数字、百分比和不填写。你还可以通过 minWidth 参数局部定义当前单元格的最小宽度，layui 2.2.1 新增
                ,{field:'userphone', title: '手机'}
                ,{field:'useremail', title: '邮箱'}
                ,{field: 'group',templet: function (d) {
                        if (d.group == null) {
                            return '<span style="color: #f00!important;">请设置角色</span>';
                        }else{
                            return d.group;
                        }
                    }, title: '角色名称'
                }
                ,{field:'us_status', title:'状态', templet: '#status_switch' ,width:100}
                ,{field:'userregistrtime', title: '加入时间', sort: true }
                ,{field:'experience', title: '操作', align: 'center',toolbar:'#toolbar',width:200}
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
                    user_loginname: $('#user_loginname').val(),
                    user_telphone: $('#user_telphone').val(),
                    user_email: $('#user_email').val(),
                    user_role: $('#user_role').val()
                },
                page: {
                    curr: 1
                }
            });
        })
        //状态设置
        form.on('switch(status_switch)', function(data) {
            var url = "<?php echo U('user/useradminstatus');?>";
            var userid 	=	this.value;
            var change = data.elem.checked;//开关是否开启，true或者false

            if(change) {
                change = 1;
            } else {
                change = 0;
            }

            $.post(url, {id:userid,status: change}, function(res) {
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
            if (obj.event == 'consult_add') {
                    layer.open({
                        type: 1
                        ,title:'添加后台管理员'
                        // ,closeBtn: true
                        ,area: ['90%','90%']
                        ,content: $('#ddddd')
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
                        layer.load();
                        layui.$.post(
                            "<?php echo U('user/useradmindel');?>",
                            { arr: arr },
                            function (data) {
                                if (data.status==1) {
                                    layer.msg(data.info,{time:1500},function(){
                                        //更新数据
                                        table.reload('test', {
                                            where: {
                                                user_loginname: $('#user_loginname').val(),
                                                user_telphone: $('#user_telphone').val(),
                                                user_email: $('#user_email').val(),
                                                user_role: $('#user_role').val()
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
                    type: 2,
                    title: '编辑后台管理员',
                    content: "<?php echo U('user/useradminedit');?>"+'?id=' + data.id,
                    area: ["90%","90%"],
                    end: function () {
                        //更新数据
                        table.reload('test', {
                            where: {
                                user_loginname: $('#user_loginname').val(),
                                user_telphone: $('#user_telphone').val(),
                                user_email: $('#user_email').val(),
                                user_role: $('#user_role').val()
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
                    layui.$.post("<?php echo U('user/useradmindel');?>",{ arr: arr},function (data) {
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
                    layer.open({
                        type: 2,
                        shadeClose:true,//是否点击遮罩关闭
                        title: '设置角色',
                        area: ['400px', '250px'],
                        anim: 0,//动画
                        resize:false,//是否允许拉伸
                        skin:1, //加上边框
                        content:"<?php echo U('useradmingroup');?>?id="+data.id,
                        end: function(index, layero){
                            table.reload('test');
                        }
                    });
                });
            }
        });
    });

</script>
    <!-- 状态 -->
    <script type="text/html" id="status_switch">
        <input <?php echo authcheck('useradminstatus');?>  class="layui-btn-disabled"  type="checkbox" value="{{d.id}}" lay-skin="switch" lay-text="正常|禁用" lay-filter="status_switch" {{ d.lock == 1 ? 'checked' : '' }} >
    </script>
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <button <?php echo authcheck('useradmindel');?> class="layui-btn layuiadmin-btn-list" lay-event="batchdel" data-type="batchdel">删除</button>
            <button <?php echo authcheck('user/useradmin');?> data-method="notice" id="consult_add" lay-event="consult_add" class="layui-btn">添加</button>
        </div>
    </script>
    <script type="text/html" id="toolbar">
        <button <?php echo authcheck('useradmingroup');?>  class="layui-btn layui-btn-xs" lay-event="auth">设置角色</button>
        <a <?php echo authcheck('useradminedit');?> class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a <?php echo authcheck('useradmindel');?> class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>

<script>
    layui.use(['layer','form','table'], function(){ //独立版的layer无需执行这一句
        var $ = layui.jquery
            , layer = layui.layer
            ,form = layui.form
            ,table = layui.table;

        form.render();
        //提交
        form.on('submit(LAY-user-admin-submit)', function(obj){
            $.ajax({
                url:"<?php echo U('user/useradmin');?>",
                method:'post',
                data:obj.field,
                dataType:'JSON',
                success:function(res){
                    if(res.status=='0'){
                        layer.msg(res.info,{icon:5},{time:1500})
                    }else{
                        layer.msg(res.info,{time:1500},function(){
                            //更新数据
                            table.reload('test', {
                                where: {
                                    user_loginname: $('#user_loginname').val(),
                                    user_telphone: $('#user_telphone').val(),
                                    user_email: $('#user_email').val(),
                                    user_role: $('#user_role').val()
                                },
                                page: {
                                    curr: 1
                                }
                            });
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

<div class="layui-fluid" id="ddddd" style="display: none">
    <div class="layui-card">
        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
            <div class="layui-form-item">
                <label class="layui-form-label">登录名</label>
                <div class="layui-input-block">
                    <input type="text" name="username"   lay-verify="required" placeholder="请输入登录名" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">密码框</label>
                <div class="layui-input-inline">
                    <input type="password" name="password" required lay-verify="psw" placeholder="******" autocomplete="off" class="layui-input" value="123456">
                </div>
                <div class="layui-form-mid layui-word-aux" >(不输入密码，默认是"123456")</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">手机号</label>
                <div class="layui-input-block">
                    <input type="text" name="cellphone"   lay-verify="required|phone" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">邮箱</label>
                <div class="layui-input-block">
                    <input type="text" name="email"   lay-verify="required|email" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item" style="margin:100px auto 0 20px;width:100px">
                <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="LAY-user-admin-submit">立即添加</button>
            </div>
        </div>
    </div>
</div>



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