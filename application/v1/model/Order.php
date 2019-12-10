<?php

namespace  app\v1\model;

use think\Model;

class Order extends Model
{
     /**
      * 获取列表
      */
     public function  getorderlist(){
         $list = $this->where(['status'=>1])->order('create_time desc')->paginate(15);
         $list = $list ?$list:'';
         return $list;
     }

     /**
      * 添加
      * @$data
      */
     public function order_add($data){

         if(empty($data) || isset($data) == false){
             return false;
         }

         $ret = $this->save($data);

         if($ret !==false){
             return true;
         }else {
             return false;
         }

     }

    /**
     * 详细信息
     * @id
     */
     public  function getorderinfo($id){
          if(checkEmptyId($id) == false){
              return false;
          }

          $info = $this->where(['status'=>1,'id'=>$id])->find();

          return $info?$info:'';
      }

     /**
      * 编辑
      * @id
      * @data
      */
     public function order_edit($id,$data){
         if(checkEmptyId($id) == false){
             return false;
         }

         if(empty($data) || isset($data) == false){
             return false;
         }

         $ret = $this->where(['id'=>$id])->data($data)->update();

         if($ret !== false){
             return true;
         }else {
             return false;
         }
     }

     /**
      * 删除
      * @id
      */
     public function order_del($id){
         if(checkEmptyId($id) == false){
             return false;
         }
         $ret = $this->where(['id'=>$id])->data(['status'=>0])->update();

         if($ret !== false){
             return true;
         }else {
             return false;
         }
     }
}