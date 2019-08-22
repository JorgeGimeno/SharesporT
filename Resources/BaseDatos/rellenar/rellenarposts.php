<?php

require_once 'post.php';

echo "conectar a base de datos</br>";
$con=new mysqli("localhost", "root", "", "sharesportdb");

if ($con->connect_error){
    die("Error al conectar");
}
$con->set_charset("utf8"); 

echo "generando datos aleatorios</br>";
$posts = array();
$numDatos = 500;
for ($i=0;$i<$numDatos;$i++){
    $p = new post(201,250);
    array_push($posts,$p);

}

echo "añadiendo los datos a la base de datos</br>";
$stmt = $con->prepare("INSERT INTO st_posts (contenido, id_usuario, id_deporte) 
                                                    VALUES (?,?,?);");
$contenido;
$id_usuario;
$id_deporte;

$stmt->bind_param("sii", $contenido, $id_usuario, $id_deporte);

foreach($posts as $po){   
    $contenido=$po->getContenido();
    $id_usuario=$po->getId_user();
    $id_deporte=$po->getId_deporte();
    $stmt->execute();
}

$stmt->close();
$con->close();
echo "terminado</br>";