<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 31/10/2017
 * Time: 11:30
 */
use Ductran\SensitiveFilter\EmailProcessor;

class EmailProcessorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderForGetEmails
     */
    public function testGetEmails($input, $output){
        $emailProcesscor = new EmailProcessor();
        self::assertEquals($output, $emailProcesscor->getEmails($input));
    }

    /**
     * @dataProvider dataProviderForProcess
     */
    public function testProcess($input, $output){
        $emailProcesscor = new EmailProcessor();
        self::assertEquals($output, $emailProcesscor->process($input));
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

    public function dataProviderForProcess()
    {
        return [
            ['duc@gmail.com', '***@*****.***'],
            ['a duc@gmail.com a', 'a ***@*****.*** a'],
            ['dm@gmail.com duc@gmail.com abc', '**@*****.*** ***@*****.*** abc'],
        ];
    }
}