<?php
class MiClase{
	public    $factor1=7; // esta es pública
	private   $factor2=8;  // variable privada
	protected $factor3=3; // variable protegida

	function calcula($a=3,$b=5){ // al no indicar visibilidad será pública
		return $this->factor1 -$b + $this->factor2 *$a - $this->factor3;
	}
}

/* creamos un objeto utilizando el nombre exacto de la clase*/
$obj1=new MiClase; //en este caso no lleva paréntesis
/* leeremos los valores de las propiedades */
print "<br />Valor por defecto de la propiedad factor1: ";
/* solo podremos leer desde aquí la propiedad publica factor1
Las propiedades privadas y protegidas solo son accesibles desde la pro-pia clase
y aquí estamos haciendo desde uno objeto que la instancia */
print $obj1->factor1;
print "<br />Aplicación del método calcula ";
print "<br />No pasamos argumentos. Por tanto calcula con 'a'=3 y 'b'=5: ";
print $obj1->calcula();
print "<br />Pasamos 15 como argumento por  tanto calcula con 'a'=15 y 'b'=5: ";
print $obj1->calcula(15);
print "<br />Pasamos 125 y -98 como argumentos por  tanto calcula con 'a'=125 y 'b'=98: ";
print $obj1->calcula(125,-98);
/* solo podemos modificar desde aquí la propiedad factor1. Las otras dos por su carácter
  privado y restringido solo podrían ser modificadas desde dentro de la propia clase
  o de una clase extendida */
print "<br />Modificamos el valor de la propiedad factor1: ";
$obj1->factor1=196;
print $obj1->factor1;
print "<br />Cálculo con los nuevos valores por defecto: ";
print $obj1->calcula();
/* creamos un nuevo objeto y comprobamos que la modificación de la pro-piedad factor1
no afectará al nuevo objeto (la modificación se hizo en el objeto ante-rior no en la clase) */
$obj2=new MiClase;
print "<br />Cálculo con valores por defecto del nuevo objeto: ";
print $obj2->calcula();
print "<br />Cálculo con valores por defecto del objeto anterior: ";
print $obj1->calcula();
/* destruimos el primero de los objetos aunque no sea necesario hacerlo.
   Al finalizar el script se destruiría de forma automática */
$obj1=null;
?>

