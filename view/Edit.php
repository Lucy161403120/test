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
        <div class="content" id="parts">
            <form id='addform' class="form">
                <img src="__ROOT__/img/center.jpg" alt="ͼƬ�޷�����">
                <div class="top">
                    <div class='form-row'><label>���⣺</label>
                        <input type='text' name='title' id='title' 
value="<?php foreach ($this->date as $value){echo $value['title'];} ?>">
                    </div>
                    <div class='form-row'><label>���ͣ�</label>
                        <input type='text' name='type' id='type' 
value="<?php foreach ($this->date as $value){echo $value['type'];} ?>">
                    </div>
                    <div class='form-row'><label>���ߣ�</label>
                        <input type='text' name='author' id='author' 
value="<?php foreach ($this->date as $value){echo $value['author'];}  ?>">
                    </div>
                </div>
                <div class='form-row1'><label>���棺</label>
                    <input type='file' name='cover[]' id='cover'>
                </div>
                <div class="clear"></div>
                <div class='summary'>
                    <div class='title'>���</div>
                    <textarea name='summary' id='summary'><?php foreach ($this->date as $value){echo $value['summary'];} ?></textarea>
                </div>
                <div class='Content'>
                    <div class='title'>����</div>
                    <textarea name='content' id='content'>
                        <?php foreach ($this->date as $value){echo $value['content'];}  ?>
                    </textarea>
                </div>
                <div class="clear"></div>
            </form>
            <button class='sub' id='edit' >�޸�</button>
        </div>

</body>
</html>