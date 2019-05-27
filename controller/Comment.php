<?php

    namespace article\controller;

    use article\controller\Controller;

    class Comment extends Controller{

        private $commentModel = null;

        public function __construct() {

            $this->commentModel = new \article\model\CommentModel();


        }

        /**
         * ��ѯ��������
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

                return '��ѯʧ��';

            }

        }

        /**
         * �������
         * @param $parms
         * @return string
         */
        public function addComment($parms){
            if (empty($parms['id']))
                return $this->badJson('������Ч');

            if (empty($parms['visitorname']))

                return $this->badJson('�ǳƲ���Ϊ��');

            if(empty($parms['content']))

                return $this->badJson('���۲���Ϊ�գ�');

            $content = $this->removeXSS($parms['content']);

            $time = date('Y-m-d H:i:s');

            $result = $this->commentModel->addComment([$parms['id'],$parms['visitorname'],$content,$time]);

            if($result)

                return $this->goodJson('','���۳ɹ�');
            else

                return $this->badJson('����ʧ��');
        }

        //������ǽ
        public function addComments($parms){
            if (empty($parms['visitorname']))

                return $this->badJson('�ǳƲ���Ϊ��');

            if(empty($parms['content']))

                return $this->badJson('���۲���Ϊ�գ�');

            $content = $this->removeXSS($parms['content']);

            $time = date('Y-m-d H:i:s');

            $result = $this->commentModel->addComments([$parms['visitorname'],$content,$time]);

            if($result)
                return $this->goodJson('','���۳ɹ�');
            else
                return $this->badJson('����ʧ��');
        }


        /**
         * ɾ������
         * @param $parms
         * @return string
         */
        public function deleteComment($parms){

            $result = $this->commentModel->deleteComment($parms);
            if ($result){
                return '<script> window.location.replace("Javascript:window.history.go(-1)");alert("ɾ���ɹ�");</script>';
            }else{
                return '<script> alert("ɾ��ʧ��")</script>';
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
         * ��ѯ��������
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

                return '��ѯʧ��';

            }

        }

        /**
         * �������
         * @param $parms
         * @return string
         */
        public function addComment($parms){
            if (empty($parms['id']))
                return $this->badJson('������Ч');

            if (empty($parms['visitorname']))

                return $this->badJson('�ǳƲ���Ϊ��');

            if(empty($parms['content']))

                return $this->badJson('���۲���Ϊ�գ�');

            $content = $this->removeXSS($parms['content']);

            $time = date('Y-m-d H:i:s');

            $result = $this->commentModel->addComment([$parms['id'],$parms['visitorname'],$content,$time]);

            if($result)

                return $this->goodJson('','���۳ɹ�');
            else

                return $this->badJson('����ʧ��');
        }

        //������ǽ
        public function addComments($parms){
            if (empty($parms['visitorname']))

                return $this->badJson('�ǳƲ���Ϊ��');

            if(empty($parms['content']))

                return $this->badJson('���۲���Ϊ�գ�');

            $content = $this->removeXSS($parms['content']);

            $time = date('Y-m-d H:i:s');

            $result = $this->commentModel->addComments([$parms['visitorname'],$content,$time]);

            if($result)
                return $this->goodJson('','���۳ɹ�');
            else
                return $this->badJson('����ʧ��');
        }


        /**
         * ɾ������
         * @param $parms
         * @return string
         */
        public function deleteComment($parms){

            $result = $this->commentModel->deleteComment($parms);
            if ($result){
                return '<script> window.location.replace("Javascript:window.history.go(-1)");alert("ɾ���ɹ�");</script>';
            }else{
                return '<script> alert("ɾ��ʧ��")</script>';
            }

        }


    }
?>