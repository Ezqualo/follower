function actualizarSemaforo(cod, tabla, nombre){
    
    cadena= "nombre=" + nombre + 
        "&codigo=" + cod +
        "&tabla=" + tabla;

    //alert(cadena);
    $.ajax({
        type:"POST",
        url:"../bd/edit_semaforo.php",
        data:cadena,
        success:function(r){
            if(r==1){
                //$('#tabla').load('componentes/tabla.php');
                location.reload();
            }else{
                console.log();
            }
        }
    });

}


function actualizarSemaforoComet(cod, nombre, tabla, proyecto, pieza){
    
    cadena= "proyecto=" + proyecto + 
        "&pieza=" + pieza +    
        "&nombre=" + nombre +    
        "&codigo=" + cod +
        "&tabla=" + tabla;

    //alert(cadena);
    $.ajax({
        type:"POST",
        url:"../bd/edit_semaforo.php",
        data:cadena,
        success:function(r){
            if(r==1){
                location.reload();
            }else{
                console.log();
            }
        }
    });

}
function actualizarSemaforoNew(cod, tabla, id){
    cadena= "id=" + id + 
        "&codigo=" + cod +
        "&tabla=" + tabla;
    $.ajax({
        type:"POST",
        url:"../bd/edit_semaforoNew.php",
        data:cadena,
        success:function(r){
            if(r==1){
                //$('#tabla').load('componentes/tabla.php');
                location.reload();
            }else{
                console.log();
            }
        }
    });
}
