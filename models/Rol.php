<?php

class rol {

    private $rol_id;
    private $rol_nombre;
    private $rol_estado;

    public function __construct($rol_id, $rol_nombre, $rol_estado) {
        $this->rol_id = $rol_id;
        $this->rol_nombre = $rol_nombre;
        $this->rol_estado = $rol_estado;
    }


    public function getRol_id() {
        return $this->rol_id;
    }

    public function getRol_nombre() {
        return $this->rol_nombre;
    }

    public function getRol_estado() {
        return $this->rol_estado;
    }

    public function setRol_id($rol_id): void {
        $this->rol_id = $rol_id;
    }

    public function setRol_nombre($rol_nombre): void {
        $this->rol_nombre = $rol_nombre;
    }

    public function setRol_estado($rol_estado): void {
        $this->rol_estado = $rol_estado;
    }
}

?>
