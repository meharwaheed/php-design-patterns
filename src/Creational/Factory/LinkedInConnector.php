<?php

namespace DesignPatterns\Creational\Factory;


/**
 * This Concrete Product implements the LinkedIn API.
 */
class LinkedInConnector implements SocialNetworkConnector
{
    private $email, $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Linkedin -> Send HTTP API request to log in user $this->email with " .
            "password $this->password<br>";
    }

    public function logOut(): void
    {
        echo "Linkedin -> Send HTTP API request to log out user $this->email<br>";
    }

    public function createPost($content): void
    {
        echo "Linkedin -> Send HTTP API requests to create a post in LinkedIn timeline.<br>";
    }
}