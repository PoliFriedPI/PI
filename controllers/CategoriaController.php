<?php
require_once 'models/Categoria.php';
require_once 'config/config.php';

class CategoriaController {
    private $model;

    public function __construct() {
        global $conexion;
        $this->model = new Categoria($conexion);
    }

    public function listar_categorias() {
        $categorias = $this->model->listar();
        require_once 'views/Categorias/ListarCategoria.php';
    }

    public function agregar_categoria() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $estado = 'A';
            $imagen = $this->subirImagen();
            $this->model->agregar($nombre, $imagen, $estado);
            header('Location: index.php?controller=categoria&action=listar_categorias');
        } else {
            require_once 'views/Categorias/CrearCategorias.php';
        }
    }

    public function editar_categoria($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $estado = $_POST['estado'];

            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
                $imagen = $this->subirImagen();
            } else {
                $categoria = $this->model->obtener($id);
                $imagen = $categoria['cat_image'];
            }

            $this->model->editar($id, $nombre, $imagen, $estado);
            header('Location: index.php?controller=categoria&action=listar_categorias');
        } else {
            $categoria = $this->model->obtener($id);
            require_once 'views/Categorias/EditarCategoria.php';
        }
    }

    public function eliminarLogico_categoria($id) {
        $this->model->eliminarLogico($id);
        header('Location: index.php?controller=categoria&action=listar_categorias');
    }

    private function subirImagen() {
        $target_dir = "Imagenes/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
        return $target_file;
    }
}
?>
