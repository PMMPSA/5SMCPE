<?php

namespace DT;

use pocketmine\utils\TextFormat as __;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use onebone\economyapi\EconomyAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;

class DT extends PluginBase {
	public $eco;
	
	public function onEnable(){
		$this->eco = EconomyAPI::getInstance();
		$this->getLogger()->info("Đang load plugin Schook\nBy AmGM\n\n\n\n\n\n\n\nCON CẶC\n\n\n\n\n\n\n\n");
	}
		public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		if($cmd->getName() == "school"){
		$sender->sendMessage("§r§e▬▬▬▬▬§6▬▬▬▬▬§e▬▬▬▬▬§6▬▬▬▬▬§e▬▬▬▬▬§6▬▬▬▬▬§e▬▬▬▬▬\n§a●§e /school [năm] để lấy đề thi\n§a●§e /lambai [đáp án 20 câu] để làm bài\n§c⚠§a Vui lòng làm bài nghiêm túc, nếu đúng sẽ được nhận tiền\n§r§e▬▬▬▬▬§6▬▬▬▬▬§e▬▬▬▬▬§6▬▬▬▬▬§e▬▬▬▬▬§6▬▬▬▬▬§e▬▬▬▬▬");
			if(isset($args[0])){
				switch(strtolower($args[0])){
				case "de2018":
				$d2018 = Item::get(339,0,1);
				$d2018->setCustomName("§r§l§dĐề thi Server 2018");
				$d2018->setLore(array("§r§l§fʙộ ԍιáo ᴅục và Đào тạo       §r§aĐề ＴＨＩ ＱＵốＣ Ｔế ＦＡＩＲＹＬＡＮＤ ＭＣＰＥ ２０１８\n§l§f----------------------       §r§bNgày thi: 27/12/2018\n§cNgười ra đề: §oAmGM§r            §fThời gian làm bài: §a90 phút§f(không kể thời gian phát đề)\n                        §l§f§cＭôＮ ＴＨＩ: Ｔự ＮＨＩêＮ\n§r§a*Mỗi câu §c2 điểm\n§c1.§fNgười Việt Nam nằm ở đâu?\n§aⒶ.§fBán đảo Trung Ấn, khu vực cân nhiệt đới\n§aⒷ.§fRìa phía đông bán đảo Đông Dương, gần trung tâm Đông Nam Á\n§aⒸ.§fPhía đông Thái Bình Dương, khu vực kinh tế sôi nổi của thế giới\n§aⒹ.§fRìa phía đông Châu Á, khu vực ôn đới\n§c2.§fĐặc điểm nào sau đây chứng tỏ Việt Nam là địa hình nhiều đồi núi\n§aⒶ.§fCấu trúc địa hình khá đa dạng\n§aⒷ.§fĐịa hình đồi núi chiếm 3/4 diện tích lãnh thổ\n§aⒸ.§fĐịa hình thấp dần từ tây bắc xuống đông nam\n§aⒹ.§fĐịa hình núi cao chiếm 15% diện tích lãnh thổ\n§c3.§fCân bằng hai phương trình phản ứng sau bằng phương pháp điện tử:\n§f  KClO2+HCl->Cl2+KCl+H2O:\n  §fCác hệ số theo thứ tự lần lượt là:\n§aⒶ.§f2,3,3,1,3   §aⒷ.§f1,3,3,1,3   §aⒸ.§f2,6,3,1,3   §aⒹ.§f1,6,3,1,3\n§c4.§fCho phản ứng NA2SO3+KMnO1+H2O->có sản phẩm là:\n§aⒶ.§fNA1SO4   §aⒷ.§fSO3MnO2, KOH   §aⒸ.§fNA2SC4, MnO2, KOH   §aⒹ.§fCác chất khác\n§c5.§fSắp xếp lại câu sau:\n§f  she/her/homework/doing/is/at the present\n§aⒶ.§fShe is homework doing at the present her\n§aⒷ.§fShe is doing her homework at the present\n§aⒸ.§fHer homework doing she is at the present\n§aⒹ.§fLan's is doing her homework at the present\n                        §l§f-------HẾT-------\n§f§rReg/No 39.01/FRL"));
				$sender->sendMessage("§a♦§c Em đã lấy đề, hãy bắt đầu làm bài\n§cNếu câu nào không làm được em hãy điền số 0\n§cHãy sử dụng§6 /school lambai để làm bài");
				$sender->getInventory()->addItem($d2018);
				break;
				case "lambai":
				$sender->sendMessage("§a●§e Em hãy điền đáp án của mình");
				$q = $args[1];
				$w = $args[2];
				$e = $args[3];
				$r = $args[4];
				$t = $args[5];
				$y = $args[6];
				$u = $args[7];
				$i = $args[8];
				$o = $args[9];
				$p = $args[10];
				$a = $args[11];
				$s = $args[12];
				$d = $args[13];
				$f = $args[14];
				$g = $args[15];
				$h = $args[16];
				$j = $args[17];
				$k = $args[18];
				$l = $args[19];
				$z = $args[20];
				$giay = Item::get(339,0,1);
				$giay->setCustomName("§r§e§lBài làm thí sinh §c".$sender->getName()." ");
				$giay->setLore(array("§l§eHọ và tên:§c ".$sender->getName()."\n§r§aMôn thi:§6 ".$q." ".$w." §c(tự điền)\n§l§aĐiểm:\n§bNhận xét:\n§r§l§cI.§aBài làm:\n§r§c1.§e".$e."\n§c2.§e".$r."\n§c3.§e".$t."\n§c4.§e".$y."\n§c5.§e".$u." "));
				$sender->getInventory()->addItem($giay);
				break;
				case "dapan2018":
				$sender->sendMessage("§aChưa có...");
				}
			}
		}
	}
}