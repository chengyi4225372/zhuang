<?php

namespace app\v1\model;

use think\Model;

class User extends Model{

    /**
     * 列表
     */
    public function _list(){

        $list = $this->order('id desc')->paginate(15);
        return $list?$list:'';
    }

    /**
     * add
     * data array
     */
    public function _add($data){
       $ret =  $this->save($data);

       if($ret){
            return true;
       }else {
           return false;
       }

    }

    /**
     * 编辑
     * id  int
     * data array
     */
    public function saveByidinfo($id,$data){

     if(is_null($id)|| $id<=0 || !isset($id)){
         return false ;
     }

     if(empty($data)){
         return false;
     }

     $ret = $this->where(['id'=>$id])->update($data);

      if($ret){
          return true;
       }else {
          return  false;
      }

    }

    /**
     * 获取用户信息
     * id int
     * return array|null
     */
     public function getidinfo($id){

        if(is_null($id) || empty($id)|| !isset($id)){
            return false;
        }

        $info = $this->where(['id'=>$id])->find();

        if(empty($info)){
            return '';
        }

        if(!empty($info) || isset($info)){
            return $info;
        }

     }

    /**
     * 删除
     * id  int
     */
    public function _dels($id){
        if(is_null($id)|| $id <0 || empty($id)){
            return false;
        }

        $res = $this->where(['id'=>$id])->delete();

        if($res){
            return true;
        }

        return false;
    }

    /**
     * 修改状态
     * id int
     * status int|string
     */
    public function _savestatus($id,$status){

        if(empty($id)|| $id< 0 || is_null($id)){
            return false;
        }

        if(is_null($status) || $status == 0 ){
            return  40003;
        }

        if($status == 1){
            $status = -1;
        }else {
            $status = 1;
        }

        $res = $this->where(['id'=>$id])->update(['status'=>$status]);

        if($res){
            return 40000;
        }else {
            return 40004;
        }



    }

    /**
     * 登录判断
     * @user 用户名
     * @pwd 明文密码
     */
     public function _checkUserInfo($user,$pwd){
          $users = $this->where(['users'=>$user])->find()->toArray();
          if(empty($users)){
              return ['code'=>40003]; //用户不存在
          }

          if($users['status'] == -1){
             return ['code'=>40005]; //用户禁止登录
          }

          if($users['pwd'] !== setpwd($pwd,$users['salt'])){
              return ['code'=>40006]; //密码不对
          }

          if($users['tokens'] != tokens($users['users'],'shop_admin_user')){
              return  ['code'=>40007];//token 不对
          }

          return ['code'=> 20000,'user'=>$users];
     }

}
