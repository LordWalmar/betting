$(document).ready(function(){
    var $catalog = $('ul.catalog'), info_timeout;
    if (!$('.catalog-fields_item__active').length)$('ul.catalog-fields li:first').addClass('catalog-fields_item__active');
    $('.catalog-fields_item__active ul.catalog-fields-list:first, .catalog-fields-list_item__active ul.catalog-fields-list:first').show();

    var history_count = 0;

    function push_state(url){
        history_count++;
        history.pushState(history_count, $('title').text(), url);
    }

    function price_format(price_num){
        var x = (price_num+'').split('.');
        var x1 = x[0];
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) x1 = x1.replace(rgx, '$1 $2');
        return x1;
    }

   function plural(words, n){
       n %= 100;if(n>10&&n<20)return words[2];n%=10;return words[n>1&&n<5?1:n==1?0:2];
   }
    $catalog.on('click', 'li.catalog-fields-list_item[data-cid] .catalog-fields-list_status', function(ev){
        ev.preventDefault();
        var $current_item = $(this).closest('li.catalog-fields-list_item');
        if ($current_item.find('div.catalog-fields-list_title:first').next().hasClass('catalog-fields-list')){
            return;
        }
        var value = $current_item.attr('data-cid');
        var level = parseInt($current_item.attr('data-level'));
        $.getJSON('http://master-promo.test.stroytorgi.ru/catalog/parent/'+value, function(data){
            var categories = data.data;
            var $catalog_list = $($('#catalog_list').html());
            var $catalog_item = $catalog_list.find('li:first');
            var $_ul = $('<ul></ul>');
            $.each(categories || {}, function(cid){
                var $new_item = $catalog_item.clone();
                if (this.is_final){
                    $catalog_list.addClass('catalog-fields-list__last');
                    $new_item.find('.catalog-fields-list_title').addClass('catalog-fields-list_title__last');
                    $new_item.find('.catalog-fields-list_status').remove();
                }
                $new_item.attr('data-level', level+1).attr('data-cid', cid).attr('data-slug', this.transliteration).find('.catalog-fields-list_name').text(this.name);
                $_ul.append($new_item.clone());
            });
          
            $catalog_list.html($_ul.html());
            $current_item.find('div.catalog-fields-list_title:first').after($catalog_list[0].outerHTML);
            $current_item.find('div.catalog-fields-list_title:first').next().show();
        });
    });

    function get_info($current_item){

        function clients_url(type, category, filter_category){
            return '/clients?filter_type='+type+'&category='+category+'&filter_category='+ filter_category;
        }

        clearTimeout(info_timeout);
        info_timeout = setTimeout(function() {
            var $catalog_data = $($('#catalog_data').html());
            var category_id = $current_item.attr('data-cid');
            var is_trades = $current_item.closest('li[data-level=0]').attr('data-cid') == '47'; // NOTE: 47 - идентификатор категории торгов
            var first_category = $current_item.closest('li[data-level=1]').attr('data-cid');
            var second_category =  $current_item.closest('li[data-level=2]').attr('data-cid') || 0;
            var category_url = '/catalog/'+category_id+':'+$current_item.attr('data-slug');
            $.getJSON(category_url+'/json', function(data){
                if ($.isArray(data.data)){
                    $('li.catalog_item__data').replaceWith($($('#need_access').html()));
                    push_state(category_url);
                    return;
                }
                var clients = data.data.clients,
                    lots = data.data.lots,
                    $ul_sell = $catalog_data.find('.catalog-companies_item-sell ul.catalog-companies-list'),
                    $ul_buy = $catalog_data.find('.catalog-companies_item-buy ul.catalog-companies-list'),
                    $a_full_amount = $catalog_data.find('a.catalog-full_amount'),
                    $a_sell = $catalog_data.find('.catalog-companies_item-sell a.catalog-companies_full'),
                    $a_buy = $catalog_data.find('.catalog-companies_item-buy a.catalog-companies_full');
                $catalog_data.find('h2.catalog_title').text($current_item.find('.catalog-fields-list_title:first .catalog-fields-list_name').text());
                if (is_trades){
                    $a_sell.attr('href', clients_url('sell', first_category, second_category)).html('Все ' + $a_sell.find('.catalog-amount').clone().text(clients.sell_count)[0].outerHTML + ' ' + plural(['продавец', 'продавца', 'продавцов'], clients.sell_count));
                    $a_buy.attr('href',clients_url('buy', first_category, second_category)).html('Все ' + $a_buy.find('.catalog-amount').clone().text(clients.buy_count)[0].outerHTML + ' ' + plural(['покупатель', 'покупателя', 'покупателей'], clients.buy_count));
                } else {
                    $a_sell.remove();
                    $a_buy.remove();
                }
                var sell_li = $ul_sell.find('li').eq(0).clone();
                var buy_li = $ul_buy.find('li').eq(0).clone();
                $ul_sell.find('li').remove();
                $ul_buy.find('li').remove();
                $.each(clients.sell || {}, function(cid){
                    $ul_sell.append(sell_li.clone().find('a').attr('href', '/clients/'+cid).text(this).closest('li'));
                });
                $.each(clients.buy || {}, function(cid){
                    $ul_buy.append(buy_li.clone().find('a').attr('href', '/clients/'+cid).text(this).closest('li'));
                });
                $catalog_data.find('.catalog-companies_item-sell ul.catalog-companies-list').replaceWith($ul_sell);
                $catalog_data.find('.catalog-companies_item-buy ul.catalog-companies-list').replaceWith($ul_buy);

                var $ul_lots = $catalog_data.find('ul.catalog-table');
                var lot_li = $ul_lots.find('li').eq(1).clone();
                $ul_lots.find('li').slice(1).remove();
                if (lots.lots_count) {
                    $.each(lots.lots || {}, function (lid) {
                        var _lot = lot_li.clone();
                        var n = this.start_price;
                        _lot.attr('data-href', '/trades/'+lid);
                        _lot.find('.table-auction_cell-value').text(lid);
                        _lot.find('.table-auction_cell-price').text(price_format(n) + ' руб.');
                        _lot.find('.table-auction_cell-economy').text(this.profit ? Math.round(this.profit) + '%' : '—');
                        if (!this.date_finish) {
                            _lot.find('.table-auction_cell-sign_date').replaceWith('<div class="table-auction_cell table-auction_cell__process"><div class="status-process">Идут торги</div></div>')
                        } else {
                            var fdate = this.date_finish.date, year = Date.create(fdate).format('{yyyy}', 'ru');
                            year = (year!=Date.create().format('{yyyy}', 'ru'))?' '+year:'';
                            _lot.find('.table-auction_cell-sign_date').text(Date.create(fdate).format('{dd} {month}', 'ru') + year);
                        }
                        $ul_lots.append(_lot);
                    });
                    $catalog_data.find('ul.catalog-table').replaceWith($ul_lots);
                    if (is_trades){
                        $a_full_amount.attr('href', '/trades?category='+first_category+'&filter_category='+second_category).html('Все ' + $a_full_amount.find('.catalog-amount').clone().text(lots.lots_count)[0].outerHTML + ' ' + plural(['лот', 'лота', 'лотов'], lots.lots_count));
                    } else {
                        $a_full_amount.remove();
                    }
                }else{
                    $ul_lots.remove();
                    $a_full_amount.remove();
                }
                $('li.catalog_item__data').html($catalog_data.html()).removeClass('layout__loading');
                push_state(category_url);
            }).fail(function(){
                $('li.catalog_item__data').removeClass('layout__loading');
                push_state(category_url);
            });
        }, 300);
    }

    $catalog.on('click', 'li.catalog-fields-list_item[data-cid] .catalog-fields-list_name', function(){
        $('li.catalog_item__data').addClass('layout__loading');
        get_info($(this).closest('li.catalog-fields-list_item'));
    });

});