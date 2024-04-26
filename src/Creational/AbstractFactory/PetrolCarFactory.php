<?php

namespace DesignPatterns\Creational\AbstractFactory;

class PetrolCarFactory implements CarFactory
{

    /**
     * @return Car
     */
    public function createCar(): Car
    {
       return new PetrolCar();
    }

    /**
     * @return Truck
     */
    public function createTruck(): Truck
    {
        return new PetrolTruck();
    }
}