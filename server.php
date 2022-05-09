<?php

$user        = $_GET ['user'];
$challenge   = $_GET ['challenge'];

$file = $user .'_' . $challenge . '.json';

// Se la cartella della challenge non esiste
if (!is_file($challenge)) {
    mkdir($challenge . '/', 0755, true);
};

echo $user;
echo $challenge;

if($_GET['savePoll']) {
    $data = json_encode($_POST);
    file_put_contents($challenge . '/' . $file, $data);
}

/* print_r($_POST); */