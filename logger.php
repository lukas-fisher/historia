<?php
session_start();
include("mechanik/funkcje.php");

if (isset($_POST['funkcja']))
 {
  print "<div id='funkcja'>";
  if ($_POST['funkcja'] == "zaloguj")
   {
    if (isset($_POST['klucz']))
     {
       if ($_POST['klucz'] == "123456")
        {
         print "cześć Daniel ;)<br/>";
         $_SESSION['osoba'] = "1";
         drukuj_szukacz();
        }

     }
   }
  print "</div>";
 }
else {
  print "error: błędne działanie skryptu";
}

?>
