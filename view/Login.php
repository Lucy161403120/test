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
                    ��¼
                <a class="dialog-closebutton" href="/article/index.php/Login/login" 
style="background: url(__ROOT__/img/close_def.png) no-repeat;"></a>
            </div>
            <div class="dialog-content">
                <input id="login-name" class="input" type="text" placeholder="�û���" 
style="background: url('__ROOT__/img/input_username.png') no-repeat 0px -1px;" />
                <input id="login-password" class="input" type="password" placeholder="����" 
style="background: url(__ROOT__/img/input_password.png) no-repeat 0px -1px; "/>
                 <div class="code-div clearboth">
                    <input id="login-code" class="code" type="text" placeholder="��֤��"/>
                    <img id="code-img" class="code-img" src="/article/index.php/Login/code" 
alt="�����������һ��" onclick="javascript:newgdcode(this,this.src);">
                </div>
                <a class="forget" href="/article/index.php/ForgetPassword/showForgetPassword">��������</a>
                <input type="submit" id="login-submit" class="submit" value="��¼">

            </div>

        </div>
</body>
</html>