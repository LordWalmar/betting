<?php
$title = "Контакты";
include("_header.php"); ?>
	<section class="l-section l-section__beige">
		<div class="l-restrictor l-restrictor__white">
			<div class="contact-adress">
				<h2 class="section_title">Контактная информация</h2>
				<div class="contact-adress_title">Адрес</div>
				<p class="contact-adress_location">2-й Южнопортовый проезд, д. 16, стр. 6, 115088, Москва, Россия</p>
			</div>
		</div>
		<div class="l-restrictor l-restrictor__wide l-restrictor__white">
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGKsq_9RC1u5E6tQKbZ2mbDjCOq8yPxPI&sensor=false"></script>
        <script type="text/javascript">
            function initialize() {
                // Create an array of styles.
                var styles = [
                    {
					    featureType: "road.arterial",
					    elementType: "geometry.stroke",
					    stylers: [
					      { hue: "#CBC49D" }
					     ]		
					  },{
					    featureType: "road.arterial",
					    elementType: "geometry.fill",
					    stylers: [
					      {color: "#FEEE9E"}
					    ]
					  },{
                       featureType: "landscape",
                        stylers: [
                          { hue: "#F7F2DB" },
                          { saturation: 40 }
					    ]
                    }
                ];

                // Create a new StyledMapType object, passing it the array of styles,
                // as well as the name to be displayed on the map type control.
                var styledMap = new google.maps.StyledMapType(styles,
                    {name: "Styled Map"});

                var latlng = new google.maps.LatLng(55.7036, 37.6936);
                // Create a map object, and include the MapTypeId to add
                // to the map type control.
                var mapOptions = {
                    zoom: 15,
                    center: latlng,
                    draggable: !window.wbtFallbacker.Touch,
                    disableDoubleClickZoom: false,
                    streetViewControl: false,
                    scrollWheel: false,
                    scrollwheel: false,
                    scaleControl: false,
                    panControl: false,
		    		navigationControl: false,
                    zoomControl: true,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.SMALL
                    },
                    mapTypeControl: false,
                    mapTypeControlOptions: {
                        mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                    }
                };
                var map = new google.maps.Map(document.getElementById('map-canvas'),
                    mapOptions);
                console.log(window.wbtFallbacker.SVG);
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: "static/img/contact-marker.png",
                    title: "2-й Южнопортовый проезд, д. 16, стр. 6"
			  });
                //Associate the styled map with the MapTypeId and set it to display.
                map.mapTypes.set('map_style', styledMap);
                map.setMapTypeId('map_style');
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <div class="contacts-map" id="map-canvas"></div></div>
		</div>
		<div class="l-restrictor contact-restrictor__departments l-restrictor__white">
			<h2 class="section_title">Отделы</h2>
			<div class="contact-center vcard">
				<h3 class="contact-center_title fn org">Центр поддержки</h3>
				<ul class="contact-support">
					<li class="contact-support_item contact-support_item__tel">
						<p class="tel">Телефон: <a href="tel:+74956681312">+7 (495) 668-1312</a></p>
						<p class="tel">Телефон по России: <a href="tel:88007070575">8-800-707-05-75</a></p>
						<p class="email">e-mail: <a class="stroytorgi_link" href="mailto:info@stroytorgi.ru">info@stroytorgi.ru</a></p>
						 
					<li class="contact-support_item contact-support_item__worktime">
						<p class="contact-worktime_title">Время работы: </p>
						<p class="workhours"><span>Пн-Чт: с 9:00 до 18:30,</p>
						<p>Пт: с 9:00 до 17:30 по московскому времени</span></p>
				</ul>
				<div class="adr">
					<span class="street-address">2-й Южнопортовый проезд, д. 16, стр. 6</span>
					<span class="postal-code">115088</span>
					<span class="locality">Москва</span>
					<span class="country-name">Россия</span>
				</div>
			</div>
			<ul class="contact-divisions">
				<li class="contact-divisions_item vcard">
					<h3 class="contact-divisions_title org fn">Отдел по работе с Клиентами</h3>
					<p class="contact-divisions_chief n"><span class="family-name">Шичанина</span> <span class="given-name">Татьяна</span></p>
					<p class="title">Руководитель отдела по работе с Клиентами</p>
					<p>&mdash;</p>
					<p class="tel">Раб.телефон: <a href="tel:+74956680671">+7 (495) 668-06-71</a> (доб.2004)</p>
					<p class="tel">Моб.телефон: <a href="tel:+79250053577">+7 (925) 005-35-77</a></p>
					<p class="email">e-mail: <a class="stroytorgi_link" href="mailto:shi@stroytorgi.ru">shi@stroytorgi.ru</a></p>
					 
					<div class="adr">
						<span class="street-address">2-й Южнопортовый проезд, д. 16, стр. 6</span>
						<span class="postal-code">115088</span>
						<span class="locality">Москва</span>
						<span class="country-name">Россия</span>
					</div>
				<li class="contact-divisions_item vcard">
					<h3 class="contact-divisions_title org fn">Отдел сервисного обслуживания</h3>
					<p class="contact-divisions_chief n"><span class="family-name">Суслова</span> <span class="given-name">Мария</span></p>
					<p class="title">Руководитель отдела сервисного обслуживания</p>
					<p>&mdash;</p>
					<p class="tel">Раб.телефон: <a href="tel:+74956680671">+7 (495) 668-06-71</a> (доб.2002)</p>
					<p class="tel">Моб.телефон: <a href="tel:+79260600418">+7 (926) 060-04-18</a></p>
					<p class="email">e-mail: <a class="stroytorgi_link" href="mailto:m.suslova@stroytorgi.ru">m.suslova@stroytorgi.ru</a></p>
					 
					<div class="adr">
						<span class="street-address">2-й Южнопортовый проезд, д. 16, стр. 6</span>
						<span class="postal-code">115088</span>
						<span class="locality">Москва</span>
						<span class="country-name">Россия</span>
					</div>
				<li class="contact-divisions_item contact-divisions_item__line vcard">
					<h3 class="contact-divisions_title org fn">Отдел продаж</h3>
					<p class="contact-divisions_chief n"><span class="family-name">Соломченко</span> <span class="given-name">Жанна</span></p>
					<p class="title">Руководитель отдела продаж</p>
					<p>&mdash;</p>
					<p class="tel">Раб.телефон: <a href="tel:+74956680671">+7 (495) 668-06-71</a> (доб.2001)</p>
					<p class="tel">Моб.телелефон: <a href="tel:+79260600276">+7 (926) 06-002-76</a></p>
					<p class="email">e-mail: <a class="stroytorgi_link" href="mailto:zs@stroytorgi.ru">zs@stroytorgi.ru</a></p>
					<div class="adr">
						<span class="street-address">2-й Южнопортовый проезд, д. 16, стр. 6</span>
						<span class="postal-code">115088</span>
						<span class="locality">Москва</span>
						<span class="country-name">Россия</span>
					</div>
				<li class="contact-divisions_item contact-divisions_item__line vcard">
					<h3 class="contact-divisions_title org fn">Коммерческий директор</h3>
					<p class="contact-divisions_chief n"><span class="given-name">Нестерович</span> <span class="family-name">Ирина</span></p>
					<p class="title"></p>
					<p>&mdash;</p>
					<p class="tel">Раб. телефон: <a href="tel:+74956680671">+7 (495) 668-06-71</a> (доб. 2003)</p>
					<p class="tel">Моб. телефон: <a href="tel:+79260116977">+7 (926) 011-69-77</a></p>
					<p class="email">e-mail: <a class="stroytorgi_link" href="mailto:i.nesterovich@stroytorgi.ru">i.nesterovich@stroytorgi.ru</a></p>
					<div class="adr">
						<span class="street-address">2-й Южнопортовый проезд, д. 16, стр. 6</span>
						<span class="postal-code">115088</span>
						<span class="locality">Москва</span>
						<span class="country-name">Россия</span>
					</div>
			</ul>
		</div>
	</section>
<?php include("_footer.php"); ?>