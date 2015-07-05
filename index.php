<?php
/**
 * Created by PhpStorm.
 * User: sten
 * Date: 05.07.15
 * Time: 14:33
 */
Class DB{
    protected $link;
    public function __construct($host,$login,$pass,$nameDB){
      $this->link =  mysqli_connect($host,$login,$pass,$nameDB);
    }
    public function showUser(){
       $row = mysqli_query($this->link ,'SELECT * FROM people');
        while($res = mysqli_fetch_array($row)){
            echo $res['name'].'<br>';
        }
    }
}
$a = new DB('localhost','root','sten','test');
$a->showUser();
