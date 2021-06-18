$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function() {
    function cargarCatHijos() {
        //e.preventDefault();

        var id_categoriapadre = $('#id_prodcategoriapadre').val();
        var idcathijoaux = $('#idcathijoaux').val();
        //alert(idcathijoaux);


        $.ajax({
            // url: "{{route('cargar_cathijos', ['id_categoriapadre' => " + id_categoriapadre + "])}}",
            url: "../../gethijos/" + id_categoriapadre,
            //   url: url,
            type: "GET",
            dataType: "json",
            // url: type: "GET",
            // data: { _token: token, id_categoriapadre: id_categoriapadre },
            success: function(cathijos) {
                var old = $('#id_categoriahijo').data('old') != '' ? $('#id_categoriahijo').data('old') : '';

                $('#id_categoriahijo').empty();
                $('#id_categoriahijo').append("<option value=''>Selecciona una subcategoria</option>");

                $.each(cathijos, function(index, value) {
                    $('#id_categoriahijo').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + (idcathijoaux == index ? 'selected' : '') + ">" + value + "</option>");
                })
            },
        });
    }
    cargarCatHijos();
    $('#id_prodcategoriapadre').on('change', cargarCatHijos);
});