<?php

function pageImage($path)
{
    return $path && file_exists('storage/' . $path) ? asset('storage/' . $path) : 'https://via.placeholder.com/250';
}
