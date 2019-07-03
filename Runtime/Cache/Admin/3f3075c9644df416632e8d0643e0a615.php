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
<script type="text/javascript">
    layui.use('form', function(){
        var form =layui.form;
        function showCategory(data, count) {
            $(data).each(function (i, n) {
                var t = "";
                for (var j = 0; j < count; ++j) {
                    t += "&nbsp;&nbsp;&nbsp;";
                }
                if (n.children.length > 0) {
                    $("#product_type").append("<option value='" + n.id + "' >" + t + n.typename + "</option>");
                    showCategory(n.children, count + 1)
                } else {
                    $("#product_type").append("<option value='" + n.id + "'>" + t + n.typename + "</option>");
                }
            });
            form.render('select');
        }
        $("#product_type").append("<option value=''>请选择分类</option>");
        $(function () {
            get_product_lg();
        });
        function get_product_lg() {
            $.getJSON(
                "<?php echo U('product/productlg');?>",
                function (data) {
                    showCategory(data,0);
                    $("#product_type").find("option[value="+"<?php echo ($datainfo['type_id']); ?>"+"]").attr("selected",true);
                    form.render('select');
                });
        } });
</script>
<div class="layui-fluid" style="display:block">
    <form class="layui-form" action="">
        <div class="layui-fluid" >
            <div class="layui-card">
                <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                    <input type="hidden" name="productid" value="<?php echo ($datainfo['id']); ?>">
                    <div class="layui-inline">
                        <label class="layui-form-label">产品标签</label>
                        <div class="layui-input-inline">
                            <select name="product_type" id="product_type" lay-filter='product_type'>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">产品名称</label>
                            <div class="layui-input-inline ccc">
                                <input type="text" name="productname" placeholder="请输入" autocomplete="off" class="layui-input" value="<?php echo ($datainfo['productname']); ?>">
                            </div>
                        </div>

                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">产品英文名称/备注</label>
                            <div class="layui-input-inline ccc">
                                <input type="text" name="productenname" placeholder="请输入" autocomplete="off" class="layui-input" value="<?php echo ($datainfo['productenname']); ?>">
                            </div>
                        </div>

                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">点击次数</label>
                            <div class="layui-input-inline raning">
                                <input type="text" name="productpv" value="<?php echo ($datainfo['pv']); ?>" autocomplete="off" class="layui-input small" style="width:50px">
                            </div>
                            <div class="layui-form-mid layui-word-aux">点击次数越多，热门信息中排名越靠前</div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">可选属性</label>
                            <div class="layui-input-inline">
                                <input type="radio" name="attribute" value="1" title="推荐"  <?php echo ($datainfo['attribute']==1?'checked':''); ?>><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>推荐</div></div>
                                <input type="radio" name="attribute" value="2" title="置顶" <?php echo ($datainfo['attribute']==2?'checked':''); ?>><div class="layui-unselect layui-form-radio revel"><i class="layui-anim layui-icon"></i><div>置顶</div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <blockquote class="layui-elem-quote layui-text">
                    展示图片
                </blockquote>
                <div class="layui-form" lay-filter="">

                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">图片地址</label>
                            <div class="layui-input-inline">
                                <input type="text" name="img[big]" value="<?php echo ($datainfo['tupian']['big']); ?>" autocomplete="off" class="layui-input" id="LAY_avatarUpload1">
                            </div>
                            <button type="button" class="layui-btn layui-btn-primary" id="LAY_avatarUploadbig">
                                <i class="layui-icon"></i>上传图片
                            </button>
                            <input class="layui-upload-file" type="file" accept="undefined" name="img[big]" value="<?php echo ($datainfo['tupian']['big']); ?>">
                            <!--<button class="layui-btn layui-btn-primary" layadmin-event="avartatPreview">从图库选择</button>-->
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">缩略图</label>
                            <div class="layui-input-inline">
                                <input type="text" name="img[sm]" value="<?php echo ($datainfo['tupian']['sm']); ?>" autocomplete="off" class="layui-input" id="LAY_avatarUpload2" >
                            </div>
                            <!--<button type="button" class="layui-btn layui-btn-primary" id="LAY_avatarUploadsm">-->
                            <!--<i class="layui-icon"></i>上传图片-->
                            <!--</button>-->
                            <img src="" alt="" id="pic">
                            <!--<button class="layui-btn layui-btn-primary" layadmin-event="avartatPreview">从图库选择</button>-->
                        </div>
                    </div>
                </div>
                <blockquote class="layui-elem-quote layui-text">
                    详细内容
                </blockquote>
                <textarea id="Describe" name="Describe" style="display: none;"><?php echo ($datainfo['describe']); ?></textarea>
                <blockquote class="layui-elem-quote layui-text">
                    SEO设置
                </blockquote>
                <div class="layui-card-body" pad15="">

                    <div class="layui-form" lay-filter="">
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">自定义title</label>
                                <div class="layui-input-inline ccc">
                                    <input type="text" placeholder="请输入"  class="layui-input" name="seotitle" value="<?php echo ($datainfo['seotitle']); ?>">
                                </div>
                                <div class="layui-form-mid layui-word-aux">为空则系统自动构成，可以到 营销-SEO 中设置构成规则</div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">关键词</label>
                            <div class="layui-input-inline ccc">
                                <input type="text" placeholder="请输入" class="layui-input" name="keywords" value="<?php echo ($datainfo['keywords']); ?>">
                            </div>
                            <div class="layui-form-mid layui-word-aux">多个关键词请用|或，隔开</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">描述文字</label>
                            <div class="layui-input-block">
                                <textarea placeholder="请输入内容"  class="layui-textarea textA" name="description"><?php echo ($datainfo['description']); ?></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">TAG标签</label>
                            <div class="layui-input-block">
                                <div class="layui-input-inline ccc">
                                    <input type="text" placeholder="请输入" name="tag" class="layui-input" value="<?php echo ($datainfo['tag']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">静态页面名称</label>
                            <div class="layui-input-inline ccc">
                                <input type="text" placeholder="请输入" name="staticname" class="layui-input" value="<?php echo ($datainfo['staticname']); ?>">
                            </div>
                            <div class="layui-form-mid layui-word-aux">支持中文、大小写、数字、下划线</div>
                        </div>
                    </div>

                </div>
                <blockquote class="layui-elem-quote layui-text">
                    其他设置
                </blockquote>
                <div class="layui-card-body" pad15="">

                    <div class="layui-form" lay-filter="">
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">发布人</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="User" id="User" placeholder="请输入" value="<?php echo ($datainfo['user_name']); ?>" readonly="" class="layui-input">
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">状态</label>
                            <div class="layui-input-block">
                                <input type="radio" name="status" value="1" title="是" <?php echo ($datainfo['status']==1?'checked':''); ?>><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>是</div></div>
                                <input type="radio" name="status" value="0" title="否" <?php echo ($datainfo['status']==0?'checked':''); ?>><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>否</div></div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">更新时间</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="UpdateDate" id="UpdateDate"  placeholder="yyyy-mm-dd 00:00:00" class="layui-input" value="<?php echo ($datainfo['updatedate']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">发布时间</label>
                            <div class="layui-input-inline">
                                <input type="text" name="ReleaseDate" id="ReleaseDate"  placeholder="yyyy-mm-dd 00:00:00" class="layui-input release" value="<?php echo ($datainfo['productdate']); ?>">

                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">封面图片</label>
                            <div class="layui-input-inline layui-btn-container" style="width: auto;">
                                <button type="button" class="layui-btn layui-btn-primary" id="LAY_avatarUpload" src="<?php echo ($datainfo['coverimg']); ?>">
                                    <i class="layui-icon"></i>上传图片
                                </button><input class="layui-upload-file" type="file" accept="undefined" name="CoverImg" >
                                <button type="button" class="layui-btn layui-btn-primary" id="LAY_avatarUpload_view">点击查看</button>
                                <img src="" alt="" id="tupian" style="display:none" >
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" type="button" id="consult-present" lay-submit lay-filter="consult-present">立即提交</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </form>
</div>
</body>
</html>

<script>
    function previewImg(obj) {
        var img = new Image();
        img.src = obj;
        var height = img.height +50; //获取图片高度
        var width = img.width; //获取图片宽度
        var imgHtml = "<img src='" + obj + "' />";
        //弹出层
        layer.open({
            type: 1,
            shade: 0.8,
            offset: 'auto',
            area: [width + 'px',height + 'px'],
            shadeClose: true,//点击外围关闭弹窗
            scrollbar: false,//不现实滚动条
            title: "图片预览", //不显示标题
            content: imgHtml, //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
        });
    }
</script>
<script>
    layui.use('laydate', function () {
        var laydate = layui.laydate;
        laydate.render({
            elem: '#UpdateDate'
            , type: 'datetime'
        });
        laydate.render({
            elem: '#ReleaseDate'
            , type: 'datetime'
        });
    })
</script>
<script>
    $(function () {
        layui.use('upload', function () {
            var $ = layui.jquery
                , upload = layui.upload;

            //普通图片上传
            var uploadInst = upload.render({
                elem: '#LAY_avatarUpload'
                , url:"<?php echo U('user/upload?name=product');?>"
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('#LAY_avatarUpload').attr('src', result); //图片链接（base64）
                    });
                }
                , done: function (res) {
                    //如果上传失败
                    if (res.code >0) {
                        return layer.msg('上传失败');
                    }
                    else {
                        $('#tupian').attr('src', res.data.src); //图片链接
                        $('#LAY_avatarUpload').attr('src', res.data.src); //图片链接
                        return layer.msg('上传成功');
                    }
                    //上传成功
                }
                , error: function () {
                    layer.msg('上传异常,请重试');
                }
            });

            //图片上传
            upload.render({
                elem: '#LAY_avatarUploadbig'
                , url:"<?php echo U('user/upload?name=productbig&thumbWidth=300&thumbHeight=300');?>"
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('#LAY_avatarUpload1').val(result)
                    });
                }
                , done: function (res) {
                    //如果上传失败
                    if (res.code > 0) {
                        return layer.msg('上传失败');
                    }
                    else {
                        $('#LAY_avatarUpload2').val(res.data.mini_pic);
                        $('#LAY_avatarUpload1').val(res.data.src);
                        return layer.msg('上传成功');
                    }
                    //上传成功
                }
                , error: function () {
                    layer.msg('上传异常,请重试');
                }
            });

        })
        layui.use(['form', 'layedit'], function () {
            var form = layui.form, layedit = layui.layedit;
            //设置图片上传接口
            layedit.set({
                uploadImage: {
                    url: "<?php echo U('user/upload?name=productedit');?>" //接口url
                     ,type: 'post' //默认post
                    , done: function (res) {
                        // 如果上传失败
                        if (res.code > 0) {
                            return layer.msg(res.msg);
                        }
                        else {
                            return layer.msg(res.msg);
                        }
                        // 上传成功
                    }
                    , error: function () {
                        layer.msg('上传异常,请重试');
                    }
                } ,
                tool: [
                    'strong', 'italic', 'underline', 'del', 'addhr', '|', 'fontFomatt', 'colorpicker', 'face'
                    , '|', 'left', 'center', 'right', '|', 'link', 'unlink', 'image_alt',  'anchors'
                    , '|', 'fullScreen'
                ],
                devmode: true
            });
            //图片预览
            $("#LAY_avatarUpload_view").click(function () {
                var obj = $('#LAY_avatarUpload').attr('src');
                if(obj==''){
                    layer.msg('未上传图片！');
                }else{
                    previewImg(obj);
                }

            })
            var layedit_from = layedit.build('Describe'); //建立编辑器

            //自定义验证规则
            // form.verify({
            //     password:
            //         [ /^[\S]{6,12}$/,'密码必须6到12位，且不能出现空格']
            // });

            form.on('submit(consult-present)', function (data) {
                //表单数据formData
                var formData = data.field;
                formData.Describe = layedit.getContent(layedit_from);
                formData.src = $('#LAY_avatarUpload').attr('src');
                $.ajax({
                    url: "<?php echo U('product/productupdate');?>",
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
            });
        });
    })
</script>