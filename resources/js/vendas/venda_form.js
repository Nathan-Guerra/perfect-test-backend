const VMasker = require("vanilla-masker");

const userDiscountMaskPattern = '99,99';
const systemDiscountMaskPattern = '99.99';
const dateMaskPattern = '99.99';

const formEl = document.querySelector('form');

let inputDescontoEl = formEl.querySelector('#desconto');
VMasker(inputDescontoEl).maskPattern(userDiscountMaskPattern);

const btnDateEl = formEl.querySelector('.btn-date');
const inputDateEl = formEl.querySelector('#data_venda');

// VMasker(inputDateEl).maskPattern(dateMaskPattern);

btnDateEl.onclick = e => {
    e.preventDefault();
    inputDateEl.click();
};

formEl.onsubmit = e => {
    e.preventDefault();
    VMasker(inputDescontoEl).maskPattern(systemDiscountMaskPattern);
    // let date = inputDateEl.value.split('/');
    // inputDateEl.value = `${date[2]}-${date[1]}-${date[0]}`;

    formEl.submit();
}
