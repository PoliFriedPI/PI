<?php
class Sucursal {
    private $conexion;
    private $productomodel;

    public function __construct($conexion) {
        $this->conexion = $conexion;
        $this->productomodel = new Producto($conexion); // Inicializa el modelo Producto

    }

    public function agregar($nombre, $direccion, $prod_id, $suc_stock, $suc_estado = 'A') {
        $sql = "INSERT INTO tbl_sucursales (nombre, direccion, prod_id, suc_stock, suc_estado) 
            VALUES (:nombre, :direccion, :prod_id, :suc_stock, :suc_estado)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':prod_id', $prod_id, PDO::PARAM_INT);
        $stmt->bindParam(':suc_stock', $suc_stock, PDO::PARAM_INT);
        $stmt->bindParam(':suc_estado', $suc_estado);
        return $stmt->execute();
    }

    public function obtenerProductoPorId($prod_id) {
        $sql = "SELECT * FROM tbl_producto WHERE prod_id = :prod_id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':prod_id', $prod_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($id, $nombre, $direccion, $prod_id, $suc_stock, $suc_estado) {
        $sql = "UPDATE tbl_sucursales 
            SET nombre = :nombre, 
                direccion = :direccion, 
                prod_id = :prod_id, 
                suc_stock = :suc_stock, 
                suc_estado = :suc_estado
            WHERE suc_id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':prod_id', $prod_id, PDO::PARAM_INT);
        $stmt->bindParam(':suc_stock', $suc_stock, PDO::PARAM_INT);
        $stmt->bindParam(':suc_estado', $suc_estado);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function obtenerPorId($id) {
        $sql = "SELECT * FROM tbl_sucursales WHERE suc_id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function listar() {
        $sql = "SELECT s.*, p.prod_nombre 
                FROM tbl_sucursales s
                INNER JOIN tbl_producto p ON s.prod_id = p.prod_id 
                WHERE s.suc_estado = 'A'";
        $stmt = $this->conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar($id) {
        $sql = "UPDATE tbl_sucursales SET suc_estado = 'I' WHERE suc_id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function eliminarLogico($id) {
        $sql = "UPDATE tbl_sucursales SET suc_estado = 'I' WHERE suc_id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
