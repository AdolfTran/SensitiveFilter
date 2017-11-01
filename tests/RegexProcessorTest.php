<?php
/**
 * Created by PhpStorm.
 * User: khuyen
 * Date: 31/10/2017
 * Time: 15:58
 */

class RegexProcessorTest extends PHPUnit_Framework_TestCase
{

    public function dataProviderForGetRegex(){
    return [
        ['/[0-9]{10}/', 'ntkhuyencntt@gmail.com 0979306603 ntkhuyen@yahoo.com','0979306603'],
        ['/([a-z0-9_-]{6,18})/', '$$$^^^&[myp4ssw0rd]','myp4ssw0rd']
    ];
    }

    public function dataProviderForProcess(){
        return [
            ['/[0-9]{10}/', 'ntkhuyencntt@gmail.com 0979306603 ntkhuyen@yahoo.com','ntkhuyencntt@gmail.com ********** ntkhuyen@yahoo.com'],
            ['/([a-z0-9_-]{6,18})/', '$$$^^^&[myp4ssw0rd]','$$$^^^&[**********]']
        ];
    }

    /**
     * @dataProvider dataProviderForGetRegex
     */
    public function testGetRegex($regexString, $inputString, $outputString){
        $regex = new \Ductran\SensitiveFilter\RegexProcessor($regexString);
        $output = $regex->getRegex($inputString);
        $this->assertEquals($output[0],  $outputString);
    }
    /**
     * @dataProvider dataProviderForProcess
     */
    public function testProcess($regexString, $inputString, $outputString){
        $regex = new \Ductran\SensitiveFilter\RegexProcessor($regexString);
        $output = $regex->process($inputString);
        $this->assertEquals($output, $outputString);
    }
}