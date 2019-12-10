<?php
namespace app\v1\controller;

use app\v1\controller\AdminBase;
use app\v1\model\User;
use app\v1\model\Goods;
use app\v1\model\Order;

class Index extends AdminBase
{
    protected  $user = '';

    protected  $goods = '';

    protected  $order = '';


    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->user  = new User();
        $this->goods = new Goods();
        $this->order = new Order();
    }

    //后台首页
    public function index(){
        if($this->get){
            $user_count  = $this->user->getcount();
            $goods_count = $this->goods->getgoodscount();
            $order_count = $this->order->order_count();
            $this->assign('user_count',$user_count);
            $this->assign('goods_count',$goods_count);
            $this->assign('order_count',$order_count);
            $this->assign('title','后台首页');
            return $this->fetch();
        }
      return false;
    }



}