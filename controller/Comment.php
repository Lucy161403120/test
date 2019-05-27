<?php

    namespace article\controller;

    use article\controller\Controller;

    class Comment extends Controller{

        private $commentModel = null;

        public function __construct() {

            $this->commentModel = new \article\model\CommentModel();


        }

        /**
         * 查询所有评论
         * @param $parms
        * @return string
         */
        public function selectComment(){
            if(!isset($_SESSION['id'])){
                header('Location: /article/index/HomeLogin/login');
            }

            $result = $this->commentModel->selectAllComment();

            if (count($result)){

                $this->date = $result;

                $content = $this->show('conversation');

                return $content;

            }else{

                return '查询失败';

            }

        }

        /**
         * 添加评论
         * @param $parms
         * @return string
         */
        public function addComment($parms){
            if (empty($parms['id']))
                return $this->badJson('参数无效');

            if (empty($parms['visitorname']))

                return $this->badJson('昵称不能为空');

            if(empty($parms['content']))

                return $this->badJson('评论不能为空！');

            $content = $this->removeXSS($parms['content']);

            $time = date('Y-m-d H:i:s');

            $result = $this->commentModel->addComment([$parms['id'],$parms['visitorname'],$content,$time]);

            if($result)

                return $this->goodJson('','评论成功');
            else

                return $this->badJson('评论失败');
        }

        //评论上墙
        public function addComments($parms){
            if (empty($parms['visitorname']))

                return $this->badJson('昵称不能为空');

            if(empty($parms['content']))

                return $this->badJson('评论不能为空！');

            $content = $this->removeXSS($parms['content']);

            $time = date('Y-m-d H:i:s');

            $result = $this->commentModel->addComments([$parms['visitorname'],$content,$time]);

            if($result)
                return $this->goodJson('','评论成功');
            else
                return $this->badJson('评论失败');
        }


        /**
         * 删除评论
         * @param $parms
         * @return string
         */
        public function deleteComment($parms){

            $result = $this->commentModel->deleteComment($parms);
            if ($result){
                return '<script> window.location.replace("Javascript:window.history.go(-1)");alert("删除成功");</script>';
            }else{
                return '<script> alert("删除失败")</script>';
            }

        }


    }
<?php

    namespace article\controller;

    use article\controller\Controller;

    class Comment extends Controller{

        private $commentModel = null;

        public function __construct() {

            $this->commentModel = new \article\model\CommentModel();


        }

        /**
         * 查询所有评论
         * @param $parms
        * @return string
         */
        public function selectComment(){
            if(!isset($_SESSION['id'])){
                header('Location: /article/index/HomeLogin/login');
            }

            $result = $this->commentModel->selectAllComment();

            if (count($result)){

                $this->date = $result;

                $content = $this->show('conversation');

                return $content;

            }else{

                return '查询失败';

            }

        }

        /**
         * 添加评论
         * @param $parms
         * @return string
         */
        public function addComment($parms){
            if (empty($parms['id']))
                return $this->badJson('参数无效');

            if (empty($parms['visitorname']))

                return $this->badJson('昵称不能为空');

            if(empty($parms['content']))

                return $this->badJson('评论不能为空！');

            $content = $this->removeXSS($parms['content']);

            $time = date('Y-m-d H:i:s');

            $result = $this->commentModel->addComment([$parms['id'],$parms['visitorname'],$content,$time]);

            if($result)

                return $this->goodJson('','评论成功');
            else

                return $this->badJson('评论失败');
        }

        //评论上墙
        public function addComments($parms){
            if (empty($parms['visitorname']))

                return $this->badJson('昵称不能为空');

            if(empty($parms['content']))

                return $this->badJson('评论不能为空！');

            $content = $this->removeXSS($parms['content']);

            $time = date('Y-m-d H:i:s');

            $result = $this->commentModel->addComments([$parms['visitorname'],$content,$time]);

            if($result)
                return $this->goodJson('','评论成功');
            else
                return $this->badJson('评论失败');
        }


        /**
         * 删除评论
         * @param $parms
         * @return string
         */
        public function deleteComment($parms){

            $result = $this->commentModel->deleteComment($parms);
            if ($result){
                return '<script> window.location.replace("Javascript:window.history.go(-1)");alert("删除成功");</script>';
            }else{
                return '<script> alert("删除失败")</script>';
            }

        }


    }
?>