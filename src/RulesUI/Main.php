<?php

namespace RulesUI;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;

class Main extends PluginBase implements Listener {
	
    public function onEnable() {
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		if($api === null){
			$this->getServer()->getPluginManager()->disablePlugin($this);			
		}
    }
	
    public function onCommand(CommandSender $sender, Command $cmd, string $label,array $args) : bool {
		switch($cmd->getName()){
			case "rulesui":
				if($sender instanceof Player) {
					$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
					$form = $api->createSimpleForm(function (Player $sender, array $data){
					$result = $data[0];
					
					if($result === null){
						return true;
					}
						switch($result){
						   
						}
					});
					$form->setTitle("§bAversionPE §cRules");
					$form->setContent("Please follow the rules.");
					$form->adddropdown(TextFormat::BOLD . "Please respect staff and dont §4hack!");	
					$form->adddropdown(TextFormat::DARK_RED  . "Don't Swear and grief!");
					$form->adddropdown(TextFormat::BLUE  . "Scamming Is bannable!");
					$form->adddropdown(TextFormat::RED  . "Never ask for staff!");
					$form->sendToPlayer($sender);
				}
				else{
					$sender->sendMessage(TextFormat::RED . "Use this Command in-game!");
					return true;
				}
			break;
		}
		return true;
    }
}
