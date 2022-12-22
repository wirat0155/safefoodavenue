<?php
$link = mysqli_connect('', 'team2', 'team2@2021', 'team2');
mysqli_set_charset($link, 'utf8');
$requestMethod = $_SERVER["REQUEST_METHOD"];
if($requestMethod == 'POST'){
    $username=$_POST['txtUsername'];
    $password=$_POST['txtPassword'];
}
?>