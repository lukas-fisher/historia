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
        print "<table border=1>";
        print "<tr><td>kiedy</td><td>kto</td><td>efektywne?</td><td>rezultat</td></tr>";
        foreach ($wynik as $klucze => $wartosci)
         {
          print "<tr>";
          print "<td>".$wartosci['data']."</td>";
          print "<td>".$osoby[$wartosci['osoba']]."</td>";
          print "<td>".$efektywnosc[$wartosci['efektywne']]."</td>";
          print "<td>".$statusy[$wartosci['rezultat']]."</td>";

          print "</tr>";
         }
        print "</table>";
       }
      else {
         print "brak danych";
      }
      print "</div>";

    }

   elseif ($_POST['funkcja'] == "zapisz")
    {
     print "dodawanie...";

     db_dodaj($_POST['numer'], $_SESSION['osoba'], moja_data(), $_POST['efektywnosc'], $_POST['status']);
    }
 }


?>
