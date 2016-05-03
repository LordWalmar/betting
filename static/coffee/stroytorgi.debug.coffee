$ ->
  # Show & Hide grid from static file and store state in LocalStorage
  setTimeout ->
    # Vars
    gridPath = "static/img/grid.png"

    # Add markup
    $grid = $("<div class='grid'></div>").height($("body").height()).appendTo("body")
    $grid.toggleClass("grid__active", localStorage["wbtgrid"] is "on")

    # Add styles
    cssText = "
      /* Debug Grid */
      .grid {display:none;position:absolute;z-index:99;left:0;right:0;top:0;background:url('#{gridPath}') center top repeat-y;pointer-events:none;opacity:.5;}
      .grid__active {display:block;}
      @media only screen and (max-width:1280px) {
        .grid {display:none;}
      }"
    $style = $("<style></style>").appendTo("body")
    if $style[0].styleSheet
      $style[0].styleSheet.cssText = cssText
    else
      $style.html cssText

    # Add events
    $(document).keypress (e)->
      if e.keyCode is 59 # Ctrl + ;
        localStorage["wbtgrid"] = if localStorage["wbtgrid"] is "on" then "off" else "on"
        if localStorage["wbtgrid"] is "on"
          $grid.height($("body").height())
        $grid.toggleClass("grid__active", localStorage["wbtgrid"] is "on")
  , 100 # Timeout to get proper document height