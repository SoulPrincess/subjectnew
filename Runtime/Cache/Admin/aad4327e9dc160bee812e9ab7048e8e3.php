<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="/Public/admin/layui/layui/css/layui.css" rel="stylesheet" />
    <link href="/Public/admin/css/tai.css" rel="stylesheet" />
    <link href="/Public/admin/css/popup.css" rel="stylesheet" />
    <script src="/Public/admin/js/jquery.min.js"></script>

</head>
<div>
    <form class="layui-form"  action="<?php echo U('content/addmanagement');?>">
        <div class="layui-form-item" style="width:90%">
            <input type="hidden"  value="" name="pid" id="pid" />
            <label class="layui-form-label">分类名称</label>
            <div class="layui-input-block">
                <input type="text" autocomplete="off" placeholder="分类名称"  lay-verify="required" class="layui-input" name="LgName" >
            </div>
        </div>
        <div class="layui-form-item" style="width:90%"  >
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <input type="text" placeholder="描述"   autocomplete="off" class="layui-input" name="Describe">
            </div>
        </div>
        <div class="larryms-layer-btn" style="margin-left:50px">
            <button class="layui-btn layui-btn " lay-submit="addRule" lay-filter="addRule"style="width:80%" >立即添加</button>
        </div>
    </form>
</div>
<script src="/Public/admin/layui/layui/layui.js"></script>
<script>
    layui.use(['form', ], function(){
        var form = layui.form
            ,layer = layui.layer;

        //监听提交
        form.on('submit(addRule)', function(data){

            var url =  data.form.action;
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

    //接收父窗口传过来的参数
    function pid(obj){
        $('#pid').val(obj);console.log($('#pid').val());
    }

</script>
</body>
</html>