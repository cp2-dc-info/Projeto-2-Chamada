<?php
session_start();
unset($_SESSION['usuariologado']);
header('location: ../Index.php');

?>