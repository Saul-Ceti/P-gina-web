function operacion(num1, num2, potencia2, potencia3) {
    var sum = num1 + num2;
    potencia2(sum);
    potencia3(sum);
    return sum;
}

operacion(2, 2, (ope) => {
    console.log("Potencia dos: ", (ope*ope));
},
(ope) => {
    console.log("Potencia tres: ", (ope*ope*ope));
});