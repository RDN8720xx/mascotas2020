<?php
class Mascota{
    //PROPIEDADES
    public $id=0, $nombre='', $biografia='',
    $sexo='', $fechanacimiento='', $fechadepasoAOL='', $idraza=0, $idusuario=0;
    
    //METODOS DEL CRUD
    //recuperar todas las mascotas
        public static function get():array{
            $consulta="SELECT * FROM mascotas"; //preparar la consulta
            return DB::selectAll($consulta, self::class);
        }
        
     //recuperar una mascota concreto por id
        public static function getMascota(int $id):?Mascota{
            $consulta="SELECT * FROM mascotas WHERE id=$id"; //preparar la consulta
            return DB::select($consulta, self::class); //ejecutar y retornar el resultado
        }
        
      // recuperar anuncios con un filtro avanzado
      public static function getFiltered(string $campo='nombre', string $valor='',
          string $orden='id', string $sentido='ASC'):array{
          
          $consulta="SELECT *
                    FROM mascotas
                    WHERE $campo LIKE '%$valor%'
                    ORDER BY $orden $sentido";
          
          // echo $consulta;
          
          return DB::selectAll($consulta, self::class);
          
          
      }
        

        public function guardar(){ //insertar un nuevo anuncio
            $consulta="INSERT INTO mascotas(nombre, sexo, biografia,
                            fechanacimiento, fechadepasoAOL, idusuario, idraza)
                VALUES('$this->nombre','$this->sexo','$this->biografia',
                       $this->fechanacimiento, '$this->fechadepasoAOL, 
                       $this->idusuario, $this->idraza)";
            
            echo $consulta;
            
            return DB::insert($consulta);

        }

        public static function borrar(int $id){ //borrar una mascota por id
            //preparar la consulta
            $consulta="DELETE FROM mascotas WHERE id=$id";
            
            echo $consulta; //Visualizacion de prueba de los datos de la mascota a borrar
            
            //ejecutar consulta
            return DB::delete($consulta);
            
        }
        
        public function actualizar(){ //actualizar una mascota
            //preparar consulta
            $consulta="UPDATE mascotas SET
                            nombre='$this->nombre',
                            sexo='$this->sexo',
                            biografia='$this->biografia',
                            fechanacimiento=$this->fechanacimiento,
                            fechadepasoAOL=$this->fechadepasoAOL,
                            
                            
                        WHERE id=$this->id";      
            
            echo $consulta;

            return DB::update($consulta);
        }
        
        public function __toString():string{ //__toString
            return "$this->id $this->nombre $this->biografia, $this->fechanacimiento,
                 $this->fechadepasoAOL, $this->idusuario, $this->idraza";
        }
        
        //pasa un array de libros a JSON
        public static function tojson(array $lista):string{
            return json_encode($lista);
        }
}