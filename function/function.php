<?php
/**
 * проверка установлен ли Get
 * если да то проверка чтобы было число
 * если нет то устанавливаем на 0
 * @return int
 */
$y =mysqli_connect("localhost","root",'',"news");
function check($get=1){
    if($get==0)
        $get=1;
    else
        $get=abs((int)$get);
    return $get;
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
    $x= "SELECT COUNT(*) FROM msg ";
    $z=mysqli_query($y,$x);
    $data=mysqli_fetch_assoc($z);
    $j=ceil(($data['COUNT(*)'])/10);
    for($i=1;$i<=$j;$i++){

        echo '<a href="?page='.$i.'">'.$i.'</a>&nbsp;&nbsp;';
    }
}


function viewNews($y,$id=1){
    if($_GET['id']<=0 or $_GET['id']>allMsg($y)){
        echo 'ERROR';
    }
    else{
        $x = "SELECT * FROM msg WHERE id=$id";
        $z=mysqli_query($y,$x);
        $a = mysqli_fetch_array($z); {
            echo $a['title'] . '<br><br>';
            echo $a['msgs'] . '<br>';

        }
    }

}
function allMsg($y){
    $x= "SELECT COUNT(*) FROM msg ";
    $z=mysqli_query($y,$x);
    $data=mysqli_fetch_array($z);
    $x=(int)$data['0'];
    return $x;
}
