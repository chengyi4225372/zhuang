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
//            $id = input('get.id','','');

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

         }
         return false;
     }

}
