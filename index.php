<?php
include __DIR__.'../function/function.php';
$y =mysqli_connect("localhost","root",'',"news");
$v=(check()-1)*10;


view($v,$y);
paginator($y);


