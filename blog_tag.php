<?php
$title = "Блог Тег";
include("_header.php"); ?>
<script type="text/javascript">
$(function() {
	var $barChart_block = $(".chart-canvas__bar");
    if ($barChart_block.length) {
      d3.json("static/data/bar-chart/1/bar-chart_1.data.json", initChartBar);
    }
});
</script>

	<section class="l-section l-section__beige">
		<div class="l-restrictor l-restrictor__white l-restrictor__blog">
			<h1 class="blog-title">Обновления системы&nbsp;&mdash; 80</h1>

			<aside class="blog-themes">
					<h3 class="blog-themes_title">Темы:</h3>
					<ul>
						<li class="blog-themes_item">
							<a href="blog_tag.php" class="blog-context">Обновления&nbsp;системы&nbsp;&mdash;&nbsp;80</a>
						<li class="blog-themes_item">
							<a href="blog_tag.php" class="blog-context">Новости&nbsp;сервиса&nbsp;&mdash;&nbsp;35</a>
						<li class="blog-themes_item">
							<a href="blog_tag.php" class="blog-context">Статистика&nbsp;сервиса&nbsp;&mdash;&nbsp;17</a>
						<li class="blog-themes_item">
							<a href="blog_tag.php" class="blog-context">Новости&nbsp;строительного&nbsp;рынка&nbsp;&mdash;&nbsp;26</a>
						<li class="blog-themes_item">
							<a href="blog_tag.php" class="blog-context">ТОПЫ&nbsp;&mdash;&nbsp;26</a>
						<li class="blog-themes_item">
							<a href="blog_tag.php" class="blog-context">Цены&nbsp;и&nbsp;объемы&nbsp;рынка&nbsp;&mdash;&nbsp;19</a>
					</ul>

					<form action="#" method="POST" class="blog-updates">
						<p class="blog-updates_text">Введите свою почту, если хотите подписаться на обновления</p>
						<input class="filter-search_input" name="subscribe"><!--
						--><button class="filter-search_button filter-search_button__grey" type="submit">Подписаться</button>
						<p class="blog-updates_confirm">Поздравляем, вы успешно подписаны на рассылку</p>
					</form>
			</aside>

			<ul class="blog-post_list">
				<li class="blog-post_list-item">
					<div class="blog-post_date"><strong>15</strong> мая / 2014</div>
					<h2 class="blog-post_title">
						<a href="blog_post.php">Производители бетона Урала теперь с&nbsp;нами</a>
					</h2>
					<p class="blog-post_text">С&nbsp;первых дней реализации проекта деятельность Стройторги направлена на&nbsp;то, чтобы выработать понятную, прозрачную и&nbsp;практичную контрактную стратегию и&nbsp;процедуры. Компания прилагает максимальные усилия для того, чтобы обеспечить соответствие контрактных процессов этим стратегиям</p>
					<a href="blog_post.php" class="blog-readmore btn-step">Читать дальше</a>
					<a href="blog_tag.php" class="blog-context">Новости&nbsp;строительного&nbsp;рынка&nbsp;&mdash;&nbsp;26</a>
				
				<li class="blog-post_list-item">
					<div class="blog-post_date"><strong>15</strong> мая / 2014&nbsp;&mdash; <span class="blog-post_description"><strong>Партнеры и акции</strong></span></div>
					<h2 class="blog-post_title">
						<a href="blog_post.php">Moscow City</a>
					</h2>
					<div class="blog-media_inside">
						<img src="static/img/blog-photo.png" alt="moscow" class="blog-photo">
						<span class="blog-photo_nav-prev"></span>
						<span class="blog-photo_nav-next"></span>
						<span href="blog_post.php" class="blog-photo_description">Moscow City как главный московский бизнес-центр</span>
					</div>
					<p class="blog-post_text">Вам не&nbsp;придётся пролистывать десятки изданий в&nbsp;поисках новостей&nbsp;&mdash; мы&nbsp;сделали это за&nbsp;вас. В&nbsp;новом выпуске &laquo;Бизнес-дайджеста&raquo; вас ждут интересные изменения в&nbsp;законодательстве и&nbsp;актуальные новости без лишних слов. Наслаждайтесь!</p>
					<a href="blog_post.php" class="blog-readmore btn-step">Читать дальше</a>
					<a href="blog_tag.php" class="blog-context">Статистика&nbsp;сервиса&nbsp;&mdash;&nbsp;17</a>
				
				<li class="blog-post_list-item">
					<div class="blog-post_date"><strong>15</strong> мая / 2014</div>
					<h2 class="blog-post_title">
						<a href="blog_post.php">Веб-документы и другие летние обновления системы</a>
					</h2>
					<p class="blog-post_text">Вам не&nbsp;придётся пролистывать десятки изданий в&nbsp;поисках новостей&nbsp;&mdash; мы&nbsp;сделали это за&nbsp;вас. В&nbsp;новом выпуске &laquo;Бизнес-дайджеста&raquo; вас ждут интересные изменения в&nbsp;законодательстве и&nbsp;актуальные новости без лишних слов. Наслаждайтесь!</p>
					<a href="blog_post.php" class="blog-readmore btn-step">Читать дальше</a>
					<a href="blog_tag.php" class="blog-context">Обновления&nbsp;системы&nbsp;&mdash;&nbsp;80</a>
					<a href="blog_tag.php" class="blog-context">Новости&nbsp;сервиса&nbsp;&mdash;&nbsp;35</a>
				
				<li class="blog-post_list-item">
					<div class="blog-post_date"><strong>15</strong> мая / 2014</div>
					<h2 class="blog-post_title">
						<a href="blog_post.php">ИП освободили от лимитов по кассе</a>
					</h2>
					<p class="blog-post_text">Вам не&nbsp;придётся пролистывать десятки изданий в&nbsp;поисках новостей&nbsp;&mdash; мы&nbsp;сделали это за&nbsp;вас. В&nbsp;новом выпуске &laquo;Бизнес-дайджеста&raquo; вас ждут интересные изменения в&nbsp;законодательстве и&nbsp;актуальные новости без лишних слов. Наслаждайтесь!</p>
					<a href="blog_post.php" class="blog-readmore btn-step">Читать дальше</a>
					<a href="blog_tag.php" class="blog-context">Цены&nbsp;и&nbsp;объемы&nbsp;рынка&nbsp;&mdash;&nbsp;19</a>

				<li class="blog-post_list-item">
					<div class="blog-post_date"><strong>15</strong> мая / 2014</div>
					<h2 class="blog-post_title">
						<a href="blog_post.php">Объем торгов и экономии</a>
					</h2>
					<div class="blog-media_outside">
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
												<li class="switch_item switch_item__active"><a href="#">1</a>
												<li class="switch_item"><a href="#">2</a>
												<li class="switch_item"><a href="#">3</a>
												<li class="switch_item"><a href="#">4</a>
												<li class="switch_item"><a href="#">5</a>
											</ul>
										</div>
										<div class="statistics-barChart-setting_period">
											<p>Период</p>
											<select class="input-select">
							                    <option value="1">3 мес.</option>
							                    <option value="2" selected>6 мес.</option>
							                    <option value="3">9 мес.</option>
							                    <option value="4">12 мес.</option>
											</select>
										</div>
										<div class="statistics-barChart-setting_legend">
											<ul class="chart-legend">
												<li class="chart-legend_item chart-legend_item__bulk">Итоговый объем
												<li class="chart-legend_item chart-legend_item__petroleum">Экономия
											</ul>
										</div>
									</div>
							</ul>
						</div>
					</div>
			
					<p class="blog-post_text">Вам не&nbsp;придётся пролистывать десятки изданий в&nbsp;поисках новостей&nbsp;&mdash; мы&nbsp;сделали это за&nbsp;вас. В&nbsp;новом выпуске &laquo;Бизнес-дайджеста&raquo; вас ждут интересные изменения в&nbsp;законодательстве и&nbsp;актуальные новости без лишних слов. Наслаждайтесь!</p>
					<a href="blog_post.php" class="blog-readmore btn-step">Читать дальше</a>
					<a href="blog_tag.php" class="blog-context">Статистика&nbsp;сервиса&nbsp;&mdash;&nbsp;17</a>
			</ul>

			<nav class="blog-nav">
				<ul>
					<li class="blog-nav_item"><a href="#" class="blog-nav_link">предыдущая</a>
					<li class="blog-nav_item"><a class="blog-nav_link" href="#">1</a>
					<li class="blog-nav_item blog-nav_item__active"><span class="blog-nav_link" href="#">2</span>
					<li class="blog-nav_item"><a class="blog-nav_link" href="#">3</a>
					<li class="blog-nav_item"><a class="blog-nav_link" href="#">4</a>
					<li class="blog-nav_item"><span class="blog-nav_link">...</span>
					<li class="blog-nav_item"><a class="blog-nav_link" href="#">15</a>
					<li class="blog-nav_item"><a class="blog-nav_link" rel="next" href="#">следующая</a>
				</ul>
			</nav>
		</div>
	</section>

<?php include("_footer.php"); ?>