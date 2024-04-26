<?php

namespace DesignPatterns\Creational\AbstractFactory;

class PetrolCar implements Car
{

    public function __construct()
    {
        echo "Petrol Car Created". "<br>";
    }
    public function drive(): void
    {
        echo "Driving Petrol Car" . "<br>";
    }
}