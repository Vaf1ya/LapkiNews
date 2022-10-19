<?php
$to = "cjcjrhf567@mail.ru"; // емайл получателя данных из формы
$tema = "Форма обратной связи"; // тема полученного емайла
$full_name = $_POST['full_name']; //присвоить переменной значение, полученное из формы name=name
$message = $_POST['email'] . $_POST['text'] ; //полученное из формы name=email
$headers = "Content-type:text/plain; charset = UTF-8\r\n"; // указывает на тип посылаемого контента
$mes = "Имя: $full_name \nE-mail: $to \nТема: $tema \nТекст: $message";
$send = mail($to, $tema, $mes, $headers); //отправляет получателю на емайл значения переменных
if ($send === true) {
    echo "0";
}
// Если письмо не ушло — выводим сообщение об ошибке
else {
    echo "1";
};
