<?php 
namespace MCPEVN;
// use gọi event
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use onebone\economyapi\EconomyAPI;


class MuaMau extends PluginBase implements Listener{


	public function onEnable() {
		$this->getServer()->GetPluginManager()->registerEvents($this, $this);
		$this->eco = EconomyAPI::getInstance();
		$this->getLogger()->info(TextFormat::GREEN . "[HM] §aDa Hoat Dong!");
	}
	
	
	public function onDisable() {
		$this->getLogger()->info(TextFormat::RED . "[HM]§c Da Dung Lai!");
		
	}

	public function onCommand(CommandSender $s, Command $cmd, $label, array $args){
		switch($cmd->getName()){
			case "muamau":
			$name = $s->getName();
			$p = $s->getServer()->getPlayer($name);
			$money = $this->eco->myMoney($name);
			if($money > 500){
				$this->eco->reduceMoney($s->getName(), 500);
				$s->sendMessage("§aBạn đã Mua Thành Công Vài Lít Máu");
				$s->setHealth(20);
				
			}else{ $s->sendMessage('§cBạn không đủ $$ để mua máu :>'); return true;}
			break;
		}
	}
}