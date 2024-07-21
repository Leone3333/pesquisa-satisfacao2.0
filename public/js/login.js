let input = document.querySelector('#input-form');
let label = document.querySelector('#input-label');

input.addEventListener('click', () => {
console.log(label);
    label.classList.add('labelFocus');
});
