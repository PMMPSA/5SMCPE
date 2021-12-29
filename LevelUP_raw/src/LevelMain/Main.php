<?php
namespace LevelMain;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use onebone\economyapi\EconomyAPI;

class Main extends PluginBase implements Listener {


    public function onEnable() {
        @mkdir($this->getDataFolder());
        @mkdir($this->getDataFolder()."lp/");
        $this->getLogger()->info("
          §7§l=[ §r§a================================================================================== §7§l]=

          §a                                █    ████  █   █  █████  █       
                                            █    █      █ █   █      █       
                                            █    ███    █ █   ███    █       §f§lUP
                                             ███  ████    █    █████  ███      

          §7§l=[ §r§a================================================================================== §7§l]=

                                 §eThanks Ziken and AlbanWeill for this amazing plugin
                  ");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		$config = new Config($this->getDataFolder()."lp/".strtolower($sender->getName()).".yml", Config::YAML);
        $n = $sender->getName();
		if($cmd->getName() == "▶🖐🖐▶↔⚙▶⚙🖖💪🖖💪🖖💪⚙▶㊗⚙▶⚙㊗⚙㊗⚙▶"){
        $sender->sendMessage("§c<§e========§dLevel§e========§c>");
        $sender->sendMessage("§bLevel:§7 ".$config->get('level'));
        $sender->sendMessage("§bĐKN:§7 ".$config->get('xp')."§9/". $config->get('level')*50);
        $sender->sendMessage("§e================================================");
		}
		if($cmd->getName() == "◀⚔◀⚙◀⚙🤘🤘🈷🈷👉🈷☣☣"){
			if($sender->isOP()){
			if(is_numeric($args[0])){
				$sender->sendMessage("§e".$args[0]." ĐKN§a đã được thêm vào level của bạn");
		        $config->set('xp', $config->get('xp')+$args[0]);
		        $config->save();
			}
			else{
				$sender->sendMessage("§cĐKN phải là số!");
				return true;
			}
		}
		}
		if($cmd->getName() == "➡💪➡💪➡✴➡✌✴🉐✴🉐✴➡💪◀❣"){
			if(is_numeric($args[0])){
				if(EconomyAPI::getInstance()->myMoney($sender) >= $args[0] * 100){
					EconomyAPI::getInstance()->reduceMoney($sender, $args[0] * 100);
		            $sender->sendMessage("§aBạn đã mua §e".$args[0]." ĐKN§a thành công");
		            $config->set('xp', $config->get('xp')+$args[0]);
		            $config->save();
		            return true;
				}
				else{
		            $sender->sendMessage("§cBạn không đủ§f Bạc§c để mua §b$args[0] §eĐKN");
				}
			}
			else{
				$sender->sendMessage("§cĐKN phải là số!");
			}
		}
	}

    public function onJoin(PlayerJoinEvent $event){
        $config = new Config($this->getDataFolder()."lp/".strtolower($event->getPlayer()->getName()).".yml", Config::YAML);
        $config->save();
        if($config->get('xp') > 0){
        } else {
            $config->set('level', 1);
            $config->save();
        }
    }
	public function onChat(PlayerChatEvent $event){
		$config = new Config($this->getDataFolder()."lp/".strtolower($event->getPlayer()->getName()).".yml", Config::YAML);
        $config->save();
		$p = $event->getPlayer();
		$n = $p->getName();
		$p->setDisplayName("§a❖§eLv:§c". $config->get('level')."§a❖§r" .$n);
	}
    public function onMove(PlayerMoveEvent $event){
        $config = new Config($this->getDataFolder()."lp/".strtolower($event->getPlayer()->getName()).".yml", Config::YAML);
        $p = $event->getPlayer();
        $n = $p->getName();
       if($config->get('level') <= 100){
           if($config->get('xp') >= $config->get('level')*37 ){
               $config->set('xp',1);
               $config->set('level',$config->get('level') + 1);
			   $p->setMaxHealth($config->get('level') + 5);
			   $p->setHealth($config->get('level') + 5);
               Server::GetInstance()->broadcastMessage("§6Người chơi§b ".$n."§6 đã lên cấp §a".$config->get('level'));
               $config->save();
           }
       }
    }

    public function onBlockBreak(BlockBreakEvent $event){
        $config = new Config($this->getDataFolder()."lp/".strtolower($event->getPlayer()->getName()).".yml", Config::YAML);
        $b = $event->getBlock()->getId();
        if($b == 56 or $b == 14 or $b == 15 or $b == 16 or $b == 73 or $b == 21){
       if($config->get('level') <= 150){
		   $chang = mt_rand(1,5);
		   switch ($chang){
			   case 1:
               $config->set('xp',$config->get('xp')+1);
               $event->getPlayer()->sendPopup("§c★§b Exp§6:§d ".$config->get('xp')."§b/§d". $config->get('level')*37 ." \n\n\n");
               $config->save();
			   break;
			   case 2:
			   $config->set('xp',$config->get('xp')+1);
               $event->getPlayer()->sendPopup("§c★§b Exp§6:§d ".$config->get('xp')."§b/§d". $config->get('level')*37 ." \n\n\n");
			   $config->save();
			   break;
			   case 3:
			   $config->set('xp',$config->get('xp')+1);
               $event->getPlayer()->sendPopup("§c★§b Exp§6:§d ".$config->get('xp')."§b/§d". $config->get('level')*37 ." \n\n\n");
			   $config->save();
			   break;
			   case 4:
			   $config->set('xp',$config->get('xp')+1);
               $event->getPlayer()->sendPopup("§c★§b Exp§6:§d ".$config->get('xp')."§b/§d". $config->get('level')*37 ." \n\n\n");
			   $config->save();
			   break;
			   case 5:
			   $config->set('xp',$config->get('xp')+1);
               $event->getPlayer()->sendPopup("§c★§b Exp§6:§d ".$config->get('xp')."§b/§d". $config->get('level')*37 ." \n\n\n");
			   $config->save();
			   break;
		   }
        }
    }
	}
	public function onPlayerDeath(PlayerDeathEvent $event) {
		$config = new Config($this->getDataFolder()."lp/".strtolower($event->getPlayer()->getName()).".yml", Config::YAML);
        $ev = $event->getEntity()->getLastDamageCause();
        if ($ev instanceof EntityDamageByEntityEvent) {
            $killer = $ev->getDamager();
            if ($killer instanceof Player){
                if($config->get('level') <= 150){
					$config->set('xp', $config->get('xp')+10);
					$event->getPlayer()->sendMessage("§b§l+10§e ĐKN§a hạ gục");
					$config->save();
				}
            }
        }
    }
}