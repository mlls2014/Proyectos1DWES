<?php
  class MiClase {
    /* definimos constantes */
    const cadena1="Soy una cadena";
    const cadena2=1.234;

    /* aqui usamos sintaxis de documento incrustado */
    const cadena3=<<<'cde'
    Soy una cadena incluida dentro de una constante
    mediante la sintaxis de documento incrustado.
    Esta sintaxis funciona siempre que la versión
    de PHP sea superior a 5.3
cde;

    /* definimos una variable estática */
    public static $estatica=<<<'fdg'
    Soy una variable estática y soy pública. Tanto yo como las constantes
    podemos ser visualizadas sin necesidad de crear un objeto.
    Utilizando  :: puede vérseme sin problemas.
fdg;

	public static $titulo = 'title'; //propiedad estática pública
	public $valor = 10;	//propiedad pública

/* incluyamos dos funciones definidas como estáticas */

   public static function mi_estatica($a,$b){
        return pow($a, $b)*self::cadena2- MiClase::otra_estatica($a,$b);
   }

   public static function otra_estatica($a=3,$b=2){
        return pow($b, $a) + MiClase::cadena2;
   }

}
/* he escrito la clase pero no voy a crear ningún objeto.
   Visualizo los elementos y ejecutaré los métodos estáticos */
print MiClase::cadena1 . "<br />";
print MiClase::cadena2 . "<br />";
print MiClase::cadena3 . "<br />";
print MiClase::$estatica . "<br />";
print MiClase::mi_estatica(6,5) . "<br />";
print MiClase::otra_estatica() . "<br />";

/* creamos un nuevo objeto instanciando esta clase */
$obj= new MiClase;
$obj->valor='Hola';
$obj::$titulo='Ha cambiado el titulo de esta pagina';
/* visualizamos los diferentes elementos (constantes, variables y
variables estáticas aplicando la sintaxis adecaduada a cada caso) */
print $obj::cadena1 . "<br />";;
print $obj::cadena2 . "<br />";;
print $obj::cadena3 . "<br />";;
print $obj->valor . "<br />";;
print $obj::$titulo . "<br />";;
print $obj::mi_estatica(6,5) . "<br />";;
?>
