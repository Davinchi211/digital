// Obtén una referencia al campo de búsqueda y la tabla
var input = document.getElementById("busqueda");
var tabla = document.getElementById("miTabla");
var rows = tabla.getElementsByTagName("tr");

// Agrega un evento de escucha al campo de búsqueda
input.addEventListener("input", function() {
    var filtro = input.value.toLowerCase();

    // Itera a través de las filas de la tabla y muestra u oculta según el filtro
    for (var i = 1; i < rows.length; i++) { // Comenzamos desde 1 para omitir la fila de encabezado
        var row = rows[i];
        var data = row.getElementsByTagName("td");
        var mostrar = false;

        // Itera a través de las celdas de datos en la fila actual
        for (var j = 0; j < data.length; j++) {
            var cell = data[j];
            if (cell) {
                if (cell.innerHTML.toLowerCase().indexOf(filtro) > -1) {
                    mostrar = true;
                    break;
                }
            }
        }

        // Muestra u oculta la fila según el resultado de búsqueda
        row.style.display = mostrar ? "" : "none";
    }
});
