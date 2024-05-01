<?php

namespace DesignPatterns\Creational\Factory;

/**
 * This Concrete Product implements the Facebook API.
 */
class FacebookConnector implements SocialNetworkConnector
{
    private $login, $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Facebook -> Send HTTP API request to log in user $this->login with " .
            "password $this->password<br>";
    }

    public function logOut(): void
    {
        echo "Facebook -> Send HTTP API request to log out user $this->login<br>";
    }

    public function createPost($content): void
    {
        echo "Facebook -> Send HTTP API requests to create a post in Facebook timeline.<br>";
    }
}