(($) -> 

	wbtSlider = ($el, params) ->
		
		this.$items = params.items
	


		this.defaults = 
			"nav":false
			"dots":true
			"ranges":false
			"ordered":false
			"share":false
			"showBy":1
			"changeBy":1
			"beforeChange":()->
			"afterChange": ()->
		

		this.cfg = $.extend({}, this.defaults, params)
		
		this.items = params.items
		this.sliderClass = $el.attr("class")
		this.$slider = $el
		this.$slider.addClass("wbt-slider_list")
		this.$wrap = this.$slider.wrap('<div class="wbt-slider_wrap"></div>').parent()
		for i in [0...this.items.length]
			$('<li class="wbt-slider wbt-slider_'+i+'"></li>').appendTo(this.$slider)
			$(".wbt-slider_" + i).css "background-image", "url(\"" + @items[i]["src"] + "\")"
		$(".wbt-slider").eq(0).clone().appendTo ".wbt-slider_list"
		@changeText(0)

		this.sliderLength = params.items.length

		if this.cfg.nav
			this.$nav = $('<div class="wbt-slider_nav"><a href="#" class="wbt-slider_nav__prev" data-dir="prev"></a><a href="#" class="wbt-slider_nav__next" data-dir="next"></a></div>').appendTo(this.$wrap)
	
		if this.cfg.share
			this.$share = $('<div class="wbt-slider_icons"><a href="#" class="wbt-slider_icons__pintrest" data-media="pin"></a><a href="#" class="wbt-slider_icons__tumblr" data-media="tbl"></a></div>').appendTo(this.$wrap)
			this.$share.hide()

		if this.cfg.ranges
			this.cfg.$ranges = $('<div class="wbt-slider_ranges"><span class="wbt-slider_ranges__prev"></span><span>/<span><span class="wbt-slider_ranges__next"></span></div>').appendTo(this.$wrap)
			this.cfg.rangesPrev = this.cfg.$ranges.children().eq(0)
			this.cfg.rangesNext = this.cfg.$ranges.children().eq(2)

		if this.cfg.ordered
			this.cfg.$ordered = $('<div class="wbt-slider_ordered"><span class="wbt-slider_ordered__current"></span><span>/</span><span class="wbt-slider_ordered__length"></span></div>').appendTo(this.$wrap)
			this.cfg.$orderedCurrent = this.cfg.$ordered.children().eq(0)
			this.cfg.$orderedLength = this.cfg.$ordered.children().eq(2)

		if this.cfg.dots
			temp = ""
			for i in [0...this.sliderLength]
				tt = this.$slider.children().eq(i).data("title")
				temp += '<li><div class="wbt-slidet_number">0'+(i)+'</div><div class="wbt-slider_background-line"><a href="#">' + (if tt then tt else '') + '</a></div></li>'
			this.$dots = $('<ul class="wbt-slider_dots">' +temp+ '</ul>').appendTo($('.home-promo_text'))

		this.itemsWidth = 0
		this.itemsVisible = 0 
		this.currentIndex = 0
		@loadedLine()
		this.events.click.call this

		self = this
		interval = 0

		setTimeout -> 
			self.initSlider()
			return
		,60

		$(window).on("resize", () ->
			clearInterval interval
			interval = setTimeout -> 
				self.initSlider()
				return
			,100
			return
		)
		return

	wbtSlider::changeText = (item) ->
		if item == 0
			$('.home-promo_info').addClass('home-promo_info__banner')
		else
			$('.home-promo_info').removeClass('home-promo_info__banner')
		blockWarranty = $('.home-promo_warranty')
		blockTitle = $('.home-promo_title')
		blockResponsibility = $('.home-promo_responsibility')
		blockFooter = $('.home-promo_footer')
		blockText = $('.home-promo_text')

		blockTitle.fadeOut(200)
		blockResponsibility.fadeOut(200)
		blockWarranty.fadeOut(200)
		blockFooter.fadeOut(200)
		self = this
		setTimeout (->
			blockWarranty.text self.items[item]["header"]
			blockTitle.text self.items[item]["title"]
			blockResponsibility.text self.items[item]["text"]
			blockFooter.text self.items[item]["conclusion"]
			blockText.data('href', self.items[item]["href"]) 
			return
			), 200
		blockWarranty.fadeIn(200)
		blockTitle.fadeIn(200)
		blockResponsibility.fadeIn(200)
		blockFooter.fadeIn(200)

	wbtSlider::loadedLine = ->
	  if @currentIndex is 0
	    $(".wbt-slider_dots li a").map ->
	      $(this).css "width", "0px"
	      $(this).closest('.wbt-slider_background-line').css "background", "#BB0D36"
	      return

	  $(".wbt-slider_dots li a").map ->
	    $(this).removeClass "wbt-slider_dots__active"
	    return

	  $(".wbt-slider_dots li a").eq(@currentIndex).addClass "wbt-slider_dots__active"
	  i = 0
	  while i <= @currentIndex
	    if i != @currentIndex
	      $(".wbt-slider_dots li a").eq(i).closest('.wbt-slider_background-line').css "background", "none"
	    $(".wbt-slider_dots li a").eq(i).css "width", "100%"
	    i++
	  return

	wbtSlider.prototype.changeIndex = (direction) ->
		newIndex = this.currentIndex
		maxIndex = if this.cfg.changeBy == 1 then this.sliderLength - this.itemsVisible else this.sliderLength - this.sliderLength % this.itemsVisible
		
		if direction == parseInt direction, 10
			newIndex = direction
		else
			newIndex += if direction == "next" then (if this.cfg.changeBy == 1 then 1 else this.itemsVisible) else (if direction == "prev" then -(if this.cfg.changeBy == 1 then 1 else this.itemsVisible) else 0)

		if newIndex<0
			newIndex = maxIndex

		this.cfg.beforeChange()
		this.currentIndex = newIndex
		
		@$slider.animate
		    left: -(@itemsWidth * (newIndex))
		  , 300
		if newIndex >= @sliderLength
		  setTimeout (->
		    $(".wbt-slider_list").css left: "0px"
		    return
		  ), 500
		  @currentIndex = 0
		newIndex = maxIndex  if newIndex >= maxIndex 
		@changeText(this.currentIndex)
		if @clickCount != 0
			@loadedLine()
		this.cfg.afterChange()

	wbtSlider.prototype.calculateRanges = (index) ->
		return "" if index < 0 || index >= this.sliderLength

		lower = index + 1
		upper = if (index + this.itemsVisible) > this.sliderLength then this.sliderLength else index + this.itemsVisible
		return lower if lower == upper
		return lower + "-" + upper

	wbtSlider.prototype.updateRanges = () ->
		if this.cfg.ranges
			changeBy = if this.cfg.changeBy == 1 then 1 else this.itemsVisible
			this.cfg.$rangesPrev.text(this.calculateRanges(this.currentIndex - changeBy))
			this.cfg.$rangesNext.text(this.calculateRanges(this.currentIndex + changeBy))
		return

	wbtSlider.prototype.updateOrdered = () ->
		if this.cfg.ordered 
			this.cfg.$orderedCurrent.text this.currentIndex + 1
			this.cfg.$orderedLength.text this.sliderLength
		return

	wbtSlider.prototype.updatePositions = () -> 
		window.sliderHeight =  $('.'+this.sliderClass+' li:nth-child(' + (this.currentIndex + 1) + ')  img').height()
		this.$wrap.find('.wbt-slider_nav__prev, .wbt-slider_nav__next').css 
			'min-height' : sliderHeight
			'top' : '1px'
		this.$wrap.find('.wbt-slider_icons').css 'top':sliderHeight
		this.$wrap.find('.wbt-slider_ordered').css 'top':sliderHeight
		return

	wbtSlider.prototype.initSlider = () ->
		this.itemsWidth = Math.floor(this.$wrap.width() / this.cfg.showBy)
		this.$slider.children().css 'width' : this.itemsWidth
		this.itemsVisible = Math.floor(this.$wrap.width() / this.itemsWidth)

		this.updateRanges() if this.cfg.ranges
		this.updateOrdered() if this.cfg.ordered

		if this.cfg.nav 
			if (this.sliderLength <= this.itemsVisible)
				this.$nav.hide()
			else
				this.$nav.show()
				this.updatePositions()
		return

	wbtSlider.prototype.linkToSocial = (mediaName) -> 
		slideUrl = window.location
		
		if this.items[this.currentIndex]["href"] == ""
			currentImg = $('.'+this.sliderClass+' li:nth-child(' + (this.currentIndex + 1) + ') > span > img').attr("src")
		else
			currentImg = $('.'+this.sliderClass+' li:nth-child(' + (this.currentIndex + 1) + ') > a > img').attr("src")
		currentDescribe = $('.'+this.sliderClass+' li:nth-child(' + (this.currentIndex + 1) + ') > div > p > strong').text()
		
		slideUrlEncoded = encodeURIComponent slideUrl
		socialMediaEncoded = encodeURIComponent(slideUrl + currentImg)
		socialDescriptionText = currentDescribe
		socialDescriptionEncodedText = encodeURIComponent socialDescriptionText

		switch mediaName
			when "pin"
				
				pinterestLink = 'http://www.pinterest.com/pin/create/button/?url='+slideUrlEncoded+'&media='+socialMediaEncoded+'&description='+socialDescriptionText
				window.open pinterestLink
				break
			when "tbl"
				tumblrLink = 'http://www.tumblr.com/share/photo?source='+socialMediaEncoded+'&caption='+socialDescriptionEncodedText+'&clickthru='+slideUrlEncoded
				window.open tumblrLink
				break
		return

	wbtSlider.prototype.events = {
		click: () ->
			timeoutId = undefined
			self = this
			timerOn = ->
			  timeoutId = setInterval(->
			    self.changeIndex "next"
			    return
			  , 9000)
			  return
			timerOff = ->
			  clearInterval timeoutId
			  return
			slideStart = ->
				if (self.clickCount == 0)
					timerOn()
					self.loadedLine()
					self.clickCount = 1
			timerOn()
			slideStop = ($this) -> 
				self.clickCount = 0
				timerOff()
				$(".wbt-slider_dots li a").map (e) ->
				  $(this).removeClass "wbt-slider_dots__active"
				  $(this).css "width", "0"
				  $(this).closest('.wbt-slider_background-line').css "background", "#BB0D36"
				  return
				currentButton = this.currentIndex
				if($this)
					currentButton = $($this).index()
				i = 0
				while i < currentButton
				  if i != @currentIndex
      				$(".wbt-slider_dots li a").eq(i).closest('.wbt-slider_background-line').css "background", "none"
				  $(".wbt-slider_dots li a").eq(i).css "width", "100%"
				  i++
				self.changeIndex currentButton

			# Stop and Start slider according scroll
			scrollAccess = false
			$(window).scroll ->
				heightCurrent = $(this).scrollTop() 
				heightSlider = $('.home-section__auction').offset().top
				if (heightCurrent >= heightSlider)
					if (scrollAccess==false)
 						scrollAccess = true
 						slideStop()
				else 
					if (scrollAccess)
						scrollAccess = false
						slideStart()
			if this.cfg.nav
				this.$nav.on "click", "a", (e) ->
					e.preventDefault()
					self.changeIndex($(this).data("dir"))
					self.updateRanges() if self.cfg.ranges
					self.updateOrdered() if self.cfg.ordered
					self.updatePositions()
					return

			if this.cfg.dots
				this.$dots.on "click", "li", (e) ->
					e.preventDefault()
					slideStop(this)
					$('.home-section__promo').mouseleave () -> 
						slideStart()
					$('body').on "click", (e) ->
						if $(e.target).closest(".home-section__promo").length 
							return
						slideStart()



			if this.cfg.share
				this.$wrap.find('.wbt-slider_list li img, .wbt-slider_icons').mouseover () -> 
					
					self.$wrap.find('.wbt-slider_icons').show()
					return
				.mouseout () ->
					self.$wrap.find('.wbt-slider_icons').hide()
					return

				$('.wbt-slider_icons a').click (e) ->
					e.preventDefault()
					mName = $(this).data "media"
					self.linkToSocial mName
					return

			return
	}

	$.fn.wbtSlider = (params) -> 
		new wbtSlider this, params



	return
) jQuery