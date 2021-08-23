<?php


function pageImage($path)
{
    return $path && file_exists('storage/' . $path) ? asset('storage/' . $path) : 'https://via.placeholder.com/250';
}

function currencyConvert($price)
{
    $i = \Illuminate\Support\Facades\Session::get('currency');
    switch ($i) {
        case 'EUR':
            return number_format($price, 2) . ' ' . '€';
            break;
        case 'USD':
            return number_format($price, 2) . ' ' . '$';
            break;
        case 'GBP':
            return number_format($price, 2) . ' ' . '£';
            break;
    }
}
