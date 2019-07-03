<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="/Public/admin/layui/layui/css/layui.css" rel="stylesheet" />
        <link href="/Public/admin/css/tai.css" rel="stylesheet" />
        <link href="/Public/admin/css/popup.css" rel="stylesheet" />
        <script src="/Public/admin/js/jquery.min.js"></script>
    </head>
    <body>
        <div  class="layui-col-xs10">
            <form class="layui-form"  action="<?php echo U('editrule');?>" style="margin:100px 100px 100px 100px;width:80%">

                <input type="hidden"  value="<?php echo ($info["id"]); ?>" name="id" />
                <div class="layui-form-item">
                    <label class="layui-form-label">权限名称</label>
                    <div class="layui-input-block">
                        <input type="text" autocomplete="off" placeholder="权限名称"  lay-verify="required" class="layui-input" name="title" value="<?php echo ($info["title"]); ?>" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">节点地址</label>
                    <div class="layui-input-block">
                        <input type="text" autocomplete="off" placeholder="节点地址"  lay-verify="required" class="layui-input" name="name" value="<?php echo ($info["name"]); ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">是否是菜单</label>
                    <div class="layui-input-block">
                        <input type="radio" name="ismenu" id="Recommend" value="1"  title="左侧菜单" <?php echo ($info['ismenu']==1?'checked':''); ?>><div class="layui-unselect layui-form-radio" ><i class="layui-anim layui-icon"></i><div>是</div></div>
                        <input type="radio" name="ismenu" value="2" title="快捷导航" <?php echo ($info['ismenu']==2?'checked':''); ?>><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>否</div></div>
                        <input type="radio" name="ismenu" value="0" title="否" <?php echo ($info['ismenu']==0?'checked':''); ?>><div class="layui-unselect layui-form-radio " ><i class="layui-anim layui-icon"></i><div>否</div></div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-block ">
                            <input type="text" name="Sort" placeholder="0" autocomplete="off" class="layui-input" style="width:50px" value="<?php echo ($info['sort']); ?>">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item" style="margin-top:100px ">
                    <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="LAY-user-admin-submit">立即添加</button>
                </div>
            </form>
        </div>
        <script src="/Public/admin/layui/layui/layui.js"></script>
        <script>
        layui.use(['form','layer'], function(){
          var form = layui.form
             ,layer = layui.layer;

            //监听提交
            form.on('submit(LAY-user-admin-submit)', function(data){
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
                        layer.msg(res.info, {time: 1500});
                    }
                });
                //阻止表单跳转
                return false;
            });
        });

    </script>
    </body>
</html>