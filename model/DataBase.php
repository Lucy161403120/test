<?php

    namespace article\model;


    class Database{

        //�������ݿ�

        private $pdo;

        static public $db = null;

        //���캯��
        public function __construct(){
            $this->geterr();
        }

        //��ʼ��$pdo
        public function getPdo(){
            return $this->pdo;
        }

        //��ʼ��$db  ��̬��������self::��ֵ
        static public function getdb(){
            if (self::$db == null){
                self::$db =new Database();
            }
            return self::$db;
        }


        //�������ݿ�  ���������Ϣ
        public function geterr(){

            try{

               $this->pdo = new \PDO('mysql:dbname=article;host=localhost','root','');

            }catch (PDOException $e){

                echo '���ݿ�����ʧ��' . $e->getMessage();

            }

            //��ֹ����
            $this->pdo->query('set names utf8');

        }


        //���ݿ��ѯ����  Ԥ����
        public function database_query($sql,$valueArray){

            $qul   = $this->pdo->prepare($sql);
            $index = 1;
            foreach ($valueArray as $value){
                $qul -> bindValue($index, $value);
                $index++;
            }
            $qul -> execute();

            //fetchAll �� ����һ������������������е�����

            $arr = $qul-> fetchAll(\PDO::FETCH_ASSOC);

            return $arr;

        }



        //���ݿ����
        public function database_excute($sql, $valueArray){

            $qul = $this->pdo->prepare($sql);

            $index = 1;

            foreach ($valueArray as $value){

                $qul -> bindValue($index,$value);

                $index++;

            }

            $end = $qul -> execute();

            return $end;

        }

    }