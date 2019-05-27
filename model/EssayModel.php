<?php

    namespace article\model;

    class EssayModel{

        private $db;

        public function __construct(){
            $this->db = Database::getdb();
        }

        //查询用户个人资料
        public function User($parms){
            $result = $this->db->database_query("SELECT * FROM `enroll` WHERE `enroll`.`id` = ?",$parms);
            return $result;
        }

        //添加文章
        public function addEssay($parms){
            $result = $this->db->database_excute('INSERT INTO `essay` (`title`, `type`, `author`,
        `summary` , `content`,  `date`, `userId`) VALUES (?, ?, ?, ?, ?, ? ,?)',$parms);
            return $result;
        }

        //查询所以文章
        public function allEssay(){
            $result = $this->db->database_query('SELECT * FROM `essay`',[]);
            return$result;
        }

        //查询单个文章
        public function searchEssayById($parms){
            $result = $this->db->database_query('SELECT * FROM `essay` WHERE `essay`.`id` = ?',$parms);
            return $result;
        }

        //删除文章
        public function deleteEssay($parms){
            $result = $this->db->database_excute('DELETE FROM `essay` WHERE `essay`.`id` = ? ',$parms);
            return $result;
        }

    }