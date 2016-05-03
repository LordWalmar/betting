<?php 
	$title = "Вопрос";
	include("_header-plot.php");
?>

<!-- jQuery File Upload Dependencies -->
<script src="static/js/upload/jquery.ui.widget.js"></script>
<script src="static/js/upload/jquery.iframe-transport.js"></script>
<script src="static/js/upload/jquery.fileupload.js"></script>
<script src="static/js/upload/uploaderScript.js"></script>

        <div class="form_container">
            <form id="form_question" action="#" method="post" enctype="multipart/form-data" data-url="http://master-promo.test.stroytorgi.ru/question.json">
                <h2 class="form_title">Задать вопрос</h2>
                <p class="form_information">Если у&nbsp;вас или ваших сотрудников возник вопрос по&nbsp;работе с&nbsp;системой, вы&nbsp;обнаружили ошибку или у&nbsp;вас есть предложение по&nbsp;новому функционалу&nbsp;&mdash; напишите нам. Прежде чем написать об&nbsp;ошибке, пожалуйста воспользуйтесь <a class="stroytorgi_link" href="helpdesk.php">поиском</a>&nbsp;&mdash; возможно похожая проблема уже обсуждалась.</p>
                <div class="other_errors" style="display: none"></div>
                <label>
                    <span class="form_point">Тема вопроса</span>
                    <input name="title" maxlength="255" class="input-text" type="text">
                </label>
                <label>
                    <span class="form_point">Категория вопроса</span>
                    <select class="input-select" name="type">
                        <option value="default">&mdash;</option>
                    </select>
                </label>
                <label>
                    <span class="form_point">Ф.И.О.</span>
                    <input name="author" maxlength="255" class="input-text" type="text">
                </label>
                <label>
                    <span class="form_point">Email</span>
                    <input name="email" maxlength="255" class="input-text" type="email">
                </label>
                <label>
                    <span class="form_point">Ваш вопрос</span>
                    <textarea name="text" maxlength="3000" class="input-text"></textarea>
                </label>
                <div>
                <div id="upload" class="input-text form-upload">
                    <ul>
                        <!-- The file uploads will be shown here -->
                    </ul>
                    <p id="drop">Перетащите файл сюда или <a class="stroytorgi_link">выберите</a>
                        <input type="file" name="file" />
                    </p>
                </div>
                <input type="submit" value="Отправить" class="btn-submit btn-submit__grey">
            </form>
		</div>
<?php include("_footer-plot.php"); ?>