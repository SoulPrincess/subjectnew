<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>应用-留言系统-留言设置</title>
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
                <a><cite>留言系统</cite></a><span lay-separator="">/</span>
                <a><cite>留言设置</cite></a>
            </div>
        </div><div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                    <div class="layui-form-item">
                        <button class="layui-btn">留言信息管理</button>
                        <button class="layui-btn layui-btn-primary op">留言表单设置</button>
                        <button class="layui-btn layui-btn-primary op" id="syssite">留言系统设置</button>

                    </div>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <blockquote class="layui-elem-quote layui-text">
                            <div class="layui-row layui-col-space10 word">
                                <div class="layui-col-md7">
                                    <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                                        <div class="layui-form-item">
                                            <div class="layui-inline">
                                                <div class="layui-input-inline">
                                                    <select name="message_type"  id="message_type" lay-filter="message_dispose">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-col-md5">
                                    <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                                        <div class="layui-form-item">
                                            <div class="layui-inline" >
                                                <label class="layui-form-labelSet">留言信息分类</label>
                                                <div class="layui-input-block">
                                                    <select name="Dispose" id="message_dispose" lay-filter="message_dispose">
                                                        <option value="">请选择状态</option>
                                                        <option value="0">未处理</option>
                                                        <option value="1">已处理</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </blockquote>
                        <table class="layui-hide" id="message_info" lay-filter="message_info">

                        </table>
                    </div>
                    <div class="layui-tab-item ">
                        <table class="layui-hide" id="message_site" lay-filter="message_site">

                        </table>
                    </div>
                    <div class="layui-tab-item layui-form" lay-filter="message_save">
                        <div class="layui-card-body layui-form" pad15="">
                            <div class="layui-form" lay-filter="">
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">留言提交开启关闭</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="message_switch" value="开启" title="开启"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>开启</div></div>
                                        <input type="radio" name="message_switch" value="关闭" title="关闭"><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>关闭</div></div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet">防刷新时间</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="message_time" placeholder="120" autocomplete="off" class="layui-input">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">秒，同一个IP2次提交的最小间隔时间</div>
                                    </div>

                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">敏感字符过滤</label>
                                    <div class="layui-input-blockAre">
                                        <textarea placeholder="请输入内容" class="layui-textarea" name="message_sens"></textarea>
                                        <div class="">多个字符请用"|"隔开</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet"> 留言内容字段</label>
                                        <div class="layui-input-inline">
                                            <select name="message_content_title">
                                                <option value="">留言</option>
                                                <option value="0">美食</option>
                                                <option value="1">新闻</option>
                                                <option value="2">八卦</option>
                                                <option value="3">体育</option>
                                                <option value="4">音乐</option>
                                            </select>
                                            <div class="layui-unselect layui-form-select">
                                                <div class="layui-select-title">
                                                    <input type="text" placeholder="请选择标签" value="" readonly="" class="layui-input layui-unselect">
                                                    <i class="layui-edge"></i>
                                                </div>
                                                <dl class="layui-anim layui-anim-upbit">
                                                    <dd lay-value="" class="layui-select-tips">请选择标签</dd>
                                                    <dd lay-value="0" class="">美食</dd>
                                                    <dd lay-value="1" class="">新闻</dd>
                                                    <dd lay-value="2" class="">八卦</dd>
                                                    <dd lay-value="3" class="">体育</dd>
                                                    <dd lay-value="4" class="">音乐</dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">用于获取用户的留言内容，字段类型必须为”文本“</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">显示方式</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="message_type" value="客户留言后需要在后台回复审核才能显示" title="客户留言后需要在后台回复审核才能显示"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>客户留言后需要在后台回复审核才能显示</div></div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">是否发送邮件</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="message_email_switch" value="是否将客户留言自动发生到指定邮箱" title="是否将客户留言自动发生到指定邮箱"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>是否将客户留言自动发送到指定邮箱</div></div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet">留言邮件接收邮箱</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="message_email" placeholder="" autocomplete="off" class="layui-input">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">多个邮箱请用“|”隔开</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <blockquote class="layui-elem-quote layui-text">
                            邮件回复设置
                        </blockquote>
                        <div class="layui-card-body" pad15="">
                            <div class="layui-form" lay-filter="">
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">邮件回复</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="message_email_back" value="勾选后将自动向提交表单的用户回复邮件" title="勾选后将自动向提交表单的用户回复邮件"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>勾选后将自动向提交表单的用户回复邮件</div></div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet"> Email字段名</label>
                                        <div class="layui-input-inline">
                                            <select name="message_email_url">
                                                <option value="">邮箱地址</option>
                                                <option value="0">美食</option>
                                                <option value="1">新闻</option>
                                                <option value="2">八卦</option>
                                                <option value="3">体育</option>
                                                <option value="4">音乐</option>
                                            </select>
                                            <div class="layui-unselect layui-form-select">
                                                <div class="layui-select-title">
                                                    <input type="text" placeholder="请选择标签" value="" readonly="" class="layui-input layui-unselect">
                                                    <i class="layui-edge"></i>
                                                </div>
                                                <dl class="layui-anim layui-anim-upbit">
                                                    <dd lay-value="" class="layui-select-tips">请选择标签</dd>
                                                    <dd lay-value="0" class="">美食</dd>
                                                    <dd lay-value="1" class="">新闻</dd>
                                                    <dd lay-value="2" class="">八卦</dd>
                                                    <dd lay-value="3" class="">体育</dd>
                                                    <dd lay-value="4" class="">音乐</dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">用于获取用户的邮箱地址，以便回复邮件。字段必须“简短”</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet">回复邮件标题</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="message_email_back_title" placeholder="" autocomplete="off" class="layui-input">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">自动回复邮件的标题</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">回复邮件内容</label>
                                    <div class="layui-input-blockAre">
                                        <textarea placeholder="请输入内容" class="layui-textarea" name="message_email_back_content"></textarea>
                                        <div class="">支持HTML语言</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <blockquote class="layui-elem-quote layui-text">
                            短信回复设置
                        </blockquote>
                        <div class="layui-card-body" pad15="">
                            <div class="layui-form" lay-filter="">
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">短信回复</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="message_note_back_switch" value="勾选后将自动向提交表单的用户回复短信" title="勾选后将自动向提交表单的用户回复短信"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>勾选后将自动向提交表单的用户回复短信</div></div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet"> 联系电话字段名</label>
                                        <div class="layui-input-inline">
                                            <select name="message_note_name">
                                                <option value="">您的姓名</option>
                                                <option value="0">美食</option>
                                                <option value="1">新闻</option>
                                                <option value="2">八卦</option>
                                                <option value="3">体育</option>
                                                <option value="4">音乐</option>
                                            </select>
                                            <div class="layui-unselect layui-form-select">
                                                <div class="layui-select-title">
                                                    <input type="text" placeholder="请选择标签" value="" readonly="" class="layui-input layui-unselect">
                                                    <i class="layui-edge"></i>
                                                </div>
                                                <dl class="layui-anim layui-anim-upbit">
                                                    <dd lay-value="" class="layui-select-tips">请选择标签</dd>
                                                    <dd lay-value="0" class="">美食</dd>
                                                    <dd lay-value="1" class="">新闻</dd>
                                                    <dd lay-value="2" class="">八卦</dd>
                                                    <dd lay-value="3" class="">体育</dd>
                                                    <dd lay-value="4" class="">音乐</dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">用于获取用户的联系电话，以便回复短信。字段类型必须“简短”</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">回复短信内容</label>
                                    <div class="layui-input-blockAre">
                                        <textarea placeholder="请输入内容" class="layui-textarea" name="message_note_content"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item Ontheborder">
                            <div class="layui-input-inline ">
                                <button class="layui-btn" lay-filter="message_save" lay-submit="message_save"> 保存</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>

    <script>
            $(function () {
                get_type();
            });
            function get_type() {
                $.getJSON(
                    "<?php echo U('message/messagetype');?>",
                    function (data) {
                        $("<option></option>").val("0").text("请选择标签").appendTo($("#message_type"));
                        for (var i = 0; i < data.length; i++) {
                            $("<option></option>").val(data[i].id).text(data[i].typename).appendTo($("#message_type"));
                        }
                        layui.use('form', function() {
                            var  form = layui.form;
                            form.render();
                        })
                    });
            }
        $('.layui-form-item>button').click(function () {
            $(this).removeClass('layui-btn-primary').siblings().addClass('layui-btn-primary');
            var _index = $(this).index();
            $('.layui-tab-item').eq(_index).addClass('layui-show').siblings().removeClass('layui-show');
        });
    </script>

    <script>
        layui.use('table', function(){
            var table = layui.table
            ,form   = layui.form;
            table.render({
                elem: '#message_info'
                ,url:"<?php echo U('message/messageinfo');?>"
                ,cellMinWidth: 80
                , toolbar: '#toolbarDemo'
                ,cols: [[
                    {type:'checkbox'}
                    ,{title: '',type:'numbers'}
                    ,{field:'id', title: '留言Id'}
                    ,{field:'typename', title: '留言类型'}
                    ,{field:'companyname', title: '公司名称'}
                    ,{field:'contactname', title: '联系人'}
                    ,{field:'contacttel', title: '电话'}
                    ,{field:'contactemail', title: '邮箱'}
                    ,{field:'messagedate', title: '留言时间'}
                    ,{field:'describe', title: '描述'}
                    ,{field:'dispose', title:'状态',templet: '#status_switch'}
                    ,{field:'city', title: '操作',toolbar:'#barDemo',width:120}
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
            form.on('select(message_dispose)', function(data){
                table.reload('message_info', {
                    where: {
                        message_dispose: $('#message_dispose').val(),
                        message_type: $('#message_type').val(),
                    },
                    page: {
                        curr: 1
                    }
                });
            });
            //状态设置
            form.on('switch(status_switch)', function(data) {
                var url = "<?php echo U('message/messagestatus');?>";
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
            table.on('toolbar(message_info)', function(obj){
                var checkStatus = table.checkStatus(obj.config.id);
                if (obj.event == 'messagedel') {
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
                                "<?php echo U('message/messagedel');?>",
                                { arr: arr },
                                function (data, status) {
                                    if (data.status==1) {
                                        layer.msg(data.info);
                                        //更新数据
                                        table.reload('message_info', {
                                            where: {
                                                adver_name: $('#adver_name').val(),
                                                adver_type: $('#adver_type').val(),
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
            table.on('tool(message_info)', function (obj) {
                var data = obj.data;
                var layEvent = obj.event;
                var tr = obj.tr;
                var arr=new Array(data.id);
                if (layEvent == 'del') {
                    layer.confirm('真的删除吗，此操作不能撤销！', function (index) {
                        //向服务端发送删除指令
                        layui.$.post(
                            "<?php echo U('message/messagedel');?>",
                            { arr: arr },
                            function (data, status) {
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
                        "<?php echo U('message/messagestatus');?>",
                        {
                            id: data.id,
                            off: data.lock
                        },
                        function (data, status) {
                            if (data.status==1) {
                                layer.msg(data.info,{time:1500},function(){
                                    //更新数据
                                    table.reload('message_info', {
                                        where: {
                                            adver_name: $('#adver_name').val(),
                                            adver_type: $('#adver_type').val(),
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
    <script>
        layui.use(['table','form'], function(){
            var table = layui.table
            ,form   = layui.form;
            table.render({
                elem: '#message_site'
                ,url:"<?php echo U('message/messageform');?>"
                ,cellMinWidth: 80
                , toolbar: '#toolbarDemo1'
                ,cols: [[
                    {field: 'id', title: '表单id'}
                    ,{field:'sort', title: '排序',edit: 'text',sort:true,align:'center',width:100}
                    ,{field:'name', title: '名称',edit: 'text',align:'center'}
                    ,{field:'describe', title: '简短描述',edit: 'text',align:'center'}
                    ,{field:'fieldtype', title: '字段类型',templet: '#fieldtype',align:'center',width:200}
                    ,{field:'optiontype', title: '是否必填',templet: '#optiontype',align:'center', unresize: true}
                    ,{field:'city', title: '操作',toolbar:'#barDemo1',width:200,align:'center'}
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

            // 监听下拉列表
            form.on('select(messagename)', function (data) {
                var elem = $(data.elem);
                var trElem = elem.parents('tr');
                var tableData = table.cache['message_site'];
                tableData[trElem.data('index')][elem.attr('name')] = data.value;
                form.render('select')
            });
            //状态设置
            form.on('checkbox(form_switch)', function(data) {
                var url = "<?php echo U('message/messageformfield');?>";
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

            //监听事件
            table.on('toolbar(message_site)', function(obj){
                if (obj.event == 'messageformadd') {
                    layui.$.post(
                        "<?php echo U('message/messageformadd');?>",
                        function (data) {
                            if (data.status==1) {
                                //更新数据
                                table.reload('message_site');
                            }
                            else {
                                layer.msg(data.info);
                            }
                        }
                    )
                }
            });
            table.on('tool(message_site)', function (obj) {console.log(obj.event);
                var data = obj.data;
                var layEvent = obj.event;
                var tr = obj.tr;
                var arr=new Array(data.id);
                if (layEvent == 'del') {
                    layer.confirm('真的删除吗，此操作不能撤销！', function (index) {
                        //向服务端发送删除指令
                        layui.$.post(
                            "<?php echo U('message/messageformdel');?>",
                            { arr: arr },
                            function (data, status) {
                                if (data.status) {
                                    layer.msg(data.info,{time:1500});
                                    obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                    table.reload('message_site', {
                                        page: {
                                            curr: 1
                                        }
                                    });
                                }else {
                                    layer.msg(data.info);
                                }
                            }
                        )
                    });
                }
                if (layEvent === 'stop') {
                    layui.$.post(
                        "<?php echo U('message/messageformstatus');?>",
                        {
                            id: data.id,
                            off: data.lock
                        },
                        function (data, status) {
                            if (data.status==1) {
                                layer.msg(data.info,{time:1500},function(){
                                    //更新数据
                                    table.reload('message_site', {
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
                if (layEvent === 'save') {
                    layui.$.post(
                        "<?php echo U('message/messageformupdate');?>",
                        {
                            sort: data.sort,
                            id: data.id,
                            name: data.name,
                            describe: data.describe,
                            fieldtype: data.fieldtype,
                        },
                        function (data) {
                            if (data.status==1) {
                                layer.msg(data.info,{time:1500},function(){
                                    //更新数据
                                    table.reload('message_site', {
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
        function checktype(that){
            var data=$(that).val();
            var select = 'dd[lay-value=' + data + ']';// 设置value
            $(that).siblings("div.layui-form-select").find('dl').find(select).click();// 查找点击
        }
    </script>
    <script type="text/html" id="fieldtype">
            <select name="fieldtype" lay-filter="messagename"  data-value="{{d.id}}" style="overflow:visible !important;display:block;" onchange="checktype(this)">
                <option value="text" {{ d.fieldtype =='text'?'selected': '' }}>文本</option>
                <option value="select" {{ d.fieldtype =='select'?'selected': '' }}>下拉</option>
                <option value="textarea" {{ d.fieldtype =='textarea'?'selected': '' }}>富文本</option>
                <option value="checkbox" {{ d.fieldtype =='checkbox'?'selected': '' }}>多选</option>
                <option value="radio"{{ d.fieldtype =='radio'?'selected': '' }}>单选</option>
            </select>
    </script>
    <script type="text/html" id="optiontype">
        <input  class="layui-btn-disabled"  type="checkbox" value="{{d.id}}" lay-skin="primary" name="optiontype" lay-filter="form_switch" {{ d.optiontype == 1 ? 'checked' : '' }} >
    </script>
    <script>
        $('.layui-btn-searchSetup').click(function () {
            $(this).addClass('layui-btn-searchSetupBg').siblings().removeClass('layui-btn-searchSetupBg')
            var _index = $(this).index();
            $('.item').eq(_index).addClass('layui-show').siblings().removeClass('layui-show');
        })
    </script>
    <script type="text/html" id="barDemo1">
        <a <?php echo authcheck('messageformupdate');?> class="layui-btn layui-btn-xs" lay-event="save">保存</a>
        {{#  if(d.lock == 0){ }}
        <a <?php echo authcheck('messageformstatus');?> class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">禁用</a>
        <a <?php echo authcheck('messageformdel');?> class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } else { }}
        <a <?php echo authcheck('messageformstatus');?> class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">显示</a>
        <a <?php echo authcheck('messageformdel');?> class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } }}
    </script>
    <script type="text/html" id="toolbarDemo1">
        <div class="layui-btn-container">
            <button <?php echo authcheck('messageformadd');?> class="layui-btn layuiadmin-btn-list" lay-event="messageformadd" data-type="messageformadd">+新增字段</button>
        </div>
    </script>
    <script type="text/html" id="barDemo">
        {{#  if(d.lock == 0){ }}
        <a <?php echo authcheck('messagestatus');?>  class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">禁用</a>
        <a <?php echo authcheck('messagedel');?> class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } else { }}
        <a <?php echo authcheck('messagestatus');?> class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">显示</a>
        <a <?php echo authcheck('messagedel');?> class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } }}
    </script>
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <button <?php echo authcheck('messagedel');?> class="layui-btn layuiadmin-btn-list" lay-event="messagedel" data-type="messagedel">删除</button>
        </div>
    </script>
    <script type="text/html" id="status_switch">
        <input <?php echo authcheck('messagestatus');?>  type="checkbox" name="dispose" value="{{d.id}}" lay-skin="switch" lay-text="已处理|未处理" lay-filter="status_switch"  {{ d.dispose == 1 ? 'checked' : '' }}>
    </script>
    <script>
        layui.use(['form','table'], function(){
            var form = layui.form;
            $('#syssite').on('click', function () {
                $.ajax({
                    url: "<?php echo U('message/messagesys');?>",
                    type: 'get',
                    success: function (data) {
                        var info = data.info;
                        if (data.status == 1) {
                            form.val('message_save', {
                                'message_switch': info.message_switch,
                                'message_content_title': info.message_content_title,
                                'message_email': info.message_email,
                                'message_email_back': info.message_email_back,
                                'message_email_back_content': info.message_email_back_content,
                                'message_email_back_title': info.message_email_back_title,
                                'message_email_switch': info.message_email_switch,
                                'message_email_url': info.message_email_url,
                                'message_name': info.message_name,
                                'message_note_back_switch': info.message_note_back_switch,
                                'message_note_content': info.message_note_content,
                                'message_note_name': info.message_note_name,
                                'message_sens': info.message_sens,
                                'message_time': info.message_time,
                                'message_type': info.message_type,

                            });
                            form.render();
                        }
                    }
                }, 'json');
            });
        });
    </script>
    <script>
        layui.use(['form','table'], function(){
            var form = layui.form
                ,layer = layui.layer
                ,table = layui.table;

            form.render();
            //监听提交
            form.on('submit(message_save)', function(data){
                var url =  "<?php echo U('message/messagesys');?>";
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