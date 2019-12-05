/**
 * 上传头图
 * */
function uploadhimgs() {
    var formData =new FormData();
    formData.append("file",$("#file")[0].files[0]);

    var urls = 'uploadhimgs';

    $.ajax({
        url: urls,
        type: "post",
        data: formData,
        async:false,
        dataType: 'json',
        cache: false,
        processData : false,
        contentType : false,
        success: function (ret) {
            if (ret.code == 200) {
                $("#himgs").attr('src', ret.path);
                $("#himages").val(ret.path);
                layer.msg(ret.msg,{icon:6});
            } else {
                layer.msg(ret.msg);
            }
        },

    });
    return false;
}

/**
 * 上传底部图
 * */
function uploadfimgs() {
    var formData =new FormData();
    formData.append("file",$("#files")[0].files[0]);

    var urls = 'uploadfimgs';

    $.ajax({
        url: urls,
        type: "post",
        data: formData,
        async:false,
        dataType: 'json',
        cache: false,
        processData : false,
        contentType : false,
        success: function (ret) {
            if (ret.code == 200) {
                $("#fimgs").attr('src', ret.path);
                $("#fimages").val(ret.path);
                layer.msg(ret.msg,{icon:6});
            } else {
                layer.msg(ret.msg);
            }
        },

    });
    return false;
}


