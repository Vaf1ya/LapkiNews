const updata = document.getElementById('updata');
const uppass = document.getElementById('uppass');
const upcategor = document.getElementById('upcategor');
const review = document.getElementById('review');
const likes = document.getElementById('likes');
const updata_form = document.getElementById('updata_form');
const uppass_form = document.getElementById('uppass_form');
const upcategor_form = document.getElementById('upcategor_form');
const review_form = document.getElementById('review_form');
const likes_form = document.getElementById('likes_form');

document.getElementById('updata').addEventListener('click', updataStyle);

function updataStyle() {
    updata.classList.add('border');
    uppass.classList.remove('border');
    upcategor.classList.remove('border');
    review.classList.remove('border');
    likes.classList.remove('border');
    updata_form.classList.remove('display_none');
    uppass_form.classList.add('display_none');
    upcategor_form.classList.add('display_none');
    review_form.classList.add('display_none');
    likes_form.classList.add('display_none');
}

document.getElementById('uppass').addEventListener('click', uppassStyle);

function uppassStyle() {
    updata.classList.remove('border');
    uppass.classList.add('border');
    upcategor.classList.remove('border');
    review.classList.remove('border');
    likes.classList.remove('border');
    updata_form.classList.add('display_none');
    uppass_form.classList.remove('display_none');
    upcategor_form.classList.add('display_none');
    review_form.classList.add('display_none');
    likes_form.classList.add('display_none');
}

document.getElementById('upcategor').addEventListener('click', upcategorStyle);

function upcategorStyle() {
    updata.classList.remove('border');
    uppass.classList.remove('border');
    upcategor.classList.add('border');
    review.classList.remove('border');
    likes.classList.remove('border');
    updata_form.classList.add('display_none');
    uppass_form.classList.add('display_none');
    upcategor_form.classList.remove('display_none');
    review_form.classList.add('display_none');
    likes_form.classList.add('display_none');
}

document.getElementById('review').addEventListener('click', reviewStyle);

function reviewStyle() {
    updata.classList.remove('border');
    uppass.classList.remove('border');
    upcategor.classList.remove('border');
    review.classList.add('border');
    likes.classList.remove('border');
    updata_form.classList.add('display_none');
    uppass_form.classList.add('display_none');
    upcategor_form.classList.add('display_none');
    review_form.classList.remove('display_none');
    likes_form.classList.add('display_none');
}

document.getElementById('likes').addEventListener('click', likesStyle);

function likesStyle() {
    updata.classList.remove('border');
    uppass.classList.remove('border');
    upcategor.classList.remove('border');
    review.classList.remove('border');
    likes.classList.add('border');
    updata_form.classList.add('display_none');
    uppass_form.classList.add('display_none');
    upcategor_form.classList.add('display_none');
    review_form.classList.add('display_none');
    likes_form.classList.remove('display_none');
}
