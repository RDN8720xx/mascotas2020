<?php
// CONTROLADOR EjemplarController
class FotoController{
    
    // muestra el formulario de nuevo ejemplar
    public function create(int $idmascota=0){
        
        // recupera la mascota para mostrar informacion en la vista
        $mascota = Mascota::getMascota($idmascota);
        
        // si no hay mascota...
        if(!$mascota)
            throw new Exception("No se encontró la mascota");
        // carga la vista para crear ejemplares
        include 'views/foto/nueva.php';
    }
    
    // guarda la nueva foto
    public function store(){
        
        //comprueba que llegue el formulario con los datos
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
        
        $f = new Foto(); //crea una nueva foto
        
        //recupera los datos del formulario que llegar por POST
        $f->idmascota = intval($_POST['idmascota']);
        $f->fichero = $_POST['fichero'];
        $f->ubicacion = $_POST['ubicacion'];
        $f->fechanacimiento = $_POST['fechanacimiento'];
        $f->fechadepasoAOL = $_POST['fechadepasoAOL'];
        $f->idmascota = Login::getMascota($id);
    }
   
}