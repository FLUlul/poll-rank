<?php

$user        = $_GET ['user'];
$challenge   = $_GET ['challenge'];

$file = $user .'_' . $challenge . '.txt';

// Se la cartella della challenge non esiste
if (!is_file($challenge)) {
    mkdir($challenge . '/' . $file, 0755, true);
};

echo $user;
echo $challenge;

if($_GET['savePoll']) {
    $data = $_POST;
    json_encode($data);
    file_put_contents($challenge . '/' . $file, $data);
}

/* print_r($_POST); */