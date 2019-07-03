$('.main-nav').on('click', 'li', function() {
	$(this).siblings().removeClass('current').end().addClass('current');
	$('#iframe').attr('src', $(this).attr('data-src'));
});

$(window).resize(function(e) {
	$("#bd").height($(window).height() - $("#hd").height() - $("#ft").height() - 6);
	$(".wrap").height($("#bd").height() - 6);
	$("#iframe").height($(window).height() - $("#hd").height() - $("#ft").height() - 6);
}).resize();

/*左侧菜单点击*/
//$(".nav").on("click", "li", function() {
//	$(this).siblings().removeClass("current");
//	$(this).siblings().removeClass("hasChild");
//
//	$(this).addClass("current");
//	$(this).addClass("hasChild");
//});

/*左侧菜单点击*/
//$(".nav").on("click", "li", function() {
//	$(this).siblings().removeClass("current");
//	$(this).addClass("current");
//});

//高亮导航
$(".sidebar .nav li").click(function() {
	$(this).siblings().removeClass("current hasChild");
	$(this).addClass("current hasChild");
});

//设置菜单区域和iframe高度
$(window).resize(function(e) {
	//  $("#bd").height($(window).height() - 6);
	$(".wrap").height($("#bd").height() - 6);
	$(".nav").css("minHeight", $(".sidebar").height() - $(".sidebar-header").height() - 1);
	$("#iframe").height($(window).height() - 111);
}).resize();

$(".nav>li").css({
	"borderColor": "#dbe9f1"
});
$(".nav>.current").prev().css({
	"borderColor": "#7ac47f"
});
$(".nav").on("click", "li", function(e) {
	var aurl = $(this).find("a").attr("data-src");
	$("#iframe").attr("src", aurl);
	$(".nav>li").css({
		"borderColor": "#dbe9f1"
	});
	$(".nav>.current").prev().css({
		"borderColor": "#7ac47f"
	});
	return false;
});

//清除缓存
$(".clearCache").click(function() {
	window.sessionStorage.clear();
	window.localStorage.clear();
	var index = layer.msg('清除缓存中，请稍候', {
		icon: 16,
		time: false,
		shade: 0.8
	});
	setTimeout(function() {
		layer.close(index);
		layer.msg("缓存清除成功！");
	}, 1000);
})

//锁屏
function lockPage() {
	layer.open({
		title: false,
		type: 1,
		content: '<div class="admin-header-lock" id="lock-box">' +
			'<div class="admin-header-lock-img"><img src="images/face.jpg" class="userAvatar"/></div>' +
			'<div class="admin-header-lock-name" id="lockUserName">驊驊龔頾</div>' +
			'<div class="input_btn">' +
			'<input type="password" class="admin-header-lock-input layui-input" autocomplete="off" placeholder="请输入密码解锁.." name="lockPwd" id="lockPwd" />' +
			'<button class="layui-btn" id="unlock">解锁</button>' +
			'</div>' +
			'<p>请输入“123456”，否则不会解锁成功哦！！！</p>' +
			'</div>',
		closeBtn: 0,
		shade: 0.9,
		success: function() {
			//判断是否设置过头像，如果设置过则修改顶部、左侧和个人资料中的头像，否则使用默认头像
			if(window.sessionStorage.getItem('userFace') && $(".userAvatar").length > 0) {
				$(".userAvatar").attr("src", $(".userAvatar").attr("src").split("images/")[0] + "images/" + window.sessionStorage.getItem('userFace').split("images/")[1]);
			}
		}
	})
	$(".admin-header-lock-input").focus();
}

$(".lockcms").on("click", function() {
	window.sessionStorage.setItem("lockcms", true);
	lockPage();
})

// 判断是否显示锁屏
if(window.sessionStorage.getItem("lockcms") == "true") {
	lockPage();
}

// 解锁
$("body").on("click", "#unlock", function() {
	if($(this).siblings(".admin-header-lock-input").val() == '') {
		layer.msg("请输入解锁密码！");
		$(this).siblings(".admin-header-lock-input").focus();
	} else {
		if($(this).siblings(".admin-header-lock-input").val() == "123456") {
			window.sessionStorage.setItem("lockcms", false);
			$(this).siblings(".admin-header-lock-input").val('');
			layer.closeAll("page");
		} else {
			layer.msg("密码错误，请重新输入！");
			$(this).siblings(".admin-header-lock-input").val('').focus();
		}
	}
});

$(document).on('keydown', function(event) {
	var event = event || window.event;
	if(event.keyCode == 13) {
		$("#unlock").click();
	}
});





/*关闭弹出框口*/
function layer_close() {
	var index = parent.layer.getFrameIndex(window.name);
	parent.layer.close(index);
}



/*重置表单  onclick="clearForm(this)"  */
function clearForm(obj) {
	var form = $(obj).parents("form");
	$(form)[0].reset();
	// $("[name='bigId']").val("");// 设置地址之后进行查询
}


//关闭页面
function CloseWin(v){
	//先得到当前iframe层的索引
	var index = parent.layer.getFrameIndex(window.name);
	//如果真就刷新父页
	if (v == true) {
		parent.location.reload(); // 父页面刷新
	};
	parent.layer.close(index); //再执行关闭
};