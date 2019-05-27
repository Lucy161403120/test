<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="__ROOT__/css/UserSpace.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/UserSpace.js"></script>
    <title>UserSpace</title>
</head>
<body>
    <header class="header" id="header">
        <h1><?php
        foreach ($this->date as $value){
            echo $value['name'];
        }
            ?>的空间</h1>
        <nav id="nav">
            <h2>个人空间</h2>
        </nav>
    </header>
    <div class="content" id="content">
        <div class="self" id="self">
            <h4 id="h1">个人资料</h4>
            <p><button type="button" id="button_A">换肤</button></p>
            <img src="__ROOT__/img/red.jpg" alt="red rainbow" id="img_A">
            <p>用户名：<?php
                echo $value['name'];
                ?></p>
            <p>发表文章</p>
        </div>
        <div class="add" id="parts">
            <h4 id="h4">发表文章</h4>
            <form id='addform' enctype='multipart/form-data'>
                <div class="top">
                    <div class='form-row'><label>标题：</label>
                        <input type='text' name='title' id='title'>
                    </div>
                    <div class='form-row'><label>类型：</label>
                        <input type='text' name='type' id='type'>
                    </div>
                </div>
                <div class="clear"></div>
                <div class='summary'>
                    <div class='title'>简介</div>
                    <textarea name='summary' id='summary'></textarea>
                </div>
                <div class='Content'>
                    <div class='title'>内容</div>
                    <textarea name='content' id='content'></textarea>
                </div>
                <div class="clear"></div>
            </form>
            <button class='sub' id='add' >添加</button>
        </div>
    </div>
    <script>
        function img() {
            var img = document.getElementById("img_A");
            var i = 0;
            var imgArr = ["__ROOT__/img/yue.jpg","__ROOT__/img/yuan.jpg","__ROOT__/img/red.jpg"];
            img.addEventListener("click", function () {
                img.src = imgArr[i];
                i++;
                if (i == 3){
                    i = 0;
                }
            })
        }
        img();
        
        function logo() {
            var btn = document.getElementById("button_A");
            var self = document.getElementById("self");
            var parts = document.getElementById("parts");
            var nav = document.getElementById("nav");
            var h1 = document.getElementById("h1");
            var h4 = document.getElementById("h4");
            var i = 0;
            var imgArr = ["__ROOT__/img/xiao.jpg","__ROOT__/img/top2.jpg",
"__ROOT__/img/top3.jpg","__ROOT__/img/top4.jpg","__ROOT__/img/top.jpg"];
            var bacArr = ["#fff","#fff","#fff","#fff","#2d2d2d"];
            var bgcArr = ["#1F2267","#A58C5C","#B16B6A","rgb(114, 33, 128)","#2d2d2d"];
            var bgArr = ["#E4E5EE","#EEEBE2","#F7EDED","rgb(245, 211, 244)","#5f5959"];
            btn.addEventListener("click", function () {
                document.body.style.backgroundImage = "url('"+imgArr[i]+"')";
                self.style.background = bacArr[i];
                parts.style.background = bacArr[i];
                nav.style.background = bgcArr[i];
                h1.style.background = bgArr[i];
                h4.style.background = bgArr[i];
                i++;
                if (i == 5) {
                    i = 0;
                }
            });
        }
        logo();
    </script>
</body>
</html>