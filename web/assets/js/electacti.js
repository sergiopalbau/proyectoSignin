var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('imagen');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);

  };
  
  // var table = document.getElementsByTagName("table")[0];
  // var select = document.getElementById('actividad').value;
  // var tr = document.createElement("tr");
  // var td1 = document.createElement("td");
  // var td2 = document.createElement("td");
  // var input1 = document.createElement("input");
  // var btn = document.createElement("button");
  // $(btn).attr("type", "button").addClass("btn btn-danger").text("Borrar").attr("onclick", "javascript:Eliminar(this);");
  // $(input1).attr("type", "hidden").attr("name", "actividades[]").val(select);
  // $(td1).addClass("text-center");
  // $(td2).addClass("text-center");
  // $(td1).append(select).append(input1);
  // $(td2).append(btn);
  // $(tr).append(td1).append(td2);
  // $(table).append(tr);

;