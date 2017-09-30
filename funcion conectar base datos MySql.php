<?php
//CONECTAMOS LA BASE DE DATOS versiones PHP anteriores a 7.0
function conectar_bd(){

	$host="localhost";
    $usuario="intruduce usuario aqui";
    $pass="introduce contraseña aqui";
    $base_datos="introduce nombre base datos aqui";
    
    
    
    $conexion=mysql_connect($host,$usuario,$pass) or die("Problemas en la conexion");  //Establecemos la conexión
    
    mysql_select_db($base_datos,$conexion) or die("Problemas en la seleccion de la base de datos"); //Seleccionamos la base de datos
    
    mysql_query("SET NAMES 'utf8'"); // codificamos a utf8 para que se muestren acentos y las "ñ"
    
    
	return $conexion; 
}
/////////////////////////////////////////////

//CONECTAMOS LA BASE DE DATOS versiones PHP 7.0 y posteriores
function conectar_bd2(){

	$host="localhost";
    $usuario="intruduce usuario aqui";
    $pass="introduce contraseña aqui";
    $base_datos="introduce nombre base datos aqui";
    
    
    
    $conexion = new mysqli($host,$usuario,$pass, $base_datos); //Establecemos la conexión con la base de datos

	if ($conexion->connect_errno) {
		//Procedemos a mostrar el error que genera la conexión
		echo "Problemas en la conexion con la BBDD";
	
		//Procederemos a mostrar los errores generados (cuidado con sitios públicos ya que en caso de generar algún error puede dar información delicada)
		echo "Error: Fallo al conectarse a MySQL debido a: \n";
		echo "Errno: " . $conexion->connect_errno . "\n";
		echo "Error: " . $conexion->connect_error . "\n";
		
		// Salimos del bucle
		exit;
	}
	$conexion->query("SET NAMES 'utf8'"); // codificamos la consulta a UTF8 para los acentos y "ñ"
    
    
	return $conexion; 
}
/////////////////////////////////////////////


// Para obtener una variable con la conexión bastará con llamar a la funcion que hemos creado

$conexion1=conectar_bd(); //para versiones anteriores a 7.0 de php

$conexion2=conectar_bd2(); //para la versión 7.0 y posteriores de php
?>