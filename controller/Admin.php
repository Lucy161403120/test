<?php

    namespace article\controller;


    class Admin extends Controller{

        private $userModel = null;
        private $commentModel = null;

        function __construct(){

            $this->userModel = new \article\model\UserModel();
            $this->commentModel = new \article\model\CommentModel();

        }

        //判断是否显示页面（首页）
        public function index(){

            if (Login::isOnLine()){

                $result = $this->userModel->searchUserData();

                if (count($result) !== 0){

                    $this->date = $result[0];

                    $result1 = $this->commentModel->selectAllComment();

                    if (count($result1)){

                        $this->data = $result1;

                        return $this->show('backstage');

                    }else{

                        return '查询失败';
                    }

                }

            }else{

                return $this->show('Login');

            }

        }


        //进入首页
        //@return mixed|string
        public function homePage(){

            if(!isset($_SESSION['id'])){
                header('Location: /article/index.php/HomeLogin/login');
            }


            $result = $this->userModel->searchUserData();

            if (count($result) !== 0){

                $this->date = $result[0];

                return $this->show('homePage');

            }else{

                return '站点不存在！';

            }

        }

    }<br>

?>
