<?php

declare(strict_types=1);

namespace cosmicpe\form\entries\custom;

final class InputEntry implements CustomFormEntry{

	/** @var string */
	private $title;

	/** @var string|null */
	private $placeholder;

	/** @var string|null */
	private $default;

	public function __construct(string $title, ?string $placeholder = null, ?string $default = null){
		$this->title = $title;
		$this->placeholder = $placeholder;
		$this->default = $default;
	}

	public function getPlaceholder() : ?string{
		return $this->placeholder;
	}

	public function getDefault() : ?string{
		return $this->default;
	}

	public function jsonSerialize() : array{
		return [
			"type" => "input",
			"text" => $this->title,
			"placeholder" => $this->placeholder ?? "",
			"default" => $this->default ?? ""
		];
	}
}