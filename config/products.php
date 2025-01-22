<?php

return [
    'role' => env('DEFAULT_USER_ROLE', 'admin'),
    'email' => env('DEFAULT_EMAIL_SEND', 'tester123@gmail.com'),
    'webhook' => env('PRODUCTS_WEBHOOK_URL', 'http://webhook.site')
];
