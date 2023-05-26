// Obtener el elemento canvas del gráfico
const ctx = document.getElementById('statsChart').getContext('2d');

// Verificar si hay datos almacenados en el localStorage
let storedData = localStorage.getItem('chartData');
let chartData;

if (storedData) {
  chartData = JSON.parse(storedData);
} else {
  chartData = {
    labels: [],
    datasets: [
      {
        label: 'Calorías quemadas',
        data: [],
        borderWidth: 1
      }
    ]
  };
}

// Inicializar el gráfico con los datos almacenados
const statsChart = new Chart(ctx, {
  type: 'bar',
  data: chartData,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

// Función para agregar los datos del formulario al gráfico y almacenarlos
function addData(event) {
  event.preventDefault(); // Evitar el envío del formulario

  // Obtener los valores del formulario
  const fecha = document.querySelector('input[name="fecha"]').value;
  const calorias = document.querySelector('input[name="calorias"]').value;
  const masa_muscular = document.querySelector('input[name="masa_muscular"]').value;
  const id_usuario = document.querySelector('input[name="id_usuario"]').value;

  // Crear un objeto FormData y agregar los datos del formulario
  const formData = new FormData();
  formData.append('fecha', fecha);
  formData.append('calorias', calorias);
  formData.append('masa_muscular', masa_muscular);
  formData.append('id_usuario', id_usuario);

  // Enviar los datos del formulario al archivo PHP mediante una solicitud Fetch
  fetch('insertar_datos.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    // Manejar la respuesta del servidor
    console.log(data);

    // Actualizar el gráfico con los nuevos datos
    statsChart.data.labels.push(fecha);
    statsChart.data.datasets[0].data.push(calorias);
    statsChart.update();

    // Almacenar los datos actualizados en el localStorage
    localStorage.setItem('chartData', JSON.stringify(statsChart.data));
  })
  .catch(error => {
    // Manejar errores
    console.error(error);
  });

  // Limpiar los campos del formulario
  document.querySelector('input[name="fecha"]').value = '';
  document.querySelector('input[name="calorias"]').value = '';
  document.querySelector('input[name="masa_muscular"]').value = '';
}
