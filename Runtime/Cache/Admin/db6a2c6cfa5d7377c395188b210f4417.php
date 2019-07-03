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
<div class="layui-card"id="Senior_Location" >
    <div class="layui-tab-content">
        <div class="layui-tab-item item layui-show">
            <blockquote class="layui-elem-quote layui-text">
                编辑广告位
            </blockquote>
            <form  class="layui-form" >
                <div class="layui-card-body" pad15="">
                    <div class="layui-form" lay-filter="">
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <input type="hidden" name="typeid" value="<?php echo ($datainfo['id']); ?>">
                                <label class="layui-form-labelStatic">广告位名称</label>
                                <div class="layui-input-inline ">
                                    <input type="text" name="typename" lay-verify="required" placeholder="请输入……" autocomplete="off" class="layui-input" value="<?php echo ($datainfo['typename']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-labelStatic">广告位宽度</label>
                                <div class="layui-input-inline ">
                                    <input type="text" name="type_width" lay-verify="number" placeholder="" autocomplete="off" class="layui-input" value="<?php echo ($datainfo['width']); ?>">
                                </div>
                                <div class="layui-form-mid layui-word-aux">PX</div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-labelStatic">广告位高度</label>
                                <div class="layui-input-inline ">
                                    <input type="text" name="type_height" lay-verify="number" placeholder="" autocomplete="off" class="layui-input" value="<?php echo ($datainfo['height']); ?>">
                                </div>
                                <div class="layui-form-mid layui-word-aux">PX</div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-labelStatic">描述</label>
                            <div class="layui-input-block">
                                <textarea placeholder="请输入内容" class="layui-textarea" name="Describe"><?php echo ($datainfo['describe']); ?></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item Ontheborder">

                            <div class="layui-input-inline ">
                                <button class="layui-btn" lay-filter="addsite" lay-submit="addsite"> 保存</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/Public/admin/layui/layui/layui.js"></script>


<script>
    layui.use(['form','table'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,table = layui.table;

        form.render();
        //监听提交
        form.on('submit(addsite)', function(data){
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
</script>

</html>