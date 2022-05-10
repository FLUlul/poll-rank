<?php

$user        = $_GET ['user'];
$challenge   = $_GET ['challenge'];
$folder      = 'polls/' . $challenge;

$file = $user .'_' . $challenge . '.json';

// Se la cartella della challenge non esiste
if (!is_file($challenge)) {
    mkdir($folder . '/', 0755, true);
};

$actual_link = "http://$_SERVER[HTTP_HOST]";
$redirect_link = $actual_link . "/Projects_Tests/poll-rank/score_board.php";
/* print_r($actual_link);die; */
if($_GET['savePoll']) {
    $data = json_encode($_POST);
    file_put_contents($folder . '/' . $file, $data);
    header("location: ". $redirect_link);
}