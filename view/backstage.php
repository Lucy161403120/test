<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>article</title>
    <link rel="stylesheet" href="__ROOT__/css/backstage.css">
    <link rel="stylesheet" href="__ROOT__/css/public.css">
    <link rel="stylesheet" href="__ROOT__/css/bootstrap.css">
    <link rel="stylesheet" href="__ROOT__/css/bootstrap.min.css">
    <link rel="stylesheet" href="__ROOT__/css/bootstrap-theme.css">
    <link rel="stylesheet" href="__ROOT__/css/bootstrap-theme.min.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/backstage.js"></script>
    <script src="__ROOT__/js/public.js"></script>
    <script src="__ROOT__/js/bootstrap.js"></script>
    <script src="__ROOT__/js/bootstrap.min.js"></script>
    <script src="__ROOT__/js/npm.js"></script>
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
    <a href="#">文章评论管理</a><br>
    <a href="/article/index/Article/allInformation">文章详细列表</a><br>
    <a href="/article/index/Article/addEssay">添加文章</a><br>
    <a href="/article/index/Essay/examineEssay">审核文章</a><br>
    <a href="/article/index/Register/enterUser">管理用户</a><br>
    <a href="/article/index.php/Login/loginOut">退出</a><br>
</div>
<div class="clear"></div>
    <div class="content">
        <div id="myCarousel" class="carousel slide">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="__ROOT__/img/tg-2.jpg" alt="First slide">
                </div>
                <div class="item">
                    <img src="__ROOT__/img/1.jpg" alt="Second slide">
                </div>
                <div class="item">
                    <img src="__ROOT__/img/tg-3.jpg" alt="Third slide">
                </div>
            </div>
            <!-- 轮播（Carousel）导航 -->
            <a class="carousel-control left" href="#myCarousel"
               data-slide="prev">&lsaquo;
            </a>
            <a class="carousel-control right" href="#myCarousel"
               data-slide="next">&rsaquo;
            </a>
        </div>
        <div class="pic">
            <img src="__ROOT__/img/red.jpg" alt="red rainbow">
        </div>
        <div class="clear"></div>
        <div class="photos">
            <img src="__ROOT__/img/red.jpg" alt="伞" class="img1">
            <img src="__ROOT__/img/lu.jpg" alt="路" class="img1">
            <img src="__ROOT__/img/yuan.jpg" alt="天梯" class="img2">
            <img src="__ROOT__/img/yue.jpg" alt="月" class="img3">
            <img src="__ROOT__/img/tg-1.jpg" alt="玫瑰" class="img4">
        </div>
        <div class="clear"></div>
        <div class="load">
            <form class="form">
                <table>
                    <tr>
                        <td style="width: 153.6px;height: 50.4px">文章编号</td>
                        <td style="width: 153.6px;height: 50.4px">用户名</td>
                        <td style="width: 537.6px;height: 50.4px">评论内容</td>
                        <td style="width: 153.6px;height: 50.4px">操作</td>
                    </tr>
                </table>
            </form>
                <?php
                    foreach ($this->data as $value){
                ?>
                <form action="/article/index/Comment/deleteComment" class="form">
                    <table>
                        <tr>
                            <td style="width: 153.6px;height: 50.4px"><?php echo $value['articleId']; ?></td>
                            <td style="width: 153.6px;height: 50.4px"> <?php echo $value['visitorname']; ?></td>
                            <td style="width: 537.6px;height: 50.4px"> <?php echo $value['content']; ?></td>
                            <td style="width: 153.6px;height: 50.4px">
<button><input type="hidden" name="id" value="<?php echo $value['id'];?>">删除</button></td>
                        </tr>
                    </table>
                </form>
                <?php }?>
        </div>
    </div>
</body>
</html>