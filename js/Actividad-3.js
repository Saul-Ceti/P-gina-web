    // Definición del objeto
    var persona = {
        nombre: "Juan",
        edad: 30
      };
  
      // Agregar método utilizando notación de objeto literal
      persona.saludar = function() {
        console.log("Hola, mi nombre es " + this.nombre);
      };
  
      // Llamar a los métodos del objeto
      persona.saludar();        // Imprime: Hola, mi nombre es Juan