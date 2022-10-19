<link rel="stylesheet" href="../css/auth.css">
<div class="background"></div>
<form action="" id="form_auth">
    <div class="form_auth">
        <div class="header_auth">
            <h1>Авторизация</h1>
            <img id="close" src="../img/close.png" alt="" onClick="$('#new_form').hide();">
        </div>
        <label for="">Введите email</label>
        <input type="text" name="email">
        <label for="">Введите пароль</label>
        <input type="password" name="pass">
        <p id="error_auth"></p>
        <button class="login">Войти</button>
        <a href="../pages/registr.php" class="reg">Зарегестрироваться</a>
    </div>
</form>