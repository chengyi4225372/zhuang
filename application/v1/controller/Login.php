<?php

namespace app\v1\controller;

use app\v1\controller\AdminBase;
use app\v1\model\User;
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
            $users = input('post.user','','trim');
            $pwd  = input('post.pwd','','trim');

            $user = new User();
            $result = $user->_checkUserInfo($users,$pwd); //todo 待完成

            if($result == 40003){

            }

            if($result == 40000){

            }

            if($result == 40004){

            }

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