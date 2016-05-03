<?php 
	$title = "Обращение";
	include("_header-plot.php");
?>
<!-- jQuery File Upload Dependencies -->
<script src="static/js/upload/jquery.ui.widget.js"></script>
<script src="static/js/upload/jquery.iframe-transport.js"></script>
<script src="static/js/upload/jquery.fileupload.js"></script>
<script src="static/js/upload/uploaderScript.js"></script>
<script src="static/js/helpdesk.js"></script>
        <div class="form_container">
            <form id="form_request" method="post" action="static/php/uploader.php" enctype="multipart/form-data">
                <label>
                    <span class="form_point">Ф.И.О.</span>
                    <input name="author" maxlength="255" class="input-text" type="text">
                </label>
                <label>
                    <span class="form_point">Email</span>
                    <input name="email" maxlength="255" class="input-text" type="text">
                </label>
                <label>
                    <span class="form_point">Тип обращения</span>
                    <select class="input-select" name="type">
                        <option value="default">&mdash;</option>
                        <option value="1">Первая</option>
                        <option value="2">Вторая</option>
                    </select>
                </label>
                <label>
                    <span class="form_point">Категория обращения</span>
                    <select class="input-select" name="category_id">
                        <option value="default">&mdash;</option>
                        <option value="1">Первая</option>
                        <option value="2">Вторая</option>
                    </select>
                </label>
                <label>
                    <span class="form_point">Тема</span>
                    <input name="title" maxlength="255" class="input-text" type="text">
                </label>
                <label>
                    <span class="form_point">Сообщение</span>
                    <textarea name="text" maxlength="3000" class="input-text"></textarea>
                </label>
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
        <a href="" class="window-modal_close">Закрыть</a>

<?php include("_footer-plot.php"); ?>