<?php
/**
 * проверка установлен ли Get
 * если да то проверка чтобы было число
 * если нет то устанавливаем на 0
 * @return int
 */
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
/**
 * Создает массив сообщений
 * @return array возвращает массив сообщений
 */
function createMsg(){
    $msg=array();
    for($i=0;$i<100;$i++){
        $msg[]='Message: '.$i;
    }
    return $msg;
}
/**
 * @param $view переменная по сколько на выводить
 * @return float возвращает количество страниц
 */
function colPages($view){
    $data=count(createMsg());
    $pages= ceil($data/$view);
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
 * @param $arr массив который создали в creatMsg
 * @param $start начало отсчета
 * @param $view переменная по сколько выводить на страницу
 * @param bool $data  которое мы проверяем в checkPage
 * @return array возвращает массив
 */
function take($arr,$start,$view,$data){
    if($data){
        $x=array_slice($arr,$start,$view);
    }
    else{
        $x= array('1'=>"Error");
    }
    return $x;
}

/**
 * @return int возвращает число с какого сообщения выводить
 */
function start(){
    $start=(check()-1)*10;
    return $start;
}
function view($arr){
    foreach($arr as $item){
        echo $item.'<hr>';
    }
}

$view=10; // по сколько сообщений выводить
$CP=checkPage(check(),colPages($view));
$take=take(createMsg(),start(),$view,$CP);
view($take);
