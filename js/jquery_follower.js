/*function saveThem() {
    var id_odt = $.trim($("#id_odt").val());
    var marca = $.trim($("#marca").val());
    var nom_proyecto = $.trim($("#nom_proyecto").val());
    var cliente_odt = $.trim($("#cliente_odt").val());
    var areas = $.trim($("#areas").val());
    var personas = $.trim($("#personas").val());
    var objetivo = $.trim($("#objetivo").val());
    var dummy = $.trim($("#dummy").val());
    var artes_ezqualo = $.trim($("#artes_ezqualo").val());
    var artes_separados = $.trim($("#artes_separados").val());
    var fecha_solicitud = $.trim($("#fecha_solicitud").val());
    var fecha_entrega = $.trim($("#fecha_entrega").val());
    var otra = $.trim($("#otra").val());
    var digital = $.trim($("#digital").val());
    var impreso = $.trim($("#impreso").val());
    var formato = $.trim($("#formato").val());
    var medidas = $.trim($("#medidas").val());
    var acabados = $.trim($("#acabados").val());
    var archivo = 2;

    var dataString = '$id_odt='+id_odt+'&marca='+marca+'&nom_proyecto='+nom_proyecto+'&cliente_odt='+cliente_odt+'&areas='+areas+'&personas='+personas+'&objetivo='+objetivo+'&dummy='+dummy+'&artes_ezqualo='+artes_ezqualo+'&artes_separados='+artes_separados+'&fecha_solicitud='+fecha_solicitud+'&fecha_entrega='+fecha_entrega+'&otra='+otra+'&digital='+digital+'&impreso='+impreso+'&formato='+formato+'&medidas='+medidas+'&acabados='+acabados+'&$archivo='+$archivo;

    $.ajax({
        type: "POST",
        url: '../bd/save_odt.php',
        data: dataString,
        dataType: "json",
        success: function(data) {
            if(data.response){ alert(data.message); }
            $("#inputResult").html(data);
        }
    });
}*/
$('#form_odt').submit(function(e) {
    e.preventDefault();
    var datos_guardados ="<?php echo $success ?>";
    var datos_error ="<?php echo $errordatos ?>";
    //Validacion
    if (datos_error == "Error") {
        Swal.fire({
            type:'warning',
            title:'Faltan campos por rellenar',
        });
        return false;
    }else{
        $.ajax({
            url:"../bd/save_login.php",
            type:"POST",
            datatype: "json",
            data: {usuario:usuario, password:password},
            success:function(data) {
                Swal.fire({
                    type: 'success',
                    title: 'Odt guardada correctamente',
                    background:'#febe10',
		     confirmButtonColor:'#000000',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = "../vistas/odts.php";
                    }
                })
            }
        });
    }
});

