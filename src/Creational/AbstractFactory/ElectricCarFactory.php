<?php

namespace DesignPatterns\Creational\AbstractFactory;

class ElectricCarFactory implements CarFactory
{

    public function createCar(): Car
    {
        return new ElectricCar();
    }

    public function createTruck(): Truck
    {
        return new ElectricTruck();
    }
}