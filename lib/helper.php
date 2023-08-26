<?php

class helper{
    // public static function redirectWait(string $page,float $sec):void 
    // {
    //     header("Refresh: $sec; url={$page}.php");
    // }
    // public static function redirect(string $page):void 
    // {
    //     header("LOCATION: $page");
    // }
        public static function __callStatic($name,$arguments){
            if($name=="redirect"){
                if(count($arguments)>1){
                    header("Refresh: $arguments[1]; url={$arguments[0]}.php");
                }else{
                    header("LOCATION: $arguments[0].php");
                }
            }
        }
}