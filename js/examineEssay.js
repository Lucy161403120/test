//ɾ������
function deleteEssay(id) {
    if(confirm('ȷ��ɾ��')){
        //ɾ������
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
                alert("��������" + jqXHR.status);
            }
        });
    }
}

//���ͨ��
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
            alert("��������" + jqXHR.status);
        }
    });
}