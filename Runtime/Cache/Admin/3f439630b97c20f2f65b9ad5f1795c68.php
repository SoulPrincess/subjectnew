<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>标题</title>
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
                <a lay-href="">应用</a><span lay-separator="">/</span>
                <a><cite>营销系统</cite></a><span lay-separator="">/</span>
                <a><cite>SEO</cite></a>
            </div>
        </div><div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                    <div class="layui-form-item">
                        <button class="layui-btn">参数设置</button>
                        <button class="layui-btn layui-btn-primary op">静态页面</button>
                        <button class="layui-btn layui-btn-primary op">站内锚文本</button>
                        <button class="layui-btn layui-btn-primary op">SiteMap</button>

                    </div>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show layui-form" lay-filter="canshu">
                        <blockquote class="layui-elem-quote layui-text">
                            页面Title设置
                        </blockquote>
                        <div class="layui-card-body" pad15="">

                            <div class="layui-form" lay-filter="">
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet">首页标题</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="home_title" value="<?php echo ($seo_canshu['home_title']); ?>" placeholder="请输入" autocomplete="off" class="layui-input">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">留空则采用网站关键词+网站名称的构成方式</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">页面标题</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="page_title" value="0" <?php echo ($seo_canshu['page_title']==0?'checked':''); ?> title="内容标题"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>内容标题</div></div>
                                        <input type="radio" name="page_title" value="1" title="内容标题+网站关键词" <?php echo ($seo_canshu['page_title']==1?'checked':''); ?>><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>内容标题+网站关键词</div></div>
                                        <input type="radio" name="page_title" value="2" title="内容标题+网站名称" <?php echo ($seo_canshu['page_title']==2?'checked':''); ?>><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>内容标题+网站名称</div></div>
                                        <input type="radio" name="page_title" value="3" title="内容标题+网站关键词+网站名称" <?php echo ($seo_canshu['page_title']==3?'checked':''); ?>><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>内容标题+网站关键词+网站名称</div></div>
                                        <div class=" layui-form-radio layui-word-aux cur">
                                            <div>页面标题(title)构成方式，您也可以在编辑器/添加内容时自定义对应页面的标题（title）</div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <blockquote class="layui-elem-quote layui-text">
                            关键词设置
                        </blockquote>
                        <div class="layui-card-body" pad15="">
                            <div class="layui-form" lay-filter="">
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet">图片默认Alt</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="pickey" value="<?php echo ($seo_canshu['pickey']); ?>" placeholder="图片关键词" autocomplete="off" class="layui-input">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">鼠标移至图片显示的文字</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet">超链接默认Title</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="hyperlinkkey" value="<?php echo ($seo_canshu['hyperlinkkey']); ?>" placeholder="链接关键词" autocomplete="off" class="layui-input">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">鼠标移至超链接显示的文字</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelSet">友情链接本站名称</label>
                                        <div class="layui-input-inline ">
                                            <input type="text" name="linkkey" value="<?php echo ($seo_canshu['linkkey']); ?>" placeholder="某某公司" autocomplete="off" class="layui-input">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">显示在前台友情链接申请页面中</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <blockquote class="layui-elem-quote layui-text">
                            优化文字设置（可用于增加关键词密度）
                        </blockquote>
                        <div class="layui-row layui-col-space10 word" >
                            <div class="layui-col-md2 layui-text-l">
                                网站底部优化字
                            </div>
                            <div class="layui-col-md10">
                                <textarea id="footer_seo" style="display: none;"><?php echo ($seo_canshu['footer_seo']); ?></textarea>
                            </div>
                        </div>
                        <div class="layui-row layui-col-space10 word" >
                            <div class="layui-col-md2 layui-text-l">
                                头部优化字
                            </div>
                            <div class="layui-col-md10">
                                <textarea id="header_seo" style="display: none;"><?php echo ($seo_canshu['header_seo']); ?></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item Ontheborder">
                            <div class="layui-input-inline ">
                                <button class="layui-btn" lay-filter="canshu" lay-submit="canshu"> 保存</button>
                            </div>
                        </div>
                    </div>
                    <div class="layui-tab-item layui-form" lay-filter="static_save">
                        <blockquote class="layui-elem-quote layui-text">
                            功能设置
                        </blockquote>
                        <div class="layui-card-body" pad15="">

                            <div class="layui-form" lay-filter="">
                                <div class="layui-form-item">
                                    <label class="layui-form-labelStatic">伪静态化</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="switch" value="开启" title="开启"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>开启</div></div>
                                        <input type="radio" name="switch" value="关闭" title="关闭"><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>关闭</div></div>
                                        <div class=" layui-form-radio layui-word-aux cur"><div>开启后能够简化前台页面URL（网址），并且以HTML结尾</div></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <h2 class="layui-colla-titleStatic">
                            开启伪静态化需空间环境配置开启mod_rewrite模块，如没有开启则联系空间商解决
                        </h2>
                        <blockquote class="layui-elem-quote layui-text">
                            URL构成方式
                        </blockquote>
                        <div class="layui-card-body" pad15="">
                            <div class="layui-form" lay-filter="">
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">首页</label>
                                        <div class="layui-input-inline ">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">index-语言标识.html(如：index-cn.html)</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">列表页</label>
                                        <div class="layui-input-inline ">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">目录名称/list-静态页面或ID-语言标识.html(如：product/list-1-cn.html)</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-labelStatic">内容页</label>
                                        <div class="layui-input-inline ">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">目录名称/静态页面或ID-语言标识.html(如：product/-cn.html)</div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-inline empty">
                                        <label class="layui-form-labelStatic">伪静态规则</label>
                                        <a href="<?php echo U('marketing/pseudostatic');?>" target="_blank" >伪静态规则</a>
                                        <div class="layui-form-mid layui-word-aux">部分空间需要手动设置伪静态规则</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <h2 class="layui-colla-titleStatic">
                            上面是伪静态相关设置，如果非得UR静态化，伪静态是推荐的做法，甚至可以不用URL静态化，对于发展至今的搜搜
                            引擎来说,URL静态化并不比动态URL优秀。针对于还在使用纯静态页面的用户，可以从下面进入设置
                        </h2>
                        <div class="layui-card-body" pad15="">
                            <div class="layui-form" lay-filter="">
                                <div class="layui-form-item">
                                    <div class="layui-inline empty">
                                        <label class="layui-form-labelStatic">静态页面</label>
                                        <a href="javascript:void(0);" id="setStai">设置静态页面</a>
                                        <div class="layui-form-mid layui-word-aux">针对于还在使用纯静态页面的老站，新站不推荐</div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="layui-form-item Ontheborder">

                            <div class="layui-input-inline ">
                                <button class="layui-btn" lay-filter="static_save" lay-submit="static_save"> 保存</button>
                            </div>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <blockquote class="layui-elem-quote layui-text">
                            仅作用于前台页面中的内容文字，比如文章详情页内容文字。
                        </blockquote>
                        <table class="layui-hide" id="anchort"  lay-filter="anchort"></table>
                    </div>
                    <div class="layui-tab-item layui-form" lay-filter="map_save">
                        <blockquote class="layui-elem-quote layui-text">
                            功能设置 <a href="#">怎样提交给搜索引擎？</a>
                        </blockquote>
                        <div class="layui-card-body" pad15="">

                            <div class="layui-form" lay-filter="">
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">自动生成</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="auto" value="0" title="开启" <?php echo ($seo_sitemap['auto']==0?'checked':''); ?>><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>开启</div></div>
                                        <input type="radio" name="auto" value="1" title="关闭" <?php echo ($seo_sitemap['auto']==1?'checked':''); ?>><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>关闭</div></div>
                                        <div class=" layui-form-radio layui-word-aux cur"><div>更新内容时候自动更新网站地图</div></div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">过滤栏目及内容</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="filtration" value="0" title="过滤不显示在导航的一级栏目" <?php echo ($seo_sitemap['filtration']==0?'checked':''); ?>><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>过滤不显示在导航的一级栏目</div></div>
                                        <input type="radio" name="filtration" value="1" title="过滤外部模块" <?php echo ($seo_sitemap['filtration']==1?'checked':''); ?>><div class="layui-unselect layui-form-radio " ><i class="layui-anim layui-icon"></i><div>过滤外部模块</div></div>
                                        <div class=" layui-form-radio layui-word-aux cur"><div>网站地图生成的栏目仅限一级栏目和显示在导航栏上的栏目。不显示内容与栏目，都不会再网站地图中生成。</div></div>

                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">网站语言范围</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="language" value="0" title="所有语言" <?php echo ($seo_sitemap['language']==0?'checked':''); ?>><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>所有语言</div></div>
                                        <input type="radio" name="language" value="1" title="当前语言" <?php echo ($seo_sitemap['language']==1?'checked':''); ?>><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>当前语言</div></div>
                                        <div class=" layui-form-radio layui-word-aux cur"><div>仅生成勾选语言的网站地图</div></div>

                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-labelSet">Sitemap</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="site_map" value="0" title="xml网站地图" <?php echo ($seo_sitemap['site_map']==0?'checked':''); ?>><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>xml网站地图</div></div>
                                        <div class=" layui-form-radio layui-word-aux cur"><div>适合谷歌和百度，地图网址 http://www.gucheng.com/sitemap.xml</div></div>
                                        <input type="radio" name="site_map" value="1" title="txt网站地图" <?php echo ($seo_sitemap['site_map']==1?'checked':''); ?>><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>txt网站地图</div></div>
                                        <div class=" layui-form-radio layui-word-aux cur"><div>适合雅虎，地图网址 http://www.gucheng.com/sitemap.txt</div></div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="layui-form-item Ontheborder">

                            <div class="layui-input-inline ">
                                <button class="layui-btn" lay-filter="map_save" lay-submit="map_save"> 保存</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>
    <script>

        layui.use(['layer','form'],function () {
            var layer = layui.layer,form=layui.form;
            $('#setStai').on('click',function () {
                $.ajax({
                    url: "<?php echo U('marketing/static_site');?>",
                    type: 'get',
                    success: function (data) {
                        var info=data.info;
                        form.val('static_page',{
                            'static_switch':info.static_switch,
                            'static_list_name':info.static_list_name,
                            'static_list_type':info.static_list_type,
                            'static_page_name':info.static_page_name,
                            'static_page_type':info.static_page_type,
                            'static_type':info.static_type,
                        });
                        form.render();
                        if (data.status==1){
                            layer.open({
                                type: 1
                                ,title: false //不显示标题栏
                                ,closeBtn: true
                                ,area:"50%"
                                ,content: $("#Static_page_setup")
                                ,btnAlign: 'l'
                                ,skin:'my-skin',
                            });
                        }
                    }
                },'json');

            })
        });
        $('.layui-form-item>button').click(function () {
            $(this).removeClass('layui-btn-primary').siblings().addClass('layui-btn-primary')
            var _index = $(this).index();
            $('.layui-tab-item').eq(_index).addClass('layui-show').siblings().removeClass('layui-show');
        });
    </script>

    <script>

        layui.use('table', function(){
            var table = layui.table;

            table.render({
                elem: '#anchort'
                ,url:"<?php echo U('Marketing/anchor');?>"
                ,cellMinWidth: 80
                , toolbar: '#toolbarDemo'
                ,cols: [[
                    {type:'checkbox'}
                    ,{field:'old', title: '原文字'}
                    ,{field:'new', title: '替换为'} //width 支持：数字、百分比和不填写。你还可以通过 minWidth 参数局部定义当前单元格的最小宽度，layui 2.2.1 新增
                    ,{field:'title', title: 'Title'}
                    ,{field:'linkurl', title: '链接地址'}
                    ,{field:'count', title: '替换次数'}
                    ,{field:'city', title: '操作',toolbar:'#barDemo'}
                ]]
            });
            //头工具栏事件
            table.on('toolbar(anchort)', function (obj) {
                var checkStatus = table.checkStatus(obj.config.id);
                if (obj.event == 'type_add') {
                    layer.open({
                        type: 2,
                        title: '添加锚文本',
                        content:"<?php echo U('marketing/anchoradd');?>",
                        area: ['80%', '55%'],
                        end: function () {
                            table.reload('anchort', {
                                where: {

                                },
                                page: {
                                    curr: 1
                                }
                            });
                        }
                    })
                }
                if (obj.event == 'type_del') {
                    var arr = [];
                    var data = checkStatus.data;
                    for (var i = 0; i < data.length; i++) {    //循环筛选出id
                        arr.push(data[i].id);
                        layer.alert(data[i].id)
                    }
                    if (arr.length != 0) {
                        layer.confirm('真的删除吗，此操作不能撤销！', function (index) {
                            //向服务端发送删除指令
                            layui.$.post(
                                "<?php echo U('marketing/anchordel');?>",
                                { arr: arr },
                                function (data, status) {
                                    if (data.status==1) {
                                        layer.msg(data.info);
                                        //更新数据
                                        table.reload('anchort', {
                                            where: {

                                            },
                                            page: {
                                                curr: 1
                                            }
                                        });
                                    }
                                    else {
                                        layer.msg(data.info);
                                    }
                                }
                            )
                        });
                    }
                    else {
                        layer.msg("请先选中!")
                    }
                }
            });
            //监听工具条
            table.on('tool(anchort)', function (obj) {
                var data = obj.data;
                var layEvent = obj.event;
                var tr = obj.tr;
                var arr=new Array(data.id);
                if (layEvent == 'edit') {
                    layer.open({
                        type: 2,
                        title: '编辑锚文本',
                        content:"<?php echo U('marketing/anchorupdate');?>?id="+ data.id,
                        area: ['80%', '60%'],
                        end: function () {
                            table.reload('anchort', {
                                where: {

                                },
                                page: {
                                    curr: 1
                                }
                            });
                        }
                    })
                }
                if (layEvent == 'del') {
                    layer.confirm('真的删除吗，此操作不能撤销！', function (index) {
                        //向服务端发送删除指令
                        layui.$.post(
                            "<?php echo U('marketing/anchordel');?>",
                            { arr: arr },
                            function (data, status) {
                                if (data.status) {
                                    layer.msg(data.info);
                                    obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                    layer.close(index);
                                }
                                else {
                                    layer.msg(data.info);
                                }
                            }
                        )
                    });
                }
                if (layEvent === 'stop') {
                    layui.$.post(
                        "<?php echo U('marketing/anchorstatus');?>",
                        {
                            id: data.id,
                            off: data.lock
                        },
                        function (data, status) {
                            if (data.status==1) {
                                layer.msg(data.info,{time:1500},function(){
                                    //更新数据
                                    table.reload('anchort', {
                                        where: {

                                        },
                                        page: {
                                            curr: 1
                                        }
                                    });
                                    layer.closeAll();
                                });

                            }
                            else {
                                layer.msg(data.info);
                            }
                        }
                    )
                }
            });
        });
    </script>
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <button class="layui-btn layuiadmin-btn-list" lay-event="type_del" data-type="type_del">删除</button>
            <button data-method="notice" id="type_add" lay-event="type_add" class="layui-btn">添加</button>
        </div>
    </script>
    <script type="text/html" id="barDemo">
        {{#  if(d.lock == 0){ }}
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">禁用</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } else { }}
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-xs" style="background-color:#c0c2c5" lay-event="stop">显示</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        {{#  } }}
    </script>
    <div class="layui-card" id="Static_page_setup" style="display: none">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <button class="layui-btn-searchSetup layui-btn-searchSetupBg">静态页面设置</button>
                    <button class="layui-btn-searchSetup ">静态页面生成</button>
                </div>
            </div>
        </div>
        <div class="layui-tab-content">
            <div class="layui-tab-item item layui-show layui-form" lay-filter="static_page">
                <blockquote class="layui-elem-quote layui-text">
                    功能设置
                </blockquote>
                <div class="layui-card-body" pad15="">

                    <div class="layui-form" lay-filter="">
                        <div class="layui-form-item">
                            <label class="layui-form-labelSet">静态页面开启</label>
                            <div class="layui-input-block">
                                <input type="radio" name="static_switch" value="关闭" title="关闭" ><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>关闭</div></div>
                                <input type="radio" name="static_switch" value="首页、内容页面静态化" title="首页、内容页面静态化" ><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>首页、内容页面静态化</div></div>
                                <input type="radio" name="static_switch" value="全站静态化" title="全站静态化" ><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>全站静态化</div></div>
                                <div class=" layui-form-radio layui-word-aux cur"><div>首次开启请点击 “静态页面生成” 生成全部页面 </div></div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-labelSet">生成方式</label>
                            <div class="layui-input-block">
                                <input type="radio" name="static_type" value="内容信息变动时自动生成" title="内容信息变动时自动生成"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>内容信息变动时自动生成</div></div>
                                <input type="radio" name="static_type" value="手动生成" title="手动生成"><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>手动生成</div></div>
                                <div class=" layui-form-radio layui-word-aux cur"><div>仅内容管理相关操作能自动生成，其它后台设置修改后如前台无改变需要手动生成 </div></div>
                            </div>
                        </div>

                    </div>

                </div>
                <blockquote class="layui-elem-quote layui-text">
                    静态页面名称规则
                </blockquote>
                <div class="layui-card-body" pad15="">
                    <div class="layui-form" lay-filter="">
                        <div class="layui-form-item">
                            <label class="layui-form-labelSet">静态页面类型</label>
                            <div class="layui-input-block">
                                <input type="radio" name="static_page_type" value="htm" title="htm"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>htm</div></div>
                                <input type="radio" name="static_page_type" value=".html" title=".html"><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>.html</div></div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-labelSet">内容页面名称</label>
                            <div class="layui-input-block">
                                <input type="radio" name="static_page_name" value="默认文件名+ID（如showproduct10）" title="默认文件名+ID（如showproduct10）"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>默认文件名+ID（如showproduct10）</div></div>
                                <input type="radio" name="static_page_name" value="年月日+ID（如200081510）" title="年月日+ID（如200081510）"><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>年月日+ID（如200081510）</div></div>
                                <input type="radio" name="static_page_name" value="所在文件夹名称+ID（如product10）" title="所在文件夹名称+ID（如product10）"><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>所在文件夹名称+ID（如product10）</div></div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-labelSet">列表页面类型</label>
                            <div class="layui-input-block">
                                <input type="radio" name="static_list_type" value="显示所有栏目ID（如product_1_2_3）" title="显示所有栏目ID（如product_1_2_3）"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>显示所有栏目ID（如product_1_2_3）</div></div>
                                <input type="radio" name="static_list_type" value="只显示本栏目ID（如product_1）" title="只显示本栏目ID（如product_1）"><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>只显示本栏目ID（如product_1）</div></div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-labelSet">列表页面名称</label>
                            <div class="layui-input-block">
                                <input type="radio" name="static_list_name" value="默认文件名+class+页码（如product_1_1）" title="默认文件名+class+页码（如product_1_1）"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>默认文件名+class+页码（如product_1_1）</div></div>
                                <input type="radio" name="static_list_name" value="所在文件夹名称+class+页码（如software）" title="所在文件夹名称+class+页码（如software）"><div class="layui-unselect layui-form-radio "><i class="layui-anim layui-icon"></i><div>所在文件夹名称+class+页码（如software）</div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item Ontheborder">
                    <div class="layui-input-inline ">
                        <button class="layui-btn" lay-filter="static_page" lay-submit="static_page"> 保存</button>
                    </div>
                </div>
            </div>
            <div class="layui-tab-item item ">
                <div class="layui-card-body" pad15="">
                    <div class="layui-form" lay-filter="">
                        <div class="layui-input-inline ">
                            <button class="layui-btn" lay-filter="static_create" lay-submit="static_create" id="static_create"> 生成</button>
                            <button class="layui-btn" lay-filter="static_download" lay-submit="static_download" id="static_download"> 下载</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script>
        $('.layui-btn-searchSetup').click(function () {
            $(this).addClass('layui-btn-searchSetupBg').siblings().removeClass('layui-btn-searchSetupBg')
            var _index = $(this).index();
            $('.item').eq(_index).addClass('layui-show').siblings().removeClass('layui-show');
        })
    </script>
    <script>
        layui.use(['form','layedit'], function () {
            var form = layui.form,layedit=layui.layedit;
            var header_seo = layedit.build('header_seo', {
                tool: ['code','strong','italic','underline','del','|','left' ,'center','right','link', 'unlink', 'face' ],//设置需要的控件
                height: 100 //设置高度
            }); //建立编辑器
            var footer_seo = layedit.build('footer_seo', {
                tool: ['code','strong','italic','underline','del','|','left' ,'center','right','link', 'unlink', 'face' ],//设置需要的控件
                height: 100 //设置高度
            }); //建立编辑器

            form.on('submit(canshu)', function (data) {
                //表单数据formData
                var formData = data.field;
                formData.header_seo = layedit.getContent(header_seo);
                formData.footer_seo = layedit.getContent(footer_seo);
                $.ajax({
                    url: "<?php echo U('marketing/seoinfo');?>",
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
        layui.use(['form','layedit'], function () {
            var form = layui.form;

            form.on('submit(map_save)', function (data) {
                //表单数据formData
                var formData = data.field;
                $.ajax({
                    url: "<?php echo U('marketing/sitemap');?>",
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
        layui.use(['form','layedit'], function () {
            var form = layui.form;
            form.on('submit(static_page)', function (data) {
                //表单数据formData
                var formData = data.field;
                $.ajax({
                    url: "<?php echo U('marketing/static_site');?>",
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
            $.ajax({
                url: "<?php echo U('marketing/static_save');?>",
                type: 'get',
                success: function (data) {
                    var info=data.info;
                    form.val('static_save',{
                        'switch':info.switch
                    });
                    form.render();
                }
            },'json');
            form.on('submit(static_save)', function (data) {
                //表单数据formData
                var formData = data.field;
                $.ajax({
                    url: "<?php echo U('marketing/static_save');?>",
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
        layui.use('layer',function () {
            var layer = layui.layer;
            //生成静态页面
            $('#static_create').on('click',function () {
                layer.load();
                $.ajax({
                    url: "<?php echo U('marketing/sethtmlall');?>",
                    type: 'post',
                    success: function (data) {console.log(data);
                        if (data.status==1) {
                            layer.closeAll();
                            layer.msg(data.info,{time:1500},function () {
                                window.parent.location.reload();//刷新父页面
                            });
                        }
                        else {
                            layer.msg(data.info)
                        }
                    }
                },'json');
            });
            //下载静态页面
            $('#static_download').on('click',function () {
                $.ajax({
                    url: "<?php echo U('marketing/download_static');?>",
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
            })
        });
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