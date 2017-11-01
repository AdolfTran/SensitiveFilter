<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 31/10/2017
 * Time: 14:59
 */

use \Ductran\SensitiveFilter\Facades\SensitiveFilter;

class SensitiveFilterTest extends PHPUnit_Framework_TestCase
{
    public function testFilter(){
        $filter = new \Ductran\SensitiveFilter\SensitiveFilter();
        $filter->addProcessor(new \Ductran\SensitiveFilter\EmailProcessor());

        $input = 'duc@gmail.com adasd dm@gmail.com';
        echo $filter->filter($input);
    }

    public function testFacade(){
       echo SensitiveFilter::on()->withRegex('/[0-9]{10}/')->withRegex('/([a-z0-9_-]{6,9})/')->filter('$$$^^^&[myp4ssw0rd] 0979306603');
    }
}