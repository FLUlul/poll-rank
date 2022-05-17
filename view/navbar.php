<nav>
    <h4>Benvenuto <?php echo $session_user?></h4>
    
    <?php 
    $path = basename($loader->view_path);
    if($path === 'home.php') {?>
        <a class="btn btn-logout" href="<?php  echo AUTH . '/logout' ?>" >Logout</a>
    <?php } else {?>
        <a class="btn" href="<?php  echo HOME ?>">Home</a>
    <?php }?>
</nav>