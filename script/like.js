const likes_form = document.getElementById('likes');

document.getElementById('like').addEventListener('click', checkLike);

function funcSuccesslike(data) {
    if (data == 1) {
        likes_form.innerHTML = +likes_form.innerHTML + 1;
        document.getElementById('fill_on').classList.remove('fill_on');
        document.getElementById('fill_on').classList.add('fill_off');
    } else if (data == 0) {
        likes_form.innerHTML = +likes_form.innerHTML - 1;
        document.getElementById('fill_on').classList.remove('fill_off');
        document.getElementById('fill_on').classList.add('fill_on');
    }
}

function checkLike(event) {
    event.preventDefault();
    let id = document.getElementById('like_form').value;
    let likes = likes_form.innerHTML;

    $.ajax({
        url: '../include/like.php',
        type: 'POST',
        data: { id: id, likes: likes },
        dataType: 'html',
        success: funcSuccesslike,
    });
}
