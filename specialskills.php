<?php


class SpecialSkills
{

    public $specialSkill1 = 'Dragon Force';
    public $specialSkill2 = 'Magic Shield';

// ------- DRAGON FORCE ---------

    public function specialSkill1()
    {
        $chance = 10;
        $randChance = rand(0, 100);
        if($randChance <= $chance) 
        {
                echo $this->character1 . " uses " . $this->specialSkill1 . ", doubling his damage<br />";
                $this->damage = $this->damage * 2;
        } 
    }


// ------- MAGIC SHIELD ---------

    public function specialSkill2()
    {
        $chance = 20;
        $randChance = rand(0, 100);
        if($randChance <= $chance) 
        {
                echo $this->character1 . " uses " . $this->specialSkill2 . ", halving the damage<br />";
                $this->damage = $this->damage / 2;
        } 
    }
    
}