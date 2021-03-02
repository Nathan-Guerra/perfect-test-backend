const VMasker = require("vanilla-masker");

const maskPattern = '999.999.999-99';

const formEl = document.querySelector('form');

let cpfEl = formEl.querySelector('#cpf');
VMasker(cpfEl).maskPattern(maskPattern);
