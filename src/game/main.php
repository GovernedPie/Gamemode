<?php

namespace game;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\level\biome\UnknownBiome;
use pocketmine\network\mcpe\protocol\types\GameMode;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class main extends PluginBase{
    public function onEnable()
    {
        $this->getLogger()->info("Plugin Loaded!");
    }

    public function onLoad()
    {
        $this->getLogger()->info("Plugin Loading!");
    }

    public function onDisable()
    {
        $this->getLogger()->info("Plugin Disabled!");
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        if(!$sender instanceof Player) return false;
        switch ($cmd->getName()){
            case "gmc":
               if(!$sender->isOp()){
                   $sender->sendMessage(TextFormat::RED . "NO PERMISSION!");
               }
               $sender->setGamemode(GameMode::CREATIVE);
               break;
            case "gms":
                if(!$sender->isOp()){
                    $sender->sendMessage(TextFormat::RED . "NO PERMISSION!");
                }
                $sender->setGamemode(GameMode::SURVIVAL);
        }

        return false;
    }
}
