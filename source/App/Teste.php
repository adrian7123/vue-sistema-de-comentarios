<?php

namespace Source\App;

use League\Plates\Engine;

class Teste
{
    private $view;

    public function __construct()
    {
        $this->view = Engine::create(__DIR__ . "/../Views/test", "php");
    }

    public function teste()
    {
        echo $this->view->render("teste"); 
    }

}
