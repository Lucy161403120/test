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
            <a href="#">文章详细列表</a><br>
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
                        <td style="width: 80px;height: 50px">编号</td>
                        <td style="width: 195px;height: 50px">标题</td>
                        <td style="width: 80px;height: 50px">类型</td>
                        <td style="width: 120px;height: 50px">作者</td>
                        <td>浏览</td>
                        <td>修改时间</td>
                        <td>操作</td>
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
                            <a href='/article/index/Article/enterEditArticle?id={$v['id']}' class='page-operate'>编辑 </a>
                            <a href='javascript:deleteArticle({$v['id']});'>删除</a>
                        </td>
                    </tr>";
                    }
                    ?>
                </table>
                <a class="login" href="/article/index/Login/loginOut">退出</a><br>
            </div>
    </div>

</body>
</html>