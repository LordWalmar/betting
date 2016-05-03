$(document).ready(function() {

    function new_legend_item(name, color){
        return '<li class="chart-legend_item"><span class="chart-legend_circle" style="background: '+color+'"></span><span class="chart-legend_text">'+name+'</span></li>';
    }

    function update_chart_bar(){
        var $chart_bar = $('.chart-canvas__bar');
        if (!$chart_bar.length)return;
        var group = $chart_bar.closest('.statistics-barChart').find('input[type=radio]:checked').val(),
            range = $chart_bar.closest('.statistics-barChart').find('select.input-select').val();
        var params = {"data_range": group, "date_range": range};
        $.post('http://master-promo.test.stroytorgi.ru/statistics/chart/histogram_by_sum/data.json', params, function(data){
           var chart_data = [];
           $.each(data.data, function(){
               chart_data.push({"name": this.name, "total": this.start_sum, "economy": this.end_sum});
           });
           $chart_bar.find('svg').remove();
           initChartBar({"dataObj": chart_data});
        }, 'json');
    }

    function update_chart_donut(){
        var $chart_bar = $('.chart-canvas__donut');
        if (!$chart_bar.length)return;
        var $container = $chart_bar.closest('.home-indicators_item');
        if (!$container.length)$container = $chart_bar.closest('ul');
        var $legend = $container.find('.chart-legend .home-indicators-legend_content');
        if (!$legend.length) $legend = $container.find('.chart-legend');
        $legend.empty();
        var range = $chart_bar.closest('.statistics-donutChart').find('select.input-select').val();
        var params = {"date_range": range};
        $.post('http://master-promo.test.stroytorgi.ru/statistics/chart/histogram_by_category/data.json', params, function(data){
           var chart_data = [];
           $.each(data.data, function(cid){
               chart_data.push({"name": this.name, "color": this.color, "end_sum": this.end_sum});
               var item = new_legend_item(this.name, this.color);
               if (parseInt(cid)){$legend.prepend(item);} else {$legend.append(item);}
           });
           $chart_bar.find('svg').remove();
           initDonutChart({"dataObj": chart_data});
        }, 'json');
    }

    $('.statistics-barChart input[type=radio], .statistics-barChart select.input-select').on("change", function() {
        update_chart_bar();
    });
    update_chart_bar();

    $('.statistics-donutChart select.input-select').on("change", function() {
        update_chart_donut();
    });
    update_chart_donut();

    var bubble_chart_cls = '.chart-type_bubble';

    function update_chart_bubble(){
        function get_random_color(){
            return 'rgb('
            + (Math.floor(Math.random() * 256)) + ','
            + (Math.floor(Math.random() * 256)) + ','
            + (Math.floor(Math.random() * 256)) + ')';
        }
        var $chart_bar = $('.chart-canvas__bubble');
        if (!$chart_bar.length)return;
        var $container = $chart_bar.closest('.home-indicators_item');
        var is_index_page = Boolean($container.length);
        if (!is_index_page)$container = $chart_bar.closest('ul');
        var $legend = $container.find('.chart-legend').empty();
        var $groups = $chart_bar.closest(bubble_chart_cls).find('input[type=radio]');
        var $current_group = is_index_page?$groups.eq(Math.random()*($groups.length)^0):$groups.filter(':checked');
        var params = {"data_range": $current_group.val()};
        $.post('http://master-promo.test.stroytorgi.ru/statistics/chart/chart_price_dynamic/data.json', params, function(data){
           var dates = {};
           var colors = ["#9A9B9E", "#B3BAC2", "#FF585C", "#C6A67A", "#535154"];
           var chart_data = [];
           $.each(Date.range(Date.create().rewind({years: 2}), Date.create().rewind({months: 1})).every('month').slice(-12), function(){
               dates[this.format('{yyyy}-{MM}')] = 1;
           });
           var i = 0;
           $.each(data.data, function(){
               i++;
               var item = this;
               var values = [];
               var color = colors[i]?colors[i]:get_random_color();
               $.each(dates, function(y_M){
                    var v = item.data[y_M];
                    values.push(v?parseFloat(v):null);
               });
               chart_data.push({"name": this.name, "color": color, "data": values});
               $legend.append(new_legend_item(this.name, color));
           });
           $chart_bar.find('svg').remove();
           var fdates = [];
            $.each(Object.keys(dates).sort(), function(){
                fdates.push(Date.create(""+this).format('{Month} {yyyy}', 'ru'))
            });
           initBubbleChart({"date": fdates, "dataObj": chart_data, "unit": $current_group.attr('data-unit')});
        }, 'json');
    }

    $(bubble_chart_cls).on("change", 'input[type=radio]', function() {
        update_chart_bubble();
    });
    
    $.getJSON('http://master-promo.test.stroytorgi.ru/statistics/chart/chart_price_dynamic/group_list.json', function(data){
        var $groups = $(bubble_chart_cls +' ul.switch').empty();
        $.each(data.data, function(cid){
           $groups.append('<li class="switch_item"><label class="switch_element">'+this.name+'<input type="radio" value="'+cid+'" name="switch_type" data-unit="'+this.unit+'" /></label>')
        });
        $groups.find('li:first input').prop('checked', true).change().closest('li').addClass('switch_item__active').siblings().removeClass('switch_item__active');
    });
});