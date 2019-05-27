<?php

    namespace article\controller;


    class Admin extends Controller{

        private $userModel = null;
        private $commentModel = null;

        function __construct(){

            $this->userModel = new \article\model\UserModel();
            $this->commentModel = new \article\model\CommentModel();

        }

        //�ж��Ƿ���ʾҳ�棨��ҳ��
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

                        return '��ѯʧ��';
                    }

                }

            }else{

                return $this->show('Login');

            }

        }


        //������ҳ
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

                return 'վ�㲻���ڣ�';

            }

        }

    }<br>

?>
