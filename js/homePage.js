//�û���¼
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

                    alert('��½�ɹ���')
                    window.location.href="/article/index/Article/enterList";

                }else{
                    alert(data.msg);
                }

            },
            error:function (jqXHR) {
                alert("��������" + jqXHR.status);
            }
        });
    });
});>
