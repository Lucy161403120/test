<?php

    namespace article\model;

    class EssayModel{

        private $db;

        public function __construct(){
            $this->db = Database::getdb();
        }

        //��ѯ�û���������
        public function User($parms){
            $result = $this->db->database_query("SELECT * FROM `enroll` WHERE `enroll`.`id` = ?",$parms);
            return $result;
        }

        //�������
        public function addEssay($parms){
            $result = $this->db->database_excute('INSERT INTO `essay` (`title`, `type`, `author`,
        `summary` , `content`,  `date`, `userId`) VALUES (?, ?, ?, ?, ?, ? ,?)',$parms);
            return $result;
        }

        //��ѯ��������
        public function allEssay(){
            $result = $this->db->database_query('SELECT * FROM `essay`',[]);
            return$result;
        }

        //��ѯ��������
        public function searchEssayById($parms){
            $result = $this->db->database_query('SELECT * FROM `essay` WHERE `essay`.`id` = ?',$parms);
            return $result;
        }

        //ɾ������
        public function deleteEssay($parms){
            $result = $this->db->database_excute('DELETE FROM `essay` WHERE `essay`.`id` = ? ',$parms);
            return $result;
        }

    }