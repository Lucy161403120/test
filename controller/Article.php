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

        //判断是否显示列表页
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

                return $this->badJson('站点不存在！');

            }

        }



        //管理员查询文章
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

                    return $this->badJson('查询失败');

                }

        }

        //用户查询文章
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
                    return $this->badJson('查询失败');
                }

            }else{
                return $this->badJson('查询失败');

            }

        }

        //用户点击查询文章
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

                    return $this->badJson('查询失败');

                }
            }else{

             return $this->badJson('查询失败');
          }

        }

        //删除文章
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
                        return $this->goodJson(null,'删除成功');

                    }else{
                        $pdo->commit();
                        return $this->badJson('本地删除成功!');
                    }
                }else{

                    return $this->badJson('本地删除失败');
                }

            }else{

                return $this->badJson('文章不存在'.$parms['id']);

            }

        }


        //查询文章所有信息
        public function allInformation(){

            if(!isset($_SESSION['myid'])){
                header('Location: /article/index.php/Login/login');
            }
            $result = $this->ArticleModel->allArticle();

            if (count($result)){

                $this->date = $result;

                return $this->show('UserList');

            }else{

                return $this->badJson('查询失败！');
            }
        }

        //进入编辑页
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

                return '编辑失败！';

            }

        }

        //进入添加文章页面
        public function addEssay(){
            if(!isset($_SESSION['myid'])){
                header('Location: /article/index.php/Login/login');
            }

            $content = $this->show('Add');

            return $content;

        }


        //添加文章
        public function addArticle($parms){

            $title = trim($parms['title']);
            $type = trim($parms['type']);

            if(empty($title)){

                return $this->badJson('文章标题为空');

            }



            else if(empty($type)){

                return $this->badJson('文章类型为空');

            }

            $author = trim($parms['author']);

            if(empty($author)){

                return $this->badJson('文章作者为空');

            }

            $summary = trim($parms['summary']);

            if(empty($summary)){

                return $this->badJson('文章简介为空');

            }

            $content = trim($parms['content']);

            if(empty($content)){

                return $this->badJson('文章内容为空');

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

                        return $this->goodJson('',"文章添加成功");

                    }else{

                        return $this->badJson("文章添加失败".$time);

                    }

                }

            }else{

                $errors = $up->getErrorMsg();
                return $this->badJson($errors);

            }

        }

        //添加用户文章
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
                    return $this->goodJson('','添加成功');
                }else{
                    return $this->badJson('添加失败');
                }

            }
        }


        /**
         *编辑文章
         * @param $parms
         * @return string
         */
        public function editArticles($parms){

            $title = trim($parms['title']);

            if(empty($title)){

                return $this->badJson('文章标题为空');

            }

            $type = trim($parms['type']);

            if(empty($type)){

                return $this->badJson('文章类型为空');

            }

            $author = trim($parms['author']);

            if(empty($author)){

                return $this->badJson('文章作者为空');

            }

            $summary = trim($parms['summary']);

            if(empty($summary)){

                return $this->badJson('文章简介为空');

            }

            $content = trim($parms['content']);

            if(empty($content)){

                return $this->badJson('文章内容为空');

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

                        return $this->goodJson('','文章修改成功');

                    }else{

                        return $this->badJson('文章修改失败!');

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

                        return $this->goodJson('','文章修改成功');

                    }else{

                        return $this->badJson('文章修改失败');

                    }
                }

                return $this->badJson($errors);

            }

        }

    }
	
?>