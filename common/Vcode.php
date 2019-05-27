<?php

namespace article\common;


//��֤��    GD��չ
class Vcode{
    private $width;                            //��
    private $height;                        //��
    private $codeNum;                       //�ַ�����
    private $disturbColorNum;                 //����Ԫ�ظ���
    private $checkCode;                         //�ַ�
    private $image;                            //��Դ


    //���췽��
    function __construct($width = 100, $height = 30, $codeNum = 4){

        $this->width = $width;
        $this->height = $height;
        $this->codeNum = $codeNum;

        $number = floor($width*$height/15);

        if ($number > 240-$codeNum) {

            $this->disturbColorNum = 240-$codeNum;

        } else {

            $this->disturbColorNum = $codeNum;

        }

        $this->checkCode = $this->createCheckCode();
    }


    //���������֤�룬ͬʱ����֤�뱣����SESSION��
    function __toString(){

        $_SESSION["code"] = strtoupper(implode("",$this->checkCode));

        $this->outImg();

        return "";
    }

    //�ڲ�˽�з��������ͼ��
    public function outImg(){

        $this->getCreateImage();
        $this->setDisturbColor();
        $this->outputText();
        $this->outputImage();

    }


    //����ͼ����Դ������ʼ������
    private function getCreateImage(){

        //����һ�ŵ�ͼimagecreatetruecolor()
        $this->image = imagecreatetruecolor($this->width, $this->height);

        $backColor = imagecolorallocate($this->image, rand(225,255), rand(225,255), rand(225,255));

        //imagefill()�������
        @imagefill($this->image, 0, 0, $backColor);

        //imagecolorallocate()Ϊһ��ͼ�������ɫ
        $border = imagecolorallocate($this->image, 0, 0, 0);

        imagerectangle($this->image, 0, 0, $this->width-1, $this->height-1, $border);

    }


    //��������ַ�����ȥ���׻�����oOLlz��012
    private function createCheckCode(){

        $code="3456789abcdefghijkmnpqrstuvwxyABCDEFGHIJKMNPQRSTUVWXY";

        $ascii = [];

        for ($i=0; $i < $this->codeNum; $i++) {

            $char = $code[rand(0,strlen($code)-1)];

            $ascii[$i] = $char;

        }

        return $ascii;

    }


    //���ø���Ԫ��
    private function setDisturbColor(){

        //���ŵ�
        for ($i=0; $i <= $this->disturbColorNum; $i++) {

            $color = imagecolorallocate($this->image, rand(0,255), rand(0,255), rand(0,255));

            imagesetpixel($this->image, rand(1,$this->width-2), rand(1,$this->height-2), $color);

        }


        for($i=0; $i < 5; $i++){

            $color = imagecolorallocate($this->image,rand(0,255),rand(0,255),rand(0,255));

            imagearc($this->image,rand(-10,$this->width),rand(-10,$this->height),rand(30,300),

                rand(20,200),55,44,$color);

        }
    }


    //�����ɫ������ڷţ�����ַ�����ͼ�������
    private function outputText(){

        for ($i = 0; $i < $this->codeNum; $i++){

            $fontcolor = imagecolorallocate($this->image, rand(0,128), rand(0,128), rand(0,128));

            $fontSize = 10;

            $x = floor($this->width/$this->codeNum)*$i+3;

            $y = rand(0,$this->height - imagefontheight($fontSize));

            imagechar($this->image, $fontSize, $x, $y,$this->checkCode[$i], $fontcolor);

        }
    }


    //��֤����ͼƬ��ʽ���
    private function outputImage(){

        if(imagetypes() & IMG_GIF){

            header("Content-type:image/gif");

            imagegif($this->image);

        }elseif(imagetypes() & IMG_JPG){

            header("Content-type:image/jpeg");

            imagejpeg($this->image, "", 0.5);

        }elseif(imagetypes() & IMG_PNG){

            header("Content-type:image/png");

            imagepng($this->image);

        }elseif(imagetypes() & IMG_WBMP){

            header("Content-type:image/vnd.wap.wbmp");

            imagewbmp($this->image);

        }else{

            die("PHP��֧��ͼ�񴴽�");

        }

    }


    //��������
    function __destruct(){

        imagedestroy($this->image);

    }

}
?>
