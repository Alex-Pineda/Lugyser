<?php
class Reserva {
    private $conn;
    private $table_name = "reserva";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createReserva($nombre_cliente, $fecha_inicio, $fecha_final, $cantidad_personas, $estado_reserva, $pago_idpago, $usuario_idusuario, $rol_idrol, $lugar_idlugar) {
        $query = "INSERT INTO " . $this->table_name . " (nombre_cliente, fecha_inicio, fecha_final, cantidad_personas, estado_reserva, pago_idpago, usuario_has_rol_usuario_idusuario, usuario_has_rol_rol_idrol, lugar_idlugar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssisiisi", $nombre_cliente, $fecha_inicio, $fecha_final, $cantidad_personas, $estado_reserva, $pago_idpago, $usuario_idusuario, $rol_idrol, $lugar_idlugar);
        return $stmt->execute();
    }

    public function getReservasByUsuario($usuario_idusuario) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE usuario_has_rol_usuario_idusuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $usuario_idusuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
