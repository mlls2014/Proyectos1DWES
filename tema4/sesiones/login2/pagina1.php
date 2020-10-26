<?php
   session_start();
   if(isset($_SESSION['verificado'])){
       echo "Esta es tu página privada";
     } else {   header ("Location: login.php?error=fuera"); }
