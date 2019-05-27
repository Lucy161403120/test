<?php
    ini_set('display_errors','on');            //������Ϣ

    define('ROOT',__DIR__);
    defined('CACHE_PATH') or define('CACHE_PATH',__DIR__.'/cache');


    session_start();
    spl_autoload_register('autoLoad');


    //�Զ�����
    function autoLoad($className){
        $className = str_replace('\\','/',$className);
        $fileName = $_SERVER['DOCUMENT_ROOT'].'/'.$className.'.php';
        include $fileName;
    }


    $requestScript = $_SERVER['SCRIPT_NAME'];
    if($requestScript != '/article/index.php'){
        exit();
    }


    // ��ȡ����url
    $requsetURL = $_SERVER['PATH_INFO'];
    $requsetURL = trim($requsetURL,'/');
    $requsetArr = explode('/',$requsetURL);


    if(  count($requsetArr) % 2 != 0){
        echo  '404 not found';
        exit();
    }


    //��ȡ������ �� ����
    $class_ = $requsetArr[0];
    $method = $requsetArr[1];
    //Ĭ��
    //·�ɽ���
    $params = [];
    if(count($requsetArr) > 2){
        $index = 2;
        while(true){
            $key = $requsetArr[$index++];
            $value = $requsetArr[$index++];

            $params[$key] = $value;
            if($index >= count($requsetArr)){
                break;
            }
        }
    }
    $class_ =  'article\\controller\\'.$class_;
    $obj = new $class_;


    if(!empty($_REQUEST)) {
        $params = array_merge($params,$_REQUEST);
    }
//    \article\controller\Request::setRequest($parms);
    echo $obj->$method($params);

config.js�ļ�

<?php
return [
    '__ROOT__'=>'/article',
    '__COVERROOT_'=>'/article/img/'
];