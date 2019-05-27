<?php

namespace article\model;

include "Database.php";

class ForgetModel{

    private $db;

    function __construct() {

        $this->db = new Database();

    }

    //��ѯ�û����ܱ�����
    public function selectQuestionByname($parms){

        $towArrRes = $this->db->database_query('SELECT question FROM `user` WHERE `user`.`name` = ?',$parms);
        return $towArrRes;

    }


    //�ж��ܱ��Ƿ���ȷ
     //@param $parms
     // @return bool
    public function find($parms){

        $towArrRes = $this->db->database_query('SELECT * FROM `user` WHERE `user`.`name` = ? and `user`.`answer` = ?',$parms);
        if (count($towArrRes) == 0)
            return false;
        return true;

    }


    //��������
     // @param $parms
     // @return bool
    public function resetPassword($parms){

        $result = $this->db->database_excute("UPDATE `user` SET `password` = ? WHERE `user`.`name` = ?",$parms);
        if (count($result) == 0)
            return false;
        return true;

    }

}