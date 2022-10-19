const element = document.getElementById('form_reg');
const form = document.getElementById('registr_cat');
document.getElementById('form_reg').addEventListener('submit', checkForm);

function funcSuccessreg(data) {
    if (data == 1) {
        error = 'Адресс электронной почты введен не коректно';
        document.getElementById('error_reg').innerHTML = error;
    } else {
        element.full_name.value = '';
        element.email.value = '';
        element.login.value = '';
        element.tel.value = '';
        element.pass.value = '';
        element.repeat_pass.value = '';

        error = 'Регистрация прошла успешно';
        document.getElementById('text_reg').innerHTML = error;
    }
}

function checkForm(event) {
    event.preventDefault();
    let full_name = element.full_name.value;
    let email = element.email.value;
    let login = element.login.value;
    let tel = element.tel.value;
    let pass = element.pass.value;
    let repeat_pass = element.repeat_pass.value;
    let data = element.data;

    checkedInputs = form.querySelectorAll('input:checked');
    let add = [];
    checkedInputs.forEach((element) => {
        add.push(element.value);
    });

    function validateEmail(email) {
        var pattern =
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return pattern.test(email);
    }

    if (full_name === '') {
        let full_name = element.full_name;
        full_name.classList.add('error_form');
    } else {
        let full_name = element.full_name;
        full_name.classList.remove('error_form');
    }

    if (email === '') {
        let email = element.email;
        email.classList.add('error_form');
    } else {
        let email = element.email;
        email.classList.remove('error_form');
    }

    if (login === '') {
        let login = element.login;
        login.classList.add('error_form');
    } else {
        let login = element.login;
        login.classList.remove('error_form');
    }

    if (tel === '') {
        let tel = element.tel;
        tel.classList.add('error_form');
    } else {
        let tel = element.tel;
        tel.classList.remove('error_form');
    }

    if (pass === '') {
        let pass = element.pass;
        pass.classList.add('error_form');
    } else {
        let pass = element.pass;
        pass.classList.remove('error_form');
    }

    if (repeat_pass === '') {
        let repeat_pass = element.repeat_pass;
        repeat_pass.classList.add('error_form');
    } else {
        let repeat_pass = element.repeat_pass;
        repeat_pass.classList.remove('error_form');
    }

    if (data.checked === false) {
        let personal = document.getElementById('personal');
        personal.classList.add('error');
    } else {
        let personal = document.getElementById('personal');
        personal.classList.remove('error');
    }

    if (
        full_name === '' ||
        email === '' ||
        login === '' ||
        tel === '' ||
        pass === '' ||
        repeat_pass === '' ||
        data.checked === false
    ) {
        error = 'Заполните все поля!';
        document.getElementById('error_reg').innerHTML = error;
    } else if (/^[\s а-яА-Я]+$/.test(full_name) === false) {
        error = 'Имя имеет недопустимые символы';
        document.getElementById('error_reg').innerHTML = error;
        let full_name = element.full_name;
        full_name.classList.add('error_form');
    } else if (!validateEmail(email)) {
        error = 'Адресс электронной почты введен не коректно';
        document.getElementById('error_reg').innerHTML = error;
        let email = element.email;
        email.classList.add('error_form');
    } else if (
        /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/.test(tel) === false
    ) {
        error = 'Номер телефона введен не коректно';
        document.getElementById('error_reg').innerHTML = error;
        let tel = element.tel;
        tel.classList.add('error_form');
    } else if (pass.length < 6) {
        error = 'Пароль должен быть больше 6 символов';
        document.getElementById('error_reg').innerHTML = error;
        let pass = element.pass;
        pass.classList.add('error_form');
    } else if (pass !== repeat_pass) {
        error = 'Пароли не совподают';
        document.getElementById('error_reg').innerHTML = error;
        let pass = element.pass;
        pass.classList.add('error_form');
    } else if (login.length < 6 || /^[a-zA-Z1-9]+$/.test(login) === false || parseInt(login.substr(0, 1))) {
        error = 'Логин введен не коректно';
        document.getElementById('error_reg').innerHTML = error;
        let login = element.login;
        login.classList.add('error_form');
    } else {
        error = '';
        document.getElementById('error_reg').innerHTML = error;
        $.ajax({
            url: '../include/registr.php',
            type: 'POST',
            data: {
                full_name: full_name,
                email: email,
                login: login,
                tel: tel,
                pass: pass,
                repeat_pass: repeat_pass,
                add: add,
            },
            dataType: 'html',
            success: funcSuccessreg,
        });
    }
}
