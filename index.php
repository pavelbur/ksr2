<?php
/**
 * Created by PhpStorm.
 * User: sten
 * Date: 05.07.15
 * Time: 14:33
 */
Class BD{
    public $host;
    public $login;
    public $password;
    public $nameDB;

    public function __construct($host,$name,$pass,$nameDB){
        $this->host=$host;
        $this->login=$name;
        $this->password=$pass;
        $this->nameDB=$nameDB;
        mysql_connect($this->host,$this->login,$this->password);
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