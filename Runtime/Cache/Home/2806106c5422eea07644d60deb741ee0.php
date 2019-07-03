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
    <title>速沣科技-数字营销</title>
    <link rel="stylesheet" href="/Public/home/css/bootstrap.css">
    <link rel="stylesheet" href="/Public/home/css/templatemo-style.css">
    <link rel="stylesheet" href="/Public/home/css/font/iconfont.css">
    <link rel="stylesheet" href="/Public/home/css/animate.min.css">
    <script src="/Public/home/js/vendor/jquery-1.11.2.min.js"></script>
</head>
<body>
<!--The head of navigation-->

    

    
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

<div class="parallax-content baner-content baner-content-digital" >
    <div class="container">
        <div class="text-content  wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
            <h2>AI+IQ</h2>
            <h2>互联网+大数据+人工智能</h2>
            <p>全面提升企业精准营销</p>
        </div>
        <div class="primary-white-button  wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
            <a href="javascript:void (0);" class=" scroll-link scroll-jump" data-id="about">了解详情</a>
        </div>
        <a href="<?php echo U('index/digital_marketing');?>" class="parallax-down"><img src="/Public/home/img/down.png" alt=""></a>
    </div>
</div>
<!--The head of navigation-->

<!--How to realize online and offline multi-touch fusion and collect multi-dimensional customer data in full-->
<section class="page-section">
    <div class="container">
        <div class="text-content  wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
            <h3 class="text-content-color h3-fear"><?php echo (htmlspecialchars_decode($marketing['info']['title'])); ?></h3>
            <p class="text-content-color p-fear"><?php echo (htmlspecialchars_decode($marketing['info']['entitle'])); ?></p>
        </div>
        <div class="solution  wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
            <div class="worth-item">
                <img src="/Public/home/img/subpage/channel.png"  alt="">
            </div>
            <div class="worth-item-add">
                <p>+</p>
            </div>
            <div class="worth-item">
                <img src="/Public/home/img/subpage/crowd.png" alt="">
            </div>
            <div class="col-xs-12 col-sm-6">
            </div>
            <div class="col-xs-12 col-sm-6">
                <p>+</p>
            </div>
            <div class="worth-item">
                <img src="/Public/home/img/subpage/market.png" alt="">
            </div>
            <div class="worth-item-add">
                <p>=</p>
            </div>
            <div class="worth-item">
                <img src="/Public/home/img/subpage/creative.png"  alt="">
            </div>

        </div>
    </div>
</section>
<!--How to realize online and offline multi-touch fusion and collect multi-dimensional customer data in full-->
<!--Digital marketing creates a unique marketing experience for each customer-->
<section class="page-section">
    <div class="container">
        <div class="text-content  wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
            <h3 class="text-content-color h3-fear"><?php echo (htmlspecialchars_decode($marketing2['info']['title'])); ?></h3>
            <p class="text-content-color"><?php echo (htmlspecialchars_decode($marketing2['info']['entitle'])); ?></p>
        </div>
        <div class="solution">
            <div class="col-xs-12 col-sm-6 market-numR wow animated bounceInLeft"  data-wow-duration="1.5s" data-wow-delay="0.2s">
                <img src="<?php echo ($marketing3['info'][0]['rmationimg']); ?>" alt="">
            </div>
            <div class="col-xs-12 col-sm-6 market-numL wow animated bounceInRight"  data-wow-duration="1.5s" data-wow-delay="0.2s">
                <img src="<?php echo ($marketing3['info'][1]['rmationimg']); ?>" alt="">
            </div>
        </div>
    </div>
</section>
<!--Digital marketing creates a unique marketing experience for each customer-->
<!--In the sea of data we can help you to achieve-->
<section class="page-section">
    <div class="container">
        <div class="text-content wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
            <h3 class="text-content-color h3-fear"><?php echo (htmlspecialchars_decode($marketing4['info']['title'])); ?></h3>
        </div>
        <div class="solution  wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
            <div class="worth-item">
                <img src="/Public/home/img/subpage/drive.png"  alt="">
            </div>
            <div class="worth-item-add">
                <img src="/Public/home/img/subpage/left-ico.png"  alt="">
                <span>数据挖掘</span>
            </div>
            <div class="worth-item">
                <img src="/Public/home/img/subpage/integration.png" alt="">
            </div>
            <div class="col-xs-12 col-sm-6">
            </div>
            <div class="col-xs-12 col-sm-6 worth-item-add-img">
                <img src="/Public/home/img/subpage/down-ico.png" alt="">
            </div>
            <div class="worth-item">
                <img src="/Public/home/img/subpage/scheme.png"  alt="">

            </div>
            <div class="worth-item-add">
                <img src="/Public/home/img/subpage/right-ico.png" alt="">
            </div>
            <div class="worth-item">
                <img src="/Public/home/img/subpage/analyze.png" alt="">
            </div>

        </div>
    </div>
</section>
    <script>
        $('.worth-item').mouseenter(function () {
            var $this = $(this),
                current = $this.children('img').attr('src'),
                suffixQ = current.lastIndexOf('.png'),
                suffix = current.substr(current.lastIndexOf('.')),//获取后缀
                str = current.substr(0,suffixQ);
            $(this).children('img').attr('src',str+'-B'+suffix);
            // $(this).siblings().children('img').attr('src',str2+''+suffix)
        }).mouseleave(function () {
            var $this = $(this),
                current = $this.children('img').attr('src'),
                suffixQ = current.lastIndexOf('-B.png'),
                suffix = current.substr(current.lastIndexOf('.')),//获取后缀
                str = current.substr(0,suffixQ);
            $(this).children('img').attr('src',str+''+suffix);
        })
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
        $('#main-nav ul li').click(function(){

            $(this).addClass('nav-color').siblings().removeClass('nav-color');
            $('.content > div').eq($(this).index()).addClass('selected').siblings().removeClass('selected');
        })
    </script>
<!--In the sea of data we can help you to achieve-->







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
                        <a href="#">  <img src="<?php echo ($vo['rmationimg']); ?>" alt="<?php echo ($vo['title']); ?>"></a>
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
            url: "<?php echo U('TallyTotal/index');?>",
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
        $('#nb_nodeboard_close').removeClass('nb-nodeboard-max');
        $('#nb_nodeboard_text').css('display',"block");
        $('#nb_node_contain').css('display',"block");
        $('#nb_nodeboard_set').css('display',"block");
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