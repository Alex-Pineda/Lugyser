<?php
class Usuario {
    private $conn;
    private $table_name = "usuario";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login($nombre_usuario, $contrasena) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nombre_usuario = ? AND contrasena = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $nombre_usuario, $contrasena);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function register($nombre, $apellido, $nombre_usuario, $contrasena, $tipo_documento, $documento_identidad, $email, $telefono, $fecha_registro) {
        $query = "INSERT INTO " . $this->table_name . " (nombre, apellido, nombre_usuario, contrasena, tipo_documento, documento_identidad, email, telefono, fecha_registro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssssss", $nombre, $apellido, $nombre_usuario, $contrasena, $tipo_documento, $documento_identidad, $email, $telefono, $fecha_registro);
        return $stmt->execute();
    }
}
?>
