<?php

namespace MMApi;

class Processor
{
	protected DeviceLocator $deviceLocator;

	/**
	 * @param DeviceLocator $deviceLocator
	 */
	public function __construct(DeviceLocator $deviceLocator)
	{
		$this->deviceLocator = $deviceLocator;
	}

	/**
	 * @param string $data
	 * @return string
	 * @throws Exceptions\DeviceNotFoundException
	 */
	public function process(string $data): string
	{
		$data = explode(';', $data);
		$base = array_slice($data, 0, 8);

		$date = (new \DateTimeImmutable())
			->setDate($base[0] + 2000, $base[1], $base[2])
			->setTime($base[3], $base[4], $base[5], $base[6]);

		$values = array_slice($data, 9);

		$deviceName = strtoupper(str_replace('-', '', $base[7]));

		$device = new ($this->deviceLocator->getDeviceClass($deviceName));
		foreach ($device as $signal) {
			echo $signal->getName() . ' ' . $signal->calculate($values) . ' ' . '<br>';
		}
	}
}