<?php

    namespace article\model;

    class RegisterModel{

        private $db;

        public function __construct(){
            $this->db = Database::getdb();
        }

        //�ж��Ƿ���ڸ��û�
        public function isUser($parms){

            $towArrRes = $this->db->database_query('SELECT name FROM `enroll` WHERE `enroll`.`name` = ?',$parms);

            if (count($towArrRes)){
                return true;
            }else
                return false;

        }

        //����û�
        public function addUser($parms){

            $towArrRes = $this->db->database_excute('INSERT INTO `enroll` (`name`, `password`) VALUES ( ?, ?)',$parms);

            if (count($towArrRes)){
                return true;
            }else
                return false;
        }

        //ɾ���û�
        public function deleteRegister($parms){
            $result = $this->db->database_excute('DELETE FROM `enroll` WHERE `enroll`.`id` = ? ',$parms);
            return $result;
        }

        //��ѯ�����û���Ϣ
        public function allUser(){
            $result = $this->db->database_query('SELECT * FROM `enroll`',[]);
            return $result;
        }

    }

UserModel.php�ļ�
<?php

    namespace article\model;

    include "Database.php";

    class UserModel{

        private $db;

        public function __construct(){
            $this->db = Database::getdb();
        }


        //�������ֲ��û�����
        public function searchUserDataByName($parms){
            $qul = $this->db->database_query('SELECT * FROM `user` WHERE `user`.`name` = ?',$parms);
            return $qul;
        }


        //����name�ж��û��Ƿ��¼�ɹ�
        // @param $parms
        // @return bool
        public function find($parms){
            $towArrRes = $this->db->database_query('SELECT * FROM `user` WHERE `user`.`name` = ? and `user`.`password` = ?',$parms);
            if (count($towArrRes) == 0)
                return false;
            return true;
        }


        //��ѯ�û�����
        public function searchUserData(){

            $towArrRes = $this->db->database_query('SELECT * FROM `user`',[]);
            return $towArrRes;

        }

        //����id��ѯ�û�����
        public function searchUserDataById($parms){

            $towArrRes = $this->db->database_query('SELECT * FROM `user` WHERE `user`.`id` = ?',$parms);
            return $towArrRes;

        }

        //����id�����û�����
        public function setUserData($parms){

            $result = $this->db->database_excute("UPDATE `user` SET `name` = ?, `sex` = ?, 
        `birthday` = ?, WHERE `user`.`id` = ".$_SESSION['myid'],$parms);

            return $result;

        }

    }