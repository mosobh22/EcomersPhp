<?php
require_once "../database/db_connection.php";
require_once "../loadProducts.php";
$target_dir = "../../uploadedImages/";
$imagedir = "../../usersImages/";
$defualtImage = "../../images/product1.jfif";
$page = 'control';
$logoutpage = "../logout.php";
session_start();
if($_SESSION['admin'] != 1){
    header('Location:../../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once "../../fontAewsome.php"?>
        <link rel="stylesheet" href="../../style/admin.css">
        <style>
            <?php require_once '../../style/admin-header.css'?>
            <?php require_once '../../style/sidnav.css';?>
            <?php require_once '../../style/admin.css'?>
        </style>
        <title> admin page</title>
    </head>
    <body>
        <header>
            <?php require_once '../header.php' ?>
        </header>
        <nav id="sidnav">
            <?php require_once "../sidnav.php"; ?>
        </nav>
        <main>
            <div class="table-container" id='table-container'>
                <h1>products</h1>
                <div class="add-product">
                    <a href="addproduct.php" class="add action-btn"><i class="fa-solid fa-plus icon"></i>add product</a>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>product image</td>
                                <td>product name</td>
                                <td>product price</td>
                                <td>actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i= 0; foreach($products as $value){ $i++;?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td ><img src=<?php echo $target_dir.$value['productImage']; ?> alt="" class="product-image" style="width:160px; border-radius:8px"></td>
                                <td><?php echo $value['productName'];?></td>
                                <td><?php echo $value['productPrice'];?></td>
                                <td >
                                    <a href = <?php echo "editproduct.php?id=".$value['id']; ?> class="action-btn btn-ed">edit</a>
                                    <a href = <?php echo "removeproduct.php?id=".$value['id']; ?> class="action-btn btn-de">delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </main>

        <script>
            <?php require_once "../../javascripts/menubtn.js" ?>;
        </script>
    </body>
</html>