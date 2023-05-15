<?php 
session_start();
if($_POST['login'] != null){
   if($_POST['email'] == '' || $_POST['pass'] == ''){
    header('Location:../index.php?error&emptyfiled=1');
   }else{
    require_once "./database/db_connection.php";
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $sql = "SELECT id,  userName, userPassword, userRoll, userImage FROM users WHERE userId='$email'";
    $result = mysqli_query($conn,$sql);
    print_r($result);
    if(mysqli_num_rows($result) === 0){
            header('Location:../index.php?errors&wrongEmail');
    }else{
                // slower than 
            $finalResult = mysqli_fetch_assoc($result);
            $actualpass = password_hash($password, PASSWORD_DEFAULT);
            //echo $finalResult['userPassword'];
            //echo "<br>".$actualpass; 
            if (password_verify($password, $finalResult['userPassword'])) {
                    echo "<br>".$finalResult['userId'];
                    $_SESSION['usrId'] = $email;
                    $_SESSION['userName'] = $finalResult['userName'];
                    $_SESSION['userImage'] = $finalResult['userImage'];
                    if($finalResult['userRoll'] =='1'){
                        $_SESSION['admin'] = 1;
                    }
                    header('Location:../index.php?sucsseful');
            }else{
                header('Location:../index.php?errors&wrongpassword');
            }

        }
    
   }
}else{
    header('Location:../index.php');
}


?>