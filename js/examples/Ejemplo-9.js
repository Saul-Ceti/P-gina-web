for(var i in alumno){
    if(alumno.hasOwnProperty(i)){
        console.log(alumno[i]);
    }
}

var ind = Object.keys(alumno);

for(var i = 0; i < ind.length; i++){
    console.log(ind[i]);
}