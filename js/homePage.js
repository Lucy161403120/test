//用户登录
$(document).ready(function () {
    $("#login-submit").click(function () {

        var name = $.trim($("#login-name").val());
        var password = $.trim($("#login-password").val());

        $.ajax({
            type:"POST",
            url:"/article/index.php/HomeLogin/homeLine",
            data:{
                name :name,
                password :password,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    alert('登陆成功！')
                    window.location.href="/article/index/Article/enterList";

                }else{
                    alert(data.msg);
                }

            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });
});>
