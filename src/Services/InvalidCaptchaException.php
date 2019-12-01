<?php


namespace App\Services;


use Exception;

class InvalidCaptchaException extends Exception
{
    protected $message = 'Captcha obligatoire';
}