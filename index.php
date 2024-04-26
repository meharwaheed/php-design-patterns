<?php
require_once  'vendor/autoload.php';

use DesignPatterns\Creational\AbstractFactory\ElectricCarFactory;
use DesignPatterns\Creational\AbstractFactory\PetrolCarFactory;

try {

    /**
     * Abstract Factory
     */

    $electricCarFactory = new ElectricCarFactory();

    $electricCar = $electricCarFactory->createCar();
    $electricCar->drive();

    $electricTruck = $electricCarFactory->createTruck();
    $electricTruck->load();

    $petrolCarFactory = new PetrolCarFactory();

    $petrolCar = $petrolCarFactory->createCar();
    $petrolCar->drive();

    $petrolTruck = $petrolCarFactory->createTruck();
    $petrolTruck->load();


} catch (Throwable $exception) {
    var_dump($exception->getMessage());
}

