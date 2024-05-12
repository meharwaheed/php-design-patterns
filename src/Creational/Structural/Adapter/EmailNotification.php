<?php

namespace DesignPatterns\Creational\Structural\Adapter;

use DesignPatterns\Creational\Structural\Adapter\Notification;

class EmailNotification implements Notification
{

    private $adminEmail;

    public function __construct(string $adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function send(string $title, string $message): void
    {
        mail($this->adminEmail, $title, $message);
        echo "Sent email with title '$title' to '{$this->adminEmail}' that says '$message'. <br>";
    }
}