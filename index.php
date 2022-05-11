<!DOCTYPE html>
<html lang="en">
<head>
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
    <link rel="stylesheet" href="css/style.css">
    <!-- scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/script.js" defer></script>
    <title>Poll Rank</title>

    <?php
        require_once 'host.php';
        include 'score.php';
    ?>

</head>
<body>
    <h1>Poll Score</h1>
    <div class="container">
        <!-- se non esiste la rotta -->
        <?php if(!isset($_GET['route'])) {
            header("location: ". HOME);
        }
        ?>


        <?php if($_GET['route'] === 'home') { ?>
            <div class="login">
                <select name="userNames" id="userNames">
                    <option value="" disabled selected hidden>Tuo Nome</option>
                </select>

                <select name="challenges" id="challenges">
                    <option value="" disabled selected hidden>Challenge</option>
                </select>

                <button id="sendBtn" class="btn">Vota</button>
            </div>

            <div id="form_container"></div>
        <?php } else {?>


            <table>
                <tr>
                    <th colspan="2" style="text-align:center; border: none; padding-top: 5rem;">
                    <?php  echo $challenge?>
                    <a href="<?php  echo HOME ?>">HOME</a>
                    </th>
                </tr>
                <?php foreach ($dashBoard as $key => $value) { ?>
                    <tr>
                        <th>
                            <?php echo $key ?>
                        </th>
                        <td>
                        <?php echo $value ?>
                        </td>
                    </tr>
                <?php }?>
            </table>
        <?php } ?>
    </div>
</body>
</html>