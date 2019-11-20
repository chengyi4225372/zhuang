<?php
namespace app\v1\model;

use think\Model;

class Admin extends Model
{
    protected $table = 'admin';

    protected $autoWriteTimestamp = true;

    /**
     *  $arr array
     *  return bool
     */
    public function _add($arr){

     $ret = $this->insertGetId($arr);
     return $ret;
    }
}

