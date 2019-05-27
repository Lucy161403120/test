<?php

namespace article\controller;

class Login extends Controller{

    private $userModel = null;

    //构造函数获取模型路径
    public function __construct(){
        $this->userModel = new \article\model\UserModel();

    }
    //登录
    public function login(){

    if ($this->isOnLine()){

        $this->loginOut();//若在线则退出


    }else{
        return $this->show('login');
    }
}

    //验证码
    public function code($parms = null){
        echo new \article\common\Vcode(154,41,4);
    }

    //判断用户是否登录成功
    public function inLine($parms = null){

        if (!isset($_SESSION['myname'])){

            if (empty($parms['name'])){
                return $this->badJson('用户名为空');
            }

            if (!empty($parms['password'])){
                $parms['password'] = str_replace(' ', '',$parms['password']);

                if($parms['password'] == '')
                    return $this->badJson('密码为空');
            }else
                return $this->badJson('密码为空');

            if (empty($parms['code'])){
                return $this->badJson('验证码为空');
            }

            //strtoupper() 函数把字符串转换为大写
            $code = strtoupper($parms['code']);

            if ($code  != $_SESSION['code']){
                return $this->badJson('验证码错误');
            }

            $name = $parms['name'];
            $password = $parms['password'];

            $rlt = $this->userModel->find([$name,$password]);
            if ($rlt){
                $_SESSION['myname'] = $name;
                $_SESSION['myid'] = $name;
                return $this->goodJson('','登录成功');
            }else{
                return $this->badJson('用户名或密码错误');
            }
        }else{
            return $this->goodJson('','登录成功');
        }
    }


    //用户没有退出，依旧在线
    static  public function isOnLine(){
        if (isset($_SESSION['myname'])){
            return true;
        }
        return false;
    }


    //退出
    public function loginOut(){
        unset($_SESSION['myid']);
        unset($_SESSION['myname']);
        unset($_SESSION['essayid']);
        header('Location: /article/index.php/Login/login');

    }
}
?>