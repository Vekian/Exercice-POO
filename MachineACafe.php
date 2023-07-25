<?php
    class MachineACafe {
        private $marque;
        private $cafe;
        private $enFonction;
        private $sucre = 0;
        private static $prixCafe = 2;
        private $dosette = false;
        private $monnaie = -1;

        public function __construct(string $marque) {
            $this->marque = $marque;
        }
        public function allumage(bool $enFonction){
                if($enFonction === true) {
                    $this->enFonction = true;
                    echo('Senseo est en fonction.');
                }
                else {
                    $this->enFonction = false;
                    echo("Senseo n'est pas en fonction.");
                }
            }
        
        public function faireDuCafe(){
            if ($this->dosette === true) {
                $this->dosette = false;
                echo ('Le café est prêt !');
            }
            else {
                echo('Veuillez mettre une dosette en avant');
            }
        }
        public function mettreUneDosette() {
            if($this->enFonction === true && $this->monnaie >= 0){
            if ($this->dosette === false) {
                $this->dosette = true;
            echo('Je mets une dosette.');
            }
            else{
                echo('Une dosette est déjà mise');
            }}
            else {
                echo('Veuillez allumer la machine à café et mettre de l\'argent dedans.');
            }
        }
        public function eteindreMachine(){
            if ($this->enFonction === true){
                $this->enFonction = false;
                echo('Senseo est éteint !');
            }
            else {
                echo('Senseo est déjà éteint !');
            }
        }
        public function mettreDuSucre(int $sucre){
            $this->sucre += $sucre;
            echo('Il y a ' . $this->sucre . ' sucres dans votre café');
        }
        public function payerLeCafe(int $argent) {
            $this->monnaie = $argent - MachineACafe::$prixCafe;
            if ($this->monnaie < 0) {
                echo('Il manque ' . $this->monnaie * (-1) . " euros.");
            } else {
                echo('Votre monnaie est de ' . ($this->monnaie) . ' euros');
            }
        }
};
        

?>