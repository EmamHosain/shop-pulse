<?php
namespace App\Helper;


class DateHelper
{

    public static function getFormatDate($dateTime, $format = 'd-m-Y, h:i:s A')
    {
        try {
            // Create a DateTime object in UTC timezone
            $date = new \DateTime($dateTime, new \DateTimeZone('UTC'));

            // Convert the DateTime object to Asia/Dhaka timezone
            $date->setTimezone(new \DateTimeZone('Asia/Dhaka'));

            // Return the formatted date in Asia/Dhaka timezone
            return $date->format($format);
        } catch (\Exception $e) {
            // Handle any exceptions and return an error message or throw the exception
            throw new \Exception('Error formatting date: ' . $e->getMessage());
        }
    }
}