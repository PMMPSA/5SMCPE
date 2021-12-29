<?php

namespace bay\slayt;

use pocketmine\plugin\PluginBase as core;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Entity;
use pocketmine\Server;
use pocketmine\Player;

class sizer extends Command{
    
    private $p;
    public function __construct($plugin){
        $this->p = $plugin;
        parent::__construct("size", "PlayerSizer plugin!");
    }
    
    public function execute(CommandSender $sender, $label, array $args){
        if($sender->hasPermission("sizer.".$args[0])){
            if(isset($args[0])){
                if(is_numeric($args[0]) && $args[0] <= 5){
                    $this->p->a[$sender->getName()] = $args[0];
                    $sender->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, $args[0]);
                    $sender->sendMessage("§aSize của bạn hiện tại là: ".$args[0]);
                }elseif($args[0] == "reset"){
                    if(!empty($this->p->a[$sender->getName()])){
                        unset($this->p->a[$sender->getName()]);
                        $sender->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, 1);
                    }else{
                        $sender->sendMessage("§aSize của bạn đã được đưa về mặc định");
                    }
                }else{
                    $sender->sendMessage("§r§c•§e /size 1->5§a để thay đổi size của bạn\n§c•§e /size reset§a để size trở về ban đầu");
                }
            }else{
                    $sender->sendMessage("§r§c•§e /size 1->5§a để thay đổi size của bạn\n§c•§e /size reset§a để size trở về ban đầu");
          }
	  }else{
                    $sender->sendMessage("§r§c•§e /size 1->5§a để thay đổi size của bạn\n§c•§e /size reset§a để size trở về ban đầu");
	}
  }
}