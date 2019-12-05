<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * @param int $randLength 长度
 * @param int $addtime 是否加入当前时间戳
 * @param int $includenumber 是否包含数字
 * @return string
 */
function rand_str($randLength = 6, $addtime = 0, $includenumber = 0)
    {
        if ($includenumber) {
                    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNPQEST123456789';
         } else {
                    $chars = 'abcdefghijklmnopqrstuvwxyz';
         }

         $len = strlen($chars);
         $randStr = '';

         for ($i = 0; $i < $randLength; $i++) {
             $randStr .= $chars[mt_rand(0, $len - 1)];
          }

         $tokenvalue = $randStr;

        if ($addtime) {
            $tokenvalue = $randStr . time();
         }

         return $tokenvalue;
    }

/**
 * 生成token
 * @users 用户名
 * @time 时间戳
 */
function tokens($users,$time){
    $tokens = md5(md5($users).$time);
    return $tokens;
}

/**
 * 生成密码
 * @pwd  明文密码
 * @salt 盐
 */
function setpwd($pwd){
    $pwd = md5(md5($pwd).'shop_admin_user_member');
    return $pwd;
}

/**
 * 获取ip
 */
function getIp()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
        foreach ($matches[0] AS $xip) {
            if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                $ip = $xip;
                break;
            }
        }
    } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } elseif (isset($_SERVER['HTTP_X_REAL_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_REAL_IP'])) {
        $ip = $_SERVER['HTTP_X_REAL_IP'];
    }
    return $ip;
}

/**
 * 检查id 是否为空
 */
function checkEmptyId($id){
    if(empty($id)|| is_null($id)|| isset($id) ==false|| id<=0){
        return false;
    }
    return true;
}


