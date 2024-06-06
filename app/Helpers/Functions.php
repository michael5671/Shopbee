<?php

namespace App\Helpers;

class Functions {
    public static function formatNumber($number, $decimals=0) {
        return number_format($number, 0, ".", ",");
    }

    public static function compareEmails($email1, $email2)
    {
        return trim(strtolower($email1)) == trim(strtolower($email2));
    }

    public static function comparePhones($phone1, $phone2)
    {
        return trim(strtolower($phone1)) == trim(strtolower($phone2));
    }

    public static function isValidPhoneNumber($phoneNumber) {
        // Remove any non-digit characters from the phone number
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);
    
        // Check if the phone number has the expected length (adjust as needed)
        if (strlen($phoneNumber) >= 10 && strlen($phoneNumber) <= 15) {
            return true;
        } else {
            return false;
        }
    }

    public static function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function base64urlEncode($s) {
        return str_replace(array('+', '/'), array('-', '_'), base64_encode($s));
    }
    
    public static function base64urlDecode($s) {
        return base64_decode(str_replace(array('-', '_'), array('+', '/'), $s));
    }

    /**
     * Convert price in mask to float number
     */
    public static function convertStringPriceToNumber($strPrice) {
        if (is_numeric($strPrice) && floatval($strPrice) > 0) {
            return floatval($strPrice);
        }
    
        if (!is_string($strPrice)) return 0;
    
        $cleanStr = str_replace(array(',', '.'), '', $strPrice);
        $floatNum = floatval($cleanStr);
    
        return $floatNum;
    }

    public static function removeSpecialsCharacterFromString($str)
    {
        return strtolower(preg_replace('/[^\w]/', '', $str));
    }

    public static function calculatePercentage($count, $total)
    {
        return $total != 0 ? round(($count / max($total, 1)) * 100) : 0;
    }
}
