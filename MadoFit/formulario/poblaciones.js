// Define un objeto con las poblaciones para cada provincia
const poblacionesPorProvincia = {
  Alicante: ["Alacant", "Elx", "Torrevieja"],
  Almería: ["Almería", "Roquetas de Mar", "El Ejido"],
  Asturias: ["Gijón", "Oviedo", "Avilés"],
  Baleares: ["Palma de Mallorca", "Ibiza", "Manacor"],
  Barcelona: ["Barcelona", "Badalona", "L'Hospitalet de Llobregat"],
  Cádiz: ["Cádiz", "Algeciras", "Jerez de la Frontera"],
  Ceuta: ["Ceuta"],
  Girona: ["Girona", "Figueres", "Blanes"],
  Granada: ["Granada", "Almuñécar", "Motril"],
  Madrid: ["Madrid", "Móstoles", "Alcalá de Henares"],
  Málaga: ["Málaga", "Marbella", "Vélez-Málaga"],
  Melilla: ["Melilla"],
  Navarra: ["Pamplona", "Tudela", "Estella"],
  Sevilla: ["Sevilla", "Dos Hermanas", "Alcalá de Guadaíra"],
  Valencia: ["Valencia", "Gandía", "Torrent"]
};

// Obtén el menú de selección de provincia y población
let provincia = document.getElementById("provincia");
let poblacion = document.getElementById("poblacion");

// Agrega un evento de cambio al menú de selección de provincia
provincia.addEventListener("change", function() {
  // Obtén el valor de la provincia seleccionada
  let provinciaSeleccionada = provincia.value;
  
  // Limpia el menú de selección de población
  poblacion.innerHTML = "";
  
  // Si se ha seleccionado una provincia, agrega las poblaciones correspondientes
  if (provinciaSeleccionada !== "") {
    // Obtén las poblaciones correspondientes a la provincia seleccionada
    let poblaciones = poblacionesPorProvincia[provinciaSeleccionada];
    
    // Agrega cada población como una opción en el menú de selección de población
    poblaciones.forEach(function(poblacionActual) {
      let opcion = document.createElement("option");
      opcion.text = poblacionActual;
      opcion.value = poblacionActual;
      poblacion.add(opcion);
    });
  }
});
