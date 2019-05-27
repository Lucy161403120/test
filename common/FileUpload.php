<?php

namespace article\common;


class FileUpload
{

    private $path = "./img";        //�ϴ��ļ������·��
    private $allowtype = array('jpg','gif','png','jpeg','bmp');          //���������ϴ��ļ�������
    private $maxsize = 2000000;                             //�����ļ��ϴ��Ĵ�С
    private $israndname = true;                             //�����Ƿ�����������ļ�

    private $originName;                                    //ԭ�ļ���
    private $tmpFileName;                                   //��ʱ�ļ���
    private $fileType;                                      //�ļ����ͣ���׺��
    private $fileSize;                                      //�ļ���С
    private $newFileName;                                   //���ļ���
    private $errorNum = 0;                                  //�����
    private $errorMess = "";                                //���󱨸���Ϣ

    /**
     * ���ó�Ա����
     * @param $sky
     * @param $value
     * @return $this
     */
    function set($sky,$value){

        $this->setOption($sky,$value);

        return $this;

    }

    /**
     * �ϴ��ļ�
     * @param $fileFiled
     * @return bool
     */
    function upload($fileFiled){

        $return = true;

        //����ļ�·���Ƿ�Ϸ�
        if(!$this->checkFilePath()){

            $this->errorMess = $this->getError();

        }

        //���ļ���Ϣȥ����������
        $name     = $_FILES[$fileFiled]['name'];
        $tmp_name = $_FILES[$fileFiled]['tmp_name'];
        $size     = $_FILES[$fileFiled]['size'];
        $error    = $_FILES[$fileFiled]['error'];

        //����ж���ļ��ϴ������һ������
        if(is_array($name)){

            $errors = array();
            //����ļ��ϴ���ѭ���������ѭ��ֻ�м���ϴ��ļ��Ĺ��ܣ���δ�������ϴ�
            for($i = 0; $i < count($name); $i++) {
                //�����ļ���Ϣ
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
                //��������⣬���ʼ������
                if (!$return) {

                    $this->setFiles();

                }

            }

            if($return){
                //��������ϴ�����ļ���������
                $fileNames = array();
                //����ϴ����ļ����ǺϷ��ģ���ͨ��ѭ����������ϴ��ļ�
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
            //�ϴ������ļ��Ĵ�����
        }else{

            if($this->setFiles($name,$tmp_name,$size,$error)){

                if($this->checkFileSize() && $this->checkFileType() && $this->isImage()){

                    $this->setNewFileName();
                    //�ϴ��ļ�������0Ϊ�ɹ�
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
            //���$returnΪfalse.�������������Ϣ������erroMess��
            if (!$return){

                $this->errorMess = $this->getError();

            }

            return $return;

        }

    }
    //��ȡ�ϴ����ļ�������
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
    //�ϴ�ʧ�ܺ��ô˷����õ�������Ϣ
    public function getErrorMsg(){

        return $this->errorMess;

    }
    //���ó�����Ϣ
    private function getError(){

        $str = "�ϴ��ļ�{$this->originName}ʱ����";

        switch ($this->errorNum){

            case  4: $str .= "û���ļ����ϴ�/4"; break;
            case  3: $str .= "�ļ�ֻ�в��ֱ��ϴ�/3"; break;
            case  2: $str .= "�ϴ��ļ��Ĵ�С������HTML��MAX_FILE_SIZEѡ��ָ����ֵ/2"; break;
            case  1: $str .= "�ϴ����ļ�������php.ini��upload_max_filesizeѡ�����Ƶ�ֵ/1"; break;
            case -1: $str .= "δ��������/-1"; break;
            case -2: $str .= "�ļ������ϴ����ļ����ܳ���{$this->maxsize}���ֽ�/-2"; break;
            case -3: $str .= "�ϴ�ʧ��/-3"; break;
            case -4: $str .= "��������ϴ��ļ���Ŀ¼ʧ�ܣ�������ָ���ϴ�Ŀ¼/-4"; break;
            case -5: $str .= "����ָ���ϴ��ļ���·��/-5"; break;
            default: $str .= "δ֪����/0";

        }

        return $str;

    }
    //���ú�$_FILES�йص�����
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
    //Ϊ������Ա��������ֵ
    private function setOption($key,$value){

        $this->$key = $value;

    }
    //�����ϴ����ļ�������
    private function setNewFileName(){

        if($this->israndname){

            $this->setOption('newFileName',$this->proRandName());

        }else{

            $this->setOption('newFileName',$this->originName);

        }

    }
    //����ϴ��ļ��Ƿ��ǺϷ�������
    private function checkFileType(){

        if(in_array(strtolower($this->fileType),$this->allowtype)){

            return true;

        }else{

            $this->setOption('errorNum',-1);
            return false;

        }

    }

    //����Ƿ���ͼƬ��ʽ
    private function isImage(){

        $alltype = '.gif|.jpeg|.png|.bmp|.jpg';//�������ͼƬ����

        $result= getimagesize($this->tmpFileName);
        $ext = image_type_to_extension($result['2']);

        if(stripos($alltype,$ext)){
            return true;
        }else{

            $this->setOption('errorNum',-1);
            return false;

        }
    }

    //����ļ���С�Ƿ�������Ĵ�С
    private function checkFileSize(){

        if($this->fileSize > $this->maxsize){

            $this->setOption('errorNum',-2);
            return false;

        }else{

            return true;

        }

    }
    //����Ƿ��д���ϴ��ļ���Ŀ¼
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
    //��������ļ���
    private function proRandName(){

        $FileName = date('YmdHis')."_".rand(100,999);
        return $FileName.'.'.$this->fileType;

    }
    //�����ļ���ָ����λ��
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
