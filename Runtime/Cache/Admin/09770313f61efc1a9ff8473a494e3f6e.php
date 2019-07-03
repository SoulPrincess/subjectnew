<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>谷程后台</title>
    <link rel="stylesheet" href="/Public/admin/layui/layui/css/layui.css">
    <link rel="stylesheet" href="/Public/admin/css/tai.css">
    <link rel="stylesheet" href="/Public/admin/css/popup.css">
    <link rel="stylesheet" href="/Public/admin/css/class.css">

    <script src="/Public/admin/js/echarts.min.js"></script>
    <script src="/Public/admin/js/jquery.min.js"></script>
    <script src="/Public/admin/layui/laydate/laydate.js"></script>
    <script src="/Public/admin/layui/layui/layui.js"></script>

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
                            <a href="<?php echo U('user/user-admin');?>" lay-href="user/administrators/list">后台管理员</a>
                        </dd>
                        <dd data-jump="user/administrators/role" data-name="administrators-rule">
                            <a href="<?php echo U('user/role');?>" lay-href="user/administrators/role">角色管理</a>
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
                            <input type="text" name="loginname" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">手机</label>
                        <div class="layui-input-block">
                            <input type="text" name="telphone" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">邮箱</label>
                        <div class="layui-input-block">
                            <input type="text" name="email" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">角色</label>
                        <div class="layui-input-block">
                            <select name="role">
                                <option value="0">管理员</option>
                                <option value="1">超级管理员</option>
                                <option value="2">纠错员</option>
                                <option value="3">采购员</option>
                                <option value="4">推销员</option>
                                <option value="5">运营人员</option>
                                <option value="6">编辑</option>
                            </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择" value="管理员" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="0" class="layui-this">管理员</dd><dd lay-value="1" class="">超级管理员</dd><dd lay-value="2" class="">纠错员</dd><dd lay-value="3" class="">采购员</dd><dd lay-value="4" class="">推销员</dd><dd lay-value="5" class="">运营人员</dd><dd lay-value="6" class="">编辑</dd></dl></div>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn layuiadmin-btn-admin" lay-submit="" lay-filter="LAY-user-back-search">
                            <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="layui-card-body">
                <div style="padding-bottom: 10px;">
                    <button class="layui-btn layuiadmin-btn-admin" data-type="batchdel">删除</button>
                    <button data-method="notice" id="layerDemo" class="layui-btn">添加</button>
                </div>

                <table class="layui-hide" id="test"></table>

            </div>
        </div>
    </div>

    </div>
</div>
<script>

    layui.use('table', function(){
        var table = layui.table;

        table.render({
            elem: '#test'
            ,url:"<?php echo U('user/user-admin');?>"
            ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
            ,cols: [[
                {type:'checkbox'}
                ,{field:'id', title: 'ID', sort: true}
                ,{field:'username', title: '登录名'} //width 支持：数字、百分比和不填写。你还可以通过 minWidth 参数局部定义当前单元格的最小宽度，layui 2.2.1 新增
                ,{field:'sex', title: '手机', sort: true}
                ,{field:'city', title: '邮箱'}
                ,{field:'type_id', title: '角色'}
                ,{field:'sign', title: '加入时间', sort: true }
                ,{field:'classify', title: '审核状态', align: 'center'} //单元格内容水平居中
                ,{field:'experience', title: '操作', sort: true, align: 'right'} //单元格内容水平居中
            ]],
            even : true,
            page : true, //是否显示分页
            limits : [ 5, 10 ], //控制多少行一页（默认五条一页）
            limit : 5 //每页默认显示的数量
            ,parseData: function(res){ //res 即为原始返回的数据
                console.log(res);
            return {
                "code": res.status, //解析接口状态
                "msg": res.message, //解析提示文本
                "count": res.total, //解析数据长度
                "data": res.data.item //解析数据列表
            };
        }
        });
    });

</script>





<script>
    layui.use(['layer','form'], function(){ //独立版的layer无需执行这一句
        var $ = layui.jquery
            , layer = layui.layer
            ,form = layui.form;

        //触发事件


        $('#layerDemo').on('click', function(){
            layer.open({
                type: 1
                ,title:false //不显示标题栏
                ,closeBtn: true
                ,area: '90%'
                ,content: $('#ddddd')
                ,btnAlign: 'l'
                ,skin:'my-skin'
            });
        });
        form.render();
        //自定义验证规则
        form.verify({
            psw:
                [ /^[\S]{6,12}$/,'密码必须6到12位，且不能出现空格'],
        });
        //提交
        form.on('submit(LAY-user-admin-submit)', function(obj){
            layer.load();
            $.ajax({
                url:"<?php echo U('user/user-admin');?>",
                method:'post',
                data:obj.field,
                dataType:'JSON',
                success:function(res){
                    if(res.status=='0'){
                        layer.closeAll();
                        layer.msg(res.info,{icon:5},{time:1500})
                    }else{
                        layer.closeAll();
                        layer.msg(res.info,{time:1500},function(){
                            // location.href ="<?php echo U('index/home');?>"; //跳转到登入页
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
                    <input type="password" name="password" required lay-verify="psw" placeholder="******" autocomplete="off" class="layui-input">
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
            <div class="layui-form-item">
                <label class="layui-form-label">角色</label>
                <div class="layui-input-block">
                    <select name="role" lay-verify="required">
                        <option value=""></option>
                        <option value="0">管理员</option>
                        <option value="1">超级管理员</option>
                        <option value="2">纠错员</option>
                        <option value="3">采购员</option>
                        <option value="4">推销员</option>
                        <option value="5">运营人员</option>
                        <option value="6">编辑</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">审核状态</label>
                <div class="layui-input-block">
                    <input type="radio" name="lock" value="0" title="禁用" checked><div class="layui-unselect layui-form-radio" ><i class="layui-anim layui-icon"></i><div>禁用</div></div>
                    <input type="radio" name="lock" value="1" title="可用"><div class="layui-unselect layui-form-radio " ><i class="layui-anim layui-icon"></i><div>可用</div></div>
                </div>
            </div>
            <div class="layui-form-item" style="margin-bottom:0px">
                <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="LAY-user-admin-submit">立即添加</button>
            </div>
        </div>
    </div>
</div>
<script>

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
    //         ]]
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