<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/2
 * Time: 17:36
 */
namespace app\v1\controller;

use app\v1\controller\AdminBase;
use app\v1\model\Config;
use think\Db;
class  Cates extends AdminBase{

    protected  $table = 'cates';


    public function index(){
        $list = Db::name('cates')->order('id desc')->paginate(15);
        $this->assign('list',$list);
        $this->assign('title','goods cates');
        return $this->fetch();
    }


    public function add (){
        if($this->request->isPost()){
            $data['pname'] = input('post.pname');

            $ret = Db::name('cates')->insertGetId($data);

            if($ret){
                return json(['code'=>200,'msg'=>'success']);
            }else {
                return json(['code'=>400,'msg'=>'error']);
            }
        }

        return $this->fetch();
    }


    public  function edit(){
        if($this->request->isPost()){
            $id = input('post.mid');
            $data['pname'] = input('post.pname');

            $ret = Db::name('cates')->where(['id'=>$id])->update($data);

            if($ret){
                return json(['code'=>200,'msg'=>'success']);
            }else {
                return json(['code'=>400,'msg'=>'error']);
            }
        }

        $id = input('get.mid');

        $info = Db::name('cates')->where(['id'=>$id])->find();
        $this->assign('info',$info);

        return $this->fetch();
    }



    public  function  del(){
        if($this->request->isGet()){
            $id = input('post.mid');
            $info = Db::name('cates')->where(['id'=>$id])->delete();

            if($info){
                return json(['code'=>200,'msg'=>'success']);
            }else {
                return json(['code'=>400,'msg'=>'error']);
            }
        }
        return false;
    }
}