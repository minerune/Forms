<?php

declare(strict_types=1);

namespace cosmicpe\form\entries\custom;

use cosmicpe\form\entries\ModifyableEntry;

final class ToggleEntry implements CustomFormEntry, ModifyableEntry{

	/** @var string */
	private $title;

	/** @var bool */
	private $default;

	public function __construct(string $title, bool $default = false){
		$this->title = $title;
		$this->default = $default;
	}

	public function getValue() : bool{
		return $this->default;
	}

	public function setValue($value) : void{
		$this->default = $value;
	}

	public function jsonSerialize() : array{
		return [
			"type" => "toggle",
			"text" => $this->title,
			"default" => $this->default
		];
	}
}