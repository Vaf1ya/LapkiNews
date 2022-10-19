document.getElementById('ava_update').addEventListener('click', addStyleForm);

function addStyleForm() {
    document.body.classList.add('overflow');
    $('#ava_form').show();
}

document.getElementById('ava_close').addEventListener('click', removeStyleForm);

function removeStyleForm() {
    document.body.classList.remove('overflow');
}

const fileForm = document.getElementById('form_ava');
document.getElementById('change_user_photo').addEventListener('click', (event) => {
    event.preventDefault();
    const photo_user = document.getElementById('photo_user');
    const xhr = new XMLHttpRequest();
    let orderData = new FormData(fileForm);
    let photo_form_user = document.getElementById('photo_user').value;

    if (photo_form_user === '') {
        photo_user.classList.add('error_form');
    } else {
        photo_user.classList.remove('error_form');
    }

    if (photo_form_user === '') {
        error = 'Заполните поле!';
        document.getElementById('error_photo_user').innerHTML = error;
    } else {
        error = '';
        document.getElementById('error_photo_user').innerHTML = error;
        xhr.open('POST', '../include/ava.php', true);
        xhr.send(orderData);
        xhr.onload = () => {
            if (xhr.responseText == 0) {
                error = 'Не соответствующий файл';
                document.getElementById('error_photo_user').innerHTML = error;
            } else {
                window.location = '../pages/cabinet.php';
            }
        };
    }
});
