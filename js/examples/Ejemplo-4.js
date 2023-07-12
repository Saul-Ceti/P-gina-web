'use strict';

var fecha = new Date();

console.log(fecha);
console.log(fecha.getDate());
console.log(fecha.getMonth());
console.log(fecha.getFullYear());
console.log(fecha.getDay());

var fechaAct = new Date();
console.log(fechaAct.toLocaleDateString());

var horaAct = new Date();
console.log(horaAct.toLocaleDateString());