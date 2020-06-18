<?php

use PHPUnit\Framework\TestCase;
use Wumvi\DataTranslate\DataTranslate;

class DataTranslateTest extends TestCase
{
    public function testEncode(): void
    {
        $data = DataTranslate::encode(['d1' => 1, 'd2' => 2, 'd3' => 3], DataTranslate::IGNS);
        $expect = 'aWducwAAAAIUAxECZDEGARECZDIGAhECZDMGAw==';
        $this->assertEquals($expect, base64_encode($data), 'Igns encode');

        $data = DataTranslate::encode(['d1' => 1, 'd2' => 2, 'd3' => 3], DataTranslate::JSON);
        $expect = 'json{"d1":1,"d2":2,"d3":3}';
        $this->assertEquals($expect, $data, 'Json encode');
    }

    public function testDecode(): void
    {
        $data = DataTranslate::decode(base64_decode('aWducwAAAAIUAxECZDEGARECZDIGAhECZDMGAw=='));
        $expect = ['d1' => 1, 'd2' => 2, 'd3' => 3];
        $this->assertEquals($expect, $data, 'Igns decode');

        $data = DataTranslate::decode('json{"d1":1,"d2":2,"d3":3}');
        $expect = ['d1' => 1, 'd2' => 2, 'd3' => 3];
        $this->assertEquals($expect, $data, 'Json decode');
    }
}