const chapter1 = document.getElementById('chapter1');
const chapter2 = document.getElementById('chapter2');
const chapter3 = document.getElementById('chapter3');
const chapter4 = document.getElementById('chapter4');
const chapter5 = document.getElementById('chapter5');
const chapter6 = document.getElementById('chapter6');
const form_chapter1 = document.getElementById('form_chapter1');
const form_chapter2 = document.getElementById('form_chapter2');
const form_chapter3 = document.getElementById('form_chapter3');
const form_chapter4 = document.getElementById('form_chapter4');
const form_chapter5 = document.getElementById('form_chapter5');
const form_chapter6 = document.getElementById('form_chapter6');
const post_mod = document.getElementById('post_mod');
const comment_mod = document.getElementById('comment_mod');
const review_mod = document.getElementById('review_mod');
const create_article_mod = document.getElementById('create_article_mod');
const create_contests_mod = document.getElementById('create_contests_mod');
const contests_form = document.getElementById('contests_form');
const post_mod_form = document.getElementById('post_mod_form');
const comment_mod_form = document.getElementById('comment_mod_form');
const review_mod_form = document.getElementById('review_mod_form');
const create_article_form = document.getElementById('create_article_form');

document.getElementById('chapter1').addEventListener('click', chapter1Style);

function chapter1Style() {
    chapter1.classList.add('border');
    chapter2.classList.remove('border');
    chapter3.classList.remove('border');
    chapter4.classList.remove('border');
    chapter5.classList.remove('border');
    chapter6.classList.remove('border');
    form_chapter1.classList.remove('display_none');
    form_chapter2.classList.add('display_none');
    form_chapter3.classList.add('display_none');
    form_chapter4.classList.add('display_none');
    form_chapter5.classList.add('display_none');
    form_chapter6.classList.add('display_none');
}

document.getElementById('chapter2').addEventListener('click', chapter2Style);

function chapter2Style() {
    chapter1.classList.remove('border');
    chapter2.classList.add('border');
    chapter3.classList.remove('border');
    chapter4.classList.remove('border');
    chapter5.classList.remove('border');
    chapter6.classList.remove('border');
    form_chapter1.classList.add('display_none');
    form_chapter2.classList.remove('display_none');
    form_chapter3.classList.add('display_none');
    form_chapter4.classList.add('display_none');
    form_chapter5.classList.add('display_none');
    form_chapter6.classList.add('display_none');
}
document.getElementById('chapter3').addEventListener('click', chapter3Style);

function chapter3Style() {
    chapter1.classList.remove('border');
    chapter2.classList.remove('border');
    chapter3.classList.add('border');
    chapter4.classList.remove('border');
    chapter5.classList.remove('border');
    chapter6.classList.remove('border');
    form_chapter1.classList.add('display_none');
    form_chapter2.classList.add('display_none');
    form_chapter3.classList.remove('display_none');
    form_chapter4.classList.add('display_none');
    form_chapter5.classList.add('display_none');
    form_chapter6.classList.add('display_none');
}
document.getElementById('chapter4').addEventListener('click', chapter4Style);

function chapter4Style() {
    chapter1.classList.remove('border');
    chapter2.classList.remove('border');
    chapter3.classList.remove('border');
    chapter4.classList.add('border');
    chapter5.classList.remove('border');
    chapter6.classList.remove('border');
    form_chapter1.classList.add('display_none');
    form_chapter2.classList.add('display_none');
    form_chapter3.classList.add('display_none');
    form_chapter4.classList.remove('display_none');
    form_chapter5.classList.add('display_none');
    form_chapter6.classList.add('display_none');
}
document.getElementById('chapter5').addEventListener('click', chapter5Style);

function chapter5Style() {
    chapter1.classList.remove('border');
    chapter2.classList.remove('border');
    chapter3.classList.remove('border');
    chapter4.classList.remove('border');
    chapter5.classList.add('border');
    chapter6.classList.remove('border');
    form_chapter1.classList.add('display_none');
    form_chapter2.classList.add('display_none');
    form_chapter3.classList.add('display_none');
    form_chapter4.classList.add('display_none');
    form_chapter5.classList.remove('display_none');
    form_chapter6.classList.add('display_none');
}
document.getElementById('chapter6').addEventListener('click', chapter6Style);

function chapter6Style() {
    chapter1.classList.remove('border');
    chapter2.classList.remove('border');
    chapter3.classList.remove('border');
    chapter4.classList.remove('border');
    chapter5.classList.remove('border');
    chapter6.classList.add('border');
    form_chapter1.classList.add('display_none');
    form_chapter2.classList.add('display_none');
    form_chapter3.classList.add('display_none');
    form_chapter4.classList.add('display_none');
    form_chapter5.classList.add('display_none');
    form_chapter6.classList.remove('display_none');
}

document.getElementById('post_mod').addEventListener('click', post_modStyle);

function post_modStyle() {
    post_mod.classList.add('border');
    comment_mod.classList.remove('border');
    review_mod.classList.remove('border');
    create_article_mod.classList.remove('border');
    create_contests_mod.classList.remove('border');
    post_mod_form.classList.remove('display_none');
    comment_mod_form.classList.add('display_none');
    review_mod_form.classList.add('display_none');
    create_article_form.classList.add('display_none');
    contests_form.classList.add('display_none');
}

document.getElementById('comment_mod').addEventListener('click', comment_modStyle);

function comment_modStyle() {
    post_mod.classList.remove('border');
    comment_mod.classList.add('border');
    review_mod.classList.remove('border');
    create_article_mod.classList.remove('border');
    create_contests_mod.classList.remove('border');
    post_mod_form.classList.add('display_none');
    comment_mod_form.classList.remove('display_none');
    review_mod_form.classList.add('display_none');
    create_article_form.classList.add('display_none');
    contests_form.classList.add('display_none');
}

document.getElementById('review_mod').addEventListener('click', review_modStyle);

function review_modStyle() {
    post_mod.classList.remove('border');
    comment_mod.classList.remove('border');
    review_mod.classList.add('border');
    create_article_mod.classList.remove('border');
    create_contests_mod.classList.remove('border');
    post_mod_form.classList.add('display_none');
    comment_mod_form.classList.add('display_none');
    review_mod_form.classList.remove('display_none');
    create_article_form.classList.add('display_none');
    contests_form.classList.add('display_none');
}

document.getElementById('create_article_mod').addEventListener('click', create_articleStyle);

function create_articleStyle() {
    post_mod.classList.remove('border');
    comment_mod.classList.remove('border');
    review_mod.classList.remove('border');
    create_article_mod.classList.add('border');
    create_contests_mod.classList.remove('border');
    post_mod_form.classList.add('display_none');
    comment_mod_form.classList.add('display_none');
    review_mod_form.classList.add('display_none');
    create_article_form.classList.remove('display_none');
    contests_form.classList.add('display_none');
}

document.getElementById('create_contests_mod').addEventListener('click', create_contestsStyle);

function create_contestsStyle() {
    post_mod.classList.remove('border');
    comment_mod.classList.remove('border');
    review_mod.classList.remove('border');
    create_article_mod.classList.remove('border');
    create_contests_mod.classList.add('border');
    post_mod_form.classList.add('display_none');
    comment_mod_form.classList.add('display_none');
    review_mod_form.classList.add('display_none');
    create_article_form.classList.add('display_none');
    contests_form.classList.remove('display_none');
}
