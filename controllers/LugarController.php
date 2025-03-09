<?php
include_once '../config/database.php';
include_once '../models/Lugar.php';

class LugarController {
    private $db;
    private $lugar;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->lugar = new Lugar($this->db);
    }

    public function index() {
        $lugares = $this->lugar->getAllLugares();
        include '../views/lugar/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->lugar->nombre_lugar = $_POST['nombre_lugar'];
            $this->lugar->imagen_lugar = file_get_contents($_FILES['imagen_lugar']['tmp_name']);
            $this->lugar->tipo = $_POST['tipo'];
            $this->lugar->ubicacion_lugar = $_POST['ubicacion_lugar'];
            $this->lugar->descripcion_lugar = $_POST['descripcion_lugar'];
            $this->lugar->cantidad_habitaciones = $_POST['cantidad_habitaciones'];
            $this->lugar->disponibilidad_lugar = $_POST['disponibilidad_lugar'];
            $this->lugar->precio_lugar = $_POST['precio_lugar'];
            $this->lugar->usuario_has_rol_usuario_idusuario = $_POST['usuario_has_rol_usuario_idusuario'];
            $this->lugar->usuario_has_rol_rol_idrol = $_POST['usuario_has_rol_rol_idrol'];

            if ($this->lugar->create()) {
                header("Location: index.php");
            } else {
                echo "Error al crear el lugar.";
            }
        } else {
            include '../views/lugar/create.php';
        }
    }

    public function createLugar($params) {
        $this->lugar->nombre_lugar = $params['nombre_lugar'];
        $this->lugar->imagen_lugar = $params['imagen_lugar'];
        $this->lugar->tipo = $params['tipo'];
        $this->lugar->ubicacion_lugar = $params['ubicacion_lugar'];
        $this->lugar->descripcion_lugar = $params['descripcion_lugar'];
        $this->lugar->cantidad_habitaciones = $params['cantidad_habitaciones'];
        $this->lugar->disponibilidad_lugar = $params['disponibilidad_lugar'];
        $this->lugar->precio_lugar = $params['precio_lugar'];
        $this->lugar->usuario_has_rol_usuario_idusuario = $params['usuario_idusuario'];
        $this->lugar->usuario_has_rol_rol_idrol = $params['rol_idrol'];
        // Agregar los campos adicionales si es necesario
        // $this->lugar->cantidad_banos = $params['cantidad_banos'];
        // $this->lugar->cantidad_piscinas = $params['cantidad_piscinas'];
        // $this->lugar->juegos_infantiles = $params['juegos_infantiles'];
        // $this->lugar->zonas_verdes = $params['zonas_verdes'];

        if ($this->lugar->create()) {
            return $this->lugar->idlugar;
        } else {
            return false;
        }
    }
}
?>
