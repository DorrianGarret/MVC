<?php

namespace App\Controllers;

class Gallery
{
    public function index(): void
    {
        echo 'This is the gallery page';
    }

    public function create(): void
    {
        echo 'Gallery page create method executed';
    }

    public function delete(): void
    {
        echo 'Gallery page delete method executed';
    }
}