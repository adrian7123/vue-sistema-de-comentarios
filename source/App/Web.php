<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Comments;

class Web
{
    
    private $view;

    public function __construct() 
    {
        $this->view = Engine::create(__DIR__ . "/../Views/", "php");

    }

    public function main(): void
    {

        echo $this->view->render("main"); 

    } 

}
