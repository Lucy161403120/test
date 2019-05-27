<?php

    namespace article\model;

    class RegisterModel{

        private $db;

        public function __construct(){
            $this->db = Database::getdb();
        }

        //判断是否存在该用户
        public function isUser($parms){

            $towArrRes = $this->db->database_query('SELECT name FROM `enroll` WHERE `enroll`.`name` = ?',$parms);

            if (count($towArrRes)){
                return true;
            }else
                return false;

        }

        //添加用户
        public function addUser($parms){

            $towArrRes = $this->db->database_excute('INSERT INTO `enroll` (`name`, `password`) VALUES ( ?, ?)',$parms);

            if (count($towArrRes)){
                return true;
            }else
                return false;
        }

        //删除用户
        public function deleteRegister($parms){
            $result = $this->db->database_excute('DELETE FROM `enroll` WHERE `enroll`.`id` = ? ',$parms);
            return $result;
        }

        //查询所有用户信息
        public function allUser(){
            $result = $this->db->database_query('SELECT * FROM `enroll`',[]);
            return $result;
        }

    }

UserModel.php文件
<?php

    namespace article\model;

    include "Database.php";

    class UserModel{

        private $db;

        public function __construct(){
            $this->db = Database::getdb();
        }


        //根据名字查用户资料
        public function searchUserDataByName($parms){
            $qul = $this->db->database_query('SELECT * FROM `user` WHERE `user`.`name` = ?',$parms);
            return $qul;
        }


        //根据name判断用户是否登录成功
        // @param $parms
        // @return bool
        public function find($parms){
            $towArrRes = $this->db->database_query('SELECT * FROM `user` WHERE `user`.`name` = ? and `user`.`password` = ?',$parms);
            if (count($towArrRes) == 0)
                return false;
            return true;
        }


        //查询用户资料
        public function searchUserData(){

            $towArrRes = $this->db->database_query('SELECT * FROM `user`',[]);
            return $towArrRes;

        }

        //根据id查询用户资料
        public function searchUserDataById($parms){

            $towArrRes = $this->db->database_query('SELECT * FROM `user` WHERE `user`.`id` = ?',$parms);
            return $towArrRes;

        }

        //根据id设置用户资料
        public function setUserData($parms){

            $result = $this->db->database_excute("UPDATE `user` SET `name` = ?, `sex` = ?, 
        `birthday` = ?, WHERE `user`.`id` = ".$_SESSION['myid'],$parms);

            return $result;

        }

    }