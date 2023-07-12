'use strict';

function suma(a, b) {
  return a + b;
}

function resta(a, b) {
  return a - b;
}

function multiplicacion(a, b) {
  return a * b;
}

function division(a, b) {
  return a / b;
}

function cadenaDeInstruccion(value) {
  document.getElementById("resultado").value += value;
}

function calcularResultado() {
  var separadores = ["+", "-", "*", "/"];
  var resultado = document.getElementById("resultado").value;
  var expresionRegular = new RegExp("([" + separadores.map(function(separador) {
    return "\\" + separador;
  }).join("") + "])", "g");

  var instrucciones = resultado.split(expresionRegular);
  console.log(instrucciones);

  var acumulado = parseFloat(instrucciones[0]); // Inicializar el acumulado con el primer valor de instrucciones

  for (var i = 1; i < instrucciones.length; i += 2) {
    var operador = instrucciones[i];
    var valor = parseFloat(instrucciones[i + 1]);

    if (isNaN(valor)) {
      alert("Entrada inválida: " + instrucciones[i + 1]);
      return;
    }

    switch (operador) {
      case "+":
        acumulado = suma(acumulado, valor);
        break;
      case "-":
        acumulado = resta(acumulado, valor);
        break;
      case "*":
        acumulado = multiplicacion(acumulado, valor);
        break;
      case "/":
        if (valor === 0) {
          alert("División por cero no está permitida");
          return;
        }
        acumulado = division(acumulado, valor);
        break;
      default:
        alert("Operador inválido: " + operador);
        return;
    }
  }

  document.getElementById("resultado").value = acumulado;
}

function limpiarPantalla() {
  document.getElementById("resultado").value = "";
}
