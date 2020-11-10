<?php 
  session_start();
  session_unset();
  setcookie ('abierta',"",time()-9000);
  session_destroy();
  header("location:../frmLogin.php");
?>