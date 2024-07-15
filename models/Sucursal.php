<?php

class Sucursal {
    private $suc_id;
    private $nombre;
    private $direccion;
    private $suc_status;
    private $prod_id;
    private $suc_stock;
    private $suc_estado;

    public function __construct($suc_id, $nombre, $direccion, $suc_status, $prod_id, $suc_stock, $suc_estado) {
        $this->suc_id = $suc_id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->suc_status = $suc_status;
        $this->prod_id = $prod_id;
        $this->suc_stock = $suc_stock;
        $this->suc_estado = $suc_estado;
    }

    // Getters
    public function getSuc_id() {
        return $this->suc_id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getSuc_status() {
        return $this->suc_status;
    }

    public function getProd_id() {
        return $this->prod_id;
    }

    public function getSuc_stock() {
        return $this->suc_stock;
    }

    public function getSuc_estado() {
        return $this->suc_estado;
    }

    // Setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setSuc_status($suc_status) {
        $this->suc_status = $suc_status;
    }

    public function setProd_id($prod_id) {
        $this->prod_id = $prod_id;
    }

    public function setSuc_stock($suc_stock) {
        $this->suc_stock = $suc_stock;
    }

    public function setSuc_estado($suc_estado) {
        $this->suc_estado = $suc_estado;
    }

    // CRUD Operations

    public static function listarSucursales() {
        global $conexion;
        $stmt = $conexion->query("SELECT * FROM tbl_sucursales WHERE suc_estado = 'A'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerSucursal($suc_id) {
        global $conexion;
        $stmt = $conexion->prepare("SELECT * FROM tbl_sucursales WHERE suc_id = :suc_id");
        $stmt->bindParam(':suc_id', $suc_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crearSucursal($nombre, $direccion, $suc_status, $prod_id, $suc_stock) {
        global $conexion;
        $stmt = $conexion->prepare("INSERT INTO tbl_sucursales (nombre, direccion, suc_status, prod_id, suc_stock, suc_estado) VALUES (:nombre, :direccion, :suc_status, :prod_id, :suc_stock, 'A')");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':suc_status', $suc_status);
        $stmt->bindParam(':prod_id', $prod_id);
        $stmt->bindParam(':suc_stock', $suc_stock);
        return $stmt->execute();
    }

    public function editarSucursal($suc_id, $nombre, $direccion, $suc_status, $prod_id, $suc_stock) {
        global $conexion;
        $stmt = $conexion->prepare("UPDATE tbl_sucursales SET nombre = :nombre, direccion = :direccion, suc_status = :suc_status, prod_id = :prod_id, suc_stock = :suc_stock WHERE suc_id = :suc_id");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':suc_status', $suc_status);
        $stmt->bindParam(':prod_id', $prod_id);
        $stmt->bindParam(':suc_stock', $suc_stock);
        $stmt->bindParam(':suc_id', $suc_id);
        return $stmt->execute();
    }

    public static function eliminarSucursal($suc_id) {
        global $conexion;
        $stmt = $conexion->prepare("UPDATE tbl_sucursales SET suc_estado = 'I' WHERE suc_id = :suc_id");
        $stmt->bindParam(':suc_id', $suc_id);
        return $stmt->execute();
    }
}

?>
