<?php
class Categoria {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function listar() {
        $sql = "SELECT * FROM tbl_categorias WHERE cat_estado = 'A'";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener($id) {
        $sql = "SELECT * FROM tbl_categorias WHERE cat_id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function agregar($nombre, $imagen, $estado) {
        $sql = "INSERT INTO tbl_categorias (cat_nombre, cat_image, cat_estado) VALUES (:nombre, :imagen, :estado)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':estado', $estado);
        return $stmt->execute();
    }

    public function editar($id, $nombre, $imagen, $estado) {
        $sql = "UPDATE tbl_categorias SET cat_nombre = :nombre, cat_image = :imagen, cat_estado = :estado WHERE cat_id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':estado', $estado);
        return $stmt->execute();
    }

    public function eliminarLogico($id) {
        $sql = "UPDATE tbl_categorias SET cat_estado = 'I' WHERE cat_id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
