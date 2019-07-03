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

	<body style="overflow-x : hidden; ">
			<div class="layui-col-xs4" style="margin-left: 15px;margin-top: 13px;">
				<form class="layui-form"  action="<?php echo U('useradmingroup');?>">
					<input type="text" style="display: none;" name="uid" value="<?php echo ($user["id"]); ?>" />

					<div class="layui-form-item">
			           <label class="layui-form-label">用户帐号</label>
		          		<div class="layui-input-inline">
		          			<div class="layui-form-mid layui-word-aux"><?php echo ($user["loginname"]); ?></div>
		          		</div>
			        </div>

	 				<div class="layui-form-item" >
						<label class="layui-form-label">选择角色</label>
						<div class="layui-input-block">

							<select name="group_id" lay-ignore class="shortselect "  lay-verify="required">
								<option value="">请选择角色</option>
									<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['id'] == $info[0]['group_id']): ?><option value='<?php echo ($vo["id"]); ?>' selected ><?php echo ($vo["title"]); ?></option>
											<?php else: ?>
											<option value='<?php echo ($vo["id"]); ?>'><?php echo ($vo["title"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<div class="larryms-layer-btn">
	           		      <a class="layui-btn layui-btn" lay-submit="saveAuthGroup" lay-filter="saveAuthGroup" >确定</a>
	           		      <a class="layui-btn layui-btn  layui-btn-danger" href="javascript:;"  onclick="CloseWin();">关闭</a>
	           		</div>

				</form>
			</div>
			<script src="/Public/admin/layui/layui/layui.js"></script>
			<script src="/Public/admin/js/common.js"></script>
		<script type="text/javascript">
	    layui.use(['form' ], function(){
	      var form = layui.form
	      ,layer = layui.layer;

		    //监听提交
		    form.on('submit(saveAuthGroup)', function(data){
		      	var url   = data.form.action;
		      	//表单序列化
		      	var param = data.field;
		      	//提交
	      		$.post(url,param, function(res) {
					if(res.status == 1) {
						layer.msg(res.info, {time: 1500},function(){
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