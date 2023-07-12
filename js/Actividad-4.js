'use strict';

var boton = document.createElement("button");

boton.innerHTML = "Haz clic";
boton.id = "botonCreado";
document.body.appendChild(boton);

boton.addEventListener("click", function() {
    console.log("¡Se hizo clic en el botón!");

    var parra = document.createElement("p");
    parra.innerHTML = "Párrafo creado";
    parra.id = "parraCreado";

    var colores = ["red", "blue", "green", "orange", "purple"];
    var colorAleatorio = colores[Math.floor(Math.random() * colores.length)];

    var tiposLetra = ["Arial", "Verdana", "Helvetica", "Courier", "Georgia"];
    var tipoLetraAleatorio = tiposLetra[Math.floor(Math.random() * tiposLetra.length)];

    parra.style.color = colorAleatorio;
    parra.style.fontFamily = tipoLetraAleatorio;

    document.body.appendChild(parra);
});