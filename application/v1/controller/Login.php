<?php

namespace app\v1\controller;

use app\v1\model\User;
use think\Controller;
use think\session;
class Login extends  Controller
{
    //登录
    public function index(){
        if($this->request->isGet()){
            if(session('admin_user') == false || $this->request->action == 'out'){
                return $this->fetch();
            }
        }
    }

    //检查登录
    public function checklogin(){
        if($this->request->isPost()){
            $users = input('post.user','','trim');
            $pwd  = input('post.pwd','','trim');
            
            $user = new User();
            $result = $user->_checkUserInfo($users,$pwd);


            if($result['code'] == 40003){
                 return json(['code'=>403,'msg'=>'用户不存在']);
            }

            if($result['code']== 40005){
                return json(['code'=>405,'msg'=>'该用户禁止登录']);
            }

            if($result['code'] == 40006){
                return json(['code'=>406,'msg'=>'用户密码不对']);
            }

            if($result['code'] == 40007){
                return json(['code'=>407,'msg'=>'令牌不合法']);
            }

            if($result['code'] == 20000){
                session('admin_user',$result['user']);
                session('admin_role',$result['user']['role']);
                return json(['code'=>402,'msg'=>'登录成功']);
            }

        }
        return false;
    }

    //退出
    public function out(){
        if($this->request->isGet()){
           session('admin_user','');
           session_destroy();
           $this->redirect('login/index');
        }
        return false;
    }


}