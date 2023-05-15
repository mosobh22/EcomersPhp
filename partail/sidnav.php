<?php if(isset($_SESSION['admin']) && $_SESSION['admin']=== 1):?>
    <div class="sidnav-container">    
        <h1 class="logo"><a href="http://localhost/products/index.php"><i class="fa-solid fa-store"></i><span>shop</span></a></h1>
        
        <ul>
            <li><a href="http://localhost/products/index.php" <?php if ($page === 'home')echo "class= 'activ'";?>>home</a></li>
            <li><a href="http://localhost/products/partail/adminpages/mainPage.php" <?php if ($page === 'control')echo "class= 'activ'";?>>cotrol</a></li>
            <li><a href="http://localhost/products/partail/settings.php" <?php if ($page === 'settings')echo "class= 'activ'";?>>settings</a></li>
        </ul>
    </div>
<?php endif?>
