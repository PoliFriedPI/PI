<?php
class Producto {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregar($nombre, $precio, $extra, $imagen, $estado) {
        $sql = "INSERT INTO tbl_producto (prod_nombre, prod_precio, prod_extra, prod_image, prod_estado) 
                VALUES (:nombre, :precio, :extra, :imagen, :estado)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':extra', $extra, PDO::PARAM_INT); // Si prod_extra es un entero
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':estado', $estado);
        return $stmt->execute();
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM tbl_producto WHERE prod_id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($id, $nombre, $precio, $extra, $imagen, $estado) {
        $sql = "UPDATE tbl_producto SET prod_nombre = :nombre, prod_precio = :precio, prod_extra = :extra, 
                prod_image = :imagen, prod_estado = :estado WHERE prod_id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':extra', $extra, PDO::PARAM_INT); // Si prod_extra es un entero
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function listar() {
        $sql = "SELECT * FROM tbl_producto WHERE prod_estado='A'";
        $stmt = $this->conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarLogico($id) {
        $sql = "UPDATE tbl_producto SET prod_estado = 'I' WHERE prod_id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
