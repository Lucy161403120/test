$(document).ready(function () {
    //添加文章
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
                alert("发生错误：" + jqXHR.status);
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
                alert("发生错误：" + jqXHR.status);
            }
        });
    });




})


//删除文章
function deleteArticle(id) {
    if(confirm('确定删除')){
        //删除文章
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
                alert("发生错误：" + jqXHR.status);
            }
        });
    }
}

/**
 * 模糊搜索文章
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

                alert('查询成功！')
                window.location.href="/article/index.php/Admin/index";


            }else{
                alert(data.msg);
            }

        },
        error:function (jqXHR) {
            alert("发生错误：" + jqXHR.status);
        }
    });
});


/**
 * 发表评论
 */

function com() {
        //添加评论
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
                alert("发生错误：" + jqXHR.status);
            }
        });

}