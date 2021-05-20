<?php

use Orderus\Utils\Game;

require_once __DIR__.'/../vendor/autoload.php';
require_once 'config.php';

$game = new Game();
$game->play();

