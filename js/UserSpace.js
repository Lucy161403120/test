$(document).ready(function () {
    //添加文章
    $("#parts").on("click", "#add", function () {

        var formData = new FormData($("#addform")[0]);
        $.ajax({
            type: "POST",
            url: "/article/index/Essay/addEssay",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            cache: false,
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
})