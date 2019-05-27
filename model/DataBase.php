<?php

    namespace article\model;


    class Database{

        //连接数据库

        private $pdo;

        static public $db = null;

        //构造函数
        public function __construct(){
            $this->geterr();
        }

        //初始化$pdo
        public function getPdo(){
            return $this->pdo;
        }

        //初始化$db  静态变量采用self::赋值
        static public function getdb(){
            if (self::$db == null){
                self::$db =new Database();
            }
            return self::$db;
        }


        //连接数据库  输出错误信息
        public function geterr(){

            try{

               $this->pdo = new \PDO('mysql:dbname=article;host=localhost','root','');

            }catch (PDOException $e){

                echo '数据库连接失败' . $e->getMessage();

            }

            //防止乱码
            $this->pdo->query('set names utf8');

        }


        //数据库查询方法  预处理
        public function database_query($sql,$valueArray){

            $qul   = $this->pdo->prepare($sql);
            $index = 1;
            foreach ($valueArray as $value){
                $qul -> bindValue($index, $value);
                $index++;
            }
            $qul -> execute();

            //fetchAll — 返回一个包含结果集中所有行的数组

            $arr = $qul-> fetchAll(\PDO::FETCH_ASSOC);

            return $arr;

        }



        //数据库操作
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