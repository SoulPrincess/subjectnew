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
<div class="layui-fluid" id="Friend" >
    <div class="layui-card">
        <div class="layui-tab-content">
            <div class="layui-card-body" pad15="">
                <div class="layui-form" lay-filter="link_save">
                    <div class="layui-form-item">
                        <input type="hidden" name="link_id" value="<?php echo ($datainfo['id']); ?>">
                        <div class="layui-inline">
                            <label class="layui-form-label">网站名称</label>
                            <div class="layui-input-inline ">
                                <input type="text" name="link_name" placeholder="请输入" autocomplete="off" class="layui-input" value="<?php echo ($datainfo['blogrollname']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">网站地址</label>
                            <div class="layui-input-inline ">
                                <input type="text" name="link_url" placeholder="http://" autocomplete="off" class="layui-input" value="<?php echo ($datainfo['link']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">同级排序</label>
                            <div class="layui-input-inline raning">
                                <input type="text" name="Sort"  autocomplete="off" lay-verify="number" class="layui-input small" style="width:50px" value="<?php echo ($datainfo['sort']); ?>">
                            </div>
                            <div class="layui-form-mid layui-word-aux">数字越大排序越靠前</div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">创建人</label>
                            <div class="layui-input-inline ">
                                <input type="text" name="User" placeholder="" autocomplete="off" class="layui-input" value="<?php echo session('userInfo.admin_username');?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item Ontheborder">
                        <div class="layui-input-inline ">
                            <button class="layui-btn"  lay-filter="link_save" lay-submit="link_save"> 保存</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    layui.use(['form','table'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,table = layui.table;

        form.render();
        //监听提交
        form.on('submit(link_save)', function(data){
            var url =  "<?php echo U('link/linkupdate');?>";
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