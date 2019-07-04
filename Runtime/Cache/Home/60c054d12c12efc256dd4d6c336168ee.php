<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Keywords" content="<?php echo C('wehsys.web')['keywords'];?>">
    <meta name="Description" content="<?php echo C('wehsys.web')['describe'];?>">
    <meta name="copyright" content="<?php echo C('wehsys.foot')['copyright'];?>">
    <link rel="icon" href="<?php echo C('wehsys.web')['urllogo'];?>">
    <title>速沣科技-首页</title>
    <link rel="stylesheet" href="/Public/home/css/bootstrap.css">
    <link rel="stylesheet" href="/Public/home/css/templatemo-style.css">
    <link rel="stylesheet" href="/Public/home/css/font/iconfont.css">
    <link rel="stylesheet" href="/Public/home/css/animate.min.css">
    <script src="/Public/home/js/vendor/jquery-1.11.2.min.js"></script>
</head>
<body>
<!--The head of navigation-->

    
<!--The head of navigation-->
<div class="cc" style="background-color: #2D2D2D">

    <div class="header">
        <div class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">切换导航</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand scroll-top">
                        <?php echo C('wehsys.web')['name'];?>
                    </a>
                </div>
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <?php if($navigation): if(is_array($navigation)): foreach($navigation as $k=>$vo): ?><li><a href="<?php echo U($vo['titleurl']);?>" class="<?php echo ($k==0?'scroll-top nav-color':'scroll-link'); ?>"><?php echo ($vo['name']); ?></a></li><?php endforeach; endif; endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div  class="parallax-content baner-content baner-content-index  wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s" id="home">
    <div class="home-address baner-content-index">
        <div class="container">
            <div class="text-content">
                <h2>互联网AI驱动，满足企业品牌数字化营销</h2>
                <p class="interactive">打通信息孤岛链接品牌与消费者互动，实时动态运营 数据收集—挖掘—分析—精准转化用户终端</p>
            </div>
            <div class="primary-white-button">
                <a href="javascript:void (0);" id="scroll-jump" class="scroll-jump" data-id="about">了解详情</a>
            </div>
            <a href="news_and_information_page.html" class="parallax-down"><img src="/Public/home/img/down.png" alt=""></a>
        </div>
    </div>
	</div>
    

</div>
 

<!--According to different product requirements of the enterprise, customized various solutions-->
<section class="page-section">
    <div class="container">
        <div class="text-content  wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
            <h3 class="text-content-color h3-fear"><?php echo ($index1['info']['title']); ?></h3>
			<p class="text-content-color p-fear"><?php echo ($index1['info']['entitle']); ?></p>
            <p class="text-content-color p-fear"><?php echo (strip_tags($index1['info']['describe'])); ?></p>
        </div>
        <div class="solution contetn-list  wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
            <ul class="">
                <?php if(is_array($index2[info])): foreach($index2[info] as $k=>$vo): ?><li class="col-sm-3 col-xs-12 content-list-w">
                        <div class="contetn-list-main">
                            <div class="contetn-list-main-1">
                                <div class="contetn-icon">
                                    <i class="iconfont icon-fangwei"><img src="<?php echo ($vo['rmationimg']); ?>" alt=""></i>
                                </div>
                                <h3 class="txt-hidden"><?php echo ($vo['title']); ?></h3>
                                <div class="main-hide">
                                    <a href="<?php echo U($vo['entitle']);?>" class="main-hide-btn">查看详情</a>
                                </div>
                            </div>
                        </div>
                    </li><?php endforeach; endif; ?>
                <div class="clear"></div>
            </ul>
        </div>
    </div>
</section>
<!--According to different product requirements of the enterprise, customized various solutions-->
<!--Our advantages-->
<section id="advantages">
    <div class="container">
        <div class="text-content wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
            <h3 class="h3-fear"><?php echo ($index3['smname']); ?></h3>
            <p><?php echo ($index3['describe']); ?></p>
        </div>
        <div class="advantages wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
            <?php if(is_array($index3[info])): foreach($index3[info] as $k=>$vo): ?><div class="col-md-4 col-sm-6 text-center">
                    <div class="advantages-icon  wow animated fadeInUp"  data-wow-duration="2s" data-wow-delay="0.2s ">
                        <img src="<?php echo ($vo['rmationimg']); ?>" alt="<?php echo ($vo['title']); ?>" data-key="<?php echo ($k); ?>">
                        <div class="icon-text"><?php echo ($vo['title']); ?></div>
                    </div>
                    <div class="advantages-content  wow animated fadeInUp"  data-wow-duration="2s" data-wow-delay="0.2s">
                        <p class="text-white"><?php echo (strip_tags($vo['miaoshu'])); ?></p>
                    </div>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
</section>
    <script src="/Public/home/js/canvas-particle.js"></script>
    <!--suspension-->
    <script type="text/javascript">
        window.onload = function() {
            //配置
            var config = {
                vx: 4,	//小球x轴速度,正为右，负为左
                vy: 4,	//小球y轴速度
                height: 2,	//小球高宽，其实为正方形，所以不宜太大
                width: 2,
                count: 200,		//点个数
                color: "121, 162, 185", 	//点颜色
                stroke: "130,255,255", 		//线条颜色
                dist: 6000, 	//点吸附距离
                e_dist: 20000, 	//鼠标吸附加速距离
                max_conn: 10 	//点到点最大连接数
            }

            //调用
            CanvasParticle(config);
        }
    </script>
    <script>
        $('.advantages-icon').mouseenter(function () {
            var $this = $(this),
                current = $this.children('img').attr('src'),
                key1 = $this.children('img').attr('data-key'),
                suffixQ = current.lastIndexOf('.png'),
                suffix = current.substr(current.lastIndexOf('.')),//获取后缀
                str = current.substr(0,suffixQ);
            var str1=<?php echo json_encode($index3[info])?>;
                var aa=str1[key1].futupian;
            $(this).children('img').attr('src',aa);
        }).mouseleave(function () {
            var $this = $(this),
                current = $this.children('img').attr('src'),
                key1 = $this.children('img').attr('data-key'),
                suffixQ = current.lastIndexOf('-B.png'),
                suffix = current.substr(current.lastIndexOf('.')),//获取后缀
                str = current.substr(0,suffixQ);
                var str1=<?php echo json_encode($index3[info])?>;
                var aa=str1[key1].rmationimg;
            $(this).children('img').attr('src',aa);
        })
    </script>
<!--Our advantages-->
 
<!--Our customers-->
<section id="customers">
    <div class="container">
        <div class="text-content wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
            <h2><?php echo ($our_customers['smname']); ?></h2>
            <p><?php echo ($our_customers['describe']); ?></p>
        </div>
        <div class="customers wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
            <?php if(is_array($our_customers['info'])): foreach($our_customers['info'] as $k=>$vo): ?><div class="col-xs-6 col-sm-3 text-center">
                    <div class="customers-icon">
                        <?php echo ($vo['describe']); ?>
                    </div>
                    <div class="customers-content <?php echo ($vo['entitle']); ?>">
                        <div class="customers-richtext ">
                            <h3><span class="text-white"><?php echo ($vo['title']); ?></span></h3>
                        </div>
                        <a href="#">  <img src="<?php echo ($vo['rmationimg']); ?>" alt="奢侈品"></a>
                        <?php if($k == 1|$k == 3): ?><span class="layerT"></span>
                        <?php else: ?>
                            <span class="layer"></span><?php endif; ?>
                    </div>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
</section>
<!--Our customers-->
<!--footer-->
<div class="footer text-center  wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
    <span class="text-white"><?php echo C('wehsys.foot')['copyright'];?></span>
</div>

<!--footer-->

<!--suspension-->
<section style="display:none">
    <!--Online communication-->
    <div class="counseling-communication  wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
        <div class="counselingR text-white">
            <h4>速沣科技</h4>
            <div class="counR-icon">
                <img src="/Public/home/img/float/open.png" alt="" class="unfold">
                <img src="/Public/home/img/float/off.png" alt=""  class="occlude">
            </div>
        </div>
        <div class="chatBox-kuang">
            <div class="chatBox-content">
                <div class="chatBox-content-demo" id="chatBox-content-demo">
                    <div class="clearfloat">
                        <div class="chat-mess">
                            <small>小沣正在与您对话</small> <small>14:05</small>
                        </div>
                        <small class="chat-color">上海速沣科技有限公司，涉及大数据、移动互联网、 图像识别，致力于数码智能防伪系统领域研发及企业数字化管理软件研发、提供一个企业级客户数据技术解决方案、整合了尖端的大数据、AI和区块链技术来解决企业品牌保护、营销、个性化和数据分析领域的问题。</small>
                    </div>
                    <div class="clearfloat">
                        <div class="author-name">
                            <small class="chat-date">小沣 14:05:18</small>
                        </div>
                        <div class="left">
                            <div class="chat-avatars"><img src="/Public/home/img/float/portrait.png" alt="头像"/></div>
                            <div id="chat-text" class="chat-message">
                                欢迎咨询速沣科技、我们将根据您的需求提供全方位的专业定制。
                            </div>
                        </div>
                    </div>
                    <div class="clearfloat">
                        <div class="author-name">
                            <small class="chat-date">2019-06-13 14:26:58</small>
                        </div>
                        <div class="right">
                            <div class="chat-message">嗯，适合做壁纸</div>
                            <div class="chat-avatars"><img src="/Public/home/img/float/icon02.png" alt="头像"/></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chatBox-send">
                <div class="chatBox-s">
                    <button id="chat-biaoqing" class="btn-default-styles">
                        <i class="iconfont icon-fabiaoqing"></i>
                    </button>
                    <label id="chat-tuxiang" title="发送图片" for="inputImage" class="btn-default-styles">
                        <input type="file" onchange="selectImg(this)" accept="image/jpg,image/jpeg,image/png" name="file" id="inputImage" class="hidden">
                        <i class="iconfont icon-tupian"></i>
                    </label>
                    <div class="biaoqing-photo">
                        <ul>
                            <li><span class="emoji-picker-image" style="background-position: -9px -18px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -40px -18px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -71px -18px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -102px -18px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -133px -18px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -164px -18px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -9px -52px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -40px -52px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -71px -52px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -102px -52px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -133px -52px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -164px -52px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -9px -86px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -40px -86px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -71px -86px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -102px -86px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -133px -86px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -164px -86px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -9px -120px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -40px -120px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -71px -120px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -102px -120px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -133px -120px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -164px -120px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -9px -154px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -40px -154px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -71px -154px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -102px -154px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -133px -154px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -164px -154px;"></span></li>
                        </ul>
                    </div>
                </div>
                <div class="div-t">
                    <div class="div-textarea" contenteditable="true"> 请输入...</div>
                </div>
                <button id="chat-fasong" class="btn-send" value="">发送</button>
            </div>
        </div>
    </div>
    <!--The side suspension-->
    <div class="side-suspension">
        <a id="consulting" class="list-group-item " role="button" title="在线咨询">
            <i class="iconfont icon-shouhoukefu"></i>
            <small>在线咨询</small>
        </a>
        <a id="plan" class="list-group-item"  role="button" target="_blank" title="获取方案">
            <i class="iconfont icon-wj-fa"></i>
            <small>获取方案</small>
        </a>
        <a id="way" class="list-group-item"  role="button" target="_blank" title="联系方式">
            <i class="iconfont icon-dianhua"></i>
            <small>联系方式</small>
        </a>

    </div>

</section>

</body>
<script src="/Public/home/js/wow.min.js"></script>
<script src="/Public/home/js/main.js"></script>

<script>
    $(function(){
        $.ajax({
            url: "<?php echo U('tallyTotal/index');?>",
            type: 'post'
        });
    });
    if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
        new WOW().init();
    };
</script>
<div id="baidu"></div>
<script type="text/javascript">
    setTimeout(function(){$('.qiao-icon-close').append("<span id='bdclick'></span>");$('#bdclick').click();},1000);
</script>
<script>
    var str="<?php echo C('websyscode.footcode');?>";
    var aa= str.replace(/&lt;/g, "<").replace(/&gt;/g, ">").replace(/&quot;/g, "'");
    $("#baidu").append(aa);
    $('.scroll-jump').click(function () {
	 //点击按钮时判断 百度商桥代码中的“我要咨询”按钮的元素是否存在，存在的话就执行一次点击事件
        if ($('#nb_icon_wrap').length > 0) {
            $('#nb_icon_wrap').click();
        }
    })
    $('#consulting').click(function () {
        $('.chatBox-kuang').css('display','block');
    })
    $('#plan').click(function () {
        $('.chatBox-kuang').css('display','block');
        $('#chat-text').html('获取方案请拨打021-5433-2712')
    })
    $('#way').click(function () {
        $('.chatBox-kuang').show();
        $('#chat-text').html('获取方案请拨打021-5433-2712咨询详情，您也可以留下您的电话号码，我们及时会与您电话联系。')
    })
    $('.unfold').click(function () {
        $('.chatBox-kuang').css('display','block');
        $(this).attr('src','/Public/home/img/float/open-d.png');
    })
    $('.tans').click(function () {
        $('.chatBox-kuang').css('display','block');
        $(this).attr('src','/Public/home/img/float/open-d.png');
    })
    $('.occlude').click(function () {
        $('.chatBox-kuang').css('display','none');
        $(this).siblings().attr('src','/Public/home/img/float/open.png')
    })

    screenFuc();
    function screenFuc() {
        var winWidth = $(window).innerWidth();
        if (winWidth <= 360) {
        } else {
            $(".chatBox-info").css("height", 600);
            $(".chatBox-content").css("height", 448);
            $(".chatBox-content-demo").css("height", 448);
            $(".chatBox-list").css("height", 600);
            $(".chatBox-kuang").css("height", 600);
            $(".div-textarea").css("width", 300);
        }
    }
    (window.onresize = function () {
        screenFuc();
    })();

    //      发送信息
    $("#chat-fasong").click(function () {
        var textContent = $(".div-textarea").html().replace(/[\n\r]/g, '<br>')
        if (textContent != "") {
            $(".chatBox-content-demo").append("<div class=\"clearfloat\">" +
                "<div class=\"author-name\"><small class=\"chat-date\">2019-06-13 14:26:58</small> </div> " +
                "<div class=\"right\"> <div class=\"chat-message\"> " + textContent + " </div> " +
                "<div class=\"chat-avatars\"><img src=\"/Public/home/img/float/icon02.png\" alt=\"头像\" /></div> </div> </div>");
            //发送后清空输入框
            $(".div-textarea").html("");
            //聊天框默认最底部
            $(document).ready(function () {
                $("#chatBox-content-demo").scrollTop($("#chatBox-content-demo")[0].scrollHeight);
            });
        }
    });

    //      发送表情
    $("#chat-biaoqing").click(function () {
        $(".biaoqing-photo").toggle();
    });
    $(document).click(function () {
        $(".biaoqing-photo").css("display", "none");
    });
    $("#chat-biaoqing").click(function (event) {
        event.stopPropagation();//阻止事件
    });

    $(".emoji-picker-image").each(function () {
        $(this).click(function () {
            var bq = $(this).parent().html();
            console.log(bq)
            $(".chatBox-content-demo").append("<div class=\"clearfloat\">" +
                "<div class=\"author-name\"><small class=\"chat-date\">2019-06-13 14:26:58</small> </div> " +
                "<div class=\"right\"> <div class=\"chat-message\"> " + bq + " </div> " +
                "<div class=\"chat-avatars\"><img src=\"/Public/home/img/float/icon02.png\" alt=\"头像\" /></div> </div> </div>");
            //发送后关闭表情框
            $(".biaoqing-photo").toggle();
            //聊天框默认最底部
            $(document).ready(function () {
                $("#chatBox-content-demo").scrollTop($("#chatBox-content-demo")[0].scrollHeight);
            });
        })
    });

    //      发送图片
    function selectImg(pic) {
        if (!pic.files || !pic.files[0]) {
            return;
        }
        var reader = new FileReader();
        reader.onload = function (evt) {
            var images = evt.target.result;
            $(".chatBox-content-demo").append("<div class=\"clearfloat\">" +
                "<div class=\"author-name\"><small class=\"chat-date\">2019-06-13 14:26:58</small> </div> " +
                "<div class=\"right\"> <div class=\"chat-message\"><img src=" + images + "></div> " +
                "<div class=\"chat-avatars\"><img src=\"/Public/home/img/float/icon02.png\" alt=\"头像\" /></div> </div> </div>");
            //聊天框默认最底部
            $(document).ready(function () {
                $("#chatBox-content-demo").scrollTop($("#chatBox-content-demo")[0].scrollHeight);
            });
        };
        reader.readAsDataURL(pic.files[0]);

    }


</script>
<script>


    $('.bit').mouseenter(function () {
        var $this = $(this),
            layer = $this.children('span').remove();
        $('.Luxury,.FMCG').append('<span class="layer"></span>');
        $('.Industrial').append('<span class="layerT"></span>')
        $(layer);
    }).mouseleave(function () {
        var $this = $(this),
            layer = $this.append('<span class="layerT"></span>');
        $(layer);
        $(this).children('span').remove();
    })
    $('.Luxury').mouseenter(function () {
        var $this = $(this),
            layer = $this.children('span').remove();
        $('.FMCG').append('<span class="layer"></span>');
        $('.bit,.Industrial').append('<span class="layerT"></span>')
        $(layer);
    }).mouseleave(function () {
        var $this = $(this),
            layer = $this.append('<span class="layerT"></span>');
        $(layer);
        $(this).children('span').remove();
    })
    $('.Industrial').mouseenter(function () {
        var $this = $(this),
            layer = $this.children('span').remove();
        $('.Luxury,.FMCG').append('<span class="layer"></span>');
        $('.bit').append('<span class="layerT"></span>')
        $(layer);
    }).mouseleave(function () {
        var $this = $(this),
            layer = $this.append('<span class="layerT"></span>');
        $(layer);
        $(this).children('span').remove();
    })
    $('.FMCG').mouseenter(function () {
        var $this = $(this),
            layer = $this.children('span').remove();
        $('.Luxury').append('<span class="layer"></span>');
        $('.bit,.Industrial').append('<span class="layerT"></span>')
        $(layer);
    }).mouseleave(function () {
        var $this = $(this),
            layer = $this.append('<span class="layerT"></span>');
        $(layer);
        $(this).children('span').remove();
    })
    var url=window.location.pathname;
    console.log();
    $('#main-nav ul li a').each(function(i,n){

        if($(n).attr('href')==url){
            $(n).addClass('nav-color').siblings().removeClass('nav-color');
        }else{
            $(n).removeClass('nav-color')
        }
    });
    $('#main-nav ul li a').click(function(){

        $(this).addClass('nav-color').siblings().removeClass('nav-color');
        $('.content > div').eq($(this).index()).addClass('selected').siblings().removeClass('selected');
    })
</script>
</html>