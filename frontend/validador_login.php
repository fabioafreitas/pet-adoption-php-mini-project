<?php
session_start();
if(!isset($_SESSION['admin_esta_autenticado'])){
  header("Location: login.php");
  exit();
}
?>