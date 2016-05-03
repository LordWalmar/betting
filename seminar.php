<?php 
	$title = "Семинар";
	include("_header-plot.php");
?>
        <div class="form_container">
            <form id="form_seminar" action="#" method="post" data-url="http://master-promo.test.stroytorgi.ru/workshop/post.json">
                <h2 class="form_title">Записаться на&nbsp;семинар</h2>
                <p class="form_information">На&nbsp;семинаре мы&nbsp;покажем основные сценарии сервиса: как разместить аукцион и&nbsp;лоты, какие аукционы бывают и&nbsp;чем они отличаются, как участвовать в&nbsp;торгах. Это поможет вам и&nbsp;вашим сотрудникам быстро начать использовать сервис эффективно. Семинары проводятся бесплатно раз в&nbsp;неделю <a class="stroytorgi_link" href="contact.php">в&nbsp;офисе компании</a>.</p>
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
                <input type="submit" value="Записаться" class="btn-submit btn-submit__grey">
            </form>
		</div>
<?php include("_footer-plot.php"); ?>