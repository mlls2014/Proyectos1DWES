<?php
/**
 * Script que muestra en una tabla los valores enviados por el usuario a través 
 * del formulario utilizando el método POST
 */
// Alternativa para detectar el envío de un formulario: if($_SERVER['REQUEST_METHOD']=='POST')
// Se recomienda el control del botón cuando existan más de un formulario
  if(isset($_POST["submit"]))
    {       
  	if(!empty($_POST["name"]) && (!preg_match("/[0-9]/", $_POST["name"])) && (strlen($_POST["name"])<15)) 
          { $nombre = trim($_POST["name"]);
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
            echo "Nombre:" . $nombre ."<br/>"; 
          }
	
	if(!empty($_POST["surname"]) && (!preg_match("/[0-9]/", $_POST["surname"])) && (strlen($_POST["surname"])<20))
          { $apellidos = trim($_POST["surname"]);
             $apellidos = filter_var($apellidos, FILTER_SANITIZE_STRING);
             echo "Apellidos:" . $apellidos ."<br/>"; 
          }

	if(!empty($_POST["bio"]))
          { $mibiograf = $_POST["bio"];
            $mibiograf = trim($mibiograf); // Eliminamos espacios en blanco
            $mibiograf = htmlspecialchars($mibiograf); //Caracteres especiales a HTML
            $mibiograf = stripslashes($mibiograf); //Elimina barras invertidas
            echo "Biografía:" . $mibiograf . "<br/>";  
          }
	
	if(!empty($_POST["email"]))
          { $correo = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
            if(filter_var($correo,FILTER_VALIDATE_EMAIL))
              {  echo "email:" . $correo . "<br/>"; }
          }

          if(!empty($_POST["password"]) && (strlen($_POST["password"])>6) && (strlen($_POST["password"])<10))
          { echo "Contraseña:" . sha1($_POST["password"])."<br/>"; }
	
	if(!empty($_POST["role"]))
          { echo "Perfil:" . $_POST["role"]."<br/>"; }
	
	if(isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"]))
          { echo "Fotografía:" . "La imagen nos ha llegado ;)"; }
    }
 ?>
