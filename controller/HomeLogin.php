<?php

    namespace article\controller;

    class HomeLogin extends Controller {

        private $homeLogin = null;

        function __construct(){

            $this->homeLogin = new \article\model\HomeModel();

        }

        //��¼
        public function login(){

            if ($this->isOnLine()){

                $this->loginOut();//���������˳�

            }else{
                return $this->show('homePage');
            }
        }

        //�ж��Ƿ��¼�ɹ�
        public function homeLine($parms = null){
            if (!isset($_SESSION['name'])){

                if (empty($parms['name'])){
                    return $this->badJson('�û���Ϊ��');
                }

                if (!empty($parms['password'])){
                    $parms['password'] = str_replace(' ', '',$parms['password']);

                    if($parms['password'] == '')
                        return $this->badJson('����Ϊ��');
                }else
                    return $this->badJson('����Ϊ��');

                $name = $parms['name'];
                $password = $parms['password'];

                $rlt = $this->homeLogin->search([$name,$password]);
                if ($rlt){
                    $id = $this->homeLogin->searchId([$name]);
                    if (count($id)){
                        $_SESSION['id'] = $id;
                    }
                    $_SESSION['name'] = $name;

                    return $this->goodJson('','��¼�ɹ�');
                }else{
                    return $this->badJson('�û������������');
                }
            }else{
                return $this->goodJson('','��¼�ɹ�');
            }
        }

        //�û�û���˳�����������
        static  public function isOnLine(){
            if (isset($_SESSION['name'])){
                return true;
            }
            return false;
        }

        //�˳�
        public function loginOut(){
            unset($_SESSION['id']);
            unset($_SESSION['name']);
            header('Location: /article/index.php/HomeLogin/login');
        }

    }
?>