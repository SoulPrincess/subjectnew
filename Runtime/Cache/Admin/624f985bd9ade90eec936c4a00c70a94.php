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
<div class="layui-card"id="Senior_section" >
    <div class="layui-tab-content">
        <form action="<?php echo U('advertising/adverupdate');?>" class="layui-form">
        <div class="layui-tab-item item layui-show">
            <div class="layui-card-body" pad15="">
                <div class="layui-form" lay-filter="">
                    <div class="layui-form-item">
                        <input type="hidden" name="adver_id" value="<?php echo ($datainfo['id']); ?>">
                        <div class="layui-inline">
                            <label class="layui-form-labelStatic">广告名称</label>
                            <div class="layui-input-inline ">
                                <input type="text" name="adver_name"  placeholder="请输入……" autocomplete="off" class="layui-input" value="<?php echo ($datainfo['adevername']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-labelStatic">广告位置</label>
                            <div class="layui-input-inline">
                                <select name="adver_type" id="adver_type_add" >

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-labelStatic">排序</label>
                            <div class="layui-input-inline ">
                                <input type="text" name="Sort" placeholder="0" autocomplete="off" class="layui-input" style="width:50px" value="<?php echo ($datainfo['sort']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-labelStatic">广告链接</label>
                            <div class="layui-input-inline ">
                                <input type="text" name="adver_link" placeholder="http://" autocomplete="off" class="layui-input" value="<?php echo ($datainfo['link']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <!--<label class="layui-form-labelStatic">广告图片</label>-->
                            <div class="layui-input-inline ">
                                <input type="text" name="adver_img" placeholder="http://" autocomplete="off" class="layui-input" id="LAY_avatarUpload_url" value="<?php echo ($datainfo['adeverimg']); ?>">
                            </div>
                            <div class="layui-input-inline layui-btn-container">
                                <button type="button" class="layui-btn layui-btn-primary" id="LAY_avatarUpload">
                                    <i class="layui-icon"></i>上传广告图片
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-form-item Ontheborder">
                <div class="layui-input-inline ">
                    <button class="layui-btn"  lay-filter="adver_save1" lay-submit="adver_save1"> 保存</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<script src="/Public/admin/layui/layui/layui.js"></script>
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
            "<?php echo U('advertising/advertype');?>",
            function (data) {
                // $("<option></option>").val("0").text("请选择标签").appendTo($("#adver_type"));
                for (var i = 0; i < data.length; i++) {
                    $("<option></option>").val(data[i].id).text(data[i].typename).appendTo($("#adver_type_add"));
                }
                $("#adver_type_add").find("option[value="+"<?php echo ($datainfo['type_id']); ?>"+"]").attr("selected",true);
                form_temp.render();
            });
    }
</script>
<script>
    $(function () {
        layui.use('upload', function () {
            var $ = layui.jquery
                , upload = layui.upload;

            //普通图片上传
            var uploadInst = upload.render({
                elem: '#LAY_avatarUpload'
                , url: "<?php echo U('user/upload?name=advertising');?>"
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('#LAY_avatarUpload_url').val(result); //图片链接（base64）
                    });
                }
                , done: function (res) {
                    //如果上传失败
                    if (res.status == 0) {
                        return layer.msg('上传失败');
                    }
                    else {
                        $('#LAY_avatarUpload_url').val("/" + res.data.src);
                        return layer.msg('上传成功');
                    }
                    //上传成功
                }
                , error: function () {
                    layer.msg('上传异常,请重试');
                }
            });
        });
    })
</script>
<script>
    layui.use(['form','table'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,table = layui.table;

        form.render();
        //监听提交
        form.on('submit(adver_save1)', function(data){
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