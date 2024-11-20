<?php

/**
 * Write code on Method
 *
 * @return response()
 */
if (!function_exists('rupiahFormat')) {
    function rupiahFormat($value)
    {
        return 'Rp ' . number_format($value, 0, ',', '.');
    }
}
