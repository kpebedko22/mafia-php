<?php

namespace mafia;

include 'Role.php';
include 'Roles\Mafia.php';
include 'Roles\Civilian.php';
include 'Roles\Courtesan.php';
include 'Roles\Doctor.php';
include 'Roles\Detective.php';

use mafia\Roles\Mafia;
use mafia\Roles\Civilian;
use mafia\Roles\Courtesan;
use mafia\Roles\Doctor;
use mafia\Roles\Detective;

class Game
{
    const MAFIA_COEF = 3;
    const DETECTIVE_COUNT = 1;
    const DOCTOR_COUNT = 1;
    const COURTESAN_COUNT = 1;

    /**
     * @var Player[]
     */
    private array $players = [];

    public function __construct()
    {
        $players = [];
    }

    public function addPlayer(Player $player): void
    {
        $this->players[] = $player;
    }

    public function startGame()
    {
        $this->setRoles();
    }

    private function setRoles()
    {
        $numPlayers = count($this->players);

        $numMafia = (int)($numPlayers / self::MAFIA_COEF);
        $numDetective = max(0, min(self::DETECTIVE_COUNT, $numPlayers - $numMafia));
        $numDoctor = max(0, min(self::DOCTOR_COUNT, $numPlayers - $numMafia - $numDetective));
        $numCourtesan = max(0, min(self::COURTESAN_COUNT, $numPlayers - $numMafia - $numDetective - $numDoctor));
        $numCivilian = max(0, $numPlayers - $numMafia - $numDetective - $numDoctor - $numCourtesan);

        /**
         * @var Role[]
         */
        $roles = [];
        for ($i = 0; $i < $numMafia; $i++) {
            $roles[] = new Mafia();
        }
        for ($i = 0; $i < $numDetective; $i++) {
            $roles[] = new Detective();
        }
        for ($i = 0; $i < $numDoctor; $i++) {
            $roles[] = new Doctor();
        }
        for ($i = 0; $i < $numCourtesan; $i++) {
            $roles[] = new Courtesan();
        }
        for ($i = 0; $i < $numCivilian; $i++) {
            $roles[] = new Civilian();
        }

        shuffle($roles);

        for ($i = 0; $i < count($roles); $i++) {
            $this->players[$i]->setRole($roles[$i]);
        }
    }

    public function __toString(): string
    {
        $result = '';
        $result = $result . "Number of players: " . count($this->players) . "\r\n";
        foreach ($this->players as $index => $player) {
            $result = $result . "Player #" . ($index + 1) . " - " . $player . "\r\n";
        }
        return $result;
    }
}