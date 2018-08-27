<?php

namespace RedCraftPE;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\utils\TextFormat;
use pocketmine\inventory\PlayerInventory;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\Server;

class AutoInventory extends PluginBase implements Listener {

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
    $blockName = $event->getBlock()->getName();
    $blockBroken = $event->getBlock();
    $blockID = $blockBroken->getID();
    $blockDamage = $blockBroken->getDamage();
    $item = Item::get($blockID, $blockDamage, 1);
    
    $event->setDrops(null);
    $player->getInventory()->addItem($item);

  }

}
