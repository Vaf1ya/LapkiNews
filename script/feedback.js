const feedback_form = document.getElementById('feedback_form');
document.getElementById('feedback_form').addEventListener('submit', feedbackForm);

function funcSuccessfeedback(data) {
    if (data == 1) {
        error = 'Ой, что-то пошло не так';
        document.getElementById('error_feedback').innerHTML = error;
    } else {
        feedback_form.full_name.value = '';
        feedback_form.email.value = '';
        feedback_form.text.value= '';
        error = 'Сообщение отправлено';
        document.getElementById('text_feedback').innerHTML = error;
    }
}

function feedbackForm(event) {
    event.preventDefault();
    let full_name = feedback_form.full_name.value;
    let email = feedback_form.email.value;
    let text = feedback_form.text.value;

    function validateEmail(email) {
        var pattern =
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return pattern.test(email);
    }

    if (full_name === '') {
        let full_name = feedback_form.full_name;
        full_name.classList.add('error_form');
    } else {
        let full_name = feedback_form.full_name;
        full_name.classList.remove('error_form');
    }

    if (email === '') {
        let email = feedback_form.email;
        email.classList.add('error_form');
    } else {
        let email = feedback_form.email;
        email.classList.remove('error_form');
    }

    if (text === '') {
        let text = feedback_form.text;
        text.classList.add('error_form');
    } else {
        let text = feedback_form.text;
        text.classList.remove('error_form');
    }

    if (full_name === '' || email === '' || text === '') {
        error = 'Заполните все поля!';
        document.getElementById('error_feedback').innerHTML = error;
    } else if (/^[\s а-яА-Я]+$/.test(full_name) === false) {
        error = 'Имя имеет недопустимые символы';
        document.getElementById('error_feedback').innerHTML = error;
        let full_name = feedback_form.full_name;
        full_name.classList.add('error_form');
    } else if (!validateEmail(email)) {
        error = 'Адресс электронной почты введен не коректно';
        document.getElementById('error_feedback').innerHTML = error;
        let email = feedback_form.email;
        email.classList.add('error_form');
    } else {
        error = '';
        document.getElementById('error_feedback').innerHTML = error;
        $.ajax({
            url: '../include/feedback.php',
            type: 'POST',
            data: { full_name: full_name, email: email, text: text },
            dataType: 'html',
            success: funcSuccessfeedback,
        });
    }
}
