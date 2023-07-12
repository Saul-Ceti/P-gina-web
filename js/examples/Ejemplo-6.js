function usuario(){
    console.log("Función ejecutada");
}

function informacion(estado, usuario){
    if(!estado){
        usuario();
    }
}

informacion(false, usuario);