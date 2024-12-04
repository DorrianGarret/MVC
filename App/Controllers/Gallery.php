<?php

namespace App\Controllers;

class Gallery
{
    public function index(): void
    {
        echo "Welcome to the Gallery";
    }

    public function create(): void
    {
        echo "create method called in gallery controller.";
    }

    public function delete(): void
    {
        echo "delete method called in gallery controller.";
    }
}