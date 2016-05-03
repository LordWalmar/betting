<?php
$title = "Поддержка";
include("_header.php"); ?>
	<section class="l-section l-section__beige helpdesk-section">
		<div class="l-restrictor">
			<div class="filter">
				<form method="get" action="#">
					<p class="filter_title"><label for="search">Введите название компании или ИНН</label></p>
					<div class="filter-search">
						<input class="filter-search_input" id="search"  name="search"><!--
						--><button type="submit" class="filter-search_button filter-search_button__grey">Найти</button>
					</div>
					<ul class="filter-companies switch">
						<li class="switch_item switch_item__active"><a class="switch_element">Все <span class="filter-companies_link__hidden">темы</span></label>
						<li class="switch_item"><a class="switch_element">Предложения</a>
						<li class="switch_item"><a class="switch_element">Вопросы</a>
					</ul>
					<a data-fancybox-type="ajax" id="new_request" class="btn-submit btn-submit__red" href="request.html">Новое обращение</a>
					<p class="helpdesk_tooltip">Опишите проблему или задайте вопрос, мы поможем вам!</p>
				</form>
			</div>
		</div>
	</section>

	<section class="l-section l-section__beige">
		<div class="l-restrictor l-restrictor__white">
			<ul class="helpdesk-categories">
				<li class="helpdesk-categories_item">
					<h2 class="helpdesk_title">Начало работы в системе. Аккредитация</h2>
					<ul class="helpdesk-list">
						<li class="helpdesk-list_row">
							<ul>
								<li class="helpdesk-list_item helpdesk-list_item__header">Тема
								<li class="helpdesk-list_item helpdesk-list_item__header">Дата
							</ul>
						<li class="helpdesk-list_row">
							<ul>
								<li class="helpdesk-list_item">
									<a href="theme_inside_helpdesk.php" class="helpdesk-list_question">При входе по ЭП получаю ответ "На носителе не найден сертификат". На носителе нет действующих сертификатов. Что делать?</a>
								<li class="helpdesk-list_item">
									<span class="helpdesk-list_date">8 августа 2014</span>
							</ul>
						<li class="helpdesk-list_row">
							<ul>
								<li class="helpdesk-list_item">
									<a href="theme_inside_helpdesk.php" class="helpdesk-list_question">Какой PIN требуется в разделе №5 "Сведения о лице, уполномоченном на подписание комплекта аккредитационых документов"?</a>
								<li class="helpdesk-list_item">
									<span class="helpdesk-list_date">8 августа 2014</span>
							</ul>
						<li class="helpdesk-list_row">
							<ul>
								<li class="helpdesk-list_item">
									<a href="theme_inside_helpdesk.php" class="helpdesk-list_question">Какой PIN требуется в разделе №5 "Сведения о лице, уполномоченном на подписание комплекта аккредитационых документов"?</a>
								<li class="helpdesk-list_item">
									<span class="helpdesk-list_date">8 августа 2014</span>
							</ul>
					</ul>
					<a class="show-all helpdesk_show" href="themes_helpdesk.php">Все темы</a>
				<li class="helpdesk-categories_item">
					<h2 class="helpdesk_title">Порядок формирования и размещения торгов</h2>
					<ul class="helpdesk-list">
						<li class="helpdesk-list_row">
							<ul>
								<li class="helpdesk-list_item helpdesk-list_item__header">Тема
								<li class="helpdesk-list_item helpdesk-list_item__header">Дата
							</ul>
						<li class="helpdesk-list_row">
							<ul>
								<li class="helpdesk-list_item">
									<a href="theme_inside_helpdesk.php" class="helpdesk-list_question">При входе по ЭП получаю ответ "На носителе не найден сертификат". На носителе нет действующих сертификатов. Что делать?</a>
								<li class="helpdesk-list_item">
									<span class="helpdesk-list_date">8 августа 2014</span>
							</ul>
						<li class="helpdesk-list_row">
							<ul>
								<li class="helpdesk-list_item">
									<a href="theme_inside_helpdesk.php" class="helpdesk-list_question">Какой PIN требуется в разделе №5 "Сведения о лице, уполномоченном на подписание комплекта аккредитационых документов"?</a>
								<li class="helpdesk-list_item">
									<span class="helpdesk-list_date">8 августа 2014</span>
							</ul>
						<li class="helpdesk-list_row">
							<ul>
								<li class="helpdesk-list_item">
									<a href="theme_inside_helpdesk.php" class="helpdesk-list_question">Какой PIN требуется в разделе №5 "Сведения о лице, уполномоченном на подписание комплекта аккредитационых документов"?</a>
								<li class="helpdesk-list_item">
									<span class="helpdesk-list_date">8 августа 2014</span>
							</ul>
					</ul>
					<a class="show-all helpdesk_show" href="themes_helpdesk.php">Все темы</a>
				<li class="helpdesk-categories_item">
					<h2 class="helpdesk_title">Порядок участия в торгах</h2>
					<ul class="helpdesk-list">
						<li class="helpdesk-list_row">
							<ul>
								<li class="helpdesk-list_item helpdesk-list_item__header">Тема
								<li class="helpdesk-list_item helpdesk-list_item__header">Дата
							</ul>
						<li class="helpdesk-list_row">
							<ul>
								<li class="helpdesk-list_item">
									<a href="#" class="helpdesk-list_question">При входе по ЭП получаю ответ "На носителе не найден сертификат". На носителе нет действующих сертификатов. Что делать?</a>
								<li class="helpdesk-list_item">
									<span class="helpdesk-list_date">8 августа 2014</span>
							</ul>
						<li class="helpdesk-list_row">
							<ul>
								<li class="helpdesk-list_item">
									<a href="#" class="helpdesk-list_question">Какой PIN требуется в разделе №5 "Сведения о лице, уполномоченном на подписание комплекта аккредитационых документов"?</a>
								<li class="helpdesk-list_item">
									<span class="helpdesk-list_date">8 августа 2014</span>
							</ul>
						<li class="helpdesk-list_row">
							<ul>
								<li class="helpdesk-list_item">
									<a href="#" class="helpdesk-list_question">Какой PIN требуется в разделе №5 "Сведения о лице, уполномоченном на подписание комплекта аккредитационых документов"?</a>
								<li class="helpdesk-list_item">
									<span class="helpdesk-list_date">8 августа 2014</span>
							</ul>
					</ul>
					<a class="show-all helpdesk_show" href="themes_helpdesk.php">Все темы</a>
			</ul>
		</div>
	</section>


<?php include("_footer.php"); ?>