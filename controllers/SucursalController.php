<?php
require_once 'models/Sucursal.php';

class SucursalController {
    public function listar() {
        try {
            $sucursales = Sucursal::getAll(); // Método estático para obtener todas las sucursales
            require_once './views/Sucursales/ListarSucursales.php';
        } catch (PDOException $ex) {
            echo "Error al obtener la lista de sucursales: " . $ex->getMessage();
        }
    }

    public function crear() {
        // Mostrar formulario de creación de sucursal (CrearSucursal.php)
        require_once './views/Sucursales/CrearSucursal.php';
    }

    public function guardar($datos) {
        try {
            // Validar datos
            if (!isset($datos['nombre']) || empty($datos['nombre']) ||
                !isset($datos['direccion']) || empty($datos['direccion'])) {
                throw new Exception("Nombre y dirección son campos obligatorios.");
            }

            // Crear instancia de Sucursal y guardar en la base de datos
            $sucursal = new Sucursal();
            $sucursal->setNombre($datos['nombre']);
            $sucursal->setDireccion($datos['direccion']);
            // Asignar otros campos según sea necesario

            $sucursal->guardar(); // Método guardar() debería estar definido en el modelo Sucursal

            // Redirigir o mostrar mensaje de éxito
            header("Location: index.php?controller=sucursal&action=listar");
            exit();
        } catch (Exception $ex) {
            // Manejar el error (mostrar mensaje de error, redirigir a formulario de nuevo, etc.)
            echo "Error al guardar la sucursal: " . $ex->getMessage();
        }
    }

    public function editar($id) {
        try {
            $sucursal = Sucursal::getById($id); // Método estático para obtener sucursal por ID
            if (!$sucursal) {
                throw new Exception("La sucursal no existe.");
            }

            // Mostrar formulario de edición de sucursal (EditarSucursal.php)
            require_once './views/Sucursales/EditarSucursal.php';
        } catch (Exception $ex) {
            echo "Error al editar la sucursal: " . $ex->getMessage();
        }
    }

    public function actualizar($id, $datos) {
        try {
            // Validar datos
            if (!isset($datos['nombre']) || empty($datos['nombre']) ||
                !isset($datos['direccion']) || empty($datos['direccion'])) {
                throw new Exception("Nombre y dirección son campos obligatorios.");
            }

            // Crear instancia de Sucursal y actualizar en la base de datos
            $sucursal = new Sucursal();
            $sucursal->setId($id);
            $sucursal->setNombre($datos['nombre']);
            $sucursal->setDireccion($datos['direccion']);
            // Asignar otros campos según sea necesario

            $sucursal->actualizar(); // Método actualizar() debería estar definido en el modelo Sucursal

            // Redirigir o mostrar mensaje de éxito
            header("Location: index.php?controller=sucursal&action=listar");
            exit();
        } catch (Exception $ex) {
            // Manejar el error (mostrar mensaje de error, redirigir a formulario de nuevo, etc.)
            echo "Error al actualizar la sucursal: " . $ex->getMessage();
        }
    }

    public function eliminar($id) {
        try {
            $sucursal = Sucursal::getById($id); // Obtener la sucursal por ID
            if (!$sucursal) {
                throw new Exception("La sucursal no existe.");
            }

            // Cambiar estado de la sucursal a inactivo (soft delete)
            $sucursal->eliminar(); // Método eliminar() debería desactivar la sucursal en la base de datos

            // Redirigir o mostrar mensaje de éxito
            header("Location: index.php?controller=sucursal&action=listar");
            exit();
        } catch (Exception $ex) {
            // Manejar el error (mostrar mensaje de error, redirigir a página de listado, etc.)
            echo "Error al eliminar la sucursal: " . $ex->getMessage();
        }
    }
}
?>
