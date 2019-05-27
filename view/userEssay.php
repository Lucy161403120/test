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
    <img src="__ROOT__/img/logo1.png" alt="ͼƬ�޷�����">
    <form action="__ROOT__/index/Article/SearchArticle" method="post">
        <input type="text" placeholder=������ؼ��� class="sub" name="value">
        <button class="submit">����</button>
    </form>
</header>
<nav>
</nav>
<div class="text">
    <a href="/article/index/Admin/index">�������۹���</a><br>
    <a href="/article/index/Article/allInformation">������ϸ�б�</a><br>
    <a href="/article/index/Article/addEssay">�������</a><br>
    <a href="/article/index/Essay/examineEssay">�������</a><br>
    <a href="/article/index/Register/enterUser">�����û�</a><br>
    <a href="/article/index.php/Login/loginOut">�˳�</a><br>
</div>
<div class="clear"></div>
<div class="content">
    <div class="test">
        <h2><?php
            foreach ($this->date as $value){
                echo $value['title'];
            }
            ?></h2>
        <p>���ߣ�<?php
            echo $value['author'];
            ?></p>
        <p>���ͣ�<?php
                echo $value['type'];
            ?></p>
        <p>��飺<?php
                echo $value['summary'];
            ?></p>
        <div class="con">
            <p>���ݣ�<?php
                    echo $value['content'];
                ?></p>
        </div>
    </div>
</div>
</body>
</html>