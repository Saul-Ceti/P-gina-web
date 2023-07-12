    // 1. Alert
    alert("Esto es un mensaje de alerta");

    // 2. Prompt
    var nombre = prompt("Ingrese su nombre");
    console.log("Nombre ingresado: " + nombre);

    // 3. Confirm
    var confirmacion = confirm("¿Está seguro de continuar?");
    console.log("Confirmación: " + confirmacion);

    // 4. Console.log
    console.log("Esto se muestra en la consola");

    // 5. SetTimeout
    setTimeout(function() {
      alert("¡Han pasado 3 segundos!");
    }, 3000);

    // 6. SetInterval
    setInterval(function() {
      console.log("Se ejecuta cada segundo");
    }, 1000);

    // 7. Date
    var fechaActual = new Date();
    console.log("Fecha actual: " + fechaActual);

    // 8. Math.random
    var numeroAleatorio = Math.random();
    console.log("Número aleatorio: " + numeroAleatorio);

    // 9. String.charAt
    var texto = "Hola";
    var primerCaracter = texto.charAt(0);
    console.log("Primer carácter: " + primerCaracter);

    // 10. Array.push
    var array = [1, 2, 3];
    array.push(4);
    console.log("Array modificado: " + array);

    // 11. Object.keys
    var objeto = {a: 1, b: 2, c: 3};
    var keys = Object.keys(objeto);
    console.log("Claves del objeto: " + keys);

    // 12. String.toUpperCase
    var textoMayusculas = texto.toUpperCase();
    console.log("Texto en mayúsculas: " + textoMayusculas);

    // 13. Array.join
    var arrayTexto = ["Hola", "mundo"];
    var textoUnido = arrayTexto.join(" ");
    console.log("Texto unido: " + textoUnido);

    // 14. Number.toFixed
    var numeroDecimal = 3.14159;
    var numeroRedondeado = numeroDecimal.toFixed(2);
    console.log("Número redondeado: " + numeroRedondeado);

    // 15. String.length
    var longitudTexto = texto.length;
    console.log("Longitud del texto: " + longitudTexto);

    // 16. Array.pop
    var ultimoElemento = array.pop();
    console.log("Último elemento: " + ultimoElemento);

    // 17. Object.values
    var valores = Object.values(objeto);
    console.log("Valores del objeto: " + valores);

    // 18. String.slice
    var parteTexto = texto.slice(1, 3);
    console.log("Parte del texto: " + parteTexto);

    // 19. Array.reverse
    array.reverse();
    console.log("Array invertido: " + array);

    // 20. Array.includes
    var incluyeTres = array.includes(3);
    console.log("Incluye el número 3: " + incluyeTres);