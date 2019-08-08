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
            $this->nick="nick". $this->$cont_nicks;
            $this->cont_nicks++;
            //$this->password=
            $this->mail="mail".self::cont_nicks."@mail.com";
            $this->nombre=$this->lista_nombres[rand(0,19)];
            $this->apellidos=$this->listaapellidos[rand(0,19)] . " " . $this->listaapellidos[rand(0,19)];
            $this->ciudad=$this->lista_ciudades[rand(0,19)];

        }



    }