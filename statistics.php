<?php
$title = "Статистика";
include("_header.php"); ?>
<script type="text/javascript" src="static/js/sugar-1.4.1-custom.min.js"></script>
<!--<script type="text/javascript" src="static/js/charts.js"></script>-->
<script type="text/javascript">
$(function() {
	$barChart_block = $(".chart-canvas__bar");
    if ($barChart_block.length) {
      d3.json("static/data/bar-chart/1/bar-chart_1.data.json", initChartBar);
    }
    $donutChart_block = $(".chart-canvas__donut");
    if ($donutChart_block.length) {
      d3.json("static/data/pie-chart/pie-chart_1.data.json", initDonutChart);
    }
    $bubbleChart_block = $(".chart-canvas__bubble");
    if ($bubbleChart_block.length) {
      d3.json("static/data/bubble-chart/bubble-chart_1.data.json", initBubbleChart);
    }
});
</script>
	<section class="l-section l-section__beige">
		<div class="l-restrictor l-restrictor__white">
			<h1 class="section_title">Наглядно О&nbsp;строительном рынке</h1>
			<ul class="statistics-explanation">
				<li class="statistics-explanation_item">
					<p class="statistics-explanation_post">Последнее обновление&nbsp;&mdash; 1 сентября 2014</p>
				<li class="statistics-explanation_item">
					<p>На&nbsp;графиках ниже представлена информация об&nbsp;объёмах сделок и&nbsp;ценах на&nbsp;некоторые популярные товары нашей электронной площадке. Данные на&nbsp;этой странице обновляются раз в&nbsp;месяц.</p>
			</ul>
			<h2 class="statistics_title">Объем торгов и&nbsp;экономии</h2>
			<h3 class="error-browser_ie8">Ваш браузер не&nbsp;поддерживается :—( <br>Для корректного отображения данных воспользуйтесь современным браузером.</h3>
			<div class="statistics_charts statistics_charts__bar">
				<ul class="statistics-barChart">
					<li class="statistics-barChart_item statistics-barChart_item__canvas">
						<div class="chart-canvas__bar"></div>
						<div class="chart-tooltip_wrap">
							<div class="chart-tooltip_content">
								<p></p>
							</div>
						</div>
					<li class="statistics-barChart_item statistics-barChart_item__setting">
						<div class="statistics-barChart-setting">
							<div class="statistics-barChart-setting_type">
								<ul class="switch">
									<li class="switch_item switch_item__active"><label class="switch_element">1<input type="radio" value="1" name="chart-switch__bar"></label>
									<li class="switch_item"><label class="switch_element">2<input type="radio" value="2" name="chart-switch__bar"></label>
									<li class="switch_item"><label class="switch_element">3<input type="radio" value="3" name="chart-switch__bar"></label>
									<li class="switch_item"><label class="switch_element">4<input type="radio" value="4" name="chart-switch__bar"></label>
									<li class="switch_item"><label class="switch_element">5<input type="radio" value="5" name="chart-switch__bar"></label>
								</ul>
							</div>
							<div class="statistics-barChart-setting_period">
								<p>Период</p>
								<select class="input-select">
									<option value="month">1 мес.</option>
									<option value="3month">3 мес.</option>
									<option value="6month" selected>6 мес.</option>
									<option value="12month">12 мес.</option>
								</select>
							</div>
							<div class="statistics-barChart-setting_legend">
								<ul class="chart-legend">
									<li class="chart-legend_item">
										<span class="chart-legend_circle chart-legend_circle__general"></span><span class="chart-legend_text">Итоговый объем</span>
									<li class="chart-legend_item">
										<span class="chart-legend_circle chart-legend_circle__gold"></span><span class="chart-legend_text">Экономия</span>
								</ul>
							</div>
						</div>
				</ul>
			</div>
			<h2 class="statistics_title">Диаграмма распределения объемов сделок по&nbsp;категориям</h2>
			<h3 class="error-browser_ie8">Ваш браузер не поддерживается :—( <br>Для корректного отображения данных воспользуйтесь современным браузером.</h3>
			<div class="statistics_charts statistics_charts__donut chart-type_donut">
				<ul class="statistics-donutChart">
					<li class="statistics-donutChart_item statistics-donutChart_item__setting">
						<div class="statistics-donutChart-setting_period">
							<p>Период</p>
							<select class="input-select">
								<option value="month">1 мес.</option>
								<option value="3month">3 мес.</option>
								<option value="6month" selected>6 мес.</option>
								<option value="12month">12 мес.</option>
							</select>
						</div>
						<ul class="chart-legend"></ul>
					<li class="statistics-donutChart_item statistics-donutChart_item__canvas">
						<div class="chart-tooltip_wrap">
							<div class="chart-tooltip_content">
						    	<p class="chart-tooltip_name"></p>
							</div>
						</div>
						<div class="chart-canvas chart-canvas__donut"></div>
				</ul>
			</div>
			<h2 class="statistics_title">Динамика цен на товары</h2>
			<h3 class="error-browser_ie8">Ваш браузер не поддерживается :—( <br>Для корректного отображения данных воспользуйтесь современным браузером.</h3>
			<div class="statistics_charts statistics_charts__bubble chart-type_bubble">
				<ul class="statistics-bubbleChart">
					<div class="statistics-bubbleChart-canvas_category"><ul class="switch"></ul></div>
					<li class="statistics-bubbleChart_item statistics-bubbleChart_item__canvas">
						<div class="chart-tooltip_wrap">
							<div class="chart-tooltip_content">
								<p class="chart-tooltip_date"></p>
						    	<p class="chart-tooltip_name"></p>
						    	<p class="chart-tooltip_value"></p>
							</div>
						</div>
						<div class="chart-canvas chart-canvas__bubble"></div>
					<li class="statistics-bubbleChart_item statistics-bubbleChart_item__legend">
						<div class="statistics-bubbleChart-legend">
							<ul class="chart-legend"></ul>
						</div>
				</ul>
			</div>
			<div class="statistics-partners">
				<div class="statistics-partners_item">
					<h2 class="statistics-partners_title">В&nbsp;августе больше всех объявили сделок</h2>
					<ul class="partners">
						<li class="partners_item">
							<img  src="static/img/static-logo/zao_shose.png" alt="evraz">
							<h3>ООО «ИК Энергетик»</h3>
						<li class="partners_item">
							<img src="static/img/static-logo/tks.png" alt="hilti">
							<h3>ООО «ИК Энергетик»</h3>
						<li class="partners_item">
							<img  src="static/img/static-logo/arcs.png" alt="glavmosstroy">
							<h3>ООО «ИК Энергетик»</h3>
						<li class="partners_item">
							<img  src="static/img/static-logo/stroyAlians.png" alt="arks">
							<h3>ООО «ИК Энергетик»</h3>
						<li class="partners_item">
							<img class="partners_logo" src="static/img/static-logo/domStroyKompl.png" alt="deltastroy">
							<h3>ООО «ИК Энергетик»</h3>
						<li class="partners_item">
							<img class="partners_logo" src="static/img/static-logo/magma1.png" alt="skmost">
							<h3>ООО «ИК Энергетик»</h3>
						<li class="partners_item partners_item__hidden">
							<img class="partners_logo" src="static/img/static-logo/arcs.png" alt="eurobeton">
							<h3>ООО «ИК Энергетик»</h3>
						<li class="partners_item partners_item__hidden">
							<img class="partners_logo" src="static/img/static-logo/arcs.png" alt="1dsk">
							<h3>ООО «ИК Энергетик»</h3>
					</ul>
				</div>
				<div class="statistics-partners_item">
					<h2 class="statistics-partners_title">В&nbsp;августе больше всех выиграли сделок</h2>
					<ul class="partners">
						<li class="partners_item">
							<img  src="static/img/static-logo/evraz.png" alt="evraz">
							<h3 class="partners-item_title">ООО Альянс кабель</h3>
						<li class="partners_item">
							<img src="static/img/static-logo/iso.png" alt="hilti">
							<h3 class="partners-item_title">ООО Альянс кабель</h3>
						<li class="partners_item">
							<img  src="static/img/static-logo/betas.png" alt="glavmosstroy">
							<h3 class="partners-item_title">ООО Альянс кабель</h3>
						<li class="partners_item">
							<img  src="static/img/static-logo/mechel.png" alt="arks">
							<h3 class="partners-item_title">ООО Альянс кабель</h3>
						<li class="partners_item">
							<img class="partners_logo" src="static/img/static-logo/promNeftPord.png" alt="deltastroy">
							<h3 class="partners-item_title">ООО Альянс кабель</h3>
						<li class="partners_item">
							<img class="partners_logo" src="static/img/static-logo/um_27.png" alt="skmost">
							<h3 class="partners-item_title">ООО Альянс кабель</h3>
						<li class="partners_item partners_item__hidden">
							<img class="partners_logo" src="static/img/static-logo/bsu_155.png" alt="eurobeton">
							<h3 class="partners-item_title">ООО Альянс кабель</h3>
						
					</ul>
				</div>
			</div>
		</div>
	</section>
<?php include("_footer.php"); ?>