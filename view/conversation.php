<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="__ROOT__/css/conversation.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/jquery.imgbox.pack.js"></script>
    <script src="__ROOT__/js/conversation.js"></script>
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
    <a href="#">������</a><br>
</div>
<div class="clear"></div>
<div class="content">
    <div class="test">
        <div class="conver">
                <?php
                    foreach ($this->date as $key => $value) {
                        if ($value['articleId'] == null){
                            if ($value['visitorname'] == $_SESSION['name']){
                                echo '<div class="tm"><h2>' . $value['visitorname'] . 
'</h2><p class="date">'.$value['date'] .'</p><div class="cont"><p>'.$value['content'].'</div></div><div class="clear"></p></div>';
                            }else{
                                echo '<div class="tg"><h2>' . $value['visitorname'] . 
'</h2><p class="date">'.$value['date'] .'</p><div class="cont"><p>'.$value['content'].'</p></div></div>';
                            }
                        }
                    }
                ?>
            <form class="form">
                <input type="hidden" value="<?php echo $_SESSION['name']?>" id="visitorname">
                <textarea type="text"  placeholder="�������15����Ŷ" 
name="content" id="publish-content"  maxlength="13" onkeydown="if(event.keyCode==13){com();}"></textarea><br>
            </form>
            <button class="button" id="com" onclick="com()">�ύ</button>
            <div class="clear"></div>
        </div>
    </div>
</div>
<script src="__ROOT__/js/backstage.js"></script>
</body>
</html>