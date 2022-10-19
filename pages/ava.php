<link rel="stylesheet" href="../css/auth.css">
<div class="background"></div>
<form method="post" enctype="multipart/form-data" id="form_ava">
    <div class="form_auth">
        <div class="header_auth">
            <h1>Изменить аватар</h1>
            <img id="ava_close" src="../img/close.png" alt="" onClick="$('#ava_form').hide();">
        </div>
        <label for="">Введите email</label>
        <input type="file" id="photo_user" name="photo">
        <p class="error" id="error_photo_user"></p>
        <button class="login" id="change_user_photo">Изменить</button>
    </div>
</form>