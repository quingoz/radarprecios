// Espera a que el documento esté completamente cargado antes de ejecutar el código
$(document).ready(function() {

    // Obtener parámetros de la URL y convertirlos en arrays
    var url = new URL(window.location.href);
    var productos = url.searchParams.get('productos');
    var marcas = url.searchParams.get('marcas');
    var clientes = url.searchParams.get('clientes');

    // Asignar los valores obtenidos de la URL a los elementos select y activar select2
    $('.select-productos').val(productos).trigger('change');
    $('.select-marcas').val(marcas).trigger('change');
    $('.select-clientes').val(clientes).trigger('change');

});

// Inicializar la librería select2 en todos los selects después de que el documento esté listo
$(document).ready(function() {
    $('.select-productos, .select-marcas, .select-clientes').select2();
});

document.getElementById('formMapa').addEventListener('submit', function(e) {
    const producto = document.getElementById('productos').value;
    const marca = document.getElementById('marcas').value;

    if (!producto) {
        e.preventDefault(); // evita que se envíe el formulario
        alert('Debe seleccionar un producto para continuar.');
    }
});

