document.getElementById('updata_form').addEventListener('submit', updataForm);

function funcSuccessupdata(data) {
    if (data == 1) {
        error = 'Адресс электронной почты введен не коректно';
        document.getElementById('error_updata').innerHTML = error;
    } else {
        const updata_form = document.getElementById('updata_form');
        updata_form.full_name.value = '';
        updata_form.email.value = '';
        updata_form.login.value = '';
        updata_form.tel.value = '';
        error = 'Данные обновленны';
        document.getElementById('text_updata').innerHTML = error;
    }
}

function updataForm(event) {
    event.preventDefault();
    const updata_form = document.getElementById('updata_form');
    let full_name = updata_form.full_name.value;
    let email = updata_form.email.value;
    let login = updata_form.login.value;
    let tel = updata_form.tel.value;

    function validateEmail(email) {
        var pattern =
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return pattern.test(email);
    }

    if (full_name === '') {
        let full_name = updata_form.full_name;
        full_name.classList.add('error_form');
    } else {
        let full_name = updata_form.full_name;
        full_name.classList.remove('error_form');
    }

    if (email === '') {
        let email = updata_form.email;
        email.classList.add('error_form');
    } else {
        let email = updata_form.email;
        email.classList.remove('error_form');
    }

    if (login === '') {
        let login = updata_form.login;
        login.classList.add('error_form');
    } else {
        let login = updata_form.login;
        login.classList.remove('error_form');
    }

    if (tel === '') {
        let tel = updata_form.tel;
        tel.classList.add('error_form');
    } else {
        let tel = updata_form.tel;
        tel.classList.remove('error_form');
    }

    if (full_name === '' || email === '' || login === '' || tel === '') {
        error = 'Заполните все поля!';
        document.getElementById('error_updata').innerHTML = error;
    } else if (/^[\s а-яА-Я]+$/.test(full_name) === false) {
        error = 'Имя имеет недопустимые символы';
        document.getElementById('error_updata').innerHTML = error;
        let full_name = updata_form.full_name;
        full_name.classList.add('error_form');
    } else if (!validateEmail(email)) {
        error = 'Адресс электронной почты введен не коректно';
        document.getElementById('error_updata').innerHTML = error;
        let email = updata_form.email;
        email.classList.add('error_form');
    } else if (
        /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/.test(tel) === false
    ) {
        error = 'Номер телефона введен не коректно';
        document.getElementById('error_updata').innerHTML = error;
        let tel = updata_form.tel;
        tel.classList.add('error_form');
    } else if (login.length < 6 || /^[a-zA-Z1-9]+$/.test(login) === false || parseInt(login.substr(0, 1))) {
        error = 'Логин введен не коректно';
        document.getElementById('error_updata').innerHTML = error;
        let login = updata_form.login;
        login.classList.add('error_form');
    } else {
        error = '';
        document.getElementById('error_updata').innerHTML = error;
        $.ajax({
            url: '../include/update.php',
            type: 'POST',
            data: { full_name: full_name, email: email, login: login, tel: tel },
            dataType: 'html',
            success: funcSuccessupdata,
        });
    }
}

document.getElementById('uppass_form').addEventListener('submit', uppassForm);

function funcSuccessuppass(data) {
    if (data == 1) {
        error = 'Пароль не соответствует текущему паролю';
        document.getElementById('error_uppass').innerHTML = error;
        let pass = uppass_form.pass;
        pass.classList.add('error_form');
    } else {
        const uppass_form = document.getElementById('uppass_form');
        uppass_form.pass.value = '';
        uppass_form.new_pass.value = '';
        error = 'Данные обновлен';
        document.getElementById('text_uppass').innerHTML = error;
        let new_pass = uppass_form.new_pass;
        new_pass.classList.remove('error_form');
    }
}

function uppassForm(event) {
    event.preventDefault();
    const uppass_form = document.getElementById('uppass_form');
    let pass = uppass_form.pass.value;
    let new_pass = uppass_form.new_pass.value;

    if (pass === '') {
        let pass = uppass_form.pass;
        pass.classList.add('error_form');
    } else {
        let pass = uppass_form.pass;
        pass.classList.remove('error_form');
    }

    if (new_pass === '') {
        let new_pass = uppass_form.new_pass;
        new_pass.classList.add('error_form');
    } else {
        let new_pass = uppass_form.new_pass;
        new_pass.classList.remove('error_form');
    }

    if (pass === '' || new_pass === '') {
        error = 'Заполните все поля!';
        document.getElementById('error_uppass').innerHTML = error;
    } else if (pass.length < 6 || new_pass.length < 6) {
        error = 'Пароль должен быть больше 6 символов';
        document.getElementById('error_uppass').innerHTML = error;
        let pass = uppass_form.pass;
        pass.classList.add('error_form');
        let new_pass = uppass_form.new_pass;
        new_pass.classList.add('error_form');
    } else {
        error = '';
        document.getElementById('error_uppass').innerHTML = error;
        $.ajax({
            url: '../include/uppass.php',
            type: 'POST',
            data: { pass: pass, new_pass: new_pass },
            dataType: 'html',
            success: funcSuccessuppass,
        });
    }
}

document.getElementById('upcategor_form').addEventListener('submit', upcategorForm);

function funcSuccessupcategor(data) {
    if (data == 0) {
        error = 'Разделы обновленны';
        document.getElementById('text_upcategor').innerHTML = error;
    } else {
        error = 'Ой, что-то пошло не так';
        document.getElementById('error_upcategor').innerHTML = error;
    }
}

function upcategorForm(event) {
    event.preventDefault();
    const upcategor_form = document.getElementById('upcategor_form');

    checkedInputs = upcategor_form.querySelectorAll('input:checked');
    let add = [];
    checkedInputs.forEach((element) => {
        add.push(element.value);
    });

    $.ajax({
        url: '../include/upcategor.php',
        type: 'POST',
        data: { add: add },
        dataType: 'html',
        success: funcSuccessupcategor,
    });
}

document.getElementById('review_form').addEventListener('submit', reviewForm);

function funcSuccessreview(data) {
    if (data == 0) {
        const review_form = document.getElementById('review_form');
        review_form.text_review.value = '';
        error = 'Отзыв отправлен на расмотрение';
        document.getElementById('text_review').innerHTML = error;
    } else {
        error = 'Ой, что-то пошло не так';
        document.getElementById('error_review').innerHTML = error;
    }
}

function reviewForm(event) {
    event.preventDefault();
    const review_form = document.getElementById('review_form');
    let text_review = review_form.text_review.value;

    if (text_review === '') {
        let text_review = review_form.text_review;
        text_review.classList.add('error_form');
    } else {
        let text_review = review_form.text_review;
        text_review.classList.remove('error_form');
    }

    if (text_review === '') {
        error = 'Заполните все поля!';
        document.getElementById('error_review').innerHTML = error;
    } else {
        error = '';
        document.getElementById('error_review').innerHTML = error;

        $.ajax({
            url: '../include/review.php',
            type: 'POST',
            data: { text_review: text_review },
            dataType: 'html',
            success: funcSuccessreview,
        });
    }
}
