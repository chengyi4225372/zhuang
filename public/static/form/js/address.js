
/** 提交 **/

function addOrder(obj){
    var hrefs   = $(obj).attr('data-url');
    var user    = $.trim($("input[name='user']").val());
    var phone   = $.trim($("input[name='phone']").val());
    var address = $.trim($("input[name='address']").val());

    if(hrefs == '' || hrefs == undefined){
        return false;
    }

    if(user =='' || user ==undefined || user == 'undefined'){
        layer.msg('请填写您的姓名。。');
        return false;
    }

    if(phone =='' || phone ==undefined || phone == 'undefined'){
        layer.msg('请填写您的电话！');
        return false;
    }

    if(address =='' || address ==undefined || address == 'undefined'){
        layer.msg('请填写您的收货地址');
        return false;
    }

    $.post(hrefs,{'user':user,'phone':phone,'address':address},function(ret){
            if(ret.code == 200){
                layer.msg(ret.msg,{icon:6},function(){
                    parent.location.href = '';
                });
            }

        if(ret.code == 400){
            layer.msg(ret.msg,{icon:5},function(){
                parent.location.href = '';
            });
        }
    },'json')
}