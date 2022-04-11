<?php

namespace mafia\Roles;

use mafia\Role;
use mafia\Player;

class Mafia extends Role
{

    public function dayChoice(array $players, Player $player): Player
    {
        // TODO: Implement dayChoice() method.
    }

    /**
     * @param Player[] $players
     * @param Player $player
     * @return Player
     */
    public function nightChoice(array $players, Player $player): Player
    {
        // TODO: Implement nightChoice() method.
        // Choosing not mafia

        return $players[0];
    }

    public function getType(): int
    {
        return self::MAFIA;
    }
}