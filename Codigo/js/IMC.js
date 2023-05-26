
function calcularIMC() {
  var peso = document.getElementById("input-peso").value;
  var altura = document.getElementById("input-altura").value;

  if (peso && altura) {
    var imc = peso / Math.pow(altura / 100, 2); // Convertir altura de cm a m²

    var resultado = "";

    if (imc < 18.5) {
      resultado = "Bajo peso";
    } else if (imc < 25) {
      resultado = "Peso normal";
    } else if (imc < 30) {
      resultado = "Sobrepeso";
    } else {
      resultado = "Obesidad";
    }

    document.querySelector(".resultado-imc").innerHTML = "<h5>Su IMC es: " + imc.toFixed(2) + " - " + resultado;
  }
}
