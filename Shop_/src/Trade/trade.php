<?php

namespace Trade;

use pocketmine\utils\TextFormat as __;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use onebone\economyapi\EconomyAPI;
use pocketmine\command\Command;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\level\sound\PopSound;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\entity\Effect;

class trade extends PluginBase implements Listener{
	public $eco;
	
	public function onEnable(){
		$this->eco = EconomyAPI::getInstance();
		$this->getLogger()->info("(͡° ͜ʖ ͡°)....Đang bật Plugin Ăn Uống....(͡° ͜ʖ ͡°)");
	}
		public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		//if($sender->getInventory()->contains(Item::get($args[1],$args[2],$args[3]))){
       //$sender->getInventory()->removeItem(Item::get($args[1],$args[2],$args[3]));
							if($cmd->getName() == "eat"){
						if(isset($args[0])){
						switch(strtolower($args[0])){
				case "menu":
				$sender->sendMessage("§c|§e==================§c|§aCửa hàng tiện lợi§c|§e==================§c|\n§l§d -Low Carb-\n§r§d [§b1§d]§bSald rau củ trộn thịt gà: §c70 Ngọc Lục Bảo\n§d [§b2§d]§bCơm gạo lức cá pasa kho tộ: §c120 Ngọc Lục Bảo\n§d [§b3§d]§bCà ri gà Ấn Độ: §c90 Ngọc Lục Bảo\n§d [§b4§d]§bCơm gạo lức bò xào BBQ: §c140 Ngọc Lục Bảo\n§d [§b5§d]§bBánh mì đen bò lúc lắc: §c120 Ngọc Lục Bảo\n§d [§b6§d]§bSalad cá hồi: §c97 Ngọc Lục Bảo\n§l§a -GYM-\n§r§a [§b7§a]§cGà quay bơ tỏi: §6200 Ngọc Lục Bảo\n§a [§b8§a]§cCơm chiên bò xào Mỹ: §6170 Ngọc Lục Bảo\n§a [§b9§a]§cĐùi gà sốt BBQ: §670 Ngọc Lục Bảo\n§a [§b10§a]§cMỳ trộn sốt kiểu Hawaii: §6160 Ngọc Lục Bảo\n§a [§b11§a]§cBánh mì beefsteak: §6180 Ngọc Lục Bảo\n§a [§b12§a]§cGà sốt Hàn Quốc: §6300 Ngọc Lục Bảo\n§c|§e==================§c|§aCửa hàng tiện lợi§c|§e==================§c|");
				break;
				return true;
				case "help":
				$sender->sendMessage("§c•§a Để gọi món bạn hãy sử dụng §c/eat goimon [số của món ăn]\n§c•§a Để xem menu bạn hãy sử dụng §c/eat menu\n§c•§a Để xem cam kết của quán bạn hãy sử dụng §c/eat camket");
				break;
				return true;
				case "camket":
				$sender->sendMessage("§a<============>§eCửa Hàng Tiện Lợi§a<============>\n§6->Cam kết:\n§c•§aThức ăn sạch 100%\n§d•§bKhông có chất bảo quản, nhuộm màu\n§e•§dĐã được hệ thống kiểm duyệt\n§a•§cMenu đa dạng và phong phú\n§c•§eHỗ trợ §cLow Carb §6và thức ăn cho dân §bGYM\n§a<============>§eCửa Hàng Tiện Lợi§a<============>");
				break;
				return true;
				   case "goimon":
				  if(isset($args[1])){
				   switch(strtolower($args[1])){
				     case "1":
					$sender->getLevel()->addSound(new PopSound($sender));
					$sender->getLevel()->addSound(new PopSound($sender));
					$sender->getLevel()->addSound(new PopSound($sender));
					$sender->getLevel()->addSound(new PopSound($sender));
					$sender->getLevel()->addSound(new PopSound($sender));
				       if($sender->getInventory()->contains(Item::get(388,0,70))){
				       $sender->getInventory()->removeItem(Item::get(388,0,70));
				       $sender->sendMessage("§c•§a Cảm ơn bạn đã gọi món\n§f".$sender->getName().": Ăn xong rồi, no quá!");
				       $sender->setMaxHealth(100);
				       $sender->setHealth(100-$e);
		$sender->setFood(20);
				       $sp = Effect::getEffect(1);
				       $sp->setAmplifier(2);
				       $sp->setDuration(800);
				       $sp->setVisible(true);
				       $j = Effect::getEffect(8);
				       $j->setAmplifier(2);
				       $j->setDuration(800);
				       $j->setVisible(true);
				       $sender->addEffect($j);
				       $sender->addEffect($sp);
				       }else{
				       $sender->sendMessage("§c•§a Bạn không có đủ tiền để ăn");
				       }
				       return $e - 5;
				       }
				       }
				       }
				       }
				       }
				       }
				       }