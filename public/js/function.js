$(document).ready(function() {

  $("#Tipo").keyup(function () {   
    this.value = (this.value + '').replace(/[^0-9]/g, '');
    var valor = this.value.length;
    if (valor>2) {
    }
    sumarP();
  });

  $("#Tipo").click(function(){
    sumarP();
  });

  function sumarP(){
    var tipo = $("#Tipo").val();
    var presio = 500;
    var suma  = parseFloat(tipo) * parseFloat(presio);
    $("#CostoTotal").text(suma);
  }

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

  $("#Regitro_Download").click(function(event) {
    
    var Nombre = $("input[name='Nombre']").val();
    var Email = $("input[name='Email']").val();
    var Telefono = $("input[name='Telefono']").val();
    var Empresa = $("input[name='Empresa']").val();
    var Cargo = $("select[name='Cargo']").val();
    var Normas = $("input[name='Normas']").val();
    var Publicidad = $("input[name='Publicidad']").val();



    $.ajax({
      url: 'Registros/Prueba_Gratis',
      type: 'POST',
      dataType: 'json',
      contentType: "application/x-www-form-urlencoded; charset=UTF-8",
      data: {'Nombre':Nombre,
      'Email':Email,
      'Telefono':Telefono,
      'Empresa':Empresa,
      'Cargo':Cargo,
      'Normas':Normas,
      'Publicidad':Publicidad},
      success : function(result) {
        alert(result);
      }
    })
    .done(function(result) {
      alert(result);
      /*downloadURL(e+'');*/
    })
    .fail(function(result) {
      console.log(result);
    });
    
  });

  /*downloadURL : function(url) {
    if ($idown) {
      $idown.attr('src',url);
    } else {
      $idown = $('<iframe>', { id:'idown', src:url }).hide().appendTo('body');
    }
  }*/

});