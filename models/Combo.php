<?php
class Combo {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function listar() {
        $sql = "SELECT c.*, cat.cat_nombre FROM tbl_combo c LEFT JOIN tbl_categorias cat ON c.cat_id = cat.cat_id WHERE c.com_estado = 'A'";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener($id) {
        $sql = "SELECT * FROM tbl_combo WHERE com_id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function agregar($nombre, $descripcion, $imagen, $precio, $categoria, $estado) {
        $sql = "INSERT INTO tbl_combo (com_nombre, com_descripcion, com_imagen, com_precio, cat_id, com_estado) VALUES (:nombre, :descripcion, :imagen, :precio, :categoria, :estado)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':estado', $estado);
        return $stmt->execute();
    }

    public function editar($id, $nombre, $descripcion, $imagen, $precio, $categoria, $estado) {
        $sql = "UPDATE tbl_combo SET com_nombre = :nombre, com_descripcion = :descripcion, com_imagen = :imagen, com_precio = :precio, cat_id = :categoria, com_estado = :estado WHERE com_id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':estado', $estado);
        return $stmt->execute();
    }

    public function eliminarLogico($id) {
        $sql = "UPDATE tbl_combo SET com_estado = 'I' WHERE com_id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function obtenerCategoriasActivas() {
        $sql = "SELECT * FROM tbl_categorias WHERE cat_estado = 'A'";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
