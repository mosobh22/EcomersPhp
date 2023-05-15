<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $name ?></title>
        <link rel="stylesheet" href="../../style/action.css">
        <?php require_once "../../fontAewsome.php"?>
    </head>
    <body>
        <div class="container">
            <div>
                <?php
                    if(isset($errors)&&$errors['name'] == 1){
                        
                        echo "<div class='errors'>
                        <p>you should enter product name</p>
                        </div>";
                    }
                    if(isset($errors)&&$errors['price']==1 && $errors['name'] == 0){
                        echo "<div class='errors'>
                        <p>you should enter product price</p>
                        </div>";;
                    }
                ?>
               
            </div>
            <!-- <div class='btn-div'>
                <a href="mainPage.php" class="add action-btn">view page</a>
            </div> -->
            <div class="btn" >
                <a href="mainPage.php" class="inner-btn">back
                </a>
            </div>
            <div class="form">
                <h1><?php echo $title?></h1>
                <div class="img">
                    <img class= "product-image" src= <?php if(isset($imgurl)) echo $imgurl; ?> >
                </div>         
                <form method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="Product Name" name='title'>
                    <input type="text" placeholder="meta information" name='price'>
                    <textarea   rows="4" cols="50" placeholder="product description" class="description" name='desc'>      
                    </textarea>
                    <label for="image" class="upload-icon"><i class="fa-solid fa-image icon" name='img'></i><span>choose image</span></label>
                    <input type="file" class="upload" id="image" name='img'>
                    <input type="submit" value=<?php echo $operation; ?>>
                </form>
            </div>
        </div>
    </body>
</html>