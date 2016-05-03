$(document).ready(function(){
    var $filter_form = $('#filter_form');

    function submit_filter_form(){
        var c_value = parseInt($filter_form.find('[name=category]').val());
        var fc_value = parseInt($filter_form.find('[name=filter_category]').val());
        var $_form = $filter_form.clone();
        if (!(fc_value && c_value)) fc_value = c_value;
        $_form.find('[name=category]').html('<option value="'+c_value+'" selected="selected">-</option>');
        $_form.find('[name=filter_category]').prop('disabled', false).html('<option value="'+fc_value+'" selected="selected">-</option>');
        location.href = location.pathname + '?' + $_form.serialize();
    }

    $filter_form.find('select[name=category], select[name=filter_category], input[name=filter_type], input[name=filter_letter]').on('change', function(ev){
        ev.preventDefault();
        submit_filter_form();
    });

    $(".filter-letters_item label").on("click", function(ev) {
        $(this).closest(".filter-letters_item").addClass('filter-letters_item__active').siblings().removeClass('filter-letters_item__active');
    });

    $(".filter-letters_reset a").on("click", function(ev) {
        ev.preventDefault();
        $(".filter-letters_item").removeClass('filter-letters_item__active').find('input').prop('checked', false);
        submit_filter_form();
    });

    $filter_form.on('submit', function(ev){
        ev.preventDefault();
        submit_filter_form();
    })
});