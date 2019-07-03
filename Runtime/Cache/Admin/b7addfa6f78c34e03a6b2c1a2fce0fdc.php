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
<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-tab-content">
            <div class="layui-card-body" pad15="">
                <div class="layui-form" lay-filter="pro_save">
                    <div class="layui-form-item" >
                        <input type="hidden"  value="" name="pid" id="pid" />
                        <div class="layui-inline">
                            <label class="layui-form-label">栏目名称</label>
                            <div class="layui-input-block">
                                <input type="text" autocomplete="off" placeholder="栏目名称"  lay-verify="required" class="layui-input" name="pro_name" >
                        </div>
                        </div>
                    </div>
                    <div class="layui-form-item" >
                        <div class="layui-inline">
                            <label class="layui-form-label">栏目地址</label>
                            <div class="layui-input-block">
                                <input type="text" autocomplete="off" placeholder="index/index"  lay-verify="required" class="layui-input" name="pro_url" >
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">同级排序</label>
                            <div class="layui-input-inline raning">
                                <input type="text" name="Sort" value="0" autocomplete="off" lay-verify="number" class="layui-input small" style="width:50px">
                            </div>
                            <div class="layui-form-mid layui-word-aux">数字越大排序越靠前</div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">标识</label>
                            <div class="layui-input-inline raning">
                                <input type="text" name="Sign" value="0" autocomplete="off" lay-verify="number" class="layui-input small" style="width:50px">
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item" >
                        <div class="layui-inline">
                            <label class="layui-form-label">栏目描述</label>
                            <div class="layui-input-block">
                                <input type="text" autocomplete="off" placeholder="栏目描述"   class="layui-input" name="Describe" >
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item Ontheborder">
                        <div class="layui-input-inline ">
                            <button class="layui-btn"  lay-filter="pro_save" lay-submit="pro_save"> 保存</button>
                        </div>
                    </div>
</div>
            </div>
        </div>
    </div>
</div>

<script src="/Public/admin/layui/layui/layui.js"></script>
<script>
    layui.use(['form', ], function(){
        var form = layui.form
            ,layer = layui.layer;

        //监听提交
        form.on('submit(pro_save)', function(data){

            var url =  "<?php echo U('programa/proadd');?>";
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