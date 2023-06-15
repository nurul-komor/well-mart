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