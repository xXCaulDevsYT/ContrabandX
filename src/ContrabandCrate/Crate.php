<?php

namespace ContrabandCrate;

use pocketmine\plugin\PluginBase as PB;
use pocketmine\event\Listener as L;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\entity\Effect;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use onebone\economyapi\EconomyAPI;
use CortexPE\level\particle\RocketParticle;
use pocketmine\utils\TextFormat as c;

class Crate extends PB implements L{

  public function onEnable(){
$this->getServer()->getLogger()->info("ContrabandCrates Enabled");
$this->getServer()->getPluginManager()->registerEvents($this, $this);

}

  public function onDisable(){
$this->getServer()->getLogger()->info("ContrabandCrates Disabled");

}

  public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) :bool{
     if(strtolower($cmd->getName() == "cratekey")){

#Crate n Key
   $contra = Item::get(120, 0, 1);
    $contra->setCustomName("§r§k§3iii§r§bMystical Crate§k§3iii§r");
   $key = Item::get(399, 5, 1);
    $key->setCustomName("§r§k§3iii§r§bMystical Charm§k§3iii§r");
     $key->setLore([
"§r§fThis §bDivine Charm §fis said to hold items",
"§r§fthat may grant its user §bImmortality§f!",
" ",
"§r§5(!) Unlocks the §k§3iii§r§bMystical Crate§k§3iii§r"
]);
#Crate n Key


 $online = $this->getServer()->getOnlinePlayers();
 $player = $this->getServer()->getPlayer($args[0]);

if($sender->hasPermission("givecratekey.cmd")){
  if(isset($args[0])){

  $player->getInventory()->addItem($key);
  $player->sendMessage("§6+1 Mystical Key");
  $sender->getInventory()->addItem($key, $contra);
           }else{
$sender->sendMessage("§c(!) §7Invalid usage!");
$sender->sendMessage("§7/cratekey <name>");;
           }
       }else{
$sender->addTitle("§cInsufficient Permission","§7~~~~~~~~~~~~~~~~~~~~",20,40,20);
      }
   }
return true;
}

    public function onTap(PlayerInteractEvent $e){
  $p = $e->getPlayer();
  $name = $p->getName();
  $item = $e->getItem();
  $inv = $p->getInventory();
  $key = Item::get(399, 0, 1);
    $key->setCustomName("§r§k§3iii§r§bMystical Charm§k§3iii§r");
//Enchants
$prot = Enchantment::getEnchantment(0);
$sharp = Enchantment::getEnchantment(9);
$eff = Enchantment::getEnchantment(15);
$unb = Enchantment::getEnchantment(17);
$kb = Enchantment::getEnchantment(12);
$fa = Enchantment::getEnchantment(13);
$loot = Enchantment::getEnchantment(14);
$bane = Enchantment::getEnchantment(11);
$firep = Enchantment::getEnchantment(1);
$feather = Enchantment::getEnchantment(2);
$blastp = Enchantment::getEnchantment(3);
$projectp = Enchantment::getEnchantment(4);
$resp = Enchantment::getEnchantment(6);
$aqua = Enchantment::getEnchantment(8);
$thorns = Enchantment::getEnchantment(5);
$depth = Enchantment::getEnchantment(7);
$silk = Enchantment::getEnchantment(16);

########Rewards########
$dmg = $e->getItem()->getDamage();
########
$item1 = Item::get(276, 0, 1);
$item1->setCustomName("§r§l§aSword of §r§f§kiii§r§l§5Damnation§r§f§kiii§r");
$item1->addEnchantment(new EnchantmentInstance($sharp, 5));
$item1->addEnchantment(new EnchantmentInstance($unb, 2));
########

                $item2 = Item::get(130, 0, 1);
$item2->setCustomName("§r§aEnderChest\n\n§r§a~~~~~~~~~~~~~");
########
                $item4 = Item::get(466, 0, 8);
                $item5 = Item::get(310, 0, 1);
########
$item5->addEnchantment(new EnchantmentInstance($prot, 6));
########
               $item6 = Item::get(354, 0, 1);//cake
               $item7 = Item::get(41, 0, 32);
               $item8 = Item::get(322, 0, 10);
               $item9 = Item::get(264, 0, 32);//diam
               $item10 = Item::get(368, 0, 8);//epearl
########
               $item11 = Item::get(311, 0, 1);
$item11->addEnchantment(new EnchantmentInstance($prot, 6));
########
                $item12 = Item::get(312, 0, 1);
$item12->addEnchantment(new EnchantmentInstance($prot, 6));
########
                $item13 = Item::get(313, 0, 1);
$item13->addEnchantment(new EnchantmentInstance($prot, 6));
########
            
                $Butcher = Item::get(276, 0, 1);

$Butcher->setCustomName("§r§4§lButcher Sword");
$Butcher->addEnchantment(new EnchantmentInstance($sharp, 5));
$Butcher->addEnchantment(new EnchantmentInstance($fa, 2));
$Butcher->setLore([
" ",
"§r§9Level 13 §7- 13000 XP",
"§r§c§l█████████████§r",
" ",
"§r§7The Sword of §4Butcher, §ca demonic",
"§r§cabomination from the depths of the",
"§r§cnether",
" ",
"§r§dOwner: §7$name"
]);
########
            
       $str = Item::get(373, 32, 3);
########
                 $gears = Item::get(313, 0, 1);

$gears->addEnchantment(new EnchantmentInstance($prot, 4));
$gears->setCustomName("§r§4§lBloody Boots");
$gears->addEnchantment(new EnchantmentInstance($depth, 2));
########
                $axe = Item::get(279, 0, 1);
$axe->addEnchantment(new EnchantmentInstance($sharp, 4));
$axe->addEnchantment(new EnchantmentInstance($eff, 3));
$axe->addEnchantment(new EnchantmentInstance($unb, 1));
$axe->setCustomName("§r§b§klll§r§7[§bHyper§7]§b§klll§r §cBattleAxe");
$axe->setLore([
" ",
"§r§7Unleash a barrage of §bBrutal Swings",
"§r§7which will §bSlaughter §7any foe with ease",
" ",
"§r§b(!) Hyper Weapon"
]);
########
                $nugget = Item::get(452, 0, 1);
$nugget->setCustomName("§r§e§lThe Holy Nugget§r");
$nugget->addEnchantment(new EnchantmentInstance($kb, 2));
$nugget->setLore([
" ",
"§r§7this §dblessed §7nugget fell from the heavens",
"§r§7and grants its possessor §dMysterious Powers!",
" ",
"§r§c(!) Admin Item"
]);
########
                        $xp = Item::get(384, 0, 5);
$xp->setCustomName("§r§a§lExperience Bottle§r §7(Right-Click)");
########
$aspaxe = Item::get(279, 0, 1);
$aspaxe->setCustomName("§r§6Destruction VII");
$aspaxe->addEnchantment(new EnchantmentInstance($sharp, 5));
$aspaxe->addEnchantment(new EnchantmentInstance($unb, 2));
$aspaxe->addEnchantment(new EnchantmentInstance($fa, 1));

#####################Rewards#########################

$items = [$item1, $item2, $item4, $item5, $item6, $item7, $item8, $item9, $item10, $item11, $item12, $item13, $Butcher, $aspaxe, $axe, $gears, $xp, $str, $nugget];

 $r = mt_rand(0, 18);
 $reward = $items[$r];
$ckey = Item::get(399, 5, 1);

  if($e->getBlock()->getId() == 120){
         $e->setCancelled(true);
if($item->getId() == 399 && $item->getDamage() == 5){
         $p->getLevel()->addParticle(new RocketParticle($player->getLocation()));
         $p->sendMessage("§6Opening Crate...");
         $p->getInventory()->removeItem($ckey);
         $p->getInventory()->addItem($reward);
      }else{
           $p->sendMessage("§c(!)§7 You need a crate key to open");
      }
    }
  }
}