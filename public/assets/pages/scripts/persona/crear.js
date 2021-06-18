$(document).ready(function() {
    Biblioteca.validacionGeneral('form-general');


});
$(document).ready(function() {
    Biblioteca.validacionGeneral('form-general');
    $('#foto_persona').fileinput({
        language: 'es',
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        maxFileSize: 1000,
        showUpload: false,
        showClose: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        theme: "fas",
    });
});