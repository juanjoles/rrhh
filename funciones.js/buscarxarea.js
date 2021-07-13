function buscarxarea(){
    $.ajax({
        type:"POST",
        data:"parametro="+$("#txt_busqueda").val()+"",
        url:"emplados_area.php",
        success:function(datos) {
            $("#resultado_busqueda").html(datos);
        }
    })
}


