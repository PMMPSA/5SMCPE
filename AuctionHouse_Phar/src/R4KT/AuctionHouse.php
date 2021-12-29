<?php

/**
* © R4KT, Skull3x and Muqsit.
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU Lesser General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version. Additional permission of
* the authors may be required.
*
*/

namespace R4KT;

use onebone\economyapi\EconomyAPI;

use pocketmine\item\{Item, enchantment\Enchantment};
use pocketmine\utils\{Config, TextFormat as TF};
use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command, CommandSender};
use pocketmine\Player;

class AuctionHouse extends PluginBase {

    protected $auctions = [];

    public function onLoad() {
       @mkdir($this->getDataFolder());
        $fileExistancy = array('config.yml', 'auctions.json');
        foreach ($fileExistancy as $file) {
            if (!file_exists($this->getDataFolder() . $file)) {
                file_put_contents($this->getDataFolder() . $file, $this->getResource($file));
            }
        }
    }

    /**
    * When the plugin is fully loaded.
    */
    public function onEnable() {
        $this->loadEverything();
    $this->getLogger()->info("§ePlugins Việt hóa by Phuongaz");
    }

    /**
    * When the plugin gets disabled.
    */
    public function onDisable() {
        $this->saveEverything();
    }

    /**
    * Saves everything in 'auctions.json' file
    * before disabling the plugin to avoid data
    * loss.
    */
    public function saveEverything() {
        unlink($this->getDataFolder().'auctions.json'); //Avoiding duplication glitches.
        $data = new Config($this->getDataFolder() . 'auctions.json', Config::JSON);
        foreach ($this->auctions as $aucId => $aucData) {
            $data->set($aucId, $aucData);
        }
        $data->save();
    }

    /**
    * Loads everything that was saved in
    * 'auctions.json'.
    */
    public function loadEverything()
    {
        $data = new Config($this->getDataFolder() . 'auctions.json', Config::JSON);
        foreach ($data->getAll() as $aucId => $aucData) {
            $this->auctions[$aucId] = $aucData;
        }
    }

    /**
    * Prefix used for AuctionHouse messages.
    */
    public static function prefix($positive = true) : string {
        $colour = $positive ? TF::GREEN : TF::RED;
        return TF::AQUA.TF::BOLD.'DAUGIA '.TF::RESET.$colour;
    }

    public function sendAuctionList(Player $player) {
        $i = 0;
        foreach ($this->auctions as $id => $data) {
            if ($i > 10) return true;
            $player->sendMessage(TF::AQUA.'ID'.$id.'  =>  '.TF::YELLOW.$data['name'].'(x'.$data['count'].') for $'.$data['price'].' by '.TF::GREEN.$data['seller']);
            ++$i;
        }
    }

    /**
    * Sends '/ah help' message to $player.
    * Player $player.
    */
    public static function sendHelp($player) {
        $border = str_repeat(TF::GOLD.'='.TF::GREEN.'-', 7).TF::GOLD.'=';
        $helps = [
            '/daugia list' => 'Liệt kê tất cả các đấu giá hiện tại.',
            '/daugia list <player>' => 'Liệt kê tất cả các cuộc đấu giá bởi <player>',
            '/daugia buy <auctionID>' => 'Mua một món hàng không bán đấu giá',
            '/daugia sell <price>' => 'Bán mặt hàng trong tay.',
            '/daugia info <auctionID>' => 'Nhận thông tin chi tiết của một mục.'
        ];
        $player->sendMessage($border);
        foreach ($helps as $cmd => $desc) {
            $player->sendMessage(TF::AQUA.$cmd.' '.TF::WHITE.$desc);
        }
        $player->sendMessage($border);
    }

    /**
    * To sell $item on auction as $player for a $price.
    * Item $item, Player $player, int $price.
    */
    public function sellAuction($player, $item, $price) {
        $aucId = Utils::getFreeKey($this->auctions);
        $name = strtolower($player->getName());
        $cloned = Item::get($item->getId(), $item->getDamage());
        $itemname = $cloned->getName();
        $itemcount = $item->getCount();
        $itemens = $item->hasEnchantments() ? $item->getEnchantments() : null;
        $cname = $item->hasCustomName() ? $item->getName() : null;
        $ens = [];
        if (!is_null($itemens)) {
            foreach ($itemens as $en) {
                $ide = $en->getId();
                $level = $en->getLevel();
                $ens[] = [$ide, $level];
            }
        } else $ens = null;
        $auctiondata = [
            'id' => $item->getId(),
            'damage' => $item->getDamage(),
            'count' => $item->getCount(),
            'enchants' => $ens,
            'name' => $itemname,
            'customname' => $cname,
            'seller' => $name,
            'price' => $price
        ];
        $this->auctions[$aucId] = $auctiondata;
        $player->sendMessage(self::prefix().'§e❤§a Bạn đã đặc hàng thành công '.$itemname.' (x'.$itemcount.') cho $'.$price.' đấu giá.');
        $player->sendMessage(TF::GRAY.'§c❤§a ID đấu giá của bạn là '.TF::GREEN.$aucId.TF::GRAY.'.');
    }

    /**
    * Construct an item from $auction.
    * $auction is an existing key in $this->auctions.
    * @return Item.
    */
    public static function constructItem($auction) : Item {
        $itemId = $auction['id'];
        $itemdmg = $auction['damage'];
        $itemcnt = $auction['count'];
        $itemens = $auction['enchants'];
        $itemname = $auction['customname'];
        $item = Item::get($itemId, $itemdmg, $itemcnt);
        if (!is_null($itemname)) {
            $item->setCustomName($itemname);
        }
        if (!is_null($itemens)) {
            foreach ($itemens as $enchant) {
                $en = Enchantment::getEnchantment($enchant[0]);
                $en->setLevel($enchant[1]);
                $item->addEnchantment($en);
            }
        }
        return $item;
    }

    /**
    * To buy an item off auction.
    * Auction can be traced through $aucId.
    * int $aucId, Player $player.
    */
    public function buyAuction($aucId, $player) {
        if (isset($this->auctions[$aucId])) {
            $auction = $this->auctions[$aucId];
            $itemprice = $auction['price'];
            $money = EconomyAPI::getInstance()->myMoney($player);

            if ($money <= $itemprice) {
                $player->sendMessage(self::prefix(false)."§c✴§b Bạn không có đủ tiền để mua mặt hàng này.");
                return false;
            } else EconomyAPI::getInstance()->reduceMoney($player, $auction['price']);

            $seller = $this->getServer()->getPlayer($auction['seller']);
            EconomyAPI::getInstance()->addMoney($seller, $auction['price']);
            $item = self::constructItem($auction);
            $player->getInventory()->addItem($item);
            $player->sendMessage(self::prefix().'Bạn đã mua thành công mặt hàng không bán đấu giá.');
            if ($seller instanceof Player) {
               $seller->sendMessage(self::prefix().$player->getName().' đã mua mặt hàng của bạn('.$auction['name'].') cho $'.$auction['price']);
            }
            unset($this->auctions[$aucId]);
        } else {
            $player->sendMessage(self::prefix(false).'Cuộc đấu giá với ID ('.$aucId.') không thể tìm thấy.');
        }
    }

    /**
    * Auction commands.
    */
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
        if (strtolower($cmd->getName()) === 'daugia') {
            if (count($args) === 0) {
                self::sendHelp($sender);
            } else {
                switch (strtolower($args[0])) {
                    case 'help':
                        self::sendHelp($sender);
                        break;
                    case 'sell':
                        if (isset($args[1])) {
                            if (($item = $sender->getInventory()->getItemInHand())->getId() !== 0) {
                                $this->sellAuction($sender, $item, $args[1]);
                                $sender->getInventory()->remove($item);
                            }
                        } else {
                            $sender->sendMessage(TF::AQUA.'/daugia sell '.TF::GRAY.'<price>'.PHP_EOL.TF::GRAY.'Đặt món hàng mà bạn hiện đang giữ, trong cuộc đấu giá cho '.TF::YELLOW.'$<price>');
                        }
                        break;
                    case 'buy':
                        if (isset($args[1])) {
                            $this->buyAuction($args[1], $sender);
                        } else {
                            $sender->sendMessage(TF::AQUA.'/daugia buy '.TF::GRAY.'<auctionID>'.PHP_EOL.TF::GRAY.'Mua hàng được giao '.TF::YELLOW.'<auctionID>'.TF::GRAY.' bán đấu giá.');
                        }
                        break;
                    case 'list':
                        if (!isset($args[1])) {
                            $this->sendAuctionList($sender);
                            $sender->sendMessage(self::prefix().TF::GRAY.'Use '.TF::YELLOW.'/daugia list <Tên người bán>'.TF::GRAY.' để tìm mặt hàng theo người bán, '.TF::YELLOW.'/daugia info <đấu giá> '.TF::GRAY.'để biết thêm thông tin về item.');
                        } else {
                            if (isset($args[1])) {
                                $expected = strtolower($args[1]);
                                $none = false;
                                foreach ($this->auctions as $id => $data) {
                                    if ($data['seller'] == $expected) {
                                        $sender->sendMessage(TF::AQUA.'ID'.$id.'  =>  '.TF::YELLOW.$data['name'].'(x'.$data['count'].') for $'.$data['price'].' by '.TF::GREEN.$data['seller']);
                                        $none = true;
                                    }
                                }
                                if (!$none) {
                                    $sender->sendMessage(self::prefix(false).$args[1].' không tổ chức đấu giá bất kỳ.');
                                }
                            }
                        }
                        break;
                    case 'info':
                        if (isset($args[1]) && is_numeric($args[1])) {
                            $id = $args[1];
                            if (isset($this->auctions[$id])) {
                                $auc = $this->auctions[$id];
                                $cname = explode(PHP_EOL, $auc['customname']);
                                $bb = TF::YELLOW.'[*]'.TF::DARK_GRAY.str_repeat('=', 30).TF::YELLOW.'[*]';
                                $used = $auc['damage'] > 0 ? 'Yes' : 'No';
                                $enchanted = isset($auc['enchant']) ? 'Yes' : 'No';

                                $sender->sendMessage($bb);
                                $sender->sendMessage(TF::AQUA.'Item: '.TF::GREEN.$auc['name'].TF::DARK_GRAY.' / '.TF::GREEN.$cname[0].TF::RESET.TF::GREEN.'(x'.$auc['count'].')'.PHP_EOL.
                                    TF::AQUA.'Used Item: '.$used.PHP_EOL.
                                    TF::AQUA.'Enchanted: '.$enchanted.PHP_EOL.
                                    TF::AQUA.'Gía: $'.TF::GREEN.$auc['price'].PHP_EOL.
                                    TF::AQUA.'Người bán: '.TF::GREEN.$auc['seller']);
                                $sender->sendMessage($bb);

                            } else {
                                $sender->sendMessage(self::prefix(false).'Không thể tìm thấy phiên đấu giá được cung cấp');
                            }
                        } else {
                            $sender->sendMessage(TF::AQUA.'/daugia info '.TF::GRAY.'<auctionID>');
                        }
                        break;
                }
            }
        }
    }
}
