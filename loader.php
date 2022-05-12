<?php
include 'host.php';

class Loader {

    public function __construct() {

        $this->redirectHome();
        $this->route();
        $this->getView();
        $this->getCss();
        $this->getController();
    }

    public function redirectHome() {

        if(!isset($_GET['route'])) {
            header("location: ". HOME);
        }
    }

    public function route() {

        $this->route = $_GET['route'];
    }

    public function getView() {

        $this->view_path = VIEW_PATH . $this->route . '.php';
    }

    public function getCss() {

        $this->css_path = CSS_PATH . $this->route . '.css';
    }

    public function getController() {

        $this->controller_path = CLASS_PATH . $this->route . '.php';
    }
}