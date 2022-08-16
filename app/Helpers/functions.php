<?php

if(!function_exists('convertItemsOfArrayToObject')){
    function convertItemsOfArrayToObject( array $items)
    {
        $items = array_map(function ($items){
            $stdClass = new \stdClass;
                foreach($items as $key=> $value){
                    $stdClass->{$key} = $value;
                }

            return $stdClass;
    }, $items);

     return $items;
    }

}
