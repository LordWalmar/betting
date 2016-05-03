$ ->
  # PNG fallback for SVG
  wbtFallbackerRun()

  #new year fancybox
  newYearBlock = $('.newyear-fancybox')
  if newYearBlock.length
    $(document).ready ->
      newYearBlock.fancybox
        wrapCSS: "newyear-fancybox-wrap"
      .trigger "click"

  # Relocation page
  $thnx_registr = $(".form-section_thnx")
  $('body').on "click", ".form-section_thnx", (e)->
    if (!$(e.target).closest('.form_logo').length and !$(e.target).closest('.form_wrapper').length)
      window.location = "/"

  # Delete shadow in header on home page
  $homeSlider = $(".home-section__promo")
  if $homeSlider.length
    $(".l-header").css("box-shadow","none").css("border-bottom","none")
    # Init Slider

    $(".home-promo_slider").wbtSlider({
      items: [
        {
          src:"static/img/conference_1.jpg",
          header:"",
          title:"",
          text:"",
          conclusion:"",
          href:"about_service.php#0"
        }, {
          src:"static/img/ph_st1.jpg",
          header:"Почему СТРОЙТОРГИ?",
          title:"Мы первая специализированная",
          text:"электронная торговая площадка для компаний строительной индустрии на всей территории России.",
          conclusion:"/ Поэтому СТРОЙТОРГИ /",
          href:"about_service.php#0"
        }, {
          src:"static/img/ph_st2.jpg",
          header:"Интеграция с 1С",
          title:"Сумма сделки по итогам торгов совпадает",
          text:"с суммой, прошедшей через вашу учетную систему 1С.",
          conclusion:"/ Поэтому ДОВЕРИЕ /",
          href:"about_service.php#1"
        }, {
          src:"static/img/ph_st3.jpg",
          header:"Гарантия сделки",
          title:"Торги прошли —  сделка будет",
          text:"Протокол итогов торгов имеет силу контракта.",
          conclusion:"/ Поэтому ГАРАНТИРУЕМ /",
          href:"about_service.php#2"
        }, {
          src:"static/img/ph_st4.jpg",
          header:"Справедливое ценообразование",
          title:"Платит только тот, кто победил в торгах",
          text:"Абонентской платы, депозитов и других комиссий нет!",
          conclusion:"/ Поэтому ПРОЗРАЧНОСТЬ /",
          href:"about_service.php#3"
        }, {
          src:"static/img/ph_st5.jpg",
          header:"Аналитика",
          title:"Мы первые, кто дает статистику реальной стоимости",
          text:"товаров и услуг в строительной отрасли.",
          conclusion:"/ Поэтому ЭКСПЕРТНОСТЬ /",
          href:"about_service.php#4"
        }, {
          src:"static/img/photo_slider.png",
          header:"Цивилизованный рынок",
          title:"Сделка – это не всё!",
          text:"Узнайте больше…",
          conclusion:"/ Поэтому БУДУЩЕЕ /",
          href:"about_service.php#5"
        }]
    });
    
    $(window).on "resize", ->
      leftTextBlock = $('.home-promo_info').offset().left
      marginSlider = if (leftTextBlock > 364) then 0 else ( 364 - leftTextBlock )
      $('li.wbt-slider').css('background-position-x', - marginSlider + 'px')
      $('li.wbt-slider').eq(0).css('background-position', 'center').css('background-size', 'contain')
      $('li.wbt-slider').eq(7).css('background-position', 'center').css('background-size', 'contain')


    $('.home-promo_text').on "click", (e)->
      if !$(e.target).closest('.wbt-slider_dots').length
        window.location = $(this).data('href')

    $('.wbt-slider_dots li').first().css('display', 'none');

    $('.home-auction-search_title').on 'click', (ev)->
      ev.preventDefault()
      filterSection = $(this).closest('.home-auction-search')
      if filterSection.hasClass('home-auction-search__active')
        filterSection.removeClass('home-auction-search__active')
        filterSection.find('.home-auction-search_filter').css('overflow', 'hidden')
      else
        filterSection.addClass('home-auction-search__active')
        setTimeout( ()->
          filterSection.find('.home-auction-search_filter').css('overflow', 'visible')
        , 300)

    $('.home-reviews_swith').on 'click', (ev)->
      ev.preventDefault()
      content = $('.home-reviews_content')
      textValue = if content.hasClass('home-reviews_content__active') then "Читать дальше" else "Скрыть"
      $('.home-reviews_swith').text(textValue)
      content.toggleClass('home-reviews_content__active')
    ###
    $('.input-select[name="filter_category"]').on 'change', ()->
      pointValue = $(this).find('option:selected').val()
      select = $('.filter-category__additional')
      console.log pointValue
      console.log +pointValue == 0
      if +pointValue == 0
        select.addClass('filter-category__home')
        select.val('Yeap!')
      else
        select.removeClass('filter-category__home')
    ###

  # SubmitHandler
  submitButton_styled = ($form, disable) ->
    $submit_btn = $form.find('button[type=submit], input[type=submit]')
    color = if $submit_btn.attr('data-color') then $submit_btn.attr('data-color') else (if $submit_btn.hasClass('btn-submit__red') then 'red'  else 'grey')
    $submit_btn.attr('data-color', color)
    $submit_btn.toggleClass "btn-submit__#{color}", !disable
    $submit_btn.toggleClass "btn-loading", disable
    $submit_btn.toggleClass "btn-loading__#{color}", disable
    $submit_btn.prop('disabled', disable)

  # Calendar Init

  $('.filter-calendar-cell_date').datepick({dateFormat: 'dd.mm.yyyy',
  showAnim: '',
  minDate: new Date(2012, 8 - 1, 1),
  maxDate: +30,
  showTrigger: '#calImg'});
  $(window).on "resize", ->
    $('.filter-calendar-cell_date').datepick('hide')
    $('.filter-calendar-cell_date').blur()

  # Formstyler for select
  $(".input-checkbox, .input-radio, .input-range, .input-select").wbtFormStyler();

  # Open tag
  $tagCategory = $(".category")
  if $tagCategory.length
    $(".category").on "click", (e) ->
      e.stopPropagation()

  # Redirect from auction to lot page

  $("#table_auction").on 'click', '.table-auction_row[data-href]', ->
    window.location = $(this).data('href')

  # Handler in feedback-participate

  $feedbackParticipate = $(".feedback-participate")
  if $feedbackParticipate.length
    $('.feedback-participate_item').eq(0).addClass 'feedback-participate_item__active'
    $('.feedback-participate_item').hover ->
      $('.feedback-participate_item').removeClass 'feedback-participate_item__active'
      $(this).addClass 'feedback-participate_item__active'

  # Select for menu in sign in
  $('body').on "click", ".signin-menu_item", (e) ->
    $(this).addClass('signin-menu_item__active').siblings().removeClass('signin-menu_item__active')
    $('.signin-tab_'+  $(this).data('name')).addClass('signin-tab__active').siblings().removeClass('signin-tab__active')

  $('body').on "click", ".signin_forgotLogin", (e) ->
    e.preventDefault()
    $('.signin-menu_item').removeClass('signin-menu_item__active')
    $('.signin-tab_nopassword').addClass('signin-tab__active').siblings().removeClass('signin-tab__active')


  # Header view icon for menu
  showMenuIcon = ->
    activeBlock = $('.header-company')
    if ($('.header-menu-icon').css('display') == 'inline-block')
      activeBlock.addClass('header-company__mobile')
    else 
      activeBlock.removeClass('header-company__mobile')
  $(window).on("resize", ->
    showMenuIcon()
  ).trigger "resize"

  # Open menu in header

  $(".header-menu-icon").on "click", (e) ->
    e.preventDefault()
    $(this).closest(".header-company").toggleClass "header-company__active"
    return

  # Open field on catalog page

  $catalogList = $(".catalog-fields")
  if $catalogList.length
    $catalogList.on "click", ".catalog-fields_title",  ->
      $(this).closest(".catalog-fields_item").toggleClass("catalog-fields_item__active").children(".catalog-fields-list").slideToggle(200)

    $catalogList.on "click", ".catalog-fields-list_status",  ->
      $(this).closest(".catalog-fields-list_item").toggleClass("catalog-fields-list_item__active").children(".catalog-fields-list").slideToggle(200)

    body = $("body")
    catalogMobWidth = 857

    $(window).on "resize", ()->
      bodyWidth = body.width()
      if bodyWidth < catalogMobWidth
        $('.catalog_item__data').css(
          marginTop: 20 + "px"
        )

    $(window).on "scroll", ()->
      bodyWidth = body.width()
      if bodyWidth > catalogMobWidth
        scrollAnchor = $('.catalog-anchor').offset().top - 325
        catLastItem = $('.catalog_item__fields').height()
        scrollAnchor = 0 if scrollAnchor < 0 
        scrollAnchor = catLastItem if scrollAnchor > catLastItem   
        
        $('.catalog_item__data').css(
          marginTop: scrollAnchor + 'px'
        )

    $catalogList.on "click", ".catalog-fields-list_name",  ->

      # Scroll top when goin on loading
      
      $(".catalog-fields-list_name").removeClass('catalog-fields-list_name__active')
      $(".catalog-fields-list_status").removeClass('catalog-fields-list_status__active')
      $(this).addClass('catalog-fields-list_name__active').prevAll( '.catalog-fields-list_status:first' ).addClass('catalog-fields-list_status__active')

      bodyWidth = body.width()
      if bodyWidth > catalogMobWidth
        currentMargin = $(this).offset().top - 325 
        scrollTopMargin = $(this).offset().top - 20 
        $('.catalog_item__data').css(
          marginTop: currentMargin + 'px'
        )
        $('body, html').animate({scrollTop: scrollTopMargin + 'px'})

      else 
        console.log "mob catalog"
        $('.catalog_item__data').css(
          marginTop: 20 + "px"
        )
        dataPosition = $('.catalog_item__data').offset().top - 20
        body.animate({scrollTop: dataPosition + 'px'})

  # Switch categories in filter

  $("body").on "click", ".switch_element", ->
    $(this).closest(".switch_item").addClass('switch_item__active').siblings().removeClass('switch_item__active')

  #Visible password in sign-in
  $("body").on "click", ".signin-password_visible", (e) ->
    e.preventDefault()
    if $(this).hasClass 'signin-password_visible__active'
      $oldPassword = $(this).closest('.signin-password').find('input')
      $newPassword = $("<input class='input-text' type='password' />").val($oldPassword.val()).attr('name', $oldPassword.attr('name')).prependTo($oldPassword.parent())
      $oldPassword.remove()
    else
      $oldPassword = $(this).closest('.signin-password').find('input')
      $newPassword = $("<input class='input-text' type='text' />").val($oldPassword.val()).attr('name', $oldPassword.attr('name')).prependTo($oldPassword.parent())
      $oldPassword.remove()
    $(this).toggleClass('signin-password_visible__active')

  $('body').on "submit", "form", (e) ->
    if $(@).attr('data-process') == '1'
      $(@).attr('data-process', '0')
      return false
    $submit_btn = $(this).find('button[type=submit], input[type=submit]')
    if $submit_btn.hasClass('btn-loading')
      return false
    if $(this).hasClass('form_invalid')
      return false
    if !($submit_btn.hasClass 'filter-search_button')
      submitButton_styled($(this), true)

  # Open law content in footer

  $(".footer-siteinfo_law").on "click", (e) ->
    e.preventDefault()
    $(this).closest(".footer-siteinfo_item").toggleClass "footer-siteinfo_item__active"
    return

  $readMore = $(".reviews_readmore")
  if $readMore.length
    $readMore.fancybox
      wrapCSS: "rewiews_license"
      margin: 0
      padding: 0
      closeBtn: true
      autoSize: false
      fitToView: false
      afterLoad: 
        (current) ->
          $(window).on 'resize', ->
            naturalWidthImg = current.width
            naturalHeightImg = current.height
            widthNow = Number($(window).width())
            currentWidth = (if (widthNow > 630) then 630 else widthNow)
            k = currentWidth / naturalWidthImg
            currentHeightImg = k* naturalHeightImg
            $('.rewiews_license .fancybox-inner').css('max-height', currentHeightImg)
          $(window).resize()
          return

  $companyReadMore = $(".company-read_link")
  if $companyReadMore.length
    $companyReadMore.fancybox
      wrapCSS: "reviews-fancybox_wrapper"
      margin: 0
      padding: 0
      width:90 + '%'
      height:100 + '%'  
      closeBtn: false
      autoSize: false
      fitToView: false

  # Close company modal window

  $('body').on "click", ".window-modal_close", (e) ->
    e.preventDefault()
    $.fancybox.close(true)

  $('body').on "click", ".form_background", (e) ->
    if $(e.target).hasClass('form-section')
      $.fancybox.close(true)

  # Calendar Replace in DOM on mobile size
  (replaceCalendar = ->
    if $(this).width() < 854
      $('.filter-companies_calendar').insertAfter $('.filter-search')
    else 
      $('.filter-companies_calendar').insertBefore $('.filter-search')
    )()

  $(window).on "resize", ->
    replaceCalendar()
