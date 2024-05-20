<?php
require 'conexion.php';

class Visitantes extends Conexion{
    public $vis_id;
    public $vis_nombres;
    public $vis_apellidos;
    public $vis_procedencia;
    public $vis_fecha_ingreso;
    public $vis_fecha_salio;
    public $vis_razon;

    public function __construct($args = [])
    {
        $this->vis_id = $args['vis_id'] ?? null;
        $this->vis_nombres = $args['vis_nombres'] ?? '';
        $this->vis_apellidos = $args['vis_apellidos'] ?? '';
        $this->vis_procedencia = $args['vis_procedencia'] ?? ' ';
        $this->vis_fecha_ingreso = $args['vis_fecha_ingreso'] ?? '';
        $this->vis_fecha_salio = $args['vis_fecha_salio'] ?? '';
        $this->vis_razon = $args['vis_razon'] ?? '';

    }

      // METODO PARA INSERTAR
      public function guardar(){
        $sql = "INSERT into visitantes (vis_nombres, vis_apellidos, vis_procedencia, vis_fecha_ingreso, vis_fecha_salio, vis_razon) values ('$this->vis_nombres',
         '$this->vis_apellidos', '$this->vis_procedencia', '$this->vis_fecha_ingreso', '$this->vis_fecha_salio' '$this->vis_razon')";
        $resultado = $this->guardar($sql);
        return $resultado; 
    }


    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM visitantes where vis_situacion = 1 ";

        if($this->vis_nombres != ''){
            $sql .= " AND vis_nombres like '%$this->vis_nombres%' ";
        }
        if($this->vis_apellidos != ''){
            $sql .= " AND vis_apellidos = $this->vis_apellidos ";
        }

        if($this->vis_procedencia != ''){
            $sql .= " AND vis_nit = $this->vis_procedencia ";
        }

        if($this->vis_fecha_ingreso != ''){
            $sql .= " AND vis_fecha_ingreso = $this->vis_fecha_ingreso ";
        }
        
        if($this->vis_fecha_salio != ''){
            $sql .= " AND vis_fecha_salio = $this->vis_fecha_salio ";
        }

        if($this->vis_razon != ''){
            $sql .= " AND vis_fecha_salio = $this->vis_fecha_salio ";
        }


        $resultado = self::buscar($sql);
        return $resultado;
    }
}

