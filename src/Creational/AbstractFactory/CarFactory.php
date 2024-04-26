<?php

namespace DesignPatterns\Creational\AbstractFactory;
interface CarFactory
{
    public function createCar(): Car;
    public function createTruck(): Truck;
}