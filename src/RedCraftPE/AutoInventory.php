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

    $drops = $event->getDrops();
    $itemID = $event->getBlock()->getID();
    $itemDamage = $event->getBlock()->getDamage();
    
    foreach($drops as $drop) {
      $event->getPlayer()->getInventory()->addItem($drop);
    }
   
    $event->setDrops([]);

  }

}
