<?php

    namespace article\controller;

    class Register extends Controller {

        private $register = null;

        public function __construct(){

            $this->register = new \article\model\RegisterModel();


        }

        //显示登录界面
        public function showRegister(){
            return $this->show('register');
        }

        //判断是否注册成功
        public function resetRegister($parms){

            if (!empty($parms['name'])){
                if(!empty($parms['password'])){

                    $result = $this->register->isUser([$parms['name']]);

                    if (!$result){
                        $result1 = $this->register->addUser($parms);
                        if ($result1){

                            return $this->goodJson('');

                        }else{
                            return $this->badJson('注册失败！');
                        }
                    }else{
                        return $this->badJson('用户名已存在！');
                    }

                }else{
                    return $this->badJson('密码为空！');
                }

            }else{
                return $this->badJson('用户名为空！');
            }

        }

        //进入用户列表页
        public function enterUser(){
            if(!isset($_SESSION['myid'])){
                header('Location: /article/index/Login/login');
            }
            $result = $this->register->allUser();
            if (count($result)){
                $this->date = $result;
                $content = $this->show('User');
                return $content;
            }else{
                return '查询失败';
            }

        }

        //删除用户
        public function deleteRegister($parms){
            $result = $this->register->deleteRegister($parms);
            if ($result){
                return $this->goodJson('','删除成功');
            }else{
                return $this->badJson('删除失败');
            }

        }

    }
?>