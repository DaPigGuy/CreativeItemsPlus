<?php

namespace MCPEPIG\CreativeItemsPlus;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
  public function onEnable(){
    @mkdir($this->getServer()->getDataPath() . "/plugins/CreativeItemsPlus/");
    $this->creativeItemsPlus = (new Config($this->getDataFolder()."config.yml", Config::YAML, array(
      "items-added" => array(
         276 => 0
      ),
      "items-removed" => array(
         267 => 0
      ),
    )));
    foreach($this->creativeItemsPlus->get("items-added") as $aitem => $damagevalue){
      Item::addCreativeItem(Item::get($aitem, $damagevalue));      
    }
    foreach($this->creativeItemsPlus->get("items-removed") as $ritem => $damagevalue){
      Item::removeCreativeItem(Item::get($ritem, $damagevalue));   
    }
    $this->getLogger()->info("§aCreativeItemsPlus by MCPEPIG loaded.");
  }
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
  }
}
