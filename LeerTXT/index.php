<?php

	/***************************************************************************
     *  Para que esta app pueda funcionar devera de:
     *  
     *      Crear la db con una estructura => 
     *          -Nombre: unapec, 
     *          -Tabla: estudiante, 
     *          -Atributos: Nombre, Apellido, Matricula y Monto.
     *          
     *              _____________
     *              |estudiante |
     *              |-----------|
     *              | Nombre    |
     *              | Apellido  |
     *              | Matricula |
     *              | Monto     |
     *              -------------
     * 
     *      -Cambiar el driver de coneccion (Host, password, userID, Ubicacion).
     *      
     *      -De ser necesario la ubicacion de donde se esta guardando el archivo de texto.
     *      
     *      -El archivo de texto que se genera, esta guardado en una carpeta especifica dentro del
     *      servidor php donde la esta aplicacion puede consumir sus datos. Debe tener muy en cuenta
     *      este paso para el funcionamiento normal de la aplicacion.
     *      
     *  Funcionalidad o proposito de la app:
     *  
     *      Leer un archivo de texto.
     *      Guardar datos en una db.
     *      
     *  Comentario:
     *      ...
     *      
    ***************************************************************************/

	$con = mysql_connect("localhost:3307","root", "root")or die ("Error al conectar con el servidor.");//Conectamos con el servidor
	mysql_select_db("unapec",$con)or die("Error al seleccionar la db");//Seleccionamos la db
	$Estudiantes = fopen("archivo\\estudiante.txt","r");//Abrimos el archivo de texto, en la ruta ya especificada 
	$conter=false;
	while (!feof($Estudiantes)) {//Leemos todas las linesa del archivo de texto
		$Estudiantes_ = fgets($Estudiantes);
		$estudiante = explode(",", $Estudiantes_);//dividimos los datos por comas y los guardamos en este arreglo
		if($conter){
			echo "Nombre: ".$estudiante[0]." \t   ";
			echo "Apellido: ".$estudiante[1]." \t   ";
			echo "Matricula: ".$estudiante[2]."  \t  ";
			echo "Monto: ".$estudiante[3]."   \t ";
			$query = "INSERT INTO estudiante(Nombre, Apellido, Matricula, Monto) VALUES ('".$estudiante[0]."','".$estudiante[1]."','".$estudiante[2]."','".$estudiante[3]."')";//Generamos el query
			$consulta = mysql_query($query,$con) or die ("Error al insertar valores a la db.");//Ejecutamos el query
			if($consulta){//verificamos que todo se halla guardado
				echo " <= Se ha registrado sastifactoriamente";
			}else{
				echo "No se ha registrado.";
			}
			echo "<br/>";
			
		}else{
			echo "Bienvenido.<br/>";
		}
		$conter=true;	
	}
	echo "Wiiiiiiiiiiiiiiiiiiiii. Se ha registrado todo :p";
	mysql_close($con);//Cerramos conexion a base de datos.
	fclose($Estudiantes);//Cerramos el archivo de texto.

?>