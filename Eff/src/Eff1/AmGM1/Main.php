<?php

namespace Eff1\AmGM1;

use pocketmine\utils\TextFormat as __;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use onebone\economyapi\EconomyAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\entity\Effect;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getLogger()->info("§aPlugin §dKitEffect §eđã được bật");//lời nhắn khi bật plugin
	}
		public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
			 //$speed = Effect::getEffect(1);
			 //$speed->setAmplifier(1);
			 //$speed->setDuration(100000000);
			 //$sender->addEffect($speed);
			 //$sender->sendMessage("§f●§6 Bạn đã nhận được effect Speed với level là §c1 ");
			if($cmd->getName() == "kiteffect"){
			$sender->sendMessage("§a================§c>§eKitEffect§c<§a================");
			$sender->sendMessage("§c•§e Để sử dụng §aKitEffect§c dành cho VIP §ehãy dùng");
			$sender->sendMessage("§a>>§b /kiteffect [tên loại] [thời gian]\n§c-----------------------------------------------------\n§a↔§c Các loại kit hiện có\n§cSức mạnh: §6sucmanh\n§aSpeed: §6speed\n§bTăng máu: §6tangmau\n§eBật cao: §6jump");
			if(isset($args[0])){
			switch(strtolower($args[0])){
			case "sucmanh":
			$sm = Effect::getEffect(5);
			$sm->setAmplifier(3);
			$sm->setDuration($args[1]);
			$sm->setVisible(true);
			$sender->addEffect($sm);
			$sender->sendMessage("§c•§a Bạn đã lấy §bKit:§c $args[0]");
			break;
			return true;
			case "speed":
			$sp = Effect::getEffect(1);
			$sp->setAmplifier(2);
			$sp->setDuration($args[1]);
			$sp->setVisible(true);
			$sender->addEffect($sp);
			$sender->sendMessage("§c•§a Bạn đã lấy §bKit:§c $args[0]");
			break;
			return true;
			case "tangmau":
			$tm = Effect::getEffect(6);
			$tm->setAmplifier(3);
			$tm->setDuration($args[1]);
			$tm->setVisible(true);
			$sender->addEffect($tm);
			$sender->sendMessage("§c•§a Bạn đã lấy §bKit:§c $args[0]");
			break;
			return true;
			case "jump":
			$j = Effect::getEffect(8);
			$j->setAmplifier(5);
			$j->setDuration($args[1]);
			$j->setVisible(true);
			$sender->addEffect($j);
			$sender->sendMessage("§c•§a Bạn đã lấy §bKit:§c $args[0]");
			}
		}
	}
}
}