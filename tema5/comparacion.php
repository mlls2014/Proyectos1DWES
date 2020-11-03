<?php

class Flag{
    public $flag;

    function __construct($flag = true) {
        $this->flag = $flag;
    }
}

class OtherFlag{
    public $flag;

    function __construct($flag = true) {
        $this->flag = $flag;
    }
}

$o = new Flag();
$p = new Flag();
$q = $o;
$r = new OtherFlag();

//Dos instancias de la misma clase $o y $p
$o == $p;  //TRUE
$o != $p;  //FALSE
$o === $p;  //FALSE
$o !== $p;  //TRUE

//Dos referencias a la misma instancia $o y $q
$o == $q;  //TRUE
$o != $q;  //FALSE
$o === $q;  //TRUE
$o !== $q;  //FALSE

//Instancias de dos clases distintas $o y $r
$o == $r;  //FALSE
$o != $r;  //TRUE
$o === $r;  //FALSE
$o !== $r;  //TRUE


