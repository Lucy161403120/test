<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, 
initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List</title>
    <link rel="stylesheet" href="__ROOT__/css/public.css">
    <link rel="stylesheet" href="__ROOT__/css/List.css">
    <script src="__ROOT__/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/js/List.js"></script>
    <script src="__ROOT__/js/jquery.imgbox.pack.js"></script>
</head>
<body>

    <header>
        <img src="__ROOT__/img/logo.jpg" alt="ͼƬ�޷�����">
        <form action="__ROOT__/index/Article/SearchUserArticle" method="post">
            <input type="text" placeholder=������ؼ��� class="sub" name="value">
            <button class="submit">����</button>
        </form>
    </header>

    <div class="name">
        <ul>
            <li><a href="#">��ҳ</a></li>
            <li><a href="__ROOT__/index/Comment/selectComment" target="_blank">������</a></li>
            <li><a href="__ROOT__/index/Essay/enterSpace" target="_blank">���˿ռ�</a></li>
            <li><a href="/article/index.php/HomeLogin/loginOut">�˳�</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="content">
        <div class="picture">
            <p>beautiful</p>
        </div>
        <div class="text">
            <h3>hello</h3>
            <p>
                <?php foreach ($this->date as $key => $value){
                    if ($key < 4){
                        echo '<a href="/article/index/Article/SearchIdArticle?
id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';
                    }
                }
                    ?>
            </p>
            <h3>i love you</h3>
            <p>
                <?php foreach ($this->date as $key => $value){
                    if ($key >= 4 && $key<=8){
                        echo '<a href="/article/index/Article/SearchIdArticle?
id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';
                    }
                }
                ?> </p>
        </div>

        <div class="author">
            <h3>biu</h3>
            <p>
            <?php
            foreach($this->data as $key => $value){
                if ($key <=8){
                    echo $value['author'].'<br>';
                }
            }
            ?>
            </p>
        </div>
        <div class="clear"></div>
        <div class="photo">
            <ul>
                <li>
                    <img src="__ROOT__/img/1.jpg" alt="ͼƬ�޷�����">
                    <p><?php foreach ($this->date as $key => $value){
                        if ($key<1){
                            echo '<a href="/article/index/Article/SearchIdArticle?
id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';
                        }
                    }?></p>
                </li>
                <li>
                    <img src="__ROOT__/img/2.jpg" alt="ͼƬ�޷�����">
                    <p><?php foreach ($this->date as $key => $value){
                            if ($key<2 && $key>0){
                                echo '<a href="/article/index/Article/SearchIdArticle?
id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';
                            }
                        }?></p>
                </li>
                <li>
                    <img src="__ROOT__/img/3.jpg" alt="ͼƬ�޷�����">
                    <p><?php foreach ($this->date as $key => $value){
                            if ($key<3 && $key>1){
                                echo '<a href="/article/index/Article/SearchIdArticle?
id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';
                            }
                        }?></p>
                </li>
                <li>
                    <img src="__ROOT__/img/4.jpg" alt="ͼƬ�޷�����">
                    <p><?php foreach ($this->date as $key => $value){
                            if ($key<4 && $key>2){

                                echo '<a href="/article/index/Article/SearchIdArticle?
id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';
                            }
                        }?></p>
                </li>
                <li>
                    <img src="__ROOT__/img/5.jpg" alt="ͼƬ�޷�����">
                    <p><?php foreach ($this->date as $key => $value){
                            if ($key<5 && $key>3){
                                echo '<a href="/article/index/Article/SearchIdArticle?
id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';
                            }
                        }?></p>
                </li>
                <li>
                    <img src="__ROOT__/img/6.jpeg" alt="ͼƬ�޷�����">
                    <p><?php foreach ($this->date as $key => $value){
                            if ($key<6 && $key>4){
                                echo '<a href="/article/index/Article/SearchIdArticle?
id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';
                            }
                        }?></p>
                </li>
                <li>
                    <img src="__ROOT__/img/7.jpg" alt="ͼƬ�޷�����">
                    <p><?php foreach ($this->date as $key => $value){
                            if ($key<7 && $key>5){
                                echo '<a href="/article/index/Article/SearchIdArticle?
id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';
                            }
                        }?></p>
                </li>
                <li>
                    <img src="__ROOT__/img/8.jpg" alt="ͼƬ�޷�����">
                    <p><?php foreach ($this->date as $key => $value){
                            if ($key<8 && $key>6){
                                echo '<a href="/article/index/Article/SearchIdArticle?id=
'.($value['id']).'">'.$value['title'].'</a>'.'<br>';
                            }
                        }?></p>
                </li>
                <li>
                    <img src="__ROOT__/img/9.jpg" alt="ͼƬ�޷�����">
                    <p><?php foreach ($this->date as $key => $value){
                            if ($key<9 && $key>7){
                                echo '<a href="/article/index/Article/SearchIdArticle?id='.($value['id']).'">'
.$value['title'].'</a>'.'<br>';
                            }
                        }?></p>
                </li>
                <li>
                    <img src="__ROOT__/img/10.jpg" alt="ͼƬ�޷�����">
                    <p><?php foreach ($this->date as $key => $value){
                            if ($key<10 && $key>8){
                                echo '<a href="/article/index/Article/SearchIdArticle?
id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';
                            }
                        }?></p>
                </li>
            </ul>
        </div>

                <div class="ranking">
                    <h3>�Ķ�����</h3>
                    <p>
                        <?php
                        foreach ($this->date as $key => $value){
                            if($key <6 ){
                                echo '<a target="_blank" 
href="/article/index/Article/SearchIdArticle?id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';}
                        }
                        ?>
                    </p>

                </div>
                <div class="clear"></div>
                <div class="new">
                    <h4 class="new-essay">��������</h4>
                    <div id="new-essay">
                        <p><?php
                            foreach ($this->date as $key => $value){
                                if($key <12 ){
                                    echo '<a target="_blank" 
href="/article/index/Article/SearchIdArticle?id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';}
                            }

                            ?></p>
                    </div>
                </div>

                <div class="hot">
                    <h4 class="hot-essay">��������</h4>
                    <div id="hot-essay">
                        <p>
                            <?php
                            foreach ($this->date as $key => $value){
                                if($key <6 ){
                                    echo '<a target="_blank" 
href="/article/index/Article/SearchIdArticle?id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';}
                            }
                            ?>
                        </p>
                    </div>
                </div>

                <div class="reader">
                    <h3>С���Ƽ�</h3>
                    <p>
                        <?php
                        foreach ($this->date as $key => $value){
                            if($key <6 ){
                                echo '<a target="_blank" 
href="/article/index/Article/SearchIdArticle?id='.($value['id']).'">'.$value['title'].'</a>'.'<br>';}
                        }
                        ?>
                    </p>
                </div>
        <div class="clear"></div>
    </div>

</body>
</html>