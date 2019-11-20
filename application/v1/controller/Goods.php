<?php
namespace app\v1\controller;

use app\v1\controller\AdminBase;

class Goods extends AdminBase
{

    //商品列表
    public function index(){

        if($this->get){

            $this->assign('title','商品列表');
            return $this->fetch();
        }
        return false;
    }


    //商品编辑
    public function edit(){

        if($this->get){

            return $this->fetch();
        }


        if($this->post){

            //todo 待完成
        }
    }




}