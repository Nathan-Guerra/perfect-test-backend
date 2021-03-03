const VMasker = require("vanilla-masker");

const userDiscountMaskPattern = '99,99';
const systemDiscountMaskPattern = '99.99';

const formEl = document.querySelector('form');

let inputDescontoEl = formEl.querySelector('#desconto');
VMasker(inputDescontoEl).maskPattern(userDiscountMaskPattern);

formEl.onsubmit = e => {
    e.preventDefault();
    VMasker(inputDescontoEl).maskPattern(systemDiscountMaskPattern);
    formEl.submit();
}
