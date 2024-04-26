<?php

namespace DesignPatterns\Creational\AbstractFactory;
class ElectricCar implements Car
{

    public function __construct()
    {
        echo "Electric Car Created". "<br>";
    }
    public function drive(): void
    {
        echo "Driving Electric Car". "<br>";
    }
}