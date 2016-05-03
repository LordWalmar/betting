<?php
$title = "Ошибка 403";
include("_header.php"); ?>

<section class="l-content l-section__beige">
    <div class="l-restrictor l-restrictor__white l-restrictor__error">
		<h1 class="error-title">Ошибка &mdash; недостаточно прав</h1>
		<ul class="error-list">
			<li class="error-col">
				<div class="error-code">403</div>
			<li class="error-col">
				<p class="error-tip">
					Извините, у вас нет прав доступа для просмотра этой страницы. Вы можете:
					<a href="signin.php" class="stroytorgi_link error-tip_link">Войти</a>
					<a href="registration.php" class="stroytorgi_link error-tip_link">Зарегистрироваться</a>
				</p>

				<a href="home.php" class="error-homelink btn-step">Перейти на главную</a>
		</ul>
    </div>
</section>

<?php include("_footer.php"); ?>