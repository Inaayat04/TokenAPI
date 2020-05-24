<?php

namespace Inaayat\Token;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\utils\Config;

class TokenAPI extends  PluginBase {

    /** @var Main $instance */
    private static $instance;

    private $db;

    public function onLoad(): void{
        self::$instance = $this;
    }

    public function onEnable(){
        @mkdir($this->getDataFolder());
        $this->saveResource("db.yml");
        $this->db = new Config($this->getDataFolder() . "db.yml", Config::YAML);
    }

    public function myToken($player)
    {
        if ($player instanceof Player) {
            $player = $player->getName();
        }
        $this->db->get($player->getName());
        return $this->db->get($player->getName());
    }

    public function reduceMoney($player, $token){
        if ($player instanceof Player) {
            $player->getName();
        }
        if ($this->myToken($player) - $token < 0) {
            return true;
        }
        $this->db->set($player->getName(), (int)$this->db->get($player) - $token);
        $this->db->save();
        return true;
    }
    public function addToken($player, $token)
    {
        if ($player instanceof Player) {
            $player->getName();
        }
        if ($this->myToken($player) + $token < 0) {
            return true;
        }
        $this->db->set($player->getName(), (int)$this->db->get($player) + $token);
        $this->db->save();
        return true;
    }

    public function setToken($player, $token)
    {
        if ($player instanceof Player) {
            $player->getName();
        }
        $this->db->set($player->getName(), (int)$token);
        $this->db->save();
        return true;
    }
}

 public function onDisable(){
      $this->db->save();
      $this->getLogger()->info("Succesfully saved DB".);
 }
