<?php
$host = "localhost";
$dbName = "shopproducts";
$user = 'root';
$password = '';
$conn = mysqli_connect($host,$user,$password,$dbName);
if(!$conn){
    die('some thing wrong');
}
?>