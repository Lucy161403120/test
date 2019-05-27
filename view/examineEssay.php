<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="__ROOT__/css/public.css">
    <link rel="stylesheet" href="__ROOT__/css/examineEssay.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/examineEssay.js"></script>
    <title>examineEssay</title>
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
        <a href="#">�������</a><br>
        <a href="/article/index/Register/enterUser">�����û�</a><br>
        <a href="/article/index.php/Login/loginOut">�˳�</a><br>
    </div>
    <div class="clear"></div>
    <div class="content">
        <div class="list" id="parts">
            <h3>������ϸ�б�</h3>
            <table>
                <tr>
                    <td style="width: 100px;height: 50px">���</td>
                    <td style="width: 200px;height: 50px">����</td>
                    <td style="width: 150px;height: 50px">����</td>
                    <td style="width: 200px;height: 50px">����</td>
                    <td style="width: 100px;height: 50px">����id</td>
                    <td style="width: 200px;height: 50px">����</td>
                </tr>
                <?php
                foreach($this->date as $v)
                {
                    echo    "<tr>
                        <td style='height: 50px'>{$v['id']}</td>
                        <td>{$v['title']}</td>
                        <td>{$v['type']}</td>
                        <td>{$v['author']}</td>
                        <td>{$v['userId']}</td>
                        <td>
                            <a href='/article/index/Essay/searchEssayById?id={$v['id']}' class='page-operate'>����</a>
                            <a href='javascript:deleteEssay({$v['id']});'>ɾ��</a>
                            <a href='javascript:addArticle({$v['id']});'>ͨ��</a>
                        </td>
                    </tr>";
                }
                ?>
            </table>
    </div>
</body>
</html>