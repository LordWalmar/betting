$(document).ready(function(){
    var $filter_form = $('#filter_form');
    var TEXT_SECOND_FILTER = 'Сначала выберите категорию';
    var TEXT_NO_FILTER_CATEGORY = 'Подкатегорий нет'

    function refresh_select($select){
        $select.siblings().remove();
        $select.unwrap().removeClass("wbt-input__styled wbt-input-select__styled");
        $select.find("option").eq(0).prop("selected", true);
        $select.wbtFormStyler();
        return $select;
    }

    $filter_form.find('select[name=category]').on('change', function(){
        var $filter_category = $filter_form.find('select[name=filter_category]');
        var $category = $(this);
        var value = $category.val();
        if (!parseInt(value)) {
            $filter_category.find("option").eq(0).prop("selected", true);
            $filter_category.find('option:first').text(TEXT_SECOND_FILTER);
            $filter_category.change().prop('disabled',true).closest('.filter-category').addClass('filter-category__disabled');
            return;
        }
        $.getJSON('/catalog/parent/'+value, function(data){
            var values = data.data;
            $filter_category.find('option').slice(1).remove();
            if (values){
                $.each(values, function(cat_id){
                    $filter_category.append('<option value="'+cat_id+'">'+this.name+'</option>')
                });
            }else{
                $filter_category.append('<option value="'+value+'">'+TEXT_NO_FILTER_CATEGORY+'</option>')
            }
            refresh_select($filter_category);
            $filter_category.find('option:first').prop("selected", true).text("Выберите подкатегорию");
            $filter_category.change().prop('disabled',false).closest('.filter-category').removeClass('filter-category__disabled');
        }).fail(function(){
            $filter_category.slice(1).remove();
            $filter_category.find("option").prop("selected", false);
            $filter_category.append('<option value="'+value+'" selected="selected">'+TEXT_NO_FILTER_CATEGORY+'</option>');
            $filter_category.change().prop('disabled',true).closest('.filter-category').addClass('filter-category__disabled');
        })
    })
});