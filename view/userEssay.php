<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="__ROOT__/css/userEssay.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/examineEssay.js"></script>
    <title>userEssay</title>
</head>
<body>
<header>
    <img src="__ROOT__/img/logo1.png" alt="图片无法加载">
    <form action="__ROOT__/index/Article/SearchArticle" method="post">
        <input type="text" placeholder=请输入关键字 class="sub" name="value">
        <button class="submit">搜索</button>
    </form>
</header>
<nav>
</nav>
<div class="text">
    <a href="/article/index/Admin/index">文章评论管理</a><br>
    <a href="/article/index/Article/allInformation">文章详细列表</a><br>
    <a href="/article/index/Article/addEssay">添加文章</a><br>
    <a href="/article/index/Essay/examineEssay">审核文章</a><br>
    <a href="/article/index/Register/enterUser">管理用户</a><br>
    <a href="/article/index.php/Login/loginOut">退出</a><br>
</div>
<div class="clear"></div>
<div class="content">
    <div class="test">
        <h2><?php
            foreach ($this->date as $value){
                echo $value['title'];
            }
            ?></h2>
        <p>作者：<?php
            echo $value['author'];
            ?></p>
        <p>类型：<?php
                echo $value['type'];
            ?></p>
        <p>简介：<?php
                echo $value['summary'];
            ?></p>
        <div class="con">
            <p>内容：<?php
                    echo $value['content'];
                ?></p>
        </div>
    </div>
</div>
</body>
</html>