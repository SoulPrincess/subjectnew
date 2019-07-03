<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="/Public/admin/layui/layui/css/layui.css" rel="stylesheet" />
	<link href="/Public/admin/css/tai.css" rel="stylesheet" />
	<link href="/Public/admin/css/popup.css" rel="stylesheet" />
	<link href="/Public/admin/css/common.css" rel="stylesheet" />
	<script src="/Public/admin/js/jquery.min.js"></script>
</head>


<body style="overflow-y: auto;">
<div id="sss"></div>
<div class="row">
	<form class="layui-form" action="<?php echo U('rolegroup');?>">
		<input type="hidden"  value="<?php echo ($group["id"]); ?>" name="id" />
		<!-- 循环权限数组 -->
		<?php if(is_array($data)): foreach($data as $key=>$vo): ?><!-- 顶级权限全选 -->
			<div class="layui-collapse widget-box" id="top<?php echo ($vo["id"]); ?>" >
				<div class="layui-colla-item">
					<div class="widget-title">
						<input type="checkbox" name="rules[]" lay-filter="allChoose" title="<?php echo ($vo["title"]); ?>"  value="<?php echo ($vo["id"]); ?>" lay-skin="primary" <?php if(in_array($vo['id'],$group['rules'])): ?>checked<?php endif; ?> >
					</div>
					<!-- 如果子权限数组不等于空 -->
					<?php if($vo["rule"] != null): ?><div class="layui-colla-content  layui-show" >
							<!-- 循环子权限数组 -->
							<?php if(is_array($vo['rule'])): foreach($vo['rule'] as $key=>$sub): ?><!--子权限全选 -->
								<div id="sub<?php echo ($sub["id"]); ?>">
									<input type="checkbox" name="rules[]" title="<?php echo ($sub["title"]); ?>" lay-filter="allsub" value="<?php echo ($sub["id"]); ?>" lay-skin="primary" <?php if(in_array($sub['id'],$group['rules'])): ?>checked<?php endif; ?> >
									<!-- 循环三级权限数组 -->
									<?php if(is_array($sub['rule'])): foreach($sub['rule'] as $key=>$subd): ?><input type="checkbox" name="rules[]"  title="<?php echo ($subd["title"]); ?>"  value="<?php echo ($subd["id"]); ?>" lay-skin="primary" <?php if(in_array($subd['id'],$group['rules'])): ?>checked<?php endif; ?> >
										<?php if($subd["rule"] != null): ?><div class="layui-colla-content  layui-show" >
												<!-- 循环子权限数组 -->
												<?php
 foreach($subd['rule'] as $sub1){ ?>
												<!--子权限全选 -->
												<input type="checkbox" name="rules[]"  title="<?php echo ($sub1["title"]); ?>"  value="<?php echo ($sub1["id"]); ?>" lay-skin="primary" <?php if(in_array($sub1['id'],$group['rules'])): ?>checked<?php endif; ?> >
												<?php
 } ?>
											</div><?php endif; endforeach; endif; ?>
									<hr>
								</div><?php endforeach; endif; ?>
						</div><?php endif; ?>
				</div>
			</div><?php endforeach; endif; ?>

		<div class="widget-box">
			<div class="larryms-layer-btn" style="position: relative;">
				<a class="layui-btn " lay-submit="editGroup" lay-filter="editGroup" >提交</a>
				<a class="layui-btn " href="javascript:;" onclick="CloseWin()" >关闭</a>
			</div>
		</div>
	</form>

</div>

<script src="/Public/admin/layui/layui/layui.js"></script>
<script src="/Public/admin/js/common.js"></script>



<script>
    $(function () {
        var data = [
            {
                id: 1, name: "广东", pid: 0,
                children: [
                    {
                        id: 2, name: "广州", pid: 1,
                        children: [
                            { id: 3, name: "天河", pid: 2 },
                            { id: 4, name: "白云", pid: 2 },
                        ],
                    },
                    { id: 8, name: "深圳", pid: 1 },
                    {
                        id: 9, name: "东莞", pid: 1,
                        children: [
                            { id: 10, name: "松山湖", pid: 9 },
                        ]
                    },
                ]
            },
            {
                id: 5, name: "广西", pid: 0,
                children: [
                    {
                        id: 6, name: "玉林", pid: 5,
                        children: [
                            { id: 7, name: "北流", pid: 6 },
                        ]
                    },
                ]
            },
        ];

        var menu = '';
        menuFn(0, "<?php echo ($data); ?>");
        $("#sss").append(menu)

        function menuFn(id, data) {
            if (data.length > 0) {
                menu += "<ul>"
                for (var i = 0; i < data.length; i++) { //获取省一级
                    if (data[i].pid == id) {
                        menu += "<li>"
                        if(data[i].children){
                            menu += '<em></em><span>' + data[i].name + "</span>"
                            menuFn(data[i].id, data[i].children)   //递归
                        }else{
                            menu += '<span>' + data[i].name + "</span>"
                        }
                        menu += "</li>"

                    }
                }
                menu += "</ul>"
                return menu;
            }
        }

        function fn() {
            var ull = $($(this).parent().children("ul")[0]);
            if (ull.length > 0) {
                ull.toggle();
                $(this).toggleClass("open")
            }
        }
        $("#app").delegate("span", "click", fn)
        $("#app").delegate("em", "click", fn)
    })
</script>
<script>
    layui.use(['form'], function(){
        var form = layui.form,
            layer = layui.layer;
        //全选/反选,顶级
        form.on('checkbox(allChoose)', function(data){
            var id = data.value;
            //这里实现勾选
            $('#top'+id+' input').each(function(index, item){
                item.checked = data.elem.checked;
            });

            form.render('checkbox');
        });

        //全选/反选
        form.on('checkbox(allsub)', function(data){
            var id = data.value;
            //这里实现勾选
            $('#sub'+id+' input').each(function(index, item){
                item.checked = data.elem.checked;
            });

            form.render('checkbox');
        });

        //监听提交
        form.on('submit(editGroup)', function(data){
            //获取窗口搜引
            var index = parent.layer.getFrameIndex(window.name);
            var url =  data.form.action;
            //表单序列化
            var param = data.field;
            //提交
            $.post(url,param, function(res) {
                if(res.status == 1) {
                    layer.msg(res.info, {time: 1500},function(){
                        window.parent.location.reload();//刷新父页面
                        CloseWin();
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