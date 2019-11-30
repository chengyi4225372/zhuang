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

         if(ret.code == 402){
             layer.msg(ret.msg,{icon:6},function(){
                 parent.location.reload();
             });
         }

        if(ret.code == 403){
            layer.msg(ret.msg,{icon:5},function(){
                parent.location.reload();
            });
        }

        if(ret.code == 405){
            layer.msg(ret.msg,{icon:5},function(){
                parent.location.reload();
            });
        }

        if(ret.code == 406){
            layer.msg(ret.msg,{icon:5},function(){
                parent.location.reload();
            });
        }

        // if(ret.code == 407){
        //     layer.msg(ret.msg,{icon:5},function(){
        //         parent.location.reload();
        //     });
        // }



    },'json')
})
