/**
 * login
 */

$('#login').click(function(){

    var url  = $(this).attr('data-href');

    var user = $.trim($('#user').val());
    var pwd  = $.trim($('#pwd').val());

    if(user == '' || user == undefined){
        layer.msg('请填写用户名',{icon:6});
        return false;
    }

    if(pwd == '' || pwd == undefined){
        layer.msg('请输入密码',{icon:6});
        return false;
    }

    $.post(url,{'user':user,'pwd':pwd},function(ret){
          //todo  待完成



    },'json')
})
