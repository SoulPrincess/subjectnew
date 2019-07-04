<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>谷程-网站设置</title>
    <link rel="stylesheet" type="text/css" href="/Public/admin/layui/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/tai.css">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/popup.css">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/class.css">

    <script type="text/javascript" src="/Public/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/admin/js/echarts.min.js"></script>
    <script type="text/javascript" src="/Public/admin/layui/laydate/laydate.js"></script>
    <script type="text/javascript" src="/Public/admin/layui/layui/layui.js" ></script>
</head>
<style>
    ul {
        list-style: disc;
        padding-left: 40px;
    }
    ul ul {
        list-style: circle;
    }
    ul ul ul {
        list-style: square;
    }
    li {
        display: list-item;
    }
</style>
<body class="layui-layout-body" layadmin-themealias="default">
<div class="layui-layout layui-layout-admin">
    <div class="layui-headerC">
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav navCo layui-layout-left">
            <li class="layui-nav-item"></li>
            <li class="layui-nav-item"></li>
            <li class="layui-nav-item"></li>
        </ul>
        <ul class="layui-nav navCo layui-layout-right">
            <li class="layui-nav-item"><a href="<?php echo U('message/messageinfo');?>">待回复(<cite id="mes" style="color:red">0</cite>)</a></li>
            <li class="layui-nav-item">

                <a href="javascript:;">
                    <?php if(session('userInfo.admin_pic') != '' ): ?><img src="<?php echo session('userInfo.admin_pic');?>" class="layui-nav-img">
                        <?php else: ?>
                        <img src="/Public/admin/timg.jpg" alt="头像" class="layui-nav-img"><?php endif; ?>
                    <?php echo session('userInfo.admin_username');?>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo U('user/information');?>">基本资料</a></dd>
                    <dd><a href="<?php echo U('user/userpwd');?>">修改密码</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="<?php echo U('login/logout');?>">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <div class="layui-logoC" lay-href=""><img src="/Public/admin/img/logo.png" alt="">  </div>
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu" lay-shrink="all">

            </ul>
            <span class="layui-nav-bar" style="top: 252px; height: 0px; opacity: 0;"></span>
        </div>

    </div>
    

    <!-- 页面标签 -->
    <script type="text/html" template="" lay-done="layui.element.render('nav', 'layadmin-pagetabs-nav')">
        {{# if(layui.setter.pageTabs){ }}
        <div class="layadmin-pagetabs" id="LAY_app_tabs">
            <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-down">
                <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
                    <li class="layui-nav-item" lay-unselect>
                        <a href="javascript:;"></a>
                        <dl class="layui-nav-child layui-anim-fadein">
                            <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                            <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                            <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
            <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
                <ul class="layui-tab-title" id="LAY_app_tabsheader">
                    <li lay-id="/"><i class="layui-icon layui-icon-home"></i></li>
                </ul>
            </div>
        </div>
        {{# } }}
    </script>


    <!-- 主体内容 -->
    <div class="layui-body" id="LAY_app_body">
        <div class="layadmin-tabsbody-item layui-show"><div class="layui-card layadmin-header">
            <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
                <a lay-href="">设置</a><span lay-separator="">/</span>
                <a><cite>系统设置</cite></a><span lay-separator="">/</span>
                <a><cite>网站设置</cite></a>
            </div>
        </div><div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                    <div class="layui-form-item">
                        <button class="layui-btn">网站信息</button>
                        <button class="layui-btn layui-btn-primary op">邮件发送设置</button>
                        <button class="layui-btn layui-btn-primary op" >第三方代码</button>
                    </div>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show layui-form" lay-filter="save1">
                        <blockquote class="layui-elem-quote layui-text">
                            网站基本信息设置
                        </blockquote>
                        <div class="layui-card-body" pad15="">
                            <div class="layui-form" >
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">网站名称</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="web[name]" placeholder="谷程" autocomplete="off" class="layui-input" value="<?php echo ($websys['web']['name']); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">网站LOGO</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="web[logo]" placeholder="" autocomplete="off" class="layui-input" id="weblogo" value="<?php echo ($websys['web']['logo']); ?>">
                                        </div>
                                        <div class="layui-input-inlineLOGO layui-btn-container">
                                            <button type="button" class="layui-btn layui-btn-primary" id="LAY_avatarUpload">
                                                <i class="layui-icon"></i>上传图片
                                            </button>
                                            <!--<button class="layui-btn layui-btn-primary" layadmin-event="avartatPreview">从图库选择</button>-->
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">建议尺寸180*60（像素）</div>
                                    </div>

                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">地址栏图标</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="web[urllogo]" placeholder="" autocomplete="off" class="layui-input" id="urllogo" value="<?php echo ($websys['web']['urllogo']); ?>">
                                        </div>
                                        <div class="layui-input-inline layui-btn-container">
                                            <button type="button" class="layui-btn layui-btn-primary" id="LAY_avatarUpload1">
                                                <i class="layui-icon"></i>上传图片
                                            </button>
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">建议尺寸32*32（像素）的icon文件。<a href="https://www.baidu.com/s?wd=ico图标制作" class="aColor">点击制作ICO</a>如果无法正常显示新上传图标，请清空浏览器缓存后访问</div>
                                    </div>

                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">网站网址</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="web[url]" placeholder="http://www.gucheng.com/" autocomplete="off" class="layui-input" value="<?php echo ($websys['web']['url']); ?>">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">建议填写检测到的网址：http://www.gucheng.com/</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">网站关键词</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="web[keywords]" placeholder="平台小程序|上海小程序|嘉定小程序" autocomplete="off" class="layui-input" value="<?php echo ($websys['web']['keywords']); ?>">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">多个关键词请用竖线|隔开，建议3到4个关键词</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-labelStatic">描述</label>
                                    <div class="layui-input-block">
                                        <textarea placeholder="请输入内容" class="layui-textarea" name="web[describe]" id="webdescribe"><?php echo ($websys['web']['describe']); ?></textarea>
                                        <div class="">100字以内（（当前已输入<span id="num1">0</span>个字符））</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <blockquote class="layui-elem-quote layui-text">
                            底部信息设置（显示在网站前台底部）
                        </blockquote>
                        <div class="layui-card-body" pad15="">
                            <div class="layui-form" >
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">版权信息</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="foot[copyright]" placeholder="上海谷程网络科技有限公司 版权所有" autocomplete="off" class="layui-input" value="<?php echo ($websys['foot']['copyright']); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">地址邮编</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="foot[urlemail]" placeholder="1234565168156" autocomplete="off" class="layui-input" value="<?php echo ($websys['foot']['urlemail']); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">联系方式</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="foot[telephone]" placeholder="上海闵行区联航路1588号" autocomplete="off" class="layui-input" value="<?php echo ($websys['foot']['telephone']); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-labelStatic">备注信息</label>
                                    <div class="layui-input-block">
                                        <textarea id="remark" style="display: none;" name="remark"><?php echo ($websys['remark']); ?></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="layui-form-item Ontheborder">
                            <div class="layui-input-inline ">
                                <button <?php echo authcheck('websys/websysinfo');?>  class="layui-btn" id="save1"  lay-filter="save1" lay-submit="save1"> 保存</button>
                            </div>
                        </div>
                    </div>
                    <div class="layui-tab-item layui-form" lay-filter="save2">
                        <blockquote class="layui-elem-quote layui-text">
                            发件箱设置（站内所有邮件均由此邮箱发送，如会员密码找回邮件等）
                        </blockquote>
                        <div class="layui-card-body" pad15="">
                            <div class="layui-form" lay-filter="">
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">发件人</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="email[name]" placeholder="谷程" autocomplete="off" class="layui-input" value="<?php echo ($emailsend['email']['name']); ?>" id="emailname">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">所显示的发件人姓名</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">邮箱账号</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="email[number]" placeholder="test@mail.gucheng.cn" autocomplete="off" class="layui-input" value="<?php echo ($emailsend['email']['number']); ?>" id="emailnumber">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">用于发送邮件的邮箱账号</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">邮箱密码</label>
                                        <div class="layui-input-inline ">
                                            <input type="password" name="email[password]" placeholder="**********" autocomplete="off" class="layui-input" value="<?php echo ($emailsend['email']['password']); ?>" id="emailpwd">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">用于发送邮件的邮箱密码</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">SMTP</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="email[smtp]" placeholder="61.152.188.131" autocomplete="off" class="layui-input" value="<?php echo ($emailsend['email']['smtp']); ?>" id="emailsmtp">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">如QQ邮箱为smtp.qq.com</div>
                                    </div>
                                </div>
                                <div id="dis" class="dis">
                                    <div class="layui-form-item ">
                                        <div class="layui-inline">
                                            <label class="layui-form-labelStatic">发送端口</label>
                                            <div class="layui-input-inline ">
                                                <input type="text" name="email[port]" placeholder="25" autocomplete="off" class="layui-input" value="<?php echo ($emailsend['email']['port']); ?>" id="emailport">
                                            </div>
                                            <div class="layui-form-mid layui-word-aux">用于邮件发送端口（咨询邮箱服务商获得，TLS一般为25，SSL一般为45）</div>
                                        </div>
                                    </div>
                                    <div class="layui-form-item ">
                                        <label class="layui-form-labelStatic">发送方式</label>
                                        <div class="layui-input-block">
                                            <input type="radio" name="email[type]" value="TLS" title="TLS服务方式" <?php echo ($emailsend['email']['type']=='TLS'?'checked':''); ?>><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>TLS服务方式</div></div>
                                            <input type="radio" name="email[type]" value="SSL" title="SSL服务方式" <?php echo ($emailsend['email']['type']=='SSL'?'checked':''); ?>><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>SSL服务方式</div></div>
                                            <div class=" layui-form-radio layui-word-aux cur"><div>默认邮箱服务方式为TLS(咨询空间商获得)如果使用TLS方式为25端口无法发送邮件，请尝试使用SSL方式465端口发件</div></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline empty">
                                        <label class="layui-form-labelStatic"></label>
                                        <a href="javascript:void(0);" id="setStai">更多选项</a>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline empty">
                                        <label class="layui-form-labelStatic"></label>
                                        <a <?php echo authcheck('websys/websysinfo');?> href="javascript:void(0);" id="setStai1" onclick="sendtest()">发送测试</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item Ontheborder">
                            <div class="layui-input-inline ">
                                <button <?php echo authcheck('websys/websysinfo');?> class="layui-btn" lay-filter="save2" lay-submit="save2"> 保存</button>
                            </div>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <blockquote class="layui-elem-quote layui-text">
                            第三方代码（一般用于放置百度商桥代码、站长统计代码、谷歌翻译代码等）
                        </blockquote>
                        <div class="layui-card-body layui-form" pad15="" lay-filter="save3">
                            <div class="layui-form" >
                                <div class="layui-form-item">
                                    <label class="layui-form-labelStatic">顶部代码</label>
                                    <div class="layui-input-block">
                                        <textarea placeholder="请输入内容" class="layui-textarea" id="headercode" name="headercode" id="headercode"></textarea>
                                        <div class="">代码会放在 &lt;/head&gt;标签以上</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">底部代码</label>
                                    <div class="layui-input-block">
                                        <textarea id="footcode" style="display: none;" name="footcode"></textarea>
                                        <div class="">代码会放在 &lt;/body&gt;标签以上</div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item Ontheborder">
                                <div class="layui-input-inline ">
                                    <button <?php echo authcheck('websys/websysinfo');?> class="layui-btn" lay-filter="save3" lay-submit="save3"> 保存</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div>
    </div>
    <script>

        $("#setStai").click(function () {
            $('#dis').toggle(300);
        })

        $('.layui-form-item>button').click(function () {
            $(this).removeClass('layui-btn-primary').siblings().addClass('layui-btn-primary')
            var _index = $(this).index();
            $('.layui-tab-item').eq(_index).addClass('layui-show').siblings().removeClass('layui-show');
        });
    </script>
    <script>
    $(function () {
        /**
         * textarea 限制输入字数
         * @param string str 类名或ID
         * @param number num 限制输入的字数
         */
        function limitImport(str,num){
            $(document).on('input propertychange',str,function(){
                var self = $(this);
                var content = self.val();
                if (content.length > num){
                    self.val(content.substring(0,num));
                }
                $('#num1').text(self.val().length);
                self.siblings('span').text(self.val().length+'/'+num);
            });
        }
        //调用方法
        limitImport('#webdescribe',100);

        layui.use(['upload','layedit'], function () {
            var $ = layui.jquery
                , upload = layui.upload
                , layedit = layui.layedit;

            //普通图片上传
            upload.render({
                elem: '#LAY_avatarUpload'
                , url:"<?php echo U('user/upload?name=weblogo&thumbWidth=180&thumbHeight=60');?>"
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('#weblogo').attr('src', result); //图片链接（base64）
                    });
                }
                , done: function (res) {
                    //如果上传失败
                    if (res.code > 0) {
                        return layer.msg('上传失败');
                    }
                    else {
                        $('#weblogo').val(res.data.mini_pic);
                        return layer.msg('上传成功');
                    }
                    //上传成功
                }
                , error: function () {
                    layer.msg('上传异常,请重试');
                }
            });

            //上传.ico文件
            upload.render({
                elem: '#LAY_avatarUpload1'
                ,size: 120 //限制文件大小，单位 KB
                ,accept: 'file' //普通文件
                ,auto:true
                ,exts: 'ico'
                , url:"<?php echo U('user/upload?name=webico');?>"
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('#urllogo').val(result)
                    });
                }
                , done: function (res) {
                    //如果上传失败
                    if (res.code > 0) {
                        return layer.msg('上传失败');
                    }
                    else {
                        $('#urllogo').val(res.data.src);
                        return layer.msg('上传成功');
                    }
                    //上传成功
                }
                , error: function () {
                    layer.msg('上传异常,请重试');
                }
            });
        //设置图片上传接口
            layedit.set({
                uploadImage: {
                    url: "<?php echo U('user/upload?name=webedit');?>" //接口url
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
                }
            });
        })
    });

    layui.use(['form','layedit'], function () {
        var form = layui.form,layedit = layui.layedit;
        var layedit_from = layedit.build('remark'); //建立编辑器

        form.on('submit(save1)', function (data) {
            //表单数据formData
            var formData = data.field;
            formData.remark = layedit.getContent(layedit_from);
            $.ajax({
                url: "<?php echo U('websys/websysinfo?name=web');?>",
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
            },'json');
            return false;
        });
    });
    </script>
    <script>
        layui.use('layedit', function(){
            var layedit = layui.layedit;
             layedit_footcode=  layedit.build('footcode', {
                 tool: ['code'],//设置需要的控件
                 height: 100 //设置高度
             }); //建立编辑器
             layedit_headercode= layedit.build('headercode', {
                tool: ['code'],//设置需要的控件
                height: 100 //设置高度
            }); //建立编辑器
        });
    </script>
    <script type="text/javascript">
        $(function () {
            get_type();
        });
        function get_type() {
            $.getJSON(
                "<?php echo U('websys/threecode');?>",
                function (data) {
                    layui.use(['form','layedit'], function () {
                     var layedit=layui.layedit;
                        layedit.setContent(layedit_headercode,data.headercode.replace(/</g, "&lt;").replace(/>/g, "&gt;"),false);
                        layedit.setContent(layedit_footcode,data.footcode.replace(/</g, "&lt;").replace(/>/g, "&gt;"),false);
                    });
                });
        }
    </script>
    <script>
        layui.use(['form','layedit'], function () {
            var form = layui.form;
            form.on('submit(save2)', function (data) {
                //表单数据formData
                var formData = data.field;
                $.ajax({
                    url: "<?php echo U('websys/websysinfo?name=send');?>",
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
                },'json');
                return false;
            });
        });


        layui.use(['form','layedit'], function (){
            var form = layui.form,
                layedit = layui.layedit;
            form.on('submit(save3)', function (data) {
              var footcode      =layedit.getContent(layedit_footcode).replace(/&lt;/g, "<").replace(/&gt;/g, ">");
              var headercode    = layedit.getContent(layedit_headercode).replace(/&lt;/g, "<").replace(/&gt;/g, ">");
                $.ajax({
                    url: "<?php echo U('websys/websysinfo?name=code');?>",
                    data: {'headercode':headercode,'footcode':footcode},
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
                },'json');
                return false;
            });
        });
    </script>
    <script>
        function sendtest(){
            var emailname=$("#emailname").val();
            var emailprot=$("#emailport").val();
            var emailnumber=$("#emailnumber").val();
            var emailpwd=$("#emailpwd").val();
            var emailsmtp=$("#emailsmtp").val();
            var emailtype=$("input[type='radio']").val();
            $.ajax({
                url: "<?php echo U('websys/websysinfo?name=test');?>",
                data: {'emailname':emailname,'emailprot':emailprot,'emailnumber':emailnumber,'emailpwd':emailpwd,'emailsmtp':emailsmtp,'emailtype':emailtype},
                type: 'post',
                success: function (data) {
                    if (data.status==1) {
                        layer.msg(data.info,{time:1500});
                    }
                    else {
                        layer.msg(data.info)
                    }
                }
            },'json');
        }
        </script>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        Copyright  (c)  2019 上海谷程网络科技有限公司
    </div>
</div>
</body>
</html>

<script>
    layui.use('element', function(){
        var $ = layui.jquery
            ,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块


    });

</script>
<script>
    $(function () {
        get_base();
    });
    function get_base() {
        $.ajax({
            url: "<?php echo U('public/base');?>",
            type: 'get',
            dataType: 'JSON',
            async : false,
            success:function(data){
                var ul=getHtml(data);
                $("#LAY-system-side-menu").append(ul);
                layui.use('element', function() {
                    var element = layui.element;
                    element.render("layadmin-system-side-menu");
                });
            }
        });
    }

    function getHtml(data) {
        var ulHtml = '';
        for (var i = 0; i < data.length; i++) {
            ulHtml += '<li class="layui-nav-item">';
            if (data[i].children !== undefined && data[i].children !== null && data[i].children.length > 0) {
                ulHtml += '<a href="javascript:;">' + data[i].name;
                ulHtml += '<span class="layui-nav-more"></span>';
                ulHtml += '</a>';
                ulHtml += '<dl class="layui-nav-child">';
                //二级菜单
                for (var j = 0; j < data[i].children.length; j++) {
                    //是否有孙子节点
                    if (data[i].children[j].children !== undefined && data[i].children[j].children !== null && data[i].children[j].children.length > 0) {
                        ulHtml += '<dd>';
                        ulHtml += '<a href="javascript:;">' + data[i].children[j].name;
                        ulHtml += '<span class="layui-nav-more"></span>';
                        ulHtml += '</a>';
                        //三级菜单
                        ulHtml += '<dl class="layui-nav-child">';
                        var grandsonNodes = data[i].children[j].children;
                        for (var k = 0; k < grandsonNodes.length; k++) {
                            ulHtml += '<dd>';
                            ulHtml += '<a href="/admin/'+ grandsonNodes[k].title +'">' + grandsonNodes[k].name + '</a>';
                            ulHtml += '</dd>';
                        }
                        ulHtml += '</dl>';
                        ulHtml += '</dd>';
                    }else{
                        ulHtml += '<dd>';
                        ulHtml += '<a href="/admin/'+data[i].children[j].title+'">' + data[i].children[j].name;
                        ulHtml += '</a>';
                        ulHtml += '</dd>';
                    }
                }
                ulHtml += '</dl>';
            } else {
                var dataUrl = (data[i].title !== undefined && data[i].title !== '') ? 'data-url="' + data[i].title + '"' : '';
                ulHtml += '<a href="/admin/' + data[i].title + '"' + dataUrl + '>';
                ulHtml += '<cite>' + data[i].name + '</cite>';
                ulHtml += '</a>';
            }
            ulHtml += '</li>';
        }
        return ulHtml;
    }


</script>
<script>
    //查看未回复留言
    function run() {
        $.ajax({
            url: "<?php echo U('Message/messagenoanswer');?>",
            type: 'post',
            dataType: 'JSON',
            async : false,
            success:function(data){
                if(data.status==1){
                    $('#mes').text(data.info)
                }else{
                    clearInterval(time);
                    return;
                }
            }
        })
    };
    // run();
     var time = setInterval(run,3000);
</script>