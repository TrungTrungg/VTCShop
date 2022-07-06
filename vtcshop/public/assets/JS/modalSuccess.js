$(document).ready(function() {
    const modal = document.querySelector('.modal');
    const modalP = document.querySelector('.modalP');
    $('#btn-close').click(function() {
        modal.classList.remove('open');
    });
    $('#btn-closeP').click(function() {
        modalP.classList.remove('open');
    });

});