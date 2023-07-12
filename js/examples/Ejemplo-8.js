var alumno = {
    nombre: "Saúl Hernández",
    grado: 8,
    grupo: "P",
    registro: 21310395
}

console.log(alumno);
console.log(alumno.nombre);

for(var i in alumno) {
    if(alumno.hasOwnProperty(i)){
        console.log(alumno[i]);
    }
}