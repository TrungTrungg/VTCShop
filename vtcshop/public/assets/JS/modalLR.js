const modalL = document.querySelector('.js-modal-login');
const modalClose = document.querySelectorAll('.js-close-login');


for (modalC of modalClose) {
    modalC.addEventListener('click', function() {
        modalL.classList.remove('open');
    });
}