<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>article</title>
    <link rel="stylesheet" href="__ROOT__/css/login.css">
    <link rel="stylesheet" href="__ROOT__/css/public.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/login.js"></script>
</head>
<body>
        <div class="dialog" id="dialog">
            <div class="dialog-title">
                    登录
                <a class="dialog-closebutton" href="/article/index.php/Login/login" 
style="background: url(__ROOT__/img/close_def.png) no-repeat;"></a>
            </div>
            <div class="dialog-content">
                <input id="login-name" class="input" type="text" placeholder="用户名" 
style="background: url('__ROOT__/img/input_username.png') no-repeat 0px -1px;" />
                <input id="login-password" class="input" type="password" placeholder="密码" 
style="background: url(__ROOT__/img/input_password.png) no-repeat 0px -1px; "/>
                 <div class="code-div clearboth">
                    <input id="login-code" class="code" type="text" placeholder="验证码"/>
                    <img id="code-img" class="code-img" src="/article/index.php/Login/code" 
alt="看不清楚，换一张" onclick="javascript:newgdcode(this,this.src);">
                </div>
                <a class="forget" href="/article/index.php/ForgetPassword/showForgetPassword">忘记密码</a>
                <input type="submit" id="login-submit" class="submit" value="登录">

            </div>

        </div>
</body>
</html>