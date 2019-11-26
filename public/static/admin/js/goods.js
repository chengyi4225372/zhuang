/**
 * 添加弹窗
 */
$('.addGoods').click(function(){
   var urls = $(this).attr('data-url');

    layer.open({
        type: 2,
        title: '添加',
        shadeClose: true,
        shade: 0.8,
        area: ['50%', '70%'],
        content: urls, //iframe的url
    });
})

/**
 * 添加处理
 */
$('#add_good').click(function(){
   var imgs  = $('#Images').val();
   var title = $.trim($('#title').val());
   var status= $('#status option:selected').val();
   var info  = $.trim($('#info').val());

   var urls   = $(this).attr('data-url');

   if(imgs ==''|| imgs== undefined ){
       layer.msg('请上传商品图片');
       return false;
   }

   if(info == '' || info == undefined){
       layer.msg('请输入商品信息');
       return false;
   }

    if(title == '' || title == undefined){
        layer.msg('请输入商品名称');
        return false;
    }

   $.post(urls,{'title':title,'status':status,'imgs':imgs,'info':info},function(ret){
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

   },'json')

});











/**
 * 取消
 */
$('.cancle').click(function(){
    parent.layer.closeAll();
})


/***
 * 上传图片
 */
//上传图片
function upload_files() {
    var formData =new FormData();
    formData.append("file",$("#file")[0].files[0]);

    var urls = 'uploadimgs';

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
                $("#Imgs").attr('src', ret.path);
                $("#Images").val(ret.path);
                layer.msg(ret.msg,{icon:6});
            } else {
                layer.msg(ret.msg);
            }
        },

    });
    return false;
}
