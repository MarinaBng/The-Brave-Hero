<?php

require_once 'Characters/hero.php';
require_once 'Characters/beast.php';
require_once 'Characters/character.php';


class Battle extends CharacterStats
{

    public $round;
    public $attacker;
    public $defender;


// ------- DECIDE WHO STARTS


    public function __construct($hero, $beast)
    {

        if($hero->getSpeed() > $beast->getSpeed())
        {
          $this->attacker = $hero;
          $this->defender = $beast;

        } elseif ($hero->getSpeed() < $beast->getSpeed())
        {
          $this->attacker = $beast;
          $this->defender = $hero;

        } else {
            if($hero->getLuck() > $beast->getLuck())
            {
                $this->attacker = $hero;
                $this->defender = $beast;

            } elseif($hero->getLuck() < $beast->getLuck()) 
            {
                $this->attacker = $beast;
                $this->defender = $hero;
            }
        }
        $this->round = 1;
    }



// --------- START THE BATTLE --------

    public function startBattle() 
    {
            while(($this->attacker->getHealth() > 0 && $this->defender->getHealth() > 0) && $this->round <= 20) 
            {
                    echo "<br />Round: " . $this->round . "<br />";

                    // -----   ATTACK -------
                    $this->attacker->attack($this->defender->getDefence());
                    $this->attacker->setDamage($this->attacker->getDamage() * $this->attacker->attackDodged($this->defender));

                    // ----- CHECK IF CHARACTER CAN USE SPECIAL SKILLS ---

                    if($this->attacker->getType() === 1 && $this->attacker->getDamage())
                    {           
                            $this->attacker->specialSkill1();
                    }

                    if($this->defender->getType() === 1 && $this->attacker->getDamage())
                    {
                            $this->defender->specialSkill2();
                    } 
                    
                    $this->updateDefenderHealth();
                    $this->showRoles();
                    $this->switchCharacterRoles();
                    $this->round++;

            }
            $winner = null;
            $this->checkForWinner();
            $this->getWinner();
            $this->setWinner($winner);
            $this->announceWinner();

    }


    public function updateDefenderHealth()
    {
            $newHealthValue = $this->defender->getHealth() - $this->attacker->getDamage();
            if($newHealthValue < 0)
            {
                    $newHealthValue = 0;
            }
            $this->defender->setHealth($newHealthValue);
    }

    public function switchCharacterRoles()
    {
            $third = $this->attacker;
            $this->attacker = $this->defender;
            $this->defender = $third;
    }

    public function showRoles()
    {
            if($this->attacker->getType() === 1 && $this->defender->getType() === 2)
            {
                    echo "The attacker is " . $this->character1 . ". Damage dealt: " . $this->attacker->getDamage() . "<br />";
                    echo "The deffender is " . $this->character2 . ". Remaining health: " . $this->defender->getHealth() . "<br />";
            } else if ($this->attacker->getType() === 2 && $this->defender->getType() === 1)
            {
                    echo "The attacker is " . $this->character2 . ". Damage dealt: " . $this->attacker->getDamage() . "<br />";
                    echo "The deffender is " . $this->character1. ". Remaining health: " . $this->defender->getHealth() . "<br />";
            }
    }

    public function checkForWinner()
    {
        if ($this->attacker->getType() === 1 && $this->attacker->getHealth() == 0) 
        {
            $this->setWinner($this->defender);
                echo "<br />The winner is " . $this->character2 . ", health: " . $this->defender->getHealth();
                echo "<br />The loser is " . $this->character1 . ", health: " . $this->attacker->getHealth();
        } else if ($this->attacker->getType() === 2 && $this->attacker->getHealth() == 0) 
        {
            $this->setWinner($this->defender);
            echo "<br />The winner is " . $this->character1 . ", health: " . $this->defender->getHealth();
            echo "<br />The loser is " . $this->character2 . ", health: " . $this->attacker->getHealth();
        } else {
                if ($this->attacker->getType() === 1 && $this->attacker->getHealth() > $this->defender->getHealth()) 
                {
                        $this->setWinner($this->attacker);
                        echo "<br />The winner is " . $this->character1 . ", health: " . $this->defender->getHealth();
                        echo "<br />The loser is " . $this->character2 . ", health: " . $this->attacker->getHealth();
                } elseif ($this->attacker->getType() === 2 && $this->attacker->getHealth() > $this->defender->getHealth())
                {
                        $this->setWinner($this->attacker);
                        echo "<br />The winner is " . $this->character2 . ", health: " . $this->defender->getHealth();
                        echo "<br />The loser is " . $this->character1 . ", health: " . $this->attacker->getHealth();
                } else {
                        return false;
                        echo "<br />We have no winner. The game ends in a tie";
                }
        }
    }

    public function getWinner()
    {
            return $this->winner;
    }

    public function setWinner($winner)
    {
            $this->winner = $winner;
    }

    private function announceWinner()
    {
        $winner = $this->getWinner();
    }

}