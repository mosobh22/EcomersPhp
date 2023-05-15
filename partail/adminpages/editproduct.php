<?php
require_once "../database/db_connection.php"; 
$name = "update product";
$title="update product";
$operation = "Update";
$porductID = $_GET['id'] ?? null;
session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin'] !== 1){
    header('Location:../../index.php');
    exit();
}
if($porductID != null){
    $sql = "SELECT productName, productPrice, productDescription, productImage FROM products WHERE id =$porductID";
    $getImageName = mysqli_query($conn,$sql);
    $result = $getImageName->fetch_assoc();
    //print_r($result);
    $imgurl = "../../uploadedImages/".$result['productImage'];
}


if($porductID!= null && $_SERVER['REQUEST_METHOD'] === 'POST'){
   if($_POST['title'] != ''){
    $pname = $_POST['title'];
    $sql = "UPDATE products SET productName='$pname' WHERE id=$porductID";
    mysqli_query($conn,$sql);
    }
   if($_POST['price']!=''){
    $ppric = $_POST['price'];
    $sql = "UPDATE products SET productPrice='$ppric' WHERE id=$porductID";
    mysqli_query($conn,$sql);
    }
   if(!empty($_FILES['img'])){
     echo "we are inside";
     $newImage = $_FILES['img'];
     $types = ['jpg','jpeg','jfif','png'];
        if(in_array(strtolower(explode('/',$newImage['type'])[1]),$types)){
            $imgurl = "../../uploadedImages/".$result['productImage'];
            unlink($imgurl);
            $newName = time();
            $imgurl = "../../uploadedImages/".$newName;
            $sql = "UPDATE products SET productImage='$newName' WHERE id=$porductID";
            mysqli_query($conn,$sql);
            move_uploaded_file($newImage['tmp_name'],$imgurl);
        } 
   }
   if($_POST['desc']!=''){
    $pdesc = $_POST['desc'];
    $sql ="UPDATE products SET productDescription='$pdesc' WHERE id=$porductID";
     mysqli_query($conn,$sql);
    }
    header("Location:http://localhost/products/partail/adminpages/mainPage.php");
}
?>

<?php require_once "./form.php"?>