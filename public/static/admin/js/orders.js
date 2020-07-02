/*** 搜索功能 ***/
function searchword(obj){
   var keyword = $.trim($('#keyword').val());
   var urls = $(obj).attr('data-url');

   if(keyword == '' || keyword == undefined){
       layer.msg('请输入搜索的关键字');
       return false;
   }
   window.location.href = urls+'?title='+keyword;
}


/** 时间插件**/

layui.use('laydate', function(){
    var laydate = layui.laydate;

    //执行一个laydate实例
    laydate.render({
        elem: '#qutime' //指定元素
    });
});



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
    var price = $('#price').val();
    var qutime = $('#qutime').val();
    var pay    = $('#pay option:selected').val();


    if(phone == '' || phone == undefined){
        layer.msg('set phone ');
        return false;
    }

    if(user == '' || user == undefined){
        layer.msg('set user name');
        return false;
    }

    if(address == '' || address == undefined){
        layer.msg('set address ');
        return false;
    }

    var urls = $(this).attr('data-url');

    $.post(urls,{'phone':phone,'user':user,'address':address,'id':id,'price':price,'qutime':qutime,'pay':pay},function(ret){
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
});

