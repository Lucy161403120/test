<?php

 namespace article\controller;

 class Essay extends Controller{

     private $essayModel;

     public function __construct(){
         $this->essayModel = new \article\model\EssayModel();


     }

     //进入个人空间页面
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
            return '查询失败';
        }
     }

     //用户发表文章
     public function addEssay($parms){

            $id = $_SESSION['id'];

             $title = trim($parms['title']);
             if(empty($title)){

                 return $this->badJson('文章标题为空');

             }

             $type = trim($parms['type']);

             if(empty($type)){

                 return $this->badJson('文章类型为空');

             }

             $author = $_SESSION['name'];

             $summary = trim($parms['summary']);

             if(empty($summary)){

                 return $this->badJson('文章简介为空');

             }

             $content = trim($parms['content']);

             if(empty($content)){

                 return $this->badJson('文章内容为空');

             }

             $time =  date('Y-m-d H:i:s');
             $result = $this->essayModel->addEssay([$title,$type,$author,$summary,$content,$time,$id['id']]);
            if ($result){
                return $this->goodJson('','发表成功，等待管理员审核');
            }else{
                return $this->badJson('发表失败'.$time);
            }

     }

     //管理员审核文章页面
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
             return '查询失败';
         }
     }

     //根据id查询单个文章
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
             return '查询失败';
         }
     }

     //删除文章
     public function deleteEssay($parms){
        $result = $this->essayModel->deleteEssay($parms);
        if ($result){
            return $this->goodJson('','删除成功');
        }else{
            return $this->badJson('删除失败');
        }

     }

 }
?>