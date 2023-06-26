<?php
class ContactoModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

   
    public function getContactos() {
        $sql = "SELECT * FROM contactos";
        $result = $this->conexion->query($sql);

        $contactos = array();

        if ($result->num_rows > 0) {
            while ($contacto = $result->fetch_assoc()) {
                $contactos[] = $contacto;
            }
        }

        return $contactos;
    }

    public function addContacto($nombre, $email, $mensaje) {
        $sql = "INSERT INTO contactos (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

        if ($this->conexion->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

   
}
?>
