$(document).ready(function(){
    // Al hacer click en NO ya no aparece la caja para asignar empleados a los objetivos.
    $('#no').click(function(e){
        $('#containerObjetivos').fadeOut();
    });

    //Al hacer click en SI estoy indicando que quiero cargar empleados a los objetivos
    $('#si').click(function(e){
        $('#containerAgregandoEmpleados').fadeIn();
        $('#containerBotones').fadeOut();   //Escondo los botones.


        $('#btnSumar').click(function(){
            var listado = document.getElementById('listadoEmpleados');
            var li = listado.innerHTML;
            listado.innerHTML = listado.innerHTML + li;
            alert(listado.childElementCount);
        });

        //Borrar todo en caso de arrepentirse.
        $('#cancelar').click(function(){
            $('#containerObjetivos').fadeOut();
        });
    });
});
