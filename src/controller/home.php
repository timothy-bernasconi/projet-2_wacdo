<?php
class HomeController
{
    // une variable $model privée
    private $model;

    // le constructeur qui prend en paramètre homemodel
    public function __construct(HomeModel $model)
    {
        
        $this->model = $model;
    }
}
