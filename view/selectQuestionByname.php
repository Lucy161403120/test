<div>
    <lable class='text'>姓名：<span id="name" style="display: inline-block"><?php echo $name; ?></span></lable>
    <p class='text' id='name'></p>
</div>
<div>
    <lable class='text'>密保问题：</lable>
    <p class='text'><?php echo $question; ?></p>
</div>
<input id='answer' class='input' type='text' placeholder='密保答案'/>
<input id='new-password' class='input' type='password' placeholder='新密码'/>
<input id='confirm-password' class='input' type='password' placeholder='确认密码'/>
<input type='submit' id='submit2' class='submit' value='确认'>

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
<div class="content">
    <div class="list" id="parts">
        <h3>文章详细列表</h3>
        <table>
            <tr>
                <td>编号</td>
                <td>用户名</td>
                <td>密码</td>
                <td>操作</td>
            </tr>
            <?php

            foreach($this->date as $v)
            {
                echo    "<tr>
                        <td>{$v['id']}</td>
                        <td>{$v['name']}</td>
                        <td>{$v['password']}</td>
                        <td>
                            <a href='javascript:deleteUser({$v['id']});'>删除</a>
                        </td>
                    </tr>";
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>