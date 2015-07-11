<?php
function check(){
    if($_GET['page']){
        $x= abs((int)$_GET['page']);
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
 * @param boolean $data
 */
/**
 * @param boolean $data
 * @param int $start
 * @param int $end
 * @param array $arr
 */
function take($data,$start,$end,$arr){
    if($data){
        $x= array_slice($arr,$start,$end);
        return $x;
    }
    else return array('1'=>'Error');
}
function startPage(){
$x = (check()-1)*10;
    return $x;
}
function view(){
    $x = take(checkPage($_GET['page'],colPages(100)),startPage(),10,createMsg());
    foreach ($x as $item){
        echo $item.'<br>';
    }
}
view();
