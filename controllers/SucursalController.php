<?php
require_once 'models/Sucursal.php';
require_once 'models/Producto.php';
require_once 'config/config.php';

class SucursalController {
    private $sucursalmodel;
    private $productomodel;

    public function __construct() {
        global $conexion;
        $this->sucursalmodel = new Sucursal($conexion);
        $this->productomodel = new Producto($conexion);
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesar la creación de la sucursal
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $prod_id = $_POST['prod_id'];
            $suc_stock = $_POST['suc_stock'];
            $suc_estado = 'A'; // Opcional, dependiendo de cómo manejes el estado

            // Obtener datos del producto
            $producto = $this->productomodel->obtenerProductoPorId($prod_id);

            if ($producto) {
                $prod_image = $producto['prod_image'];
                $prod_extra = $producto['prod_extra'];
                $prod_precio = $producto['prod_precio'];

                // Agregar la sucursal con los datos obtenidos del producto
                $this->sucursalmodel->agregar($nombre, $direccion, $prod_id, $suc_stock, $suc_estado);

                header('Location: index.php?controller=sucursal&action=listar');
            } else {
                // Manejo de error si no se encuentra el producto
                echo "Error: El producto no existe.";
            }
        } else {
            // Obtener productos activos para mostrar en el formulario de creación de sucursal
            $productos = $this->productomodel->listar();
            // Puedes seleccionar un producto por defecto o manejar la lógica según tu necesidad
            $producto = $productos[0]; // Ejemplo: seleccionar el primer producto de la lista

            require 'views/Sucursales/CrearSucursal.php'; // Pasar los productos a la vista
        }
    }


    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesar la edición de la sucursal
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $prod_id = $_POST['prod_id'];
            $suc_stock = $_POST['suc_stock'];
            $suc_estado = 'A'; // Opcional, dependiendo de cómo manejes el estado

            // Actualizar la sucursal en la base de datos
            $this->sucursalmodel->editar($id, $nombre, $direccion, $prod_id, $suc_stock, $suc_estado);
            header('Location: index.php?controller=sucursal&action=listar');
        } else {
            // Obtener la sucursal por ID para editar
            $sucursal = $this->sucursalmodel->obtenerPorId($id);

            // Obtener el nombre del producto asociado a la sucursal
            $producto = $this->productomodel->obtenerPorId($sucursal['prod_id']);
            $prod_nombre = $producto['prod_nombre'];

            require 'views/Sucursales/EditarSucursal.php'; // Pasar los datos del producto a la vista
        }
    }

    public function listar() {
        $sucursales = $this->sucursalmodel->listar();
        require 'views/Sucursales/ListarSucursal.php';
    }

    public function eliminar($id) {
        $this->sucursalmodel->eliminar($id);
        header('Location: index.php?controller=sucursal&action=listar');
    }

}
?>
