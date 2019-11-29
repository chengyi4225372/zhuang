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
                 return json(['code'=>403,'msg'=>'用户不存在']);
            }

            if($result == 40005){
                return json(['code'=>405,'msg'=>'该用户禁止登录']);
            }

            if($result == 40006){
                return json(['code'=>406,'msg'=>'用户密码不对']);
            }

            if($result == 40007){
                return json(['code'=>407,'msg'=>'令牌不合法']);
            }

             session('admin_user',$result);
             return json(['code'=>400,'msg'=>'请求成功']);
        }
        return false;
    }

    //退出
    public function out(){
        if($this->get){
           session('admin_user','');
           session_destroy();
           $this->redirect('login/index');
        }
        return false;
    }


}