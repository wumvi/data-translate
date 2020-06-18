<?php

use Wumvi\DataTranslate\DataTranslate;

include './vendor/autoload.php';

$data = DataTranslate::encode(['d1' => 1, 'd2' => 2, 'd3' => 3], DataTranslate::JSON);
var_dump($data);

// var_dump(DataTranslate::from($data));
