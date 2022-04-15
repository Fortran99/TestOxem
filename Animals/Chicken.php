<?php
require_once './Resources/Egg.php';

class Chicken extends Animal {

    public function getResource()
    {
        $resource = array();
        for($i=0; $i < rand(0,1); $i++)
            array_push($resource, new Egg());
        return $resource;
    }

    public function __toString()
    {
        return "Курица";
    }
}