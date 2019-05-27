/**
 * ģ����������
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
    $("#com").click(function () {
        //�������
        //ʹ�� PHP trim() ����ȥ���û����������в���Ҫ���ַ� (�磺�ո�tab������)
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
                alert("��������" + jqXHR.status);
            }
        });
    });