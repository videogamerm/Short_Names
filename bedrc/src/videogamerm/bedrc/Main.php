<?php

declare(strict_types=1);

namespace videogamerm\bedrc;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\event\player\PlayerJoinEvent;

use pocketmine\event\player\PlayerQuitEvent;

use pocketmine\Player;

use pocketmine\Server;

use pocketmine\event\Listener;

use pocketmine\utils\TextFormat as C;

class Main extends PluginBase{
        public function onLoad(){
                  $this->getLogger()->info("Plugin Loading");
                  
        }
        public function onEnable(){
                  $this->getServer()->getPluginManager()->registerEvents($this,$this);
                  $this->saveDefaultConfig(); // Saves config.yml if not created.
                  $this->reloadConfig(); // Fix bugs sometimes by getting configs values
                  $keyFromConfig = $this->getConfig()->get("author");
          $this->getLogger()->info("Enabled Plugin");
          
        }
        public function onDisable(){
                  $this->getLogger()->info("Plugin Disabled");
        }
    public function onJoin(PlayerJoinEvent $event){
         $player = $event->getPlayer();
         $name = $player->getName();
         $this->getServer()->broadcastMessage(C::GREEN."$name Joined The Game!");
  }
  public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
          if($cmd->getName() == "gb"){
            if(!$sender instanceof Player){
                 $sender->sendMessage("This Command Only Works for players! Please perform this command IN GAME!");
            }else{
                 if(!isset($args[0]) or (is_int($args[0]) and $args[0] > 0)) {
                       $args[0] = 64; 
                 }
                 $sender->getInventory()->addItem(Item::get(7,0,$args[0]));
                 $sender->sendMessage("You got bedrock!!" .count($args[0]));
                  
            }
            if($cmd->getName() == "gd"){
               if(!$sender instanceof Player){
                    $sender->sendMessage("This Command Only Works for players! Please perform this command IN GAME!");
               }else{
                    if(!isset($args[0]) or (is_int($args[0]) and $args[0] > 0)) {
                          $args[0] = 64; 
                    }
                    $sender->getInventory()->addItem(Item::get(57,0,$args[0]));
                    $sender->sendMessage("You got diamonds" .count($args[0]));
                     
               }
     }
     return true;



}

}
}
