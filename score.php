<?php

$challenge = $_GET['challenge'];

$folder    = 'polls/' . $challenge;
$allTime   = 'polls/alltime/';
$scan      = scandir("$folder/");
$dashBoard = [];

foreach($scan as $file) {
    if (!is_dir("$folder/$file")) {
       $content = file_get_contents("$folder/$file");
       $content = json_decode($content);
       $array = get_object_vars($content);
       $array = points($array);

       foreach ($array as $key => $value) {
          $dashBoard [$key] += $value;
        };
      }
    }

arsort($dashBoard);

if (!is_file($allTime . $challenge)) {
  mkdir($allTime . '/', 0755, true);
};

$data = json_encode($dashBoard);
file_put_contents($allTime . $challenge . '.json', $data);



function points(array $array) {
  foreach ($array as $key => $value) {
      if($value == 1) {
        $array[$key] = 7;
      }
      if($value == 2) {
        $array[$key] = 5;
      }
      if($value == 3) {
        $array[$key] = 4;
      }
      if($value == 4) {
        $array[$key] = 3;
      }
      if($value == 5) {
        $array[$key] = 2;
      }
      if($value >= 6) {
        $array[$key] = 1;
      }
  }

  return $array;
 }
 ?>