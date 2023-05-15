<?php 
require_once "../database/db_connection.php";
$name = "add product";
$title="new product";
$operation = "Add";
$target_dir = "C:/xampp/htdocs/products/uploadedImages/";
session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin'] != 1){
    header('Location:../../index.php');
    exit();
}
$errors = [
    'name'=>0,
    'price'=>0,
    'img'=>0,
];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $imag = $_FILES['img'] ?? null;
    $pdesc = $_POST['desc']?? '';
    if($_POST['title'] == ''){
        $errors['name'] = 1;
        $pname = '';
    }else{
        $errors['name'] = 0;
        $pname = $_POST['title'];
    }
    if($_POST['price'] == ''){
        $errors['price'] = 1;
        $pprice = '';
    }else{
        $errors['price'] = 0;
        $pprice = $_POST['price'];
    }
    if($imag != null && $imag['error'] == 0){
        $newName = $imag['name'];
        $newName = explode('.',$newName)[1];
        $randomName = time().'_.'.$newName;
        $types = ['jpg','jpeg','jfif','png'];
        if(in_array(strtolower(explode('/',$imag['type'])[1]),$types)){
            move_uploaded_file($imag['tmp_name'],$target_dir.$randomName);
            $errors['img'] = 0;
        }else{
            $errors['img']= 1;
            $randomName = '';
        }
    }else{
        $randomName = '';
    }
    if($errors['name'] == 0 && $errors['price'] == 0){
        $sql = $sql = "INSERT INTO products (productName, productPrice, productImage,productDescription)
        VALUES ('$pname', '$pprice', '$randomName','$pdesc')";
        if(!mysqli_query($conn,$sql)){
            echo "error";
        }
        header("Location:http://localhost/products/partail/adminpages/addproduct.php");
    }
}
?>

<?php require_once "./form.php"?> 