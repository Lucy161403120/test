<?php

    namespace article\model;

    include "Database.php";

    class HomeModel{

        private $db;

        public function __construct(){
            $this->db = Database::getdb();
        }

        //����name�ж��û��Ƿ��¼�ɹ�
        public function search($parms){

            $towArrRes = $this->db->database_query('SELECT * FROM `enroll` WHERE `enroll`.`name` = ?  and `enroll`.`password` = ?',$parms);
            if (count($towArrRes) == 0)
                return false;
            return true;
        }

        //�����û����ֲ�ѯid
        public function searchId($parms){
            $result = $this->db->database_query('SELECT `id` FROM `enroll` WHERE `name` = ?',$parms);
            $result = $result[0];
            return $result;
        }

    }