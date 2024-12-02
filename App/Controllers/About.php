<?php

namespace App\Controllers;

class About
{
    public function index(): void
    {
        echo 'This is the about page';
    }

    public function create(): void
    {
        echo 'About page create method executed';
    }

    public function delete(): void
    {
        echo 'About page delete method executed';
    }
}