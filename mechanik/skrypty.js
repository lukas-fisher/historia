$(document).ready(function(){
  $("button#login").click(function(){
    loguj();
  });

});

function loguj() {
  $.ajax({
    type: "POST",
    url: "logger.php",
    dataType: "html",
    data: {
      "funkcja": "zaloguj",
      "klucz": $("#bilet").val()
    },
    success: function(dane){
      $("div#robocze").html(dane);
    },
    beforeSend: function(){},
    complete: function(){},
    error: function(xhr){
      console.log(xhr.responseText);
    }
  });
};

function nurkowanie() {
  $.ajax({
    type: "POST",
    url: "generator.php",
    dataType: "html",
    data: {
      "funkcja": "nurkowanie",
      "klucz": $("input#wartosc").val()
    },
    success: function(dane){
      $("div#wynikowy").html(dane);
      $("input#numer").val($("input#wartosc").val());
    },
    beforeSend: function(){},
    complete: function(){},
    error: function(xhr){
      console.log(xhr.responseText);
    }
  });
};

function statystyka() {
  $.ajax({
    type: "POST",
    url: "generator.php",
    dataType: "html",
    data: {
      "funkcja": "statystyka",
    },
    success: function(dane){
      $("div#wynikowy").html(dane);
    },
    beforeSend: function(){},
    complete: function(){},
    error: function(xhr){
      console.log(xhr.responseText);
    }
  });
};


function zapisuj() {
  $.ajax({
    type: "POST",
    url: "generator.php",
    dataType: "html",
    data: {
      "funkcja": "zapisz",
      "numer": $("input#numer").val(),
      "efektywnosc": $("input[name=efektywnosc]:checked").val(),
      "status": $("input[name=status]:checked").val()
    },
    success: function(dane){
      $("div#odczyt").html(dane);
    },
    beforeSend: function(){},
    complete: function(){},
    error: function(xhr){
      console.log(xhr.responseText);
    }
  });
};


function wyrzuc(id) {
  $.ajax({
    type: "POST",
    url: "generator.php",
    dataType: "html",
    data: {
      "funkcja": "wyrzuc",
      "numer": $("input#numer").val(),
      "id": (id)
    },
    success: function(dane){
      $("div#odczyt").html(dane);
    },
    beforeSend: function(){},
    complete: function(){},
    error: function(xhr){
      console.log(xhr.responseText);
    }
  });
};

function franz() {
  $.ajax({
    type: "POST",
    url: "generator.php",
    dataType: "html",
    data: {
      "funkcja": "franz",
      "bilecik": $("input#wartosc").val()
    },
    success: function(dane){
      alert("OK");
    },
    beforeSend: function(){},
    complete: function(){},
    error: function(xhr){
      console.log(xhr.responseText);
    }
  });
};

function zerowanie() {
  $("input#wartosc").val("");
};
