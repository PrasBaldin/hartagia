<?php

return [
    '403' => [
        'code' => '403',
        'message' => 'Access Denied',
        'description' => 'Sorry, you do not have permission to access this page.',
        'back_to_home' => 'Back to Home Page'
    ],
    '404' => [
        'code' => '404',
        'message' => 'Page Not Found',
        'description' => 'Oops! The page you are looking for could not be found.',
        'back_to_home' => 'Back to Home Page'
    ],
    '419' => [
        'code' => '419',
        'message' => 'Page Expired',
        'description' => 'Sorry, this page has expired. Please refresh the page.',
        'back_to_home' => 'Back to Home Page',
        'refresh_page' => 'Refresh Page'
    ],
    '429' => [
        'code' => '429',
        'message' => 'Too Many Requests',
        'description' => 'Sorry, you have sent too many requests in a short period. Please try again later.',
        'back_to_home' => 'Back to Home Page'
    ],
    '500' => [
        'code' => '500',
        'message' => 'Internal Server Error',
        'description' => 'Sorry, there was an error on our server. Please try again later.',
    ],
    '503' => [
        'code' => '503',
        'message' => 'Service Unavailable',
        'description' => 'Sorry, the service is currently unavailable. Please try again later.',
    ],
];
