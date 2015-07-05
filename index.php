<!DOCTYPE html>
<html>
<head>
    <title>guest_book</title>
</head>
<form method="GET" action="index.php">
    <input type="text" name="name">
    <br>
    <input type="text" name="text">
    <br>
    <input type="submit">
</form>
</html>
<?php
//var_dump($_GET['name']);
function addInDb(){
    $name=$_GET['name'];
    $text=$_GET['text'];
    $DB = new PDO('mysql:host=localhost;dbname=gb', 'root', 'sten');

    $DB->exec("INSERT INTO message (name,text) VALUES ($name,$text)");

    $query="SELECT * FROM message";
    $result = $DB->query($query, PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo $row['id'].' '.$row['name'].' '.$row['text'].'<br/>';
    }
}

addInDb();