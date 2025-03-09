<?php
class Rol {
    private $conn;
    private $table_name = "rol";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllRoles() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRolById($idrol) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE idrol = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idrol);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createRol($nombre_rol, $descripcion_rol, $permiso_rol) {
        $query = "INSERT INTO " . $this->table_name . " (nombre_rol, descripcion_rol, permiso_rol) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $nombre_rol, $descripcion_rol, $permiso_rol);
        return $stmt->execute();
    }
}
?>
