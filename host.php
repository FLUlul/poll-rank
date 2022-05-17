<?php

$actual_link = "http://$_SERVER[HTTP_HOST]";

if (strpos($actual_link, 'localhost')) {
    $home       = $actual_link . '/poll-rank/index.php?route=home';
    $scoreboard = $actual_link . '/poll-rank/index.php?route=scoreboard';
    $base_url   = '/poll-rank/index.php';
    $auth       = $actual_link . '/poll-rank/index.php?route=auth';

} else {
    $home       = $actual_link . '/index.php?route=home';
    $scoreboard = $actual_link . '/index.php?route=scoreboard';
    $auth       = $actual_link . '/index.php?route=auth';
    $base_url   = '/index.php';

}

define('HOME', $home);
define('SCOREBOARD', $scoreboard);
define('AUTH', $auth);
define('VIEW_PATH', 'view/');
define('CSS_PATH', 'css/');
define('CLASS_PATH' , 'controller/');
define('BASE_URL' , $base_url);
define('DB_ENGINE' , 'mysql');
define('DB_HOST' , '127.0.0.1');
define('DB_NAME' , 'my_poolscore');
define('DB_USER' , 'root');
define('DB_PASSWORD' , 'root');
