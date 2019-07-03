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
                                <select id="pro_type" lay-filter="pro_type"></select>
                            </div>
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
    $(function () {
        get_pro();
    });
    function get_pro() {
        $.getJSON(
            "<?php echo U('programa/promove');?>",
            function (data) {
                for (var i = 0; i < data.length; i++) {
                    $("<option></option>").val(data[i].id).text(data[i].name).appendTo($("#pro_type"));
                }
                // $("#pro_type").find("option[value="+"<?php echo ($datainfo['type_id']); ?>"+"]").attr("selected",true);
                layui.use(['form', ], function(){
                    var form = layui.form;
                    form.render();
                });

            });
    }
</script>
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