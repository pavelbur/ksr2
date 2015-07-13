<?php
/**
 * проверка установлен ли Get
 * если да то проверка чтобы было число
 * если нет то устанавливаем на 0
 * @return int
 */
$y =mysqli_connect("localhost","root",'',"news");
function check(){
    if(!isset($_GET['page'])){
        $_GET['page']=1;
    }
    if(isset($_GET['page'])){
        $_GET['page']=abs((int)$_GET['page']);
    }
    $x=$_GET['page'];
    return $x;
}

function view($v,$y){
    $x= "SELECT * FROM msg order by id ASC limit $v,10";
    $z=mysqli_query($y,$x);

    var_dump($z);
    while ($a = mysqli_fetch_array($z)){
        echo $a['title'].'<br><br>';
        echo $a['msgs'].'<br>';
        echo '<a href="news.php?id='.$a['id'].'">Читать далее</a>&nbsp;&nbsp;';
        echo '<hr>';
    }
}
function paginator ($y){
    $x= "SELECT * FROM msg ";
    $z=mysqli_query($y,$x);
    $i=0;
    while ($a = mysqli_fetch_array($z)){
        $i++;
    }
    $j=ceil($i/10);
    for($i=1;$i<$j;$i++){

        echo '<a href="?page='.$i.'">'.$i.'</a>&nbsp;&nbsp;';
    }
}


function viewNews($y,$id=1){
    if(!isset($_GET['id'])){
        $_GET['id']=1;
    }
    if(isset($_GET['id'])){
        $_GET['id']=abs((int)$_GET['id']);
    }
    if(is_integer($_GET['id']))
    $id=$_GET['id'];
    else
        $id=1;


$x = "SELECT * FROM msg WHERE id=$id";
    $z=mysqli_query($y,$x);
$l=count(mysqli_fetch_array($z));
    while ($a = mysqli_fetch_array($z)){
        echo $a['title'].'<br><br>';
        echo $a['msgs'].'<br>';


    }
    if($_GET['id']==0){
        echo 'ERROR';
    }
    var_dump($l);
}
