<?php

use AmrShawky\LaravelCurrency\Facade\Currency;

function pageImage($path)
{
    return $path && file_exists('storage/' . $path) ? asset('storage/' . $path) : 'https://via.placeholder.com/250';
}

function floorImage($path)
{
    return $path && file_exists('storage/' . $path) ? asset('storage/' . $path) : '';
}

function currencyConvert($price)
{
    $i = \Illuminate\Support\Facades\Session::get('currency');
    switch ($i) {
        case 'EUR':
            $amount = Currency::convert()
                ->from('USD')
                ->to('EUR')
                ->amount($price)
                ->round(2)
                ->throw()
                ->get();
            return '€' . ' ' . number_format($amount);
        case 'USD':
            return '$' . ' ' . number_format($price);
        case 'GBP':
            $amount = Currency::convert()
                ->from('USD')
                ->to('GBP')
                ->amount($price)
                ->round(2)
                ->throw()
                ->get();
            return '£' . ' ' . number_format($amount);
        case 'TRY':
            $amount = Currency::convert()
                ->from('USD')
                ->to('TRY')
                ->amount($price)
                ->throw()
                ->get();
            return '₺' . ' ' . number_format($amount);
    }
}
