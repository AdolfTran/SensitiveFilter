<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 31/10/2017
 * Time: 16:06
 */
use Ductran\SensitiveFilter\IdCardProcessor;

class IdCardProcessorTest extends PHPUnit_Framework_TestCase
{
    public function testGetIdCards(){
        $idCardProcessor = new IdCardProcessor();
        $input = 'dadads2478-8339-3242-2423dsdsa';
        $output = '2478-8339-3242-2423';
        self::assertEquals($output, $idCardProcessor->getIdCards($input));
    }

    public function testProcess(){
        $idCardProcessor = new IdCardProcessor();
        $input = 'dadads2478-8339-3242-2423dsdsa2478-8339-3242-2424';
        $output = 'dadads****-****-****-****dsdsa****-****-****-****';
        self::assertEquals($output, $idCardProcessor->process($input));
    }
}