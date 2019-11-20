<?php
namespace app\v1\controller;

use app\v1\controller\AdminBase;

class Member extends AdminBase
{

    //用户列表
    public function index(){
        if($this->get){

            $this->assign('title','用户列表');
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

        }

    }



   /**
    * 编辑
    * id string|int
    */
    public function edit(){


    }


    /**
     * 删除
     * id  string|int
     * return bool
     */
    public function del(){

    }


    /**
     * 修改状态
     * id string | int
     *
     * return bool
     */
     public function changes(){

     }

}