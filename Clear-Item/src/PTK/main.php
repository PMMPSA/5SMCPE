<?php


namespace PTK;
use pocketmine\event\player\{PlayerInteractEvent, PlayerJoinEvent};
use pocketmine\utils\TextFormat as TF;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\level\sound\ExpPickupSound;
use pocketmine\level\sound\EndermanTeleportSound;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;

class main extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
    if(!$sender instanceof Player) return;
    switch(strtolower($cmd->getName())){
      case "trash":
       if($sender->hasPermission("trash")){
          $item = $sender->getInventory()->getItemInHand();
          $sender->sendMessage("§dBạn đã xóa§a item§b trên tay");
          $sender->getInventory()->removeItem($item);
          $sender->getLevel()->addSound(new EndermanTeleportSound($sender), [$sender]);
  }else{
      $sender->sendMessage("§cDu hast keine Erlaubnis um dein Item umzubennen!");
  }
  break;
    }
  }
}//ende