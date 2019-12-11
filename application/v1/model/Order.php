<?php

namespace  app\v1\model;

use think\Model;
use app\v1\model\Goods;
class Order extends Model
{
    /**
     * 获取订单总数 不包括删除订单
     */
      public function order_count(){
          $count = $this->where(['status'=>1])->count();
          return $count?$count:0;
      }

     /**
      * 获取列表
      * @title
      */
     public function  getorderlist($title){

         if(!empty($title) || isset($title)){
             $where = [
                 'status'=>1,
                 'orderno|user|phone'=>['like','%'.$title.'%'],
             ];
         }

         $list  = $this->where($where)->order('create_time desc')->paginate(15);
         $list  = $list ?$list:'';
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

         if($ret !== false){
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
         // $goods = new Goods();
          $info = $this->where(['status'=>1,'id'=>$id])->find();
         // $info = array_column($goods,'title','id');
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