<?php
$title = "Пример текстовых стилей";
include("_header.php"); ?>

<script type="text/javascript">
$(function() {
	$barChart_block = $(".chart-canvas__bar");
    if ($barChart_block.length) {
      d3.json("static/data/bar-chart.data.json", initChartBar);
    }
});
</script>

<style>
	h1.text-styles {margin:40px 0;}
	h2.text-styles {border-bottom:1px solid #333;margin-top:60px;margin-bottom:24px;padding-bottom:10px;}
	a.text-styles {color:#e22;text-decoration:underline;}
</style>


<section class="l-section l-section_text">
		<div class="l-restrictor">
			<h1 class="section_title">Пример текстовых стилей</h1>
			Для применения текстовых стилей в посте блога, необходимо добавить нужные html тэги внутрь сужествующего div'а с классом ".blog-post_content"
			<div class="blog-post_content">
				<h2>Тэг p - параграф в статье.</h2>
				<h2>Пример использования:</h2>
				<p>За&nbsp;первые шесть месяцев 2014 года киберпреступники похитили 450&nbsp;млн записей, содержащих финансовую или&nbsp;другую личную информацию клиентов и&nbsp;пользователей различных организаций. Это почти вдвое больше, чем за&nbsp;аналогичный период прошлого года. Такие данные содержатся в&nbsp;отчете разработчика решений по&nbsp;информационной безопасности InfoWatch, пишут &laquo;Ведомости&raquo; .</p>
				<h2>Тэг img - картинка в статье.</h2>
				<h2>Пример использования:</h2>
				<img src="static/img/blog-photo.png" alt="moscow">
				<h2>Тэг blockquote - цитата в статье.</h2>
				<h2>Пример использования:</h2>
				<blockquote>Использование сервиса никак не&nbsp;меняет привычные вам бизнес-процессы</blockquote>
				<h2>Тэг ul с вложенными тэгами li - ненумерованный список.</h2>
				<h2>Пример использования:</h2>
				<ul>
					<li>Использование сервиса никак не&nbsp;меняет привычные вам бизнес-процессы: не&nbsp;надо менять ни&nbsp;команду, ни&nbsp;поставщиков. Чтобы остаться с&nbsp;привычными поставщиками&nbsp;&mdash; просто пригласите их&nbsp;в&nbsp;сервис.</li>
					<li>Чтобы начать пользоваться не&nbsp;нужно приобретать ни&nbsp;софт, ни&nbsp;оборудование &mdash;&nbsp;сервис работает на&nbsp;всех современных платформах, в&nbsp;т.ч. Android и&nbsp;Apple. Все что нужно&nbsp;&mdash; это получить ЭЦП и&nbsp;зарегистрироваться.</li>
					<li>Это не&nbsp;долго&nbsp;&mdash; экспресс-торги можно провести за&nbsp;4&nbsp;часа. В&nbsp;среднем сделка не&nbsp;длится более 4х&nbsp;рабочих дней.</li>
				</ul>
				<h2>Тэг ol с вложенными тэгами li - нумерованный список.</h2>
				<h2>Пример использования:</h2>
				<ol>
					<li>Использование сервиса никак не&nbsp;меняет привычные вам бизнес-процессы: не&nbsp;надо менять ни&nbsp;команду, ни&nbsp;поставщиков. Чтобы остаться с&nbsp;привычными поставщиками&nbsp;&mdash; просто пригласите их&nbsp;в&nbsp;сервис.</li>
					<li>Чтобы начать пользоваться не&nbsp;нужно приобретать ни&nbsp;софт, ни&nbsp;оборудование &mdash;&nbsp;сервис работает на&nbsp;всех современных платформах, в&nbsp;т.ч. Android и&nbsp;Apple. Все что нужно&nbsp;&mdash; это получить ЭЦП и&nbsp;зарегистрироваться.</li>
					<li>Это не&nbsp;долго&nbsp;&mdash; экспресс-торги можно провести за&nbsp;4&nbsp;часа. В&nbsp;среднем сделка не&nbsp;длится более 4х&nbsp;рабочих дней.</li>
				</ol>

				<div style="max-width:50%;margin-bottom:40px;">
					<h2>Состояние кнопки &mdash; отправка данных.</h2>
					<input type="submit" value="Отправка данных" class="btn-submit btn-submit__grey btn-loading btn-loading__grey">
					<p></p>
					<h2>Состояние кнопки &mdash; disabled.</h2>
					<input type="submit" value="Войти" class="btn-submit btn-submit__grey btn-submit__disabled">
				</div>
			</div>
		</div>
	</section>

<?php include("_footer.php"); ?>