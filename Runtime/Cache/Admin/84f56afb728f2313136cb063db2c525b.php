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
    
    <!-- 主体内容 -->
    <div class="layui-body" id="LAY_app_body">
        <div class="layadmin-tabsbody-item layui-show"><div class="layui-card layadmin-header">
            <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
                <a lay-href="">主页</a><span lay-separator="">/</span>
                <a><cite>设置</cite></a><span lay-separator="">/</span>
                <a><cite>我的资料</cite></a>
            </div>
        </div><div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">设置我的资料</div>
                        <div class="layui-card-body" pad15="">

                            <div class="layui-form" lay-filter="">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">我的角色</label>
                                    <div class="layui-input-inline">
                                        <select name="role" id="user_type" >

                                        </select>
                                    </div>
                                    <div class="layui-form-mid layui-word-aux">当前角色不可更改为其它角色</div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">用户名</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="username" value="<?php echo ($userinfo['loginname']); ?>" readonly="" class="layui-input">
                                    </div>
                                    <div class="layui-form-mid layui-word-aux">不可修改。一般用于后台登入名</div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">昵称</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="nickname" value="<?php echo ($userinfo['userrealname']); ?>" lay-verify="nickname" autocomplete="off" placeholder="请输入昵称" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">性别</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="sex" value="男"  title="男" <?php echo ($userinfo['usersex']=='男'?checked:''); ?>><div class="layui-unselect layui-form-radio" ><i class="layui-anim layui-icon"></i><div>男</div></div>
                                        <input type="radio" name="sex" value="女" title="女" <?php echo ($userinfo['usersex']=='女'?checked:''); ?>><div class="layui-unselect layui-form-radio " ><i class="layui-anim layui-icon"></i><div>女</div></div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">头像</label>
                                    <div class="layui-input-inline">
                                        <input name="avatar" lay-verify="required" id="LAY_avatarSrc" placeholder="图片地址" value="<?php echo ($userinfo['userportrait']); ?>" class="layui-input">
                                    </div>
                                    <div class="layui-input-inline layui-btn-container" style="width: auto;">
                                        <button type="button" class="layui-btn layui-btn-primary" id="LAY_avatarUpload">
                                            <i class="layui-icon"></i>上传图片
                                        </button><input class="layui-upload-file" type="file" accept="undefined" name="file">
                                        <button class="layui-btn layui-btn-primary" layadmin-event="avartatPreview" onclick="avartatPreview()">查看图片</button>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">手机</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="cellphone" value="<?php echo ($userinfo['userphone']); ?>" lay-verify="phone" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">邮箱</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="email" value="<?php echo ($userinfo['useremail']); ?>" lay-verify="email" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">地址</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="address" value="<?php echo ($userinfo['useraddress']); ?>"  autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button class="layui-btn" lay-submit="" lay-filter="setmyinfo">确认修改</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- 辅助元素，一般用于移动设备下遮罩 -->
    <div class="layadmin-body-shade" layadmin-event="shade"></div>

</div>
    <script type="text/javascript">
        var form_temp = "", form_table = "";
        layui.use(['form'], function () {
            form_temp = layui.form;

        });
        $(function () {
            get_type();
        });
        function get_type() {
            $.getJSON(
                "<?php echo U('user/usertype');?>",
                function (data) {
                    $("<option></option>").val("0").text("请选择标签").appendTo($("#user_type"));
                    for (var i = 0; i < data.length; i++) {
                        $("<option></option>").val(data[i].id).text(data[i].title).appendTo($("#user_type"));
                    }
                    $("#user_type").find("option[value="+"<?php echo ($userinfo['type_id']); ?>"+"]").attr("selected",true);
                    $("#user_type").find("option[value!="+"<?php echo ($userinfo['type_id']); ?>"+"]").attr("disabled",true);
                    layui.use(['form'], function () {
                        form_temp = layui.form;
                        form_temp.render();
                    });
                });
        }
    </script>
<script>
    layui.use(['form', 'upload','layer'], function(){
        var form = layui.form
            ,upload = layui.upload
            , layer = layui.layer;
        form.render();

        //指定允许上传的文件类型
        upload.render({
            elem: '#LAY_avatarUpload'
            ,url: "<?php echo U('user/upload?name=userpic');?>"
            ,size: 120 //限制文件大小，单位 KB
            ,accept: 'file' //普通文件
            ,auto:true
            ,exts: 'jpg|jpeg|png|gif'
            ,before: function(obj){
                layer.load(); //上传loading
            }
            ,done: function(res){
                if(res.code >0){
                    layer.closeAll('loading');
                    layer.msg('上传失败');
                }else{
                    layer.closeAll('loading');
                    layer.msg("上传成功");
                    $("#LAY_avatarSrc").val(res.data.src);
                }
            }
            ,error: function(index, upload){
                layer.closeAll('loading'); //关闭loading
            }
        });

        //提交
        form.on('submit(setmyinfo)', function(obj){
            $.ajax({
                url:"<?php echo U('user/information');?>",
                method:'post',
                data:obj.field,
                dataType:'JSON',
                success:function(res){
                    if(res.status=='0'){
                        layer.msg(res.msg,{icon:5},{time:1500})
                    }else{
                        layer.msg(res.msg,{time:1500},function(){
                            window.location.reload();
                        })
                    }
                },
                error:function (data){
                }
            }) ;
            return false;
        });
    });
    /*查看图片*/
    function avartatPreview(){
        var url =  $("#LAY_avatarSrc").val();console.log(url);
        var img = new Image();
        img.src = url;
        var height = img.height +50; //获取图片高度
        var width = img.width; //获取图片宽度
        var img_infor = "<img src='" + url + "' />";
        layer.open({
            type: 1,
            closeBtn: 1,
            shade: false,
            title: false,
            shadeClose: false,
            // area:['auto','auto'],
            area: [width + 'px', height+'px'],    
            content: img_infor
        });
    };
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