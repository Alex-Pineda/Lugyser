<?php
require_once '../config/database.php';
require_once '../models/Usuario.php';

class UsuarioController {
    private $db;
    private $usuario;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->usuario = new Usuario($this->db);
    }

    public function login($nombre, $password) {
        return $this->usuario->login($nombre, $password);
    }

    public function register($nombre, $email, $password, $telefono, $direccion, $ciudad, $pais, $codigo_postal, $arg9) {
        // Validar los datos recibidos
        if (empty($nombre) || empty($email) || empty($password) || empty($telefono) || 
            empty($direccion) || empty($ciudad) || empty($pais) || empty($codigo_postal) || empty($arg9)) {
            return false;
        }

        // Aquí iría la lógica para registrar el usuario en la base de datos
        // ...

        return true;
    }
}
?>
