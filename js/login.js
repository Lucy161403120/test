// ˢ����֤��
 // @param obj
 // @param url

function newgdcode(obj,url){
    obj.src = url+"?nowtime=" + new Date().getTime();
}

$(document).ready(function () {
    $("#login-submit").click(function () {

        var name = $.trim($("#login-name").val());
        var password = $.trim($("#login-password").val());
        var code = $.trim($("#login-code").val());

        $.ajax({
            type:"POST",
            url:"/article/index.php/Login/inLine",
            data:{
                name :name,
                password :password,
                code :code,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){

                    alert('��½�ɹ���')
                     window.location.href="/article/index.php/Admin/index";

                }else {
                    alert(data.msg);
                    $('#code-img').click();
                }

            },
            error:function (jqXHR) {
                alert("��������" + jqXHR.status);
            }
        });
    });
});