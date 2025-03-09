<?php
class InicioSesion {
    private $conn;
    private $table_name = "inicio_sesion";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createInicioSesion($encriptacion, $autenticacion, $autorizacion, $fecha_ingreso, $usuario_idusuario, $idusuario) {
        $query = "INSERT INTO " . $this->table_name . " (encriptacion, autenticacion, autorizacion, fecha_ingreso, usuario_idusuario, idusuario) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("siiiii", $encriptacion, $autenticacion, $autorizacion, $fecha_ingreso, $usuario_idusuario, $idusuario);
        return $stmt->execute();
    }

    public function getInicioSesionByUsuario($usuario_idusuario) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE usuario_idusuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $usuario_idusuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
