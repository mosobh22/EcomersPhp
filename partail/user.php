<?php 
session_start();

if(isset($_SESSION['user'])){
    echo $_SESSION['user'];
}else{
    header('Location:../index.php');
}