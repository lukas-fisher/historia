<?php
session_start();



if(isset($_SESSION['osoba']))
 {
   include ("mechanik/funkcje.php");
   include ("mechanik/connection.php");

   if ($_POST['funkcja'] == "nurkowanie")
    {
      pasek_dodawania($_POST['klucz']);
      print "<div id='odczyt'>";
      print "wyniki ".$_POST['klucz']." x ".$_SESSION['osoba'];
      print "</div>";

    }

   elseif ($_POST['funckja'] == "zapisz")
    {
     print "tutaj zapiszę do bazy:<br/>";
     print $_POST['numer']."<br/>";
     print $_SESSION['osoba']."<br/>";
     print moja_data();
     print "<br/>";
     print $_POST['efektywnosc']."<br/>";
     print $_POST['status']."<br/>";
    }
 }


?>
