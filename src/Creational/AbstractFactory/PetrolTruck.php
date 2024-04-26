<?php

namespace DesignPatterns\Creational\AbstractFactory;


class PetrolTruck implements Truck
{

    public function __construct()
    {
        echo "Petrol Truck Created". "<br>";
    }

    public function load(): void
    {
        echo "Loading Petrol Truck" . '<br>';
    }
}