<?php
$partecipants = [
   'Valerio',
   'Maurizio',
   'Mario',
   'Francesco',
   'Samuele',
   'Alberto',
   'Daniele',
   'Michele'
];

$challenge = $_GET['challenge'];

$folder    = 'polls/' . $challenge;
$data = [];
$scan = scandir("$folder/");

$i = 0;
foreach($scan as $file) {
    if (!is_dir("$folder/$file")) {
       $content = file_get_contents("$folder/$file");
       $content = json_decode($content);
       $data [] = $content;
       var_dump(array_map($content, $partecipants[$i]));
       i+1;
    }
 }

//  per il futuro header
// $array = get_object_vars($content);
// $keys  = array_keys($array);
// $data['header'] = $keys;
// foreach ($partecipants as $key => $value) {

// }
//  var_dump($data);