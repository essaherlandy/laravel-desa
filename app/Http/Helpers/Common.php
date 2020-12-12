<?php

if (!function_exists('formatted_price')) {
    function formatted_price($value, $type = 'rupiah'){
        $result = null;
        switch ($type) {
            case 'rupiah':
                $result = "Rp".number_format($value, 0, ',', '.');
                break;
            
            default:
                $result = number_format($value, 0, ',', '.');
                break;
        }
    
        return $result;
    }
}