<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>article</title>
    <link rel="stylesheet" href="__ROOT__/css/public.css">
    <link rel="stylesheet" href="__ROOT__/css/UserList.css">
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
            <a href="#">������ϸ�б�</a><br>
            <a href="/article/index/Article/addEssay">�������</a><br>
            <a href="/article/index/Essay/examineEssay">�������</a><br>
            <a href="/article/index/Register/enterUser">�����û�</a><br>
            <a href="/article/index.php/Login/loginOut">�˳�</a><br>
        </div>
    <div class="clear"></div>
    <div class="content">
            <div class="list" id="parts">
                <h3>������ϸ�б�</h3>
                <table>
                    <tr>
                        <td style="width: 80px;height: 50px">���</td>
                        <td style="width: 195px;height: 50px">����</td>
                        <td style="width: 80px;height: 50px">����</td>
                        <td style="width: 120px;height: 50px">����</td>
                        <td>���</td>
                        <td>�޸�ʱ��</td>
                        <td>����</td>
                    </tr>
                    <?php

                    foreach($this->date as $v)
                    {
                        echo    "<tr>
                        <td style=\"width: 80px;height: 50px\">{$v['id']}</td>
                        <td>{$v['title']}</td>
                        <td>{$v['type']}</td>
                        <td>{$v['author']}</td>
                        <td>{$v['browse']}</td>
                        <td>{$v['time']}</td>
                        <td>
                            <a href='/article/index/Article/enterEditArticle?id={$v['id']}' class='page-operate'>�༭ </a>
                            <a href='javascript:deleteArticle({$v['id']});'>ɾ��</a>
                        </td>
                    </tr>";
                    }
                    ?>
                </table>
                <a class="login" href="/article/index/Login/loginOut">�˳�</a><br>
            </div>
    </div>

</body>
</html>