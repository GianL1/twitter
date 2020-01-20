<?php
namespace Core;

class Controller {

    public function loadView($view, $data=array()){
        extract($data);
        require 'Views/'.$view.'.php';
    }

    public function loadViewInTemplate($view, $data=array()){
        extract($data);
        require 'Views/'.$view.'.php';
    }

    public function loadTemplate($view, $data=array()){
        require 'Views/template.php';
    }
}