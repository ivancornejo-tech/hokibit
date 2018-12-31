$(function() {
  checkLogin("#login");
});

$(function(){
  checkEditFrom("#EditUsers");
});

$(function(){
  checkaddFrom("#addUsers");
});

$(document).ready(function(){
  
  $("#login_m").click(function (evt) {
    var Email = $("input[name='loginEmail']").val();
    var Pass = $("input[name='loginPassword']").val();
    $.ajax({
      type: "POSt",
      encoding:"UTF-8",
      url: "http://127.0.0.1/smarbusinesspos/master/Master_control/login",
      data: {"Email":Email, "Password":Pass},
      success: function (response) {
        var obj = jQuery.parseJSON( response );
        switch(obj.Respuesta){
          case 'ok':
          window.location.href=window.location;
          break;
          case 'badP':
          alert(obj.Mensaje);
          break;
          case 'noUser':
          alert(obj.Mensaje);
          break;
        }
      }
    });
  });

  $('#Salir').click(function(evt){
    $.ajax({
      type: "POSt",
      encoding:"UTF-8",
      url: "http://127.0.0.1/smarbusinesspos/master/Master_control/logout",
      data: {},
      success: function (response) {
        window.location.href=window.location
      }
    });
  });

  $("#verificar_key").click(function(evt){
    var licencia = $("input[name='verificar_licencia']").val();
    var version = $('select[name="versiones"] option:selected').text(); 
    $('#licencia_data > tbody').empty();
    $.ajax({
      type: "POSt",
      encoding:"UTF-8",
      url: "http://127.0.0.1/smarbusinesspos/master/Master_control/consultar",
      data: {"key":licencia, "version":version},
      dataType: "json",
      success: function (response) {
        $.each(response, function(i, item) {
          //alert(item.Mensaje);
          var respuesta = item.Resultado;
          $("#keyRespuesta").text(item.Mensaje);
          switch (respuesta){
            case'Ok':
            agregar(item);
            changeColor('keyRespuesta', 'green');
            break;
            case'NoExiste':
            changeColor('keyRespuesta', 'orange');
            break;
            case'Tipo':
            agregar(item);
            changeColor('keyRespuesta', 'red');
            break;
            case'Tiempo':
            agregar(item);
            changeColor('keyRespuesta', 'red');
            break;
            case'Version':
            agregar(item);
            changeColor('keyRespuesta', 'red');
            break;
            case'Status':
            agregar(item);
            changeColor('keyRespuesta', 'red');
            break;
          }
        });
      }
    });
  });
  

  $("#EnviarDR").click(function(){
    var Device = $("input[name='registrarDev']").val();
    var Licencia = $("input[name='registrarKey']").val();
    var Email = $("input[name='EmailKey']").val();
    $.ajax({
      type: "POSt",
      encoding:"UTF-8",
      url: "http://127.0.0.1/smarbusinesspos/master/Master_control/Device",
      data: {"Device": Device,"key":Licencia,"Email":Email},
      dataType: "json",
      success: function (response) {
        $.each(response, function(i, item) {
          var respuesta = item.Respuesta;
          $("#CodigoV").text(item.Mensaje);
          switch (respuesta){
            case '404':
            changeColor('CodigoV', 'orange');
            break;
            case 'ErrorCode':
            changeColor('CodigoV', 'red');
            break;
            case 'NoUser':
            changeColor('CodigoV', 'red');
            break;
            case 'Noemail':
            changeColor('CodigoV', 'red');
            break;
            case 'Email':
            changeColor('CodigoV', 'red');
            break;
          }
        });
      }
    })
  });

  $("#ClearPanel").click(function(evt){
    var r = confirm("¡Esta acción esta ha punto de eliminar todos los datos del registro!");
    if (r == true) {
      limpiar();
    }
  })
  
});

$(document).ready(function(){
  $(".set_edit_user").click(function () { 
    var valores = "";
    $(this).parents("tr").find(".userID").each(function() {
      valores += $(this).html() + "\n";
    });
    $.ajax({
      type: "POST",
      encoding:"UTF-8",
      url: "http://127.0.0.1/smarbusinesspos/master/Master_control/getUserData",
      data: {"UserID":valores},
      success: function (response) {
        var obj = jQuery.parseJSON( response );
        $("input[name='Nombre']").val(obj.Nombre);
        $("input[name='Email']").val(obj.Email);
        populateTipo("#Tipo", obj.Tipo);
        populateStatus("#Status", obj.Status);
        $(".userID_modal").text(valores);
      }
    });
  });

  $("input[name='addconfirmarPassword']").keyup(function() {
    comparePasswords("addconfirmarPassword", "addPassword")
  });

  $("#Add_user").click(function(){
    var Nombre = $("#addNombre").val();
    var Email = $("#addEmail").val();
    var Password = $("#addPassword").val();
    var Tipo = $("#addTipo").val();
    var Status = $("#addStatus").val();
    $.ajax({
    url: "http://127.0.0.1/smarbusinesspos/master/Master_control/Registro",
    type: "POST",
    encoding:"UTF-8",
    data: {'NombreU':Nombre, 'EmailU':Email, 'PasswordU':Password, 'TipoU':Tipo,'StatusU':Status},
    success:function(response){
      var obj = jQuery.parseJSON( response );
      switch(obj.Respuesta){
        case 'ok':
          alert(obj.Mensaje);
        break;
        case 'error':
          alert(obj.Mensaje);
        break;
      }
    }
    });
  });

});

function populateTipo(selector, tipo) {
  $(selector).children().remove();
  switch (tipo){
    case 1:
      $(selector)
      .append($('<option>', {
        value: 1,
        text: 'Administrador'
      }))
      .append($('<option>', {
        value: 2,
        text: 'emplead@'
      }))
      .append($('<option>', {
        value: 3,
        text: 'Invitado'
      }));
    break;
    case 2:
    $(selector)
      .append($('<option>', {
        value: 2,
        text: 'emplead@'
      }))
      .append($('<option>', {
        value: 1,
        text: 'Administrador'
      }))
      .append($('<option>', {
        value: 3,
        text: 'Invitado'
      }));
    break;
    case 3:
    $(selector)
      .append($('<option>', {
        value: 3,
        text: 'Invitado'
      }))
      .append($('<option>', {
        value: 2,
        text: 'emplead@'
      }))
      .append($('<option>', {
        value: 1,
        text: 'Administrador'
      }));
    break;
    default:
    $(selector)
      .append($('<option>', {
        value: 1,
        text: 'Administrador'
      }))
      .append($('<option>', {
        value: 2,
        text: 'emplead@'
      }))
      .append($('<option>', {
        value: 3,
        text: 'Invitado'
      }));
  }
  
}

function populateStatus(selector, status) {
  $(selector).children().remove();
  switch (status){
    case 1:
    $(selector)
      .append($('<option>', {
        value: 1,
        text: 'Activo'
      }))
      .append($('<option>', {
        value: 0,
        text: 'Inactivo'
      }));
    break;
    case 0:
    $(selector)
      .append($('<option>', {
        value: 0,
        text: 'Inactivo'
      }))
      .append($('<option>', {
        value: 1,
        text: 'Activo'
      }));
    break;
    default:
    $(selector)
      .append($('<option>', {
        value: 1,
        text: 'Activo'
      }))
      .append($('<option>', {
        value: 0,
        text: 'Inactivo'
      }));
  }
  
}

function agregar(item) { 
  $.each(item.Key, function(b, count) {
    var output="<tr>";
    output+=
    "<td scope='row'>" +count.idLicencia + "</td>" + 
    //"<td scope='row'>" +item.FechaTermino + "</td>" + 
    "<td scope='row'>" +count.Duracion + "</td>" + 
    "<td scope='row'>" +count.Tipo + "</td>" + 
    "<td scope='row'>" +count.Version + "</td>" + 
    "<td scope='row'>" +count.Status + "</td>" + 
    "<td scope='row'>" +count.Email + "</td>" + 
    "<td scope='row'>" +count.idDispositivo + "</td>";
    // + 
    // "<td scope='row'>" +item.FechaRegistro + "</td>";
    output+="</tr>";
    $("input[name='EmailKey']").val(count.Email);
    $('#licencia_data > tbody').append(output);
    $("input[name='registrarKey']").val(count.idLicencia);
    $("input[name='registrarKey']").attr("readonly","readonly");
    $("input[name='registrarKey']").addClass("readOnly")
  });
 }

function changeColor(id, newColor) {
  $("#" + id).css("color", newColor);
}

function limpiar(){
    $("input[name='verificar_licencia']").val('');
    $("input[name='registrarDev']").val('');
    $("input[name='registrarKey']").val('');
    $("input[name='registrarKey']").removeAttr("readonly","readonly");
    $("input[name='registrarKey']").removeClass("readOnly")
    $("#CodigoV").text("");
    $("#keyRespuesta").text("");
    $("input[name='EmailKey']").val('');
    $('#licencia_data  td').parent().remove();
}

$(document).keydown(function(e) {
  if ( e.ctrlKey && ( e.which === 76 ) ) {
    var r = confirm("¡Esta acción esta ha punto de eliminar todos los datos del registro!");
    if (r == true) {
      limpiar();
    }
  }
});

//validaciones

var namePattern = "^[a-z A-Z]{4,30}$";
var emailPattern = "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$";

function checkInput(idInput, pattern) {
	return $(idInput).val().match(pattern) ? true : false;
}

function checkLongInput(idInput){
  return $(idInput).val().length >= 5 ? true : false;
}

function checkTextarea(idText) {
	return $(idText).val().length > 12 ? true : false;	
}

function checkRadioBox(nameRadioBox) {
  return $(nameRadioBox).is(":checked") ? true : false;
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

function comparePasswords(idInput1, idInput2){
  var pass = $("#"+idInput1).val();
  var repass = $("#"+idInput2).val();
  if(($("#"+idInput1).val().length == 0) || ($("#"+idInput2).val().length == 0)){
    changeColor(idInput1,"red");
    return false;
  }
  else if (pass != repass) {
    changeColor(idInput1,"red");
    changeColor(idInput2,"red");
    return false;
  }
  else {
    changeColor(idInput1,"green");
    changeColor(idInput2,"green");
    return true;
  }
}

function checkLogin(idForm){
  $(idForm + " *").on("change keydown", function() {
		if (checkInput("#loginEmail", emailPattern) && 
        checkLongInput("#loginPassword"))
		{
			enableSubmit(idForm);
		} else {
			disableSubmit(idForm);
		}
  });
}

function checkEditFrom(idForm){
  $(idForm + " *").on("change keydown", function() {
		if (checkInput("#Nombre", namePattern) && 
    checkInput("#Email", emailPattern) &&
    comparePasswords("Password", "confirmarPassword"))
		{
			enableSubmit(idForm);
		} else {
			disableSubmit(idForm);
		}
  });
}

function checkaddFrom(idForm){
  $(idForm + " *").on("change keydown", function() {
    if (checkInput("#addNombre", namePattern) && 
    checkInput("#addEmail", emailPattern) && 
    comparePasswords("addPassword", "addconfirmarPassword") &&
    checkSelect("#addTipo")&&
    checkSelect("#addStatus"))
    {
      enableSubmit(idForm);
    } else {
      disableSubmit(idForm);
    }
  });
}
