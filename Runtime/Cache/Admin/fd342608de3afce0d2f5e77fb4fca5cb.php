<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册</title>
    <link rel="stylesheet" href="/Public/admin/layui/layui/css/layui.css">
    <link rel="stylesheet" href="/Public/admin/css/login.css">
</head>
<body layadmin-themealias="default" class="layui-layout-body" style="">
<div id="LAY_app" class="layadmin-tabspage-none">
    <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" >
    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2>谷程</h2>
            <p>谷程 官方出品的单页面后台管理模板系统</p>
        </div>
        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-cellphone" for="LAY-user-login-cellphone"></label>
                <input type="text" name="cellphone" id="LAY-user-login-cellphone" lay-verify="phone" placeholder="手机" class="layui-input">
            </div>
            <div class="layui-form-item" style="display:none">
                <div class="layui-row" >
                    <div class="layui-col-xs7">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
                        <input type="text" name="vercode" id="LAY-user-login-vercode" lay-verify="required" placeholder="验证码" class="layui-input">
                    </div>
                    <div class="layui-col-xs5" >
                        <div style="margin-left: 10px;">
                            <button type="button" class="layui-btn layui-btn-primary layui-btn-fluid" id="LAY-user-reg-getsmscode">获取验证码</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                <input type="password" name="password" id="LAY-user-login-password" lay-verify="pass" placeholder="密码" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-repass"></label>
                <input type="password" name="repass" id="LAY-user-login-repass" lay-verify="required" placeholder="确认密码" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-nickname"></label>
                <input type="text" name="nickname" id="LAY-user-login-nickname" lay-verify="nickname" placeholder="昵称" class="layui-input">
            </div>
            <div class="layui-form-item">
                <input type="checkbox" name="agreement" lay-skin="primary" title="同意用户协议" checked=""><div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary"><span>同意用户协议</span><i class="layui-icon layui-icon-ok"></i></div>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="LAY-user-reg-submit">注 册</button>
            </div>
            <div class="layui-trans layui-form-item layadmin-user-login-other">


                <a href="<?php echo U('Index/login');?>" class="layadmin-user-jump-change layadmin-link layui-hide-xs">用已有帐号登入</a>
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
    layui.use('form', function(){
        var $ = layui.$
            ,form = layui.form

        form.render();
        //自定义验证规则
        form.verify({
            password:
                [ /^[\S]{6,12}$/,'密码必须6到12位，且不能出现空格'],
        });
        //发送短信验证码
        // admin.sendAuthCode({
        //     elem: '#LAY-user-reg-getsmscode'
        //     ,elemPhone: '#LAY-user-login-cellphone'
        //     ,elemVercode: '#LAY-user-login-vercode'
        //     ,ajax: {
        //         url: './json/user/sms.js' //实际使用请改成服务端真实接口
        //     }
        // });

        //提交
        form.on('submit(LAY-user-reg-submit)', function(obj){
            var field = obj.field;

            //确认密码
            if(field.password !== field.repass){
                return layer.msg('两次密码输入不一致');
            }

            //是否同意用户协议
            if(!field.agreement){
                return layer.msg('你必须同意用户协议才能注册');
            }

            $.ajax({
                url:"<?php echo U('index/register');?>",
                method:'post',
                data:obj.field,
                dataType:'JSON',
                success:function(res){console.log(res);
                    if(res.status=='0'){
                        layer.msg(res.info,{icon:5},{time:1500})
                    }else{
                        layer.msg(res.info,{time:1500},function(){
                            location.href ="<?php echo U('index/home');?>"; //跳转到登入页
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
</div>

<script>
    layui.config({
        base: '../dist/' //指定 layuiAdmin 项目路径，本地开发用 src，线上用 dist
        ,version: '1.2.1'
    }).use('index');
</script>

<script>
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,laydate = layui.laydate;

        // //日期
        // laydate.render({
        //     elem: '#date'
        // });
        // laydate.render({
        //     elem: '#date1'
        // });

        //创建一个编辑器
        var editIndex = layedit.build('LAY_demo_editor');

        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 5){
                    return '标题至少得5个字符啊';
                }
            }
            ,pass: [
                /^[\S]{6,12}$/
                ,'密码必须6到12位，且不能出现空格'
            ]
            ,content: function(value){
                layedit.sync(editIndex);
            }
        });

        //监听指定开关
        form.on('switch(switchTest)', function(data){
            layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                offset: '6px'
            });
            layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        });

        //监听提交
        form.on('submit(demo1)', function(data){
            layer.alert(JSON.stringify(data.field), {
                title: '最终的提交信息'
            })
            return false;
        });

        //表单初始赋值
        form.val('example', {
            "username": "贤心" // "name": "value"
            ,"password": "123456"
            ,"interest": 1
            ,"like[write]": true //复选框选中状态
            ,"close": true //开关状态
            ,"sex": "女"
            ,"desc": "我爱 layui"
        })


    });
</script>


</body>


</html>