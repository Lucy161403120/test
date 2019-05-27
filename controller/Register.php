<?php

    namespace article\controller;

    class Register extends Controller {

        private $register = null;

        public function __construct(){

            $this->register = new \article\model\RegisterModel();


        }

        //��ʾ��¼����
        public function showRegister(){
            return $this->show('register');
        }

        //�ж��Ƿ�ע��ɹ�
        public function resetRegister($parms){

            if (!empty($parms['name'])){
                if(!empty($parms['password'])){

                    $result = $this->register->isUser([$parms['name']]);

                    if (!$result){
                        $result1 = $this->register->addUser($parms);
                        if ($result1){

                            return $this->goodJson('');

                        }else{
                            return $this->badJson('ע��ʧ�ܣ�');
                        }
                    }else{
                        return $this->badJson('�û����Ѵ��ڣ�');
                    }

                }else{
                    return $this->badJson('����Ϊ�գ�');
                }

            }else{
                return $this->badJson('�û���Ϊ�գ�');
            }

        }

        //�����û��б�ҳ
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
                return '��ѯʧ��';
            }

        }

        //ɾ���û�
        public function deleteRegister($parms){
            $result = $this->register->deleteRegister($parms);
            if ($result){
                return $this->goodJson('','ɾ���ɹ�');
            }else{
                return $this->badJson('ɾ��ʧ��');
            }

        }

    }
?>