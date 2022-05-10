<?php
$actual_link = "http://$_SERVER[HTTP_HOST]";
if (strpos($actual_link, 'localhost')) {
    $host = $actual_link . "/poll-rank/score_board.php";
} else {
    $host = $actual_link;
}

define(HOST, $host);