<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    if(isset($_SESSION['session_id'])) {
        $session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
        $session_id = htmlspecialchars($_SESSION['session_id']);
    };
    require 'class/loader.php';
    include 'class/route.php';
    $loader = new loader();

    if(is_file($loader->controller_path)) {
        include($loader->controller_path);
        $controller = new $loader->route;
    }

    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Macondo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="<?php echo $loader->css_path; ?>">
    <!-- scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/script.js" defer></script>
    <title>Poll Score</title>
</head>
<body>
    <h1>
        POLL SCORE
    </h1>

    <div class="container">
        <?php if(isset($_SESSION['session_id'])) {?>
        <nav>
            <h4>Benvenuto <?php echo $session_user?></h4>
            <a class="btn btn-logout" href="<?php  echo AUTH . '/logout' ?>" >Logout</a>
        </nav>
        <?php }?>

        <section class="content">
            <?php include($loader->view_path); ?>
        </section>
    </div>
</body>
</html>
