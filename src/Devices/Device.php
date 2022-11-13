<?php

namespace MMApi\Devices;

use MMApi\Details\Signal;

interface Device
{
	function getName(): string;
	function getSignal(int $signal): Signal;
}