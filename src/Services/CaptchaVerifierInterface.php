<?php


namespace App\Services;


interface CaptchaVerifierInterface
{
    /**
     * Returns true if the captcha is valid otherwise false.
     *
     * @param string|null $captcha
     * @return bool
     */
    public function verify (?string $captcha) : bool;
}