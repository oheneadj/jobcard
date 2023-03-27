<?php

namespace Core;
class Validator {
    public static function string($value, $min = 1, $max = INF){
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <=$max;
    }

    public static function email($value){
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function user_type($value){
        return $value == 1 || $value == 2;
    }
    public static function not_null (){
        //
    }
}