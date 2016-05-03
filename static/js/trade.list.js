$(document).ready(function(){
    var $filter_form = $('#filter_form'), $table_auction = $('#table_auction'), $nf_info = $('#not_found_info');
    var refresh_timeout;
    var history_count = 0;

    function push_state(url){
        history_count++;
        history.pushState(history_count, $('title').text(), url.replace('/trades/json', '/trades'));
    }

    function price_format(price_num){
        var x = (price_num+'').split('.');
        var x1 = x[0];
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) x1 = x1.replace(rgx, '$1 $2');
        return x1;
    }

    function get_options(){
        var c_value = parseInt($filter_form.find('[name=category]').val());
        var fc_value = parseInt($filter_form.find('[name=filter_category]').val());
        var $_form = $filter_form.clone();
        if (!(fc_value && c_value)) fc_value = c_value;
        $_form.find('[name=category]').html('<option value="'+c_value+'" selected="selected">-</option>');
        $_form.find('[name=filter_category]').prop('disabled', false).html('<option value="'+fc_value+'" selected="selected">-</option>');
        var options = $_form.find(':input').filter(function(){return $(this).val()}).serialize();
        return options?'?'+options:'';
    }

    function _update_lots(next_page){
        next_page = next_page || false;
        if ($table_auction.attr('data-stop') == '1')return;
        var page_num = (Number($table_auction.attr('data-pages')) || 0) + 1;
        var url = '/trades/json'+(next_page?'/page'+page_num:'')+get_options();
        var loading_cls = next_page&&$table_auction.is(':visible')?'table-auction__loading':'auction-section__loading';
        var table_visible = $table_auction.is(':visible');
        if (next_page) {
            if (!table_visible)return;
            $table_auction.find('ul.table-auction').addClass(loading_cls);
        } else {
            if (table_visible){$table_auction.addClass(loading_cls);}else{$nf_info.addClass(loading_cls);}
        }

        $.getJSON(url, function(data){
            var trades = data.success?data.data.trades:[];
            var table_show = Boolean(trades.length);
            if (data.success){
                var categories = data.data.categoriesForTrades;
                var $table = $('ul.table-auction');
                if (!next_page)$table.find('li.table-auction_row[data-href]').remove();
                $.each(trades, function() {
                    var lot = this;
                    var n = lot.sum;
                    var $row = $($('#lot-row').html());
                    $row.attr('data-href', '/trades/' + lot.id + get_options());
                    $row.find('.table-auction_cell-value').text(lot.id);
                    $row.find('.table-auction_action').text(lot.type == 'sell' ? 'Продажа:' : 'Покупка:');
                    $row.find('.table-auction_cell-price').text(price_format(n) + ' руб.');
                    $row.find('.table-auction_cell-economy').text(lot.profit ?  lot.profit.toFixed(1).replace('.', ',') + '%' : '—');
                    if (lot.is_close){
                        $row.find('.table-auction_cell-organizer').replaceWith('<div class="table-auction_cell table-auction_cell__process"><div class="status-process">Закрытые торги</div></div>')
                    }else{
                        $row.find('.table-auction_cell-organizer').text(lot.organizer);
                    }
                    if (!lot.lot_finish){
                        $row.find('.table-auction_cell-sign_date').replaceWith('<div class="table-auction_cell table-auction_cell__process"><div class="status-process">Идут торги</div></div>')
                    }else{
                        $row.find('.table-auction_cell-sign_date').text(Date.create(lot.date_finish.date).format('{dd} {month} {yyyy}', 'ru'));
                    }
                    var $_ul = $('<ul></ul>'), $li_cat = $row.find('li.table-category_item');
                    $.each(lot.categories2, function () {
                        var cat_id = this;
                        var category = categories[cat_id];
                        var $_li = $li_cat.clone().find('a').text(category.name);
                        $_ul.append($_li);
                    });
                    $row.find('ul.table-category').html($_ul.html());
                    $table.append($row[0].outerHTML);
                });
            }
            $('.'+loading_cls).removeClass(loading_cls);
            if (!next_page) {
                $table_auction.toggle(table_show);
                $nf_info.toggle(!table_show);
            }else if (!table_show){
                $table_auction.attr('data-stop', 1)
            }
            $table_auction.attr('data-pages', page_num);
            if (!next_page || table_show) push_state(url);
        }).fail(function(){
            $('.'+loading_cls).removeClass(loading_cls);
            if (!next_page) push_state(url);
        })
    }

    function update_lots(next_page){
        next_page = next_page || false;
        clearTimeout(refresh_timeout);
        refresh_timeout = setTimeout(function() {
            return _update_lots(next_page);
        }, next_page?200:400);
    }

    $filter_form.on('submit', function(ev){
        ev.preventDefault();
        $table_auction.attr('data-stop', 0).attr('data-pages', 0);
        update_lots();
    });

    $filter_form.find('select[name=filter_category], input[name=filter_type], input.input-range, input[name=filter_date_from], input[name=filter_date_to]').on('change', function(ev){
        ev.preventDefault();
        $table_auction.attr('data-stop', 0).attr('data-pages', 0);
        update_lots();
    });

    var wnd_height = $(window).height();
    $(window).scroll(function(){
        if($('body').height() - $(this).scrollTop() - wnd_height < 300) update_lots(true);
    });

});