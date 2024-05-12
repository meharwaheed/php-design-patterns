<?php

namespace DesignPatterns\Creational\Structural\Adapter;

interface Notification
{
    public function send(string $title, string $message);
}