<?php

namespace App\Controllers;

class About
{
    public function index(): void
    {
        echo "Welcome to the About";
    }

    public function create(): void
    {
        echo "create method called in about controller.";
    }

    public function delete(): void
    {
        echo "delete method called in about controller.";
    }
}