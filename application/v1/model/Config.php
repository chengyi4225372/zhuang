<?php

namespace app\v1\model;

use think\Model;

class Config extends Model{

    /**
     * 获取单条数据
     */
     public function getallone(){
         $one = $this->find();
         return $one?$one:'';
     }

    /**
     * 添加
     * @data
     */
     public function add($data){
        $ret =  $this->save($data);

        if($ret !== false){
            return true;
        }else {
            return false;
        }
     }


     /**
      * 编辑
      * @id
      * @data
      */
     public function edit($id,$data){
         if(checkEmptyId($id) ==  false){
             return false;
         }

        if(empty($data)){
            return false;
        }

        $ret = $this->where(['id'=>$id])->data($data)->update();

        if($ret !== false){
            return true;
        }else {
            return false;
        }
     }
     
}