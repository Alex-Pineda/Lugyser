<?php
require_once '../config/database.php';
require_once '../models/Reserva.php';

class ReservaController {
    private $db;
    private $reserva;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->reserva = new Reserva($this->db);
    }

    public function createReserva($fecha_reserva, $nombre_cliente, $fecha_inicio, $fecha_final, $cantidad_personas, $estado_reserva, $pago_idpago, $usuario_idusuario, $rol_idrol) {
        return $this->reserva->createReserva($fecha_reserva, $nombre_cliente, $fecha_inicio, $fecha_final, $cantidad_personas, $estado_reserva, $pago_idpago, $usuario_idusuario, $rol_idrol);
    }

    public function getReservasByUsuario($usuario_id) {
        return $this->reserva->getReservasByUsuario($usuario_id);
    }
}
?>
