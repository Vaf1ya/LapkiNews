document.getElementById('cabinet').addEventListener('click', addStyle);

function addStyle() {
    document.body.classList.add('overflow');
}

document.getElementById('close').addEventListener('click', removeStyle);

function removeStyle() {
    document.body.classList.remove('overflow');
}
