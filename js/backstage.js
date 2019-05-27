$(document).ready(function () {
    //�������
    $("#parts").on("click","#add",function () {

        var formData = new FormData($("#addform")[0]);
        $.ajax({
            type:"POST",
            url:"/article/index/Article/addArticle",
            data:formData,
            processData:false,
            contentType:false,
            dataType:"json",
            cache:false,
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
    });

    $("#parts").on("click","#edit",function () {

        var formData = new FormData($("#addform")[0]);

        $.ajax({
            type:"POST",
            url:"/article/index/Article/editArticles",
            data:formData,
            processData:false,
            contentType:false,
            dataType:"json",
            cache:false,
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
    });




})


//ɾ������
function deleteArticle(id) {
    if(confirm('ȷ��ɾ��')){
        //ɾ������
        $.ajax({
            type:"POST",
            url:"/article/index/Article/deleteArticle",
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

/**
 * ģ����������
 */
$("#parts").on("click","#SearchArticle",function () {

    $value = $("#SearchValue").val();

    $.ajax({
        type:"POST",
        url:"/article/Article/SearchArticle",
        data:{
            search:$value,
            methodName :'SearchArticle',
        },
        dataType:"json",
        success:function (data) {

            if(data.code == 1){

                alert('��ѯ�ɹ���')
                window.location.href="/article/index.php/Admin/index";


            }else{
                alert(data.msg);
            }

        },
        error:function (jqXHR) {
            alert("��������" + jqXHR.status);
        }
    });
});


/**
 * ��������
 */

function com() {
        //�������
        var visitorname = $.trim($("#visitorname").val());
        var content = $.trim($("#publish-content").val());
        $.ajax({
            type: "POST",
            url: "/article/index/Comment/addComments",
            data: {
                content: content,
                visitorname: visitorname,
            },
            dataType: "json",
            success: function (data) {
                if (data.code == 1) {
                    alert(data.msg);
                    window.location.href="/article/index/Comment/selectComment";

                } else {
                    alert(data.msg);
                }
            },
            error: function (jqXHR) {
                alert("��������" + jqXHR.status);
            }
        });

}