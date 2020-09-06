$(buscar());

$(document).on('keyup','#CajaBuscar', function(){
    var valor = $(this).val();
    if(valor!=""){
        buscar(valor);
    }
    else{
        buscar();
    }
})

function buscar(consulta){
    $.ajax({
        url: 'php/Buscar.php',
        type: 'POST',
        dataType: 'html',
        data:{consul: consulta},
    })
    .done(function(respuesta){
        $(".Contenido").html(respuesta);
    })
    .fail(function(){
        console.log("Error");
    })
}