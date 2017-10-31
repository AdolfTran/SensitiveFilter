<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 31/10/2017
 * Time: 10:18
 */

namespace JC\Example;


class Example
{
    public function hideEmail($string, $replaceText = "*")
    {
        if($emails = $this->getEmails($string)){
            foreach ($emails as $email){
                $string = str_replace($email, preg_replace('/[a-zA-Z0-9]{1}/', $replaceText, $email), $string);
            }
        }

        return $string;
    }

    /**
     * Return an array of emails
     *
     * @param string $email
     * @return array|bool
     */
    public function getEmails($string)
    {
        $arrayEmails = explode(' ', $string);
        $results = array();
        foreach ($arrayEmails as $arrayEmail){
            if(($arrayEmail = filter_var($arrayEmail, FILTER_VALIDATE_EMAIL)) !== false){
                $results[] = $arrayEmail;
            }
        }
        if(!empty($results)) return $results;
        return false;
    }
}