<?php

namespace ShopPro;

use pocketmine\utils\TextFormat as __;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use onebone\economyapi\EconomyAPI;
use pocketmine\command\Command;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;

class shoppro extends PluginBase implements Listener{
	public $eco;
	
	public function onEnable(){
		$this->eco = EconomyAPI::getInstance();
		$this->getLogger()->info("\n❤❤❤❤❤❤❤❤❤❤❤❤❤❤\n\nPlugin ShopPro Của Dev GN\n\n❤❤❤❤❤❤❤❤❤❤❤❤❤❤");
	}
		public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
				if($cmd->getName() == "shop"){
						$sender->sendMessage("§c•§e Để mua hàng bạn hãy dùng §c/shop buy [id] [meta] [số lượng]");
							$sender->sendMessage("§c•§e Để bán hàng bạn hãy dùng §c/shop sell [id] [meta] [số lượng]");
							$sender->sendMessage("§c•§e Để xem thông tin plugin hãy dùng §c/shop about");
	
			if(isset($args[0])){
		switch(strtolower($args[0])){
				case "buy":
				  if($this->eco->reduceMoney($sender->getName(), $args[1]*$args[3]+$args[2]*1.5)){
					$this->eco->reduceMoney($sender->getName(), $args[1]*$args[3]+$args[2]*1.5);
       			 $sender->getInventory()->addItem(Item::get($args[1],$args[2],$args[3]));
					$sender->sendMessage("§a•->§d Bạn đã mua thành công §e".$args[1].":".$args[2]."§c với số lượng §e".$args[3]." ");
			$sender->sendMessage("§aTổng thanh toán: §6".($args[1]*$args[3]+$args[2]*1.5)." ");
		}else{
		$sender->sendMessage("§c•§a Bạn không có đủ §b".($args[1]*$args[3]+$args[2]*1.5)."§6VNĐ");
		}
		break;
		return true;
		case "sell":
		if($sender->getInventory()->contains(Item::get($args[1],$args[2],$args[3]))){
       $sender->getInventory()->removeItem(Item::get($args[1],$args[2],$args[3]));
		$this->eco->addMoney($sender->getName(),  $args[1]-$args[3]-40*1.5);
		$sender->sendMessage("§a•->§d Bạn đã bán thành công §e".$args[1].":".$args[2]."§c với số lượng §e".$args[3]." ");
		$sender->sendTitle("§aTổng thu nhập: §6".( $args[1]-$args[3]-40*1.5)." ");
            $name = $sender->getName();
             $this->getServer()->broadcastMessage("§d•§a ".$name."§c đã §ebán §cđược §b".( $args[1]-$args[3]-40*1.5)."§6VNĐ ");
		}else{
		//tin nhắn khi không có item
		$sender->sendMessage("§c•§a Bạn không có item§b $args[1]:$args[2]§c với số lượng §a$args[3] ");
		}
		return true;
		break;
		case "about":
		$sender->sendMessage("§c•§a Plugin thuộc bản quyền: §bDream block\n§a•§c Code bởi:§d HeoGM");
        }
		}
		}
		}
		}
		//do not copyright!
		//như cặc copy làm lồn gì!