<?php
function check(){
    if($_GET['page']){
        $x= abs((int)$_GET['page']);
    }
    else{
     $_GET['page']=1;
    }

    if(is_integer($x)){
        return $x;
    }
    else{
        return 1;
    }

}
function createMsg(){
    $x=array();
    for($i=0;$i<100;$i++){
        $x[]='Message: '.$i;
    }
    return $x;
}
function colPages($data){
    $pages= ceil($data/10);
    return $pages;
}

/**
 * @param int $numberPage то что пришло из get
 * @param int $page то что пришло из функции colPages
 */
function checkPage($numberPage,$page){
    if($numberPage<=$page){
        return true;
    }
    else{
        return false;
    }
}

/**
 * @param bool $data
 * @param int $start
 * @param int $end
 * @param arr $arr
 * @return array
 */
function take($data,$start,$end,$arr){
    if($data){
        $x= array_slice($arr,$start,$end);
        return $x;
    }
    else return array('1'=>'Error');
}

/**
 * @return int|number возвращает с какой новости
 */
function startPage(){
$x = (check()-1)*10;
    return $x;
}

/**
 * @param $data номер стр из гета
 * @param $start не придумал
 * @param $curr
 */
function paginator(){
   $x= count(createMsg());
    $z=ceil($x/10);
    $s='';
    for($i=0;$i<$z;$i++){
        $s.='<a href="index.php?page='.$i.'">'.$i.'</a>&nbsp;&nbsp;';
    }
    return $s;
}

function view(){

    $x = take(checkPage($_GET['page'],colPages(100)),startPage(),10,createMsg());
    foreach ($x as $item){
        echo $item.'<hr >';

    }

}
check();
view();
echo paginator();
