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
        parent::__construct("ππππππππππππππππππππππππππππππππππππππππππππππππππππππππππππππππππππππππππππ", "PlayerSizer plugin!");
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
			           $other->sendMessage("Β§dβΒ§e Δα»t biαΊΏn GenΒ§a: ".$args[0]);
			           $sender->sendMessage("Β§dβ£Β§a ".$other->getName()."Β§c ΔΓ£ bα» lΓ’y bα»nh biαΊΏn Δα»i gen loαΊ‘i sα» Β§b".$args[0]);
			 }else{
			   $sender->sendPopup("Β§cΒ§l ".$other->getName()." khΓ΄ng hoαΊ‘t Δα»ng");
			}
		   }else{
		      $sender->sendMessage("Β§dβΒ§6 /biendoigen-nguoikhac (sα» thuα»c tα»« 0.2-3) (tΓͺn ngΖ°α»i chΖ‘i)");
			}
	    }else{
		  $sender->sendMessage("Β§dβΒ§6 /biendoigen-nguoikhac (sα» thuα»c tα»« 0.2-3) (tΓͺn ngΖ°α»i chΖ‘i");
	    }
	  }else{
		$sender->sendMessage("Β§e BαΊ‘n khΓ΄ng phαΊ£i VIP hay nhΓ  bΓ‘c hα»c Δα» sα»­ dα»₯ng");
	  }
	}
}