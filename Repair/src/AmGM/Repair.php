<?php

namespace AmGM;

 use pocketmine\plugin\PluginBase;
 use pocketmine\{command\Command, command\CommandSender};
 use pocketmine\item\Item;
 use pocketmine\utils\TextFormat as __;

class Repair extends PluginBase {

  public function onEnable() {
$this->getLogger()->info("§bĐã Bật");
   }
  public function onDisable() {
   $this->getLogger()->info("§cĐã Tắt");
  }
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
switch($cmd->getName()) {

 case "hand-fix":
 $inventory = $sender->getInventory();
 $item = $inventory->getItemInHand();
 $item->setDamage(0);
 $item->setLore(array("§r§fĐã được fix"));
 $inventory->setItemInHand($item);
 $sender->sendMessage("§e•>§d Bạn đã được sửa đồ trên tay");
  break;
    }
  }
}