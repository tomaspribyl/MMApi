<?php

namespace MMApi;

use MMApi\Exceptions\DeviceNotFoundException;

class DeviceLocator
{
	/**
	 * @var string[]
	 */
	private array $namespaces = [];

	public function addNamespacePrefix(string $namespace): void
	{
		$this->namespaces[] = $namespace;
	}

	/**
	 * @param string $device
	 * @return string
	 * @throws DeviceNotFoundException
	 */
	public function getDeviceClass(string $device): string
	{
		$namespaces = array_merge($this->namespaces, ['MMApi\Devices\\']);
		foreach ($namespaces as $namespace) {
			$deviceClass = $namespace . $device;
			if(class_exists($deviceClass)) {
				return $deviceClass;
			}
		}

		throw new DeviceNotFoundException(sprintf('Class for device %s not found', $device));
	}
}