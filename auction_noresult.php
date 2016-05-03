<?php
$title = "Ничего не найдено";
include("_header.php"); ?>
	<section class="l-section l-section__beige auction-section l-section__filter">
		<div class="l-restrictor l-restrictor__white">
			<div class="filter">
				<form method="get" action="#" id="filter_form">
					<p class="filter_title"><label for="filter_query">Введите наименование товара</label></p>
					<div class="filter-search">
						<input id ="filter_query" class="filter-search_input" name="filter_query"><!--
						--><button class="filter-search_button filter-search_button__red" type="submit">Найти</button>
					</div>
					<div class="filter-companies_calendar">
						<p class="filter-calendar_title">Дата</p><!--
					--><ul class="filter-calendar-table">
							<li class="filter-calendar-table_item">
								<p class="filter-calendar-table_text">с:</p>
								<div class="filter-calendar-cell">
									<label>
										<span class="filter-calendar-cell_icon"></span>
										<input class="filter-calendar-cell_date" type="text" placeholder="22.08.2013" name="filter_date_from">
									</label>
								</div>
							<li class="filter-calendar-table_item">
								<p class="filter-calendar-table_text">по:</p>
								<div class="filter-calendar-cell">
									<label>
										<span class="filter-calendar-cell_icon"></span>
										<input class="filter-calendar-cell_date" type="text" placeholder="дд.мм.гггг" name="filter_date_to">
									</label>
								</div>
						</ul>
					</div><!--
					--><div class="filter-group__wrapper">
						<div class="filter-category">
						<select class="input-select" name="category">
							<option value="0" selected>Специализация</option>
		                    <option value="1">ЖЗБ</option>
		                    <option value="2">Металлокострукция</option>
						</select>
						</div><!--
					--> <div class="filter-category filter-category__hidden">
						<select class="input-select" name="filter_category">
							<option value="0" selected>Список значений</option>
		                    <option value="1">Первое</option>
		                    <option value="2">Второе</option>
						</select>
						</div>
					</div>
					<ul class="filter-companies switch">
						<li class="switch_item switch_item__active"><label class="switch_element">Все <span class="filter-companies_link__hidden">лоты</span><input type="radio" value="all" name="filter_type" checked></label>
						<li class="switch_item"><label class="switch_element">Покупка<input type="radio" value="buy" name="filter_type"></label>
						<li class="switch_item"><label class="switch_element">Продажа<input type="radio" value="sell" name="filter_type"></label>
					</ul><!--
					--><div class="filter-companies_range">
						<p class="filter-range_title">Цена:</p><!--
						--><div class="filter-range_slider">
							<input class="input-range" type="wbtrange" name="filter_sum_min" data-name="minSum" value class="input-text" data-wbt-min="1" data-wbt-max="8999999488" data-wbt-step="0.8" data-wbt-units=" руб.">
	    					<input class="input-range" type="wbtrange" name="filter_sum_max" data-name="maxSum" value class="input-text" data-wbt-min="1" data-wbt-max="8999999488" data-wbt-step="0.8" data-wbt-units=" руб.">
						</div>
					</div><!--
					-->
				</form>
			</div>
		</div>
	</section>
	<section class="l-section l-section__beige auction-section">
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