<?php
$title = "Торги";
include("_header.php"); ?>
<script type="text/javascript" src="static/js/sugar-1.4.1-custom.min.js"></script>
<script type="text/javascript" src="static/js/category.retrieve.js"></script>
<script type="text/javascript" src="static/js/trade.list.js"></script>
	<section class="l-section l-section__beige auction-section l-section__filter">
		<div class="l-restrictor l-restrictor__white">
			<div class="filter">
				<form method="get" action="#" id="filter_form">
					<p class="filter_title"><label for="filter_query">Введите наименование товара</label></p>
					<div class="filter-companies_calendar">
						<p class="filter-calendar_title">Дата</p><!--
					--><ul class="filter-calendar-table">
							<li class="filter-calendar-table_item">
								<p class="filter-calendar-table_text">с:</p>
								<div class="filter-calendar-cell">
									<label>
										<span class="filter-calendar-cell_icon"></span>
										<input class="filter-calendar-cell_date" type="text" placeholder="22.08.2013" name="filter_date_from" readonly="readonly">
									</label>
								</div>
							<li class="filter-calendar-table_item">
								<p class="filter-calendar-table_text">по:</p>
								<div class="filter-calendar-cell">
									<label>
										<span class="filter-calendar-cell_icon"></span>
										<input class="filter-calendar-cell_date" type="text" placeholder="дд.мм.гггг" name="filter_date_to" readonly="readonly">
									</label>
								</div>
						</ul>
					</div><!--
				--><div class="filter-search">
						<input id ="filter_query" class="filter-search_input" name="filter_query"><!--
						--><button class="filter-search_button filter-search_button__red" type="submit">Найти</button>
					</div><!--
					--><div class="filter-group__wrapper">
						<div class="filter-category">
						<select class="input-select" name="category">
							<option value="0" selected>Специализация</option>
		                    <option value="1">ЖЗБ</option>
		                    <option value="2">Металлокострукция</option>
						</select>
						</div><!--
					--> <div class="filter-category filter-category__additional filter-category__disabled">
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
	<section class="l-section auction-section l-section__beige" id="not_found_info" style="display:none">
		<div class="l-restrictor l-restrictor__white">
			<div class="filter-noresult">
				<div class="filter-noresult_title">К сожалению, по вашему запросу ничего не найдено</div>
				<div class="filter-noresult_text">
					<p>Не смотря на то, что в сервисе зарегистрировано <span class="number__bold">139</span> заказчиков и <span class="number__bold">389</span> подрядчиков, ежедневно через сервис проводится 30 сделок, в среднем на 10 млн руб. каждая, по выбранным фильтрам лотов не найдено. Чтобы не пропустить интересные лоты, <a href="registration.php" class="link_signin">присоединяйтесь</a>.</p>
				</div>
			</div>
			<div class="feedback-participate">
				<a class="feedback-participate_item feedback-participate_item__presentation new_presentation" data-fancybox-type="ajax" href="stroytorgi/presentation.html">
					<span class="feedback-participate_title feedback-participate_title__presentation">Заказать презентацию</span>
					<span class="feedback-participate_text feedback-participate_text__presentation">На&nbsp;презентации вы&nbsp;сможете задать вопросы по&nbsp;подключению, использованию, преимуществам сервиса.</span>	
				</a><!--			
				--><a class="feedback-participate_item feedback-participate_item__seminar" data-fancybox-type="ajax" id="new_seminar"  href="stroytorgi/seminar.html">
					<span class="feedback-participate_title feedback-participate_title__seminar">Зaписаться на&nbsp;семинар</span>
					<span class="feedback-participate_text feedback-participate_text__seminar">Семинар поможет вашим сотрудникам быстро разобраться в&nbsp;системе. Семинар бесплатный.</span>	
				</a><!--			
				--><a class="feedback-participate_item feedback-participate_item__question" data-fancybox-type="ajax" id="new_question"  href="stroytorgi/question.html">
					<span class="feedback-participate_title feedback-participate_title__question">Зaдать вопрос</span>
					<span class="feedback-participate_text feedback-participate_text__question">Обратитесь в&nbsp;нашу службу технической поддержки, если вы&nbsp;столкнулись со&nbsp;сложностями при использовании сервиса.</span>
				</a>
			</div>
		</div>
	</section>
	<section class="l-section l-section__beige auction-section" id="table_auction">
		<div class="l-restrictor l-restrictor__white">
			<ul class="table-auction">
				<li class="table-auction_row table-auction_row__headers">
					<div class="table-auction_group table-auction_group__id">ID</div><!--
					--><div class="table-auction_group table-auction_group__name">Категория лота</div><!--
				 	--><div class="table-auction_group table-auction_group__organizer">Организатор</div><!--
				 	--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">Стартовая цена</div><!--
				 	--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">Экономия</div><!--
				 	--><div class="table-auction_group table-auction_group__protocol">Подписание протокола</div>
				<li class="table-auction_row" data-href="lot.php">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">50105</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Покупка:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a href="catalog.php" rel="tag" class="category">Нерудные материалы</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Водоснабжение и водоотведение</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">222 400 руб.</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell table-auction_cell__process">&mdash;</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell table-auction_cell__process"><div class="status-process">Идут торги</div></div>
					</div>
				<li class="table-auction_row" data-href="lot.php">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">50105</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Покупка:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a href="catalog.php" rel="tag" class="category">ЖБИ</a></li>
								<li class="table-category_item"><a href="catalog.php" rel="tag" class="category">Бетон, раствор</a></li>
								<li class="table-category_item"><a href="catalog.php" rel="tag" class="category">Полимеры</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Водоснабжение и водоотведение</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">222 400 руб.</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell table-auction_cell__process">&mdash;</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell table-auction_cell__process"><div class="status-process">Идут торги</div></div>
					</div>
				<li class="table-auction_row" data-href="lot.php">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">50105</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Продажа:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a href="catalog.php" rel="tag" class="category">Металлопродукция</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Водоснабжение и водоотведение</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">222 400 руб.</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell">23,58%</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell">18 мая</div>
					</div>
				<li class="table-auction_row" data-href="lot.php">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">50105</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Покупка:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a href="catalog.php" rel="tag" class="category">ЖБИ</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Водоснабжение и водоотведение</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">222 400 руб.</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell">23,58%</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell">18 мая</div>
					</div>
				<li class="table-auction_row" data-href="lot.php">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">50105</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Покупка:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a href="catalog.php" rel="tag" class="category">ЖБИ</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Водоснабжение и водоотведение</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">222 400 руб.</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell">23,58%</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell">18 мая</div>
					</div>
				<li class="table-auction_row" data-href="lot.php">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">50105</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Покупка:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a href="catalog.php" rel="tag" class="category">ЖБИ</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Водоснабжение и водоотведение</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">222 400 руб.</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell">23,58%</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell">18 мая</div>
					</div>
				<li class="table-auction_row" data-href="lot.php">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">50105</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Покупка:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a href="catalog.php" rel="tag" class="category">ЖБИ</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Нефтепродукты</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">135 420 руб.</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell">1,58%</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell">02 декабря</div>
					</div>
				<li class="table-auction_row" data-href="lot.php">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">50105</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Продажа:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a href="catalog.php" rel="tag" class="category">Бензин</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Водоснабжение и водоотведение</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">222 400 руб.</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell">23,58%</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell">18 мая</div>
					</div>
				<li class="table-auction_row" data-href="lot.php">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">50105</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Покупка:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a href="catalog.php" rel="tag" class="category">ЖБИ</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Водоснабжение и водоотведение</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">222 400 руб.</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell">23,58%</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell">18 мая</div>
					</div>
				<li class="table-auction_row" data-href="lot.php">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">50105</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Покупка:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a href="catalog.php" rel="tag" class="category">ЖБИ</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Водоснабжение и водоотведение</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">222 400 руб.</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell">23,58%</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell">18 мая</div>
					</div>
			</ul>	
		</div>
	</section>
<script type="text/template" id="lot-row">
<li class="table-auction_row" data-href="#">
	<div class="table-auction_group table-auction_group__id">
		<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
		--><div class="table-auction_cell table-auction_cell__id table-auction_cell-value"></div>
	</div><!--
	--><div class="table-auction_group table-auction_group__name">
		<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
	--><div class="table-auction_cell">
			<p class="table-auction_action"></p><!--
		--><ul class="table-category">
				<li class="table-category_item"><a href="#" rel="tag" class="category"></a></li>
			</ul>
		</div>
	</div><!--
--><div class="table-auction_group table-auction_group__organizer">
		<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
	--><div class="table-auction_cell table-auction_cell-organizer"></div>
	</div><!--
	--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
		<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
	--><div class="table-auction_cell table-auction_cell-price"></div>
	</div><!--
	--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
		<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
	--><div class="table-auction_cell table-auction_cell-economy"></div>
	</div><!--
--><div class="table-auction_group table-auction_group__protocol">
		<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
	--><div class="table-auction_cell table-auction_cell-sign_date"></div>
	</div>
</li>
</script>
<?php include("_footer.php"); ?>