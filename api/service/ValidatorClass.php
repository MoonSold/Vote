<?php

namespace service;

class ValidatorClass
{
    public static function registerValidator($login,$password,$username){
        return (preg_match("/^[a-zA-Z0-9-_]{5,20}$/i",$login)
                    && preg_match("/^[a-zA-Z0-9-_#$^&*@!?]{5,20}$/i",$password)
                        && preg_match("/^[а-яёА-ЯЁ]+$/u",$username));
        }
}