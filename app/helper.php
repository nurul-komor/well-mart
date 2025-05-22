<?php

use Carbon\Carbon;

// date_default_timezone_set('Asia/Dhaka');
if (!function_exists('p')) {
    function p($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

if (!function_exists('getDiff')) {
    function getDiff($date)
    {
        $endingTime = Carbon::now();
        $startingTime = Carbon::parse($date);
        $diff = $endingTime->diff($startingTime);
        return $diff->h . ' hours ' . $diff->i . ' minutes ' . $diff->s . ' seconds ago';
    }
}

if (!function_exists('get_slug')) {
    function get_slug(string $value): string
    {
        // Replace spaces with underscores
        $value = str_replace(' ', '_', $value);
        // Remove all non-alphanumeric and non-underscore characters
        return preg_replace('/[^A-Za-z0-9_]/', '', $value);
    }
}


if (!function_exists('get_image_url')) {
    function get_image_url(string $value): string
    {
        if (
            str_starts_with($value, 'http://') ||
            str_starts_with($value, 'https://') ||
            str_starts_with($value, '//')
        ) {
            return $value;
        }

        return asset($value);
    }
}
