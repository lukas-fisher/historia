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
    },
    beforeSend: function(){},
    complete: function(){},
    error: function(xhr){
      console.log(xhr.responseText);
    }
  });
};
