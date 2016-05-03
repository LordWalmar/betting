<?php
$title = "Pages";
include("_header.php"); ?>

<style>
.status {margin:1em;}
.status_item__done,
.status_item__done a {color:#3a3;}
.status_item__issues,
.status_item__issues a {color:#aa3;}
.status_item__work,
.status_item__work a {color:#aaa;}
.status_production {display:none;}
.status_production:before {content:"(production)"}
/*.status_item:hover > .status_production {display:inline-block;}*/
.index {margin-left:-2%;}
.index_item {display: inline-block;vertical-align:top;width:31.3333%;margin-left:2%;margin-bottom:20px;}
.l-content h1 {margin: 20px 0;}
</style>

<section class="l-content">
    <div class="l-restrictor">
        <h1>Страницы</h1>
        <ul class="index">
            <li class="index_item">
                <h2>Главная страница</h2>
                <ol class="status">
                    <li class="status_item status_item__done"><a href="home.php">Главная</a> <a href="#" class="status_production"></a>
                </ol>
                <h2>Торги</h2>
                <ol class="status">
                    <li class="status_item status_item__done"><a href="auction.php">Торги</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="auction_noresult.php">Торги (ничего не найдено)</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="lot.php">Лот</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="company.php">Компания</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="catalog.php">Каталог</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="catalog_reject.php">Каталог (без авторизации)</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="catalog_default.php">Каталог (условный)</a> <a href="#" class="status_production"></a>
                </ol>
                <h2>Основные</h2>
                <ol class="status">
                    <li class="status_item status_item__done"><a href="about_service.php">О сервисе</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="clients.php">Клиенты</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="clients_noresult.php">Клиенты (ничего не найдено)</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="statistics.php">Статистика</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="about_company.php">О компании</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="reviews.php">Отзывы</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="contact.php">Контакты</a> <a href="#" class="status_production"></a>
                </ol>
            <li class="index_item">
                <h2>Блог</h2>
                <ol class="status">
                    <li class="status_item status_item__done"><a href="blog.php">Блог</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="blog_tag.php">Тэг</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="blog_post.php">Пост</a> <a href="#" class="status_production"></a>
                </ol>
                <h2>Поддержка</h2>
                <ol class="status">

                    <li class="status_item status_item__done"><a href="helpdesk.php">Все категории</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="themes_helpdesk.php">Категория</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="theme_inside_helpdesk.php">Обращение в категории </a> <a href="#" class="status_production"></a>

                </ol>
                <h2>Формы</h2>
                <ol class="status">
                    <li class="status_item status_item__done"><a href="sign-in.php">Войти / ЭП / Восстановление пароля</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="registration.php">Регистрация</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="presentation.php">Заказать презентацию</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="seminar.php">Записаться на семинар</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__issues"><a href="question.php">Задать вопрос</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="thnx.php">Спасибо за вопрос</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="request_helpdesk.php">Обращение в поддержку</a> <a href="#" class="status_production"></a>
                </ol>
            <li class="index_item">
                <h2>Ошибки</h2>
                <ol class="status">
                    <li class="status_item status_item__done"><a href="error_404.php">Ошибка 404</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="error_403.php">Ошибка 403</a> <a href="#" class="status_production"></a>
                    <li class="status_item status_item__done"><a href="error_500.php">Ошибка 500</a> <a href="#" class="status_production"></a>
                </ol>
                <h2>Тестовые страницы</h2>
                <ol class="status">
                    <li class="status_item status_item__work"><a href="text_styles.php">Типовые текстовые стили</a> <a href="#" class="status_production"></a>
                </ol>
        </ul>
    </div>
</section>

<?php include("_footer.php"); ?>