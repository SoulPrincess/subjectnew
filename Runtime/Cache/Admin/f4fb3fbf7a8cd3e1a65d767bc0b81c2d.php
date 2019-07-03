<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>应用—内容系统—文章列表</title>
    <link href="/Public/admin/layui/layui/css/layui.css" rel="stylesheet" />
    <link href="/Public/admin/css/tai.css" rel="stylesheet" />
    <link href="/Public/admin/css/popup.css" rel="stylesheet" />
    <script src="/Public/admin/js/jquery.min.js"></script>

</head>
<body layadmin-themealias="default">
<div class="layui-fluid" >
    <form class="layui-form" action="">
    <div class="layui-fluid">
    <div class="layui-card">
        <input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>" >
        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
            <div class="layui-form-item">
                <label class="layui-form-label">登录名</label>
                <div class="layui-input-inline">
                    <input type="text" name="username" value="<?php echo ($user['loginname']); ?>" readonly="" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">不可修改。一般用于后台登入名</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">密码框</label>
                <div class="layui-input-inline">
                    <input type="password" name="password"   placeholder="默认不修改密码" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">手机号</label>
                <div class="layui-input-block">
                    <input type="text" name="cellphone"   lay-verify="required|phone" placeholder="请输入手机号" autocomplete="off" class="layui-input" value="<?php echo ($user['userphone']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">邮箱</label>
                <div class="layui-input-block">
                    <input type="text" name="email"   value="<?php echo ($user['useremail']); ?>"  lay-verify="required|email" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item" style="margin-top:20%">
                <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="LAY-user-admin-submit">立即修改</button>
            </div>
        </div>
    </div>
</div>
    </form>
</div>
<script src="/Public/admin/layui/layui/layui.js"></script>
<script>
    layui.use(['layer','form','table'], function(){ //独立版的layer无需执行这一句
        var $ = layui.jquery
            , layer = layui.layer
            ,form = layui.form
        form.render();
        //提交
        form.on('submit(LAY-user-admin-submit)', function(obj){
            layer.load();
            $.ajax({
                url:"<?php echo U('user/useradminedit');?>",
                method:'post',
                data:obj.field,
                dataType:'JSON',
                success:function(res){
                    if(res.status=='0'){
                        layer.msg(res.info,{time:1500},function(){
                            window.parent.location.reload();//刷新父页面
                            layer.closeAll();
                        });

                    }else{
                        layer.msg(res.info,{time:1500},function(){
                            window.parent.location.reload();//刷新父页面
                            parent.layer.close(obj);//关闭当前的弹窗
                        });
                    }
                },
                error:function (data) {
                    layer.msg('请求异常，请稍后再试！',{time:1500},function(){
                        window.parent.location.reload();//刷新父页面
                        layer.closeAll();
                    });
                }
            }) ;
            return false;
        });

    });
</script>