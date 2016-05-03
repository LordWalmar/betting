<?php
$title = "Регистрация";
include("_header.php"); ?>
	<section class="l-section l-section__beige registration-section">
		<div class="l-restrictor l-restrictor__white">
			<form id="form_registration" class="registration" method="post" action="#" data-url="https://ssl.master-promo.test.stroytorgi.ru/guest/new" data-redirect="/">
				<h2 class="registrarion_title">Временная регистрация в&nbsp;системе</h2>
				<p class="registrarion_tooltip">В&nbsp;данном разделе вы&nbsp;регистрируете вашу компанию (индивидуального предпринимателя) на&nbsp;ЭП&nbsp;&laquo;СтройТорги&raquo; для дальнейшего прохождения процедуры аккредитации.</p>
				<div class="other_errors" style="display: none"></div>
				<div class="registration-info">
					<div class="registration-info_title">Сведения о компании:</div>
					<ul>
						<li class="registration-info_choise"><label><input type="radio" value="0" name="individ" class="input-radio">Юридическое лицо</label>
						<li class="registration-info_choise"><label><input type="radio" value="1" name="individ" class="input-radio">Индивидуальный предприниматель</label>
						<li class="registration-info_choise"><label class="stroytorgi-error" for="individ"></label>
					</ul>
					<label>
						<span class="form_point">Организационно&nbsp;&mdash; правовая форма</span>
						<select name="org_type" class="input-select">
							<option value="OOO" selected>ООО</option>
		                    <option value="OAO">ОАО</option>
		                    <option value="ZAO">ЗАО</option>
						</select>
					</label>
					<label>
						<span class="form_point">Полное наименование</span>
						<input name="org_name" class="input-text" type="text">
					</label>
					<label>
						<span class="form_point">ИНН</span>
						<input name="inn" maxlength='12' class="input-text" type="text">
					</label>
					<label>
						<span class="form_point">КПП</span>
						<input name="kpp" class="input-text" type="text">
					</label>
					<div class="registration-info_contact">
						<h2 class="registrarion_title">Контактная информация</h2>
						<label>
							<span class="form_point registrarion_point">Контактные данные</span>
							<input name="cont_name" class="input-text" type="text">
						</label>
						<label>
							<span class="form_point">Должность</span>
							<input name="position" class="input-text" type="text">
						</label>
						<label>
							<span class="form_point">Телефон</span>
							<input name="phone" class="input-text" type="tel">
						</label>
						<label>
							<span class="form_point">Email</span>
							<input name="email" class="input-text" type="email">
						</label>
					</div>
					<div class="registration-info_title">Сфера деятельности</div>
					<ul class="registration-info_fields">
						<li class="registration-info_choise"><label><input type="checkbox" class="input-checkbox">Изыскания</label>
						<li class="registration-info_choise"><label><input type="checkbox" class="input-checkbox">Производство</label>
						<li class="registration-info_choise"><label><input type="checkbox" class="input-checkbox">Торговля</label>
						<li class="registration-info_choise"><label><input type="checkbox" class="input-checkbox">Машины и&nbsp;механизмы</label>
						<li class="registration-info_choise"><label><input type="checkbox" class="input-checkbox">Проектирование </label>
						<li class="registration-info_choise"><label><input type="checkbox" class="input-checkbox">Строительство</label>
					</ul>
					<input type="submit" value="Зарегистрироваться" class="btn-submit btn-submit__red" />
			</form>
		</div>
	</section>
<?php include("_footer.php"); ?>