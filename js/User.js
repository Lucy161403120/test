function deleteUser(id) {
    if(confirm('确定删除')){
        //删除用户
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
                alert("发生错误：" + jqXHR.status);
            }
        });
    }
}