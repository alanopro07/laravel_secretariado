$(window).onload(function buscarMunicipio(valor=1)
{

    $.ajax({
        url: 'ulr',
        type: 'GET',
        dataType: 'html',
        data: {valor: valor}
    })
        .done(function(respuesta){
            $('#alertita').html(respuesta);
        });
    setInterval(depuradorChingon,2000);
});
