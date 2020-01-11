<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CommonModel;

class IndexController extends Controller
{
    /**
     * 注册
     */
    public function reg()
    {
        $reg_info = [
            'name'  => 'zhang',          // 用户名
            'email' => 'zhang@qq.com',
            'mobile'    => '15210772510',
            'pass1'     => '123123',
            'pass2'     => '123123',
        ];
        //echo __METHOD__;die;
        //请求passport 注册接口
        $url = 'http://passport.1905.com/api/user/reg';
        $response = CommonModel::curlPost($url,$reg_info);
        echo '<pre>';print_r($response);echo '</pre>';
    }
    public function login()
    {
        $login_info = [
            'name'  => 'zhang',
            'pass'  => '123123',
        ];
        //请求passport 登录接口
        $url = 'http://passport.1905.com/api/user/login';
        $response = CommonModel::curlPost($url,$login_info);
        echo '<pre>';print_r($response);echo '</pre>';
    }
    public function getData()
    {
        $token = '71d5593b8c290d8af64e';
        $uid = 11;
        //请求passport 获取数据接口
        $url = 'http://passport.1905.com/api/show/time';
        $header = [
            'token:'.$token,
            'uid:'.$uid
        ];
        $response = CommonModel::curlGet($url,$header);
    }
}
