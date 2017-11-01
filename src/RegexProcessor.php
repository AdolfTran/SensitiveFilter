<?php
/**
 * Created by PhpStorm.
 * User: khuyen
 * Date: 31/10/2017
 * Time: 15:27
 */

namespace Ductran\SensitiveFilter;


class RegexProcessor implements ProcessorInterface
{
    public $regex;
    public $replaceChar;

    public function __construct($regex = "/[0-9]{10}/", $replaceChar = "*")
    {
        $this->replaceChar = $replaceChar;
        $this->regex = $regex;
    }


    public function process($string)
    {
        if ($regexLists = $this->getRegex($string)){
            foreach ($regexLists as $regex){
                $replaceString = $this->getReplaceString(strlen($regex));
                $string = str_replace($regex,$replaceString,$string );
            }
        }
        return $string;
    }

    public function getRegex($inputString){
        $arrayOfRegexStrings = array();
        preg_match($this->regex, $inputString, $matchRegexStrings, PREG_OFFSET_CAPTURE);
        if (!empty($matchRegexStrings)){
            foreach ($matchRegexStrings as $matchString){
                if(!empty($matchString[0])) $arrayOfRegexStrings[] = $matchString[0];
            }
        }
        if(!empty($arrayOfRegexStrings)) return $arrayOfRegexStrings;
        return false;

    }


    public function getReplaceString($emailLength){
        $replaceString = "";
        for ($index = 0;$index < $emailLength; $index++){
            $replaceString.= "*";
        }
        return  $replaceString;
    }
}