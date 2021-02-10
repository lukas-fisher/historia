<?php
include("mechanik/connection.php");

function db_szukaj($numer) {
  global $db;

  $zapytanie = "SELECT * FROM dialer WHERE numer='".$numer."' ORDER BY ID DESC";

  $wykonaj = mysqli_query($db, $zapytanie) or die(mysqli_error()." db_szukaj");
  while($wiersz = mysqli_fetch_array($wykonaj)) {
    $wynik[]=$wiersz;
  }
  if (isset($wynik))
   {
    return $wynik;
   }
}

function db_dodaj($numer, $osoba, $data, $efektywnosc, $status) {
  global $db;
  $zapytanie = "INSERT INTO dialer (numer, data, osoba, efektywne, rezultat) VALUES
  ('".$numer."', '".$data."', '".$osoba."', '".$efektywnosc."', '".$status."')";

  $wykonaj = mysqli_query($db, $zapytanie) or die(mysqli_error()." db_dodaj");
  return $wykonaj;
}

?>
