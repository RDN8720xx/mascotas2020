<?php
class MascotaController{
    //operacion por defecto
    public function index(){
        $this->list(); //nos lleva a la lista de mascotas
    }
    
    //operacion para listar todos las mascotas
    public function list(){
        //recuperar la lista de mascotas
        $mascotas=Mascota::get();
        
        //cargar la vista del listado
        $identificado=Login::getUsuario();
        $usuario=Login::getUsuario(); //recupera el usuario actual
        include 'views/mascota/list.php';
    }
    
    //muestra una mascota
    public function show($id=false){
        //comprobar que me llega el codigo
        if(!$id)
            throw new Exception("No se indico la mascota.");
        
        //recuperar el libro con dicho codigo
        $mascota=Mascota::getMascota($id);
        
        //comprobar que el anuncio existe
        if(!$mascota)
            throw new Exception("No existe la mascota $id.");
        
        //cargar la vista de detalles
        $usuario=Login::getUsuario(); //recupera el usuario actual
        include 'views/mascota/details.php';
    }
    
    //GUARDAR SE HACE EN DOS PASOS
    //PASO 1: muestra el formulario de nuevo anuncio
    public function create(){
        $usuario=Login::getUsuario(); //recupera el usuario actual
        include 'views/mascota/form_new.php';
    }
    //PASO 2: guarda la nueva mascota
    public function store(){
        
        $identificado=Login::getUsuario();
        $usuario=Login::getUsuario(); //recupera el usuario actual
        // echo $usuario; // visualizo los datos del usuario
        
        $mascota = new Mascota(); //nueva mascota, la informacion viene por POST

        $mascota->nombre=$_POST['nombre'];
        $mascota->sexo=$_POST['sexo'];
        $mascota->biografia=$_POST['biografia'];
        $mascota->fechanacimiento=$_POST['fechanacimiento'];
        $mascota->fechadepasoAOL=$_POST['fechadepasoAOL'];        
        $mascota->idraza=$_POST['idraza'];
        $mascota->idusuario=Login::getUsuario()->id;
        
      
        
        // TRATAMIENTO DEL FICHERO DE IMAGEN
        //if(Upload::llegaFichero('imagen'))
            $mascota->imatge =$_FILES['imatge'];
        //        Upload::procesar($_FILES['imatge'],'imagenes/libros',true,0,'image/*');
        
        if(!$mascota->guardar()) //guardar en la BDD
            throw new Exception("No se pudo guardar $mascota->nombre");
        
        //muestra la vista de exito
        $usuario=Login::getUsuario(); //recupera el usuario actual
        $mensaje="Registro de la mascota $mascota->nombre correcto.";
        include 'views/exito.php'; //mostrar exito
    }
    
    //ACTUALIZAR SE HACE EN DOS PASOS
    
    //PASO 1: muestra el formulario de edicion de una mascota
    public function edit(int $id=0){
        //comprobar que me llega el identificador
        if(!$id)
            throw new Exception("No se indico la mascota.");
        
        //recuperar la mascota con dicho codigo
        $mascota=Mascota::getmascota($id);
        
        //comprobar que la mascota existe
        if(!$mascota)
            throw new Exception("No existe la mascota $id.");
        
        //cargar la vista del formulario
        $usuario=Login::getUsuario(); //recupera el usuario actual
        include 'views/mascota/form_update.php';
    }

    //PASO 2: aplica los cambios de un mascota
    public function update(){
        
        //comprueba que llegue el formulario con los datos
        if(empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos');
        
        $identificado=Login::getUsuario();
        $usuario=Login::getUsuario(); //recupera el usuario actual
        
        //recuperar el anuncio de la BDD
        $mascota = Mascota::getMascota(intval($_POST['id']));
        
        // recuperar que existe la mascota
        if(!$mascota)
            throw new Exception('No existe la mascota.');
        
        $mascota = new Mascota(); //nuevo anuncio
        $mascota->id=intval($_POST['id']); //recuperar el id via POST
                
        $mascota->nombre=$_POST['nombre']; //resto de campos
        $mascota->sexo=$_POST['sexo'];
        $mascota->biografia=$_POST['biografia'];
        $mascota->fechanacimiento=$_POST['fechanacimiento'];
        $mascota->fechadepasoAOL=$_POST['fechadepasoAOL'];
        $mascota->idraza=$_POST['idraza'];
        $mascota->idusuario=Login::getUsuario()->id;
        
        echo $mascota; // visualizo los datos de la mascota
        
        //mirar si nos piden eliminar la imagen actual
        if(!empty($_POST['eliminarimagen'])){
            // recuerda la imagen antigua para borrarla si se actualiza bien el anuncio
            $imagenABorrar = $mascota->imatge;
            
            //quitamos la imagen de los datos de la mascota
            $mascota->imatge = '';
        }
        //TRATAMIENTO DEL FICHERO DE IMAGEN
        //mirar si nos envian imagen nueva
        if(Upload::llegaFichero('imatge')){
            //recuerda la imagen antigua para borrarla si se actualiza bien la mascota
            $imagenASustituir = $mascota->imatge;
            
            // procesarmos la nueva imagen y actualizamos la ruta
            $mascota->imatge = Upload::procesar(
                $_FILES['imatge'], 'imagenes/mascotas', true, 0, 'image/*');
        }
        
        
        
            $mascota->imatge =$_FILES['imatge'];
        //        Upload::procesar($_FILES['imatge'],'imagenes/anuncios',true,0,'image/*');
        
        // intenta realizar la actualizacion de datos
        if($mascota->actualizar()===false){ //intenta actualizar
            //si falla la actualizacion
            @unlink($mascota->imatge);  // borra la imgen recien subida
            
            throw new Exception("No se pudo actualizar $mascota->titol");
        }
        
        //borra las imagenes que no hacen falta
        @unlink($imagenABorrar);
        @unlink($imagenASustituir);
        
        // prepara un mensaje
        $GLOBALS['$mensaje'] = "Actualizacion de la mascota $mascota->nombre correcto.";
        //include 'view/exito.php';
        
        // repite la operacion edit, asi mantendra al usuario en la vista de la edicion
        $this->edit($mascota->id); 
    }

    //ELIMINAR SE HACE EN DOS PASOS
    //(si queremos hacerlo con formulario de confirmacion)
    
    //PASO 1: muestra el formulario de configuracion de eliminacion
    public function delete(int $id=0){
        //comprobar que me llega el identificador
        if(!$id)
            throw new Exception("No se indico la mascota a borrar.");
        
        //recuperar el libro con dicho identificador
        $mascota=Mascota::getMascota($id);
        
        //comprobar el libro con dicho identificador
        if(!$anunci)
            throw new Exception("No existe el anunci $id");
        
        //ir al formulario de confirmacion
        $usuario=Login::getUsuario(); //recupera el usuario actual
        include 'views/mascota/confirm_delete.php';
    }
    
    //PASO 2: elimina la mascota
    public function destroy(){
        
        // comprueba que llegue el formulario de confirmacion
        if(empty($_POST['borrar']))
            throw new Exception('No se recibio confirmacion');
        
        //recuperar el identificador via POST
        $id=intval($_POST['id']);
        
        //para poder borrar la imagen del servidor, necesito recuperar
        // la mascota antes de borrarla (necesito el campo imagen)
        if(!$mascota = Mascota::getMascota($id))
            throw new Exception('No existe la mascota indicada');    
           
        //intenta borrar la mascota de la BDD
        if(Mascota::borrar($id)===false)
            throw new Exception('No se pudo borrar');
        
        @unlink($mascota->imatge); // borra la imagen del servidor
        
        $usuario=Login::getUsuario(); //recupera el usuario actual
        $mensaje="Borrado de la mascota $id correcto.";
        include 'views/exito.php'; //mostrar exito
        
        
    }
    
    //metodo del controlador MascotaController para exportar libros a XML (DAT 20 PAG 50)
    public function exportxml(){
        //comprobamos si nos piden descargar o no
        $descargar=!empty($_POST['descargar']);
        
        //recuperamos las mascotas y las pasamos a XML
        $lista=Mascota::get();
        $raiz='mascotas';
        $elemento='mascota';
        $namespace= 'http://mascotas.local/xml/mascotas';
        
        $xml = XML::toXML($lista, $raiz, $elemento, $namespace);
        
        include 'views/mascota/xml.php'; //carga la vista
        
    }
    //metodo de Ad para importar anuncios desde XML (falta validar con Schema!)
    //DAT 20 pag 55
    public function importxml(){
        if(!Login::privilegio(500)) //requiere privilegio 500
            throw new Exception('No tienes permisos');
        if($_FILES['xml']['error'])  //comprobar que no hay error en el fichero
            throw new Exception('Error al cargar');
        
        //comprobarcion del tipo de fichero
        $tipo = (new finfo(FILEINFO_MIME_TYPE))->file($_FILES['xml']['tmp_name']);
        if(strtolower($tipo)!='text/xml')
            throw new Exception('El fichero no es XML');
        
        //recupera la lista de mascotas desde el fichero XML
        $mascotas= XML::fromXML($_FILES['xml']['tmp_name'],'Mascota',true);
        
        //guarda en la BDD y prepara mensaje
        $mensaje='';
        foreach($mascotas as $mascota)
            $mensaje.=$mensaje->guardar()? "<p>$mascota guardado</p>":"<p>$mascota NO guardada</p>";
        
        $usuario = Login::getUsuario();
        include 'views/exito.php';
    }
    
    //exporta todas las mascotas a JSON
    public function exportjson(){
        //comprobamos si nos piden descargar o no
        $descargar=!empty($_POST['descargar']);
        
        //recuperamos los anuncios y los pasamos a JSON
        $json = Mascota::tojson(Mascota::get());
        
        include 'views/mascota/json.php'; //carga la vista
    }
    // metodo para buscar mascotas
    public function buscar(){
        
        // toma los valores que llegan del formulario de busqueda
        $campo = empty($_POST['campo'])? 'nombre' : $_POST['campo'];
        $campo = empty($_POST['valor'])? '' : $_POST['valor'];
        $campo = empty($_POST['orden'])? 'id' : $_POST['orden'];
        $campo = empty($_POST['sentido'])? 'ASC' : $_POST['sentido'];
        
        // recupera la lista de mascotas
        $mascotas = Mascota::getFiltered($campo, $valor, $orden, $sentido);
        
        // carga la vista para mostrar la lista
        require_once 'views/mascota/list.php';
        
    }
         
}
    
