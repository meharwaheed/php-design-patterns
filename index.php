<?php
require_once  'vendor/autoload.php';

use DesignPatterns\Creational\AbstractFactory\ElectricCarFactory;
use DesignPatterns\Creational\AbstractFactory\PetrolCarFactory;
use DesignPatterns\Creational\Factory\SocialNetworkPoster;
use DesignPatterns\Creational\Factory\FacebookPoster;
use DesignPatterns\Creational\Factory\LinkedInPoster;
use DesignPatterns\Creational\Builder\MysqlQueryBuilder;
use DesignPatterns\Database\MysqlConnection;
use DesignPatterns\Creational\Prototype\Author;
use DesignPatterns\Creational\Prototype\Page;
use DesignPatterns\Creational\Singleton\Singleton;
try {

    ###################################  Creational   ####################################
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


    /**
     * Factory Pattern
     */

    /**
     * The client code can work with any subclass of SocialNetworkPoster since it
     * doesn't depend on concrete classes.
     */
    function clientCode(SocialNetworkPoster $creator)
    {
        // ...
        $creator->post("Hello world!");
        $creator->post("I had a large hamburger this morning!");
        // ...
    }

    /**
     * During the initialization phase, the app can decide which social network it
     * wants to work with, create an object of the proper subclass, and pass it to
     * the client code.
     */
    echo "Testing ConcreteCreator1:<br>";
    clientCode(new FacebookPoster("john_smith", "******"));
    echo "\n\n";

    echo "Testing ConcreteCreator2:<br>";
    clientCode(new LinkedInPoster("john_smith@example.com", "******"));



    /**
     * Builder Pattern
     */


    $queryBuilder = new MysqlQueryBuilder(new MysqlConnection());

    $queryBuilder->select('users', ['name', 'email', 'password']);
    $queryBuilder->limit(10, 0);

    echo "<br> Query Builder (Builder Pattern) <br>";
    echo "<br> <br>";
    echo $queryBuilder->getQuery() ."<br>";
    print_r(json_encode($queryBuilder->get())) ."<br>";

    $query = $queryBuilder
        ->select("users", ["name", "email", "password"])
        ->where("age", ">", 18)
        ->where("age", "<", 30)
        ->limit(10, 0)
        ->getQuery();


    echo "<br> <br>";
    echo $queryBuilder->getQuery() ."<br>";


    /**
     * Insert Data
     */
    $userData['name'] = "Abdul Waheed";
    $userData['email'] = 'waheedbajeed@gmail.com';
    $userData['password'] = '123456789';

    $queryBuilder->insert('users', $userData);
    echo "<br> <br>";
    echo $queryBuilder->getQuery() ."<br>";


    /**
     * Prototype
     */
    echo "<br> <br>";
    echo "Prototype";

    $author = new Author("John Smith");
    $page = new Page("Tip of the day", "Keep calm and carry on.", $author);
    $page->addComment("Nice tip, thanks!");

    echo "<br> <br>";

    $draft = clone $page;
    echo "Dump of the clone. Note that the author is now referencing two objects.\n\n";
    print_r($draft);


    /**
     * Singleton
     */

    echo "<br> <br>";
    echo "Singleton";
    echo "<br> <br>";

    $s1 = Singleton::getInstance();
    $s2 = Singleton::getInstance();
    if ($s1 === $s2) {
        echo "Singleton works, both variables contain the same instance.";
    } else {
        echo "Singleton failed, variables contain different instances.";
    }


} catch (Throwable $exception) {
    var_dump($exception->getMessage());
}

