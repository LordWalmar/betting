<?php 
	$title = "Главная";
	include("_header.php");
?>
<script type="text/javascript" src="static/js/sugar-1.4.1-custom.min.js"></script>
<script type="text/javascript">
$(function() {
	d3.json("static/data/bubble-chart/bubble-chart_1.data.json", initBubbleChart);
});
</script>

	<section class="l-section home-section home-section__promo">
		<!-- <a class="newyear-fancybox" href="static/img/newyear.jpg"></a> -->
		<ul class="home-promo_slider">
		</ul>
		<div class="l-restrictor home-restrictor__promo">
			<div class="home-promo_info">
				<div class="home-promo_letters">
					<div class="home-promo_text">
						<p class="home-promo_be">То, чего не&nbsp;было&nbsp;&mdash; есть!</p>
						<p class="home-promo_warranty">Почему СТРОЙТОРГИ? Интеграция с 1С Гарантия сделки Справедливое ценообразование Аналитика Цивилизованный рынок</p>
						<p class="home-promo_title">Мы первая специализированная электронная торговая площадка для компаний строительной индустрии на всей территории России. Сумма сделки по итогам торгов совпадает с суммой, прошедшей через вашу учетную систему 1С. Торги прошли —  сделка будет Протокол итогов торгов имеет силу контракта. Платит только тот, кто победил в торгах Абонентской платы, депозитов и других комиссий нет! Мы первые, кто дает статистику реальной стоимости товаров и услуг в строительной отрасли. Сделка – это не всё! Узнайте больше…</p>
						<p class="home-promo_responsibility"></p>
						<p class="home-promo_footer">Поэтому СТРОЙТОРГИ Поэтому ДОВЕРИЕ Поэтому ГАРАНТИРУЕМ Поэтому ПРОЗРАЧНОСТЬ Поэтому ЭКСПЕРТНОСТЬ Поэтому БУДУЩЕЕ</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="l-section home-section home-section__auction">
		<div class="l-restrictor">
			<h2 class="section_title">Cостоявшиеся торги</h2>
			<div class="home-auction-search">
				<div class="home-auction-search_title">
					<a href="#" class="home-auction-search_link">Поиск торгов</a>
				</div>
				<div class="auction-section home-auction-search_filter">
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
								<select class="input-select" name="filter_category" disabled>
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
			</div>
			<ul class="table-auction">
				<li class="table-auction_row table-auction_row__headers">
					<div class="table-auction_group table-auction_group__id">ID</div><!--
					--><div class="table-auction_group table-auction_group__name">Категория лота</div><!--
				 	--><div class="table-auction_group table-auction_group__organizer">Организатор</div><!--
				 	--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">Стартовая цена</div><!--
				 	--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">Экономия</div><!--
				 	--><div class="table-auction_group table-auction_group__protocol">Подписание протокола</div>
				<li class="table-auction_row">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">50105</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Покупка:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a class="category" rel="tag">Нерудные материалы</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Водоснабжение и водоотведение</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">222 400.-</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell table-auction_cell__process">&mdash;</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell table-auction_cell__process"><div class="status-process">Идут торги</div></div>
					</div>
				<li class="table-auction_row">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">7280</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Покупка:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a class="category" rel="tag">ЖБИ</a></li>
								<li class="table-category_item"><a class="category" rel="tag">Раствор, бетон</a></li>
								<li class="table-category_item"><a class="category" rel="tag">Полимеры</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Завод специальных железобетонных труб</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">680.-</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell">9,05%</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell">15 июня
					</div></div>
				<li class="table-auction_row">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">72175</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Продажа:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a class="category" rel="tag">Металлопродукция</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Воронежстальмост</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">8 560.-</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell">13,45%</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell">28 мая</div>
					</div>
				<li class="table-auction_row table-auction_row__hidden">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">40941</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Продажа:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a class="category" rel="tag">Нефтепродукты</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Деформационные швы и опорные</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">84 000.-</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell">0,74%</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell">1 апреля</div>
					</div>
				<li class="table-auction_row table-auction_row__hidden">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">16120</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Покупка:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a class="category" rel="tag">Бетон, Раствор</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">ГрадЖилСтрой</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">470 000.-</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell">10,01%</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell">29 апреля</div>
					</div>
				<li class="table-auction_row table-auction_row__hidden">
					<div class="table-auction_group table-auction_group__id">
						<div class="table-auction_cell table-auction_cell__id table-auction_cell__header">ID</div><!--
						--><div class="table-auction_cell table-auction_cell__id">660</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__name">
						<div class="table-auction_cell table-auction_cell__header">Категория лота</div><!--
						--><div class="table-auction_cell">
							<p class="table-auction_action">Покупка:</p><!--
							--><ul class="table-category">
								<li class="table-category_item"><a class="category" rel="tag">Остальные категории</a></li>
							</ul>
						</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__organizer">
						<div class="table-auction_cell table-auction_cell__header">Организатор</div><!--
						--><div class="table-auction_cell table-auction_cell__organizer">Мечел</div>
					</div><!--

					--><div class="table-auction_group table-auction_group__price table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Стартовая цена</div><!--
					 	--><div class="table-auction_cell">380 160.-</div>
					 </div><!--
					--><div class="table-auction_group table-auction_group__economy table-auction_group__numeric">
						<div class="table-auction_cell table-auction_cell__header">Экономия</div><!--
						--><div class="table-auction_cell">2,52%</div>
					</div><!--
					
					--><div class="table-auction_group table-auction_group__protocol">
						<div class="table-auction_cell table-auction_cell__header">Подписание протокола</div><!--
						--><div class="table-auction_cell">12 мая</div>
					</div>
			</ul>
			<div class="home-show home-show__auction">
				<a href="auction.php" class="home-show_all show-all">Все торги</a>
			</div>
		</div>
	</section>

	<section class="l-section home-section home-section__events">
		<div class="l-restrictor">
			<h2 class="section_title">Cобытия</h2>
			<ul class="home-events">
				<li class="home-events_item">
						<div class="home-events_date"><strong>23</strong> июля / 2014</div>
						<h3 class="home-events_title">
							<a href="blog_post.php">Рынок щебня. Итоги конференции.</a>
						</h3>
						<p class="home-events_text">На&nbsp;конференции проводился обзор рынка добычи и&nbsp;переработки щебня в&nbsp;СПб и&nbsp;Ленинградской области. Высказали мнение о дальнейшем развитии рынка нерудных стройматериалов и развитии стройиндустрии региона в&nbsp;целом.</p>		
				<li class="home-events_item">
					<div class="home-events_date"><strong>17</strong> февраля / 2015</div>
					<h3 class="home-events_title">Первая конференция ЭТП &laquo;СтройТорги&raquo;</h3>
					<img class="home-events_conference" src="static/img/conference_1.jpg" alt="conference">
			</ul>
			<div class="home-show">
				<a href="blog.php" class="home-show_all show-all">Все события</a>
			</div>
		</div>
	</section>

	<section class="l-section home-section home-section__participate">
		<div class="l-restrictor">
			<ul class="feedback-participate">
				<li class="feedback-participate_item feedback-participate_item__presentation">
					<a class="feedback-participate_link new_presentation" id="new_presentation" data-fancybox-type="ajax" href="presentation.html">
						<h3 class="feedback-participate_title feedback-participate_title__presentation">Заказать презентацию</h3>
						<p class="feedback-participate_text feedback-participate_text__presentation">На&nbsp;презентации вы&nbsp;сможете задать вопросы по&nbsp;подключению, использованию, преимуществам сервиса.</p>	
					</a>			
				<li class="feedback-participate_item feedback-participate_item__seminar">
					<a class="feedback-participate_link" data-fancybox-type="ajax" id="new_seminar"  href="seminar.html">
						<h3 class="feedback-participate_title feedback-participate_title__seminar">Записаться на&nbsp;ближайший семинар</h3>
						<p class="feedback-participate_text feedback-participate_text__seminar">Семинары проводятся бесплатно 1 раз в неделю в офисе компании.</p>
					</a>			
				<li class="feedback-participate_item feedback-participate_item__question">
					<a class="feedback-participate_link" data-fancybox-type="ajax" id="new_question"  href="question.html">
						<h3 class="feedback-participate_title feedback-participate_title__question">Зaдать вопрос</h3>
						<p class="feedback-participate_text feedback-participate_text__question">Обратитесь в&nbsp;нашу службу технической поддержки, если вы&nbsp;столкнулись со&nbsp;сложностями при использовании сервиса.</p>
					</a>
			</ul>
		</div>
	</section>	

	<section class="l-section home-section home-section__charts">
		<div class="l-restrictor">
			<ul class="home-indicators">
				<li class="home-indicators_item home-indicators_item__dynamics chart-type_bubble">
					<h3 class="home-indicators_title">Цены сервиса: динамика</h3>
					<h3 class="error-browser_ie8">Ваш браузер не поддерживается :—( <br>Для корректного отображения данных воспользуйтесь современным браузером.</h3>
					<div class="statistics-bubbleChart-canvas_category" style="display: none"><ul class="switch"></ul></div>
					<div class="chart-tooltip_wrap">
						<div class="chart-tooltip_content">
							<p class="chart-tooltip_date"></p>
					    	<p class="chart-tooltip_name"></p>
					    	<p class="chart-tooltip_value"></p>
						</div>
					</div>
					<div class="chart-canvas chart-canvas__bubble"></div>
					<ul class="chart-legend"></ul>
				<li class="home-indicators_item home-indicators_item__statistics chart-type_donut">
					<h3 class="home-indicators_title">Статистика</h3>
					<div class="home-indicators_full"><a class="show-all" href="statistics.php">Вся статистика</a></div>
					<h3 class="error-browser_ie8">Ваш браузер не поддерживается :—( <br>Для корректного отображения данных воспользуйтесь современным браузером.</h3>
					<div class="home-indicators_wrapper">
						<div class="chart-tooltip_wrap">
							<div class="chart-tooltip_content">
						    	<p class="chart-tooltip_name"></p>
							</div>
						</div>

						<div class="chart-canvas chart-canvas__donut"></div>
						<div class="chart-legend">
							Распределение объемов сделок по&nbsp;категориям <div class="chart-legend_item__menu"><span class="chart-legend_circle chart-legend_circle__grey"></span>
								<div class="home-indicators-legend_wrap">
									<ul class="home-indicators-legend_content"></ul>
								</div>
							</span><span class="chart-legend_text"> &mdash;&nbsp;?</span>
						</div>
					</div>
			</ul>
		</div>
	</section>

	<section class="l-section home-section home-section__reviews">
		<div class="l-restrictor">
			<h2 class="section_title">Клиенты и&nbsp;пресса о&nbsp;нас</h2>
			<div class="home-reviews">
				<ul>
					<li class="home-reviews_item">
						<div class="home-reviews_client"><strong>ГК &laquo;ДиПОС&raquo; (Москва)</strong>&nbsp;&mdash; <span class="home-reviews_date"><strong>12</strong> сентября&nbsp;/ 2013</span></div>
						<h2 class="reviews_review-title">Кирилл Ребров, директор по развитию</h2>
						<p class="reviews_review-text">Из&nbsp;самых свежих событий последнего времени я&nbsp;бы назвал возобновление сотрудничества с&nbsp;московским ДСК-1, с&nbsp;которым мы&nbsp;подписали крупный контракт на&nbsp;производство широкого спектра металлопродукции: арматуры, труб и&nbsp;другого металлопроката. Общая сумма контракта&nbsp;&mdash; порядка 40&nbsp;млн рублей. Однако в&nbsp;данном случае важна даже не&nbsp;столько финансовая составляющая, сколько восстановление наших партнерских связей с&nbsp;одним из&nbsp;крупнейших домостроительных предприятий столичного региона, с&nbsp;которым мы&nbsp;не&nbsp;работали с&nbsp;90-х годов. Хочется особо отметить, что это стало возможным именно благодаря площадке &laquo;СтройТорги&raquo;, где и&nbsp;наша компания, и&nbsp;наши партнеры смогли оперативно найти обоюдовыгодные предложения.</p>
						<img class="home-reviews_logo" src="static/img/logo-mosmetrostroy.png.svg" alt="mosmetrostroy">

					<li class="home-reviews_item">
						<div class="home-reviews_client"><strong>ОАО &laquo;ЕВРАЗ Металл Инпром&raquo;</strong>&nbsp;&mdash; <span class="home-reviews_date"><strong>1</strong> января&nbsp;/ 2014</span></div>
						<h2 class="reviews_review-title">Олег Герасимов, генеральный директор компании</h2>
						<p class="reviews_review-text">В&nbsp;настоящее время компания находится на&nbsp;этапе развития и&nbsp;расширения своей деятельности, поскольку с&nbsp;момента ее&nbsp;создания прошло менее года. Поэтому буквально каждую неделю у&nbsp;нас что-то происходит впервые: идет формирование клиентской базы, подписываются новые контракты и&nbsp;определяется объем заказов на&nbsp;будущее. В&nbsp;этой связи мы&nbsp;намерены очень активно использовать инструменты электронных торгов, поскольку они обеспечивают полную ценовую прозрачность всех представленных на&nbsp;площадке предложений. Уверен, что в&nbsp;дальнейшем они станут неотъемлемой частью нашего бизнеса.</p>
						<img class="home-reviews_logo" src="static/img/logo-technoserv.png.svg" alt="technoserv">
				</ul>
				
				<h2 class="reviews_review-title__wide">ОБ&nbsp;ЭЛЕКТРОННОЙ ПЛОЩАДКЕ &laquo;СТРОЙТОРГИ&raquo;</h2>
				<ul>
					<li class="home-reviews_item home-reviews_item__first">
						<p class="home_review-split_bottom">&laquo;СтройТорги&raquo;&nbsp;&mdash; электронная площадка для строительных компаний. Проведение торгово-закупочных процедур электронным способом выгодно и&nbsp;заказчикам, и&nbsp;поставщикам. Компания &laquo;СтройТорги&raquo; помогает строительным компаниям организовывать и&nbsp;проводить электронные конкурсы и&nbsp;аукционы.</p>
						<span class="home-reviews_content">
							<p class="reviews_review-text">Благодаря использованию электронной площадки &laquo;СтройТорги&raquo; наши Клиенты экономят не&nbsp;менее&nbsp;5% от&nbsp;бюджета на&nbsp;закупку строительных материалов и&nbsp;оплату работ и&nbsp;услуг. В&nbsp;общей сложности за&nbsp;последние два года они сэкономили более 600 млн руб., причем это никак не&nbsp;отразилось на&nbsp;качестве закупаемых товаров и&nbsp;услуг.</p>
							<p class="reviews_review-text">На&nbsp;нашей электронной площадке ежедневно заключается более&nbsp;10% фактических сделок в&nbsp;строительной отрасли в&nbsp;сегменте b2b, что делает &laquo;СтройТорги&raquo; лидером электронных торгов в&nbsp;строительной индустрии. Нашими Клиентами являются крупнейшие строительные компании России и&nbsp;всем известные поставщики стройматериалов. Сегодня нашим сервисом активно пользуются более 1000&nbsp;компаний, и&nbsp;их&nbsp;число постоянно растет&nbsp;&mdash; за&nbsp;2014 год количество участников торгов практически удвоилось по&nbsp;сравнению с&nbsp;2013&nbsp;годом.</p>
						</span>
						<a href="#" class="btn-step home-reviews_swith">Читать дальше</a>
					<li class="home-reviews_item home-reviews_item__second">
						<span class="home_review-split_top">На&nbsp;электронной торговой площадке &laquo;СтройТорги&raquo; проводятся торгово-закупочные аукционы на&nbsp;самые разные товары и&nbsp;услуги. Например: строительные материалы, услуги строительных машин и&nbsp;механизмов, подрядные работы, проектно-изыскательские работы, оборудование и&nbsp;многое другое. Наш <a href="catalog.php">каталог</a> содержит профессионально выверенную номенклатуру товаров и&nbsp;услуг&mdash;более 100&nbsp;тыс. позиций. Благодаря каталогу сервис электронных торгов &laquo;СтройТорги&raquo; может быть синхронизован с&nbsp;любой учетной системой, в&nbsp;частности, с&nbsp;популярной&nbsp;1С.</span>
						<span class="home-reviews_content">
							<p class="reviews_review-text">Переход от&nbsp;обычной схемы ведения торгово-закупочных процедур к&nbsp;электронным торгам на&nbsp;электронной торговой площадке &laquo;СтройТорги&raquo; очень прост: не&nbsp;требуется менять бизнес-процессы и&nbsp;покупать лицензии на&nbsp;дополнительный софт. Сервис &laquo;СтройТорги&raquo; работает полностью онлайн и&nbsp;представляет собой SAAS-продукт, доступный с&nbsp;любого устройства и&nbsp;в&nbsp;любом месте, где есть интернет.</p>
							<p class="reviews_review-text">&laquo;СтройТорги&raquo;&nbsp;&mdash; это передовая электронная площадка, которая помогает заказчикам строительных товаров и&nbsp;услуг автоматизировать и&nbsp;контролировать торгово-закупочную деятельность, а&nbsp;также мониторить информацию о&nbsp;рыночных ценах по&nbsp;реальным сделкам.</p>
						</span>
						<a href="#" class="btn-step home-reviews_swith">Читать дальше</a>
				</ul>
			</div>
			<div class="home-show home-show__reviews">
				<a href="reviews.php" class="home-show_all show-all">Все отзывы</a>
			</div>
		</div>
	</section>

	<section class="l-section home-section home-section__clients">
		<div class="l-restrictor">
			<ul class="partners">
				<li class="partners_item">
					<img class="partners_logo" src="static/img/logo-evraz.png" alt="evraz">
				<li class="partners_item">
					<img class="partners_logo" src="static/img/logo-hilti.png" alt="hilti">
				<li class="partners_item">
					<img  class="partners_logo" src="static/img/logo-glavmosstroy.png" alt="glavmosstroy">
				<li class="partners_item">
					<img class="partners_logo"  src="static/img/logo-arks.png" alt="arks">
				<li class="partners_item">
					<img class="partners_logo" src="static/img/logo-deltastroy.png" alt="deltastroy">
				<li class="partners_item">
					<img class="partners_logo" src="static/img/2100.png" alt="skmost">
				<li class="partners_item partners_item__hidden">
					<img class="partners_logo" src="static/img/logo-eurobeton.png" alt="eurobeton">
				<li class="partners_item partners_item__hidden">
					<img class="partners_logo" src="static/img/logo-dsk.png" alt="1dsk">
				<li class="partners_item partners_item__hidden">
					<img class="partners_logo" src="static/img/logo-cy-33.png" alt="su-33">
				<li class="partners_item partners_item__hidden">
					<img class="partners_logo" src="static/img/logo-lider.png" alt="lider">
				<li class="partners_item partners_item__hidden">
					<img class="partners_logo" src="static/img/logo-mechel.png" alt="mechel">
				<li class="partners_item partners_item__hidden">
					<a href="clients.php" class="home-show_all-clients show-all">Все клиенты</a>
			</ul>	
		</div>
	</section>
<?php include("_footer.php"); ?>

