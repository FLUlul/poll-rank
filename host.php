<?php

$actual_link = "http://$_SERVER[HTTP_HOST]";

if (strpos($actual_link, 'localhost')) {
    $alltime = $actual_link . '/Projects_Tests/poll-rank/index.php?route=alltime';
} else {
    $home = $actual_link . '/index.php?route=home';
    $scoreboard = $actual_link . '/index.php?route=scoreboard';
    $alltime = $actual_link . '/index.php?route=alltime';
}

define('HOME', $home);
define('SCOREBOARD', $scoreboard);
define('ALLTIME', $alltime);
define('VIEW_PATH', 'view/');
define('CSS_PATH', 'css/');
define('CLASS_PATH' , 'class/');
