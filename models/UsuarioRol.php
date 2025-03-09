<?php
class UsuarioRol {
    private $conn;
    private $table_name = "usuario_has_rol";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getRolesByUsuario($usuario_idusuario) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE usuario_idusuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $usuario_idusuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function assignRoleToUsuario($usuario_idusuario, $rol_idrol, $notificacion_idnotificacion, $permiso_adicional, $estado) {
        $query = "INSERT INTO " . $this->table_name . " (usuario_idusuario, rol_idrol, notificacion_idnotificacion, permiso_adicional, estado) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiiss", $usuario_idusuario, $rol_idrol, $notificacion_idnotificacion, $permiso_adicional, $estado);
        return $stmt->execute();
    }
}
?>
