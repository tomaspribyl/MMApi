<?php

require 'vendor/autoload.php';

$data = '19;06;24;11;46;00;0083951644;SE1-PM4;000;000;000;000;000;000;000;000;180;188;011;000;163;000;033;000;115;231;002;000;000;000;000;000;000;000;000;000;000;000;000;000;000;000;';
$data = '22;11;13;12;00;00;0001000222;BT3-IG4;000;001;001;001;001;000;000;000;000;000;000;000;000;000;000;000;000;000;000;231;128;007;000;000;000;000;000;000;000;000;000;245;003;137;010;000;000;000;';

$processor = new \MMApi\Processor(new \MMApi\DeviceLocator());

$processor->process($data);