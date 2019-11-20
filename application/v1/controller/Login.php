<?php

namespace app\v1\controller;

use app\v1\controller\AdminBase;
use think\session;
class Login extends  AdminBase
{
    //登录
    public function index(){
        if($this->get){
            return $this->fetch();
        }
    }

    //检查登录
    public function checklogin(){
        if($this->post){
            $user = input('post.user','','trim');
            $pwd  = input('post.pwd','','trim');

            //todo 暂停 后续
        }
        return false;
    }

    //退出 todo 未完成
    public function out(){
        if($this->get){

        }
        return false;
    }

}