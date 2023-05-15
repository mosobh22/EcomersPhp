<?php 
session_start();
if(!isset($_SESSION['usrId'])){
    header('Location:http://localhost/products/index.php');
    exit();
}
$target_dir = "../uploadedImages/";
$imagedir = "../usersImages/";
$defualtImage = "../images/product1.jfif";
$page = 'settings';
$logoutpage = "./logout.php";
$errors=[
    'wrongpassword'=>0,
    'errornewpassword'=>0
]
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once '../fontAewsome.php' ?>
        <style>
         <?php require_once '../style/settings.css' ?>
         <?php require_once '../style/admin-header.css'?>
         <?php require_once '../style/sidnav.css'?>
        </style>
        <title>settings</title>
    </head>
    <body>
        <header>
         <?php require_once "./header.php"?>
         
        </header>
        <nav id="sidnav">
        <?php require_once "./sidnav.php"?>
        </nav>
        <main>
            <div class="user-info-container">
                <h1 class='form-header'>account settings</h1>
                <div class='user-info'>
                    <div id = 'inner-information'>
                        <div class="image">
                            <img src= <?php if(isset($_SESSION['userImage']) && !empty($_SESSION['userImage'])){
                                echo $imagedir.$_SESSION['userImage'];
                            }else{
                                $_SESSION['userImage'] = '';
                                echo $defualtImage;
                            }
                            ?> class = 'user-image'>
                            <p> <?php echo $_SESSION['userName'];?> </p>
                        </div>
                       
                    <div>

                    <form action='./updateuser.php' method="POST" enctype='multipart/form-data'>
                        <input type='file' name = 'userImage'  id = 'userImage' class='btn-img'>
                        <label for="userImage" class="upload-icon"><i class="fa-solid fa-image icon" name='img'></i><span>choose image</span></label>
                        <button  class='btn' type='submit' name = 'change'>Change</button>
                    </form>
                </div>
                <div class='title'><h1>update information</h1></div>
                <div class='update-settings-container'>
                    
                    <form action="./updateuser.php" method="POST">
                        <?php if($errors['wrongpassword'] === 1)
                        echo "<div class='errors'>wrong password</div>"
                        ?>
                        
                        <input type = "text" name='userName' placeholder='your name' class = 'oldpass'>
                        <input type="password" name = 'oldPass' placeholder='Old Password' class='oldpass'>
                        <input type="password" name = 'newPass' placeholder='new Password'>
                        <input type = "password" name='confirmNewPass' placeholder='confirm new password'>
                        <div>
                            <button type='submit' name='save' class='btn'>save</button>
                        </div>
                    </form>           
                </div>
            </div>
        </main>
       <script>
        <?php require_once "../javascripts/menubtn.js"?>
       </script> 
    </body>
</html>