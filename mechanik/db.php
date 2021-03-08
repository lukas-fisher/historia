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

function db_usun($id) {
  global $db;
  $zapytanie = "DELETE FROM dialer WHERE ID = ".$id."";

  $wykonaj = mysqli_query($db, $zapytanie) or die(mysqli_error()." db_usun");
  return $wykonaj;
}

function db_data($data, $osoba) {
  global $db;
  if ($osoba != "x")
   {
    $bonus =  "AND osoba = '".$osoba."'";
   }
  else
   {
    $bonus = "AND osoba LIKE '%'";
   }

  $zapytanie = "SELECT COUNT(ID) as total FROM dialer WHERE data like '".$data."%' ".$bonus;

  $wykonaj = mysqli_query($db, $zapytanie) or die(mysqli_error()." db_data");
  $liczba = mysqli_fetch_array($wykonaj);
  return $liczba;
}

function db_numery($data, $osoba) {
  global $db;
  if ($osoba != "x")
   {
    $bonus =  "AND osoba = '".$osoba."'";
   }
  else
   {
    $bonus = "AND osoba LIKE '%'";
   }

  $zapytanie = "SELECT COUNT(DISTINCT numer) as total FROM dialer WHERE data like '".$data."%' ".$bonus;

  $wykonaj = mysqli_query($db, $zapytanie) or die(mysqli_error()." db_data");
  $liczba = mysqli_fetch_array($wykonaj);
  return $liczba;
}

?>
