/**
 * 模糊搜索文章
 */
$("#parts").on("click","#SearchArticle",function () {

    $value = $("#SearchValue").val();

    $.ajax({
        type:"POST",
        url:"/article/index/Article/SearchArticle",
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
    $("#com").click(function () {
        //添加评论
        //使用 PHP trim() 函数去除用户输入数据中不必要的字符 (如：空格，tab，换行)
        var id = $.trim($("#id").val());
        var visitorname = $.trim($("#visitorname").val());
        var content = $.trim($("#publish-content").val());
        $.ajax({
            type: "POST",
            url: "/article/index/Comment/addComment",
            data: {
                id: id,
                content: content,
                visitorname: visitorname,
            },
            dataType: "json",
            success: function (data) {
                if (data.code == 1) {
                    alert(data.msg);

                } else {
                    alert(data.msg);
                }
            },
            error: function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });