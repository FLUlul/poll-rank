<?php
require_once 'host.php';

$user        = $_GET ['user'];
$challenge   = $_GET ['challenge'];
$folder      = 'polls/' . $challenge;

$file = $user .'_' . $challenge . '.json';

// Se la cartella della challenge non esiste
if (!is_file($challenge)) {
    mkdir($folder . '/', 0755, true);
};

if($_GET['savePoll']) {
    $data = json_encode($_POST);
    file_put_contents($folder . '/' . $file, $data);
    header("location: ". SCOREBOARD . '&challenge=' . $challenge);
}