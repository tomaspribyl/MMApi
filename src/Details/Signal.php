<?php

namespace MMApi\Details;

class Signal
{
	/**
	 * @var string
	 */
	private string $name;
	/**
	 * @var string
	 */
	private string $unit;
	/**
	 * @var int
	 */
	private int $fixedNum;
	/**
	 * @var int
	 */
	private int $firstByte = 0;
	/**
	 * @var int
	 */
	private int $high = 0;
	/**
	 * @var int
	 */
	private int $low = 0;
	/**
	 * @var callable
	 */
	private $calc;

	/**
	 * @param string $name
	 * @param callable $calc
	 * @param string $unit
	 * @param int $fixedNum
	 */
	public function __construct(string $name, callable $calc, string $unit = "", int $fixedNum = 255)
	{
		$this->name = $name;
		$this->calc = $calc;
		$this->unit = $unit;
		$this->fixedNum = $fixedNum;
	}


	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	public function calculate(array $data): float
	{
		return (float)call_user_func_array($this->calc, [$data]);
	}

	public function getValue(): float
	{

	}

	/**
	 * @return string
	 */
	public function getUnit(): string
	{
		return $this->unit;
	}

	/**
	 * @return int
	 */
	public function getFixedNum(): int
	{
		return $this->fixedNum;
	}

	/**
	 * @return int
	 */
	public function getFirstByte(): int
	{
		return $this->firstByte;
	}

	/**
	 * @param int $firstByte
	 */
	public function setFirstByte(int $firstByte): void
	{
		$this->firstByte = $firstByte;
	}

	/**
	 * @return int
	 */
	public function getHigh(): int
	{
		return $this->high;
	}

	/**
	 * @param int $high
	 */
	public function setHigh(int $high): void
	{
		$this->high = $high;
	}

	/**
	 * @return int
	 */
	public function getLow(): int
	{
		return $this->low;
	}

	/**
	 * @param int $low
	 */
	public function setLow(int $low): void
	{
		$this->low = $low;
	}
}