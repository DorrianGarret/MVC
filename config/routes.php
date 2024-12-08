<?php

return[
    '' => [
      'controller' => 'App\Controllers\Main',
      'methods' => ['GET']
    ],
    'about' => [
        'controller' => 'App\Controllers\About',
        'methods' => ['GET', 'POST', 'DELETE']
    ],
    'gallery' => [
        'controller' => 'App\Controllers\Gallery',
        'methods' => ['GET', 'POST']
    ]
];