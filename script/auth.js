document.getElementById('form_auth').addEventListener('submit', checkFormauth);

function funcSuccessauth(data) {
    console.log(data);
    if (data == 1) {
        error = 'Email или пароль введены не верно';
        document.getElementById('error_auth').innerHTML = error;
    } else {
        window.location = '../index.php';
    }
}

function checkFormauth(event) {
    event.preventDefault();
    const element = document.getElementById('form_auth');
    let email = element.email.value;
    let pass = element.pass.value;

    if (pass === '' || email === '') {
        error = 'Заполните все поля';
        document.getElementById('error_auth').innerHTML = error;
    } else {
        $.ajax({
            url: '../include/auth.php',
            type: 'POST',
            data: { email, pass },
            dataType: 'html',
            success: funcSuccessauth,
        });
    }
}

document.getElementById('cabinet').addEventListener('click', open);

function open() {
    $('#new_form').show();
}
