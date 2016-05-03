<?php 
	$title = "Презентация";
	include("_header-plot.php");
?>
        <div class="form_container">
            <form id="form_presentation" method="post" action="#" data-url="http://master-promo.test.stroytorgi.ru/feedback/post.json">
                <h2 class="form_title">Заказ презентации</h2>
                <p class="form_information">Мы&nbsp;понимаем, как сложно поменять привычную схему работы и&nbsp;принять решение использовать сервис. Оставьте ваши контактные данные или <a class="stroytorgi_link" href="question.php">напишите</a> нам письмо&nbsp;&mdash; мы&nbsp;будем рады встретится с&nbsp;вами и&nbsp;продемострировать наш сервис. Это бесплатно.</p>
                <div class="other_errors" style="display: none"></div>
                <label>
                    <span class="form_point">Ф.И.О.</span>
                    <input name="name" maxlength="255" class="input-text" type="text">
                </label>
                <label>
                    <span class="form_point">Компания</span>
                    <input name="company_name" maxlength="255" class="input-text" type="text">
                </label>
                <label>
                    <span class="form_point">Телефон</span>
                    <input name="phone" maxlength="255" class="input-text" type="tel">
                </label>
                <label>
                    <span class="form_point">Email</span>
                    <input name="email" maxlength="255" class="input-text" type="email">
                </label>
                <input type="submit" value="Заказать" class="btn-submit btn-submit__grey">
            </form>
		</div>
<?php include("_footer-plot.php"); ?>
