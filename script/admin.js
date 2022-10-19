const alert = document.getElementById('alert');
const alert_text = document.getElementById('alert_text');
const post_delete_admin = document.querySelectorAll('.post_delete_admin');
const post_approve_admin = document.querySelectorAll('.post_approve_admin');
const comment_delete_admin = document.querySelectorAll('.comment_delete_admin');
const comment_approve_admin = document.querySelectorAll('.comment_approve_admin');
const review_delete_admin = document.querySelectorAll('.review_delete_admin');
const review_approve_admin = document.querySelectorAll('.review_approve_admin');

alert.addEventListener('click', () => {
    alert.classList.remove('visibility');
});

document.getElementById('types_add').addEventListener('click', TypesAdd);

function funcSuccessTypesAdd(data) {
    if (data == 1) {
        text = 'Раздел добавлен';
        alert_text.innerHTML = text;
        alert.classList.add('visibility');
        setTimeout(() => {
            alert.classList.remove('visibility');
        }, 3000);
        document.getElementById('form_types_add').value = '';
    }
}

function TypesAdd(event) {
    event.preventDefault();
    let types = document.getElementById('form_types_add').value;
    $.ajax({
        url: '../include/types_add.php',
        type: 'POST',
        data: { types: types },
        dataType: 'html',
        success: funcSuccessTypesAdd,
    });
}

document.getElementById('types_delete').addEventListener('click', TypesDelete);

function funcSuccessTypesDelete(data) {
    if (data == 1) {
        text = 'Раздел удален';
        alert_text.innerHTML = text;
        alert.classList.add('visibility');
        setTimeout(() => {
            alert.classList.remove('visibility');
        }, 3000);
        document.getElementById('form_types_delete').value = '1';
    }
}

function TypesDelete(event) {
    event.preventDefault();
    let types = document.getElementById('form_types_delete').value;
    $.ajax({
        url: '../include/types_delete.php',
        type: 'POST',
        data: { types: types },
        dataType: 'html',
        success: funcSuccessTypesDelete,
    });
}

function funcSuccessDeleteadminPost(data) {
    if (data == 1) {
        text = 'Пост удален';
        alert_text.innerHTML = text;
        alert.classList.add('visibility');
        setTimeout(() => {
            alert.classList.remove('visibility');
        }, 3000);
    }
}

post_delete_admin.forEach((btn) => {
    btn.addEventListener('click', (event) => {
        event.stopPropagation();
        let digits = btn.id.replace(/\D/g, '');
        let letters = btn.id.replace(/[^a-z]/gi, '');
        let id = digits;
        $.ajax({
            url: '../include/post_delete_admin.php',
            type: 'POST',
            data: {
                id: id,
            },
            dataType: 'html',
            success: funcSuccessDeleteadminPost,
        });
    });
});

function funcSuccessApproveadminPost(data) {
    if (data == 1) {
        text = 'Пост одобрен';
        alert_text.innerHTML = text;
        alert.classList.add('visibility');
        setTimeout(() => {
            alert.classList.remove('visibility');
        }, 3000);
    }
}

post_approve_admin.forEach((btn) => {
    btn.addEventListener('click', (event) => {
        event.stopPropagation();
        let digits = btn.id.replace(/\D/g, '');
        let letters = btn.id.replace(/[^a-z]/gi, '');
        let id = digits;
        $.ajax({
            url: '../include/post_approve_admin.php',
            type: 'POST',
            data: {
                id: id,
            },
            dataType: 'html',
            success: funcSuccessApproveadminPost,
        });
    });
});

function funcSuccessDeleteadminComment(data) {
    if (data == 1) {
        text = 'Коментарий удален';
        alert_text.innerHTML = text;
        alert.classList.add('visibility');
        setTimeout(() => {
            alert.classList.remove('visibility');
        }, 3000);
    }
}

comment_delete_admin.forEach((btn) => {
    btn.addEventListener('click', (event) => {
        event.stopPropagation();
        let digits = btn.id.replace(/\D/g, '');
        let letters = btn.id.replace(/[^a-z]/gi, '');
        let id = digits;
        $.ajax({
            url: '../include/comment_delete_admin.php',
            type: 'POST',
            data: {
                id: id,
            },
            dataType: 'html',
            success: funcSuccessDeleteadminComment,
        });
    });
});

function funcSuccessApproveadminComment(data) {
    if (data == 1) {
        text = 'Комментарий одобрен';
        alert_text.innerHTML = text;
        alert.classList.add('visibility');
        setTimeout(() => {
            alert.classList.remove('visibility');
        }, 3000);
    }
}

comment_approve_admin.forEach((btn) => {
    btn.addEventListener('click', (event) => {
        event.stopPropagation();
        let digits = btn.id.replace(/\D/g, '');
        let letters = btn.id.replace(/[^a-z]/gi, '');
        let id = digits;
        $.ajax({
            url: '../include/comment_approve_admin.php',
            type: 'POST',
            data: {
                id: id,
            },
            dataType: 'html',
            success: funcSuccessApproveadminComment,
        });
    });
});

function funcSuccessDeleteadminReview(data) {
    if (data == 1) {
        text = 'Отзыв удален';
        alert_text.innerHTML = text;
        alert.classList.add('visibility');
        setTimeout(() => {
            alert.classList.remove('visibility');
        }, 3000);
    }
}

review_delete_admin.forEach((btn) => {
    btn.addEventListener('click', (event) => {
        event.stopPropagation();
        let digits = btn.id.replace(/\D/g, '');
        let letters = btn.id.replace(/[^a-z]/gi, '');
        let id = digits;
        $.ajax({
            url: '../include/review_delete_admin.php',
            type: 'POST',
            data: {
                id: id,
            },
            dataType: 'html',
            success: funcSuccessDeleteadminReview,
        });
    });
});

function funcSuccessApproveadminReview(data) {
    console.log(data);
    if (data == 1) {
        text = 'Отзыв одобрен';
        alert_text.innerHTML = text;
        alert.classList.add('visibility');
        setTimeout(() => {
            alert.classList.remove('visibility');
        }, 3000);
    }
}

review_approve_admin.forEach((btn) => {
    btn.addEventListener('click', (event) => {
        event.stopPropagation();
        let digits = btn.id.replace(/\D/g, '');
        let letters = btn.id.replace(/[^a-z]/gi, '');
        let id = digits;
        $.ajax({
            url: '../include/review_approve_admin.php',
            type: 'POST',
            data: {
                id: id,
            },
            dataType: 'html',
            success: funcSuccessApproveadminReview,
        });
    });
});

const fileForm = document.getElementById('fileForm');
document.getElementById('form_article_add').addEventListener('click', (event) => {
    event.preventDefault();
    const photo = document.getElementById('photo_admin');
    const xhr = new XMLHttpRequest();
    let orderData = new FormData(fileForm);

    const categor = document.getElementById('categor_article_admin');
    const types = document.getElementById('types_article_admin');
    let title = document.getElementById('title_article_admin').value;
    let photo_form = document.getElementById('photo_admin').value;

    checkedInputscategor = categor.querySelectorAll('input:checked');
    let add = [];
    checkedInputscategor.forEach((element) => {
        add.push(element.value);
    });

    checkedInputstypes = types.querySelectorAll('input:checked');
    let addTypes = [];
    checkedInputstypes.forEach((element) => {
        addTypes.push(element.value);
    });

    if (title === '') {
        let title = document.getElementById('title_article_admin');
        title.classList.add('error_form');
    } else {
        let title = document.getElementById('title_article_admin');
        title.classList.remove('error_form');
    }

    if (photo_form === '') {
        photo.classList.add('error_form');
    } else {
        photo.classList.remove('error_form');
    }

    if (title === '' || photo_form === '') {
        error = 'Заполните поле!';
        document.getElementById('error_admin').innerHTML = error;
    } else {
        error = '';
        document.getElementById('error_admin').innerHTML = error;
        text = 'Статья добавлена';
        alert_text.innerHTML = text;
        alert.classList.add('visibility');
        setTimeout(() => {
            alert.classList.remove('visibility');
        }, 3000);
        xhr.open('POST', '../include/article_admin.php', true);
        xhr.send(orderData);
    }
});

const fileForm_contests = document.getElementById('fileForm_contests');
document.getElementById('form_contests_add').addEventListener('click', (event) => {
    event.preventDefault();
    const photo_contests = document.getElementById('photo_contests_admin');
    const xhr = new XMLHttpRequest();
    let orderData = new FormData(fileForm_contests);

    let title = document.getElementById('title_contests_admin').value;
    let date = document.getElementById('date_contests_admin').value;
    let photo_contests_form = document.getElementById('photo_contests_admin').value;

    if (title === '') {
        let title = document.getElementById('title_contests_admin');
        title.classList.add('error_form');
    } else {
        let title = document.getElementById('title_contests_admin');
        title.classList.remove('error_form');
    }

    if (date === '') {
        let date = document.getElementById('date_contests_admin');
        date.classList.add('error_form');
    } else {
        let date = document.getElementById('date_contests_admin');
        date.classList.remove('error_form');
    }

    if (photo_contests_form === '') {
        photo_contests.classList.add('error_form');
    } else {
        photo_contests.classList.remove('error_form');
    }

    if (title === '' || date === '' || photo_contests_form === '') {
        error = 'Заполните поле!';
        document.getElementById('error_contests_admin').innerHTML = error;
    } else {
        error = '';
        document.getElementById('error_contests_admin').innerHTML = error;
        xhr.open('POST', '../include/contests_admin.php', true);
        xhr.send(orderData);
        xhr.onload = () => {
            if (xhr.responseText == 0) {
                error = 'Не соответствующий файл';
                document.getElementById('error_contests_admin').innerHTML = error;
            } else {
                text = 'Конкурс добавлен';
                alert_text.innerHTML = text;
                alert.classList.add('visibility');
                setTimeout(() => {
                    alert.classList.remove('visibility');
                }, 3000);
            }
        };
    }
});

function funcSuccessCompleted_contests(data) {
    console.log(data);
    if (data == 1) {
        text = 'Конкурс завершен';
        alert_text.innerHTML = text;
        alert.classList.add('visibility');
        setTimeout(() => {
            alert.classList.remove('visibility');
        }, 3000);
    }
}

document.getElementById('completed_contests_btn').addEventListener('click', (event) => {
    event.preventDefault();
    let id = document.getElementById('id_contests').value;
    $.ajax({
        url: '../include/completed_contests.php',
        type: 'POST',
        data: { id: id },
        dataType: 'html',
        success: funcSuccessCompleted_contests,
    });
});
