<?php
class Foto{
    
    // PROPIEDADES
    public $id=0, $fichero='', $ubicacion='', $idmascota=0;
    
    // recuperar una foto por id
    public static function get(int $id = 0):?Foto{
        $consulta = "SELECT * FROM fotos WHERE id=$id";
        return DB::select($consulta, self::class);
    }
    
    // recuperar la mascota a la que pertenecen las fotos
    public function getMascota():?Mascota{
        $consulta = "SELECT * FROM mascotas WHERE id=$this->idmascota";
        return DB::select($consulta, 'Mascota');
    }
    
    // nueva foto
    public function guardar(){
        $consulta="INSERT INTO fotos(idmascota, fichero, ubicacion)
                    VALUES($this->idmascota, $this->fichero,$this->ubicacion)";
        return DB::insert($consulta);
    }
    
    // borrar ejemplar
    public static function borrar(int $id){
        $consulta="DELETE FROM fotos WHERE id=$id";
        return DB::delete($consulta);
    }
    
    // toString
    public function __toString():string{
        return "$this->id: foto  $this->fichero en ($this->ubicacion);";
    }
}