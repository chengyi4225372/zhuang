<?php
namespace app\v1\model;

use think\Model;
class Goods extends Model{

    /**
     * 列表
     */
    public function _list(){
        $list =$this->where('del_time',null)->order('id desc')->paginate(15);
        $list?$list:'';
        return $list;
    }

    /**
     * 详情
     * @id
     */
     public function _getinfo($id){

         if(empty($id) || is_null($id) || $id <=0){
             return false;
         }

         $info = $this->where(['id'=>$id])->find();

         $info ? $info :'';

         return $info;
     }

    /**
     * 添加
     * @data array
     *
     */
    public function _add($data){
        if(empty($data)){
            return false;
        }
        $data['create_time'] = time();
        $res = $this->save($data);

        if($res !== false){
            return true;
        }else{
            return false;
        }

    }

   /**
    * 编辑
    * @data array
    * @id  int|string
    */
   public function _edit($data,$id){
       if(empty($id) || is_null($id) || $id<=0){
           return false;
       }

       $ret = $this->where(['id'=>$id])->data($data)->update();

       if($ret!== false){
           return true;
       }else {
           return false;
       }
   }

   /**
    * 删除
    * @id int|string
    *
    */
   public function _dels($id){
       if(empty($id) || is_null($id) || $id<=0){
           return false;
       }

       $ret = $this->where(['id'=>$id])->update(['del_time'=>time()]);

       if($ret){
            return true;
       }else {
           return false;
       }
   }

   /**
    * 上架 下架
    * @id int
    * @status int
    */
   public function _saveStatus($id,$status){
       if(empty($id) || is_null($id) || $id<=0){
           return false;
       }

       if($status == 1){
           $status = -1;
       }else {
           $status = 1;
       }

       $ret = $this->where(['id'=>$id])->update(['status'=>$status]);

       if($ret){
           return true;
       }else {
           return false;
       }
   }
}