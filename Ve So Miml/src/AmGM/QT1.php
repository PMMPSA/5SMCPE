<?php

namespace AmGM;

use pocketmine\utils\TextFormat as __;
use pocketmine\utils\Random;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use onebone\economyapi\EconomyAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\level\sound\AnvilUseSound;
use pocketmine\level\sound\ExpPickupSound;
use pocketmine\level\sound\PopSound;
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\level\sound\GhastSound;
use pocketmine\level\sound\EndermanTeleportSound;
class QT1 extends PluginBase {
	public $eco;
	
	public function onEnable(){
		$this->eco = EconomyAPI::getInstance();
		$this->getLogger()->info("§d Đã bật Plugin§6 vé số, [AMGM]");
	}
	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$player->getlevel()->addSound(new ExpPickupSound($player));                                                
	}
	public function onDeath(PlayerDeathEvent $event){
		$player = $event->getPlayer();
		$player->getlevel()->addSound(new GhastSound($player));
		$player->getlevel()->addSound(new ExpPickupSound($player));
	}
	public function onQuit(PlayerQuitEvent $event){
		$player = $event->getPlayer();
		$player->getlevel()->addSound(new ExpPickupSound($player));
	}
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
		
		if($cmd->getName() == "veso") {
			if($sender instanceof Player){
				$rand = mt_rand(1, 80);
				$sender->getLevel()->addSound(new AnvilUseSound($sender));
				if($this->eco->reduceMoney($sender->getName(), 10000)){
				switch($rand){
					case 1:
					$this->eco->addMoney($sender->getName(), 10000);
					$sender->sendMessage("§e•§d>§b Bạn đã trúng §610.000VNĐ");
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					break;
					case 18:
					$this->eco->addMoney($sender->getName(), 1000000);
					$sender->sendMessage("§e•§d>§b Bạn đã trúng §61.000.000VNĐ");
					$this->getServer()->broadcastMessage("§l§f⬛§c⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛§f⬛\n§r\n§aHôm nay:\n§d". $sender->getName() ."§b đã nhận§6 1.000.000VNĐ\n\n§a✔§f Giao dịch hoàn tất\n\n§a•§e Liên hệ tổng đài §b/veso\n\n§l§f⬛§c⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛§f⬛");
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					break;
					case 31:
					$this->eco->reduceMoney($sender->getName(), 100000);
					$sender->sendMessage("§e•§d>§b Bạn đã trúng §6100.000VNĐ");
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					break;
					case 45:
					$this->eco->reduceMoney($sender->getName(), 0);
					$sender->sendMessage("§e•§d>§b Bạn đã§6 không trúng giải");
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					break;
					case 50:
					$this->eco->reduceMoney($sender->getName(), 0);
					$sender->sendMessage("§e•§d>§b Bạn đã§6 không trúng giải");
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					break;
					case 55:
					$this->eco->reduceMoney($sender->getName(), 0);
					$sender->sendMessage("§e•§d>§b Bạn đã§6 không trúng giải");
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					case 65:
					$this->eco->reduceMoney($sender->getName(), 0);
					$sender->sendMessage("§e•§d>§b Bạn đã§6 không trúng giải");
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					case 70:
					$this->eco->reduceMoney($sender->getName(), 0);
					$sender->sendMessage("§e•§d>§b Bạn đã§6 không trúng giải");
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					case 75:
					$this->eco->reduceMoney($sender->getName(), 0);
					$sender->sendMessage("§e•§d>§b Bạn đã§6 không trúng giải");
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					case 80:
					$this->eco->reduceMoney($sender->getName(), 0);
					$sender->sendMessage("§e•§d>§b Bạn đã§6 không trúng giải");
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					$sender->getLevel()->addSound(new ExpPickupSound($sender));
					break;
					default:
					$sender->sendMessage("§e•§d>§b Bạn đã§6 không trúng giải");
					break;
				}
				}else{
					$sender->sendMessage("§e•§d>§b Bạn §6cần 10.000VNĐ để mua vé số");
					return true;
				}
			}
		}
	}
}