'use strict';

function usuario(nombre, edad, sexo, ocupacion) {
    console.log(nombre, edad, sexo, ocupacion);
}

usuario("Ross", 30, "Femenino", "Docente");

function usuarios(...infomacion) {
    console.log(...infomacion);
}

var usuarioInfo = ["Ross", 30, "Femenino", "Docente"];

usuarios(...infomacion);