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


/** 取消 关闭 **/
$('.cancle').click(function(){
    parent.layer.closeAll();
})