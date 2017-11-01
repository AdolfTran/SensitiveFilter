<?php

/**
 * Created by PhpStorm.
 * User: jaredchu
 * Date: 11/1/17
 * Time: 10:11 AM
 */

namespace Ductran\SensitiveFilter\Facades;

use Ductran\SensitiveFilter\IdCardProcessor;
use \Ductran\SensitiveFilter\SensitiveFilter as Filter;

class SensitiveFilter
{
    /**
     * @var Filter
     */
    public static $filter;

    public function filter($string){
        if(is_null(static::$filter)){
            static::$filter = new \Ductran\SensitiveFilter\SensitiveFilter();
        }

        static::$filter->addProcessor(new \Ductran\SensitiveFilter\EmailProcessor());
        static::$filter->addProcessor(new IdCardProcessor());

        return static::$filter->filter($string);
    }

    public static function on(){
         static::$filter = (new Filter());
         return new static();
    }

    public function withRegex($regex){
        static::$filter = static::$filter->withRegex($regex);
        return $this;
    }
}