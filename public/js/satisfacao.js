// inputs da opção otima e seus eventos
const smile_button = document.getElementById('smile-button');
const smile_label = document.querySelector('.smile-label');

smile_button.addEventListener('mouseover', () => {
    smile_label.classList.add('visibel');
    smile_button.classList.add('enlarged');
    smile_button.textContent = '😄';
});


smile_button.addEventListener('mouseout', () => {
    smile_label.classList.remove('visibel');
    smile_button.classList.remove('enlarged');
    smile_button.textContent = '🙂';
});

// inputs da opção mais ou menos e seus eventos
const morelass_button = document.getElementById('morelas-button');
const morelas_label = document.querySelector('.morelas-label');

morelass_button.addEventListener('mouseover', () => {
    morelas_label.classList.add('visibel');
    morelass_button.classList.add('enlarged');
    morelass_button.textContent = '😕';
});

morelass_button.addEventListener('mouseout', () => {
    morelas_label.classList.remove('visibel');
    morelass_button.classList.remove('enlarged');
    morelass_button.textContent = '😐';
});

// inputs da opção ruim e seus eventos
const bad_button = document.getElementById('bad-button');
const bad_label = document.querySelector('.bad-label');

bad_button.addEventListener('mouseover', () => {
    bad_label.classList.add('visibel');
    bad_button.classList.add('enlarged');
    bad_button.textContent = '😞';
});

bad_button.addEventListener('mouseout', () => {
    bad_label.classList.remove('visibel');
    bad_button.classList.remove('enlarged');
    bad_button.textContent = '🙁';
});
