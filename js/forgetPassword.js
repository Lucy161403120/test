//忘记密码
$(document).ready(function () {
    $("#submit").click(function () {

        var name = $.trim($("#name").val());

        $.ajax({
            type:"POST",
            url:"/article/index/ForgetPassword/selectQuestionByname",
            data:{
                name :name,
            },
            dataType:"json",
            success:function (data) {

                if(data.code == 1){

                    $("#dialog-content").empty();

                    $("#dialog-content").append(data.data);

                }else {
                    alert(data.msg);
                }

            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });

    //密保对照
    $("#dialog-content").on("click","#submit2",function () {

        var name = $.trim($("#name").html());
        var answer = $.trim($("#answer").val());
        var newPassword = $.trim($("#new-password").val());
        var confirmPassword = $.trim($("#confirm-password").val());

        $.ajax({
            type:"POST",
            url:"/article/index/ForgetPassword/resetPassword",
            data:{
                name :name,
                answer :answer,
                newPassword :newPassword,
                confirmPassword :confirmPassword,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    alert(data.msg);
                    window.location.href="/article/index/Login/login";

                }else {
                    alert(data.msg);
                }

            },
            error:function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });
});>
