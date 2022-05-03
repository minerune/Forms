<?php

declare(strict_types=1);

namespace cosmicpe\form\types;

use JsonSerializable;

final class Icon implements JsonSerializable{

	public const URL = "url";
	public const PATH = "path";

	private string $data;
	private string $type;

	public function __construct(string $data, string $type = self::PATH){
		$this->data = $data;
		$this->type = $type;
	}

	public function jsonSerialize() : array{
		return [
			"type" => $this->type,
			"data" => $this->data
		];
	}
}