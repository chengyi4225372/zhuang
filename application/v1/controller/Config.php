<?php

namespace app\v1\controller;

use app\v1\controller\AdminBase;


class  Config extends AdminBase{

    //网站配置
    public function index(){

        if($this->get){

            $this->assign('title','网站设置');
            return $this->fetch();
        }

    }



}