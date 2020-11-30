<?php

require_once 'Characters/hero.php';
require_once 'Characters/beast.php';
require_once 'battle.php';

$c1 = new Hero;
$c2 = new Beast;
echo $c1->showCharacterStats();
echo $c2->showCharacterStats();
$battle = new Battle($c1, $c2);
$battle->startBattle();