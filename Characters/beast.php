<?php


require_once 'character.php';

class Beast extends CharacterStats
{
    public function __construct() 
    {
        $this->health = rand(55,80);
        $this->strength = rand(50,80);
        $this->defence = rand(35,55);
        $this->speed = rand(40,60);
        $this->luck = rand(25,40);
        $this->type = 2;
    }

}
