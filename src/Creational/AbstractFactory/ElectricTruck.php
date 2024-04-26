<?php

namespace DesignPatterns\Creational\AbstractFactory;


class ElectricTruck implements Truck
{
    public function __construct()
    {
        echo "Electric Truck Created". "<br>";
    }

    public function load(): void
    {
        echo "Loading Electric Truck". "<br>";
    }
}