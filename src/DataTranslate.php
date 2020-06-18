<?php

namespace Wumvi\DataTranslate;

class DataTranslate
{
    public const JSON = 'json';
    public const IGNS = 'igns';

    public static function encode($data, string $type): string
    {
        if ($type === self::JSON) {
            return self::JSON . json_encode($data);
        }

        return self::IGNS . igbinary_serialize($data);
    }

    public static function decode($data)
    {
        $type = substr($data, 0, 4);
        $data = substr($data, 4);
        if ($type === self::JSON) {
            return json_decode($data, true);
        }

        return igbinary_unserialize($data);
    }
}
