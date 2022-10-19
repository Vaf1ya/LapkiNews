const terms = document.getElementById('terms');
const terms_form = document.getElementById('terms_form');
const active_contests = document.getElementById('active_contests');
const completed_contests = document.getElementById('completed_contests');
const active_contests_form = document.getElementById('active_contests_form');
const completed_contests_form = document.getElementById('completed_contests_form');

active_contests.addEventListener('click', () => {
    active_contests.classList.add('border');
    completed_contests.classList.remove('border');
    active_contests_form.classList.remove('display_none');
    completed_contests_form.classList.add('display_none');
});

completed_contests.addEventListener('click', () => {
    active_contests.classList.remove('border');
    completed_contests.classList.add('border');
    active_contests_form.classList.add('display_none');
    completed_contests_form.classList.remove('display_none');
});

terms.addEventListener('click', () => {
    terms_form.classList.toggle('display_none');
});
