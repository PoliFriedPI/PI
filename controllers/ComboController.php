<?php
require_once 'models/Combo.php';
require_once 'config/config.php';

class ComboController {
    private $model;

    public function __construct() {
        global $conexion;
        $this->model = new Combo($conexion);
    }

    public function listar_combos() {
        $combos = $this->model->listar();
        require_once 'views/Combos/ListarCombo.php';
    }

    public function agregar_combo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];
            $estado = 'A';
            $imagen = $this->subirImagen();
            $this->model->agregar($nombre, $descripcion, $imagen, $precio, $categoria, $estado);
            header('Location: index.php?controller=combo&action=listar_combos');
            exit;
        } else {
            $categorias = $this->model->obtenerCategoriasActivas();
            require_once 'views/Combos/CrearCombo.php';
        }
    }

    public function editar_combo($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];
            $estado = $_POST['estado'];

            // Subir imagen solo si se ha seleccionado una nueva imagen
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
                $imagen = $this->subirImagen();
            } else {
                // Obtener la imagen actual
                $combo = $this->model->obtener($id);
                $imagen = $combo['com_imagen'];
            }

            $this->model->editar($id, $nombre, $descripcion, $imagen, $precio, $categoria, $estado);
            header('Location: index.php?controller=combo&action=listar_combos');
            exit;
        } else {
            $combo = $this->model->obtener($id);
            $categorias = $this->model->obtenerCategoriasActivas();
            require_once 'views/Combos/EditarCombos.php';
        }
    }

    public function eliminarLogico_combo($id) {
        $this->model->eliminarLogico($id);
        header('Location: index.php?controller=combo&action=listar_combos');
        exit;
    }

    private function subirImagen() {
        $target_dir = "Imagenes/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
        return $target_file;
    }
}
?>
