<?php
include __DIR__.'../function/function.php';
$y =mysqli_connect("localhost","root",'',"news");
$get=$_GET['page'];
$v=(check($get)-1)*10;


view($v,$y);
paginator($y);


