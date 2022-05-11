<?php
$actual_link = "http://$_SERVER[HTTP_HOST]";
if (strpos($actual_link, 'localhost')) {
    $home = $actual_link . "/poll-rank/index.php?route=home";
    $scoreboard = $actual_link . "/poll-rank/index.php?route=scorboard";
} else {
    $scoreboard = $actual_link;
    $home = $actual_link;
}

define(HOME, $home);
define(SCOREBOARD, $scoreboard);