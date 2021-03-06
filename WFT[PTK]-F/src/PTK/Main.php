<?php
	
namespace PTK;

use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\utils\TextFormat as TF;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\level\particle\Particle;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\level\Position\getLevel;
use pocketmine\plugin\PluginManager;
use pocketmine\plugin\Plugin;
use pocketmine\math\Vector3;
use pocketmine\utils\config;
			
class Main extends PluginBase implements Listener{
    
    public function onEnable(){
	$this->saveDefaultConfig();
    	$this->getServer()->getPluginManager()->registerEvents($this ,$this);
        $this->getLogger()->info(TF::GREEN ."Plugin by BegforMercy Enabled!");
    }
    
    public function onDisable(){
    	$this->getLogger()->info(TF::RED ."Awww It got Disabled");
    }	
					
			public function onJoin(PlayerJoinEvent $event){
       $player = $event->getPlayer();
       $level = $player->getLevel();
       $cfg = new Config($this->getDataFolder() . "/config.yml", Config::YAML);
           $x1 = $cfg->get("Xs");
           $y1 = $cfg->get("Ys");
           $z1 = $cfg->get("Zs");
                $line1 = $cfg->get("LINE1");  
                $line2 = $cfg->get("LINE2"); 
                $line3 = $cfg->get("LINE3"); 
                $line4 = $cfg->get("LINE4"); 
                   $online = count(Server::getInstance()->getOnlinePlayers()); 
                $maxonline = $this->getServer()->getMaxPlayers();
               $playername = $player->getName();                                                  
              $rs = TF::RESET. "\n";
              $allline = $line1. $rs. $line2. $rs. $line3. $rs. $line4; 
              $allline = str_replace("{ONLINE}", $online, $allline);
              $allline = str_replace("{MAXONLINE}", $maxonline, $allline);
              $allline = str_replace("{PLAYERNAME}", $playername, $allline);
              $level->addparticle(new FloatingTextParticle(new Vector3($x1, $y1, $z1), $allline));
            
         }
          
}




