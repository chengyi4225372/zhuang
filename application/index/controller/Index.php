<?php
namespace app\index\controller;

use app\index\controller\HomeBase;
use app\v1\model\Goods;
class Index extends HomeBase
{
    /**
     * 首页
     * @return bool|mixed
     */
    public function index()
    {
        if($this->request->isGet()){
            $this->assign('title','首页');
            return $this->fetch();
        }
        return false;
    }

    /**
     * goods 列表页
     */
    public function goodlist(){

        if($this->request->isGet()){
            $goods  =  new Goods();
            $list   = $goods->_list();

            foreach ($list as $key =>$val){
                $list[$key]['infos'] = json_decode($list[$key]['infos']);
            }

            $this->assign('list',$list);

            $this->assign('title','商品列表');
            return $this->fetch();
        }
        return false;
    }

    /**
     * 获取客户信息页面
     */
    public function address(){
        if($this->request->isGet()){
            $id   = input('get.id','','');
            $info = $this->order->getorderinfo($id);

            $this->assign('title','购买信息');
            return $this->fetch();
        }
        return false;
    }


    /**
     * 获取请求数据
     */
     public function orderadd(){
         if($this->request->isPost() || $this->request->isAjax()){
              $data['gid']  = input('post.gid','','int');
              $data['user'] = input('post.user','','trim');
              $data['phone']= input('post.phone','','trim');
              $data['address'] = input('post.address','','trim');
              $data['orderno'] = makeorderid();
              $data['create_time'] = time();

              //发送邮件 todo 未完成

              //记录后台
              $ret = $this->order->order_add($data);
              if($ret !== false){
                  return json(['code'=>200,'msg'=>'提交成功']);
              }else{
                  return json(['code'=>400,'msg'=>'网络故障，请稍后再试。']);
              }
         }
         return false;
     }

}
