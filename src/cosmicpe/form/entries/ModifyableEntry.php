<?php

declare(strict_types=1);

namespace cosmicpe\form\entries;

interface ModifyableEntry{

	public function getValue();

	public function setValue($value) : void;
}