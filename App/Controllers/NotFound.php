<?php

namespace App\Controllers;

class NotFound
{
    public function index(): void
    {
        http_response_code(404);
        echo "404 - page not found";
    }
}