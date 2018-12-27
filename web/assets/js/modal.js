var modalConfirm = function(callback){
  var id ="";
  $( ".btn.btn-danger.btn-block" ).click(function() {
    id = $(this).attr('id');
    $("#ref").text(" "+ id);
    $("#mi-modal").modal('show');
    });
  $("#btn-confirm").on("click", function(){
    $("#mi-modal").modal('show');
  });

  $("#modal-btn-si").on("click", function(){
    callback(true);
    $("#mi-modal").modal('hide');
  });
  
  $("#modal-btn-no").on("click", function(){
    callback(false);
    $("#mi-modal").modal('hide');
  });
};

modalConfirm(function(confirm){
  if(confirm){
    //Acciones si el usuario confirma
    var url = "http://jquery4u.com";  
    $(location).attr('href',url);
    $("#result").html("CONFIRMADO");
  }else{
    //Acciones si el usuario no confirma
    $("#result").html("NO CONFIRMADO");
  }
});


