<?php if (!defined('THINK_PATH')) exit();?>﻿
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="UTF-8" http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>无权限</title>

    <style type="text/css">
        .head404 {
            width: 508px;
            height: 315px;
            margin: 50px auto 0 auto;
            background: url('/Public/admin/img/rule.jpg') no-repeat;
        }

        .txtbg404 {
            width: 499px;
            height: 169px;
            margin: 10px auto 0 auto;
        }

            .txtbg404 .txtbox {
                width: 390px;
                position: relative;
                top: 30px;
                left: 60px;
                color: #000000;
                font-size: 13px;
            }

                .txtbg404 .txtbox p {
                    margin: 5px 0;
                    line-height: 18px;
                }

                .txtbg404 .txtbox .paddingbox {
                    padding-top: 15px;
                }

                .txtbg404 .txtbox p a {
                    color: #000000;
                    text-decoration: none;
                }

                    .txtbg404 .txtbox p a:hover {
                        color: #FC9D1D;
                        text-decoration: underline;
                    }
    </style>

</head>



<body bgcolor="#f8f8f8">

    <div class="head404"></div>

    <div class="txtbg404">

        <div class="txtbox">

            <p>对不起，您没有访问权限，请联系管理员设置~</p>

            <p class="paddingbox">请点击以下链接继续浏览网页</p>

            <p>》<a style="cursor:pointer" onclick="history.back()">返回上一页面</a></p>

            <p>》<a href="/Home/Index">返回网站首页</a></p>

        </div>

    </div>

</body>

</html>