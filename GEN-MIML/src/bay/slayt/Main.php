<?php

namespace bay\slayt;

use pocketmine\plugin\PluginBase as core;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\entity\Entity;
use pocketmine\Server;
use pocketmine\Player;

class Main extends core implements Listener{
    
    public $a = array();
    public function onEnable(){
        $this->getLogger()->info("Loading...");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        $this->getServer()->getCommandMap()->register("dotbiengen", new sizer($this));
        $this->getServer()->getCommandMap()->register("dotbiengen", new other($this));
    }
    
    public function respawn(PlayerRespawnEvent $event){
        $player = $event->getPlayer();
        if(!empty($this->a[$player->getName()])){
            $size = $this->a[$player->getName()];
            $player->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, $size);
        }
    }
}

