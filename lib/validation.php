<?php

class validation{
    public static function string_empty($input){
        $input=trim($input," ");
        $input= (strlen($input)==0 ? true : false);
        return $input;
    }
    public static function textHandler($input){
        return $input=strip_tags($input);
    }
}