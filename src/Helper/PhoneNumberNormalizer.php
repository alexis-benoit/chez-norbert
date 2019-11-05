<?php


namespace App\Helper;


class PhoneNumberNormalizer
{
    public static function normalize (string $phoneNumber) : string {
        $normalizedPhoneNumber = preg_replace('/\\s/', '', $phoneNumber);
        return $normalizedPhoneNumber;
    }
}