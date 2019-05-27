<?php

namespace article\common;


//验证码    GD扩展
class Vcode{
    private $width;                            //宽
    private $height;                        //高
    private $codeNum;                       //字符个数
    private $disturbColorNum;                 //干扰元素个数
    private $checkCode;                         //字符
    private $image;                            //资源


    //构造方法
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


    //用于输出验证码，同时将验证码保存在SESSION中
    function __toString(){

        $_SESSION["code"] = strtoupper(implode("",$this->checkCode));

        $this->outImg();

        return "";
    }

    //内部私有方法，输出图像
    public function outImg(){

        $this->getCreateImage();
        $this->setDisturbColor();
        $this->outputText();
        $this->outputImage();

    }


    //创建图像资源，并初始化背景
    private function getCreateImage(){

        //创建一张底图imagecreatetruecolor()
        $this->image = imagecreatetruecolor($this->width, $this->height);

        $backColor = imagecolorallocate($this->image, rand(225,255), rand(225,255), rand(225,255));

        //imagefill()区域填充
        @imagefill($this->image, 0, 0, $backColor);

        //imagecolorallocate()为一幅图像分配颜色
        $border = imagecolorallocate($this->image, 0, 0, 0);

        imagerectangle($this->image, 0, 0, $this->width-1, $this->height-1, $border);

    }


    //随机生成字符串，去除易混淆的oOLlz和012
    private function createCheckCode(){

        $code="3456789abcdefghijkmnpqrstuvwxyABCDEFGHIJKMNPQRSTUVWXY";

        $ascii = [];

        for ($i=0; $i < $this->codeNum; $i++) {

            $char = $code[rand(0,strlen($code)-1)];

            $ascii[$i] = $char;

        }

        return $ascii;

    }


    //设置干扰元素
    private function setDisturbColor(){

        //干扰点
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


    //随机颜色，随机摆放，随机字符串向图像中输出
    private function outputText(){

        for ($i = 0; $i < $this->codeNum; $i++){

            $fontcolor = imagecolorallocate($this->image, rand(0,128), rand(0,128), rand(0,128));

            $fontSize = 10;

            $x = floor($this->width/$this->codeNum)*$i+3;

            $y = rand(0,$this->height - imagefontheight($fontSize));

            imagechar($this->image, $fontSize, $x, $y,$this->checkCode[$i], $fontcolor);

        }
    }


    //验证码以图片格式输出
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

            die("PHP不支持图像创建");

        }

    }


    //析构方法
    function __destruct(){

        imagedestroy($this->image);

    }

}
?>
