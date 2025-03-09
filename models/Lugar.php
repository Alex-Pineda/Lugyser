<?php
class Lugar {
    private $conn;
    private $table_name = "lugar";

    public $idlugar;
    public $nombre_lugar;
    public $imagen_lugar;
    public $tipo;
    public $ubicacion_lugar;
    public $descripcion_lugar;
    public $cantidad_habitaciones;
    public $disponibilidad_lugar;
    public $precio_lugar;
    public $usuario_has_rol_usuario_idusuario;
    public $usuario_has_rol_rol_idrol;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET
            nombre_lugar=:nombre_lugar, imagen_lugar=:imagen_lugar, tipo=:tipo, ubicacion_lugar=:ubicacion_lugar,
            descripcion_lugar=:descripcion_lugar, cantidad_habitaciones=:cantidad_habitaciones, disponibilidad_lugar=:disponibilidad_lugar,
            precio_lugar=:precio_lugar, usuario_has_rol_usuario_idusuario=:usuario_has_rol_usuario_idusuario, usuario_has_rol_rol_idrol=:usuario_has_rol_rol_idrol";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre_lugar", $this->nombre_lugar);
        $stmt->bindParam(":imagen_lugar", $this->imagen_lugar);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":ubicacion_lugar", $this->ubicacion_lugar);
        $stmt->bindParam(":descripcion_lugar", $this->descripcion_lugar);
        $stmt->bindParam(":cantidad_habitaciones", $this->cantidad_habitaciones);
        $stmt->bindParam(":disponibilidad_lugar", $this->disponibilidad_lugar);
        $stmt->bindParam(":precio_lugar", $this->precio_lugar);
        $stmt->bindParam(":usuario_has_rol_usuario_idusuario", $this->usuario_has_rol_usuario_idusuario);
        $stmt->bindParam(":usuario_has_rol_rol_idrol", $this->usuario_has_rol_rol_idrol);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getAllLugares() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
