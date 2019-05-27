<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>forget password</title>
    <link rel="stylesheet" href="__ROOT__/css/forgetPassword.css">
    <link rel="stylesheet" href="__ROOT__/css/public.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/forgetPassword.js"></script>
</head>
<body>

    <div class="dialog" id="dialog">
        <div class="dialog-title">
            忘记密码
            <a class="dialog-closebutton" href="/article/index.php/Login/login"
               style="background: url(../img/close_def.png) no-repeat;"></a>
        </div>
        <div class="dialog-content" id="dialog-content">
            <input id="name" class="input" type="text" placeholder="用户名"
                   style="background: url(../img/input_username.png) no-repeat 0px -1px;" />
            <input type="submit" id="submit" class="submit" value="确认">
        </div>
    </div>

</body>
</html>