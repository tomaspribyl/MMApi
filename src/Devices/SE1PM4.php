<?php

namespace MMApi\Devices;

use MMApi\Details\Signal;
use MMApi\Exceptions\SignalExistsException;

class SE1PM4 extends BaseDevice
{
	public const NAME = 'SE1-PM4';

	/**
	 * @throws SignalExistsException
	 */
	public function __construct()
	{
		$this->addSignal(1, new Signal('Power 1', function ($data) {
			return ($data[0] + $data[1] * 256) / 10;
		} ,'W'));

		$this->addSignal(2, new Signal('Power 2', function ($data) {
			return ($data[2] + $data[3] * 256) / 10;
		} ,'W'));

		$this->addSignal(3, new Signal('Power 3', function ($data) {
			return ($data[4] + $data[5] * 256) / 10;
		} ,'W'));

		$this->addSignal(4, new Signal('Energy 1 T1', function ($data) {
			return ($data[7] + $data[8] * 256 + $data[9] * 65536 + $data[10] * 16777216) / 10000;
		} ,'kWh'));

		$this->addSignal(5, new Signal('Energy 2 T1', function ($data) {
			return ($data[11] + $data[12] * 256 + $data[13] * 65536 + $data[14] * 16777216) / 10000;
		} ,'kWh'));

		$this->addSignal(6, new Signal('Energy 3 T1', function ($data) {
			return ($data[15] + $data[16] * 256 + $data[17] * 65536 + $data[18] * 16777216) / 10000;
		} ,'kWh'));

		$this->addSignal(7, new Signal('Energy 1 T2', function ($data) {
			return ($data[20] + $data[21] * 256 + $data[22] * 65536 + $data[23] * 16777216) / 10000;
		} ,'kWh'));

		$this->addSignal(8, new Signal('Energy 2 T2', function ($data) {
			return ($data[24] + $data[25] * 256 + $data[26] * 65536 + $data[27] * 16777216) / 10000;
		} ,'kWh'));

		$this->addSignal(9, new Signal('Energy 3 T2', function ($data) {
			return ($data[28] + $data[29] * 256 + $data[30] * 65536 + $data[31] * 16777216) / 10000;
		} ,'kWh'));

		$this->addSignal(10, new Signal('Tariff', function ($data) {
			return $data[32];
		}));

		$this->addSignal(11, new Signal('Power', function ($data) {
			return ($data[4] + $data[5] * 256) / 10
				+ ($data[2] + $data[3] * 256) / 10
				+ ($data[0] + $data[1] * 256) / 10;
		} ,'W'));

		$this->addSignal(12, new Signal('Energy T1', function ($data) {
			return ($data[15] + $data[16] * 256 + $data[17] * 65536 + $data[18] * 16777216) / 10000
				+ ($data[11] + $data[12] * 256 + $data[13] * 65536 + $data[14] * 16777216) / 10000
				+ ($data[7] + $data[8] * 256 + $data[9] * 65536 + $data[10] * 16777216) / 10000;
		} ,'kWh'));

		$this->addSignal(13, new Signal('Energy T2', function ($data) {
			return ($data[28] + $data[29] * 256 + $data[30] * 65536 + $data[31] * 16777216) / 10000
				+ ($data[24] + $data[25] * 256 + $data[26] * 65536 + $data[27] * 16777216) / 10000
				+ ($data[20] + $data[21] * 256 + $data[22] * 65536 + $data[23] * 16777216) / 10000;
		} ,'kWh'));
	}

	public function getName(): string
	{
		return self::NAME;
	}
}