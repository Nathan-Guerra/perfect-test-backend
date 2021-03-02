const VMasker = require("vanilla-masker");

const moneyConfig = {
    // Decimal precision -> "90"
    precision: 2,
    // Decimal separator -> ",90"
    separator: ',',
    // Number delimiter -> "12.345.678"
    delimiter: '.',
    // Money unit -> "R$ 12.345.678,90"
    unit: 'R$',
    // Money unit -> "12.345.678,90 R$"
    // suffixUnit: 'R$',
    // Force type only number instead decimal,
    // masking decimals with ",00"
    // Zero cents -> "R$ 1.234.567.890,00"
    // zeroCents: true
};

const formEl = document.querySelector('form');

let precoEl = formEl.querySelector('#preco');
VMasker(precoEl).maskMoney(moneyConfig);

formEl.onsubmit = e => {
    e.preventDefault();
    let preco = precoEl.value
        .replace('R$ ', '')
        .replace(/(\.)/g, '')
        .replace(',', '.');

    precoEl.value = preco;
    formEl.submit();
}
