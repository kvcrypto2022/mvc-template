<?php

namespace app\controller;

class Controller {

    private $base_dir = "app/view/";

    protected function view(string $page, array $params=[]) : void {
        require_once($page);
    }

    public function _404() : void {
        $this->view(APP_DIR . $this->base_dir . "error/_404.php");
        die();
    }
}