<?php
include 'host.php';

class Loader {

    public function __construct() {
        $this->redirectHome();
        $this->getView();
        $this->getCss();
    }

    public function redirectHome() {
        if(!isset($_GET['route'])) {
            header("location: ". HOME);
        }
    }

    public function getView() {
        $file = $_GET['route'];
        $this->view_path = VIEW_PATH . $file . '.php';
    }

    public function getCss() {
        $file = $_GET['route'];
        $this->css_path = CSS_PATH . $file . '.css';
    }
}