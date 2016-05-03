<?php
$title = "Ошибка 404";
include("_header.php"); ?>

<section class="l-content l-section__beige">
    <div class="l-restrictor l-restrictor__white l-restrictor__error">
		<h1 class="error-title">Ошибка &mdash; страница не&nbsp;найдена</h1>
		<ul class="error-list">
			<li class="error-col">
				<div class="error-code">404</div>
			<li class="error-col">
				<p class="error-feedback">
					Если вы уверены, что это ошибка, пожалуйста, сообщите нам:
					<a href="mailto:info@stroytorgi.ru" class="stroytorgi_link">info@stroytorgi.ru</a>
				</p>

				<a href="home.php" class="error-homelink btn-step">Перейти на главную</a>
		</ul>
    </div>
</section>

<?php include("_footer.php"); ?>