<?php


require_once 'character.php';

class Hero extends CharacterStats
{
    public function __construct() 
    {
        $this->health = rand(10,95);
        $this->strength = rand(60,70);
        $this->defence = rand(40,50);
        $this->speed = rand(40,50);
        $this->luck = rand(10,30);
        $this->type = 1;
    }

}
