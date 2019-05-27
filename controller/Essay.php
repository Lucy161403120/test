<?php

 namespace article\controller;

 class Essay extends Controller{

     private $essayModel;

     public function __construct(){
         $this->essayModel = new \article\model\EssayModel();


     }

     //������˿ռ�ҳ��
     public function enterSpace(){
         if(!isset($_SESSION['id'])){
             header('Location: /article/index.php/HomeLogin/login');
         }
         $parms = $_SESSION['id'];
        $result = $this->essayModel->User($parms);
        if (count($result)){
            $this->date = $result;
            $content = $this->show('UserSpace');
            return $content;
        }else{
            return '��ѯʧ��';
        }
     }

     //�û���������
     public function addEssay($parms){

            $id = $_SESSION['id'];

             $title = trim($parms['title']);
             if(empty($title)){

                 return $this->badJson('���±���Ϊ��');

             }

             $type = trim($parms['type']);

             if(empty($type)){

                 return $this->badJson('��������Ϊ��');

             }

             $author = $_SESSION['name'];

             $summary = trim($parms['summary']);

             if(empty($summary)){

                 return $this->badJson('���¼��Ϊ��');

             }

             $content = trim($parms['content']);

             if(empty($content)){

                 return $this->badJson('��������Ϊ��');

             }

             $time =  date('Y-m-d H:i:s');
             $result = $this->essayModel->addEssay([$title,$type,$author,$summary,$content,$time,$id['id']]);
            if ($result){
                return $this->goodJson('','����ɹ����ȴ�����Ա���');
            }else{
                return $this->badJson('����ʧ��'.$time);
            }

     }

     //����Ա�������ҳ��
     public function examineEssay(){
         if(!isset($_SESSION['myid'])){
             header('Location: /article/index/Login/login');
         }
         $result = $this->essayModel->allEssay();
         if (count($result)){
             $this->date = $result;
             $content = $this->show('examineEssay');
             return $content;
         }else{
             return '��ѯʧ��';
         }
     }

     //����id��ѯ��������
     public function searchEssayById($parms){
         if(!isset($_SESSION['myid'])){
             header('Location: /article/index/Login/login');
         }
         $result = $this->essayModel->searchEssayById($parms);
         if (count($result)){
             $this->date = $result;
             $content = $this->show('userEssay');
             return $content;
         }else{
             return '��ѯʧ��';
         }
     }

     //ɾ������
     public function deleteEssay($parms){
        $result = $this->essayModel->deleteEssay($parms);
        if ($result){
            return $this->goodJson('','ɾ���ɹ�');
        }else{
            return $this->badJson('ɾ��ʧ��');
        }

     }

 }
?>