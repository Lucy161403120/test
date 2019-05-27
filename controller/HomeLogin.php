<?php

    namespace article\controller;

    class HomeLogin extends Controller {

        private $homeLogin = null;

        function __construct(){

            $this->homeLogin = new \article\model\HomeModel();

        }

        //登录
        public function login(){

            if ($this->isOnLine()){

                $this->loginOut();//若在线则退出

            }else{
                return $this->show('homePage');
            }
        }

        //判断是否登录成功
        public function homeLine($parms = null){
            if (!isset($_SESSION['name'])){

                if (empty($parms['name'])){
                    return $this->badJson('用户名为空');
                }

                if (!empty($parms['password'])){
                    $parms['password'] = str_replace(' ', '',$parms['password']);

                    if($parms['password'] == '')
                        return $this->badJson('密码为空');
                }else
                    return $this->badJson('密码为空');

                $name = $parms['name'];
                $password = $parms['password'];

                $rlt = $this->homeLogin->search([$name,$password]);
                if ($rlt){
                    $id = $this->homeLogin->searchId([$name]);
                    if (count($id)){
                        $_SESSION['id'] = $id;
                    }
                    $_SESSION['name'] = $name;

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
            if (isset($_SESSION['name'])){
                return true;
            }
            return false;
        }

        //退出
        public function loginOut(){
            unset($_SESSION['id']);
            unset($_SESSION['name']);
            header('Location: /article/index.php/HomeLogin/login');
        }

    }
?>