<?php
namespace MyPlot\subcommand;

use pocketmine\item\enchantment\Enchantment;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\item\Item;
use pocketmine\nbt\NBT;
use pocketmine\tile\Tile;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\nbt\tag\IntTag;

class ClaimSubCommand extends SubCommand
{
    public function canUse(CommandSender $sender) {
        return ($sender instanceof Player) and $sender->hasPermission("myplot.command.claim");
    }

    public function execute(CommandSender $sender, array $args) {
        if (count($args) > 1) {
            return false;
        }
        $name = "";
        if (isset($args[0])) {
            $name = $args[0];
        }
        $player = $sender->getServer()->getPlayer($sender->getName());
        $plot = $this->getPlugin()->getPlotByPosition($player->getPosition());
        if ($plot === null) {
            $sender->sendMessage(TextFormat::RED . $this->translateString("notinplot"));
            return true;
        }
        if ($plot->owner != "") {
            if ($plot->owner === $sender->getName()) {
                $sender->sendMessage(TextFormat::RED . $this->translateString("claim.yourplot"));
            } else {
                $sender->sendMessage(TextFormat::RED . $this->translateString("claim.alreadyclaimed", [$plot->owner]));
            }
            return true;
        }

        $maxPlots = $this->getPlugin()->getMaxPlotsOfPlayer($player);
        $plotsOfPlayer = count($this->getPlugin()->getProvider()->getPlotsByOwner($player->getName()));
        if ($plotsOfPlayer >= $maxPlots) {
            $sender->sendMessage(TextFormat::RED . $this->translateString("claim.maxplots", [$maxPlots]));
            return true;
        }

        $plotLevel = $this->getPlugin()->getLevelSettings($plot->levelName);
        $economy = $this->getPlugin()->getEconomyProvider();
        if ($economy !== null and !$economy->reduceMoney($player, $plotLevel->claimPrice)) {
            $sender->sendMessage(TextFormat::RED . $this->translateString("claim.nomoney"));
            return true;
        }

        $plot->owner = $sender->getName();
        $plot->name = $name;
        if ($this->getPlugin()->getProvider()->savePlot($plot)) {
            $sender->sendMessage($this->translateString("claim.success"));
			
			$f = $this->getPlugin()->getPlotPosition($plot);
			$plotSize = $this->getPlugin()->getLevelSettings($plot->levelName)->plotSize;
			$f->x += floor($plotSize / 2) - 3;
			$f->z -= -89;
			$f->y += 5;
			
			$sender->getLevel()->setBlock(new \pocketmine\math\Vector3($f->x, $f->y, $f->z), \pocketmine\block\Block::get(\pocketmine\block\Block::CHEST), true, true);
			
			$nbt = new CompoundTag("", [
			new ListTag("Items", []),
			new StringTag("id", Tile::CHEST),
			new IntTag("x", $f->x),
			new IntTag("y", $f->y),
			new IntTag("z", $f->z)
		]);
		$nbt->Items->setTagType(NBT::TAG_Compound);
		
		//$sender->getLevel()->getChunk($sender->getX() >> 4, $sender->getZ() >> 4) <- nếu chuyển qua genisys thì sửa cái này vào $sender->getLevel()
		$tile = Tile::createTile("Chest",$sender->getLevel(), $nbt);
			//Tạo Chest
			$k = Item::get(268,0,1);
			$k->setCustomName("§r§a<§dSword§b ".$sender->getName()."§a>");
			$k->addEnchantment(Enchantment::getEnchantment(17)->setLevel(20));
			$k->addEnchantment(Enchantment::getEnchantment(15)->setLevel(3));
			$c = Item::get(270,0,1);
			$c->setCustomName("§r§a<§dPickaxe§b ".$sender->getName()."§a>");
			$c->addEnchantment(Enchantment::getEnchantment(17)->setLevel(20));
			$c->addEnchantment(Enchantment::getEnchantment(15)->setLevel(3));
			$r = Item::get(271,0,1);
			$r->setCustomName("§r§a<§dAxe§b ".$sender->getName()."§a>");
			$r->addEnchantment(Enchantment::getEnchantment(17)->setLevel(20));
			$r->addEnchantment(Enchantment::getEnchantment(15)->setLevel(3));
			$x = Item::get(269,0,1);
			$x->setCustomName("§r§a<§dShovel§b ".$sender->getName()."§a>");
			$x->addEnchantment(Enchantment::getEnchantment(17)->setLevel(20));
			$x->addEnchantment(Enchantment::getEnchantment(15)->setLevel(3));
			$pp = Item::get(339,0,1);
			$pp->setCustomName("§r§l§c•§e Cách chơi §bSkyBlock§c •");
			$pp->setLore(array("§r§c•§e Thay vì dùng §6lava§e bạn hãy dùng §bfence§e để tạo cho mình một chiếc máy farm hoàn hảo\n§c•§e Tiếp theo nhiệm vụ của bạn là farm thật nhiều §ckhoáng sản§e để mở rộng đảo\n§a•§c Bạn có thể §atrao đổi§d với mọi người§c để nâng cấp vật phẩm\n§a•§c Bạn cũng cần phải chú tâm vào việc §afarm§c để lên level nhé!"));
			$pp->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
			$i = $tile->getInventory();
			$ip = $player->getInventory();
			//$i->addItem($ie1);
			//351:15
			//383:12
			$i->addItem($k);
			$i->addItem($c);
			$i->addItem($r);
			$i->addItem($x);
			$i->addItem(Item::get(351,15,10));
			$i->addItem(Item::get(383,12,2));
			$i->addItem(Item::get(8,0,10));
			$i->addItem(Item::get(49,0,10));
			$i->addItem($pp);
			//$i->addItem(Item::get(362, 0, 3));
            $sender->sendMessage("§b[§bDream§aBlock§b-§aSkyBlock§b]§c Để tạo một máy farm bạn có thể sử dụng:\n§6Obsidian§c +§b Nước");
			} else {
            $sender->sendMessage(TextFormat::RED . $this->translateString("error"));
        }
        return true;
    }
}