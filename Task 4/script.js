let display = document.getElementById("display");
let operand1 = "";
let operand2 = "";
let operator = "";

function appendValue(value) {
    if (display.value === "0" && value !== ".") {
        display.value = value;
    } else {
        display.value += value;
    }
}

function clearDisplay() {
    display.value = "0";
    operand1 = "";
    operand2 = "";
    operator = "";
}

function backspace() {
    display.value = display.value.slice(0, -1);
    if (display.value === "") {
        display.value = "0";
    }
}

function calculate() {
    operand2 = display.value;
    let result = 0;
    switch (operator) {
        case "+":
            result = parseFloat(operand1) + parseFloat(operand2);
            break;
        case "-":
            result = parseFloat(operand1) - parseFloat(operand2);
            break;
        case "*":
            result = parseFloat(operand1) * parseFloat(operand2);
            break;
        case "/":
            if (parseFloat(operand2) !== 0) {
                result = parseFloat(operand1) / parseFloat(operand2);
            } else {
                result = "Error";
            }
            break;
    }
    display.value = result;
    operand1 = "";
    operand2 = "";
    operator = "";
}

function appendOperator(value) {
    operator = value;
    operand1 = display.value;
    display.value = "";
}