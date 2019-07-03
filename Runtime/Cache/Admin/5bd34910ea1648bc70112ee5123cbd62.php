<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="/Public/admin/layui/layui/css/layui.css" rel="stylesheet" />
    <link href="/Public/admin/css/tai.css" rel="stylesheet" />
    <link href="/Public/admin/css/popup.css" rel="stylesheet" />
    <script src="/Public/admin/js/jquery.min.js"></script>
    <script src="/Public/admin/layui/layui/layui.js"></script>
</head>
<body>
<div class="layui-fluid" style="display:block">
    <form class="layui-form" action="">
        <div class="layui-card">
            <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">原文本</label>
                        <div class="layui-input-inline ccc">
                            <input type="text" name="oldtext" id="name" placeholder="请输入" autocomplete="off" class="layui-input" lay-verify="required">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">替换的内容</label>
                        <div class="layui-input-inline ccc">
                            <input type="text" name="newtext"  placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-inline ccc">
                            <input type="text" name="title" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">链接地址</label>
                        <div class="layui-input-inline ccc">
                            <input type="text" name="Chained"  placeholder="http://" autocomplete="off" class="layui-input" lay-verify="required">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item Ontheborder">
                    <div class="layui-input-inline ">
                        <button class="layui-btn"  lay-filter="service_save" lay-submit="service_save"> 保存</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>

<script>
        layui.use('form', function () {
            var form = layui.form
                ,layer = layui.layer;
            form.on('submit(service_save)', function (data) {
                //表单数据formData
                var formData = data.field;
                $.ajax({
                    url: "<?php echo U('marketing/anchoradd');?>",
                    data: formData,
                    type: 'post',
                    success: function (data) {
                        if (data.status==1) {
                            layer.msg(data.info,{time:1500},function () {
                                window.parent.location.reload();//刷新父页面
                                layer.closeAll();
                            });
                        }
                        else {
                            layer.msg(data.info)
                        }
                    }
                },'json')
                //阻止表单跳转
                return false;
            });
        });


</script>