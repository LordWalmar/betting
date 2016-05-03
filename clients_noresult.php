<?php
$title = "Ничего не найдено";
include("_header.php"); ?>
	<section class="l-section l-section__beige clients-filter clients-section">
		<div class="l-restrictor l-restrictor__white">
			<div class="filter">
				<form method="get" action="#">
					<p class="filter_title">Введите название компании или ИНН</p>
					<div class="filter-search">
						<input class="filter-search_input" name="search"><!--
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
						<select class="input-select" name="value">
							<option value="0" selected>Список значений</option>
		                    <option value="1">Первое</option>
		                    <option value="2">Второе</option>
						</select>
					</div>
					<ul class="filter-companies switch">
						<li class="switch_item switch_item__active"><label class="switch_element">Все <span class="filter-companies_link__hidden">компании</span><input type="radio" value="all" name="switch_type" checked></label>
						<li class="switch_item"><label class="switch_element">Поставщики<input type="radio" value="provider" name="switch_type"></label>
						<li class="switch_item"><label class="switch_element">Заказчики<input type="radio" value="customer" name="switch_type"></label>
					</ul><!--
				--><div class="filter-letters">
						<ul class="filter-letters_list"> 	
							<li class="filter-letters_item"><label>1<input type="radio" value="1" name="letter-choise"></label>
							<li class="filter-letters_item"><label>A<input type="radio" value="A" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Б<input type="radio" value="Б" name="letter-choise"></label>
							<li class="filter-letters_item"><label>В<input type="radio" value="В" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Г<input type="radio" value="Г" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Д<input type="radio" value="Д" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Е<input type="radio" value="Е" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Ё<input type="radio" value="Ё" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Ж<input type="radio" value="Ж" name="letter-choise"></label>
							<li class="filter-letters_item"><label>З<input type="radio" value="З" name="letter-choise"></label>
							<li class="filter-letters_item"><label>И<input type="radio" value="И" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Й<input type="radio" value="Й" name="letter-choise"></label>
							<li class="filter-letters_item"><label>К<input type="radio" value="К" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Л<input type="radio" value="Л" name="letter-choise"></label>
							<li class="filter-letters_item"><label>М<input type="radio" value="М" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Н<input type="radio" value="Н" name="letter-choise"></label>
							<li class="filter-letters_item"><label>О<input type="radio" value="О" name="letter-choise"></label>
							<li class="filter-letters_item"><label>П<input type="radio" value="П" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Р<input type="radio" value="Р" name="letter-choise"></label>
							<li class="filter-letters_item"><label>С<input type="radio" value="С" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Т<input type="radio" value="Т" name="letter-choise"></label>
							<li class="filter-letters_item"><label>У<input type="radio" value="У" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Ф<input type="radio" value="Ф" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Х<input type="radio" value="Х" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Ц<input type="radio" value="Ц" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Ч<input type="radio" value="Ч" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Ш<input type="radio" value="Ш" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Э<input type="radio" value="Э" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Ю<input type="radio" value="Ю" name="letter-choise"></label>
							<li class="filter-letters_item"><label>Я<input type="radio" value="Я" name="letter-choise"></label>
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
			<div class="filter-noresult">
				<div class="filter-noresult_title">К сожалению, по вашему запросу ничего не найдено</div>
				<div class="filter-noresult_text">
					<p>Не смотря на то, что в сервисе зарегистрировано <span class="number__bold">139</span> заказчиков и <span class="number__bold">389</span> подрядчиков, ежедневно через сервис проводится 30 сделок, в среднем на 10 млн руб каждая, по выбранным фильтрам лотов не найдено. Чтобы не пропустить интересные лоты, <a class="stroytorgi_link" href="registration.php">присоединяйтесь</a>.</p>	
				</div>
			</div>
			<div class="feedback-participate">
				<a class="feedback-participate_item feedback-participate_item__presentation" href="presentation.php">
					<span class="feedback-participate_title feedback-participate_title__presentation">Заказать презентацию</span>
					<span class="feedback-participate_text feedback-participate_text__presentation">На&nbsp;презентации вы&nbsp;сможете задать вопросы по&nbsp;подключению, использованию, преимуществам сервиса.</span>	
				</a><!--			
				--><a class="feedback-participate_item feedback-participate_item__seminar"  href="seminar.php">
					<span class="feedback-participate_title feedback-participate_title__seminar">Зaписаться на&nbsp;семинар</span>
					<span class="feedback-participate_text feedback-participate_text__seminar">Семинар поможет вашим сотрудникам быстро разобраться в&nbsp;системе. Семинар бесплатный.</span>	
				</a><!--			
				--><a class="feedback-participate_item feedback-participate_item__question"  href="question.php">
					<span class="feedback-participate_title feedback-participate_title__question">Зaдать вопрос</span>
					<span class="feedback-participate_text feedback-participate_text__question">Обратитесь в&nbsp;нашу службу технической поддержки, если вы&nbsp;столкнулись со&nbsp;сложностями при использовании сервиса.</span>
				</a>
			</div>
		</div>
	</section>
<?php include("_footer.php"); ?>