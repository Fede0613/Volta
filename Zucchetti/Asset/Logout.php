<?php 
session_start();
$pagina = $_GET['pagina'];
$_SESSION[] = array();
session_unset();
session_destroy();
header("location: $pagina");
?>