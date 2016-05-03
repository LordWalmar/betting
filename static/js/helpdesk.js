$(document).ready(function(){

    function add_needScript(){
        var $form_request = $('#form_request'),
        $type = $form_request.find('select[name=type]'),
        $category = $form_request.find('select[name=category_id]');

        function formstyler_select($select){
            $select.wbtFormStyler();
        }

        $.getJSON('http://master-promo.test.stroytorgi.ru/faq/type_list.json', function(data){
            $.each(data.data, function(tid){
                $type.append('<option value="'+tid+'">'+this+'</option>>')
            });
            formstyler_select($type);
        });

        $.getJSON('http://master-promo.test.stroytorgi.ru/faq/category_list.json', function(data){
            $.each(data.data, function(cid){
                $category.append('<option value="'+cid+'" data-slug="'+this.transliteration+'">'+this.name+'</option>>')
            });
            formstyler_select($category);
        });
    }

    $('#new_request').fancybox({
        margin: 0,
        wrapCSS: 'form_background',
        padding: 0,
        width: '100%',
        height: 'inherit',
        autoHeight: true,
        closeBtn: false,
        autoSize: false,
        fitToView: false,
        ajax: {
            complete: function(jqXHR, textStatus) {
                add_needScript();
            }
        }
      });
});