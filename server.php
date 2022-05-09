<?php

$user        = $_GET ['user'];
$challenge   = $_GET ['challenge'];

$file = $user .'_' . $challenge . '.json';

// Se la cartella della challenge non esiste
if (!is_file($challenge)) {
    mkdir($challenge . '/', 0755, true);
};

$actual_link = "http://$_SERVER[HTTP_HOST]";
echo $actual_link . '/';die;
/* print_r($actual_link);die; */
if($_GET['savePoll']) {
    $data = json_encode($_POST);
    file_put_contents($challenge . '/' . $file, $data);
    header("location: ". $actual_link);
}