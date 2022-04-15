<?php
require_once './Resources/Milk.php';

class Cow extends Animal {
    public function getResource()
    {
        $resource = array();
        for($i=0; $i < rand(8,12); $i++)
            array_push($resource, new Milk());
        return $resource;
    }

    public function __toString()
    {
        return "Корова";
    }
}