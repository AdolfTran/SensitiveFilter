<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 31/10/2017
 * Time: 11:30
 */
use JC\Example\Example;

class ExampleTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderForGetEmails
     */
    public function testGetEmails($input, $output){
        $example = new Example();
        self::assertEquals($output, $example->getEmails($input));
    }

    /**
     * @dataProvider dataProviderForHideEmail
     */
    public function testHideEmail($input, $output){
        $example = new Example();
        self::assertEquals($output, $example->hideEmail($input));
    }

    public function dataProviderForGetEmails()
    {
        return [
            ['duc@gmail.com', ['duc@gmail.com']],
            ['duc@gmail.com adasd', ['duc@gmail.com']],
            ['duc@gmail.com adasd dm@gmail.com', ['duc@gmail.com', 'dm@gmail.com']],
            ['adada@adad', false]
        ];
    }

    public function dataProviderForHideEmail()
    {
        return [
            ['duc@gmail.com', '***@*****.***'],
            ['a duc@gmail.com a', 'a ***@*****.*** a'],
            ['dm@gmail.com duc@gmail.com abc', '**@*****.*** ***@*****.*** abc'],
        ];
    }
}