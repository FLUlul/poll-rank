<?php

$user        = $_GET ['user'];
$challenge   = $_GET ['challenge'];

$file = $user .'_' . $challenge . '.json';

// Se la cartella della challenge non esiste
if (!is_file($challenge)) {
    mkdir($challenge . '/' . $file, 0755, true);
};


// if($_GET ['savePoll']) {

// }