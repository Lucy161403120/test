<div>
    <lable class='text'>������<span id="name" style="display: inline-block"><?php echo $name; ?></span></lable>
    <p class='text' id='name'></p>
</div>
<div>
    <lable class='text'>�ܱ����⣺</lable>
    <p class='text'><?php echo $question; ?></p>
</div>
<input id='answer' class='input' type='text' placeholder='�ܱ���'/>
<input id='new-password' class='input' type='password' placeholder='������'/>
<input id='confirm-password' class='input' type='password' placeholder='ȷ������'/>
<input type='submit' id='submit2' class='submit' value='ȷ��'>

User.php
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="__ROOT__/css/User.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/User.js"></script>
    <title>user</title>
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
    <div class="list" id="parts">
        <h3>������ϸ�б�</h3>
        <table>
            <tr>
                <td>���</td>
                <td>�û���</td>
                <td>����</td>
                <td>����</td>
            </tr>
            <?php

            foreach($this->date as $v)
            {
                echo    "<tr>
                        <td>{$v['id']}</td>
                        <td>{$v['name']}</td>
                        <td>{$v['password']}</td>
                        <td>
                            <a href='javascript:deleteUser({$v['id']});'>ɾ��</a>
                        </td>
                    </tr>";
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>