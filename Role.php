<?php

namespace mafia;

abstract class Role
{
    const MAFIA = 1;
    const CIVILIAN = 2;
    const DETECTIVE = 3;
    const DOCTOR = 4;
    const COURTESAN = 5;

    const TYPES = [
        self::MAFIA => 'Mafia',
        self::CIVILIAN => 'Civilian',
        self::DETECTIVE => 'Detective',
        self::DOCTOR => 'Doctor',
        self::COURTESAN => 'Courtesan',
    ];

    abstract public function getType(): int;

    /**
     * @param Player[] $players
     * @param Player $player
     * @return Player
     */
    abstract public function dayChoice(array $players, Player $player): Player;

    /**
     * @param Player[] $players
     * @param Player $player
     * @return Player
     */
    abstract public function nightChoice(array $players, Player $player): Player;

    public function isMafia(): bool
    {
        return $this->getType() === Role::MAFIA;
    }

    public function isCivilian(): bool
    {
        return $this->getType() === Role::CIVILIAN;
    }

    public function isDetective(): bool
    {
        return $this->getType() === Role::DETECTIVE;
    }

    public function isDoctor(): bool
    {
        return $this->getType() === Role::DOCTOR;
    }

    public function isCourtesan(): bool
    {
        return $this->getType() === Role::COURTESAN;
    }

    public function __toString(): string
    {
        return self::TYPES[$this->getType()];
    }
}