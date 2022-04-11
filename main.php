<?php

namespace mafia;

include 'Game.php';
include 'Player.php';

$game = new Game();
$game->addPlayer(new Player('Alexander'));
$game->addPlayer(new Player('Nastasya'));
$game->addPlayer(new Player('Rafael'));
$game->addPlayer(new Player('Evgen'));
$game->addPlayer(new Player('Dmitriy'));
$game->addPlayer(new Player('Sergei'));

$game->startGame();

print_r((string)$game);

