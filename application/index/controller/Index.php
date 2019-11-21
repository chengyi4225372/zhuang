<?php
namespace app\index\controller;

use app\index\controller\HomeBase;
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

            $this->assign('title','商品列表');
            return $this->fetch();
        }
        return false;
    }



}
