<?php

$actual_link = "http://$_SERVER[HTTP_HOST]";

if (strpos($actual_link, 'localhost')) {
    $home = $actual_link . '/poll-rank/index.php?route=home';
    $scoreboard = $actual_link . '/poll-rank/index.php?route=scoreboard';
} else {
    $home = $actual_link . '/index.php?route=home';
    $scoreboard = $actual_link . '/index.php?route=scoreboard';
}

define('HOME', $home);
define('SCOREBOARD', $scoreboard);
define('VIEW_PATH', 'view/');
define('CSS_PATH', 'css/');
define('CLASS_PATH' , 'class/');
