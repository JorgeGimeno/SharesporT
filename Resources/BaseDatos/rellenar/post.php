<?php
    class post {
        private $id_user;
        private $id_deporte;
        private $contenido;

        public function __construct($min_user,$max_user){
            $this->id_user=rand($min_user,$max_user);
            $this->id_deporte=rand(1,5);
            $c=file_get_contents('http://loripsum.net/api');
            $this->contenido= file_get_contents('http://loripsum.net/api/1/short/plaintext');
        }
    }