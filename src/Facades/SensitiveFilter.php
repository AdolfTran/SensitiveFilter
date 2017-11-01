<?php

/**
 * Created by PhpStorm.
 * User: jaredchu
 * Date: 11/1/17
 * Time: 10:11 AM
 */

namespace Ductran\SensitiveFilter\Facades;

use Ductran\SensitiveFilter\IdCardProcessor;
use Ductran\SensitiveFilter\RegexProcessor;

class SensitiveFilter
{
    public static function filter($string){
        $filter = new \Ductran\SensitiveFilter\SensitiveFilter();
        $filter->addProcessor(new \Ductran\SensitiveFilter\EmailProcessor());
        $filter->addProcessor(new IdCardProcessor());
        $filter->addProcessor(new RegexProcessor());

        return $filter->filter($string);
    }
}