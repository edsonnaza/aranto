$('.menu_rol').on('change', function() {
    var data = {
        menu_id: $(this).data('menuid'),
        rol_id: $(this).val(),
        _token: $('input[name=_token]').val()
    };
    if ($(this).is(':checked')) {
        data.estado = 1
    } else {
        data.estado = 0
    }
    ajaxRequest('/admin/menu-rol', data);
});

function ajaxRequest(url, data) {
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function(respuesta) {
            Biblioteca.notificaciones(respuesta.respuesta, 'Biblioteca', 'success');
        }
    });
}


$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#tabla-data').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });
});