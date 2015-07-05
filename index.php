<?php
/**
 * Created by PhpStorm.
 * User: sten
 * Date: 05.07.15
 * Time: 14:33
 */
Class BD{
    public $nameDB;
    public function __construct($host,$login,$pass,$nameDB){
        $this->nameDB=$nameDB;
        mysql_connect($host,$login,$pass);
    }
    public function testConnection(){
        $res=mysql_select_db($this->nameDB);
        echo  ($res)?  "connect bd $this->nameDB" :  "connection failed";
    }
    public function addUser($userName){
        mysql_query("INSERT INTO people (name) VALUES ('$userName')");
    }
    public function showUser(){
        $row=mysql_query('SELECT * FROM people');
        while($res = mysql_fetch_array($row)){
            echo $res['name'].'<br>';
        }
    }
}
$a= new BD('localhost','root','sten','test');
$a->testConnection();
$a->showUser();