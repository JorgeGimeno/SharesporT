<?php

require_once 'usuario.php';

echo "conectar a base de datos</br>";
$con=new mysqli("localhost", "root", "", "sharesportdb");

if ($con->connect_error){
    die("Error al conectar");
}
$con->set_charset("utf8"); 

echo "generando datos aleatorios</br>";
$usuarios = array();
$numDatos = 50;
for ($i=0;$i<$numDatos;$i++){
    $u = new usuario();
    array_push($usuarios,$u);
    var_dump($u);
}

echo "añadiendo los datos a la base de datos</br>";
$stmt = $con->prepare("INSERT INTO st_usuarios (nick, password, mail, nombre, apellidos, ciudad, fecha_nac, estado, permisos) 
                                                    VALUES (?,?,?,?,?,?,?,'activo','usuario');");
$nick;
$password;
$mail;
$nombre;
$apellidos;
$ciudad;
$fecha;
$stmt->bind_param("sssssss", $nick,$password, $mail, $nombre, $apellidos, $ciudad, $fecha);

foreach($usuarios as $u){   
    $nick=$u->getNick();
    $password=$u->getPassword();
    $mail=$u->getMail();
    $nombre=$u->getNombre();
    $apellidos=$u->getApellidos();
    $ciudad=$u->getCiudad();
    $fecha=date($u->getFecha_nac()); 
    $stmt->execute();
    printf("%d Fila insertada.\n", $stmt->affected_rows);
}
$stmt->close();
$con->close();
echo "terminado</br>";