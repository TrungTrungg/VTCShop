$(document).ready(function() {
    const modal = document.querySelector('.modalD');
    <?php foreach($users as $user): ?>
    $('#btn-open-modal-<?php echo $user['
        id ']; ?>').click(function() {
        modal.classList.add('open');
    });
    $('#btn-close').click(function() {
        modal.classList.remove('open');
    });
    $('btn-delete').click(function() {
        let id = <?php echo $user['id']; ?>;
        $.ajax({
            url: '<?php echo _WEB_ROOT; ?>/admin/user/deleteUser',
            method: 'GET',
            data: { id: id }
        })
    })
    <?php endforeach; ?>
})