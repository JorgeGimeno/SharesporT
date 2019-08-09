<?php
    class usuario{
        private $nick;
        private $password;
        private $mail;
        private $nombre;
        private $apellidos;
        private $ciudad;
        private $foto;
        private $fecha_nac;
        private $estado;
        private $permisos;
        static private $cont_nicks=0;

        static private $lista_nombres=array("Adriana", "Alejandra", "Bertha", "Carmen", "Diana", "Josefina", "Julieta", "Karla", "María", "Susana",
                                        "Alejandro","Benito","Carlos","Daniel","Ernesto","Felipe","Gerardo","Héctor","Isaías","Omar");
        static private $lista_apellidos=array("García","González","Rodríguez","Fernández","López","Martínez","Sánchez","Pérez","Gómez","Martin",
                                        "Jiménez","Ruiz","Hernández","Diaz","Moreno","Muñoz","Álvarez","Romero","Alonso","Gutiérrez");
        static private $lista_ciudades=array("Madrid","Barcelona","Valencia","Sevilla","Zaragoza","Málaga","Murcia","Palma",
                                        "Las Palmas de Gran Canaria","Bilbao","Alicante","Córdoba","Valladolid","Vigo","Gijón",
                                        "Hospitalet de Llobregat","Vitoria","La Coruña","Granada","Elche");
    
        public function __construct(){
            $this->nick="nick". self::$cont_nicks;
            self::$cont_nicks++;
            $this->password=$this->nick;
            $this->mail="mail".self::$cont_nicks."@mail.com";
            $this->nombre=self::$lista_nombres[rand(0,19)];
            $this->apellidos=self::$lista_apellidos[rand(0,19)] . " " . self::$lista_apellidos[rand(0,19)];
            $this->ciudad=self::$lista_ciudades[rand(0,19)];
            $this->fecha_nac=mktime(0, 0, 0, rand(1,28), rand(1,12), rand(1919,2000));
        }




        /**
         * Get the value of nick
         */ 
        public function getNick()
        {
                return $this->nick;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }



        /**
         * Get the value of mail
         */ 
        public function getMail()
        {
                return $this->mail;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Get the value of apellidos
         */ 
        public function getApellidos()
        {
                return $this->apellidos;
        }

        /**
         * Get the value of ciudad
         */ 
        public function getCiudad()
        {
                return $this->ciudad;
        }

        /**
         * Get the value of foto
         */ 
        public function getFoto()
        {
                return $this->foto;
        }

        /**
         * Get the value of fecha_nac
         */ 
        public function getFecha_nac()
        {
                return $this->fecha_nac;
        }

        /**
         * Get the value of estado
         */ 
        public function getEstado()
        {
                return $this->estado;
        }

        /**
         * Get the value of permisos
         */ 
        public function getPermisos()
        {
                return $this->permisos;
        }
    }