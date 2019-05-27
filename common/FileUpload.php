<?php

namespace article\common;


class FileUpload
{

    private $path = "./img";        //上传文件保存的路径
    private $allowtype = array('jpg','gif','png','jpeg','bmp');          //设置限制上传文件的类型
    private $maxsize = 2000000;                             //限制文件上传的大小
    private $israndname = true;                             //设置是否随机重命名文件

    private $originName;                                    //原文件名
    private $tmpFileName;                                   //临时文件名
    private $fileType;                                      //文件类型（后缀）
    private $fileSize;                                      //文件大小
    private $newFileName;                                   //新文件名
    private $errorNum = 0;                                  //错误号
    private $errorMess = "";                                //错误报告消息

    /**
     * 设置成员属性
     * @param $sky
     * @param $value
     * @return $this
     */
    function set($sky,$value){

        $this->setOption($sky,$value);

        return $this;

    }

    /**
     * 上传文件
     * @param $fileFiled
     * @return bool
     */
    function upload($fileFiled){

        $return = true;

        //检查文件路径是否合法
        if(!$this->checkFilePath()){

            $this->errorMess = $this->getError();

        }

        //将文件信息去出付给变量
        $name     = $_FILES[$fileFiled]['name'];
        $tmp_name = $_FILES[$fileFiled]['tmp_name'];
        $size     = $_FILES[$fileFiled]['size'];
        $error    = $_FILES[$fileFiled]['error'];

        //如果有多个文件上传则会是一个数组
        if(is_array($name)){

            $errors = array();
            //多个文件上传则循环处理。这个循环只有检查上传文件的功能，并未有真正上传
            for($i = 0; $i < count($name); $i++) {
                //设置文件信息
                if ($this->setFiles($name[$i], $tmp_name[$i], $size[$i], $error[$i])) {

                    if ($this->checkFileSize() && $this->checkFileType() && $this->isImage()) {

                    }else{

                        $errors[] = $this->getError();
                        $return   = false;

                    }

                } else {

                    $errors[] = $this->getError();
                    $return   = false;

                }
                //如果有问题，则初始化属性
                if (!$return) {

                    $this->setFiles();

                }

            }

            if($return){
                //存放所以上传后的文件名的数组
                $fileNames = array();
                //如果上传的文件都是合法的，则通过循环向服务器上传文件
                for($i = 0; $i < count($name); $i++){

                    if($this->setFiles($name[$i],$tmp_name[$i],$size[$i],$error[$i])){

                        $this->setNewFileName();

                        if(!$this->copyFile()){

                            $errors[] = $this->getError();

                            $return   = false;

                        }

                        $fileNames[] = $this->newFileName;

                    }

                }

                $this->newFileName = $fileNames;

            }

            $this->errorMess = $errors;
            return $return;
            //上传单个文件的处理方法
        }else{

            if($this->setFiles($name,$tmp_name,$size,$error)){

                if($this->checkFileSize() && $this->checkFileType() && $this->isImage()){

                    $this->setNewFileName();
                    //上传文件，返回0为成功
                    if($this->copyFile()){

                        return true;

                    }else{

                        $return = false;

                    }

                }else{

                    $return = false;

                }

            }else{

                $return = false;

            }
            //如果$return为false.则出错，将错误信息保存在erroMess里
            if (!$return){

                $this->errorMess = $this->getError();

            }

            return $return;

        }

    }
    //获取上传后文件的名称
    public function getFileName(){

        return $this->newFileName;

    }

    public function getFilePath(){

        $path = rtrim($this->path,'/').'/';
        $newFilePath = $this->newFileName;

        foreach ($newFilePath as $key => $value){

            $newFilePath[$key] = $path.$value;

        }

        return $newFilePath;

    }
    //上传失败后，用此方法得到错误信息
    public function getErrorMsg(){

        return $this->errorMess;

    }
    //设置出错信息
    private function getError(){

        $str = "上传文件{$this->originName}时出错：";

        switch ($this->errorNum){

            case  4: $str .= "没有文件被上传/4"; break;
            case  3: $str .= "文件只有部分被上传/3"; break;
            case  2: $str .= "上传文件的大小超过了HTML表单MAX_FILE_SIZE选项指定的值/2"; break;
            case  1: $str .= "上传的文件超过了php.ini中upload_max_filesize选项限制的值/1"; break;
            case -1: $str .= "未允许类型/-1"; break;
            case -2: $str .= "文件过大，上传的文件不能超过{$this->maxsize}个字节/-2"; break;
            case -3: $str .= "上传失败/-3"; break;
            case -4: $str .= "建立存放上传文件的目录失败，请重新指定上传目录/-4"; break;
            case -5: $str .= "必须指定上传文件的路径/-5"; break;
            default: $str .= "未知错误/0";

        }

        return $str;

    }
    //设置和$_FILES有关的内容
    private function setFiles($name = '',$tmp_name = '',$size = 0,$error = 0){

        $this->setOption('errorNum',$error);

        if($error)
            return false;

        $this->setOption('originName',$name);
        $this->setOption('tmpFileName',$tmp_name);

        $aryStr = explode('.',$name);

        $this->setOption('fileType',strtolower($aryStr[count($aryStr)-1]));
        $this->setOption('fileSize',$size);

        return true;
    }
    //为单个成员属性设置值
    private function setOption($key,$value){

        $this->$key = $value;

    }
    //设置上传后文件的名称
    private function setNewFileName(){

        if($this->israndname){

            $this->setOption('newFileName',$this->proRandName());

        }else{

            $this->setOption('newFileName',$this->originName);

        }

    }
    //检查上传文件是否是合法的类型
    private function checkFileType(){

        if(in_array(strtolower($this->fileType),$this->allowtype)){

            return true;

        }else{

            $this->setOption('errorNum',-1);
            return false;

        }

    }

    //检查是否是图片格式
    private function isImage(){

        $alltype = '.gif|.jpeg|.png|.bmp|.jpg';//定义检查的图片类型

        $result= getimagesize($this->tmpFileName);
        $ext = image_type_to_extension($result['2']);

        if(stripos($alltype,$ext)){
            return true;
        }else{

            $this->setOption('errorNum',-1);
            return false;

        }
    }

    //检查文件大小是否是允许的大小
    private function checkFileSize(){

        if($this->fileSize > $this->maxsize){

            $this->setOption('errorNum',-2);
            return false;

        }else{

            return true;

        }

    }
    //检查是否有存放上传文件的目录
    private function checkFilePath(){

        if(empty($this->path)){

            $this->setOption('errorNum',-5);
            return false;

        }

        if(!file_exists($this->path) || !is_writable($this->path)){

            if(!@mkdir($this->path,0755)){

                $this->setOption('errorNum',-4);
                return false;

            }

        }

        return true;

    }
    //设置随机文件名
    private function proRandName(){

        $FileName = date('YmdHis')."_".rand(100,999);
        return $FileName.'.'.$this->fileType;

    }
    //复制文件到指定的位置
    private function copyFile(){

        if(!$this->errorNum){

            $path = rtrim($this->path,'/').'/';
            $path .= $this->newFileName;

            if(move_uploaded_file($this->tmpFileName,$path)){

                return true;

            }else{

                $this->setOption('errorNum',-3);
                return false;

            }

        }else{

            return false;

        }

    }

}
?>
