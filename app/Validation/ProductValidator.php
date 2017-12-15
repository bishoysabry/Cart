<?php
namespace App\Validation;
use Validator;




class ProductValidator
{
    public static function validate($input)
    {
        $rules = [
            'name' => 'Required|Min:4|Max:80|alpha_spaces',
            'description' => 'Required',
        ];
        return Validator::make($input, $rules);
    }
}
