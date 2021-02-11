<?php
session_start();



if(isset($_SESSION['osoba']))
 {
   include ("mechanik/funkcje.php");
   include ("mechanik/connection.php");
   include ("mechanik/db.php");

   if ($_POST['funkcja'] == "nurkowanie")
    {
      pasek_dodawania($_POST['klucz']);
      print "<div id='odczyt'>";
      $wynik = db_szukaj($_POST['klucz']);

      if ($wynik == TRUE)
       {
        drukuj_wyniki($wynik);
       }
      else {
         print "brak danych";
      }
      print "</div>";

    }

   elseif ($_POST['funkcja'] == "zapisz")
    {
     print "dodawanie...<br/>";
     db_dodaj($_POST['numer'], $_SESSION['osoba'], moja_data(), $_POST['efektywnosc'], $_POST['status']);

     $wynik = db_szukaj($_POST['numer']);
     if ($wynik == TRUE)
      {
       drukuj_wyniki($wynik);
      }
    }
 }

?>
