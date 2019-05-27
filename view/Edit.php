<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="__ROOT__/css/public.css">
    <link rel="stylesheet" href="__ROOT__/css/Edit.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/backstage.js"></script>
    <script src="__ROOT__/js/public.js"></script>
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
        <div class="content" id="parts">
            <form id='addform' class="form">
                <img src="__ROOT__/img/center.jpg" alt="图片无法加载">
                <div class="top">
                    <div class='form-row'><label>标题：</label>
                        <input type='text' name='title' id='title' 
value="<?php foreach ($this->date as $value){echo $value['title'];} ?>">
                    </div>
                    <div class='form-row'><label>类型：</label>
                        <input type='text' name='type' id='type' 
value="<?php foreach ($this->date as $value){echo $value['type'];} ?>">
                    </div>
                    <div class='form-row'><label>作者：</label>
                        <input type='text' name='author' id='author' 
value="<?php foreach ($this->date as $value){echo $value['author'];}  ?>">
                    </div>
                </div>
                <div class='form-row1'><label>封面：</label>
                    <input type='file' name='cover[]' id='cover'>
                </div>
                <div class="clear"></div>
                <div class='summary'>
                    <div class='title'>简介</div>
                    <textarea name='summary' id='summary'><?php foreach ($this->date as $value){echo $value['summary'];} ?></textarea>
                </div>
                <div class='Content'>
                    <div class='title'>内容</div>
                    <textarea name='content' id='content'>
                        <?php foreach ($this->date as $value){echo $value['content'];}  ?>
                    </textarea>
                </div>
                <div class="clear"></div>
            </form>
            <button class='sub' id='edit' >修改</button>
        </div>

</body>
</html>