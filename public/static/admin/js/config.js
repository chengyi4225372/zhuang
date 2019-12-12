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

/**
 * 提交图片设置
 */
$('.subimgs').click(function(){
     var himgs = $('#himages').val();
     var fimgs = $('#fimages').val();
     var mid   = $('#mid').val();
     var urls  = $(this).attr('data-url');
     if(himgs == '' || himgs == undefined){
         layer.msg('请上传头部图片');
         return false;
     }

    if(fimgs == '' || fimgs == undefined){
        layer.msg('请上传底部图片');
        return false;
    }

   $.post(urls,{'himgs':himgs,'fimgs':fimgs,'mid':mid},function(ret){
           if(ret.code == 200){
               layer.msg(ret.msg,{icon:6},function(){
                   parent.location.reload();
               })
           }

           if(ret.code == 400){
           layer.msg(ret.msg,{icon:5},function(){
               parent.location.reload();
           })
       }
   },'json');
});

/**
 * 网址标题设置
 */
$('.confings').click(function(){
    var title = $.trim($('#title').val());
    var mid   = $('#mid').val();
    var wechatapp = $('#apps').val();
    var email     = $('#email').val();
    var foot      = $('#foot').val();
    var facebook  = $('#facebook').val();
    var urls    =$(this).attr('data-url');
    if(title == '' || title == undefined){
        layer.msg('请输入网站配置标题');
        return false;
    }

    if(wechatapp == '' || wechatapp == undefined){
        layer.msg('请输入app链接地址');
        return false;
    }

    if(email == '' || email == undefined){
        layer.msg('请输入邮箱地址');
        return false;
    }

    if(facebook == '' || facebook == undefined){
        layer.msg('请输入facebook地址');
        return false;
    }

    $.post(urls,{'title':title,'email':email,'wechatapp':wechatapp,'mid':mid,'foot':foot,'facebook':facebook},function(ret){
        if(ret.code == 200){
            layer.msg(ret.msg,{icon:6},function(){
                parent.location.reload();
            })
        }

        if(ret.code == 400){
            layer.msg(ret.msg,{icon:5},function(){
                parent.location.reload();
            })
        }
    },'json');
});

/**
 * 网站其他设置
 */
$('.configs').click(function(){
    var content = $('#contents').val();
    console.log(content);

    var mid  = $('#mid').val();

    var urls = $(this).attr('data-url');
    $.post(urls,{'content':content,'mid':mid},function(ret){
         if(ret.code == 200){
             layer.msg(ret.msg,{icon:6},function(){
                 parent.location.reload();
             });
         }

        if(ret.code == 400){
            layer.msg(ret.msg,{icon:5},function(){
                parent.location.reload();
            })
        }
    },'json')
})
