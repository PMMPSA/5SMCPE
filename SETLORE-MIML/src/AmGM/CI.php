<?php


namespace AmGM;
use pocketmine\event\player\{PlayerInteractEvent, PlayerJoinEvent};
use pocketmine\utils\TextFormat as __;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\Player;
use pocketmine\level\sound\ExpPickupSound;
use pocketmine\level\sound\EndermanTeleportSound;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;

class CI extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
    if(!$sender instanceof Player) return;
    switch(strtolower($cmd->getName())){
      case "citem":
       if($sender->hasPermission("case.ci")){
        $id = $args[0];
        $lv = $args[1];
        $ten = $args[2];
        $name = $args[3];
        $name1 = $args[4];
        $name2 = $args[5];
        $name3 = $args[6];
        $name4 = $args[7];
        $name5 = $args[8];
        $name6 = $args[9];
        $name7 = $args[10];
        $name8 = $args[11];
          $item = $sender->getInventory()->getItemInHand();
          $sender->sendMessage("§a-> Enchantment: ".$id."\n§a-> Level: ".$lv."\n§a•-> Đã thêm tên cho item: ".$ten."\n§a-----------------------------------------------------\n \n§a•-> Đã thêm lore cho item\n§aLore1: ".$name."§a\nLore2: ".$name1."\n§aLore3: ".$name2."\n§aLore4: ".$name3."\n§aLore5: ".$name4."\n§aLore6: ".$name5."\n§aLore7: ".$name6."\n§aLore8: ".$name7."\n§aLore9: ".$name8."\n§a-----------------------------------------------------");
          $item->setCustomName($ten);
          $item->addEnchantment(Enchantment::getEnchantment($id)->setLevel($lv));
          $item->setLore(array("§r".$name."\n".$name1."\n".$name2."\n".$name3."\n".$name4."\n".$name5."\n".$name6."\n".$name7."\n".$name8."§r\n§l§cBy AmGM"));
          $sender->getInventory()->setItemInHand($item);
          $sender->getLevel()->addSound(new ExpPickupSound($sender), [$sender]);
  }else{
      $sender->sendMessage("§cĐã nhập quá số lệnh quy định");
  }
  break;
      case "citem-help":
          $sender->sendMessage("§a Để sử dụng plugin này bạn hãy dùng /citem [id enchant] [level] [Tên item] [lore1-8]\n§a Lưu ý mỗi khi bạn dùng cách sẽ tự động chuyển qua cái khác, ví dụ ở đây mình sẽ dùng • thay cho dấu cách\n§e /citem 9 10 Diamond Sword(a) Kiếm•này•cực•mạnh(1) Dành•cho•VIP(2)\n§a Thì mình sẽ nhận được các enchant như khi dùng lệnh, mình sẽ nhận được tên như (a), item sẽ có lore 1 là (1) lore 2 là (2)\n§d Nếu bạn chưa hiểu cách dùng cứ liên hệ mình ->§b Nguyễn Đông Quý\n§a To use this plugin use / citem [id enchant] [level] [item name] [lore1-8] \ n§a Note that each time you use the method will automatically switch to another, for example in Here you will use • instead of a space. ex: /citem 9 10 Diamond Sword (a) Look for this•pole•strong (1) Reserved•for VIP (2) \n enchant as if using the command, I will receive the name as (a), the item will have lore 1 is (1) lore 2 is (2) \n§d If you do not understand how to contact yourself -> §b Nguyen Dong Quy");
    }
  }
}
