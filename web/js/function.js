$(function() {
  checkForm("#RegistoPrueba");
});

$(document).ready(function() {

  $("#Tipo").on('input', function () {
    this.value = (this.value + '').replace(/[^0-9]/g, '');
    var valor = this.value;
    sumarP(valor);
  });

  $("#Tipo").click(function(){
    this.value = this.value.replace(/[^0-9]/g,'');
    var valor = this.value;
    sumarP(valor);
  });

  $("#Comprar-key").click(function(){
    alert("ok");
  });

  $("#showModal").click(function() {
    $(".modal").addClass("is-active");
  });

  $(".delete").click(function() {
     $(".modal").removeClass("is-active");
  });

  $("#delete").click(function(){
    $(".modal").removeClass("is-active");
    $("#RegistoPrueba")[0].reset();
  });

  $('#showModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })

  $("#Telefono").on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
  });

  $("input[id='Regitro_Download']").click(function(event) {
    var Nombre = $("input[name='Nombre']").val();
    var Email = $("input[name='Email']").val();
    var Telefono = $("input[name='Telefono']").val();
    var Empresa = $("input[name='Empresa']").val();
    var Cargo = $("select[name='Cargo']").val();
    var Normas = checkbox($("#Normas"));
    var Publicidad = checkbox("#Publicidad");

    $.ajax({
      url: 'Registros/Prueba_Gratis',
      type: "POSt",
      encoding:"UTF-8",
      data: {'Nombre':Nombre,
      'Email':Email,
      'Telefono':Telefono,
      'Empresa':Empresa,
      'Cargo':Cargo,
      'Normas':Normas,
      'Publicidad':Publicidad},
      success : function(result) {
        var obj = jQuery.parseJSON( result );
        switch(obj.Respuesta){
          case 'ok':
            alert(obj.Mensaje);
          break;
          case 'error':
            alert(obj.Mensaje);
          break;
          case 'UserOk':
            alert(obj.Mensaje);
          break;
        }
      }
    })

  });
  //
});

$(document).ready(function() {
  $("input[name='confirmarEmail']").keyup(function() {
    var email1 = this.value;
    var Email = $("input[name='Email']").val();
    color  = (Email === email1) ? 'green' : 'red'; 
    changeColor('confirmarEmail', color);
  });

  $("input[name='Close_modal']").click(function(){
    limpiartModal();
  });

  $("#Close_modal_x").click(function(){
    limpiartModal();
  });
});

function limpiartModal(){
  $("input[name='Nombre']").val("");
  $("input[name='Email']").val("");
  $("input[name='Telefono']").val("");
  $("input[name='Empresa']").val("");
}
function changeColor(id, newColor) {
  $("#" + id).css("color", newColor);
}

function sumarP(valor){
  //var tipo = $("#Tipo").val();
  var precio = 500;
  var suma  = parseFloat(valor) * parseFloat(precio);
  $("#CostoTotal").text(suma);
}
//validaciones
var namePattern = "^[a-z A-Z]{4,30}$";
var emailPattern = "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$";

function checkInput(idInput, pattern) {
	return $(idInput).val().match(pattern) ? true : false;
}

function checkInputNumbre(idInput, pattern) {
	return $(idInput).val().match(pattern) ? true : false;
}

function checkLongInput(idInput){
  return $(idInput).val().length >= 5 ? true : false;
}

function checkTextarea(idText) {
	return $(idText).val().length > 12 ? true : false;	
}

function checkRadioBox(nameRadioBox) {
  return $(nameRadioBox).prop('checked')  ? true : false;
}

function checkbox(nameCheckbox){
  return $(nameCheckbox).prop('checked') ? 1 : 0;
}

function checkSelect(idSelect) {
	return $(idSelect).val() ? true : false;
}

function enableSubmit (idForm) {
	$(idForm + " input.submit").removeAttr("disabled");
}

function disableSubmit (idForm) {
	$(idForm + " input.submit").attr("disabled", "disabled");
}

function compareInput(idInput1, idInput2){
  return ($(idInput1).val() === $(idInput2).val()) ? true :  false;
}

function checkForm (idForm) {
	$(idForm + " *").on("change keydown", function() {
		if (checkInput("#Nombre", namePattern) && 
			checkInput("#Apellidos", namePattern) && 
      checkInput("#Email", emailPattern) && 
      checkInput("#confirmarEmail", emailPattern) &&
      compareInput("#Email", "#confirmarEmail") &&
      checkSelect("#Cargo") &&  
			checkRadioBox("#Normas")
      )
		{
			enableSubmit(idForm);
		} else {
			disableSubmit(idForm);
		}
	});
}

$(document).ready(function(){
  function checkSatishRajTreeCollaps() {
  $(".satishraj-tree-container li.tree-li").removeClass("is-child")
      $(".satishraj-tree-container li.tree-li").each(function () {
          if ($(this).find("ul.tree-ul li").length > 0) {
              $(this).addClass("is-child")
          }
      });

  $(".satishraj-tree-container li.tree-li span.text").unbind("click");
      $(".satishraj-tree-container li.tree-li.is-child span.text").click(function () {
          $(this).parent(".tree-li").toggleClass("diactive");
          $(this).parent(".tree-li").find(".tree-ul:first").toggleClass("diactive");
      });
}

checkSatishRajTreeCollaps()

});