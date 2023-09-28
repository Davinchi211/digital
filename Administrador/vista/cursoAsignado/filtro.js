// Obtén el elemento de entrada y la tabla
var input = document.getElementById('busqueda');
var table = document.getElementById('miTabla');
var tbody = table.getElementsByTagName('tbody')[0];
var tr = tbody.getElementsByTagName('tr');

// Agrega un evento de escucha al campo de entrada
input.addEventListener('keyup', function() {
  var filtro = input.value.toLowerCase();

  // Itera sobre las filas de la tabla
  for (var i = 0; i < tr.length; i++) {
    var td = tr[i].getElementsByTagName('td')[0]; // El índice 0 es para la primera columna (Nombre)
    
    if (td) {
      var texto = td.textContent || td.innerText;
      if (texto.toLowerCase().indexOf(filtro) > -1) {
        tr[i].style.display = '';
      } else {
        tr[i].style.display = 'none';
      }
    }
  }
});
