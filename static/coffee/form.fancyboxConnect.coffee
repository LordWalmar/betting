$ ->
  add_needScript_request = ->
    $form_request = $("#form_request")
    $type = $form_request.find("select[name=type]")
    $category = $form_request.find("select[name=category_id]")
    $.getJSON "http://master-promo.test.stroytorgi.ru/faq/type_list.json", (data) ->
      $.each data.data, (tid) ->
        $type.append "<option value=\"" + tid + "\">" + this + "</option>"
      $type.wbtFormStyler()

    $.getJSON "http://master-promo.test.stroytorgi.ru/faq/category_list.json", (data) ->
      $.each data.data, (cid) ->
        $category.append "<option value=\"#{cid}\" data-slug=\"#{this.transliteration}\">#{this.name}</option>"
      $category.wbtFormStyler()

  add_needScript_question = () ->
    $form_question = $("#form_question")
    $type = $form_question.find("select[name=type]")
    $.getJSON "http://master-promo.test.stroytorgi.ru/faq/type_list.json", (data) ->
      $.each data.data, (tid) ->
        $type.append "<option value=\"#{tid}\">#{this}</option>"
      $type.wbtFormStyler()

  # fancybox for presentation

  $(".new_presentation").fancybox
    margin: 0
    wrapCSS: "form_background"
    padding: 0
    width: "100%"
    height: "inherit"
    autoHeight: true
    closeBtn: false
    autoSize: false
    fitToView: false
    ajax:
      complete: (jqXHR, textStatus) ->
        wbtFallbackerRun()

  # fancybox for seminar

  $("#new_seminar").fancybox
    margin: 0
    wrapCSS: "form_background"
    padding: 0
    width: "100%"
    height: "inherit"
    autoHeight: true
    closeBtn: false
    autoSize: false
    fitToView: false
    ajax:
      complete: (jqXHR, textStatus) ->
        wbtFallbackerRun()

  # fancybox for question

  $("#new_question").fancybox
    margin: 0
    wrapCSS: "form_background"
    padding: 0
    width: "100%"
    height: "inherit"
    autoHeight: true
    closeBtn: false
    autoSize: false
    fitToView: false
    ajax:
      complete: (jqXHR, textStatus) ->
        wbtFallbackerRun()
        add_needScript_question()

  # fancybox for request helpdesk

  $("#new_request").fancybox
    margin: 0
    wrapCSS: "form_background"
    padding: 0
    width: "100%"
    height: "inherit"
    autoHeight: true
    closeBtn: false
    autoSize: false
    fitToView: false
    ajax:
      complete: (jqXHR, textStatus) ->
        wbtFallbackerRun()
        add_needScript_request()

  # fancybox for request helpdesk

  $("#header_signin").fancybox
    margin: 0
    wrapCSS: "form_background"
    padding: 0
    width: "100%"
    height: "inherit"
    autoHeight: true
    closeBtn: false
    autoSize: false
    fitToView: false
    ajax:
      complete: (jqXHR, textStatus) ->
        wbtFallbackerRun()
        add_needScript_request()
        return
