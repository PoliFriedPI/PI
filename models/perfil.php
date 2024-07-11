<?php

class perfil {

    private $per_id;
    private $per_nombre;
    private $per_apellido;
    private $per_email;
    private $per_password;
    private $per_estado;
    private $rol_id;

    public function __construct($per_id, $per_nombre, $per_apellido, $per_email, $per_password, $per_estado, $rol_id) {
        $this->per_id = $per_id;
        $this->per_nombre = $per_nombre;
        $this->per_apellido = $per_apellido;
        $this->per_email = $per_email;
        $this->per_password = $per_password;
        $this->per_estado = $per_estado;
        $this->rol_id = $rol_id;
    }


    public function getPer_id() {
        return $this->per_id;
    }

    public function getPer_nombre() {
        return $this->per_nombre;
    }

    public function getPer_apellido() {
        return $this->per_apellido;
    }

    public function getPer_email() {
        return $this->per_email;
    }

    public function getPer_password() {
        return $this->per_password;
    }

    public function getPer_estado() {
        return $this->per_estado;
    }

    public function getRol_id() {
        return $this->rol_id;
    }

    public function setPer_id($per_id): void {
        $this->per_id = $per_id;
    }

    public function setPer_nombre($per_nombre): void {
        $this->per_nombre = $per_nombre;
    }

    public function setPer_apellido($per_apellido): void {
        $this->per_apellido = $per_apellido;
    }

    public function setPer_email($per_email): void {
        $this->per_email = $per_email;
    }

    public function setPer_password($per_password): void {
        $this->per_password = $per_password;
    }

    public function setPer_estado($per_estado): void {
        $this->per_estado = $per_estado;
    }

    public function setRol_id($rol_id): void {
        $this->rol_id = $rol_id;
    }

    public static function getByEmail($email) {
        global $conexion;
        $stmt = $conexion->prepare("SELECT * FROM perfil WHERE per_email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Perfil($row['per_id'], $row['per_nombre'], $row['per_apellido'], $row['per_email'], $row['per_password'], $row['per_estado'], $row['rol_id']);
        } else {
            return null;
        }
    }

}
?>