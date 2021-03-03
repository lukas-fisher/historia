<?php

$osoby = array(1 => "Daniel", 2 => "Sandra", 3 => "Damian", 4 => "Lukasz");

$efektywnosc = array (1 => "TAK", 0=> "NIE");

$statusy = array (1 => "ND", 2 => "odebrał, spadać", 3 => "odebrał, będzie", 4 => "odebrał, ktoś inny", 5 => "zakończone");

$bazy = array (1 => "DATA", 2 => "TV", 3 => "MIX", 4 => "ABO", 5 => "Konwersja", 6 => "Saturacja");


function drukuj_szukacz() {
  global $_SESSION;
  print "<div id='szukacz'><input type='text' id='wartosc' placeholder='numer'><button id='nurkuj' onclick='nurkowanie()'>zobacz</button>";
  if (($_SESSION['osoba'] == 1) OR ($_SESSION['osoba'] == 4))
   {
    print "<br/>";
    print "<span id='maurer'><button id='franz' onclick='franz()'>Franz MAURER</button></span> ";
    print "<button onclick='staty()'>statystyka</button> ";
   }
  print "</div>";
  print "<div id='wynikowy'>";
  print "</div>";
}

function pasek_dodawania($numer) {
  global $osoby;
  global $statusy;
  global $bazy;
  $data = new DateTime();
  $drukowana = $data->format('Y-m-d');

  print "<div id='dodaj'>";
  print "<div class='kapsulka'>numer: <input class='short' type='text' id='numer' placeholder='numer' /></div>";
  print "<div class='kapsulka'><strong>z bazy</strong><br/>";
  foreach ($bazy as $klucz => $wartosci) {
    print "<input type='radio' value='".$klucz."' name='typ' id='baza' ";
    if ($klucz == "1")
     {
       print "checked";
     }
    print "/> ".$wartosci."<br/>";
  }
  print "</div>";
  print "<div class='kapsulka'>".$osoby[$_SESSION['osoba']]."<br/>".$drukowana."</div>";
  print "<div class='kapsulka'><strong>40s?</strong><br/>
    <input type='radio' value='1' name='efektywnosc' id='efektywnosc' /> TAK<br/>
    <input type='radio' value='0' name='efektywnosc' id='efektywnosc' checked /> NIE
  </div>";
  print "<div class='kapsulka2'><strong>Rezultat:</strong><br/>";
  foreach ($statusy as $klucz => $wartosci) {
    print "<input  type='radio' value='".$klucz."' name='status' id='status' ";
    if ($klucz == "1")
     {
       print "checked";
     }
    print "/>".$wartosci."<br/>";
  }
  print "</div>";

  print "<div class='kapsulka'><button class='adder' id='zapisz' onclick='zapisuj()'>+</button></div>";
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
  print "<tr><td>kiedy</td><td>kto</td><td>efektywne?</td><td>rezultat</td><td>usuń</td></tr>";
  foreach ($wynik as $klucze => $wartosci)
   {
    print "<tr>";
    print "<td>".$wartosci['data']."</td>";
    print "<td>".$osoby[$wartosci['osoba']]."</td>";
    print "<td>".$efektywnosc[$wartosci['efektywne']]."</td>";
    print "<td>".$statusy[$wartosci['rezultat']]."</td>";
    print "<td><button onclick='wyrzuc(".$wartosci['ID'].")'>Delete</button></td>";

    print "</tr>";
   }
  print "</table>";
}

?>
