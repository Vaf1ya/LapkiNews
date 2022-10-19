<?php
require_once('dbconnect.php');
$title = $_POST['title'];
$add = $_POST['add'];
$add_result = implode(",", $add);
$addTypes = $_POST['addTypes'];
$addTypes_result = implode(",", $addTypes);
$name = $_FILES["photo"]["name"];
$path = $_FILES["photo"]["tmp_name"];
$date = date('Y-m-d');
$rand = rand();     // Создаем рандомную часть для имени rand()
$file_types = array('.png', '.jpg', '.jpeg');
$filenamefull = $rand . $name;
$filePath = '../img/';
if (file_exists($filePath) && in_array(mb_strstr($name, '.'), $file_types) && filesize($path) < 41943040) {
    move_uploaded_file($path, "$filePath/$filenamefull"); // ИСпользуем функцию move_uploaded_file(Путь файла,куда отправить)
    $query = $connect->prepare("INSERT INTO `articles`(`title`,`date`,`id_cat`,`id_type`,`path_img`,`name_img`) VALUES (?,?,?,?,?,?)");
    $query->execute(array($title, $date, $add_result, $addTypes_result, $filePath, $filenamefull));
};
$article = $connect->query("SELECT * FROM `articles` WHERE `title` = '$title'");
$result = $article->fetchAll();
foreach ($result as $value) {
    $id = $value['id'];
    if ($_POST['chapter1_title'] !== '') {
        $title1 = $_POST['chapter1_title'];
        $text1 = $_POST['chapter1_text'];
        print_r($text1);
        $chapters = $connect->prepare("INSERT INTO `chapters`(`id_articles`,`chapters`,`text`) VALUES (?,?,?)");
        $chapters->execute(array($id, $title1, $text1));
    } 
    if ($_POST['chapter2_title'] !== '') {
        $title2 = $_POST['chapter2_title'];
        $text2 = $_POST['chapter2_text'];
        $chapters = $connect->prepare("INSERT INTO `chapters`(`id_articles`,`chapters`,`text`) VALUES (?,?,?)");
        $chapters->execute(array($id, $title2, $text2));
    } 
    if ($_POST['chapter3_title'] !== '') {
        $title3 = $_POST['chapter3_title'];
        $text3 = $_POST['chapter3_text'];
        $chapters = $connect->prepare("INSERT INTO `chapters`(`id_articles`,`chapters`,`text`) VALUES (?,?,?)");
        $chapters->execute(array($id, $title3, $text3));
    } 
    if ($_POST['chapter4_title'] !== '') {
        $title4 = $_POST['chapter4_title'];
        $text4 = $_POST['chapter4_text'];
        $chapters = $connect->prepare("INSERT INTO `chapters`(`id_articles`,`chapters`,`text`) VALUES (?,?,?)");
        $chapters->execute(array($id, $title4, $text4));
    } 
    if ($_POST['chapter5_title'] !== '') {
        $title5 = $_POST['chapter5_title'];
        $text5 = $_POST['chapter5_text'];
        $chapters = $connect->prepare("INSERT INTO `chapters`(`id_articles`,`chapters`,`text`) VALUES (?,?,?)");
        $chapters->execute(array($id, $title5, $text5));
    } 
    if ($_POST['chapter6_title'] !== '') {
        $title6 = $_POST['chapter6_title'];
        $text6 = $_POST['chapter6_text'];
        $chapters = $connect->prepare("INSERT INTO `chapters`(`id_articles`,`chapters`,`text`) VALUES (?,?,?)");
        $chapters->execute(array($id, $title6, $text6));
    }
}
