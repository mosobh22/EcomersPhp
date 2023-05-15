<?php
session_start();
if(!isset($_SESSION['usrId'])){
    header('Location:http://localhost/products/index.php');
    exit();
}
require_once './database/db_connection.php';
if(isset($_POST['save'])){
    $userName = $_POST['userName'];
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $confirmNewPass = $_POST['confirmNewPass'];
    $userId = $_SESSION['usrId'];
    if(!empty($userName)){
      $sql = "UPDATE users SET userName='$userName' WHERE userId='$userId'";
      if(!mysqli_query($conn,$sql)){
        echo 'error';
        exit();
      }
      $_SESSION['userName'] = $userName;
    }
    if(!empty($oldPass)){
        $sql = "SELECT userPassword FROM users WHERE userId='$userId'";
        $result = mysqli_query($conn,$sql);
        
        if(!$result){
          echo 'error';
          exit();
        }
        $password = mysqli_fetch_assoc($result);
        if(!password_verify($oldPass,$password['userPassword'])){
            header("Location:http://localhost/products/partail/settings.php?error=wrongpassword");
            exit();
        }else{
            if($newPass !== $confirmNewPass || empty($newPass) || empty($confirmNewPass)){
                header("Location:http://localhost/products/partail/settings.php?error=nomatch");
                exit();
            }
            $newPass = password_hash($newPass, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET userPassword= '$newPass' WHERE userId = '$userId'";
            if(!mysqli_query($conn,$sql)){
              die('error');
            }
        }
      }
      header("Location:http://localhost/products/partail/settings.php?errors=0");
      exit(); 
}
if(isset($_POST['change'])){
  $userId = $_SESSION['usrId'];
  if(!empty($_FILES['userImage'])){
    $newImage = $_FILES['userImage'];
    $types = ['jpg','jpeg','jfif','png'];
       if(in_array(strtolower(explode('/',$newImage['type'])[1]),$types)){
           if(isset($_SESSION['userImage']) && !empty($_SESSION['userImage'])){
           $imgurl = "../usersImages/".$_SESSION['userImage'];
           //echo $_SESSION['userImage'];
           //exit();
            unlink($imgurl);
          }
           $newName = time();
           $_SESSION['userImage'] = $newName."_.".explode('/',$newImage['type'])[1];
           $newName = $_SESSION['userImage'];
           //echo "$newName";
           //exit();
           $imgurl = "../usersImages/".$newName;
           $sql = "UPDATE users SET userImage='$newName' WHERE userId = '$userId'";
           mysqli_query($conn,$sql);
           move_uploaded_file($newImage['tmp_name'],$imgurl);
           header("Location:http://localhost/products/partail/settings.php?errors=0");
           exit();
       
          }else{
          header("Location:http://localhost/products/partail/settings.php?errors=1");
          exit();
       } 
  }else{
    header("Location:http://localhost/products/partail/settings.php");
  }
}


header("Location:http://localhost/products/partail/settings.php");
