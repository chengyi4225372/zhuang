<?php
namespace app\v1\controller;

use app\v1\controller\AdminBase;
use app\v1\model\User;
class Member extends AdminBase
{

    protected $user ='';

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->user = new User();
    }

    /**
     * 用户列表
     * @return bool|mixed
     */
    public function index(){
        if($this->get){
            $list = $this->user->_list();
            $this->assign('title','member List');
            $this->assign('list',$list);
            return $this->fetch();
        }

        return false;
    }

    /**
     * 添加
     * data  array
     * @return mixed
     */
    public function add(){
        if($this->get){
            return $this->fetch();
        }

        if($this->post || $this->ajax){
            $pwd = input('post.pwd','','trim');
            $data['users'] = input('post.user','','trim');
            $data['status']  = input('post.status','','trim');
            $data['role']  = input('post.role','','trim');
            $data['salt'] = rand_str();
            $data['create_time'] = time();
            $data['tokens'] = tokens($data['users'],'shop_admin_user');
            $data['ip']     = getIp();
            $data['pwd'] = setpwd($pwd,$data['salt']);

            $rets = $this->user->_add($data);

            if($rets !== false){
                return json(['code'=>200,'msg'=>'success']);
            }else {
                return json(['code'=>400,'msg'=>'error']);
            }

        }
    }

   /**
    * 编辑
    * id string|int
    */
    public function edit(){
        if($this->get){
            $id  = input('get.mid');

            if(is_null($id) || $id<=0){
                return false;
            }

            $info =$this->user->getidinfo($id);
            $this->assign('info',$info);
            return $this->fetch();
        }

        if($this->post){
           $id = input('post.mid','','int');
           $pwd= input('post.pwd','','trim');
           $data['users']  = input('post.user','','trim');
           $data['status'] = input('post.status','','int');
           $data['role']  = input('post.role','','trim');
           $data['salt']   = rand_str();
           $data['create_time']  = time();
           $data['tokens'] = tokens($data['users'],'shop_admin_user');
           $data['pwd']    = setpwd($pwd,$data['salt']);


           if($id <=0 || is_null($id)|| !isset($id)){
               return false;
           }

           if(empty($data)){
               return json(['code'=>403,'msg'=>'data is empty']);
           }

           $res = $this->user->saveByidinfo($id,$data);

           if($res !== false){
               return json(['code'=>200,'msg'=>'success']);
           }else {
               return json(['code'=>400,'msg'=>'error']);
           }

        }

    }

    /**
     * 删除
     * id  string|int
     * return bool
     */
    public function del(){
      if($this->get){
          $id = input('get.mid','','int');

          if($id<=0 || is_null($id) || !isset($id)){
              return false;
          }

          $ret = $this->user->_dels($id);

          if($ret !== false){
              return json(['code'=>200,'msg'=>'success']);
          }else{
              return json(['code'=>400,'msg'=>'error']);
          }
      }

    }

    /**
     * 修改状态
     * id string | int
     * return bool
     */
     public function changes(){
        $id     = input('post.id','','int');
        $status = input('post.status','','int');

        if($id<=0 || is_null($id)|| !isset($id)){
            return false;
        }

        $ret = $this->user->_savestatus($id,$status);

        if($ret == 40003){
            return json(['code'=>403,'msg'=>'mid error']);
        }

         if($ret == 40004){
             return json(['code'=>404,'msg'=>'action error']);
         }

         if($ret == 40000){
             return json(['code'=>200,'msg'=>'success']);
         }
     }

}