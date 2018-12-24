function genera_tabla() {

    var table = document.getElementsByTagName("table")[0];
    var dia = document.getElementById('diasemana').value;
    var desde = document.getElementById('desdehora').value;
    var hasta = document.getElementById('hastahora').value;
    var tr = document.createElement("tr");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var td3 = document.createElement("td");
    var td4 = document.createElement("td");
    var input1 = document.createElement("input");
    var input2 = document.createElement("input");
    var input3 = document.createElement("input");
    var btn = document.createElement("button");
    $(btn).attr("type", "button").addClass("btn btn-danger").text("Borrar").attr("onclick", "javascript:Eliminar(this);");
    $(input1).attr("type", "hidden").attr("name", "dia[]").val(dia);
    $(input2).attr("type", "hidden").attr("name", "desde[]").val(desde);
    $(input3).attr("type", "hidden").attr("name", "hasta[]").val(hasta);
    $(td1).append(dia).append(input1);
    $(td2).append(desde).append(input2);
    $(td3).append(hasta).append(input3);
    $(td4).append(btn);
    $(tr).append(td1).append(td2).append(td3).append(td4);
    $(table).append(tr);
}

function Eliminar(element) {

    var tr = $(element).parent().parent();

    $(tr).remove();

}