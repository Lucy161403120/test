<?php

    namespace article\model;

    include "Database.php";

    class HomeModel{

        private $db;

        public function __construct(){
            $this->db = Database::getdb();
        }

        //根据name判断用户是否登录成功
        public function search($parms){

            $towArrRes = $this->db->database_query('SELECT * FROM `enroll` WHERE `enroll`.`name` = ?  and `enroll`.`password` = ?',$parms);
            if (count($towArrRes) == 0)
                return false;
            return true;
        }

        //根据用户名字查询id
        public function searchId($parms){
            $result = $this->db->database_query('SELECT `id` FROM `enroll` WHERE `name` = ?',$parms);
            $result = $result[0];
            return $result;
        }

    }