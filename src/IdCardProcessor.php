<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 31/10/2017
 * Time: 15:26
 */

namespace Ductran\SensitiveFilter;


class IdCardProcessor implements ProcessorInterface
{
    public $replaceChar;
    const REG_ID_CARD = '/([0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4})|([0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4})/';

    /**
     * IdCardProcessor constructor.
     * @param $replaceChar
     */
    public function __construct($replaceChar = '*')
    {
        $this->replaceChar = $replaceChar;
    }

    /**
     * Return an array of id card
     *
     * @param string $string
     * @return array|bool
     */
    public function getIdCards($string)
    {
        preg_match(self::REG_ID_CARD, $string, $pgStrings, PREG_OFFSET_CAPTURE);
        if(!empty($pgStrings)){
            foreach ($pgStrings as $pgString) {
                if(!empty($pgString[0])) $results = $pgString[0];
            }
            return $results;
        }
        return false;
    }

    public function process($string)
    {
        if($idCard = $this->getIdCards($string)){
            $string = str_replace($idCard, preg_replace('/[0-9]{1}/', $this->replaceChar, $idCard), $string);
            return $this->process($string);
        } else {
            return $string;
        }
    }
}