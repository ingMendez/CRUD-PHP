<?php
/*este es una biblioteca de msql para la cconecion  el base de datos */

session_start();

$conn = mysqli_connect(
    'localhost', //este es el servidor 
    'root',   // este es el usuario administrador
    '',       // aqui debe de ir la contrase;a
    'php_msql_crud'  // esta es la base de datos
);


if(isset($conn)){
   // echo 'DB is connected';
} 
?>