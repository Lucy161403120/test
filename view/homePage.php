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
            <h1>������</h1>
        </header>

        <div class="dialog" id="dialog">
            <div class="dialog-title">
                ��¼
                <a class="dialog-closebutton" href="/article/index/HomeLogin/Login" style=
"background: url(__ROOT__/img/close_def.png) no-repeat;"></a>
            </div>
            <div class="dialog-content">
                <input id="login-name" class="input" type="text" placeholder="�û���" style=
"background: url('__ROOT__/img/input_username.png') no-repeat 0px -1px;" />
                <input id="login-password" class="input" type="password" placeholder="����" 
style="background: url(__ROOT__/img/input_password.png) no-repeat 0px -1px; "/>
                <a class="register" href="/article/index/Register/showRegister">ע��</a>
                <input type="submit" id="login-submit" class="submit" value="��¼">
            </div>
        </div>

        <div class="clear"></div>
        <div class="fly">
            <img src="__ROOT__/img/fly.gif" alt="ͼƬ�޷�����">
        </div>
    </div>
</body>
</html>