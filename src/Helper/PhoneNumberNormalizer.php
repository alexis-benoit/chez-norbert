<?php


namespace App\Helper;


class PhoneNumberNormalizer
{
    public static function normalize (string $phoneNumber) : string {
        $normalizedPhoneNumber = preg_replace('/\\s/', '', $phoneNumber);

        if (substr($normalizedPhoneNumber, 0, 1) === '0') {
            $normalizedPhoneNumber = sprintf('+33%s', substr($normalizedPhoneNumber, 1));
        }

        return $normalizedPhoneNumber;
    }
}