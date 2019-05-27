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
    <script src="__ROOT__/js/jquery.imgbox.pack.js"></script>
    <title>Details</title>
</head>
<body>

<header>
    <img src="__ROOT__/img/logo.jpg" alt="ͼƬ�޷�����">
    <form action="__ROOT__/index/Article/SearchUserArticle" method="post">
        <input type="text" placeholder="������ؼ���" class="sub" name="value">
        <button class="submit">����</button>
    </form>
</header>

<div class="name">
    <ul>
        <li>������</li>
        <li>����</li>
    </ul>
</div>
<div class="clear"></div>
<div class="content">
    <div class="essay">
        <div class="local">λ�ã������� >ԭ������ >��������</div>
        <h1><?php
            foreach ($this->date as $key => $value){
                echo $value['title'].'<br>';
            }
            ?>
        </h1>
        <h2>���ͣ�
            <?php echo $value['type'];?>
            &nbsp;&nbsp;
            ���ߣ�
            <?php echo $value['author']; ?>
            &nbsp;&nbsp;
            ʱ�䣺
            <?php echo $value['time'] ?>
        </h2>
        <p>
            ��飺<?php echo $value['summary']?>
        </p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $value['content']?>
        </p>
        <div class="comment">
            <div class="usercomment">
                <p><?php
                    foreach ($this->data as $v){
                        if ($v['articleId'] == $value['id'])
                        echo '<p>�ǳƣ�'.$v['visitorname'].'</p><br>
<p>�������ݣ�'.$v['content'].'</p><br><p>'.$v['date'].'</p><hr>';
                    }
                    ?></p>
            </div>
            <p>���ۣ�</p>
            <form >
                <input type="hidden" value="<?php echo $value['id']?>" id="id">
                <input type="hidden" value="<?php echo $_SESSION['name']?>"  id="visitorname">
                <textarea type="text"  placeholder="�������ۣ���������" name="content" id="publish-content"></textarea><br>
            </form>
            <button class="button" id="com">�ύ</button>
        </div>
    </div>
</div>
<script src="__ROOT__/js/Details.js"></script>
</body>
</html>