<?php
$title = "Тема";
include("_header.php"); ?>


	<section class="l-section l-section__beige helpdesk-section">
		<div class="l-restrictor l-restrictor__helpdesk">
			<div class="filter">
				<form method="get" action="#">
					<p class="filter_title"><label for="search">Введите название компании или ИНН</label></p>
					<div class="filter-search">
						<input class="filter-search_input" id="search" name="search"><!--
						--><button type="submit" class="filter-search_button filter-search_button__grey">Найти</button>
					</div>
					<ul class="filter-companies switch">
						<li class="switch_item switch_item__active"><label class="switch_element">Все <span class="filter-companies_link__hidden">темы</span><input type="radio" value="all" name="switch_type" checked></label>
						<li class="switch_item"><label class="switch_element">Предложения<input type="radio" value="offer" name="switch_type"></label>
						<li class="switch_item"><label class="switch_element">Вопросы<input type="radio" value="question" name="switch_type"></label>
					</ul>
					<a data-fancybox-type="ajax" id="new_request" class="btn-submit btn-submit__red" href="request.html">Новое обращение</a>
					<p class="helpdesk_tooltip">Опишите проблему или задайте вопрос, мы&nbsp;поможем вам!</p>
				</form>
			</div>
		</div>
	</section>
	
	<section class="l-section l-section__beige">
		<div class="l-restrictor l-restrictor__white helpdesk-inside">
			<div class="helpdesk-breadcrumbs">
				<a href="themes_helpdesk.php" class="helpdesk-breadcrumbs_return btn-step">Все категории</a>
				<span class="helpdesk-breadcrumbs_step">Начало работы в системе. Аккредитация</span>
			</div>
			
			<aside class="helpdesk-themes">
					<h3 class="helpdesk-themes_title">Темы:</h3>
					<ul>
						<li class="helpdesk-themes_item">
							<span class="helpdesk-themes_tag"><a href="theme_inside_helpdesk.php">Начало работы в системе. Аккредитация</a></span>
						<li class="helpdesk-themes_item">
							<span class="helpdesk-themes_tag"><a href="#">Порядок формирования и размещения торгов</a></span>
						<li class="helpdesk-themes_item">
							<span class="helpdesk-themes_tag"><a href="#">Порядок участия в торгах</a></span>
						<li class="helpdesk-themes_item">
							<span class="helpdesk-themes_tag"><a href="#">Работа в личном кабинете</a></span>
						<li class="helpdesk-themes_item">
							<span class="helpdesk-themes_tag"><a href="#">Использование ЭП</a></span>
						<li class="helpdesk-themes_item">
							<span class="helpdesk-themes_tag"><a href="#">Работа с Каталогом товаров, работ, услуг</a></span>
						<li class="helpdesk-themes_item">
							<span class="helpdesk-themes_tag"><a href="#">Другое</a></span>
					</ul>
			</aside>

			<div class="help-answer_wrapper">
				<div class="help-answer_title">При входе по ЭП получаю ответ "На носителе не найден сертификат"</div>
				<ul class="help-answer_list">
					<li class="help-answer_item">
						<div class="help-answer_username"><strong>User01</strong></div>
						<p class="help-answer_text">При входе по ЭП получаю ответ "На носителе не найден сертификат". На носителе нет действующих сертификатов. Что делать?</p>
						<div class="help-answer_datetime"><strong>06 июля 2014, 17:26</strong></div>

					<li class="help-answer_item">
						<div class="help-answer_username"><strong>StroySupport</strong></div>
						<p class="help-answer_text">Каталог продукции &laquo;АРМГАЗИНВЕСТ&raquo; включает в&nbsp;себя десятки наименований качественной трубопроводной арматуры и&nbsp;нефтегазового оборудования от&nbsp;ведущих отечественных и&nbsp;зарубежных производителей. На&nbsp;сегодняшний день это возможно один из&nbsp;самых полных перечней оборудования, доступных для заказчика в&nbsp;одной компании. Трубопроводная арматура, обладающая самыми разными техническими и&nbsp;эксплуатационными характеристиками, от&nbsp;нескольких дюймов до&nbsp;нескольких метров в&nbsp;диаметре представлена такими изделиями как:</p>
						<ul class="help-answer_enum">
							<li class="help-answer_enum-item">задвижки стальные и&nbsp;чугунные с&nbsp;ручным управлением и&nbsp;под электропривод;
							<li class="help-answer_enum-item">клапаны запорные (вентили) обратные, регулирующие, предохранительные стальные, чугунные, бронзовые;
							<li class="help-answer_enum-item">поворотные затворы дисковые;
							<li class="help-answer_enum-item">краны шаровые и&nbsp;пробковые из&nbsp;различных материалов;
							<li class="help-answer_enum-item">запорные устройства;
							<li class="help-answer_enum-item">электроприводы для трубопроводной арматуры и&nbsp;многое другое;
							<li class="help-answer_enum-item">регуляторы высокого, среднего и&nbsp;низкого давления;
							<li class="help-answer_enum-item">нефтегазовое оборудование в асортименте;
						</ul>
						<div class="help-answer_datetime"><strong>06 июля 2014, 17:26</strong></div>

				</ul>
			</div>
		</div>
	</section>

	



<?php include("_footer.php"); ?>