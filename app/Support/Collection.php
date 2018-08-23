<?php

namespace App\Support;

use IteratorAggregate;
use ArrayIterator;
use JsonSerializable;

class Collection implements IteratorAggregate, JsonSerializable
{
	protected $items = [];

	public function __construct(array $items=[] )
	{
		$this->items = $items;
	}

	public function get()
	{
		return $this->items;
	}

	public function getCount()
	{
		return sizeof($this->items);
	}

	public function getIterator()
	{
		return new ArrayIterator($this->items);
	}

	public function toJson()
	{
		return json_encode($this->items);
	}

	public function jsonSerialize()
	{
		return  $this->items;
	}
}
