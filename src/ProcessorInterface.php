<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 31/10/2017
 * Time: 14:55
 */

namespace Ductran\SensitiveFilter;

interface ProcessorInterface
{
    public function process($string);
}