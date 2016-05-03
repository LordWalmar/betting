<?php
$title = "Клиенты";
include("_header.php"); ?>
<script type="text/javascript" src="static/js/category.retrieve.js"></script>
	<section class="l-section l-section__beige clients-filter clients-section">
		<div class="l-restrictor l-restrictor__white">
			<div class="filter">
				<form method="get" action="#" id="filter_form">
					<p class="filter_title"><label for="filter_search">Введите название компании или ИНН</label></p>
					<div class="filter-search">
						<input id="filter_search" class="filter-search_input" name="filter_search" value="" /><!--
						--><button class="filter-search_button filter-search_button__red">Найти</button>
					</div><!--
					--><div class="filter-category">
						<select class="input-select" name="category">
							<option value="0" selected>Специализация</option>
		                    <option value="1">ЖЗБ</option>
		                    <option value="2">Металлокострукция</option>
						</select>
					</div><!--
					--><div class="filter-category filter-category__hidden">
						<select class="input-select" name="filter_category">
							<option value="0" selected>Список значений</option>
						</select>
					</div>
					<ul class="filter-companies switch">
						<li class="switch_item switch_item__active"><label class="switch_element">Все <span class="filter-companies_link__hidden">компании</span><input type="radio" value="" name="filter_type" checked></label>
						<li class="switch_item"><label class="switch_element">Поставщики<input type="radio" value="sell" name="filter_type"></label>
						<li class="switch_item"><label class="switch_element">Заказчики<input type="radio" value="buy" name="filter_type"></label>
					</ul><!--
				--><div class="filter-letters">
						<ul class="filter-letters_list"> 	
							<li class="filter-letters_item"><label>1<input type="radio" value="1" name="filter_letter"></label>
							<li class="filter-letters_item"><label>A<input type="radio" value="A" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Б<input type="radio" value="Б" name="filter_letter"></label>
							<li class="filter-letters_item"><label>В<input type="radio" value="В" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Г<input type="radio" value="Г" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Д<input type="radio" value="Д" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Е<input type="radio" value="Е" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Ё<input type="radio" value="Ё" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Ж<input type="radio" value="Ж" name="filter_letter"></label>
							<li class="filter-letters_item"><label>З<input type="radio" value="З" name="filter_letter"></label>
							<li class="filter-letters_item"><label>И<input type="radio" value="И" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Й<input type="radio" value="Й" name="filter_letter"></label>
							<li class="filter-letters_item"><label>К<input type="radio" value="К" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Л<input type="radio" value="Л" name="filter_letter"></label>
							<li class="filter-letters_item"><label>М<input type="radio" value="М" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Н<input type="radio" value="Н" name="filter_letter"></label>
							<li class="filter-letters_item"><label>О<input type="radio" value="О" name="filter_letter"></label>
							<li class="filter-letters_item"><label>П<input type="radio" value="П" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Р<input type="radio" value="Р" name="filter_letter"></label>
							<li class="filter-letters_item"><label>С<input type="radio" value="С" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Т<input type="radio" value="Т" name="filter_letter"></label>
							<li class="filter-letters_item"><label>У<input type="radio" value="У" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Ф<input type="radio" value="Ф" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Х<input type="radio" value="Х" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Ц<input type="radio" value="Ц" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Ч<input type="radio" value="Ч" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Ш<input type="radio" value="Ш" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Э<input type="radio" value="Э" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Ю<input type="radio" value="Ю" name="filter_letter"></label>
							<li class="filter-letters_item"><label>Я<input type="radio" value="Я" name="filter_letter"></label>
						</ul><!--	
						--><div class="filter-letters_reset">
								<a href="#">Сбросить</a>
							</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<section class="l-section l-section__beige clients-section">
		<div class="l-restrictor l-restrictor__white">
			<ul class="clients">
				<li class="clients_item">
						<h2 class="clients_title" id="1">1</h2>
						<ul class="clients-kind">
							<li class="clients-kind_item">
								<ul class="clients-list">
									<li class="clients-list_item"><a href="company.php" title="10K">10K</a>
								</ul>
						</ul>
				<li class="clients_item">
						<h2 class="clients_title" id ="2">2</h2>
						<ul class="clients-kind">
							<li class="clients-kind_item">
								<ul class="clients-list">
									<li class="clients-list_item"><a href="company.php" title="201 УНР">201 УНР</a>
								</ul>
						</ul>
				<li class="clients_item">
						<h2 class="clients_title" id="A">A</h2>
						<ul class="clients-kind">
							<li class="clients-kind_item">
								<ul class="clients-list">
									<li class="clients-list_item"><a href="company.php" title="Client name">А ГРУПП</a>
									<li class="clients-list_item"><a href="company.php" title="Client name">АБС ЦДС</a>
									<li class="clients-list_item"><a href="company.php" title="Client name">АверТранс</a>
									<li class="clients-list_item"><a href="company.php" title="Client name">АВИ-строй</a>
								</ul>
							<li class="clients-kind_item">
								<ul class="clients-list">
									<li class="clients-list_item"><a href="company.php" title="Client name">Алнстрой-тротуар</a>
									<li class="clients-list_item"><a href="company.php"title="Client name">Алтимбилдинг</a>
									<li class="clients-list_item"><a href="company.php"title="Client name">Альтернатива</a>
									<li class="clients-list_item"><a href="company.php"title="Client name">Альтернативные Системы</a>
								</ul>
							<li class="clients-kind_item">
								<ul class="clients-list">
									<li class="clients-list_item"><a href="company.php"title="Client name">АРСЕНАЛ</a>
									<li class="clients-list_item"><a href="company.php"title="Client name">АРТ-СТРОЙ</a>
									<li class="clients-list_item"><a href="company.php"title="Client name">АртиСтрой</a>
									<li class="clients-list_item"><a href="company.php"title="Client name">АртМеталл</a>
								</ul>
						</ul>
		</div>
	</section>
<?php include("_footer.php"); ?>