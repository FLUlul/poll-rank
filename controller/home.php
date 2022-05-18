<?php

class Home extends Route {

    public function __construct() {

        parent::__construct();
        $this->alltime();
    }

    public function alltime() {

        $this->title     = 'Total Score';
        $folder    = 'polls/alltime';
        $scan      = scandir("$folder/");
        $dashBoard = [];

        foreach($scan as $file) {
            if (!is_dir("$folder/$file")) {
                $content = file_get_contents("$folder/$file");
                $content = json_decode($content);
                $array = get_object_vars($content);

                foreach ($array as $key => $value) {
                    $value = $value == '' ? 0 : $value;
                    $dashBoard[$key] += $value;
                };
            }
        }

        $dashBoard = (array) $dashBoard;
        arsort($dashBoard);

        // if (!is_file('polls/totalScore')) {
        //   mkdir($allTime . '/', 0755, true);
        // };

        $data = json_encode($dashBoard);
        file_put_contents('polls/totalScore.json', $data);

        $this->dashBoard = $dashBoard;
    }
}