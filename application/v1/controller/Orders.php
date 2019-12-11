<?php
namespace app\v1\controller;
/**
 * 订单控制器
 */
use app\v1\controller\AdminBase;
use app\v1\model\Order;
class Orders extends AdminBase {

    protected $order = '';

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub

        $this->order = new Order();
    }

    /**
     * @return bool|mixed
     * 列表页
     */
    public function index(){
        if($this->get){
            $title = input('get.title','','');
            $title = $title?$title:'';
            $list =  $this->order->getorderlist($title);
            $this->assign('list',$list);
            $this->assign('title','订单列表页');
            return $this->fetch();
        }
        return false;
    }

    /**
     * 添加
     */
    public function add(){
        if($this->get){
            $this->assign('title','订单添加');
            return $this->fetch();
        }

        if($this->post || $this->ajax){




           $ret = $this->order->order_add();
           if($ret !== false){
               return json(['code'=>200,'msg'=>'添加成功']);
           }else{
               return json(['code'=>400,'msg'=>'添加失败']);
           }
        }

        return false;
    }

    /**
     * 编辑
     * @id
     */
    public function edit(){
          if($this->get){
              $id   = input('get.id','','int');
              $info = $this->order->getorderinfo($id);
              $this->assign('info',$info);
              return $this->fetch();
          }

          if($this->post){
              $id   = input('post.id','','int');
              $data['user'] = input('post.user','','trim');
              $data['phone'] = input('post.phone','','trim');
              $data['address'] = input('post.address','','trim');

              if(checkEmptyId($id) == false){
                  return false;
              }

              $ret = $this->order->order_edit($id,$data);

              if($ret !== false){
                  return json(['code'=>200,'msg'=>'编辑成功']);
              }else {
                  return json(['code'=>400,'msg'=>'编辑失败']);
              }
          }

          return false;
      }

    /**
     * 删除
     */
    public function dels(){
        if($this->get){
           $id = input('get.id','','int');

           if(checkEmptyId($id) == false){
               return false;
           }

           $ret = $this->order->order_del($id);

           if($ret !== false){
               return json(['code'=>200,'msg'=>'删除成功']);
           }else{
               return json(['code'=>400,'msg'=>'删除失败']);
           }

        }
        return false;
    }

}