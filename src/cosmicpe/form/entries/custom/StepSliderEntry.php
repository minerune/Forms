<?php

declare(strict_types=1);

namespace cosmicpe\form\entries\custom;

use ArgumentCountError;
use cosmicpe\form\entries\ModifyableEntry;
use Ds\Set;

final class StepSliderEntry implements CustomFormEntry, ModifyableEntry{

	/** @var string */
	private $title;

	/** @var Set<string> */
	private $steps;

	/** @var int */
	private $default = 0;

	public function __construct(string $title, string ...$steps){
		$this->title = $title;
		$this->steps = new Set($steps);
	}

	public function getValue() : string{
		return $this->steps[$this->default];
	}

	public function setValue($value) : void{
		$this->setDefault($value);
	}

	public function setDefault(string $default_step) : void{
		foreach($this->steps as $index => $step){
			if($step === $default_step){
				$this->default = $index;
				return;
			}
		}

		throw new ArgumentCountError("Step \"" . $default_step . "\" does not exist!");
	}

	public function jsonSerialize() : array {
		return [
			"type" => "step_slider",
			"text" => $this->title,
			"steps" => $this->steps,
			"default" => $this->default
		];
	}
}