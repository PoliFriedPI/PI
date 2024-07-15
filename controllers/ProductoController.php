
<?php
require_once 'models/Producto.php';
require_once 'config/config.php';

class ProductoController {
    private $productomodel;

    public function __construct() {
        global $conexion;
        $this->productomodel = new Producto($conexion);
    }
    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $extra = isset($_POST['extra']) ? 1 : 0;
            $estado = 'A';

            // Manejo de la imagen
            $imagen = null;
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                $imagen = 'Imagenes/' . basename($_FILES['imagen']['name']);
                move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen);
            }

            $this->productomodel->agregar($nombre, $precio, $extra, $imagen, $estado);
            header('Location: index.php?controller=producto&action=listar');
        } else {
            require 'views/Productos/CrearProducto.php';
        }
    }

    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $extra = isset($_POST['extra']) ? 1 : 0;
            $estado = $_POST['estado'];

            // Manejo de la imagen
            $imagen = $_POST['imagen_actual'];
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                $imagen = 'Imagenes/Productos' . basename($_FILES['imagen']['name']);
                move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen);
            }

            $this->productomodel->editar($id, $nombre, $precio, $extra, $imagen, $estado);
            header('Location: index.php?controller=producto&action=listar');
        } else {
            $producto = $this->productomodel->obtenerPorId($id);
            require 'views/Productos/EditarProducto.php';
        }
    }

    public function listar() {
        $productos = $this->productomodel->listar();
        require 'views/Productos/ListarProductos.php';
    }

    public function eliminar($id) {
        $this->productomodel->eliminarLogico($id);
        header('Location:index.php?controller=producto&action=listar');
    }
}
?>
