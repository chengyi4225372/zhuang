
/*** 搜索功能 ***/





/**
* 查看详情
**/
$('.orders_edit').click(function(){
    var urls = $(this).attr('data-url');
    if(urls == '' ||　urls == undefined){
        return false;
    }
    layer.open({
        type: 2,
        title: '查看详情',
        shadeClose: true,
        shade: 0.8,
        area: ['50%', '80%'],
        content: urls, //iframe的url
    })
});

/** 删除订单**/
$('.order_dels').click(function(){
      var hrefs = $(this).attr('data-url');

      if(hrefs == '' ||　hrefs == undefined){
        return false;
      }

    layer.confirm('您确定要删除？', {
        btn: ['确定','点错了'] //按钮
    }, function(){

        $.get(hrefs,function(ret){

            if(ret.code == 200){
                layer.msg(ret.msg,{icon:6},function(){
                    parent.location.reload();
                })
            }

            if(ret.code == 400){
                layer.msg(ret.msg,{icon:6},function(){
                    parent.location.reload();
                })
            }
        })

    }, function(){
        parent.layer.closeAll();
    });



});

/**
 * 编辑订单
 */
$('.ordersave').click(function(){
    var id  = $('#mid').val();
    var phone = $('#phone').val();
    var address = $('#address').val();
    var user = $('#user').val();

    if(phone == '' || phone == undefined){
        layer.msg('电话号码不能为空');
        return false;
    }

    if(user == '' || user == undefined){
        layer.msg('请输入用户姓名');
        return false;
    }

    if(address == '' || address == undefined){
        layer.msg('请填写用户住址');
        return false;
    }

    var urls = $(this).attr('data-url');
    $.post(urls,{'phone':phone,'user':user,'address':address,'id':id},function(ret){
          if(ret.code == 200){
              layer.msg(ret.msg,{icon:6},function(){
                  parent.location.reload();
              });
          }

         if(ret.code == 400){
            layer.msg(ret.msg,{icon:6},function(){
                parent.location.reload();
            });
        }
    },'json')
});

/** 取消 关闭 **/
$('.cancle').click(function(){
    parent.layer.closeAll();
})