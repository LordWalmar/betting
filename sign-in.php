<?php 
	$title = "Вход";
	include("_header-plot.php");
?>
        <ul class="signin-menu">
            <li class="signin-menu_item signin-menu_item__login signin-menu_item__active" data-name="login">Вход по логину
            <li class="signin-menu_item signin-menu_item__electro" data-name="electro">Вход по ЭП
        </ul>

        <div class="signin-container">
            <section class="signin-tab signin-tab_login signin-tab__active">
            	<form id="form-signin_login" method="post" action="#">
            		<label>
		            	<span class="form_point">Логин</span>
		            	<input name="login" class="input-text" type="text">
		            </label>
		            <label>
		            	<span class="form_point">Пароль <a class="signin_forgotLogin"href="#">Забыли пароль?</a></span>
		            	<div class="signin-password">
		            		<input name="password" class="input-text" type="password">
		            		<a class="signin-password_visible" href="#"></a>
		            	</div>
	            	</label>
	                <input type="submit" value="Войти" class="btn-submit btn-submit__grey">
	                <p class="signin_registration"><a href="registration.php">Регистрация</a></p>
	            </form>
            </section>

            <section class="signin-tab signin-tab_electro">
                <form id="form-signin_ep" method="POST" action="#">
                	<p class="signin-tab_information">Вставьте носитель ЭП&nbsp;в&nbsp;USB порт вашего компьютера, после чего введите <nobr>pin-код</nobr> и&nbsp;нажмите кнопку &laquo;Войти&raquo;</p>
                	<label>
	                	<span class="form_point">PIN</span>
		            	<input name="pin" class="input-text" type="text">
	            	</label>
	            	 <input type="submit" value="Войти" class="btn-submit btn-submit__grey ">
	            	<p class="signin_registration"><a href="registration.php">Регистрация</a></p>
                </form>
            </section>

            <section class="signin-tab signin-tab_nopassword">
                <form id="form-signin_nopassword" class="signin-nopassword_form" method="POST" action="#">
					<div class="signin_title">Запрос нового пароля</div>
                    <p class="signin-tab_information">Инструкции и&nbsp;регистрационные данные, будут высланы вам по&nbsp;<nobr>E-Mail</nobr>.</p>
                    <label>
	                    <p class="form_point">Логин</p>
		            	<input name="nopassword" class="input-text" type="text">
		            </label>
	            	<input type="submit" value="Войти" class="btn-submit btn-submit__grey">
	            	<p class="signin_registration"><a href="registration.php">Регистрация</a></p>
                </form>
			</section>
		</div>
<?php include("_footer-plot.php"); ?>
