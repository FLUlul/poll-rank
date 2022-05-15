<?php

class Route {

    public function __construct() {

        $this->getParams();
    }

    public function getParams() {

        $url       = $_SERVER['REQUEST_URI'];
        $url       = str_replace(BASE_URL, '',  $url);
        $urlParams = explode('/', $url);
        $index     = count($urlParams) - 1;
        for ($i=1; $i<=$index  ; $i++) {
            if ($i === 1) {
                $funcName = $urlParams[$i];

            } else {
                $funcArg[] = $urlParams[$i];
            }
        }

        $this->callFunction($funcName, $funcArg);
    }

    public function callFunction(string $name, array $arg = null) {

        $arg = implode($arg, ', ');
        if(isset($arg)) {
            $this->$name($arg);
        } else {
            $this->$name();
        }
    }
}