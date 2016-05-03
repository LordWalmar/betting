<?php
$title = "Ошибка 500";
include("_header.php"); ?>

<section class="l-content l-section__beige">
    <div class="l-restrictor l-restrictor__white l-restrictor__error">
		<h1 class="error-title">Внутренняя ошибка сервера</h1>
		<ul class="error-list">
			<li class="error-col">
				<div class="error-code">500</div>
			<li class="error-col">
				<p class="error-feedback">
					Извините, на сервере произошла ошибка. Пожалуйста, попробуйте <a href="#" class="stroytorgi_link">обновить страницу.</a>
				</p>

				<a href="home.php" class="error-homelink btn-step">Перейти на главную</a>
		</ul>
    </div>
</section>

<?php include("_footer.php"); ?>