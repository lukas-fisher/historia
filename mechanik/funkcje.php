<?php

$osoby = array(1 => "Danny", 2 => "Sandy");

$efektywnosc = array (1 => "TAK", 0=> "NIE");

$statusy = array (1 => "ND", 2 => "odebrał, spadać", 3 => "odebrał, będzie", 4 => "odebrał, ktoś inny");


function drukuj_szukacz() {
  print "<div id='szukacz'><input type='text' id='wartosc'><button id='nurkuj' onclick='nurkowanie()'>zobacz</button></div>";
  print "<div id='wynikowy'>";
  print "</div>";
}

function pasek_dodawania($numer) {
  global $osoby;
  $data = new DateTime();
  $drukowana = $data->format('Y-m-d');

  print "<div id='dodaj'>numer <input type='text' id='numer' /> ";
  print "[".$osoby[$_SESSION['osoba']]."] ";
  print "[".$drukowana."] ";
  print "[efektywne: <select name='efektywnosc' id='efektywnosc'><option value='1' selected>TAK</option><option value='0'>NIE</option></select>] ";
  print "[rezultat: <select name='status' id='status'>";
  print "<option value='1' selected>ND</option>";
  print "<option value='2'>odebrał, spadać</option>";
  print "<option value='3'>odebrał, będzie</option>";
  print "<option value='4'>odebrał, ktoś inny</option>";
  print "</select>] ";
  print "<button id='zapisz' onclick='zapisuj()'>+</button>";
  print "</div>";
}

function moja_data() {
  $data = new DateTime();
  $drukowana = $data->format('Y-m-d H:i:s');

  return $drukowana;
}

function drukuj_wyniki ($wynik) {
  global $osoby;
  global $efektywnosc;
  global $statusy;
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

?>
