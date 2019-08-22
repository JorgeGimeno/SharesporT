<?php
    class post {
        private $id_user;
        private $id_deporte;
        private $contenido;

        public function __construct($min_user,$max_user){
            $this->id_user=rand($min_user,$max_user);
            $this->id_deporte=rand(1,5);
            $c=file_get_contents('http://loripsum.net/api/1/short/plaintext');
            $this->contenido= $c;
            
            //echo $this->id_user.", ".$this->id_deporte.", ".$this->contenido."</br>";
        }

        /**
         * Get the value of id_deporte
         */ 
        public function getId_deporte()
        {
                return $this->id_deporte;
        }

        /**
         * Set the value of id_deporte
         *
         * @return  self
         */ 
        public function setId_deporte($id_deporte)
        {
                $this->id_deporte = $id_deporte;

                return $this;
        }

 

        /**
         * Get the value of contenido
         */ 
        public function getContenido()
        {
                return $this->contenido;
        }

        /**
         * Set the value of contenido
         *
         * @return  self
         */ 
        public function setContenido($contenido)
        {
                $this->contenido = $contenido;

                return $this;
        }

        /**
         * Get the value of id_user
         */ 
        public function getId_user()
        {
                return $this->id_user;
        }

        /**
         * Set the value of id_user
         *
         * @return  self
         */ 
        public function setId_user($id_user)
        {
                $this->id_user = $id_user;

                return $this;
        }
    }