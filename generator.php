<?php
session_start();



if(isset($_SESSION['osoba']))
 {
   include ("mechanik/funkcje.php");
   include ("mechanik/connection.php");

   print "sprawdzasz ".$_POST['klucz']." x ".$_SESSION['osoba'];
 }


?>
