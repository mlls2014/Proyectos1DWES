<?php
require_once 'conectarbd.php';
/**
 * La página a la que deseamos acceder mediante los botones de paginación se recibirá 
 * a través de la variable 'pagina' de GET. Si no se recibe ningún valor, se tomará, por 
 * defecto, el mostrar la página nº1
 */
 //Establecemos el número de registros a mostrar por página,por defecto 2
 $regsxpag = (isset($_GET['regsxpag']))? (int)$_GET['regsxpag']:2;
 //Establecemos la página que vamos a mostrar, por página,por defecto la 1
 $pagina = (isset($_GET['pagina']))? (int)$_GET['pagina']:1;

 //Definimos la variable $inicio que indique la posición del registro desde el que se
 // mostrarán los registros de una página dentro de la paginación.
 $offset= ($pagina>1)? (($pagina - 1)*$regsxpag): 0;
 //SQL_CALC_FOUND_ROWS está siendo depreciado en MySQL
 //Vamos a usar COUNT en su lugar
 //Calculamos el número de registros obtenidos
 $totalregistros= $pdo->query("SELECT count(*) as total FROM usuarios");
 $totalregistros = $totalregistros->fetch()['total'];
 
 //$sql="SELECT * FROM usuarios  ORDER BY nombre LIMIT $offset, $regsxpag";
 //Sintaxis más clara
 $sql="SELECT * FROM usuarios  ORDER BY nombre LIMIT $regsxpag OFFSET $offset";
 $registros = $pdo->prepare($sql);
 //Ejecutamos la consulta...
 $registros->execute();
 //Almacenamos en una variable los registros obtenidos de la consulta
 $registros=$registros->fetchAll(PDO::FETCH_ASSOC);
 
 //Determinamos el número de páginas de la que constará mi paginación
 $numpaginas=ceil($totalregistros/$regsxpag);
