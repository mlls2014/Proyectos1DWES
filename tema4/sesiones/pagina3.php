<?php
session_start();
$identificador=session_id();
echo $identificador;
echo $_SESSION['nombre'];