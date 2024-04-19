<?php

namespace app\controller;

class Controller {

    public function _404() : void {
        $this->view("error/_404");
        die();
    }

    protected function view(string $page, array $params=[]) : void {
        require_once(PUBLIC_DIR . $page . ".php");
    }
}