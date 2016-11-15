$(document).ready(function(){

    //Obteniendo valores.
        // Dia Lunes
            var silunes = $('#silunes');
            var nolunes = $('#nolunes');
            var boxlunes = $('#boxlunes');
        // Dia Martes
            var simartes = $('#simartes');
            var nomartes = $('#nomartes');
            var boxmartes = $('#boxmartes');

        // Dia miercoles
            var simiercoles = $('#simiercoles');
            var nomiercoles = $('#nomiercoles');
            var boxmiercoles = $('#boxmiercoles');
        // Dia jueves
            var sijueves = $('#sijueves');
            var nojueves = $('#nojueves');
            var boxjueves = $('#boxjueves');
        // Dia viernes
            var siviernes = $('#siviernes');
            var noviernes = $('#noviernes');
            var boxviernes = $('#boxviernes');
        // Dia sabado
            var sisabado = $('#sisabado');
            var nosabado = $('#nosabado');
            var boxsabado = $('#boxsabado');
        // Dia domingo
            var sidomingo = $('#sidomingo');
            var nodomingo = $('#nodomingo');
            var boxdomingo = $('#boxdomingo');

    // ------------------------
    $('#dtplunes').datetimepicker({  //RELOJ
        format: 'HH:mm'
    });
    $('#dtpmartes').datetimepicker({  //RELOJ
        format: 'HH:mm'
    });
    $('#dtpmiercoles').datetimepicker({  //RELOJ
        format: 'HH:mm'
    });
    $('#dtpjueves').datetimepicker({  //RELOJ
        format: 'HH:mm'
    });
    $('#dtpviernes').datetimepicker({  //RELOJ
        format: 'HH:mm'
    });
    $('#dtpsabado').datetimepicker({  //RELOJ
        format: 'HH:mm'
    });
    $('#dtpdomingo').datetimepicker({  //RELOJ
        format: 'HH:mm'
    });
    // ------------------------


// FUNCIONALIDADES DE BOTONOES
    // lUNES
    silunes.click(function(){
        boxlunes.fadeIn();
        var generarlunes = true;
    });
    nolunes.click(function(){
        var generarlunes = false;
        $('#lunes').remove();

    });
    // lUNES

    // MARTES
    simartes.click(function(){
        boxmartes.fadeIn();
        var generarmartes = true;

    });
    nomartes.click(function(){
        $('#martes').remove();
        var generarmartes = false;
    });
    // MARTES

    // MIERCOLES
    simiercoles.click(function(){
        boxmiercoles.fadeIn();
        var generarmiercoles = true;

    });
    nomiercoles.click(function(){
        var generarmiercoles = false;
        $('#miercoles').remove();

    });
    // MIERCOLES

    // JUEVES
    sijueves.click(function(){
        boxjueves.fadeIn();
        var generarjueves = true;

    });
    nojueves.click(function(){
        $('#jueves').remove();
        var generarjueves = false;
    });
    // JUEVES

    // VIERNES
    siviernes.click(function(){
        boxviernes.fadeIn();
        var generarviernes = true;

    });
    noviernes.click(function(){
        $('#viernes').remove();
        var generarviernes = false;
    });
    // VIERNES

    // SABADO
    sisabado.click(function(){
        boxsabado.fadeIn();
        var generarsabado = true;

    });
    nosabado.click(function(){
        $('#sabado').remove();
        var generarsabado = false;
    });
    // SABADO

    // DOMINGO
    sidomingo.click(function(){
        boxdomingo.fadeIn();
        var generardomingo = true;

    });
    nodomingo.click(function(){
        $('#domingo').remove();
        var generardomingo = false;
    });
    // DOMINGO

// FUNCIONALIDADES DE BOTONOES




});
