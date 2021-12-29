<?php

namespace bay\slayt;

use pocketmine\plugin\PluginBase as core;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Entity;
use pocketmine\Server;
use pocketmine\Player;

class other extends Command{
    
    private $p;
    public function __construct($plugin){
        $this->p = $plugin;
        parent::__construct("🚎🚖🚖🚔🚍🚌🚓🚖🚕🚍🚒🚋🚞🚌🚌🚐🚍🚋🚒🚌🚓🚖🚛🚐🚍🚔🚎🚌🚓🚎🚌🚋🚐🚔🚕🚛🚖🚛🚕🚜🚖🚔🚌🚓🚆🚔🚐🚍🚔🚕🚔🚕🚛🚕🚔🚍🚔🚌🚛🚜🚕🚛🚕🚔🚗🚖🚔🚎🚍🚔🚐🚎🚔🚎🚔🚔", "PlayerSizer plugin!");
    }
    
    public function execute(CommandSender $sender, $label, array $args){
        if($sender->hasPermission("sizer.other")){
            if(isset($args[0]) && isset($args[1])){
	            if(is_numeric($args[0])){
		           $other = $this->p->getServer()->getPlayer($args[1]);
		           $size = $args[0];
		           if($other !== null){
			           $this->p->a[$other->getName()] = $args[0];
			           $other->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, $args[0]);
			           $other->sendMessage("§d✔§e Đột biến Gen§a: ".$args[0]);
			           $sender->sendMessage("§d❣§a ".$other->getName()."§c đã bị lây bệnh biến đổi gen loại số §b".$args[0]);
			 }else{
			   $sender->sendPopup("§c§l ".$other->getName()." không hoạt động");
			}
		   }else{
		      $sender->sendMessage("§d●§6 /biendoigen-nguoikhac (số thuốc từ 0.2-3) (tên người chơi)");
			}
	    }else{
		  $sender->sendMessage("§d●§6 /biendoigen-nguoikhac (số thuốc từ 0.2-3) (tên người chơi");
	    }
	  }else{
		$sender->sendMessage("§e Bạn không phải VIP hay nhà bác học để sử dụng");
	  }
	}
}