<?php
require_once './database/db_connection.php';
if(isset($_POST['signup'])){
   $target_dir ="../usersImages/";
   $userName = $_POST['Name']??null;
   $userId = $_POST['userId']??null;
   $userPass = $_POST['pass']??null;
   $userConfirmPass = $_POST['confirmpass']??null;
   $userImage = $_FILES['img'] ?? null;
   if(empty($userName) || empty($userId) ||empty($userPass) || empty($userConfirmPass)){
    header('Location:../index.php?errors&emptyfield');
   }else{
    $sql = "SELECT userId FROM users WHERE userId='$userId'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows != 0){
        header('Location:../index.php?errors&userId=1');
        exit();
    }
    
    if($userPass !== $userConfirmPass){
        header('Location:../index.php?errors&passmatch=1');
        exit();
    }
    // image operation
    if($userImage != null && $userImage['error'] == 0){
        $newName = $userImage['name'];
        $newName = explode('.',$newName)[1];
        $randomName = time().'_.'.$newName;
        $types = ['jpg','jpeg','jfif','png'];
        if(in_array(strtolower(explode('/',$userImage['type'])[1]),$types)){
            move_uploaded_file($userImage['tmp_name'],$target_dir.$randomName);
        }else{
            $randomName = '';
        }
    }else{
        $randomName = '';
    }

    //end image operation

    
    /** final */
    $db_user_pass = password_hash($userPass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(userId,userName,userPassword,userImage) VALUES ('$userId','$userName','$db_user_pass','$randomName')";
    if(!mysqli_query($conn,$sql)){
        echo('db wrong');
        exit();
    }
    session_start();
    $_SESSION['usrId'] = $userId;
    $_SESSION['userName'] = $userName;
    $_SESSION['userImage'] = $randomName;
    header('Location:../index.php');
   //************ */

   }
    
}


