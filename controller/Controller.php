<?php

    namespace article\controller;

    //它的作用是给一个外部引用起别名  这是命名空间的一个重要特性
    use \article\Config;


    class Controller{

        public $date = [];

        public $data = [];

        public function setDate($key,$value){
            $this->date[$key] = $value;
            return $this;
        }


        //显示相应的页面

        public function show($viewName){

            //获取视图路径
            $showPath = $_SERVER['DOCUMENT_ROOT'].'/article/view/'.$viewName.'.php';

            //检测文件是否存在
            if (file_exists($showPath) && is_file($showPath)){

                //extract() 函数从数组中将变量导入到当前的符号表
                extract($this->date);

                ob_start();

                include $showPath;

                $content = ob_get_contents();

                ob_end_clean();

                $configArr = \article\config\Config::getInstance();

                foreach ($configArr as $key => $value){

                    //将 $content 中的 $key 换成 $value
                    $content = str_replace($key, $value, $content);

                }

                return $content;

            }else{

                echo 'showPath is error! ';

            }

        }


        //返回json格式的数据  在异步应用程序中将字符串从 Web 客户机传递给服务器端程序
        public function goodJson($content,$msg = null){

            return json_encode([

                'code'=>1,//返回成功或失败
                'msg'=>$msg,//返回的信息，
                'data'=>$content,//返回的模块页面

            ]);

        }

        public function badJson($msg){

            return json_encode([

                'code'=>0,
                'msg'=>$msg,
                'data'=>[

                ]

            ]);

        }


//过滤XSS攻击

        public function removeXSS($val) {
            // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
            // this prevents some character re-spacing such as <java\0script>
            // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
            $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);

            // straight replacements, the user should never need these since they're normal characters
            // this prevents like <IMG SRC=@avascript:alert('XSS')>
            $search = 'abcdefghijklmnopqrstuvwxyz';
            $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $search .= '1234567890!@#$%^&*()';
            $search .= '~`";:?+/={}[]-_|\'\\';
            for ($i = 0; $i < strlen($search); $i++) {
                // ;? matches the ;, which is optional
                // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars

                // @ @ search for the hex values
                $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
                // @ @ 0{0,7} matches '0' zero to seven times
                $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
            }

            // now the only remaining whitespace attacks are \t, \n, and \r
            $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style',
                'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title',
                'base');
            $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy',
                'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint',
                'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick',
                'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged',
                'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter',
                'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange',
                'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup',
                'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave',
                'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend',
                'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize',
                'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted',
                'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit',
                'onunload');
            $ra = array_merge($ra1, $ra2);

            $found = true; // keep replacing as long as the previous round replaced something
            while ($found == true) {
                $val_before = $val;
                for ($i = 0; $i < sizeof($ra); $i++) {
                    $pattern = '/';
                    for ($j = 0; $j < strlen($ra[$i]); $j++) {
                        if ($j > 0) {
                            $pattern .= '(';
                            $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                            $pattern .= '|';
                            $pattern .= '|(&#0{0,8}([9|10|13]);)';
                            $pattern .= ')*';
                        }
                        $pattern .= $ra[$i][$j];
                    }
                    $pattern .= '/i';
                    $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
                    $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
                    if ($val_before == $val) {
                        // no replacements were made, so exit the loop
                        $found = false;
                    }
                }
            }

            return $val;
        }
}
?>