<?php

namespace mafia\Roles;

use mafia\Role;
use mafia\Player;

class Detective extends Role
{

    public function getType(): int
    {
        return self::DETECTIVE;
    }

    public function dayChoice(array $players, Player $player): Player
    {
        // TODO: Implement dayChoice() method.
    }

    public function nightChoice(array $players, Player $player): Player
    {
        // TODO: Implement nightChoice() method.
    }
}