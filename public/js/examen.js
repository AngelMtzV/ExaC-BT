$(document).ready(function () {
    //consulta dinamica para las especialidades
    $("#siguiente").bind("change",function(event){
       
    });
});

//funcion para confirmar si quiere comenzar con el examen y le avisa del tiempo que tiene
function confirmacion() {
  var pregunta = confirm("¿Estas seguro que quieres comenzar el examen?")
  var idExa = document.getElementById("idExa").value;
  if (pregunta){
    window.location = "/iniciarExamen/"+idExa+"";
    }
  else{
    alert("Se ha cancelado el examen!")
    }
  }

  