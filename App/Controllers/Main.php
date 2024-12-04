<?php

namespace App\Controllers;

class Main
{
    public function index(): void
    {
        echo "Welcome to Main page";
    }

    public function create(): void
    {
        echo "create method called in main controller.";
    }

    public function delete(): void
    {
        echo "delete method called in main controller.";
    }
}