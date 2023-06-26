<?php
require_once 'model/ContactoModel.php';

class ContactoController {
    private $model;

    public function __construct($conexion) {
        $this->model = new ContactoModel($conexion);
    }

   

    public function getContactos() {
        $contactos = $this->model->getContactos();
        echo json_encode($contactos);
    }

    public function addContacto($nombre, $email, $mensaje) {
        if ($this->model->addContacto($nombre, $email, $mensaje)) {
            echo "Contacto agregado exitosamente";
        } else {
            header("HTTP/1.0 500 Internal Server Error");
            echo "Error al agregar el contacto";
        }
    }

  
}
?>
