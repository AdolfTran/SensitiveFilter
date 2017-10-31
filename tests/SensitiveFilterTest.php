<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 31/10/2017
 * Time: 14:59
 */

class SensitiveFilterTest extends PHPUnit_Framework_TestCase
{
    public function testFilter(){
        $filter = new \Ductran\SensitiveFilter\SensitiveFilter();
        $filter->addProcessor(new \Ductran\SensitiveFilter\EmailProcessor());
        $input = 'duc@gmail.com adasd dm@gmail.com';
        $output = $filter->filter($input);
        echo $output;

    }
}