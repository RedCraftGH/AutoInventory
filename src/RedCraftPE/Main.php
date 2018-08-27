<?php

namespace RedCraftPE;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\utils\TextFormat;
use pocketmine\inventory\PlayerInventory;

class Main extends PluginBase implements Listener {

  public $prefix = TextFormat::YELLOW . "Cube" . TextFormat::BLUE . "X" . TextFormat::GOLD . " > ";

  public function onLoad() : void {

    $this->getLogger()->info(TextFormat::RED . "MyPlugin is now loaded!");

  }

  public function onEnable() : void {

    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info(TextFormat::RED . "MyPlugin is now enabled!");

  }

  public function onDisable() : void {

    $this->getLogger()->info(TextFormat::RED . "MyPlugin is now disabled!");

  }

  public function onBreak(BlockBreakEvent $event) {

    $player = $event->getPlayer();
    $blockBroken = $event->getBlock()->getName();

    $player->sendMessage(TextFormat::RED . $player->getDisplayName() . TextFormat::WHITE . " has broken " . strtolower($blockBroken));

    return true;

  }

}
