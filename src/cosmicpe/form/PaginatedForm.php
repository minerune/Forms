<?php

declare(strict_types=1);

namespace cosmicpe\form;

use cosmicpe\form\entries\simple\Button;
use cosmicpe\form\types\Icon;
use pocketmine\player\Player;

abstract class PaginatedForm extends SimpleForm{

	protected int $current_page;

	public function __construct(string $title, ?string $content = null, int $current_page = 1){
		parent::__construct($title, $content);
		$this->current_page = $current_page;

		$this->populatePage();
		$pages = $this->getPages();
		if($this->current_page === 1){
			if($pages > 1){
				$this->addButton($this->getNextButton(), function(Player $player, int $data) : void{ $this->sendNextPage($player); });
			}
		}else{
			$this->addButton($this->getPreviousButton(), function(Player $player, int $data) : void{ $this->sendPreviousPage($player); });
			if($this->current_page < $pages){
				$this->addButton($this->getNextButton(), function(Player $player, int $data) : void{ $this->sendNextPage($player); });
			}
		}
	}

	protected function getPreviousButton() : Button{
		return new Button("Предыдущая страница", Icon::path("textures/items/paper"));
	}

	protected function getNextButton() : Button{
		return new Button("Следующая страница", Icon::path("textures/items/paper"));
	}

	abstract protected function getPages() : int;

	abstract protected function populatePage() : void;

	abstract protected function sendPreviousPage(Player $player) : void;

	abstract protected function sendNextPage(Player $player) : void;
}