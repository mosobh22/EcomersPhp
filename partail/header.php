<div class="container">
    <!--start header-->
    <div class="header">
        <?php if(!isset($_SESSION['usrId'])):?>
        <h1 class="logo"><a href="http://localhost/products/index.php"><i class="fa-solid fa-store"></i><span>shop</span></a></h1>
        <ul>
            <li>
                <a id='login-btn' class='log-in'>log in</a>
            </li>
            <li>
                <a id='signup-btn' class='log-in'>sign up</a>
            </li>
        </ul>
        <?php elseif(isset($_SESSION['usrId'])): ?>
            <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] === 1) :?>
            <button style='width:40px;font-size:1.5rem;background-color:#000;border-radius:4px;cursor:pointer;color:gold' id='user-menu'><i class="fa-solid fa-bars"></i></button>
            <?php else :?>
                <h1 class="logo"><a href="http://localhost/products/index.php"><i class="fa-solid fa-store"></i><span>shop</span></a></h1>
            <?php endif ?>
            <ul>
                <li>
                    <a href="http://localhost/products/partail/settings.php" class='user-profile' style='display:flex;align-items:center; gap:5px; padding:5px 10px;'>
                        <img src=<?php 
                        if(isset($_SESSION['userImage'])&&$_SESSION['userImage'] != ''){
                            echo $imagedir.$_SESSION['userImage'];
                        }else{echo $defualtImage;}
                        ?> alt="" class='user-img' style='width:40px;height:40px;border-radius:50%; object-fit:cover'>    
                        <span><?php echo$_SESSION['userName'];?></span>
                    </a>
                </li>
                <li>
                    <a href=<?php echo $logoutpage ?>>log out</a>
                </li>
            </ul>
        <?php endif?>
    </div>
    <!--end header-->
<dvi>