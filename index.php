<?php
require_once 'controller/ContactoController.php';

$conexion = new mysqli('localhost', 'root', '', 'formulario_contacto');

if ($conexion->connect_error) {
    die('Error de conexión a la base de datos: ' . $conexion->connect_error);
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

$contactoController = new ContactoController($conexion);

switch ($action) {
    
    case 'getAll':
        $contactoController->getContactos();
        break;
    case 'add':
        $data = json_decode(file_get_contents("php://input"), true);
        $nombre = $data['nombre'];
        $email = $data['email'];
        $mensaje = $data['mensaje'];
        $contactoController->addContacto($nombre, $email, $mensaje);
        break;
   
    default:
        echo 'Formulario de Contacto';
        break;
}

$conexion->close();
?>
