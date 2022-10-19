document.getElementById('create_post').addEventListener('submit', create_postForm);

function funcSuccesscreatePost(data) {
    console.log(data);
    if (data == 1) {
        const create_post = document.getElementById('create_post');
        create_post.text.value = '';
        error = 'Пост создан';
        document.getElementById('text_post').innerHTML = error;
    }
}

function create_postForm(event) {
    event.preventDefault();
    const create_post = document.getElementById('create_post');
    const categor = document.getElementById('create_categor');
    const types = document.getElementById('create_types');
    let text = create_post.text.value;

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

    if (text === '') {
        let text = create_post.text;
        text.classList.add('error_form');
    } else {
        let text = create_post.text;
        text.classList.remove('error_form');
    }

    if (text === '') {
        error = 'Заполните поле!';
        document.getElementById('error_post').innerHTML = error;
    } else {
        error = '';
        document.getElementById('error_post').innerHTML = error;
        $.ajax({
            url: '../include/create_post.php',
            type: 'POST',
            data: { text: text, add: add, addTypes: addTypes },
            dataType: 'html',
            success: funcSuccesscreatePost,
        });
    }
}
