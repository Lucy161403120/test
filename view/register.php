<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    <link rel="stylesheet" href="__ROOT__/css/homePage.css">
    <link rel="stylesheet" href="__ROOT__/css/register.css">
    <link rel="stylesheet" href="__ROOT__/css/public.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/register.js"></script>
</head>
<body>

    <div class="content">
        <header>
            <h1>������</h1>
        </header>

        <div class="dialog" id="dialog">
            <div class="dialog-title">
                ע��
                <a class="dialog-closebutton" href="/article/index/HomeLogin/Login" 
style="background: url(__ROOT__/img/close_def.png) no-repeat;"></a>
            </div>
            <div class="dialog-content">
                <input id="name" class="input" type="text" placeholder="�û���" 
style="background: url('__ROOT__/img/input_username.png') no-repeat 0px -1px;" />
                <input id="password" class="input" type="password" placeholder="����" 
style="background: url(__ROOT__/img/input_password.png) no-repeat 0px -1px; "/>
                <div class="return"><a href="/article/index/HomeLogin/login">���ص�¼</a></div>
                <input type="submit" id="login-submit" class="submit" value="ע��">
            </div>
        </div>
        <div class="clear"></div>
        <div class="fly">
            <img src="__ROOT__/img/fly.gif" alt="ͼƬ�޷�����">
        </div>
    </div>

</body>
</html>