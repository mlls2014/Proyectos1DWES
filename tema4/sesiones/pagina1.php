<?php
session_start();
$identificador=session_id();
echo $identificador;
$_SESSION['nombre'] = 'Juan';
