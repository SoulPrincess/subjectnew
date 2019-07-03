<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
    <link rel="stylesheet" href="/Public/admin/layui/layui/css/layui.css">
    <link rel="stylesheet" href="/Public/admin/css/login.css">
    <script src="/Public/admin/js/jquery.min.js"></script>
</head>
<body layadmin-themealias="default" class="layui-layout-body" style="">
<div id="LAY_app" class="layadmin-tabspage-none">
    <script type="text/html" template="">
        <link rel="stylesheet" href="{{ layui.setter.base }}style/login.css?v={{ layui.admin.v }}-1" media="all">
    </script>
    <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;" >
            <div class="layadmin-user-login-main">
                <div class="layadmin-user-login-box layadmin-user-login-header">
                    <h2>谷程登录</h2>
                    <p>谷程 官方出品的单页面后台管理模板系统</p>
                </div>
                <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                    <div class="layui-form-item">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                        <input type="text" name="username" id="LAY-user-login-username" lay-verify="required|title" placeholder="用户名" class="layui-input" value="<?php echo ($username); ?>">
                    </div>
                    <div class="layui-form-item">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                        <input type="password" name="password" id="LAY-user-login-password" lay-verify="required|password" placeholder="密码" class="layui-input">
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-row">
                            <div class="layui-col-xs7">
                                <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
                                <input type="text" name="vercode" id="LAY-user-login-vercode" lay-verify="required|vercode" placeholder="验证码" class="layui-input" maxlength="4" >
                            </div>
                            <div class="layui-col-xs5">
                                <div style="margin-left: 10px;">
                                    <img src="<?php echo U('login/verify');?>" title="看不清，换一张" class="layadmin-user-login-codeimg" id="LAY-user-get-vercode"><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item" style="margin-bottom: 20px;display:none">
                        <input type="checkbox" name="remember" lay-skin="primary" title="记住密码"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>记住密码</span><i class="layui-icon layui-icon-ok"></i></div>
                        <a lay-href="/user/forget" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a>
                    </div>
                    <div class="layui-form-item">
                        <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="LAY-user-login-submit">登 入</button>
                    </div>
                    <div class="layui-trans layui-form-item layadmin-user-login-other">
                        <a href="<?php echo U('login/register');?>" class="layadmin-user-jump-change layadmin-link">注册帐号</a>
                    </div>
                </div>
            </div>
    </div>

    <div class="layui-trans layadmin-user-login-footer">

        <p>© 2018 <a href="http://www.layui.com/" target="_blank">gucheng.com</a></p>
        <p>
            <span><a href="#" target="_blank">获取授权</a></span>
            <span><a href="#" target="_blank">在线演示</a></span>
            <span><a href="#" target="_blank">前往官网</a></span>
        </p>
    </div>

</div>
    <script src="/Public/admin/layui/layui/layui.js"></script>
    <script>
        $(function(){
            $('#LAY-user-get-vercode').click(function(){
                $('#LAY-user-get-vercode').attr('src',"/Admin/Message/verify/random/"+Math.random());//点击事件改变图片地址
            });
        });
    layui.use([ 'form'], function(){
        var form = layui.form;
        form.render();
        //自定义验证规则
        form.verify({
            password:
            [ /^[\S]{6,12}$/,'密码必须6到12位，且不能出现空格']
        });
        //提交
        form.on('submit(LAY-user-login-submit)', function(obj){
            var layerindex = layer.load();
            $.ajax({
                url:"<?php echo U('login/check');?>",
                method:'post',
                data:obj.field,
                dataType:'JSON',
                success:function(res){
                    if(res.status=='0'){
                        layer.msg(res.info,{time:1500},function(){
                            //验证错误，去重新刷新验证码
                            $('#LAY-user-get-vercode').attr('src',"/Admin/Message/verify/random/"+Math.random());
                            layer.close(layerindex);
                        });
                    }else{
                        layer.msg(res.info,{time:1500},function(){
                            //跳转到登入页
                            location.href ="<?php echo U('index/home');?>";
                            layer.close(layerindex);
                        })
                    }
                },
                error:function (data) {
                    layer.msg('网络错误，请稍后再试...',{time:1500});
                }
            }) ;
            return false;
        });
    });
</script>

</body>
</html>