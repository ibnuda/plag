var Converter = function () {
    
};

Converter.prototype.decToBinary = function (integer) {
    var multiple,
        highestPower = 0,
        binary = [];
        
    while (integer >= Math.pow(2, highestPower + 1)) {
        highestPower += 1;
    }
    
    for (; highestPower >= 0; highestPower -= 1) {
        multiple = Math.pow(2, highestPower);
        if (integer >= multiple) {
            integer -= multiple;
            binary.push(1);
        }
        else {
            binary.push(0);
        }
    }
    
    return binary.join('');
};

Converter.prototype.binaryToDec = function (binaryString) {
    var binary = binaryString.split('').reverse(),
        decimal = 0,
        i;
    
    for (i = 0; i < binary.length; i += 1) {
        if (binary[i] === "1") {
            decimal += Math.pow(2, i);
        }
    }
    
    return decimal;
};