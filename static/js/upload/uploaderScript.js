$(function(){
    var $upload_block = $('#upload');
    var $form = $upload_block.closest('form');
    var $ul = $upload_block.find('ul');

    function file_exist(show_alert){
        if ($ul.find('.form-upload_item').length) {
            if (show_alert) alert('К форме можно прикрепить только один файл.');
            return true;
        }
        return false;
    }

    $upload_block.find('#drop a').click(function(){
        if (!file_exist(true)) $(this).parent().find('input').click();
    });

    $upload_block.fileupload({
        dropZone: $(this),
        add: function (e, data) {
            if (file_exist()) return;
            var $file = $form.find('input[type=file]');
            var tpl = $('<li class="working form-upload_item"><span class="form-upload_delete"></span><div class="form-upload_name"></div></li>');
            tpl.find('div').text(data.files[0].name);
            data.context = tpl.appendTo($ul);
            tpl.find('span').click(function(){
                tpl.fadeOut(function(){tpl.remove();});
                $file.removeData();
            });
            $file.data(data);
        },
        fail:function(e, data){
            data.context.addClass('errorUpload');
        }
    });

    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

});