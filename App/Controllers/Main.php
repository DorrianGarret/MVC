<?php

namespace App\Controllers;

class Main
{
    public function index(): void
    {
        echo 'This is the main page';
    }

    public function create(): void
    {
        echo 'Main page create method executed';
    }

    public function delete(): void
    {
        echo 'Main page delete method executed';
    }
}