<?php

require_once 'specialskills.php';

class CharacterStats extends SpecialSkills
{

    public $character1 = 'Carl';
    public $character2 = 'Beast';
    public $type        = 0;
    public $health      = 0;
    public $strength    = 0;
    public $defence     = 0;
    public $speed       = 0;
    public $luck        = 0;
    public $damage      = 0;


    public function showCharacterStats()
    {
        if($this->type == 1 ) 
        {
            echo $this->character1 . " has: <br />";
            echo "Health: " . $this->health . "<br />";
            echo "Strength: " . $this->strength . "<br />";
            echo "Defence: " . $this->defence . "<br />";
            echo "Speed: " . $this->speed . "<br />";
            echo "Luck: " . $this->luck . "% <br /><br />";

        } else if ($this->type == 2) 
        {
            echo $this->character2 . " has: <br />";
            echo "Health: " . $this->health . "<br />";
            echo "Strength: " . $this->strength . "<br />";
            echo "Defence: " . $this->defence . "<br />";
            echo "Speed: " . $this->speed . "<br />";
            echo "Luck: " . $this->luck . "% <br /><br />";

        }
        
    }


// ---------- SETTERS ------- //

    public function setType($type)
    {
            $this->type = $type;
    }

    public function setHealth($health)
    {
            $this->health = $health;
    }
    
    public function setStrength($strength)
    {
            $this->strength = $strength;
    }

    public function setDefence($defence)
    {
            $this->defence = $defence;
    }

    public function setSpeed($speed)
    {
            $this->speed = $speed;
    }

    public function setLuck($luck)
    {
            $this->luck = $luck;
    }

    public function setDamage($damage)
    {
            $this->damage = $damage;
    }




// ---------- GETTERS ------- //

    public function getType()
    {
            return $this->type;
    }

    public function getHealth()
    {
            return $this->health;
    }
    
    public function getStrength()
    {
            return $this->strength;
    }

    public function getDefence()
    {
            return $this->defence;
    }

    public function getSpeed()
    {
            return $this->speed;
    }

    public function getLuck()
    {
            return $this->luck;
    }

    public function getDamage()
    {
            return $this->damage;
    }


// ----------- SIMPLE SKILLS ---------

    public function attack($defence)
    {
        $this->damage = $this->strength - $defence;        
    }

    public function attackDodged($defender)
    {
        $rand = rand(0, 100);
        if($rand <= $defender->getLuck()) 
        {
                echo "Defender was lucky enough to dodge the attack <br />";
                return 0;
        } else {
                return 1;
        }
    }
}




