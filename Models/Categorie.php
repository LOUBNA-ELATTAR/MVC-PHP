<?php
    class Categorie
    {
        public $id;
        public $denomination;
        public $description;
    
        function __construct($id, $den, $desc){
            $this->id = $id;
            $this->denomination = $den;
            $this->description = $desc;
        }
    }
   
?>