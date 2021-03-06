<?php

namespace System\Support\Faker\Provider;

defined('DS') or exit('No direct script access allowed.');

class Payment extends Base
{
    public static $expirationDateFormat = "m/y";
    protected static $cardVendors = [
        'Visa', 'Visa', 'Visa', 'Visa', 'Visa',
        'MasterCard', 'MasterCard', 'MasterCard', 'MasterCard', 'MasterCard',
        'American Express', 'Discover Card',
    ];

    protected static $cardParams = [
        'Visa' => [
            "4539########",
            "4539###########",
            "4556########",
            "4556###########",
            "4916########",
            "4916###########",
            "4532########",
            "4532###########",
            "4929########",
            "4929###########",
            "40240071####",
            "40240071#######",
            "4485########",
            "4485###########",
            "4716########",
            "4716###########",
            "4###########",
            "4##############",
        ],
        'MasterCard' => [
            "51#############",
            "52#############",
            "53#############",
            "54#############",
            "55#############",
        ],
        'American Express' => [
            "34############",
            "37############",
        ],
        'Discover Card' => [
            "6011###########",
        ],
    ];

    protected static $ibanFormats = [
        'AD' => ['n', 4],    ['n', 4],  ['c', 12],
        'AE' => ['n', 3],    ['n', 16],
        'AL' => ['n', 8],    ['c', 16],
        'AT' => ['n', 5],    ['n', 11],
        'AZ' => ['a', 4],    ['c', 20],
        'BA' => ['n', 3],    ['n', 3],  ['n', 8],  ['n', 2],
        'BE' => ['n', 3],    ['n', 7],  ['n', 2],
        'BG' => ['a', 4],    ['n', 4],  ['n', 2],  ['c', 8],
        'BH' => ['a', 4],    ['c', 14],
        'BR' => ['n', 8],    ['n', 5],  ['n', 10], ['a', 1],  ['c', 1],
        'CH' => ['n', 5],    ['c', 12],
        'CR' => ['n', 3],    ['n', 14],
        'CY' => ['n', 3],    ['n', 5],  ['c', 16],
        'CZ' => ['n', 4],    ['n', 6],  ['n', 10],
        'DE' => ['n', 8],    ['n', 10],
        'DK' => ['n', 4],    ['n', 9],  ['n', 1],
        'DO' => ['c', 4],    ['n', 20],
        'EE' => ['n', 2],    ['n', 2],  ['n', 11], ['n', 1],
        'ES' => ['n', 4],    ['n', 4],  ['n', 1],  ['n', 1],  ['n', 10],
        'FR' => ['n', 5],    ['n', 5],  ['c', 11], ['n', 2],
        'GB' => ['a', 4],    ['n', 6],  ['n', 8],
        'GE' => ['a', 2],    ['n', 16],
        'GI' => ['a', 4],    ['c', 15],
        'GR' => ['n', 3],    ['n', 4],  ['c', 16],
        'GT' => ['c', 4],    ['c', 20],
        'HR' => ['n', 7],    ['n', 10],
        'HU' => ['n', 3],    ['n', 4],  ['n', 1],  ['n', 15], ['n', 1],
        'IE' => ['a', 4],    ['n', 6],  ['n', 8],
        'IL' => ['n', 3],    ['n', 3],  ['n', 13],
        'IS' => ['n', 4],    ['n', 2],  ['n', 6],  ['n', 10],
        'IT' => ['a', 1],    ['n', 5],  ['n', 5],  ['c', 12],
        'KW' => ['a', 4],    ['c', 22],
        'KZ' => ['n', 3],    ['c', 13],
        'LB' => ['n', 4],    ['c', 20],
        'LI' => ['n', 5],    ['c', 12],
        'LT' => ['n', 5],    ['n', 11],
        'LU' => ['n', 3],    ['c', 13],
        'LV' => ['a', 4],    ['c', 13],
        'MC' => ['n', 5],    ['n', 5],  ['c', 11], ['n', 2],
        'MD' => ['c', 2],    ['c', 18],
        'ME' => ['n', 3],    ['n', 13], ['n', 2],
        'MK' => ['n', 3],    ['c', 10], ['n', 2],
        'MR' => ['n', 5],    ['n', 5],  ['n', 11], ['n', 2],
        'MT' => ['a', 4],    ['n', 5],  ['c', 18],
        'MU' => ['a', 4],    ['n', 2],  ['n', 2],  ['n', 12], ['n', 3],  ['a', 3],
        'NL' => ['a', 4],    ['n', 10],
        'NO' => ['n', 4],    ['n', 6],  ['n', 1],
        'PK' => ['a', 4],    ['c', 16],
        'PL' => ['n', 8],    ['n', 16],
        'PS' => ['a', 4],    ['c', 21],
        'PT' => ['n', 4],    ['n', 4],  ['n', 11], ['n', 2],
        'RO' => ['a', 4],    ['c', 16],
        'RS' => ['n', 3],    ['n', 13], ['n', 2],
        'SA' => ['n', 2],    ['c', 18],
        'SE' => ['n', 3],    ['n', 16], ['n', 1],
        'SI' => ['n', 5],    ['n', 8],  ['n', 2],
        'SK' => ['n', 4],    ['n', 6],  ['n', 10],
        'SM' => ['a', 1],    ['n', 5],  ['n', 5],  ['c', 12],
        'TN' => ['n', 2],    ['n', 3],  ['n', 13], ['n', 2],
        'TR' => ['n', 5],    ['c', 1],  ['c', 16],
        'VG' => ['a', 4],    ['n', 16],
    ];


    public static function creditCardType()
    {
        return static::randomElement(static::$cardVendors);
    }


    public static function creditCardNumber($type = null, $formatted = false, $separator = '-')
    {
        if (is_null($type)) {
            $type = static::creditCardType();
        }

        $mask = static::randomElement(static::$cardParams[$type]);
        $number = static::numerify($mask);
        $number .= Luhn::computeCheckDigit($number);

        if ($formatted) {
            $p1 = substr($number, 0, 4);
            $p2 = substr($number, 4, 4);
            $p3 = substr($number, 8, 4);
            $p4 = substr($number, 12);
            $number = $p1.$separator.$p2.$separator.$p3.$separator.$p4;
        }

        return $number;
    }

    /**
     * @param boolean $valid True (by default) to get a valid expiration date, false to get a maybe valid date
     * @return \DateTime
     * @example 04/13
     */
    public function creditCardExpirationDate($valid = true)
    {
        if ($valid) {
            return $this->generator->dateTimeBetween('now', '36 months');
        }

        return $this->generator->dateTimeBetween('-36 months', '36 months');
    }

    /**
     * @param boolean $valid                True (by default) to get a valid expiration date, false to get a maybe valid date
     * @param string  $expirationDateFormat
     * @return string
     * @example '04/13'
     */
    public function creditCardExpirationDateString($valid = true, $expirationDateFormat = null)
    {
        return $this->creditCardExpirationDate($valid)->format(is_null($expirationDateFormat) ? static::$expirationDateFormat : $expirationDateFormat);
    }

    /**
     * @param  boolean $valid True (by default) to get a valid expiration date, false to get a maybe valid date
     * @return array
     */
    public function creditCardDetails($valid = true)
    {
        $type = static::creditCardType();

        return array(
            'type'   => $type,
            'number' => static::creditCardNumber($type),
            'name'   => $this->generator->name(),
            'expirationDate' => $this->creditCardExpirationDateString($valid)
        );
    }

    /**
     * International Bank Account Number (IBAN)
     *
     * @link http://en.wikipedia.org/wiki/International_Bank_Account_Number
     * @param  string  $countryCode ISO 3166-1 alpha-2 country code
     * @param  string  $prefix      for generating bank account number of a specific bank
     * @param  integer $length      total length without country code and 2 check digits
     * @return string
     */
    protected static function iban($countryCode, $prefix = '', $length = null)
    {
        $countryCode = strtoupper($countryCode);
        $format = !isset(static::$ibanFormats[$countryCode]) ? array() : static::$ibanFormats[$countryCode];
        if ($length === null) {
            if ($format === null) {
                $length = 24;
            } else {
                $length = 0;
                foreach ($format as $part) {
                    list($class, $groupCount) = $part;
                    $length += $groupCount;
                }
            }
        }

        $result = $prefix;
        $length -= strlen($prefix);
        $nextPart = array_shift($format);
        if ($nextPart !== false) {
            list($class, $groupCount) = $nextPart;
        } else {
            $class = 'n';
            $groupCount = 0;
        }
        $groupCount = $nextPart === false ? 0 : $nextPart[1];
        for ($i = 0; $i < $length; $i++) {
            if ($nextPart !== false && $groupCount-- < 1) {
                $nextPart = array_shift($format);
                list($class, $groupCount) = $nextPart;
            }
            switch ($class) {
                default:
                case 'c':
                    $result .= (mt_rand(0, 100) <= 50)
                        ? static::randomDigit()
                        : strtoupper(static::randomLetter());
                    break;
                case 'a':
                    $result .= strtoupper(static::randomLetter());
                    break;
                case 'n':
                    $result .= static::randomDigit();
                    break;
            }
        }

        $result = static::addBankCodeChecksum($result, $countryCode);

        $countryNumber = 100 * (ord($countryCode[0]) - 55) + (ord($countryCode[1]) - 55);
        $tempResult = $result.$countryNumber.'00';
        
        $checksum = (int) $tempResult[0];

        for ($i = 1, $size = strlen($tempResult); $i < $size; $i++) {
            $checksum = (10 * $checksum + (int) $tempResult[$i]) % 97;
        }
        
        $checksum = 98 - $checksum;
        
        if ($checksum < 10) {
            $checksum = '0'.$checksum;
        }

        return $countryCode.$checksum.$result;
    }


    protected static function addBankCodeChecksum($iban, $countryCode = '')
    {
        return $iban;
    }

    
    public static function swiftBicNumber()
    {
        return self::regexify("^([A-Z]){4}([A-Z]){2}([0-9A-Z]){2}([0-9A-Z]{3})?$");
    }
}
