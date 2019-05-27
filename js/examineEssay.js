//删除文章
function deleteEssay(id) {
    if(confirm('确定删除')){
        //删除文章
        $.ajax({
            type:"POST",
            url:"/article/index/Essay/deleteEssay",
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

//审核通过
function addArticle(id) {
    $.ajax({
        type:"POST",
        url:"/article/index/Article/addArticles",
        data:{
            id:id,
        },
        dataType:"json",
        success:function (data) {
            if (data.code == 1){
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