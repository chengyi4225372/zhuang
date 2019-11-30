<?php
namespace app\v1\controller;

use app\v1\controller\AdminBase;
use app\v1\model\Goods as Good;

class Goods extends AdminBase
{
    protected $goods = ''; //商品模型

    public function _initialize()
     {
         parent::_initialize(); // TODO: Change the autogenerated stub
         $this->goods = new Good();
     }

    /**
     * @return bool|mixed
     * 商品列表
     */
    public function index(){
        if($this->get){
            $list  = $this->goods->_list();
            $this->assign('title','商品列表');
            $this->assign('list',$list);
            return $this->fetch();
        }
        return false;
    }

    /**
     * @return mixed
     * 商品添加
     */
    public function add(){
        if($this->post){
           $data['title']   = input('post.title','','trim');
           $data['status']  = input('post.status','','int');
           $data['infos']    = json_encode(input('post.info','','trim'));
           $data['imgs']    = input('post.imgs','','trim');
            
           $ret = $this->goods->_add($data);

           if($ret){
               return json(['code'=>200,'msg'=>'添加成功']);
           }else{
               return json(['code'=>400,'msg'=>'添加失败']);
           }

        }
        return $this->fetch();
     }

    /**
     * @return mixed
     * 商品编辑
     */
    public function edit(){
         if($this->get){
            $id = input('get.id','','int');
            $info = $this->goods->_getinfo($id);
            $info['infos'] = json_decode($info['infos']);
            $this->assign('info',$info);
            return $this->fetch();
        }

         if($this->post){
           $data['title']   = input('post.title','','trim');
           $data['status']  = input('post.status','','int');
           $data['infos']   = json_encode(input('post.info','','trim'));
           $data['imgs']    = input('post.imgs','','trim');
           $id               = input('post.id','','int');

//           dump($data);
//           exit();

           $ret = $this->goods->_edit($data,$id);

           if($ret){
               return json(['code'=>200,'msg'=>'编辑成功']);
           }else{
               return json(['code'=>400,'msg'=>'编辑失败']);
           }

        }
    }

    /**
     * 商品删除
     */
    public function dels(){
        if($this->get || $this->ajax){
            $id = input('get.id','','int');

            if(empty($id) || is_null($id)){
                return false;
            }

            $ret = $this->goods->_dels($id);

            if($ret !== false){
                return json(['code'=>200,'msg'=>'删除成功']);
            }else{
                return json(['code'=>400,'msg'=>'删除失败']);
            }

        }
        return false;
    }

    /**
     * 上架 下架
     * @id
     * @status
     */
    public function savestatus(){
         if($this->post || $this->ajax){
             $id = input('post.id','','int');
             $status = input('post.status','','trim');

             if(empty($id) || is_null($id)){
                 return false;
             }

             $ret = $this->goods->_saveStatus($id,$status);

             if($ret !== false){
                 return json(['code'=>200,'msg'=>'操作成功']);
             }else {
                 return json(['code'=>400,'msg'=>'操作失败']);
             }
         }
         return false;
     }

   /**
    * 上传图片
    */
    public function uploadimgs(){
        // 获取上传文件
        $file =$this->request->file('file');
        // 验证图片,并移动图片到框架目录下。
        $path = ROOT_PATH.'public/uploads/imgs/goods/';

        if(!is_dir($path)){
            mkdir($path,0755,true);
        }

        $info = $file->move($path,false,true);
        if($info){
            $mes = $info->getSaveName();
            $mes = str_replace("\\",'/',$mes);
            return json(['code'=>'200','msg'=>'上传成功','path'=>'/uploads/imgs/goods/'.$mes]);
        }else{
            // 文件上传失败后的错误信息
            $mes = $file->getError();
            return json(['code'=>'400','msg'=>$mes]);
        }
    }
}