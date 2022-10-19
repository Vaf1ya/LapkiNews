<link rel="stylesheet" href="../css/footer.css">
<footer class="indent between">
    <div class="cat">
        <h2>Категории</h2>
        <?php
        $query = $connect->query("SELECT * FROM `categories`");
        $result = $query->fetchAll();
        foreach ($result as $value) {
            echo '
                <a href="../pages/article.php?id=' . $value['id'] . '">' . $value['title'] . '</a>
                ';
        }
        ?>
    </div>
    <div class="contact_footer">
        <h2>Контакты</h2>
        <div class="contact_logo flex between">
            <img src="../img/vk.png" alt="">
            <img src="../img/ok.png" alt="">
            <img src="../img/wat.png" alt="">
            <img src="../img/mail.png" alt="">
        </div>
    </div>

    <div class="contests_footer">
        <h2>Участвуй в конкурсах и получай призы</h2>
        <a href="../pages/contests.php">Подробнее</a>
    </div>
</footer>
<script src="../script/style.js"></script>
<script src="../script/auth.js"></script>
</body>

</html>