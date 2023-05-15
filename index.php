<?php 
session_start();
require_once "./partail/database/db_connection.php";
$target_dir = "./uploadedImages/";
// error handling start
$imagedir = "./usersImages/";
$defualtImage = "./images/product1.jfif";
$page = 'home';
$logoutpage = "./partail/logout.php";
$errors = [
    'wrong email'=>0,
    'wrong password'=>0,
    'empty fields'=>0,
    'wrong confirm password'=>0,
    'choose another name is already founded'=>0,
];
if(isset($_GET['wrongEmail']) ){
    $errors['wrong email'] = 1;
    //echo $errors['wrong email'];
}elseif(isset($_GET['wrongpassword'])){
    $errors['wrong password'] = 1;
}elseif(isset($_GET['emptyfiled'])){
    $errors['empty fields'] = 1;
}
if(isset($_GET['sucsseful'])){
    header('Location:index.php');
}
// error handling end

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once 'fontAewsome.php' ?>
        <link rel='stylesheet' href='./style/home.css'>
        <style>
             <?php require_once './style/sidnav.css'?>
             <?php require_once "./style/login.css"?>  
        </style>
       
        <title>home page</title>
    </head>
    <body>
        <!--start header-->
        <header>
            <?php require_once "./partail/header.php"?>
        </header>
        <!--end header-->
        
        <!-- start sidnav bar -->
          <nav id="sidnav">
            <?php require_once "./partail/sidnav.php"; ?>
          </nav>
        <!-- end sidnava b -->

        <!-- start log in section -->
        <section class = "login login-none" id="login">
            <div class="login-container">
                <div class="login-header">
                    <h1>log in</h1>
                    <button id='close-login-popup'>X</button>
                </div>
                <!-- start error message -->
                <?php
                    if($errors['empty fields'] === 1){
                        echo "<p class='warning'>empty fields</p>";
                        echo "<script>
                            const loginform = document.getElementById('login');
                            loginform.classList.remove('login-none');
                        </script>";
                    }elseif($errors['wrong email'] === 1){
                        echo "<p class='warning'>wrong userId or password</p>";
                        echo "<script>
                            const loginform = document.getElementById('login');
                            loginform.classList.remove('login-none');
                        </script>";
                    }elseif($errors['wrong password'] === 1){
                        echo "<p class='warning'>wrong userId or password</p>";
                        echo "<script>
                            const loginform = document.getElementById('login');
                            loginform.classList.remove('login-none');
                        </script>";
                    }
                ?>
                <!-- end error message -->
                <form action="./partail/login.php" method='POST'>
                    <input type="text" name="email" class='input-field' placeholder='user name' autocomplete="off">
                    <input type="password" name="pass" class='input-field' placeholder='password' autocomplete="off">
                    <input type="submit" name = "login" value='Log In'>
                </form>
            </div> 
        </section>
        <!-- end log in section -->

        <!-- start sign up section -->
        <section class = "login login-none" id="signup">
            <div class="login-container">
                <div class="login-header">
                    <h1>sign up</h1>
                    <button id='close-signup-popup'>X</button>
                </div>
                <form action="./partail/signup.php" method='POST' enctype="multipart/form-data">
                    <input type="text" name="Name" class='input-field' placeholder='your Name' autocomplete="off">
                    <input type="text" name="userId" class='input-field' placeholder='userName' autocomplete="off">
                    <input type="password" name="pass" class='input-field' placeholder='password' autocomplete="off">
                    <input type="password" name="confirmpass" class='input-field' placeholder='confirm password' autocomplete="off">
                    <div class="user-image-container">
                        <label for="image" class="upload-icon"><i class="fa-solid fa-image icon"></i><span>choose image</span></label>
                        <input type="file" class="upload" id="image" name='img'>
                    </div>
                    <input type="submit" name = "signup" value='Sign Up'>
                    
                </form>
            </div> 
        </section>
        <!-- end sign up section -->
       



        <!--start search section-->
        <section>
            <?php require_once "./partail/searchSection.php"?>
        </section>
        <!--end search section-->

        <!-- start main section -->
        <main>
            <?php require_once "./partail/loadProducts.php"?>
            <?php require_once "./partail/products.php"?>
        </main>
        <!--end main section-->

        <!--start footer-->
         <footer>
             <?php require_once "./partail/footer.php"?>
         </footer>
        <!--end footer-->

        <script>
            <?php require_once "./javascripts/menubtn.js" ?>;
            <?php require_once "./javascripts/search.js" ?>;
        </script>
    </body>
</html>