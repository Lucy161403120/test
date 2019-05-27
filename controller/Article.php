<?php

    namespace article\controller;

    class Article extends Controller {

        private $ArticleModel;
        private $essayModel;
        private $commentModel;

        public function __construct(){

            $this->ArticleModel = new \article\model\ArticleModel();
            $this->essayModel = new \article\model\EssayModel();
            $this->commentModel = new \article\model\CommentModel();


        }

        //�ж��Ƿ���ʾ�б�ҳ
        public function enterList(){

            if(!isset($_SESSION['id'])){
                header('Location: /article/index/HomeLogin/login');
            }

            $result = $this->ArticleModel->allTitle();

            if (count($result) !== 0){

                $this->date = $result;

                $result1 = $this->ArticleModel->allAuthor();

                if (count($result1) !== 0){

                    $this->data = $result1;

                    return $this->show('List');

                }

            }else{

                return $this->badJson('վ�㲻���ڣ�');

            }

        }



        //����Ա��ѯ����
        public function SearchArticle($parms){
            if(!isset($_SESSION['myid'])){
                header('Location: /article/index.php/Login/login');
            }

            $total =  $this->ArticleModel->searchArticleLike($parms);

                if (count($total)){

                    $this->date = $total;

                    $content = $this->show('Details');

                    return $content;

                }else{

                    return $this->badJson('��ѯʧ��');

                }

        }

        //�û���ѯ����
        public function SearchUserArticle($parms){
            if(!isset($_SESSION['id'])){
                header('Location: /article/index.php/HomeLogin/login');
            }

            $result = $this->commentModel->selectAllComment();

            if (!empty($result)){

                $this->data = $result;
                $total =  $this->ArticleModel->searchArticleLike($parms);

                if (count($total)){

                    $this->date = $total;

                    $content = $this->show('UserDetails');

                    return $content;

                }else{
                    return $this->badJson('��ѯʧ��');
                }

            }else{
                return $this->badJson('��ѯʧ��');

            }

        }

        //�û������ѯ����
        public function SearchIdArticle($parms){
            if(!isset($_SESSION['id'])){
                header('Location: /article/index.php/HomeLogin/login');
            }
            $result = $this->commentModel->selectAllComment();

            if (!empty($result)){

                $this->data = $result;

                $total = $this->ArticleModel->searchArticleById($parms);

                if (count($total)){

                    $this->date = $total;

                    $content = $this->show('UserDetails');

                    return $content;

                }else{

                    return $this->badJson('��ѯʧ��');

                }
            }else{

             return $this->badJson('��ѯʧ��');
          }

        }

        //ɾ������
        public function deleteArticle($parms){

            $id = $parms['id'];
            $rwes = $this->ArticleModel->searchArticleById([intval($id)]);

            if (count($rwes)){
                $cover = $rwes[0]['cover'];
                $file_path = ROOT.'\img\\'.$cover;
                $lost = null;

                $pdo = $this->ArticleModel->getPdo();

                $pdo->beginTransaction();

                $result = $this->ArticleModel->deleteArticle([intval($id)]);

                if ($result){
                    if (file_exists($file_path) && is_file($file_path)){
                        $lost = unlink($file_path);
                    }
                    if($lost){
                        $pdo->rollBack();
                        return $this->goodJson(null,'ɾ���ɹ�');

                    }else{
                        $pdo->commit();
                        return $this->badJson('����ɾ���ɹ�!');
                    }
                }else{

                    return $this->badJson('����ɾ��ʧ��');
                }

            }else{

                return $this->badJson('���²�����'.$parms['id']);

            }

        }


        //��ѯ����������Ϣ
        public function allInformation(){

            if(!isset($_SESSION['myid'])){
                header('Location: /article/index.php/Login/login');
            }
            $result = $this->ArticleModel->allArticle();

            if (count($result)){

                $this->date = $result;

                return $this->show('UserList');

            }else{

                return $this->badJson('��ѯʧ�ܣ�');
            }
        }

        //����༭ҳ
        public function enterEditArticle($parms){
            if(!isset($_SESSION['myid'])){
                header('Location: /article/index.php/Login/login');
            }

            $total = $this->ArticleModel->searchArticleById($parms);

            if (count($total)){

                $_SESSION['essayid'] = $parms['id'];

                $this->date = $total;

                $content = $this->show('Edit');

                return $content;

            }else{

                return '�༭ʧ�ܣ�';

            }

        }

        //�����������ҳ��
        public function addEssay(){
            if(!isset($_SESSION['myid'])){
                header('Location: /article/index.php/Login/login');
            }

            $content = $this->show('Add');

            return $content;

        }


        //�������
        public function addArticle($parms){

            $title = trim($parms['title']);
            $type = trim($parms['type']);

            if(empty($title)){

                return $this->badJson('���±���Ϊ��');

            }



            else if(empty($type)){

                return $this->badJson('��������Ϊ��');

            }

            $author = trim($parms['author']);

            if(empty($author)){

                return $this->badJson('��������Ϊ��');

            }

            $summary = trim($parms['summary']);

            if(empty($summary)){

                return $this->badJson('���¼��Ϊ��');

            }

            $content = trim($parms['content']);

            if(empty($content)){

                return $this->badJson('��������Ϊ��');

            }

            $up = new \article\common\FileUpload();

            $up->set('path','./img');

            $uploadresult = $up->upload('cover');

            if($uploadresult){

                $fileName = $up->getFileName();

                foreach ($fileName as $key => $value){

                    $time = date('Y-m-d H:i:s');

                    $resultOfAddEssay = $this->ArticleModel->addEssay([$title,$type,$author,$value,$summary,$content,$time]);

                    if($resultOfAddEssay){

                        return $this->goodJson('',"������ӳɹ�");

                    }else{

                        return $this->badJson("�������ʧ��".$time);

                    }

                }

            }else{

                $errors = $up->getErrorMsg();
                return $this->badJson($errors);

            }

        }

        //����û�����
        public function addArticles($parms){
            $result1 = $this->essayModel->searchEssayById($parms);
            if (count($result1)){
                $title = $result1[0]['title'];
                $type = $result1[0]['type'];
                $author = $result1[0]['author'];
                $summary = $result1[0]['summary'];
                $content = $result1[0]['content'];
                $time = date('Y-m-d H:i:s');
                $result = $this->ArticleModel->addArticles([$title,$type,$author,$summary,$content,$time]);
                if ($result){
                    return $this->goodJson('','��ӳɹ�');
                }else{
                    return $this->badJson('���ʧ��');
                }

            }
        }


        /**
         *�༭����
         * @param $parms
         * @return string
         */
        public function editArticles($parms){

            $title = trim($parms['title']);

            if(empty($title)){

                return $this->badJson('���±���Ϊ��');

            }

            $type = trim($parms['type']);

            if(empty($type)){

                return $this->badJson('��������Ϊ��');

            }

            $author = trim($parms['author']);

            if(empty($author)){

                return $this->badJson('��������Ϊ��');

            }

            $summary = trim($parms['summary']);

            if(empty($summary)){

                return $this->badJson('���¼��Ϊ��');

            }

            $content = trim($parms['content']);

            if(empty($content)){

                return $this->badJson('��������Ϊ��');

            }

            $up = new \article\common\FileUpload();

            $up->set('path','./img');

            $uploadresult = $up->upload('cover');

            if($uploadresult){

                $fileName = $up->getFileName();

                foreach ($fileName as $key => $value){

                    $time = date('Y-m-d H:i:s');

                    $resultOfeditEssay = $this->ArticleModel->editEssay(
                        [$title,$type,$author,$value,$summary,$content,$time,$_SESSION['essayid']]);

                    if($resultOfeditEssay){

                        return $this->goodJson('','�����޸ĳɹ�');

                    }else{

                        return $this->badJson('�����޸�ʧ��!');

                    }
                }

            }else{

                $errors = $up->getErrorMsg();

                $errorsarr = explode('/',$errors[0]);

                if($errorsarr[1] == '4'){

                    $time = date('Y-m-d H:i:s');

                    $resultOfeditEssay = $this->ArticleModel->editEssay2(
                        [$title,$type,$author,$summary,$content,$time,$_SESSION['essayid']]);


                    if($resultOfeditEssay){

                        return $this->goodJson('','�����޸ĳɹ�');

                    }else{

                        return $this->badJson('�����޸�ʧ��');

                    }
                }

                return $this->badJson($errors);

            }

        }

    }
	
?>