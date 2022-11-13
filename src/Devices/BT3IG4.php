<?php

namespace MMApi\Devices;

use MMApi\Details\Signal;
use MMApi\Exceptions\SignalExistsException;

class BT3IG4 extends BaseDevice
{
	public const NAME = 'BT3-IG4';

	/**
	 * @throws SignalExistsException
	 */
	public function __construct()
	{
		$this->addSignal(1, new Signal('State 1', function ($data) {
			return $data[0];
		}));

		$this->addSignal(2, new Signal('State 2', function ($data) {
			return $data[1];
		}));

		$this->addSignal(3, new Signal('State 3', function ($data) {
			return $data[2];
		}));

		$this->addSignal(4, new Signal('State 4', function ($data) {
			return $data[3];
		}));

		$this->addSignal(5, new Signal('Impulses 1', function ($data) {
			return $data[5] + $data[6] * 256 + $data[7] * 65536 + $data[8] * 16777216;
		} ,'imp'));

		$this->addSignal(6, new Signal('Impulses 2', function ($data) {
			return $data[9] + $data[10] * 256 + $data[11] * 65536 + $data[12] * 16777216;
		} ,'imp'));

		$this->addSignal(7, new Signal('Impulses 3', function ($data) {
			return $data[13] + $data[14] * 256 + $data[15] * 65536 + $data[16] * 16777216;
		} ,'imp'));

		$this->addSignal(8, new Signal('Impulses 4', function ($data) {
			return $data[18] + $data[19] * 256 + $data[20] * 65536 + $data[21] * 16777216;
		} ,'imp'));

		$this->addSignal(9, new Signal('OPT max', function ($data) {
			return $data[30];
		}));

		$this->addSignal(10, new Signal('OPT min', function ($data) {
			return $data[31];
		}));

		$this->addSignal(11, new Signal('Battery', function ($data) {
			return $data[32] * 3.3 * 320 / 256 / 100;
		}));

		$this->addSignal(12, new Signal('Upload', function ($data) {
			return $data[33] * 4;
		}));
	}

	public function getName(): string
	{
		return self::NAME;
	}
}