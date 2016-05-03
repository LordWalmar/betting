<!DOCTYPE html>
<!--[if lte IE 7]> <html class="no-js ie67 ie" lang="ru"> <![endif]-->
<!--[if IE 8]> <html class="no-js ie8 ie" lang="ru"> <![endif]-->
<!--[if IE 9]> <html class="no-js ie9 ie" lang="ru"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="ru"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<title><?php if($title) echo $title. " | "; ?>Stroytorgi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="static/css/stroytorgi.all.css">
    <!--[if lt IE 9]><link rel="stylesheet" href="static/css/stroytorgi.IE8.css"><![endif]-->
	<link rel="stylesheet" href="static/fancybox/jquery.fancybox.css" type="text/css" media="screen" />

    <link rel="icon" type="image/png" href="static/img/favicon/favicon-196x196.png" sizes="196x196">
    <link rel="icon" type="image/png" href="static/img/favicon/favicon-160x160.png" sizes="160x160">
    <link rel="icon" type="image/png" href="static/img/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="static/img/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="static/img/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="57x57" href="static/img/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="static/img/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="static/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="static/img/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="static/img/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="static/img/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="static/img/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="static/img/favicon/apple-touch-icon-152x152.png">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="static/js/es5-shim.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="static/js/ie8.complement.js"></script><![endif]-->
    <script>document.documentElement.className=document.documentElement.className.replace('no-js','js');</script>
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="static/js/jquery.js"></script>
	<script src="static/js/jquery.validate.min.js"></script>
	<script src="static/js/jquery.form.min.js"></script>
	<script src="static/js/stroytorgi.debug.js"></script>
	<script src="static/js/wbt.fallbacker.js"></script>
	<script src="static/js/wbt.formstyler.js"></script>
	<script src="static/js/wbt-slider.js"></script> 
	<script src="static/js/jquery.plugin.js"></script> 
	<script src="static/js/jquery.datepick.js"></script>
	<script src="static/js/jquery.datepick-ru.js"></script>
	<script src="static/js/stroytorgi.validation.js"></script>
	<script src="static/js/layout-handler.js"></script>
    <script type="text/javascript" src="static/fancybox/jquery.fancybox.pack.js"></script>
	<script src="static/js/form.fancyboxConnect.js"></script>
	<script src="static/js/d3.v3.min.js" charset="utf-8"></script>
	<script src="static/js/chart.bar.js" charset="utf-8"></script>
	<script src="static/js/charts.pie.bubble.js"></script>

	<!--script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-11571887-23', 'auto');
	  ga('send', 'pageview');
	
	</script-->
</head>
<body>
	<header class="l-header">
		<div class="l-restrictor l-restrictor__header">
			<div class="header-company">
				<h1 class="header-logo">
					<a href="index.php" class="header-logo_wrapper">
						<img class="header-logo_img__desktop" src="static/img/logo-stroytorgi.png.svg" alt="Стройторги — электронная торговая площадка для строительных компаний. Стройторги помогает строительным компаниям организовывать и проводить электронные конкурсы и аукционы, чтобы снизить себестоимость строительства и повысить эффективность и прозрачность торгово-закупочных процедур. Закупок по приобретению и реализации строительных материалов, машин и механизмов; выбору субподрядных строительных организаций; размещению и выполнению заказов на транспортные услуги и т.д.">
						<img class="header-logo_img__mobile" src="static/img/logo-stroytorgi-mobile.png.svg" alt="Стройторги — электронная торговая площадка для строительных компаний. Стройторги помогает строительным компаниям организовывать и проводить электронные конкурсы и аукционы, чтобы снизить себестоимость строительства и повысить эффективность и прозрачность торгово-закупочных процедур. Закупок по приобретению и реализации строительных материалов, машин и механизмов; выбору субподрядных строительных организаций; размещению и выполнению заказов на транспортные услуги и т.д.">
					</a>
				</h1><!--
				--><a href="#" class="header-menu-icon">
					<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Menu" width="16" height="16"/>
				</a>
				<ul class="header-contact">
					<li class="header-contact_item">
						<a class="header-maintel" href="tel:+74956681312"><nobr>+7 (495) 668-13-12</nobr></a>
					<li class="header-contact_item">
						<a href="tel:88007070575"><nobr>8 800 707-05-75</nobr></a>
					<li class="header-contact_item header-contact_item-divider">
					<li class="header-contact_item">
						<a href="mailto:info@stroytorgi.ru">info@stroytorgi.ru</a>
					<li class="header-contact_item">
						<a href="contact.php">Контакты</a>
				</ul>
			</div><!--
		 --><div class="header-menu">
				<div class="header-nav">
				 	<ul class="header-nav_services">
						<li class="header-nav_item">
							<a href="auction.php">Торги</a>
						<li class="header-nav_item   header-nav_item__mobile">
							<a href="blog.php">Новости</a>
						<li class="header-nav_item  ">
							<a href="catalog.php">Каталог</a>
						<li class="header-nav_item  ">
							<a href="clients.php">Клиенты</a>
						<li class="header-nav_item  header-nav_item__active">
							<a href="statistics.php">Статистика</a>
					</ul><!--
				 --><ul class="header-nav_about">
						<li class="header-nav_item  ">
							<a href="about_company.php">О&nbsp;компании</a>
						<li class="header-nav_item  ">
							<a href="about_service.php">О&nbsp;сервисе</a>
						<li class="header-nav_item ">
							<a href="reviews.php">Отзывы</a>
						<li class="header-nav_item  ">
							<a href="helpdesk.php">Поддержка</a>	
					</ul>
				</div><!--
				 --><ul class="header-my">
					<!--
						<li class="header-my_item header-my_item__login"><a id ="header_signin" data-fancybox-type="ajax" href="sign-in.html" class="header-my_login">Войти</a>
						<li class="header-my_item"><a class="header-my_registration" href="registration.php">Регистрация</a>
					-->	
						<li class="header-my_item header-my_item__cabinet"><a id="header_signin" data-fancybox-type="ajax" href="sign-in.html" class="header-my_cabinet">Личный кабинет</a>
						<li class="header-my_item header-my_item__logout"><a class="header-my_logout" href="#">Выход</a>

						<li class="header-my_item"><a data-fancybox-type="ajax" class="header-my_order new_presentation new_presentation__desktop" href="presentation.html">Заказать презентацию</a><a data-fancybox-type="ajax" class="header-my_order new_presentation new_presentation__mobile" href="presentation.html">Презентация</a>
						<li class="header-my_item"><a class="header-my_news" href="blog.php">Новости</a>
						<li class="header-my_item header-my_item__contact"><p>&mdash;</p>
						<li class="header-my_item header-my_item__contact"><a href="tel:+74956681312"><nobr>+7 (495) 668-13-12</nobr></a>
					 	<li class="header-my_item header-my_item__contact"><a href="tel:8 800 707-05-75"><nobr>8 800 707-05-75</nobr></a>
						<li class="header-my_item header-my_item__contact"><a class="header-contact_email" href="mailto:info@stroytorgi.ru">info@stroytorgi.ru</a>
						<li class="header-my_item header-my_item__contact"><a href="contact.php">Контакты</a>
					</ul>
			</div>
		</div>
	</header>
