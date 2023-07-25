<?php

/* Exercice 1 
    class Formule1 {
        private $speed = 0;

        public function __construct ($speed) {
            $this->speed = $speed;
        }

        public function drive() {
            return('Vroom vroom à '. $this->speed . ' km/h');
        }

        public function shiftGear() {
            $this->speed += 20;
        }
    }

    $myFormule1 = new Formule1(10);
    echo $myFormule1->drive();
    $myFormule1->shiftGear();
    echo $myFormule1->drive();*/ 


/* Exercice 2 */
    class Animal {
        private $oxygene = "Je respire de l'air";

        public function __construct($oxygene){
            $this->$oxygene = $oxygene;
        }
        public function info(){
            echo('je suis un animal et ' . $this->oxygene);
        }
    }

    class Mammifère extends Animal{
        private $lait = "Je produis du lait";

        public function __construct($lait){
            $this->$lait = $lait;
        }

        public function infoPlus(){
            echo('Je suis un mammifère et ' . $this->lait);
        }
    }

    class Chien extends Mammifère{
        private $name;

        public function __construct($name){
            $this->name = $name;
        }
        public function crie(){
            echo("J'aboie, je suis un " . $this->name);
        }
    }

    $cocker = new Chien('cocker');
    $cocker->crie();
    $cocker->infoPlus();
    $cocker->info();
?>
<a href="cafe.php">TP Café</a>