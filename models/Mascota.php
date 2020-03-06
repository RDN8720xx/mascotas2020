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
            $consulta="INSERT INTO anuncis(titol, descripcio,
                            preu, imatge, idusuario)
                VALUES('$this->titol','$this->descripcio',
                       $this->preu, '$this->imatge',$this->idusuario)";
            
            echo $consulta;
            
            return DB::insert($consulta);

        }

        public static function borrar(int $id){ //borrar un anuncio por id
            //preparar la consulta
            $consulta="DELETE FROM anuncis WHERE id=$id";
            
            echo $consulta; //Visualizacion de prueba de los datos del anuncio a borrar
            
            //ejecutar consulta
            return DB::delete($consulta);
            
        }
        
        public function actualizar(){ //actualizar un anuncio
            //preparar consulta
            $consulta="UPDATE anuncis SET
                            titol='$this->titol',
                            descripcio='$this->descripcio',
                            preu='$this->preu',
                            imatge='$this->imatge'
                        WHERE id=$this->id";      
            
            echo $consulta;

            return DB::update($consulta);
        }
        
        public function __toString():string{ //__toString
            return "$this->id $this->titol $this->descripcio, $this->preu, $this->imatge,
                 $this->idusuario";
        }
        
        //pasa un array de libros a JSON22
        public static function tojson(array $lista):string{
            return json_encode($lista);
        }
}