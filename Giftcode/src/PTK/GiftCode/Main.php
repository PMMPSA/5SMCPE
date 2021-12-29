<?php

namespace PTK\GiftCode;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\utils\TextFormat as __;
use onebone\economyapi\EconomyAPI;
use pocketmine\utils\Config;

class Main extends PluginBase {
        
     public $used;
	 public $eco;
	 public $giftcode;
	 public $instance;

	 public function onEnable() {
	    if(!is_dir($this->getDataFolder())) {
		mkdir($this->getDataFolder());
		}

		$this->eco = EconomyAPI::getInstance();
		
		$this->used = new \SQLite3($this->getDataFolder() ."used-code.daxai");
		$this->used->exec("CREATE TABLE IF NOT EXISTS code (code);");
		
		$this->giftcode = new \SQLite3($this->getDataFolder() ."code.daxai");
		$this->giftcode->exec("CREATE TABLE IF NOT EXISTS code (code);");
	 }
	 
	 public static function getInstance() {
	  return $this;
	  }
	  
	 public function generateCode() {
	     $characters = '012345abcdeABCDE';
    $charactersLength = strlen($characters);
	$length = 5;
    $randomString = 'DRBL';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
	
		$this->addCode($this->giftcode, $randomString);
		
		$this->getServer()->getLogger()->info("§aDEBUG ". $randomString);
    return $randomString;
	 }
	 public function codeExists($file, $code) {
		 
		 
		 $query = $file->query("SELECT * FROM code WHERE code='$code';");
		 $ar = $query->fetchArray(SQLITE3_ASSOC);
		 
		 if(!empty($ar)) {
			 return true;
		 } else {
			 return false;
		 }
	 }
	 
	 public function addCode($file, $code) {
		 
		 $stmt = $file->prepare("INSERT OR REPLACE INTO code (code) VALUES (:code);");
		 $stmt->bindValue(":code", $code);
		 $stmt->execute();
		 
	 }
	 public function onCommand(CommandSender $s, Command $cmd, $label, array $args) {
	 
	 if($cmd->getName() == "gcodebeta") {
		if($s->isOp()) {
	 		
		 $code = $this->generateCode();
		 $s->sendMessage("§c-> Đã đăng code lên toàn server");
		 $this->getServer()->broadcastMessage("§c[§a--------------------------------------§c]");
		 $this->getServer()->broadcastMessage("§a --                               --");
		 $this->getServer()->broadcastMessage("§a    §b•-> §cCode §dBeta §e". $code ."        ");
		 $this->getServer()->broadcastMessage("§a --                               --");
		 $this->getServer()->broadcastMessage("§c[§a--------------------------------------§c]\n§c•§d Nhập §6/code §anhan§c [code]§e để sử dụng");
		}
	 }
	 if($cmd->getName() == "code") {
	  if(isset($args[0])) {
	   switch(strtolower($args[0])) {
	    case "nhan":
	    if(isset($args[1])) {
		
		
		if($this->codeExists($this->giftcode, $args[1])) {
		
		
	     if(!($this->codeExists($this->used, $args[1]))) {
		 
           $chance = mt_rand(1, 100);
		   
		   $this->addCode($this->used, $args[1]);
		   
		   $this->getServer()->getLogger()->info("§aDEBUG code:". $args[0]);
		   $this->getServer()->broadcastMessage("§d❖ §e". $s->getName() ."§c đã sử dụng code");
		   
		   switch($chance) {
		   case 50:
		     
			 $keys = array_rand(Item::$list, 4);
			 for($i = 0; $i <= 3; ++$i) {
			    $item = Item::get($keys[$i], 0, 1);
			   $s->addItem($item);
			   $s->sendMessage("§aBạn nhận được §c". $item->getName() ." §atừ code này");
			  
	    }
		break;
		  case 40:
		    $s->sendMessage("§a•§d Bạn§c đã nhận §cCode §6thành công");
			$s->sendMessage("§eĐây chỉ là bản beta, tới §c15/2/2018§e sẽ reset và mở lại server");
			$this->eco->addMoney($s->getName(), 10000);
		    $t = Item::get(276,0,1);
		    $t->setCustomName("§b⚫❇§e⚫➡§dSáng Quang Kiếm§e⬅⚫§b❇⚫\n");
		    $t->setLore(array("§r§d✡§b Là loại kiếm chỉ nhận được ở §ecode beta§r\n \n§d✡§b Có damage rất cao, thuộc tầm §chiếm\n \n§d✡§b Có khả năng khiến đối thử bay cực xa\n \n§l§a⚠§c Xin đừng làm mất item hiếm§a ⚠\n \n§6Sharpness, Unbreaking, Knockback\n \n §2--§a--§3--§b--§4--§c--§5--§d--§6--§7--§f♦§7--§6--§d--§5--§c--§4--§b--§3--§a--§2--\n§cBy GN"));
		    $t->addEnchantment(Enchantment::getEnchantment(9)->setLevel(15));
		    $t->addEnchantment(Enchantment::getEnchantment(17)->setLevel(20));
		    $t->addEnchantment(Enchantment::getEnchantment(12)->setLevel(8));
			$s->getInventory()->addItem($t);
			break;
	       default:
		    $s->sendMessage("§a•§d Bạn§c đã nhận §cCode§6 thành công");
			$s->sendMessage("§eĐây chỉ là bản beta, tới §c15/2/2018§e sẽ reset và mở lại server");
			$this->eco->addMoney($s->getName(), 10000);
			$t = Item::get(276,0,1);
			$t->setCustomName("§b⚫❇§e⚫➡§dSáng Quang Kiếm§e⬅⚫§b❇⚫\n");
			$t->setLore(array("§r§d✡§b Là loại kiếm chỉ nhận được ở §ecode beta§r\n \n§d✡§b Có damage rất cao, thuộc tầm §chiếm\n \n§d✡§b Có khả năng khiến đối thử bay cực xa\n \n§l§a⚠§c Xin đừng làm mất item hiếm§a ⚠\n \n§6Sharpness, Unbreaking, Knockback\n \n §2--§a--§3--§b--§4--§c--§5--§d--§6--§7--§f♦§7--§6--§d--§5--§c--§4--§b--§3--§a--§2--\n§cBy GN"));
			$t->addEnchantment(Enchantment::getEnchantment(9)->setLevel(15));
			$t->addEnchantment(Enchantment::getEnchantment(17)->setLevel(20));
			$t->addEnchantment(Enchantment::getEnchantment(12)->setLevel(8));
			$s->getInventory()->addItem($t);
			break;
	    }
	   } else {
	   $s->sendMessage("§b✖§a Code này đã hết hạn");
	   return true;
	   }
      } else {
	  $s->sendMessage("§aNhập sai, hãy thử lại code được phát");
	  return true;
	  }
	 }
    }
   }
  }
 }
}