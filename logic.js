
$.ajax({
    url: 'upload.php',
    type: 'POST',
    data: new FormData(form),
    success: function (data) {
        // manejar la respuesta del servidor
    },
    cache: false,
    contentType: false,
    processData: false
 });