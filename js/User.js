function deleteUser(id) {
    if(confirm('ȷ��ɾ��')){
        //ɾ���û�
        $.ajax({
            type:"POST",
            url:"/article/index/Register/deleteRegister",
            data:{
                id :id,
            },
            dataType:"json",
            success:function (data) {
                if(data.code == 1){
                    alert(data.msg);

                }else{
                    alert(data.msg);
                }
            },
            error:function (jqXHR) {
                alert("��������" + jqXHR.status);
            }
        });
    }
}