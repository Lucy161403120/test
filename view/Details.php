<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="__ROOT__/css/public.css">
    <link rel="stylesheet" href="__ROOT__/css/List.css">
    <link rel="stylesheet" href="__ROOT__/css/Details.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/Details.js"></script>
    <script src="__ROOT__/js/jquery.imgbox.pack.js"></script>
    <title>Details</title>
</head>
<body>

<header>
    <img src="__ROOT__/img/logo.jpg" alt="图片无法加载">
    <form action="__ROOT__/controller/Article/SearchArticle" method="post">
        <input type="text" placeholder="请输入关键字" class="sub" name="value">
        <button class="submit">搜索</button>
    </form>
</header>

<div class="name">
    <ul>
        <li><a href="/article/index/Admin/index">首页</a></li>
        <li><a href="/article/index/Article/allInformation">文章</a></li>
        <li><a href="/article/index/Article/addEssay">添加</a></li>
    </ul>
</div>
<div class="clear"></div>
    <div class="content">
        <div class="essay">
            <div class="local">位置：美文网 >原创美文 >文章内容</div>
            <h1><?php
                foreach ($this->date as $value){
                        echo $value['title'];
                }
                ?>
            </h1>
            <h2>类型：
                <?php echo $value['type'];?>
                &nbsp;&nbsp;
                作者：
                <?php echo $value['author']; ?>
                &nbsp;&nbsp;
                时间：
                <?php echo $value['time'] ?>
            </h2>
            <p>
                简介：<?php echo $value['summary']?>
            </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo $value['content']?>
            </p>
        </div>
    </div>
</body>
</html>