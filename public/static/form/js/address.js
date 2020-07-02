
/** 提交 **/

function addOrder(obj){
    var hrefs   = $(obj).attr('data-url');
    var user    = $.trim($("input[name='user']").val());
    var phone   = $.trim($("input[name='phone']").val());
    var address = $.trim($("input[name='address']").val());
    var qutime = $.trim($("input[name='qutime']").val());
    var gid     = $.trim($("input[name='gid']").val());
    var pay     = $.trim($("#pay :selected").val());

    if(hrefs == '' || hrefs == undefined){
        return false;
    }

    if(user =='' || user ==undefined || user == 'undefined'){
        layer.msg('set user');
        return false;
    }

    if(phone =='' || phone ==undefined || phone == 'undefined'){
        layer.msg('set phone ');
        return false;
    }

    if(address =='' || address ==undefined || address == 'undefined'){
        layer.msg('set address');
        return false;
    }


    if(qutime =='' || qutime ==undefined){
        layer.msg('Set receiving time');
        return false;
    }

    if(pay =='' || pay ==undefined){
        layer.msg('place Set pay type');
        return false;
    }

    $.post(hrefs,{'user':user,'phone':phone,'address':address,'gid':gid,'qutime':qutime,'pay':pay},function(ret){
            if(ret.code == 200){
                layer.msg(ret.msg,function(){
                    parent.location.href = 'ordershow?mid='+ret.mid;
                });
            }

        if(ret.code == 400){
            layer.msg(ret.msg,{icon:5},function(){
                parent.location.reload();
            });
        }
    },'json')
}


/** 时间插件**/

layui.use('laydate', function(){
    var laydate = layui.laydate;

    //执行一个laydate实例
    laydate.render({
        elem: '#qutime' //指定元素
    });
});