<?php

namespace app\controller;

class HomeController extends Controller {

    public function index() {
        $this->view("home/index");
    }
}