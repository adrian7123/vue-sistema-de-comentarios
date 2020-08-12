<?php 

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;
    
    class Comments extends DataLayer
    {
        public function __construct()
        {
            parent::__construct("comments", ["comment"]);
        }
    
    }