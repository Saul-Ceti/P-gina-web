'use strict'

var nombre = "Saúl", edad = 21, empleado = true, salario = 300000.00;

console.log(nombre);
console.log(typeof nombre);
console.log(edad);
console.log(typeof edad);
console.log(empleado);
console.log(typeof empleado);
console.log(salario);
console.log(typeof salario);

var num1 = parseInt(prompt("Ingresa un  numero: ")); 
var num2 = parseInt(prompt("Ingresa otro  numero: "));

console.log("La suma es: " (num1 + num2));

document.writeln("Hola mundo");

var parra = document.getElementById("parrafo");
var par = document.getElementsByClassName("clase");

var pa = document.querySelectorAll(".noso");

parra.style.color = "red";
parra.style.backgroundColor = "black";

console.log(parra);