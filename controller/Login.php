<?php

namespace article\controller;

class Login extends Controller{

    private $userModel = null;

    //���캯����ȡģ��·��
    public function __construct(){
        $this->userModel = new \article\model\UserModel();

    }
    //��¼
    public function login(){

    if ($this->isOnLine()){

        $this->loginOut();//���������˳�


    }else{
        return $this->show('login');
    }
}

    //��֤��
    public function code($parms = null){
        echo new \article\common\Vcode(154,41,4);
    }

    //�ж��û��Ƿ��¼�ɹ�
    public function inLine($parms = null){

        if (!isset($_SESSION['myname'])){

            if (empty($parms['name'])){
                return $this->badJson('�û���Ϊ��');
            }

            if (!empty($parms['password'])){
                $parms['password'] = str_replace(' ', '',$parms['password']);

                if($parms['password'] == '')
                    return $this->badJson('����Ϊ��');
            }else
                return $this->badJson('����Ϊ��');

            if (empty($parms['code'])){
                return $this->badJson('��֤��Ϊ��');
            }

            //strtoupper() �������ַ���ת��Ϊ��д
            $code = strtoupper($parms['code']);

            if ($code  != $_SESSION['code']){
                return $this->badJson('��֤�����');
            }

            $name = $parms['name'];
            $password = $parms['password'];

            $rlt = $this->userModel->find([$name,$password]);
            if ($rlt){
                $_SESSION['myname'] = $name;
                $_SESSION['myid'] = $name;
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
        if (isset($_SESSION['myname'])){
            return true;
        }
        return false;
    }


    //�˳�
    public function loginOut(){
        unset($_SESSION['myid']);
        unset($_SESSION['myname']);
        unset($_SESSION['essayid']);
        header('Location: /article/index.php/Login/login');

    }
}
?>