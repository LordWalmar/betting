$ ->
  # SubmitHandler
  submitButton_styled = ($form, disable) ->
    $submit_btn = $form.find('button[type=submit], input[type=submit]')
    color = if $submit_btn.attr('data-color') then $submit_btn.attr('data-color') else (if $submit_btn.hasClass('btn-submit__red') then 'red'  else 'grey')
    $submit_btn.attr('data-color', color)
    $submit_btn.toggleClass "btn-submit__#{color}", !disable
    $submit_btn.toggleClass "btn-loading", disable
    $submit_btn.toggleClass "btn-loading__#{color}", disable
    $submit_btn.prop('disabled', disable)

  #Methods#

  $.validator.addMethod "is_phone", ((value, element, param) ->
    phone = value.match(/^\+?(\d|-|\(|\)|\s|\.)+$/g)
    this.optional(element) || phone
  ), "Пожалуйста, вводите только цифры и символы (, ), -, +."

  $.validator.addMethod "is_email", ((value, element, param) ->
    email = value.match(/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/)
    this.optional(element) || email
  ), "Введите корректный Email."

  $.validator.addMethod "is_name", ((value, element, param) ->
    name = value.match(/^[а-яёa-z ]+$/gi)
    this.optional(element) || name
  ), "Ф.И.О. не должно содержать цифры."

  $.validator.addMethod "is_author", ((value, element, param) ->
    author = value.match(/^[а-яёa-z ]+$/gi)
    this.optional(element) || author
  ), "Ф.И.О. не должно содержать цифры."

  ###
  $.validator.addMethod "is_validateLength", ((value, element, param) ->
    word_length = value.length
    $this = $(element)
    definitionMaxLength =  ->
      $radioBtn = $('.wbt-input-radio__active').find('input')
      $numberFace = $radioBtn.val()
      if +$numberFace == 0
        $this.attr('maxlength', '10')
        return 10
      else
        $this.attr('maxlength', '12')
        return 12
    this.optional(element) || word_length <= definitionMaxLength()
    ), "Максимальное количество символов " + $('.input-text[name="inn"]').attr('maxlength') + "."
  
  ###

  $('input[name="individ"]').on 'change', ->
    $radioBtn = $('.wbt-input-radio__active').find('input')
    $numberFace = $radioBtn.val()
    $inputCurrent = $('input[name="inn"]')
    if +$numberFace == 0
      countSigns = 10
    else
      countSigns = 12
    $inputCurrent.rules( "remove", "maxlength" )
    $inputCurrent.rules( "add", {
      maxlength: countSigns,
      messages: {
        maxlength: "Максимальное количество символов " + countSigns + "."
      }
    })

  $.validator.addMethod "is_number", ((value, element, param) ->
    phone = value.match(/^(\d)+$/g)
    this.optional(element) || phone
  ), "Пожалуйста, вводите только цифры."

  $.validator.setDefaults({errorClass: 'stroytorgi-error'})

  formPointNone = ($elem, radioChoise)->
    $elem.rules("remove", "required")
    $elem.rules("add", { required: radioChoise})
    if radioChoise
      $elem.closest('label').css('width','100%').slideDown('fast')
    else
      $elem.closest('label').css('width','100%').slideUp('fast')

  $wbtRadioBtn = $('.registration-info_choise').find('input[type="radio"]')
  $currentForm = $wbtRadioBtn.closest('form')
  $wbtRadioBtn.on "click",  ->
    $kpp = $('input[name="kpp"]')
    $org_type = $('select[name="org_type"]')
    radioChoise = $(this).val() != '1'
    formPointNone($kpp, radioChoise)
    formPointNone($org_type, radioChoise)

  handlerInvalid = (form, validator) ->
    $(this).addClass('form_invalid')
    btn = $(this).find ".btn-submit"
    btn.removeClass "btn-loading"
    btn.removeAttr 'disabled'

  handlerValid = (form, validator) ->
    $(form).removeClass('form_invalid')
    $(form).find('.other_errors').hide()
    form.submit()

  handlerValidSubscribe = (form, validator) ->
    $form = $(form)
    $.post '/blog/subscribe.json', $form.serialize(), (data)->
      if data.success
        $form.removeClass('form_invalid')
        $form.find('.stroytorgi-error').hide()
        $form.find('.blog-updates_confirm').show()
        $form[0].reset()
      else
        error = data.message['email']
        error_msg = error
        if not (typeof error == "string" || error instanceof String)
          $.each error, (error_key)->
            error_msg = this
        $form.find('.stroytorgi-error').text(error_msg).show()
    , 'json'
    .fail ->
      $form.find('.stroytorgi-error').text('Возникла ошибка. Попробуйте позже.').show()

  handlerValidSendAjax = (form, validator) ->
    $form = $(form)
    $form.attr('data-process', '1')
    submitButton_styled($form, true)
    show_custom_errors = (errors)->
      $other_errors = $form.find('.other_errors')
      $other_errors.empty()
      $.each errors, (name)->
        $label = $form.find("[name=#{name}]").closest('label').find('.form_point')
        label = (if $label.length then '<span>'+$label.text()+':</span> ' else '')
        error = this
        if not (typeof this == "string" || this instanceof String)
          $.each this, (error_key)->
            error = this
        $other_errors.append("<p class='stroytorgi-error'>#{label}#{error}</p>")
      $other_errors.show()

    $form.removeClass('form_invalid')
    $form.find('.other_errors').hide()
    if (['form_request', 'form_question'].indexOf($form.attr('id'))>-1)
      category_slug = $form.find('select[name=category_id]').find('option:selected').attr('data-slug')
      $form.attr('data-url', "http://master-promo.test.stroytorgi.ru/faq/#{category_slug}/question.json")
    url = if $form.attr('data-url') then $form.attr('data-url') else $form.attr('action')

    ajax_params =
      type:'POST'
      async: false
      dataType: 'json'
      url: url
      data: $form.serialize()
      success: (response)->
        if response.success
          redirect_url = $form.attr('data-redirect')
          if redirect_url
            location.href = '/'
          else
            $form[0].reset()
            $thnx = $form.closest('.form_wrapper').find('.thnx')
            if $thnx.length
              $form.closest('.form_container').hide()
              $thnx.show()
            else
              alert('Спасибо. ' + (response.message || ''))
        else
          show_custom_errors(response.errors || response.message)
      error: (xhr, status_text, err)->
        show_custom_errors
          nonfielderror: (if xhr.status==413 then 'Прикрепленный файл слишком большой.' else 'Возникла ошибка. Попробуйте позже')

    $file = $form.find('[type=file]');
    if $file.length and $file.data().files
      file_data =  $file.data().files[0]
      data_f = new FormData()
      $.each $form.find('input, select'), ->
        data_f.append(this.name, this.value)
      data_f.append('file', file_data)
      data_f.append('text', $form.find('[name=text]').val())

      ajax_params["data"] = data_f
      ajax_params["mimeType"] = "multipart/form-data"
      ajax_params["contentType"] = false
      ajax_params["cache"] = false
      ajax_params["processData"] = false

    $.ajax ajax_params
    submitButton_styled($form, false)
    false

  # Rules

  $("#form-signin_login").validate
    invalidHandler: handlerInvalid
    submitHandler: handlerValid
    rules:
      login:
        required: true
      password:
        required: true
    messages:
      login:
        required: "Логин обязателен для заполнения."
      password:
        required: "Пароль обязателен для заполнения."

  $("#form-signin_ep").validate
    invalidHandler: handlerInvalid
    submitHandler: handlerValid
    rules:
      pin:
        required: true
    messages:
      pin:
        required: "PIN обязателен для заполнения."

  $("#form-signin_nopassword").validate
    invalidHandler: handlerInvalid
    submitHandler: handlerValid
    rules:
      nopassword:
        required: true
    messages:
      nopassword:
        required: "Логин обязателен для заполнения."


  $("#form_presentation").validate
    invalidHandler: handlerInvalid
    submitHandler: handlerValidSendAjax
    rules:
      name:
        required: true
        is_name: true
      company_name:
        required: true
      phone:
        required: true
        is_phone: true
      email:
        required: true
        is_email: true
    messages:
      name:
        required: "Ф.И.О. обязательно для заполнения."
      company_name:
        required: "Имя компании обязательно для заполнения."
      phone:
        required: "Телефон обязателен для заполнения."
      email:
        required: "Email обязателен для заполнения."
        email: "Введите корректный Email."

  $("#form_seminar").validate
    invalidHandler: handlerInvalid
    submitHandler: handlerValidSendAjax
    rules:
      name:
        required: true
        is_name: true
      company_name:
        required: true
      phone:
        required: true
        is_phone: true
      email:
        required: true
        is_email: true
    messages:
      name:
        required: "Ф.И.О. обязательно для заполнения."
      company_name:
        required: "Имя компании обязательно для заполнения."
      phone:
        required: "Телефон обязателен для заполнения."
      email:
        required: "Email обязателен для заполнения."
        email: "Введите корректный Email."

  $("#form_question").validate
    invalidHandler: handlerInvalid
    submitHandler: handlerValidSendAjax
    rules:
      author:
        required: true
        is_author: true
      email:
        required: true
        is_email: true
      text:
        required: true
    messages:
      author:
        required: "Ф.И.О. обязательно для заполнения."
      email:
        required: "Email обязателен для заполнения."
        email: "Введите корректный Email."
      text:
        required: "Задайте, пожалуйста, вопрос."

  $("#form_request").validate
    invalidHandler: handlerInvalid
    submitHandler: handlerValidSendAjax
    rules:
      author:
        required: true
        is_author: true
      email:
        required: true
        is_email: true
      text:
        required: true
      type:
        required: true
      title:
        required: true
      category_id:
        required: true
    messages:
      author:
        required: "Ф.И.О. обязательно для заполнения."
      email:
        required: "Email обязателен для заполнения."
        email: "Введите корректный Email."
      text:
        required: "Задайте, пожалуйста, вопрос."
      title:
        required: "Задайте тему."
      category_id:
        required: "Выберите категорию обращения."
      type:
        required: "Тип вопроса обязателен к заполнению."

  $("#form_registration").validate
    invalidHandler: handlerInvalid
    submitHandler: handlerValidSendAjax
    rules:
      individ:
          required: true
      inn:
          required: true
          maxlength: 12
          is_number: true
      kpp:
          required: true
          maxlength: 9
          is_number: true
      org_type:
          required: true
      org_name:
          required: true
      position:
          required: true
      email:
          required: true
          is_email: true
      phone:
          required: true
          is_phone: true

    messages:
      individ:
          required: "Это поле обязательно для заполнения."
      inn:
          required: "Пожалуйста, укажите ИНН"
          maxlength: "Максимальное количество символов 12."
      kpp:
          required: "Пожалуйста, укажите КПП"
          maxlength: "Максимальное количество символов 9."
      org_type:
          required: "Пожалуйста, укажите правовую форму"
      org_name:
        required: "Имя компании обязательно для заполнения."
      position:
          required: "Пожалуйста, укажите должность"
      email:
        required: "Email обязателен для заполнения."
        email: "Введите корректный Email."
      phone:
        required: "Телефон обязателен для заполнения."

    $(".blog-updates").validate
      invalidHandler: handlerInvalid
      submitHandler: handlerValidSubscribe
      rules:
        email:
          required: true
          is_email: true
      messages:
        email:
          required: "Введите Email."
          