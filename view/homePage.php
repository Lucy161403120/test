<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>homepage</title>
    <link rel="stylesheet" href="__ROOT__/css/public.css">
    <link rel="stylesheet" href="__ROOT__/css/homePage.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/homePage.js"></script>
    <script src="__ROOT__/js/jquery.imgbox.pack.js"></script>
</head>
<body>
    <div class="content">
        <header>
            <h1>美文网</h1>
        </header>

        <div class="dialog" id="dialog">
            <div class="dialog-title">
                登录
                <a class="dialog-closebutton" href="/article/index/HomeLogin/Login" style=
"background: url(__ROOT__/img/close_def.png) no-repeat;"></a>
            </div>
            <div class="dialog-content">
                <input id="login-name" class="input" type="text" placeholder="用户名" style=
"background: url('__ROOT__/img/input_username.png') no-repeat 0px -1px;" />
                <input id="login-password" class="input" type="password" placeholder="密码" 
style="background: url(__ROOT__/img/input_password.png) no-repeat 0px -1px; "/>
                <a class="register" href="/article/index/Register/showRegister">注册</a>
                <input type="submit" id="login-submit" class="submit" value="登录">
            </div>
        </div>

        <div class="clear"></div>
        <div class="fly">
            <img src="__ROOT__/img/fly.gif" alt="图片无法加载">
        </div>
    </div>
</body>
</html>