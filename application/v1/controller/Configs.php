<?php

namespace app\v1\controller;

use app\v1\controller\AdminBase;
use app\v1\model\Config;
class  Configs extends AdminBase{

    //网站配置
    public function index(){

        if($this->get){
            $config = new Config();
            $one = $config->getallone();
            $this->assign('one',$one);
            $this->assign('title','网站设置');
            return $this->fetch();
        }
       return false;
    }



    /**
     * 上传头部图
     */
    public function uploadhimgs(){
        // 获取上传文件
        $file =$this->request->file('file');
        // 验证图片,并移动图片到框架目录下。
        $path = ROOT_PATH.'public/uploads/imgs/himgs/';

        if(!is_dir($path)){
            mkdir($path,0755,true);
        }

        $info = $file->move($path,false,true);
        if($info){
            $mes = $info->getSaveName();
            $mes = str_replace("\\",'/',$mes);
            return json(['code'=>'200','msg'=>'上传成功','path'=>'/uploads/imgs/himgs/'.$mes]);
        }else{
            // 文件上传失败后的错误信息
            $mes = $file->getError();
            return json(['code'=>'400','msg'=>$mes]);
        }
    }



    /**
     * 上传头部图
     */
    public function uploadfimgs(){
        // 获取上传文件
        $file =$this->request->file('files');
        // 验证图片,并移动图片到框架目录下。
        $path = ROOT_PATH.'public/uploads/imgs/fimgs/';

        if(!is_dir($path)){
            mkdir($path,0755,true);
        }

        $info = $file->move($path,false,true);
        if($info){
            $mes = $info->getSaveName();
            $mes = str_replace("\\",'/',$mes);
            return json(['code'=>'200','msg'=>'上传成功','path'=>'/uploads/imgs/fimgs/'.$mes]);
        }else{
            // 文件上传失败后的错误信息
            $mes = $file->getError();
            return json(['code'=>'400','msg'=>$mes]);
        }
    }

}