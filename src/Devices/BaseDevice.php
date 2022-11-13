<?php

namespace MMApi\Devices;

use MMApi\Details\Signal;
use MMApi\Exceptions\SignalExistsException;
use MMApi\Exceptions\SignalNotExistsException;

abstract class BaseDevice implements Device, \Iterator
{
	/**
	 * @var Signal[]
	 */
	private array $signals = [];

	private int $pointer = 0;

	/**
	 * @param int $number
	 * @param Signal $signal
	 * @return void
	 * @throws SignalExistsException
	 */
	public function addSignal(int $number, Signal $signal): void
	{
		if(array_key_exists($number, $this->signals)) {
			throw new SignalExistsException(sprintf('Signal number %d exists!', $signal));
		}
		$this->signals[$number - 1] = $signal;
	}

	/**
	 * @param int $signal
	 * @return Signal
	 * @throws SignalNotExistsException
	 */
	public function getSignal(int $signal): Signal
	{
		if(!array_key_exists($signal, $this->signals)) {
			throw new SignalNotExistsException(sprintf('Signal number %d does not exists|', $signal));
		}

		return $this->signals[$signal - 1];
	}

	public function current(): Signal
	{
		return $this->signals[$this->pointer];
	}

	public function next(): void
	{
		$this->pointer++;
	}

	public function key(): int
	{
		return $this->pointer;
	}

	public function valid(): bool
	{
		return $this->pointer < count($this->signals);
	}

	public function rewind(): void
	{
		$this->pointer = 0;
	}
}