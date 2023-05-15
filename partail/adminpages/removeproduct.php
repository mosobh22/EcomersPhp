<?php
require_once "../database/db_connection.php"; 
$name = "remove product";
$title="Delete product";
$operation = "Delete";
$porductID = $_GET['id'] ?? null;
session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin'] != 1){
    header('Location:../../index.php');
    exit();
}
if($porductID ==null){
    header("Location:http://localhost/products/partail/adminpages/mainPage.php");
}
$sql = "SELECT (`id`) FROM products WHERE id=$porductID ";
$checkid = mysqli_query($conn,$sql);
if(!$checkid){
    header("Location:http://localhost/products/partail/adminpages/mainPage.php");
}
if($porductID != null){
    $sql = "SELECT productName, productPrice, productDescription, productImage FROM products WHERE id =$porductID";
    $getImageName = mysqli_query($conn,$sql);
    $result = $getImageName->fetch_assoc();
    $imgurl = "../../uploadedImages/".$result['productImage'];
}

if($porductID!= null){
    unlink($imgurl);
    $sql = "DELETE FROM products WHERE id=$porductID";
    mysqli_query($conn,$sql);
    //echo $porductID;
    header("Location:http://localhost/products/partail/adminpages/mainPage.php");
}else{
    header("Location:http://localhost/products/partail/adminpages/mainPage.php");
}
?>
