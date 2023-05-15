<?php
 $sql =  "SELECT id, productName, productPrice, productDescription, productImage FROM products";
 $answer = mysqli_query( $conn,$sql);
 if(! $answer) {
    die('Could not get data: ' . mysqli_error($conn));
 }
 $products = $answer->fetch_all(MYSQLI_ASSOC);
?>