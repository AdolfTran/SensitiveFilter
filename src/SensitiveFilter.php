<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 31/10/2017
 * Time: 14:58
 */

namespace Ductran\SensitiveFilter;


class SensitiveFilter
{
    public $processors = [];

    /**
     * @param ProcessorInterface $processor
     */
    public function addProcessor($processor){
        $this->processors[] = $processor;
    }

    public function filter($string){
        foreach ($this->processors as $processor){
            $string = $processor->process($string);
        }

        return $string;
    }

    public function withRegex($regexString){
        $this->addProcessor(new RegexProcessor());

        return $this;
    }
}