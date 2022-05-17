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

        if(isset($funcName)) {
            $this->callFunction($funcName, $funcArg);
        }
    }

    public function callFunction(string $name, array $arg = null) {
        if(isset($arg)) {
            $arg = implode(', ', $arg);
            $this->$name($arg);
        } else {
            $this->$name();
        }
    }

    public function connect() {

        $db_config = DB_ENGINE . ":host=".DB_HOST . ";dbname=" . DB_NAME;

        try {
            $this->pdo = new PDO($db_config, DB_USER, DB_PASSWORD, [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ]);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            exit("Impossibile connettersi al database: " . $e->getMessage());
        }
    }
}