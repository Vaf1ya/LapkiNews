const show_comment_btn = document.querySelectorAll('.show_comment_btn');
const add_comment_btn = document.querySelectorAll('.add_comment_btn');
const create_comment_btn = document.querySelectorAll('.create_comment_btn');
const like_post_btn = document.querySelectorAll('.like_post_btn');
const like_comment_btn = document.querySelectorAll('.like_comment_btn');
const alert = document.getElementById('alert');
const alert_text = document.getElementById('alert_text');

show_comment_btn.forEach((btn) => {
    btn.addEventListener('click', () => {
        console.log(btn.closest('.post').nextElementSibling);
        btn.closest('.post').nextElementSibling.classList.toggle('width');
    });
});

add_comment_btn.forEach((btn) => {
    btn.addEventListener('click', () => {
        btn.closest('.parent').childNodes[5].classList.toggle('comment');
    });
});

function funcSuccessAdd(data) {
    if (data == 1) {
        text = 'Собщение отправленно';
        alert_text.innerHTML = text;
        alert.classList.add('visibility');
        setTimeout(() => {
            alert.classList.remove('visibility');
        }, 3000);
    }
}

alert.addEventListener('click', () => {
    alert.classList.remove('visibility');
});

create_comment_btn.forEach((btn) => {
    btn.addEventListener('click', (event) => {
        event.stopPropagation();
        let text = btn.previousElementSibling.value;
        let id = btn.id;
        btn.previousElementSibling.value = '';
        $.ajax({
            url: '../include/add_comment.php',
            type: 'POST',
            data: {
                text: text,
                id: id,
            },
            dataType: 'html',
            success: funcSuccessAdd,
        });
    });
});

// function funcSuccessLikepost(data) {
//     const result = JSON.parse(data);
//     console.log(result[0]);
//     if (result[0] == 1) {
//         let id_post = document.getElementById('post' + result[1]);
//         console.log(id_post.nextElementSibling.innerHTML);
//         id_post.nextElementSibling.innerHTML = +id_post.nextElementSibling.innerHTML + 1;
//     } else if (result[0] == 0) {
//         document.getElementById('post' + result[1]).nextElementSibling.innerHTML =
//             +document.getElementById('post' + result[1]).nextElementSibling.innerHTML - 1;
//     }
// }

// like_post_btn.forEach((btn) => {
//     btn.addEventListener('click', (event) => {
//         event.stopPropagation();
//         let like = btn.nextElementSibling.innerHTML;
//         let digits = btn.id.replace(/\D/g, '');
//         let letters = btn.id.replace(/[^a-z]/gi, '');
//         let id = digits;
//         $.ajax({
//             url: '../include/like_post.php',
//             type: 'POST',
//             data: {
//                 like: like,
//                 id: id,
//             },
//             dataType: 'html',
//             success: funcSuccessLikepost,
//         });
//     });
// });

// function funcSuccessLikecomment(data) {
//     const result = JSON.parse(data);
//     console.log(result[0]);
//     if (result[0] == 1) {
//         document.getElementById('comment' + result[1]).nextElementSibling.innerHTML =
//             +document.getElementById('comment' + result[1]).nextElementSibling.innerHTML + 1;
//     } else if (result[0] == 0) {
//         document.getElementById('comment' + result[1]).nextElementSibling.innerHTML =
//             +document.getElementById('comment' + result[1]).nextElementSibling.innerHTML - 1;
//     }
// }

// like_comment_btn.forEach((btn) => {
//     btn.addEventListener('click', (event) => {
//         event.stopPropagation();
//         let like = btn.nextElementSibling.innerHTML;
//         let digits = btn.id.replace(/\D/g, '');
//         let letters = btn.id.replace(/[^a-z]/gi, '');
//         let id = digits;
//         $.ajax({
//             url: '../include/like_comment.php',
//             type: 'POST',
//             data: {
//                 like: like,
//                 id: id,
//             },
//             dataType: 'html',
//             success: funcSuccessLikecomment,
//         });
//     });
// });
